// Retrieving data from WP GraphQL
import { ApolloClient } from 'apollo-client';
import { HttpLink } from 'apollo-link-http';
import { InMemoryCache } from 'apollo-cache-inmemory';
import fetch from 'node-fetch';

import he from 'he';
import nodeUrl from 'url';

import { queries } from './queries';
import wp from '../../utils/shortcode';

/**
 * Getting all images from article content (fullText), searchig for <figure
 * and <img tags
 *
 * @param {string} text - This is the article content
 * @return {Array} images - This is an arrays with all found images
 *
 */
function getImagesFromContent( content : string ) : Array {
	let currentCaption = wp.shortcode.next( 'caption', content, 0 );
	const articleImageIds = [];
	while ( currentCaption !== undefined ) {
		const idRegex = /attachment_(\d+)/;
		if ( currentCaption.shortcode.attrs.named.id ) {
			const idMatches = currentCaption.shortcode.attrs.named.id.match( idRegex );
			const id = idMatches[ 1 ];
			articleImageIds.push( id );
		}

		const newIndex = currentCaption.index + currentCaption.content.length;
		currentCaption = wp.shortcode.next( 'caption', content, newIndex );
	}

	const contentWithoutImages = wp.shortcode.replace( 'caption', content, function() {
		return '<div />';
	} );
	return { contentWithoutImages, articleImageIds };
}

export default async function( feedUrl, feedData ) {
	console.log( 'Begin GQL retrieveImages' );
	// Parse that URL and grab the query variables too.
	const feedUrlParsed = nodeUrl.parse( feedUrl, true );
	const hostname = feedUrlParsed.hostname;
	const targetGraphQL = `https://${hostname}/graphql`;

	let imageIds = [];
	const imageMap = {};
	let updatedFeedData = feedData.map( ( article ) => {
		const articleContent = he.decode( article.node.content );
		const { contentWithoutImages, articleImageIds } = getImagesFromContent( articleContent );
		const newContent = he.encode( contentWithoutImages, { useNamedReferences: true } );
		const newArticle = {
			node: {
				...article.node,
				content: newContent,
			},
		};
		imageMap[ article.node.postId ] = articleImageIds;
		imageIds = imageIds.concat( articleImageIds );
		return newArticle;
	} );

	if ( imageIds.length < 1 ) {
		console.log( 'Nothing to query' );
		return feedData;
	}

	const imageQuery = {
		query: queries.imageByIds,
		variables: {
			imageIds,
		},
	};

	const headers = {};

	const client = new ApolloClient( {
		link: new HttpLink( {
			uri: targetGraphQL,
			fetch,
			headers,
		} ),
		cache: new InMemoryCache(),
	} );

	let imageData = [];
	// Make the request.
	try {
		const response = await client.query( imageQuery );
		imageData = response.data.mediaItems.nodes;
	} catch ( e ) {
		console.log( e );
	}

	console.log( 'Sorting images...' );
	updatedFeedData = updatedFeedData.map( ( article ) => {
		let otherImages = [];
		const articleImages = Array.isArray( imageMap[ article.node.postId ] ) ?
			imageMap[ article.node.postId ]
			: [];
		imageData.forEach( ( image ) => {
			if ( articleImages.includes( `${image.mediaItemId}` ) ) {
				otherImages = [
					...otherImages,
					image,
				];
			}
		} );
		const newArticle = {
			node: {
				...article.node,
				otherImages,
			},
		};
		return newArticle;
	} );
	return updatedFeedData;
};
