import Moment from 'moment';
import WPGraphQL from '../../imports/server/feedprocessing/wpgql';
import Logger from '../../imports/logging.js';

export default ( API ) => {
	API.route( 'GET', '/searchwp/site/:site/q/:q', ( params, req, res ) => {
		const q = params.q;
		const domain = params.site;
		const host = `https://${domain}/`;
		console.log( 'moment ' );
		const limit = new Date( Moment().subtract( 14, 'days' ) );

		const response = Promise.await( WPGraphQL.searchGraphQl( q, domain, limit ) );
		if ( !response || response.error ) {
			const message = response.error ? response.error :
				`Failed to complete GraphQL search for "${domain}"`;
			Logger.log(
				Logger.levels.error,
				'Failed to complete GraphQL search',
				{
					activity: message,
					type: 'single',
					olddata: '',
					newdata: '',
					userId: 'System',
					siteId: 'xxx',
				},
			);
			return res.end( '[]' );
		}
		const responseWithImageData = Promise.await( WPGraphQL.retrieveImages( host, response ) );
		const articles = Promise.await( WPGraphQL.processFeed( responseWithImageData ) );
		if ( !articles ) {
			return res.end( '[]' );
		}
		const cleanString = Meteor.call( 'jsonMinify', articles );
		return res.end( cleanString );
	} );
};
