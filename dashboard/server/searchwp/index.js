import API from './swpFilters';
import searchwpEndpoint from './searchwp';


// Call API initialization files from here to control the load order.
// This is a manual workaround to avoid working with file system load order.
searchwpEndpoint( API );
