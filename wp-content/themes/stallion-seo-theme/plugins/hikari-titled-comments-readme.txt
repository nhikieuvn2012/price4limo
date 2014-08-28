Below is the original Hikari Titled Comments Plugin readme file. I've made no changes to the plugin file hikari-titled-comments.php, so in theory if the plugin is updated by the original author you might be able to copy it over the file in this folder (won't know until you try :-)) If you do try to update make sure you have a backup of the hikari-titled-comments.php file in case it breaks.

Stallion template files include all the relevant code for running this plugin. All you have to do to activate is go to the Stallion SEO Advanced options page and tick a box (that's all you have to do).

David Law

=== Hikari Titled Comments ===
Contributors: shidouhikari 
Donate link: http://Hikari.ws/wordpress/#donate
Tags: comment, comments, metadata, title, titled, theme, SEO, Drupal
Requires at least: 2.9.0
Tested up to: 2.9.2
Stable tag: 0.02.02

Hikari Titled Comments enables each comment to have a title, so that commentators can give a subject meaning to their comments.

== Description ==

One of the best features Drupal has and I miss in Wordpress is the possibility to set title to comments.

With a title, we can identify the comment subject, it can be resumed to a phrase. Comments become more similar to articles and aggregate more value.

I like to see comments as mini-articles. The post being the main article and comments being mini-articles that extend the main one. Now with title, Wordpress comments are a bit closer to that approach.

<a href="http://hikari.ws/titled-comments/">Hikari Titled Comments</a> enables each comment to have a title, so that commentators can give a subject meaning to their comments.


= Features =

* Comments titles are stored as comment metadata.
* It's easy for themes to add support the plugin, being the support optional and when the plugin is not available the support just remains hidden.
* A simple function prints the comment title if there is one, or prints nothing if current comment doesn't have a title.
* Comments titles can be edited from admin comment edit page.


I dedicate Hikari Titled Comments to **Chiih-chan**, my kawaii great frient ^-^



== Installation ==

**Hikari Titled Comments** requires theme modifications to be used, unfortunately there is no way to insert titles to comments without editing the theme. But first let's install it.


You can use the built in installer and upgrader, or you can install the plugin manually.

1. Download the zip file, upload it to your server and extract all its content to your <code>/wp-content/plugins</code> folder. Make sure the plugin has its own folder (for exemple  <code>/wp-content/plugins/hikari-titled-comments/</code>).
2. Activate the plugin through the 'Plugins' menu in WordPress admin page.


There's no options page at the moment. You can go to Edit Comment Admin Page and try to edit any comment, and the title box will be there so you can add title to existing ones. But now it's time to edit your theme to have them shown and let your visitors set titles to their new comments.



= Preparing your theme =

There are 2 steps you do to add titled comments support to your theme. First you include the title to your comment building code, second you include an input text to your comment form so that users can submit the title.



First thing you must do is find your comment building code, your search starts in your theme's file <code>comments.php</code>. If you don't have experience editing themes, you may need help. The person who developed your theme is the obvious first suggestion.

Since Wordpress 2.7, themes use the function <code>wp_list_comments()</code> to print comments, with support to threads, pagination, etc. This function has a parameter called *callback*, that points to a theme function that has the comment code.

For exemple, in <code>wp_list_comments('style=ol&type=comment&callback=prefix_comment')</code>, the comment function is <code>prefix_comment</code>. Now you must find this function in your theme, I like to have it in <code>comments.php</code> itself, but many tutorials say to move the function to <code>functions.php</code>, just look around.

If your <code>wp_list_comments</code> doesn't have a *callback* parameter, you reached a dead end, your theme uses Wordpress's default code and it can't be edited. You'll have to design a comment layout for your theme to be able to give a title to your comments. It's not hard or complex, but if you are reading this and don't know what to do you'll need to read a lot and learn a bit before proceeding.



Ok, you've found your comment building code. There is no specific place to add a title to your comments, use your imagination. I like to see comments as mini-articles, or extensions of the post. Generally titles come on the top of the article, followed by the author and the article's date, and then the content.

Once you choose where the title will go in each comment, I tell you that not all comments have titles. Your old comments don't have, and commentators are not required to use a title (at least for now). So you must have in mind that a title may or may not be present, both layouts must look good and be XHTML valid.

The function you use to add the title is <code>function hkTC_comment_title( $comment_id=null, $before=null, $after=null)</code>. If <code>$comment_id</code> is empty, it will try to find <code>global $comment</code>. You can also pass any text to be used before and after the title, probably some HTML tag to surround the title text, these string are not escaped so pass them in the final format they'll be sent to browsers.

If current comment has a title, the function will print <code>echo $before.$comment_title.$after;</code>. If it hasn't, the function will just return without doing anything. Here's the final code I use in my theme:

<code>
<?php if(function_exists('hkTC_comment_title'))
	hkTC_comment_title($comment->comment_ID,'<h2 class="comment-title">','</h2>');
?>
</code>



**Nice! Your theme is ready to print titles to your comments, now you must let your visitors submit them!** Your next stop is in your theme's comment form, also inside <code>comments.php</code>. Again, your creativity will tell you where to include the text field, I've chosen just above the comment textarea, with a header to say it's meant for the title.

There's nothing much to say here, it's a simple input text that's added if the <code>hkTC_comment_title</code> function exists. The function isn't used here, but we test it to assure the input text is only included if the plugin is activated to receive its parameter. Just make sure you don't change its 'name' and 'id' attributes.

<code>
<?php if(function_exists('hkTC_comment_title')) { ?>
	<h3>Comment Title</h3>
	<input type="text" name="hikari-titled-comments" id="hikari-titled-comments" tabindex="4" value="" />
<?php } ?>
</code>



And that's it! Now you are ready to aggregate value to your site's comments!

= Upgrading and uninstalling =

If you have to upgrade manually, simply delete <code>hikari-titled-comments</code> folder and follow installation steps again.

If you wanna deactivate the plugin, just use the option in plugins page. Your theme will keep the new code for titles, but it will remain asleep while the plugin is not available.

In future version I'm gonna include an option to delete titles metadata from database.

== Frequently Asked Questions ==

= Isn't there a way to use comment title without editing my theme? =

Unfortunately no. The only action hook that Wordpress offers as default for themes to have in comments is 'comment_form', that normally is added below the comment textarea, it doesn't offer enough flexibility. And also there is no way for a plugin to include title to comments.

In reality, it could be done, but these 2 elements would hardly fit to themes layouts, you'd have a lot of trouble styling them, so it's much easier to just edit the theme.

= My theme uses Wordpress default comment building, it doesn't have the *callback* function, can I add title to my site comments? =

You can, but you'll have to create that function. If you're using the default code, your comments are already simple, so just search the Web for a tutorial teaching how to create it. Then you'll be able to add title to your site comments :)

= I use a free downloaded theme, I know nothing about HTML or CSS and the theme author doesn't provide support, can you help me do it? =

I'd love to be able to help, but it would require a few hours examining the theme, and even more time if its comment code is very different from standard, or some work if it uses Wordpress default comment code.

Many themes also have damn ugly code that is pratically unreadable (if you've never read themes codes, believe me, I've already used a theme that was pretty looking in the browser but its code almost made me suicide its author!).

Unfortunately I don't have the time to do it. You of course can contact me if you find a bug or have any trouble that may involve my plugin code, but please don't ask me for themes support.

= Can I add title to old comments and edit title of comments after they are created? =

Yes, just go to Edit Comment Admin Page.

Go to the admin page where you see a list of your site comments and click the edit option (not the quick edit!) for the comment you wanna edit. In the page that will open, below the comment textarea there will be a box with an input text containing its current title (or empty if the comment has no title). Edit it as you want and save the comment :)

= Can I have a usage exemple? =

Sure, go to my plugin's home page and add comments saying what you think about having titles in comments :)

= Does the plugin have security protection? Does it filter submited title? Can a hacker or a spammer use it to gain control of my site? =

When a registered user edits an existing comment's title, wpnonce is used against the plugin filename AND this comment ID, so Wordpress controls security regarding somebody trying to force a comment title change. A user also must have permission to edit a post to edit its comments' titles.

For a new comment being created, I've used no special security measure. If a user or visitor is allowed to create a comment, he is allowed to give it a title too. I let Wordpress manage permissions to add new comments, if it's not allowed Wordpress will simply not trigger the action that Hikari Titled Comments plugin uses to create the title. There are also spam protection plugins that deal with permissions to add comments.

Now, regarding what a user can use in a title (add a link to it for exemple), I've used the filter <code>wp_filter_kses()</code> to control it, it's the same filter used in the comment body. In the same way Wordpress works, if a user has 'unfiltered_html' permission, his comment body and title are not filtered, and if he doesn't have this permission the filter is used.

And if you also use the <a href="http://hikari.ws/email-url-obfuscator/">Hikari Email & URL Obfuscator</a> plugin, it will obfuscate any link that may exist in a title :)

With these measures, I belive comment title is dealt in a similar way comment body is, I don't believe comment title must or should have deeper control than comment body. But if you think it should be done differently, just add a comment, with title ;) , to the plugin homepage with your ideas and concerns :)


== Screenshots ==

1. A normal comment without a title
2. The same comment, now with a title/subject
3. Exemple of a comment form with the title input text
4. Edit Comment Admin Page, with the title metabox


== Changelog ==

= 0.02 - 13/03/2010 =
* Fix: removed code to delete comment title when a comment is deleted, Wordpress core handles deleting comments metadata by itself.
* Fix: fixed a bug where all titles were deleted when a comment without title (or having its title deleted) was editied. **Update ASAP to not have your titles deleted by the bug!**

= 0.01 - 05/03/2010 =
* First public release.

== Upgrade Notice ==

= 0.01 and above =
If you have to upgrade manually, simply delete <code>hikari-titled-comments</code> folder and follow installation steps again.
