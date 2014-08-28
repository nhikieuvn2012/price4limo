<?php class st_wg_flickr extends WP_Widget {
function st_wg_flickr() {
$widget_ops = array( 'description' => 'Show your Flickr Images.' );
parent::WP_Widget(false, __( 'Stallion Flickr Widget', 'stallion6' ),$widget_ops);  
}
function widget($args, $instance) {  
extract( $args );
$st_flickr_title = $instance['st_flickr_title'];
$st_flickr_id = $instance['st_flickr_id'];
$st_flickr_number = $instance['st_flickr_number'];
$st_flickr_type = $instance['st_flickr_type'];
$st_flickr_sorting = $instance['st_flickr_sorting'];
$st_flickr_size = $instance['st_flickr_size'];
if($st_flickr_title !=''){echo '<span class="gat_widget">'.$st_flickr_title.'</span>';
} else {echo '<div>&nbsp;</div>';
}
echo '<div class="st_flickr">';
?>
<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $st_flickr_number; ?>&amp;display=<?php echo $st_flickr_sorting; ?>&amp;layout=x&amp;source=<?php echo $st_flickr_type; ?>&amp;<?php echo $st_flickr_type; ?>=<?php echo $st_flickr_id; ?>&amp;size=<?php echo $st_flickr_size; ?>"></script>
</div>
<div class="clear"></div>
<?php }
function update($new_instance, $old_instance) {
return $new_instance;
}
function form($instance) {
$st_flickr_title = esc_attr($instance['st_flickr_title']);  
$st_flickr_id = esc_attr($instance['st_flickr_id']);
$st_flickr_number = esc_attr($instance['st_flickr_number']);
$st_flickr_type = esc_attr($instance['st_flickr_type']);
$st_flickr_sorting = esc_attr($instance['st_flickr_sorting']);
$st_flickr_size = esc_attr($instance['st_flickr_size']);
?>
<p><label for="<?php echo $this->get_field_id( 'st_flickr_title' ); ?>"><?php _e( 'Optional Title Heading:', 'stallion6' ); ?></label>
<input type="text" name="<?php echo $this->get_field_name( 'st_flickr_title' ); ?>" value="<?php echo $st_flickr_title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_flickr_title' ); ?>" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_flickr_id' ); ?>"><?php _e( 'Get Your Flickr ID (<a href="http://www.idgettr.com/" target="_blank">idGettr</a>):', 'stallion6' ); ?></label>
<input type="text" name="<?php echo $this->get_field_name( 'st_flickr_id' ); ?>" value="<?php echo $st_flickr_id; ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_flickr_id' ); ?>" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_flickr_number' ); ?>"><?php _e( 'Number of Images:', 'stallion6' ); ?></label>
<select name="<?php echo $this->get_field_name( 'st_flickr_number' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_flickr_number' ); ?>">
<?php for ( $i = 1; $i <= 10; $i += 1) { ?>
<option value="<?php echo $i; ?>" <?php if($st_flickr_number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
<?php } ?></select></p>
<p><label for="<?php echo $this->get_field_id( 'st_flickr_type' ); ?>"><?php _e( 'Account Type:', 'stallion6' ); ?></label>
<select name="<?php echo $this->get_field_name( 'st_flickr_type' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_flickr_type' ); ?>">
<option value="user" <?php if($st_flickr_type == "user"){ echo "selected='selected'";} ?>><?php _e( 'User', 'stallion6' ); ?></option>
<option value="group" <?php if($st_flickr_type == "group"){ echo "selected='selected'";} ?>><?php _e( 'Group', 'stallion6' ); ?></option></select></p>
<p><label for="<?php echo $this->get_field_id( 'st_flickr_sorting' ); ?>"><?php _e( 'Image Sorting:', 'stallion6' ); ?></label>
<select name="<?php echo $this->get_field_name( 'st_flickr_sorting' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_flickr_sorting' ); ?>">
<option value="latest" <?php if($st_flickr_sorting == "latest"){ echo "selected='selected'";} ?>><?php _e( 'Latest', 'stallion6' ); ?></option>
<option value="random" <?php if($st_flickr_sorting == "random"){ echo "selected='selected'";} ?>><?php _e( 'Random', 'stallion6' ); ?></option></select></p>
<p><label for="<?php echo $this->get_field_id( 'st_flickr_size' ); ?>"><?php _e( 'Image Size:', 'stallion6' ); ?></label>
<select name="<?php echo $this->get_field_name( 'st_flickr_size' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_flickr_size' ); ?>">
<option value="s" <?php if($st_flickr_size == "s"){ echo "selected='selected'";} ?>><?php _e( 'Square', 'stallion6' ); ?></option>
<option value="m" <?php if($st_flickr_size == "m"){ echo "selected='selected'";} ?>><?php _e( 'Medium', 'stallion6' ); ?></option>
<option value="t" <?php if($st_flickr_size == "t"){ echo "selected='selected'";} ?>><?php _e( 'Thumbnail', 'stallion6' ); ?></option>
</select></p>
<?php
}
}
register_widget( 'st_wg_flickr' );
?>