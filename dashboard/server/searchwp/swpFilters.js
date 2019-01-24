import bodyParser from 'body-parser';
import { Picker } from 'meteor/meteorhacks:picker';

import apiAuthHelpers from '../api/apiAuthHelpers';

Picker.middleware( bodyParser.json() );

const httpMethods = {
	GET: Picker.filter( req => req.method === 'GET' ),
};

const route = function( METHOD, path, callback ) {
	httpMethods[ METHOD ].route( path, ( params, req, res ) => {
		if ( METHOD === 'GET' ) {
			params.authorizedUser = true;
			apiAuthHelpers.runAsUser( true, callback, [params, req, res] );
		} else {
			res.statusCode = 403;
			res.end( 'Unauthorized requests are forbidden.' );
		}
	} );
};

export default { route };
