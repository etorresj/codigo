import crypto from 'crypto';
import fs from 'fs';
import nodePath from 'path';
import DATA_PATH from './constants';
import Logger from './logging';

import { FileHash } from '../lib/libCollections';

const fastlyPurge = ( filename, retryNumber = 0 ) => {
	const url = Meteor.absoluteUrl( `data/${filename}` );

	let response = null;
	const options = {
		timeout: 30000,
		headers: { 'User-Agent': 'DFM-Mobile-Dashboard' },
	};

	try {
		response = HTTP.call( 'PURGE', url, options );

		// We only want 2XX response codes. If we don't get one throw an error and let our
		// error handling code below do the rest.
		if ( response.statusCode > 299 || response.statusCode < 200 ) {
			throw new Error( `Received non 2XX response code: ${response.statusCode}. ${
				response.content}` );
		}
	} catch ( e ) {
		// If it fails retry after a delay.
		if ( retryNumber >= 5 ) {
			Logger.log(
				Logger.levels.crit,
				'Failed to purge Fastly cache.',
				{
					activity: `Failed to purge Fastly cache "${url}" Error: ${e.message}`,
					type: 'single',
					olddata: '',
					newdata: '',
					userId: 'System',
					siteId: 'XXXXXXXXXXXXXXXXX',
				},
			);
		} else {
			setTimeout( fastlyPurge, retryNumber * 1000, filename, retryNumber += 1 );
		}
	}
};

/**
* Creates directory for the file. Unlinks any existing files. Saves file.
* @param {typeArray} octalArray - Array of octals to be written to the file.
* @param {string} name - name of the file
* @param {string} folder - folder to save file in
* @param {string} encoding - default binary
* @return {void}
*
*/
const saveFile = ( fileData, name, folder, type, encoding = 'binary' ) => {
	// Create folders first
	const path = fs.realpathSync( process.cwd() );
	if ( folder ) {
		const dir1 = `${path}/${DATA_PATH}`;
		if ( !fs.existsSync( dir1 ) ) {
			fs.mkdirSync( dir1, 0o777 );
		}
		const dir2 = `${path}/${DATA_PATH}/${folder}`;
		if ( !fs.existsSync( dir2 ) ) {
			fs.mkdirSync( dir2, 0o777 );
		}
	}
	const targetPath = nodePath.normalize( `${path}/${DATA_PATH}/${folder}/${name}` );
	let file = fileData;

	if ( type === 'buffer' ) {
		file = Buffer.from( fileData );
	} else if ( type === 'string' ) {
		file = Buffer.from( fileData );
	}

	try {
		// Check to see if the file has changed.
		if ( fs.existsSync( targetPath ) ) {
			// Hash cannot be reused after digest is called. Creating 2 objects
			const hashInc = crypto.createHash( 'sha256' );
			hashInc.update( fileData );
			const fileHashIncoming = hashInc.digest( 'hex' );

			let fileHashCurrent;

			const storedHash = FileHash.findOne( { path: `${folder}/${name}` } );
			if ( storedHash ) {
				fileHashCurrent = storedHash.hash;
			}	else {
				const fileCurrent = fs.readFileSync( targetPath );
				const hashCurrent = crypto.createHash( 'sha256' );
				hashCurrent.update( fileCurrent );
				fileHashCurrent = hashCurrent.digest( 'hex' );
			}
			// If the hashes match, stop execution.
			if ( fileHashIncoming === fileHashCurrent ) {
				console.log( `File: ${folder}/${name} has not changed.` );
				return false;
			}

			FileHash.upsert( { path: `${folder}/${name}` }, { $set: {
				path: `${folder}/${name}`,
				hash: fileHashIncoming,
			} } );
		}
	} catch ( err ) {
		console.log( 'Failed to test hash.' );
	}

	try {
		// Write File in Meteor Build
		fs.writeFileSync( targetPath, file, encoding );
		console.log( `File successfully saved: ${folder}/${name}.` );
		fastlyPurge( name );
	} catch ( err ) {
		Logger.log(
			Logger.levels.crit,
			'Failed to save feed.',
			{
				activity: `Failed to save feed "${folder}/${name}.". Error: "${err.message}"`,
				type: 'single',
				olddata: '',
				newdata: '',
				userId: 'System',
				siteId: 'XXXXXXXXXXXXXXXXX',
			},
		);
	}

	// Consistent return
	return true;
};

/**
 *
 * Log failed feed parsing and save feed source content
 *
 * @see logToTransports()
 *
 * @param {string} feedSource - Url of feed
 * @param {string} feedName - Name of feed
 * @param {string} propertyName - Name of property
 * @param {number} siteId
 * @param {string} extension - File type. Enum of json or xml
 * @param {string} content - Feed content
 * @param {Object} error - Node error
 *
 * return void
 */
const feedError =
	( feedSource, feedName, propertyName, siteId, extension, content, error ) => {
		const hash = crypto.createHash( 'sha256' );
		hash.update( content );
		const fileHash = hash.digest( 'hex' );

		const fileName = `feed-${propertyName}-${feedName}Error-${fileHash}.${extension}`;
		const errorUrl = `${Meteor.absoluteUrl()}data/${fileName}`;

	//	saveFile( content, fileName, propertyName, 'string' );

		console.log( `Failed to parse feed "${feedName}."` );
		Logger.log(
			Logger.levels.crit,
			'Failed to parse feed.',
			{
				activity: `Failed to parse feed "${feedName}." See ${errorUrl}. Error: "${error.message}"`,
				type: 'single',
				olddata: '',
				newdata: '',
				userId: 'System',
				siteId,
			},
		);
	};


/**
 *
 * Remove error files
 *
 * @param {number} days - Age of files to be deleted
 * @return {void}
 */
const removeErrorFiles = ( days ) => {
	const path = `${fs.realpathSync( process.cwd() )}/${DATA_PATH}`;
	const oneDay = 86400;
	try {
		const propDirs = fs.readdirSync( path );
		propDirs.forEach( ( dir ) => {
			dir = `${path}/${dir}`;
			if ( fs.statSync( dir ).isDirectory() ) {
				const propFiles = fs.readdirSync( dir );
				propFiles.forEach( ( file ) => {
					if ( file.match( /Error\-\w{64}/ ) ) {
						file = `${dir}/${file}`;
						const fileTime = fs.statSync( file ).ctimeMs;
						const now = new Date().getTime();
						const age = ( now - fileTime ) / 1000;
						if ( age > days * oneDay ) {
							fs.unlinkSync( file );
						}
					}
				} );
			}
		} );
	} catch ( e ) {
		console.log( e );
	}
};


export default {
	saveFile,
	feedError,
	removeErrorFiles,
};
