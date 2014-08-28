<?php

// Using hooks is absolutely the smartest, most bulletproof way to implement things like plugins,
// custom design elements, and ads. You can add your hook calls below, and they should take the 
// following form:
// add_action('thesis_hook_name', 'function_name');
// The function you name above will run at the location of the specified hook. The example
// hook below demonstrates how you can insert Thesis' default recent posts widget above
// the content in Sidebar 1:
// add_action('thesis_hook_before_sidebar_1', 'thesis_widget_recent_posts');

// Delete this line, including the dashes to the left, and add your hooks in its place.

/**
 * function custom_bookmark_links() - outputs an HTML list of bookmarking links
 * NOTE: This only works when called from inside the WordPress loop!
 * SECOND NOTE: This is really just a sample function to show you how to use custom functions!
 *
 * @since 1.0
 * @global object $post
*/

function custom_bookmark_links() {
	global $post;
?>
<ul class="bookmark_links">
	<li><a rel="nofollow" href="http://delicious.com/save?url=<?php urlencode(the_permalink()); ?>&amp;title=<?php urlencode(the_title()); ?>" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url=<?php urlencode(the_permalink()); ?>&amp;title=<?php urlencode(the_title()); ?>', 'delicious', 'toolbar=no,width=550,height=550'); return false;" title="Bookmark this post on del.icio.us">Bookmark this article on Delicious</a></li>
</ul>
<?php
}

remove_action('thesis_hook_after_post', 'thesis_comments_link');

add_action('thesis_hook_after_header', 'main_navigation');

function main_navigation() { ?>
		<div id="main-nav">
			<ul>
				<li class="cat-item"><a title="title" href="#">Cat 1</a></li>
				<li class="cat-item"><a title="title" href="#">Cat 2</a>
					<ul><li class="cat-item"><a href="#">Level 1</a>
						<ul><li class="cat-item"><a href="#">Level 2</a></li></ul>
					</li></ul></li>
				<li class="cat-item"><a title="title" href="#">Cat 3</a></li>
				<li class="cat-item"><a title="title" href="#">Cat 4</a></li>
				<li class="cat-item"><a title="title" href="#">Cat 4</a></li>       
		    	 </ul>
		</div><!-- end of #main-nav -->
<?php }


/* Header
-----------------------------------------------------------*/
register_sidebars(1,
    array(
        'name' => 'Header Widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    )
);
function header_widget() { ?>
	<div id="header_widget">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Widget') ){	?>
						<ul><li class="widget"><div class="widget_box">You can edit the content that appears here by visiting your Widgets panel and modifying the <em>current widgets</em> in Header Widget.</div></li></ul><?php } ?>
	</div>
<?php }
add_action('thesis_hook_header', 'header_widget', '3');



/* Footer
-----------------------------------------------------------*/
/* register sidebars for widgetized footer */
if (function_exists('register_sidebar')) {
$sidebars = array(1, 2, 3);
foreach($sidebars as $number) {
register_sidebar(array(
'name' => 'Footer ' . $number,
'id' => 'footer-' . $number,
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="footer-widget-title">',
'after_title' => '</h3>'
));
}
}

/* Footer Widgets
-----------------------------------------------------------*/
function widgetized_footer() {
?>
<div id="footer-wrap">
<div class="footer-widget">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
<?php endif; ?>
</div>

<div class="footer-widget">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
<?php endif; ?>
</div>

<div class="footer-widget">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
<?php endif; ?>
</div>
</div>

<div id="copyright">
<p style="float:left;">&copy; Copyright 2010 <?php bloginfo('name'); ?> - All rights reserved</p>
<p style="float:right;">Powered by <a href="http://diythemes.com/">Thesis</a> and <a href="http://www.tricksdaddy.com">TricksDaddy</a></p>
</div>
<?php
}

add_action('thesis_hook_footer','widgetized_footer');
remove_action('thesis_hook_footer', 'thesis_attribution');
?>