import URL from 'url';
// import { HTTP } from 'meteor/http';

import Parser from '../../parser';
import wp from '../utils/shortcode';

/**
 *	Retrieve Scribble event from provided URL
 *
 */
function eventFromUrl ( sourceURL ) {
	const parsedURL = URL.parse( sourceURL, true );

	// Check for the URL query ID and make sure we are working with scribblelive
	if ( ( parsedURL.query.Id || parsedURL.query.id || parsedURL.query.ID ) &&
		parsedURL.hostname.indexOf( 'scribblelive' ) ) {
		return parsedURL.query.Id || parsedURL.query.id || parsedURL.query.ID;
	}

	return null;
}

/**
 *	Retrieve Scribble event from a div contained within the HTML.
 * 	@param {string} HTML - HTML of the div to be searched
 * 	@return {string} Event ID or Null
 */
function eventFromDivDataSrc ( HTML ) {
	const $ = Parser.load( HTML );

	let src = $( 'div.scrbbl-embed' ).data( 'src' );

	if ( src ) {
		src = src.split( '/' );
		const scribbleEvent = src[ 2 ];
		return scribbleEvent;
	}

	// Unable to locate div with class scrbbl-embed
	return null;
}

/**
 *	Retrieve Scribble event from a shortcode contained within the HTML.
 * 	@param {string} HTML - HTML that contains a Scribble shortcode to be searched
 * 	@return {string} Event ID or Null
 */
function eventFromShortcode ( HTML ) {
	const scribbleSC = wp.shortcode.next( 'scribble', HTML, 0 );
	if ( scribbleSC !== undefined && scribbleSC.shortcode.attrs.named.src ) {
		const src = scribbleSC.shortcode.attrs.named.src.split( '/' );
		const scribbleEvent = src[ 2 ];
		return scribbleEvent;
	}

	// Found no Scribble short code
	return null;
}

/**
 *	Build API URL for an event and verify that it is valid.
 *	@param {string} Scribble Event ID
 *	@param {string} Scribble API Token
 *	@return {string} JSON API URL
 */
function buildJsonApiUrl ( eventId, apiToken = '6pVckQPq' ) {
	const protocol = 'https://';
	const domain = 'apiv1secure.scribblelive.com';
	const apiEndpoint = `/api-readonly/rest/event/${eventId}/all/`;
	const queryString = `?EmbedTrackingImage=1&Token=${apiToken
	}&Order=asc&Max=99&format=json`;
	const apiUrl = `${protocol}${domain}${apiEndpoint}${queryString}`;

	return apiUrl;
	// try {
	// 	const resp = HTTP.get( apiUrl );
	// 	if ( resp.statusCode === 200 ) {
	// 		return apiUrl;
	// 	}
	// } catch ( e ) {
	// 	console.log( 'Failed to retrieve Scribble JSON' );
	// }

	// Failed to build the URL or the URL was invalid
	// return null;
}

export default {
	eventFromUrl,
	eventFromDivDataSrc,
	eventFromShortcode,
	buildJsonApiUrl,
};
