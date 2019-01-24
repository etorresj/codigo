// Importing Meteor
import { Meteor } from 'meteor/meteor';

// Utils
import nodeUrl from 'url';
import crypto from 'crypto';
import he from 'he';

// Retrieving data from WP GraphQL
import { ApolloClient } from 'apollo-client';
import { HttpLink } from 'apollo-link-http';
import { onError } from 'apollo-link-error';
import { InMemoryCache } from 'apollo-cache-inmemory';
import fetch from 'node-fetch';

import { queries } from './queries';
import Embeds from './embeds';
import Utils from './utils';
import mutations from './mutations';

import retrieveImages from './retrieveProcessImages';

// Database interaction
import { JwtAuth } from '../../../../lib/libCollections';

// Article prototype object
import ArticleObj from '../../../../server/articleObj';

// Assets
import Scribble from '../../assets/scribble';

async function jwtAuthorize( hostname ) {
	if ( hostname === undefined || hostname === null ) {
		throw new Error( `${hostname} is not a valid hostname` );
	}

	const username = process.env.wpuname;
	const password = process.env.wppwd;

	if ( username === undefined || password === undefined ) {
		throw new Error( 'GraphQL Username and Password must be set as env variables.' );
	}

	// Generate a random ID
	const current_date = ( new Date() ).valueOf().toString();
	const random = Math.random().toString();
	const id = crypto.createHash( 'sha1' ).update( current_date + random ).digest( 'hex' );

	const requestBody = {
		mutation: mutations.login,
		variables: {
			username,
			password,
			id,
		},
	};

	const errorLink = onError( ( { networkError } ) => {
		console.log( 'You need to be authorized before you can get authorized.' );
		if ( networkError.result === null || networkError.result === undefined ) {
			return null;
		} else if ( networkError.result.data === null ) {
			return null;
		} else if ( networkError.result.data.login === null ) {
			return null;
		}
		if ( networkError.result.data.login.authToken ) {
			JwtAuth.upsert(
				{ host: hostname },
				{
					$set: {
						host: hostname,
						token: networkError.result.data.login.authToken,
					},
				},
			);
			console.log( 'You are now authorized.' );
			return networkError.result.data.login.authToken;
		}
		return null;
	} );
	const client = new ApolloClient( {
		link: errorLink.concat( new HttpLink( {
			uri: `https://${hostname}/graphql`,
			fetch,
		} ) ),
		cache: new InMemoryCache(),
	} );

	// Make the request.
	try {
		console.log( `Attempting to retrieve a new token for ${hostname}` );
		const response = await client.mutate( requestBody );
		JwtAuth.upsert(
			{ host: hostname },
			{
				$set: {
					host: hostname,
					token: response.result.data.login.authToken,
				},
			},
		);
		return response.result.data.login.authToken;
	} catch ( e ) {
		// TODO: Log error
		console.log( e );
	}

	return null;
}

async function retrieveData( feedUrl ) {
	console.log( 'Begin GQL retrieveData' );
	// Parse that URL and grab the query variables too.
	const feedUrlParsed = nodeUrl.parse( feedUrl, true );

	const hostname = feedUrlParsed.hostname;

	const targetGraphQL = `https://${hostname}/graphql`;
	const feedCategory = parseInt( feedUrlParsed.query.categories, 10 );
	const numArticles = parseInt( feedUrlParsed.query.per_page, 10 ) || 30;

	// If we don't have a feed category, return null.
	if ( isNaN( feedCategory ) === true ) {
		return null;
	}

	// Build GraphQL Query + Variables
	const requestBody = {
		query: queries.categoryFeed,
		variables: {
			numArticles,
			feedCategory,
		},
	};

	const headers = {};

	if ( process.env.jwtauthenabled ) {
		let jwtToken = JwtAuth.findOne( {
			host: hostname,
		} );

		if ( jwtToken === undefined || jwtToken === null ) {
			try {
				jwtToken = await jwtAuthorize( hostname );
				if ( jwtToken === null ) {
					throw new Error( 'Unable to retrieve token.' );
				}
			} catch ( e ) {
				console.log( e );
				return null;
			}
		}

		headers.authorization = `Bearer ${jwtToken.token}`;
	}

	const client = new ApolloClient( {
		link: new HttpLink( {
			uri: targetGraphQL,
			fetch,
			headers,
		} ),
		cache: new InMemoryCache(),
	} );

	// Make the request.
	try {
		const response = await client.query( requestBody );
		return response.data.posts.edges;
	} catch ( e ) {
		console.log( e );
		console.log( 'Catching Error and ignoring if the data is present' );
		if ( e.networkError === null ) {
			return null;
		} else if ( e.networkError.result === null ) {
			return null;
		} else if ( e.networkError.result.data === null ) {
			return null;
		} else if ( e.networkError.result.data.posts === null ) {
			return null;
		} else if ( e.networkError.result.data.posts.edges !== null ) {
			console.log( 'data exists' );
			return e.networkError.result.data.posts.edges;
		}
	}

	return null;
}

function processArticle( articleNode ) {
	const article = new ArticleObj();
	const otherImages = [];
	const gallery = [];
	let related = '';
	const firstName = articleNode.author.firstName ? articleNode.author.firstName : '';
	const lastName = articleNode.author.lastName ? articleNode.author.lastName : '';
	const authorMail = articleNode.author.email ? articleNode.author.email : '';

	// Assign article ID. No processing needed.
	article.id = articleNode.postId;

	// Assign article link. No processing needed.
	article.link = articleNode.link;

	// Decode Article title and assign to article object.
	article.title = Utils.unescapeHTML( articleNode.title );
	article.title = he.decode( article.title );

	article.previewTitle = Meteor.call( 'shortenTitle', article.title );

	article.description = Utils.unescapeHTML( articleNode.excerpt );
	article.description = he.decode( article.description );

	// Determine if this article is a photo only article.
	if ( articleNode.categories.includes( 'photos' ) ) {
		article.type = 'image';
	} else {
		article.type = 'normal';
	}

	// Get article date ( prefer GMT over normal )
	if ( articleNode.dateGmt ) {
		article.date = articleNode.dateGmt.toString();
	} else if ( articleNode.date ) {
		article.date = articleNode.date.toString();
	} else {
		article.date = '';
	}
	article.date = Meteor.call( 'build_api_date', article.date );

	// Get article update date ( prefer GMT over normal )
	if ( articleNode.modifiedGmt ) {
		article.updateDate = articleNode.modifiedGmt.toString();
	} else if ( articleNode.modified ) {
		article.updateDate = articleNode.modified.toString();
	} else {
		article.updateDate = '';
	}
	article.updateDate = Meteor.call( 'build_api_date', article.updateDate );

	// Verifying that updatedate is not before original publish date
	article.updateDate = Meteor.call( 'compareDateUpdated', article.date, article.updateDate );

	// Get primary article image
	if ( articleNode.featuredMedia ) {
		if ( articleNode.featuredMedia.mediaType === 'image' ) {
			const image = {
				caption: '',
				url: '',
				width: '',
				height: '',
			};
			image.url = articleNode.featuredMedia.sourceUrl;
			image.caption = he.decode( articleNode.featuredMedia.caption || '' );
			image.caption = Meteor.call( 'stripHtmEntities', image.caption );
			image.width = articleNode.featuredMedia.mediaDetails.width;
			image.height = articleNode.featuredMedia.mediaDetails.height;
			article.image = Meteor.call( 'resizeImage', image, 'wp' );
		}
	}

	// Search for all videos and decide on a primary video
	const articleVideos = Embeds.videoGQL( articleNode.content );

	article.video = articleVideos.video;

	// Search for any remaining video embeds
	article.multiVideo = articleVideos.multiVideo;

	// Find all images for this article
	if ( articleNode.otherImages ) {
		article.otherImages = articleNode.otherImages.map( ( obj ) => {
			let otherImg = {
				caption: '',
				url: '',
				width: '',
				height: '',
			};
			otherImg.url = obj.sourceUrl;
			otherImg.caption = he.decode( obj.caption || '' );
			otherImg.caption = Meteor.call( 'stripHtmEntities', otherImg.caption );
			otherImg.width = obj.mediaDetails.width;
			otherImg.height = obj.mediaDetails.height;
			otherImg = Meteor.call( 'resizeImage', otherImg, 'wp' );
			return otherImg;
		} );
	}


	// -----------------------------------------
	// Get article author/s
	// Important Note: As of 12/10/2017 GraphQL cannot provide the Co Authors data we need.

	article.author = `${firstName} ${lastName} ${authorMail}`;

	// Get name/s of author/s
	article.authorName = `${firstName} ${lastName}`;

	// Get email/s of author/s
	article.authorMail = authorMail;

	// Format author email/s to be easier to display on 2 lines
	article.authorMailFormated = authorMail.split( '@' ).join( '@\n' );
	// -----------------------------------------

	// Get facebook embed information
	article.facebook = Meteor.call( 'getFB', article.fullText, false );

	// Get primary category for article
	if ( articleNode.categories ) {
		article.category = he.decode( articleNode.categories[ 0 ] );
	}

	// Find Gallery data
	if ( articleNode.contentGalleryMap.edges.length ) {
		articleNode.contentGalleryMap.edges.forEach( ( obj ) => {
			const imageGal = {
				caption: '',
				fullUrl: '',
				id: 0,
				thumbUrl: '',
			};
			let otherImg = {
				caption: '',
				url: '',
				width: '',
				height: '',
			};
			imageGal.caption = Meteor.call( 'cleanASCII', obj.node.caption );
			imageGal.caption = Meteor.call( 'stripHtmEntities', imageGal.caption );
			imageGal.fullUrl = obj.node.sourceUrl ? `${obj.node.sourceUrl}?w=1000` : '';
			otherImg.url = obj.node.sourceUrl;
			otherImg.caption = he.decode( obj.node.caption || '' );
			otherImg.caption = Meteor.call( 'stripHtmEntities', otherImg.caption );
			otherImg.width = obj.node.mediaDetails.width;
			otherImg.height = obj.node.mediaDetails.height;
			otherImg = Meteor.call( 'resizeImage', otherImg, 'wp' );
			otherImages.push( otherImg );
			gallery.push( imageGal );
		} );
	}
	article.gallery.data = gallery;
	// for normal articles, saving gallery as otherImages
	if ( article.type === 'normal' && article.gallery.data.length ) {
		article.otherImages = otherImages;
	}

	// Get Twitter embed information
	article.twitter = Embeds.twitter( articleNode.content, false );

	// Get Instagram embed information
	article.instagram = Embeds.instagram( articleNode.content, false );

	// Get Scribble embed information
	// Use Shortcode if RAW text is retrieved from GraphQL
	let scribbleEvent = Scribble.eventFromShortcode( articleNode.content );
	if ( scribbleEvent !== null ) {
		scribbleEvent = scribbleEvent.replace( '&quot;', '' );
		article.scribble.url = Scribble.buildJsonApiUrl( scribbleEvent );
	}

	// Remove unuseable data and other embed data from fullText
	article.fullText = Utils.unescapeHTML( articleNode.content );
	// article.fullText = he.decode( article.fullText );
	article.fullText = Meteor.call( 'stripJavascript', article.fullText );
	article.fullText = Meteor.call( 'addPeriodSpace', article.fullText );
	article.fullText = Meteor.call( 'formatSubheads', article.fullText );

	article.fullText = Meteor.call( 'twcRemoveSlideshow', article.fullText );
	article.fullText = Meteor.call( 'stripWPBreaks', article.fullText );

	article.fullText = Meteor.call( 'videoWP', article.fullText, true );
	article.fullText = Meteor.call( 'wpTextProcessing', article.fullText );

	// Strip H4 tags
	article.fullText = Meteor.call( 'stripH4', article.fullText );

	// converting tables to lists
	article.fullText = Meteor.call( 'convertTable', article.fullText );

	// Line break after H3 tags
	article.fullText = Meteor.call( 'formatH3', article.fullText );

	// Limit the amount of paragraphs to 80
	article.fullText = Meteor.call( 'limitArticleText', article.fullText, article.link );

	// Line break after H2 tags
	article.fullText = Meteor.call( 'h2LineBreak', article.fullText );

	article.fullText = Meteor.call( 'getFB', article.fullText, true );
	article.fullText = Embeds.videoGQL( article.fullText, true );
	article.fullText = Embeds.twitter( article.fullText, true );
	article.fullText = Utils.removeShortCodes( article.fullText );


	// searching for related articles
	if ( articleNode.primaryTag ) {
		related = Embeds.relatedArticles( articleNode.primaryTag.node.posts.nodes,
			articleNode.uri );
		article.fullText += related;
	}
	return article;
}

async function processFeed( articleArray ) {
	if ( !articleArray.length ) {
		// TODO: Log error
		return false;
	}

	const articles = [];
	articleArray.forEach( ( article ) => {
		try {
			const processedArticle = processArticle( article.node );
			articles.push( processedArticle );
		} catch ( err ) {
			console.log( `An error occurred while processing an article. Error: ${err.message}` );
		}
	} );

	return articles;
}
/**
 * function to search on graphql
 *
 * @param {string} q - this is the search parameter
 * @param {string} domain - to confirm which CMS is making the request
 * @param {Date} limit - Limit results to this param
 * @return {Array} response - response from graphql
 *
 */
async function searchGraphQl( q, domain, limit ) {
	console.log( 'Begin GQL search' );
	// Parse that URL and grab the query variables too.

	const targetGraphQL = `https://${domain}/graphql`;
	const numArticles = 30;
	const y = parseInt( limit.getFullYear(), 10 );
	const m = parseInt( limit.getMonth(), 10 ) + 1;
	const d = parseInt( limit.getDate(), 10 );

	// Build GraphQL Query + Variables
	const requestBody = {
		query: queries.search,
		variables: {
			numArticles,
			q,
			y,
			m,
			d,
		},
		context: {
			timeout: 60000,
		},
	};

	const headers = {};

	if ( process.env.jwtauthenabled ) {
		let jwtToken = JwtAuth.findOne( {
			host: domain,
		} );

		if ( jwtToken === undefined || jwtToken === null ) {
			try {
				jwtToken = await jwtAuthorize( domain );
				if ( jwtToken === null ) {
					throw new Error( 'Unable to retrieve token.' );
				}
			} catch ( e ) {
				console.log( e );
				return null;
			}
		}

		headers.authorization = `Bearer ${jwtToken.token}`;
	}

	const client = new ApolloClient( {
		link: new HttpLink( {
			uri: targetGraphQL,
			fetch,
			headers,
		} ),
		cache: new InMemoryCache(),
	} );

	// Make the request.
	try {
		const response = await client.query( requestBody );
		return response.data.posts.edges;
	} catch ( e ) {
		if ( e.networkError ) {
			const response = {};
			response.error = e.networkError.message;
			return response;
		}
		if ( e.networkError === null ) {
			return null;
		} else if ( e.networkError.result === null ) {
			return null;
		} else if ( e.networkError.result.data === null ) {
			return null;
		} else if ( e.networkError.result.data.posts === null ) {
			return null;
		} else if ( e.networkError.result.data.posts.edges !== null ) {
			console.log( 'data exists' );
			return e.networkError.result.data.posts.edges;
		}
		return null;
	}
}

export default {
	retrieveData,
	retrieveImages,
	processFeed,
	searchGraphQl,
};
