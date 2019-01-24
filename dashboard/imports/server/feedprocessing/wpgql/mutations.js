import gql from 'graphql-tag';

const mutations = {};

mutations.login = gql`
	mutation login( $username: String!, $password: String!, $id: String! ) {
		login( input:{ username: $username, password: $password, clientMutationId: $id } ) {
			authToken,
			user {
				id
			},
			clientMutationId
		}
	}
`;

export default mutations;
