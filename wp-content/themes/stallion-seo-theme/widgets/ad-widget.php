<?php
class st_ad_widget extends WP_Widget {
function st_ad_widget() {
$widget_ops = array( 'description' => 'Build a Custom Ad Widget : build any ad, banner ads, text ads...' );
parent::WP_Widget(false, __( 'Stallion Custom Ad Widget', 'stallion6' ),$widget_ops);      
}
function widget($args, $instance) {
$st_ad_title = $instance['st_ad_title'];
$st_ad_code = $instance['st_ad_code'];
$st_ad_image = $instance['st_ad_image'];
$st_ad_href = $instance['st_ad_href'];
$st_ad_alt = $instance['st_ad_alt'];
$st_ad_align = $instance['st_ad_align'];
$st_ad_cloak = $instance['st_ad_cloak'];

if($st_ad_title !=''){echo '<span class="gat_widget">'.$st_ad_title.'</span>';
} else {echo '<div>&nbsp;</div>';
}
echo '<div class="'.$st_ad_align.'">';
if($st_ad_code != '')
{
echo $st_ad_code;
}
else {
if($st_ad_cloak =='cloak-link-yes'){
echo '<span class="affst" title="tests" id="'.$st_ad_href.'"><img src="'.$st_ad_image.'" alt="'.$st_ad_alt.'" /></span>';
}
else {
echo '<a href="'.$st_ad_href.'"><img src="'.$st_ad_image.'" alt="'.$st_ad_alt.'" /></a>';
}
}
echo '</div>';
}
function update($new_instance, $old_instance) {
return $new_instance;
}
function form($instance) {
$st_ad_title = esc_attr($instance['st_ad_title']);
$st_ad_code = esc_attr($instance['st_ad_code']);
$st_ad_image = esc_attr($instance['st_ad_image']);
$st_ad_href = esc_attr($instance['st_ad_href']);
$st_ad_alt = esc_attr($instance['st_ad_alt']);
$st_ad_align = esc_attr($instance['st_ad_align']);
$st_ad_cloak = esc_attr($instance['st_ad_cloak']);
?>
<p><label for="<?php echo $this->get_field_id( 'st_ad_title' ); ?>"><?php _e( 'Optional Title Heading:', 'stallion6' ); ?></label>
<input type="text" name="<?php echo $this->get_field_name( 'st_ad_title' ); ?>" value="<?php echo $st_ad_title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_ad_title' ); ?>" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_ad_image' ); ?>"><?php _e( 'Banner/Image URL:', 'stallion6' ); ?></label>
<input type="text" name="<?php echo $this->get_field_name( 'st_ad_image' ); ?>" value="<?php echo $st_ad_image; ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_ad_image' ); ?>" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_ad_href' ); ?>"><?php _e( 'Ads Link URL:', 'stallion6' ); ?></label>
<input type="text" name="<?php echo $this->get_field_name( 'st_ad_href' ); ?>" value="<?php echo $st_ad_href; ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_ad_href' ); ?>" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_ad_alt' ); ?>"><?php _e( 'Alt Text (HoverOver Image Text):', 'stallion6' ); ?></label>
<input type="text" name="<?php echo $this->get_field_name( 'st_ad_alt' ); ?>" value="<?php echo $st_ad_alt; ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_ad_alt' ); ?>" /></p>
<p><label for="<?php echo $this->get_field_id( 'st_ad_align' ); ?>">Ad Alignment:</label>
<select id="<?php echo $this->get_field_id( 'st_ad_align' ); ?>" name="<?php echo $this->get_field_name( 'st_ad_align' ); ?>" class="widefat" style="width:100%;">
<option <?php if ( 'align-left' == $instance['st_ad_align'] ) echo 'selected="selected"'; ?>>align-left</option>
<option <?php if ( 'align-right' == $instance['st_ad_align'] ) echo 'selected="selected"'; ?>>align-right</option>
<option <?php if ( 'align-center' == $instance['st_ad_align'] ) echo 'selected="selected"'; ?>>align-center</option>
</select></p>
<p><label for="<?php echo $this->get_field_id( 'st_ad_cloak' ); ?>">Cloak Link:</label>
<select id="<?php echo $this->get_field_id( 'st_ad_cloak' ); ?>" name="<?php echo $this->get_field_name( 'st_ad_cloak' ); ?>" class="widefat" style="width:100%;">
<option <?php if ( 'cloak-link-no' == $instance['st_ad_cloak'] ) echo 'selected="selected"'; ?>>cloak-link-no</option>
<option <?php if ( 'cloak-link-yes' == $instance['st_ad_cloak'] ) echo 'selected="selected"'; ?>>cloak-link-yes</option>
</select>Note: for link cloaking to work please turn on link cloaking under <a href="admin.php?page=ttk_seo_advanced_functions.php">Stallion SEO Advanced Options</a> page : "Cloak Affiliate Links ON".</p>
<h4>or</h4>
<p><label for="<?php echo $this->get_field_id( 'st_ad_code' ); ?>"><?php _e( 'Custom Ad Code:', 'stallion6' ); ?></label>
<textarea name="<?php echo $this->get_field_name( 'st_ad_code' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'st_ad_code' ); ?>"><?php echo $st_ad_code; ?></textarea></p>
<?php }} register_widget( 'st_ad_widget' );?>