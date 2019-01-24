import gql from 'graphql-tag';

const fragments = {};
const queries = {};

fragments.authorData = gql`
	fragment authorData on User {
		userId,
		firstName,
		lastName,
		email,
	}
`;

fragments.imageInfo = gql`
	fragment imageInfo on MediaItem {
		mediaItemId,
		mediaType,
		caption,
		author{
			...authorData
		},
		date,
		dateGmt,
		sourceUrl,
		mediaDetails{
			height,
			width,
		}
	}
	${fragments.authorData}
`;

fragments.related = gql`
	fragment related on Post {
		postId,
		uri,
		title,
		link,
	}
`;

fragments.articleInfo = gql`
	fragment articleInfo on Post {
		postId,
		uri,
		title(format:RENDERED),
		link,
		categories: termNames( taxonomies:CATEGORY ),
		dateGmt,
		date,
		modifiedGmt,
		modified,
		author{
			...authorData
		},
		excerpt(format:RENDERED),
		content(format:RENDERED),
		featuredMedia: featuredImage{
			...imageInfo
		}
		primaryTag{
      node{
        posts{
          nodes{
           ...related
          }
        }
      }
    }
		contentGalleryMap:contentGalleryMap{
      edges:edges{
        node:node{
          ...imageInfo
        }
      }
    }	
	}
	${fragments.authorData}
	${fragments.imageInfo}
	${fragments.related}
`;

queries.categoryFeed = gql`
	query categoryFeed( $numArticles: Int!, $feedCategory: Int! ){
		posts( first: $numArticles, where: {categoryId: $feedCategory} ) {
			edges {
				node {
					...articleInfo
				}
			}
		}
	}
	${fragments.articleInfo}
`;

queries.imageByIds = gql`
	query imageByIds( $imageIds: [ID]! ) {
		mediaItems( where: { in: $imageIds } ) {
			nodes {
				...imageInfo
			}
		}
	}
	${fragments.imageInfo}
`;

queries.search = gql`
	query search( $numArticles: Int!, $q: String!, $y: Int!, $m: Int!, $d: Int! ){
		posts( first: $numArticles, where: {
			search: $q,
			dateQuery: {
	      after: {
	        month: $m,
	        year: $y,
	        day: $d,
	      }
    	},
			orderby: {
      	field: DATE
			},
		} ) {
			edges {
				node {
					...articleInfo
				}
			}
		}
	}
	${fragments.articleInfo}
`;

export { queries, fragments };
