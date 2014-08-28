<?php
/* Based on Extended Recent Comments plugin by Louy Alakkad - http://louyblog.wordpress.com/ */
/*
Copyright (C) 2011 David Law (http://www.stallion-theme.com/ email davidlseo(at)gmail(dot)com)
*/
/**
 * init Stallion WordPress SEO Recent Comments by registering our widget.
 */
function stallion_wseo_init() {
register_widget('Stallion_WSEO_Recent_Comments_Widget');
}
add_action( 'widgets_init', 'stallion_wseo_init' );

// load translations
#load_plugin_textdomain( 'stallion-wseo-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
/**
 * Recent_Comments widget class
 *
 * @since 2.8.0
 */
class Stallion_WSEO_Recent_Comments_Widget extends WP_Widget {

function Stallion_WSEO_Recent_Comments_Widget() {
		$widget_ops = array('classname' => 'stallion_widget_wseo', 'description' => __( 'Most recent comments, with Gravatars, comment excerpts with no wasted link benefit to author links.' , 'stallion-wseo-widget') );
		$this->WP_Widget('stallion-wseo-recent-comments', __('Stallion SEO Recent Comments Widget', 'stallion-wseo-widget'), $widget_ops);
		$this->alt_option_name = 'stallion_widget_wseo';

		if ( is_active_widget(false, false, $this->id_base) )
#add_action( 'wp_head', array(&$this, 'widget_style') );
		add_action( 'comment_post', array(&$this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array(&$this, 'flush_widget_cache') );
	}

function widget_style() { ?>
<style type="text/css">.stallionseocomments{list-style:none !important;} .stallionseocomments img{padding:0;margin:3px;float:<?php echo is_rtl() ? 'right' : 'left'; ?>;}</style>
<?php }
	function flush_widget_cache() {
		wp_cache_delete('stallion_widget_wseo', 'widget');
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('stallion_widget_wseo', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';
 		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Comments', 'stallion-wseo-widget') : $instance['title']);

		if ( ! $number = (int) $instance['number'] )
 			$number = 5;
 		else if ( $number < 1 )
 			$number = 1;

		$size = $instance['size'];

		$comments = get_comments( array( 'number' => $number, 'status' => 'approve' ) );
		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

$output .= '<ul class="stallionseocomments">';
if ( $comments ) {
foreach ( (array) $comments as $comment) {
/* possible future code to remove gravatar image, turn into background image: better SEO wise
$email = $comment->comment_author_email;
$size = 40;
$rating = get_option('avatar_rating');
$gravtype = get_option('avatar_default');
$default = urlencode( 'http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=' . $size );
if ($gravtype=='mystery')
$grav_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $email ) ) ). '?s=' . $size . '&r=' . $rating . '&d=' . $default;
elseif ($gravtype=='blank')
$grav_url = "/wp-includes/images/blank.gif";
else 
$grav_url = "http://0.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size ."&amp;d=" . $gravtype ."&amp;r=". $rating;
$output .=  '<li class="stallionseocomments2" style="background: url('.$grav_url.') no-repeat;">';
*/
$output .=  '<li class="stallionseocomments2">';
$output .=  get_avatar(get_comment_author_email($comment->comment_ID), $size) . ' ';
/* KEY: comments widget: 1: comment excerpt, 2: post link */
$output .= sprintf(__('%2$s &raquo; %1$s', 'stallion-wseo-widget'), get_comment_excerpt(), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '"><strong>' . get_comment_author($comment->comment_ID) . ' - ' . get_the_title($comment->comment_post_ID) . '</strong></a>');
$output .=  '</li>';
}
}
$output .= '</ul>';
		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('stallion_widget_wseo', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['size'] = ( $new_instance['size'] < 20 ) ? 20 : (int) $new_instance['size'];
		
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['stallion_widget_wseo']) )
			delete_option('stallion_widget_wseo');

		return $instance;
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		$size = isset($instance['size']) ? absint($instance['size']) : 40;
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'stallion-wseo-widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:', 'stallion-wseo-widget'); ?></label>
<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Gravatar size:', 'stallion-wseo-widget'); ?></label>
<input id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" type="text" value="<?php echo $size; ?>" size="3" /></p>
<?php } } ?>