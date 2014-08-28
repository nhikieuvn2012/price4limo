<?php ?>
<?php
add_theme_support( 'post-formats', array(
'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
 ) );
?>
<?php /* translation : future use */
load_theme_textdomain( 'stallion', get_template_directory() . '/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
require_once( $locale_file );
?>
<?php if (function_exists('st_disp_warn2')){ ?><?php
function get_header2(){include (get_template_directory() . "/header2.php");}
?>
<?php 
register_nav_menus(array(
'primary' => __( 'Primary Navigation', 'stallion' ),
'secondary' => __( 'Secondary Navigation', 'stallion' ),
'footer' => __( 'Footer Links', 'stallion' ),
'custom-sliding-menu' => __( 'Photo Navigation', 'stallion' ),
));
?>
<?php
if(st_home_nav_link()==1){
function my_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'my_page_menu_args' );
}
?>
<?php 
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 300, 200, true );
add_custom_background();
?>
<?php
if ( function_exists('add_post_type_support') ) {
add_action('init', 'add_page_excerpts');
function add_page_excerpts() {
add_post_type_support( 'page', 'excerpt' );}}
?>
<?php
function new_excerpt_length($length) {
return st_excerpt_length();}
add_filter('excerpt_length', 'new_excerpt_length');
?>
<?php if(st_comment_links_html()==1){
remove_filter('comment_text', 'make_clickable', 9);
} ?>
<?php if(st_comment_nofollow()==1){
remove_filter('pre_comment_content', 'wp_rel_nofollow', 15);
} ?>
<?php
function remove_nofollow($link, $args, $comment, $post){
return str_replace("rel='nofollow'", "", $link);
}
add_filter('comment_reply_link', 'remove_nofollow', 420, 4);
?>
<?php
function remove_nofollow2($link){
return str_replace("nofollow", "me", $link);
}
add_filter('get_comment_author_link', 'remove_nofollow2', 420, 4);
?>
<?php
function keep_me_logged_in_for_1_year( $expirein ) {
return 31556926;
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
?>
<?php
add_action( 'wp_print_styles', 'my_deregister_styles', 100);
function my_deregister_styles() {wp_deregister_style( 'wp-pagenavi' );
}
?>
<?php function pc_add_php_version() { ?>
<script language="javascript">
jQuery(document).ready(function($) {
$("#wp-version-message .b").after("<span>, with PHP <b><?php echo phpversion(); ?></b></span>");
});
</script>
<?php } add_action('rightnow_end', 'pc_add_php_version'); ?><?php } ?>
<?php if(st_thumbs_admin()==1){
add_filter('manage_pages_columns', 'posts_columns', 5);
add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
$defaults['riv_post_thumbs'] = __('Featured Image');
return $defaults;
}
function posts_custom_columns($column_name, $id){
if($column_name === 'riv_post_thumbs'){
echo the_post_thumbnail( array(75,75) );
}
}
}
?>
<?php 
function get_image_path($src) {
global $blog_id;
if(isset($blog_id) && $blog_id > 0) {
$imageParts = explode('/files/' , $src);
if(isset($imageParts[1])) {
$src = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
}
}
return $src;
}
?>
<?php if(st_thumbs_admin()==1){
add_filter('manage_pages_columns', 'posts_columns2', 5);
add_action('manage_pages_custom_column', 'posts_custom_columns2', 5, 2);
add_filter('manage_posts_columns', 'posts_columns2', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns2', 5, 2);
function posts_columns2($defaults){
$defaults['riv_post_thumbs2'] = __('Stallion Thumbnail');
return $defaults;
}
function posts_custom_columns2($column_name, $id){
if($column_name === 'riv_post_thumbs2'){
$st_ft_thumb = get_image_path(get_post_meta( $id, 'thumb', true ));
if($st_ft_thumb !=''){
echo "<img width=\"75\" height=\"75\" src='" .get_template_directory_uri(). "/timthumb.php?src=".$st_ft_thumb."&amp;w=75&amp;h=75&amp;zc=1&amp;q=75' />";
}
}
}
}
?>
<?php 
add_filter('user_contactmethods','st_profile_fields',10,1);
function st_profile_fields( $st_profile_fields ) {
$st_profile_fields['st_pro_authorname'] = 'Author Biography Name<br />David Law';
$st_profile_fields['st_pro_authorwebsiteurl'] = 'Author Biography Website URL<br />http://www.stallion-theme.com/';
$st_profile_fields['st_pro_authorwebsiteanchor'] = 'Author Biography Website Anchor Text<br />Stallion theme';
$st_profile_fields['st_pro_googleplus'] = 'Google Plus Profile<br />https://plus.google.com/115218034784885853617/';
$st_profile_fields['st_pro_facebook'] = 'Facebook Profile<br />http://www.facebook.com/david.c.law';
$st_profile_fields['st_pro_twitter'] = 'Twitter Profile<br />https://twitter.com/DavidLaw';
$st_profile_fields['st_pro_linkedin'] = 'LinkedIn Profile<br />http://uk.linkedin.com/pub/david-law/37/4b6/944';
$st_profile_fields['st_pro_stumbleupon'] = 'StumbleUpon Profile<br />http://www.stumbleupon.com/stumbler/davidclaw/';
$st_profile_fields['st_pro_youtube'] = 'Youtube Channel<br />https://www.youtube.com/user/CrayzyFool';
$st_profile_fields['st_pro_flickr'] = 'Flickr Profile<br />http://www.flickr.com/photos/54373254@N06/';
$st_profile_fields['st_pro_rssfeed'] = 'RSS Feed<br />http://feeds.feedburner.com/Stallion-Wordpress-Seo-Theme';
return $st_profile_fields;
}
?>