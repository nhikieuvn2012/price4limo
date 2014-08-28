Below is the original SEO Super Comments Plugin readme file. I've pulled out a lot of options from the original plugin source (not relevant to the Stallion setup), so a lot of the information below is not relevant. In Stallion all you have to do is tick one box under the Advanced SEO options page and everything is setup (that's all you have to do).

I've included this file with Stallion to give full credit to the original author Vladimir Prelovac who has some really good WordPress plugins. Well worth spending an hour browsing his site http://www.prelovac.com/ for other WordPress plugins and WordPress tips.

David Law

=== SEO Super Comments ===
Contributors: freediver
Donate link: https://www.networkforgood.org/donation/MakeDonation.aspx?ORGID2=520781390
Tags:  Post, posts, comments, links, seo, google, automatic, admin
Requires at least: 2.5
Tested up to: 2.8.4
Stable tag: trunk

SEO Super Comments turns your comments into new pages.


== Description == 

Read the whole idea behind the concept here [Seo Super Comments Concept](http://www.prelovac.com/vladimir/presenting-seo-super-comments-concept  "Seo Super Comments Concept")

For each user comment we will create a new dynamic page on the blog, holding the actual comment information. This page will not actually exist in WordPress database, but we will create it dynamically using a WordPress plugin.

What we instantly get in this way is big jump in site's index visible to search engines. This is possible because blog comments are crawl-able, index-able and most importantly rank-able content. Also meaning you will start to get search engine traffic for the context of the comment.

The old author link in the comments will now lead to the newly generated page. Author's URL will still be displayed (and we can do-follow it now as it will be only one external  link on the page).

The concept relies around optimizing the target page using title and H1 tag using the context of the comment. So basically we will take the excerpt of the comment and use it to create the page title and H1 tag and in the body we will old the content of the comment (plus some more goodies, read on).

Since now all comments normally drain page rank even when nofollowed  (bad for your site) the whole idea of using them to generate links back to your site instead and get free indexable content along the way, looks just much more appealing.

To spice things up, the dynamic comment page concept additionally features:

    * List of author's other comments on the post are presented (good value for the visitor, more content)
    * List of author's other comments on the blog (even more content, chance to interlink to your other posts, more value to the visitor)
    * Author url links are do-followed (option, but why not?)
    * Extra few clicks generated will increase your pageviews, lower the bounce rate and increase any CPM advertsing revenue
    * I have also created a mod for hugely popular XML sitemaps plugin to include all the new dynamic comment pages into your sitemap, so that the search engines can index the pages more quickly.


 
Plugin by <a href="http://www.prelovac.com/vladimir/services">WordPress Consultant</a> Vladimir Prelovac.

== Changelog ==  

= 0.6.4 =
* added admin and trackback check (thanks to Scribu)

= 0.6 =  
* Added special author sites option, which have their links intact and dofollowed
* Fixed linking to recent comments

= 0.4 =  
* Added a template option

= 0.1 =  
* Initial release

== Credits ==

Some of the ideas  came from other plugins. 

http://scott.sherrillmix.com/blog/blogger/creating-a-better-fake-post-with-a-wordpress-plugin/
http://www.semiologic.com/software/wp-tweaks/dofollow/

Thanks.

== Installation ==

1. Upload the whole plugin folder to your /wp-content/plugins/ folder.
2. Go to the Plugins page and activate the plugin.
3. Use the Options page to change your options
4. That is all. You can check your posts for new links.


== Screenshots ==

1. Graph represents 300 visitors daily coming to the new comment pages

== License ==

This file is part of SEO Super Comments.

SEO Super Comments is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

SEO Super Comments is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with SEO Super Comments. If not, see <http://www.gnu.org/licenses/>.


== Frequently Asked Questions ==

= How do I correctly use this plugin? =

Just install activate it on your blog. Default options are enough to get you going. If you want to tweak it, you can always edit the options. Be sure to check "ignore" options where you can state what keywords and phrases not to link.



= Can I suggest an feature for the plugin? =

Of course, visit <a href="http://www.prelovac.com/vladimir/wordpress-plugins/seo-super-comments#comments">SEO Super Comments Home Page</a>

= I love your work, are you available for hire? =

Yes I am, visit my <a href="http://www.prelovac.com/vladimir/services">WordPress Services</a> page to find out more.