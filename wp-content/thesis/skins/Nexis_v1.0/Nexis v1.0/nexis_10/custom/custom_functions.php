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

/*-------------------------------------------------------------------------------------------------------
   NAVIGATION
-------------------------------------------------------------------------------------------------------*/

function full_width_nav() { ?>
	<div id="nav_area" class="full_width">
		<div class="page">
			<?php thesis_nav_menu(); ?>
		</div>
	</div>
<?php }
	add_action('thesis_hook_before_content_area', 'full_width_nav', 1);
	remove_action('thesis_hook_before_header', 'thesis_nav_menu');


function catnav() { ?>
	<div id="catnav" class="full_width">
		<div class="page">
			<ul>
				<?php $categories = get_categories(); foreach ($categories as $cat) {
				echo '<li><a href="'.get_category_link( $cat->cat_ID ).'"><span>'.$cat->cat_name.'</span>'. category_description($cat->cat_ID).'</a></li>' ;
				} ?>
			</ul>
		</div>
	</div>
<?php }
	add_action('thesis_hook_before_content_area', 'catnav', 2);


/*-------------------------------------------------------------------------------------------------------
   POST FOOTER
-------------------------------------------------------------------------------------------------------*/

remove_action('thesis_hook_after_post', 'thesis_comments_link');


function post_footer() { if (is_single()) { ?>
	<div id="author_box">
		<?php echo get_avatar( get_the_author_id() , 120 ); ?>
		<h3>Article by <?php the_author_posts_link(); ?></h3>
		<p><?php the_author_description(); ?></p>
	</div>
<?php } }
	add_action('thesis_hook_after_post', 'post_footer');


/*-------------------------------------------------------------------------------------------------------
   FOOTER
-------------------------------------------------------------------------------------------------------*/

function footer() { ?>
	<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column 1') ){ ?>
		<li>
			<h3>Custom Widget 1</h3>
		<p>This widget is completely customizable and can be controlled via the Widgets Panel in <em>Admin &rarr; Appearance &rarr; Widgets &rarr; Footer Column 1</em></p>
		</li>
		<? } ?>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column 2') ){ ?>
		<li>
			<h3>Custom Widget 2</h3>
		<p>This widget is completely customizable and can be controlled via the Widgets Panel in <em>Admin &rarr; Appearance &rarr; Widgets &rarr; Footer Column 2</em></p>
		</li>		
		<? } ?>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column 3') ){ ?>
		<li class="last">
			<h3>Custom Widget 3</h3>
		<p>This widget is completely customizable and can be controlled via the Widgets Panel in <em>Admin &rarr; Appearance &rarr; Widgets &rarr; Footer Column 3</em></p>
		</li>		
		<? } ?>
	</ul>
	<div id="copyright">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Copyright') ){ ?>
		<p>Enter your own copyright text here using a <em>text widget</em>.</p>
		<? } ?>
		<!-- Make sure you have the proper licensing before deleting either copyrights -->
		<p>Built on <a href="http://diythemes.com/thesis/">Thesis</a>. <a href="http://kolakube.com/">Thesis skins by Kolakube</a></p>
		<!-- / Make sure you have the proper licensing before deleting either copyrights -->
	</div>
<?php }
	add_action('thesis_hook_footer', 'footer');
	remove_action('thesis_hook_footer', 'thesis_attribution');
	register_sidebar(array('name'=>'Footer Column 1', 'before_title' => '<h3>', 'after_title' => '</h3>', 'before_widget' => '<li>', 'after_widget'  => '</li>'));
	register_sidebar(array('name'=>'Footer Column 2', 'before_title' => '<h3>', 'after_title' => '</h3>', 'before_widget' => '<li>', 'after_widget'  => '</li>'));
	register_sidebar(array('name'=>'Footer Column 3', 'before_title' => '<h3>', 'after_title' => '</h3>', 'before_widget' => '<li class="last">', 'after_widget'  => '</li>'));
	register_sidebar(array('name'=>'Footer Copyright', 'before_widget' => '', 'after_widget'  => ''));
	
?>