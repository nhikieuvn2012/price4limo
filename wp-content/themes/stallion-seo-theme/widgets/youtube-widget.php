<?php
add_action( 'widgets_init', 'stallion_youtube_widget' );
function stallion_youtube_widget() {
register_widget( 'st_youtube_widget' );
}
class st_youtube_widget extends WP_Widget {
function st_youtube_widget() {

$widget_ops = array( 'classname' => 'st_youtube', 'description' => __('Include recent YouTube videos from a YouTube Users RSS Feed with RSS URL format http://gdata.youtube.com/feeds/base/users/CrayzyFool/uploads', 'Stallion') );
$control_ops = array( 'width' => 300, 'height' => 300, 'id_base' => 'stallion_youtube_widget' );
$this->WP_Widget( 'stallion_youtube_widget', __('Stallion YouTube RSS Widget', 'Stallion'), $widget_ops, $control_ops );
}

function widget( $args, $instance ) {
extract( $args );

$st_yt_widget_title = apply_filters('widget_title', $instance['st_yt_widget_title'] );
$st_yt_video_number = $instance['st_yt_video_number'];
$st_yt_video_width = $instance['st_yt_video_width'];
$st_yt_video_height = $instance['st_yt_video_height'];
$st_yt_rss_feed = $instance['st_yt_rss_feed'];

echo $before_widget;
if ( $st_yt_widget_title )
echo $before_title . $st_yt_widget_title . $after_title; ?>

<?php
$count = 1;
include_once(ABSPATH . WPINC . '/rss.php');
$rss = fetch_rss($instance['st_yt_rss_feed']);
#include_once(ABSPATH . WPINC . '/class-simplepie.php');
#$rss = fetch_feed($instance['st_yt_rss_feed']);
$st_max_vids = $instance['st_yt_video_number'];
$items = array_slice($rss->items, 0, $st_max_vids);
#$items = $rss->get_items(0, $st_max_vids); 
?>
<?php
foreach ( $items as $item ) :
$st_youtube_id = strchr($item['link'],'=');
$st_youtube_id = substr($st_youtube_id,1);
$st_video_width = $instance['st_yt_video_width'];
?>
<div class="styoutube">
<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/<?php echo $st_youtube_id ?>&amp;hl=en_US&amp;fs=1&amp;rel=0" style="display:block;width:<?php echo $instance['st_yt_video_width']; ?>px;height:<?php echo $instance['st_yt_video_height']; ?>px;">
<param name="allowFullScreen" value="true" />
<param name="allowscriptaccess" value="always" />>
<param name="movie" value="http://www.youtube.com/v/<?php echo $st_youtube_id ?>&amp;hl=en_US&amp;fs=1&amp;rel=0" />
</object>
</div>
<?php $count = $count + 1; endforeach; ?>
<?php 
echo $after_widget;
}

function form( $instance ) {
$defaults = array(
'st_yt_widget_title' => __('Recent YouTube Videos', "Stallion"),
'st_yt_video_width' => '300',
'st_yt_video_height' => '200',
'st_yt_video_number' => '1',
'st_yt_rss_feed' => 'http://gdata.youtube.com/feeds/base/users/CrayzyFool/uploads');

$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p><label for="<?php echo $this->get_field_id( 'st_yt_widget_title' ); ?>"><?php _e('Title:', "Stallion"); ?></label>
<input id="<?php echo $this->get_field_id( 'st_yt_widget_title' ); ?>" name="<?php echo $this->get_field_name( 'st_yt_widget_title' ); ?>" value="<?php echo $instance['st_yt_widget_title']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_yt_video_width' ); ?>"><?php _e('Video Width:', "Stallion"); ?></label>
<input id="<?php echo $this->get_field_id( 'st_yt_video_width' ); ?>" name="<?php echo $this->get_field_name( 'st_yt_video_width' ); ?>" value="<?php echo $instance['st_yt_video_width']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_yt_video_height' ); ?>"><?php _e('Video Height:', "Stallion"); ?></label>
<input id="<?php echo $this->get_field_id( 'st_yt_video_height' ); ?>" name="<?php echo $this->get_field_name( 'st_yt_video_height' ); ?>" value="<?php echo $instance['st_yt_video_height']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_yt_video_number' ); ?>"><?php _e('Number of YouTube videos to show:', "Stallion"); ?></label>
<input id="<?php echo $this->get_field_id( 'st_yt_video_number' ); ?>" name="<?php echo $this->get_field_name( 'st_yt_video_number' ); ?>" value="<?php echo $instance['st_yt_video_number']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_yt_rss_feed' ); ?>"><?php _e('Youtube User RSS Feed:', "Stallion"); ?></label>
<textarea rows="3" id="<?php echo $this->get_field_id( 'st_yt_rss_feed' ); ?>" name="<?php echo $this->get_field_name( 'st_yt_rss_feed' ); ?>" style="width:100%;"><?php echo $instance['st_yt_rss_feed']; ?></textarea></p>
<?php } } ?>