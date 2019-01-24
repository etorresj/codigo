import { Meteor } from 'meteor/meteor';
import { HTTP } from 'meteor/http';
import nodeHTTPS from 'https';
import crypto from 'crypto';
import { URL } from 'url';
import { Email } from 'meteor/email';
import {
	FeedbackResponse,
	PushNotifications,
} from '../../lib/libCollections';

const API_KEY = process.env.SILVER_ADVENTURE_API_KEY || '';
const defaultHeaders = {
	'X-Api-Key': API_KEY,
};
const SILVER_ADVENTURE_SERVER = process.env.SILVER_ADVENTURE_SERVER || '';


Meteor.methods( {
	retrieveNotificationServer( payload ) {
		const endpoint = `${SILVER_ADVENTURE_SERVER}/notify`;
		const requestOptions = Object.assign( { headers: defaultHeaders }, { data: payload } );
		return {
			endpoint,
			requestOptions,
		};
	},
	sendNotification( payload ) {
		const timestamp = Date.now();

		const body = JSON.stringify( payload );
		const noteSend = crypto.createHash( 'sha256' );
		noteSend.update( body );
		const noteSendHash = noteSend.digest( 'hex' );

		const pendingSends = PushNotifications.find(
			{
				payloadHash: noteSendHash,
				responseReceived: false,
			}, {
				sort: { timestamp: -1 },
			},
		).fetch();

		const sendTimeout = 1000 * 60; // 1 minute
		let prevReqTimedOut = false;
		if ( pendingSends.length > 0 ) {
			prevReqTimedOut = pendingSends[ 0 ].timestamp + sendTimeout < timestamp;
		} else {
			prevReqTimedOut = true;
		}

		if ( !prevReqTimedOut ) {
			return 'Notification send pending....';
		}

		PushNotifications.insert( {
			timestamp,
			payloadHash: noteSendHash,
			responseReceived: false,
			payload,
			userId: Meteor.user()._id,
		} );

		const endpoint = new URL( `${SILVER_ADVENTURE_SERVER}/notify` );

		const options = {
			hostname: endpoint.hostname,
			path: endpoint.pathname,
			method: 'POST',
			headers: Object.assign( defaultHeaders, { 'Content-Length': Buffer.byteLength( body ) } ),
			timeout: 30000,
		};

		try {
			const saRequest = nodeHTTPS.request( options, Meteor.bindEnvironment( ( saResponse ) => {
				saResponse.setEncoding( 'utf8' );
				// temporary data holder
				const bodyResponse = [];
				// on every content chunk, push it to the data array
				saResponse.on( 'data', chunk => bodyResponse.push( chunk ) );
				// we are done, resolve promise with those joined chunks
				saResponse.on( 'end', Meteor.bindEnvironment( () => {
					const noteRes = {
						statusCode: saResponse.statusCode,
						body: bodyResponse.join( '' ),
					};

					PushNotifications.update( {
						payloadHash: noteSendHash,
						responseReceived: false,
					}, {
						$set: {
							responseReceived: true,
							response: noteRes,
						},
					} );
				} ) );
			} ) );

			saRequest.on( 'error', Meteor.bindEnvironment( ( err ) => {
				const noteRes = {
					body: err.message,
				};

				PushNotifications.update( {
					payloadHash: noteSendHash,
					responseReceived: false,
				}, {
					$set: {
						responseReceived: true,
						response: noteRes,
					},
				} );
			} ) );

			saRequest.write( body );
			saRequest.end();
			return 'Sending notification...';
		} catch ( e ) {
			console.log( e );
			throw new Meteor.Error( e.message );
		}
	},
	/**
	 * Function to getting user feedback from AWS endpoint
	 *
	 */
	getFeedback( siteId, next = 0, limit ) {
		const result = {
			items: [],
			last: '',
		};
		const last = next ? `&last=${next}` : '';
		const server = SILVER_ADVENTURE_SERVER;
		const endpoint = '/feedback/';
		const url = `${server}${endpoint}${siteId}?limit=${limit}${last}`;
		const options = Object.assign( {}, { headers: defaultHeaders } );
		const response = HTTP.get( url, options );
		if ( response.data ) {
			result.items = response.data.Items;
			result.last = response.data.LastEvaluatedKey ?
				response.data.LastEvaluatedKey.createdAt : '';
		}
		return result;
	},
	/**
	 * Function to store user feedback response on the FeedbackResponse collection
	 *
	 */
	sendFeedbackResponse( data ) {
		console.log( data );
		FeedbackResponse.update(
			{
				feedbackId: data.feedbackId,
				siteId: data.siteId,
			},
			{
				$set: {
					message: data.message,
				},
			},
			{ upsert: true },
		);
		// Email template object. Used to create the email that will be sent.
		const email_template = {
			header:
				'<html xmlns="http://www.w3.org/1999/xhtml">' +
				'<head>' +
				'<meta http-equiv="Content-Type" ' +
					'content="text/html; charset=UTF-8" />' +
				'<meta name="viewport" ' +
					'content="width-device-width, initial-scale=1.0" />' +
				'</head>',
			body:
				`<body><h2>Thank your for your feedback</h2> ${data.message}<br />`,
			end: '</body></html>',
		};

		const emailContent = email_template.header + email_template.body +
			email_template.end;
		const emailDestination = data.email;
		const emailSource = 'Mobile Dashboard <DFMmobilesupport@digitalfirstmedia.com>';
		const subject = 'Thank you for your feedback';

		Email.send( {
			to: emailDestination,
			from: emailSource,
			subject,
			html: emailContent,
		} );
		return true;
	},
} );
