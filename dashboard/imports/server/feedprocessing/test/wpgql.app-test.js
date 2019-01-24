import { assert } from 'chai';
import wpgql from '../wpgql';
import Embeds from '../wpgql/embeds';

/* eslint-disable */
const mockFeedData = [
	{
		postId: 1,
		content: "&lt;p&gt;A man who held up a&nbsp;&quot;Trump 2020&quot; sign while riding Splash Mountain at Disney World says he&nbsp;has been banned from the park for life.&lt;/p&gt;&lt;p&gt;[caption id=&quot;attachment_3271604&quot; align=&quot;alignright&quot; width=&quot;640&quot;]&lt;img class=&quot;size-article_inline_half lazyautosizes lazyload&quot; src=&quot;https://i1.wp.com/www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg?fit=620%2C9999px&amp;amp;ssl=1&quot; sizes=&quot;440px&quot; srcset=&quot;https://i1.wp.com/www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg?fit=620%2C9999px&amp;amp;ssl=1 620w,https://i1.wp.com/www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg?fit=310%2C9999px&amp;amp;ssl=1 310w&quot; width=&quot;640&quot; data-src=&quot;https://i1.wp.com/www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg?fit=620%2C9999px&amp;amp;ssl=1&quot; data-srcset=&quot;https://i1.wp.com/www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg?fit=620%2C9999px&amp;amp;ssl=1 620w,https://i1.wp.com/www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg?fit=310%2C9999px&amp;amp;ssl=1 310w&quot; /&gt; A man holds up a Trump 2020 sign while going down Splash Mountain at Disney World.[/caption]&lt;/p&gt;&lt;p&gt;Dion Cini of New York City donned a &quot;Make America Great Again&quot; visor and strategically held up a &quot;Trump 2020&quot; banner so it would show up in the on-ride photos that are available for purchase near the exit of Splash Mountain.&lt;/p&gt;&lt;p&gt;NBC News&nbsp;reports that Cini&nbsp;was later told that he has been permanently prevented from visiting its parks.&lt;/p&gt;&lt;p&gt;Disney told NBC that it wasn&#039;t the content of Cini&#039;s sign that resulted in the ban but the fact that he held up a sign &quot;to incite a crowd.&quot;&lt;/p&gt;&lt;p&gt;Read more at &lt;a href=&quot;https://www.thedenverchannel.com/news/national/disney-world-bans-man-for-life-for-holding-up-trump-2020-banner-on-splash-mountain&quot;&gt;thedenverchannel.com&lt;/a&gt;.&lt;/p&gt;&lt;p&gt;[related_articles location=&quot;right&quot; show_article_date=&quot;false&quot; article_type=&quot;automatic-primary-tag&quot;]&lt;/p&gt;",
	}
];

const expectedMockOutput = [
	{
		postId: 1,
		content: "&lt;p&gt;A man who held up a&nbsp;&quot;Trump 2020&quot; sign while riding Splash Mountain at Disney World says he&nbsp;has been banned from the park for life.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Dion Cini of New York City donned a &quot;Make America Great Again&quot; visor and strategically held up a &quot;Trump 2020&quot; banner so it would show up in the on-ride photos that are available for purchase near the exit of Splash Mountain.&lt;/p&gt;&lt;p&gt;NBC News&nbsp;reports that Cini&nbsp;was later told that he has been permanently prevented from visiting its parks.&lt;/p&gt;&lt;p&gt;Disney told NBC that it wasn&#039;t the content of Cini&#039;s sign that resulted in the ban but the fact that he held up a sign &quot;to incite a crowd.&quot;&lt;/p&gt;&lt;p&gt;Read more at &lt;a href=&quot;https://www.thedenverchannel.com/news/national/disney-world-bans-man-for-life-for-holding-up-trump-2020-banner-on-splash-mountain&quot;&gt;thedenverchannel.com&lt;/a&gt;.&lt;/p&gt;&lt;p&gt;[related_articles location=&quot;right&quot; show_article_date=&quot;false&quot; article_type=&quot;automatic-primary-tag&quot;]&lt;/p&gt;",
		otherImages: [
			{
				"mediaItemId": 3271604,
				"mediaType": "image",
				"caption": "<p>A man holds up a Trump 2020 sign while going down Splash Mountain at Disney World.</p>\n",
				"author": {
					"userId": 409,
					"firstName": "Matt",
					"lastName": "Schubert",
					"email": "mschubert@denverpost.com"
				},
				"date": "2018-11-14 19:39:48",
				"dateGmt": "2018-11-15T02:39:48",
				"sourceUrl": "https://www.denverpost.com/wp-content/uploads/2018/11/splash-mountain3.jpg",
				"mediaDetails": {
					"height": 480,
					"width": 640
				},
			},
		],
	}
];
const video = { "multiVideo" : [
	{
		"type": "youtube",
		"html": "<iframe  width='640' height='360' src='https://www.youtube.com/embed/19MsGy4pGCg?rel=1&fs=1&autohide=2&showsearch=0&showinfo=1&iv_load_policy=1&wmode=transparent'allowfullscreen='true' ></iframe>",
	}
],
"video": { 
	"type": "youtube",
	"html": "<iframe  width='640' height='360' src='https://www.youtube.com/embed/19MsGy4pGCg?rel=1&fs=1&autohide=2&showsearch=0&showinfo=1&iv_load_policy=1&wmode=transparent'allowfullscreen='true' ></iframe>",
}
};
const relatedMock = [ {
		"uri": "uri test" ,
		"link": "http://test.com",
		"title": "Title",
}
]
const relatedRes = '<aside class="related left"><h2 class="widget-title" ' +
	'data-curated-ids="" data-relation-type="automatic-primary-tag">' +
	'Related Articles</h2><br /><ul><li> <a class="article-title" href="http://test.com" title="Title">Title</a> </li></ul></aside>';
	const twitterRes = {
	            "html": "<blockquote class=\"twitter-tweet\" data-width=\"500\" data-dnt=\"true\"><a href=\"https://twitter.com/DominickCruz/status/1070220805986906112\"></a></blockquote><script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>",
	            "img": 0
	 };
	 const instagramRes = [
             {
                 "id": "Bnw4BV3BUP1/",
                 "html": "<blockquote class=\"instagram-media\" data-instgrm-captioned data-instgrm-permalink=\"https://www.instagram.com/p/Bnw4BV3BUP1/?utm_source=ig_embed&utm_medium=loading\" data-instgrm-version=\"12\" ><div > <a href=\"https://www.instagram.com/p/Bnw4BV3BUP1/?utm_source=ig_embed&utm_medium=loading\" target=\"_blank\"></a>  Instagram</div></blockquote><script async defer src=\"https://platform.instagram.com/en_US/embeds.js\"></script>"
             }
         ];		
/* eslint-enable */


const mochaAsync = fn =>
	async ( done ) => {
		try {
			await fn();
			done();
		} catch ( err ) {
			done( err );
		}
	};

describe( 'WP GraphQL module', function () {
	it( 'retrieveData returns null when passed an invalid URL',
		mochaAsync( async () => {
			const response = await wpgql.retrieveData( '' );
			assert.equal( response, null );
		} ) );

	it( 'retrieveImages returns content without captions and with images', function () {
		mochaAsync( async () => {
			const response = await wpgql.retrieveData(
				'https://www.denverpost.com/wp-json/wp/v2/posts?categories=30&per_page=30',
				mockFeedData,
			);
			assert.deepEqual(
				response,
				mockFeedData,
				'Image processing failed',
			);
		} );
	} );
	it( 'Testing GraphQL relatedArticles function',
	function () {
		assert.equal( Embeds.relatedArticles( relatedMock, 'test uri' ),
			relatedRes );
	} );
	it( 'Testing GraphQL twitter function',
	function () {
		assert.deepEqual( Embeds.twitter( 'https://twitter.com/DominickCruz/status/1070220805986906112' ),
			twitterRes );
	} );
	it( 'Testing GraphQL instagram function',
	function () {
		assert.deepEqual( Embeds.instagram( 'https://www.instagram.com/p/Bnw4BV3BUP1/' ),
			instagramRes );
	} );
} );
