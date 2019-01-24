
/**
 * function to unescape HTML tags
 *
 * @param {string} html -  article text
 * @return {string} string with unescaped tags
*/
function unescapeHTML( html : string ) : string {
	return html.replace( /&lt;/g, '<' )
		.replace( /&gt;/g, '>' )
		.replace( /&amp;/g, '&' )
		.replace( /<div(.*?)>/gi, '<p>' )
		.replace( /<\/div>/gi, '</p>' );
}

/**
 * function to remove shortcodes
 *
 * @param {string} html -  article text
 * @return {string} string with shortcodes removed
*/
function removeShortCodes( html : string ) : string {
	return html.replace( /\[(.*?)\]/g, '' )
		.replace( /<p><\/p>/gi, '' );
}

export default {
	unescapeHTML,
	removeShortCodes,
};
