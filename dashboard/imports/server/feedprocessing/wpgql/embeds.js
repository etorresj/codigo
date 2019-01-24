
// Youtube embed code
const YOUTUFIRST = '<iframe  width=\'640\' height=\'360\' src=\'https://www.youtube.com/embed/';
const YOUTUEMB = '?rel=1&fs=1&autohide=2&showsearch=0&showinfo=1&iv_load_policy=1&wmode=transparent\'';
const YOUTULAST = 'allowfullscreen=\'true\' ></iframe>';

// twiiter embed code
const TWIT_SCRIPT = '<script async' +
	' src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

// instagram embed code
const INSTA_SCRIPT = '<script async defer' +
	' src="https://platform.instagram.com/en_US/embeds.js"></script>';
const INSTAFIRST = '<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="';
const INSTALAST = '?utm_source=ig_embed&utm_medium=loading" data-instgrm-version="12" ><div >' +
' <a href="https://www.instagram.com/p/Bnw4BV3BUP1/?utm_source=ig_embed&utm_medium=loading"' +
' target="_blank"></a>  Instagram</div></blockquote>';

/**
 * Creates a video object or strips video html from article content
 *
 * @param {string} html -  article text
 * @param {boolean} strip value to indicate if content stripping is needed
 * @return {?object} Video object for apps
*/
function videoGQL( html : string, strip : boolean ) : ?Object {
	const videos = {
		multiVideo: [],
		video: {
			type: '',
			html: '',
		},
	};
	// Matches youtube videos in article text
	const regex = '((?:youtube\.com|youtu.be))(\/(?:[\\w\\-]+\\?v=|embed\/|v\/)?)([\\w\\-]+)(\\S+)?';
	const youtubeReg = new RegExp( regex, 'gi' );
	// Matches abcnews videos in  article text
	const abcRegexp = /\<iframe[^\n]+abc[^\n]+\<\/iframe\>/gi;
	// Matches dvid videos in  article text
	const dVidRegexp = /\<iframe[^<>]+dvidshub\.net\/video\/embed[^<>]+\>\<\/iframe\>/gi;

	const youtubeMatch = html.match( youtubeReg );

	if ( strip ) {
		return html.replace( youtubeReg, '' ).replace( abcRegexp, '' ).replace( dVidRegexp, '' );
	}

	if ( youtubeMatch ) {
		_.each( youtubeMatch, ( item ) => {
			const regAux = new RegExp( regex, 'gi' );
			const id = regAux.exec( item );
			const video = `${YOUTUFIRST}${id[ 3 ]}${YOUTUEMB}${YOUTULAST}`;
			videos.multiVideo.push( {
				type: 'youtube',
				html: video,
			} );
		} );
	}
	if ( html.match( abcRegexp ) ) {
		const videoMatch = html.match( abcRegexp );
		for ( let i = 0; i < videoMatch.length; i += 1 ) {
			videoMatch[ i ] = videoMatch[ i ].replace(
				/https:\/\/http:/gi, 'http:' );
			videos.multiVideo.push( {
				type: 'ABC',
				html: videoMatch[ i ],
			} );
		}
	}
	if ( html.match( dVidRegexp ) ) {
		const videoMatch = html.match( dVidRegexp );
		for ( let i = 0; i < videoMatch.length; i += 1 ) {
			videos.multiVideo.push( {
				type: 'dvid',
				html: videoMatch[ i ],
			} );
		}
	}

	if ( videos.multiVideo ) {
		videos.video = videos.multiVideo[ 0 ];
	} else {
		videos.video = null;
		videos.multiVideo = null;
	}
	return videos;
}

/**
 * Builds the 'ASIDE' section with related articles
 *
 * @param {object} related articles object
 * @param {string} article uri
 * @return {string} related articles text
*/
function relatedArticles( articles: Object, uri: string ) : string {
	let result = '<aside class="related left"><h2 class="widget-title" ' +
		'data-curated-ids="" data-relation-type="automatic-primary-tag">' +
		'Related Articles</h2><br /><ul>';
	let i = 0;
	articles.forEach( ( obj ) => {
		if ( i <= 4 && obj.uri !== uri ) {
			result += `<li> <a class="article-title" href="${obj.link}" title="${obj.title}">${obj.title}</a> </li>`;
			i += 1;
		}
	} );
	result += '</ul></aside>';
	return result;
}
/**
 * Getting twitter code from fullText
 *
 * @param {string} html - article text
 * @param {boolean} strip - value to indicate if content stripping is needed
 * @return {string} twitter code
 *
*/
function twitter( html : string, strip : boolean ) : ?Object {
	const twitRegexp = /https?:\/\/twitter\.com\/(?:#!\/)?(\w+)\/status(?:es)?\/(\d+)(?:\/.*)?/i;
	const match = html.match( twitRegexp );
	if ( strip ) {
		return html.replace( twitRegexp, '' );
	}
	if ( match ) {
		const blockquote = `<blockquote class="twitter-tweet" data-width="500" data-dnt="true"><a href="${
			match[ 0 ]}"></a></blockquote>${TWIT_SCRIPT}`;
		const twit = {
			html: blockquote,
			img: 0,
		};
		return twit;
	}
	return null;
}

/**
 * Getting Instagram code from fullText
 *
 * @param {string} html - article text
 * @param {boolean} strip - value to indicate if content stripping is needed
 * @return {string} instagram code
 *
*/
function instagram( html : string, strip : boolean ) : ?Object {
	const insta = [];
	const instaRegexp = /(https?:\/\/www\.)?instagram\.com(\/p\/\w+\/?)/gi;
	const instaIdRegexp = /\/p\/(\w+\/?)/;
	const match = html.match( instaRegexp );
	if ( strip ) {
		return html.replace( instaRegexp, '' );
	}
	if ( match ) {
		_.each( match, ( item ) => {
			const idMatch = item.match( instaIdRegexp );
			const idInsta = idMatch ? idMatch[ 1 ] : '';
			const blockquote = `${INSTAFIRST}${item}${INSTALAST}${INSTA_SCRIPT}`;
			insta.push( {
				id: idInsta,
				html: blockquote,
			} );
		} );
		return insta;
	}
	return null;
}
export default {
	videoGQL,
	relatedArticles,
	twitter,
	instagram,
};
