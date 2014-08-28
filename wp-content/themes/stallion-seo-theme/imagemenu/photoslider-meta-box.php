<?php $post_photo_meta_boxes = array(
'photothumb' => array( 'name' => 'photothumb', 'title' => __('Photo Navigation Menu Image:', 'stallion'), 'type' => 'upload' ,'desc' => 'Upload an image you wish to use with the Stallion Photo Navigation Menu. Ideally the image would be 300px by 200px, if not Stallion will zoom and crop the image using Timthumb 2. Make a Photo Navigation menu under Appearance >> Menus.' ),
#'photofeatured' => array( 'name' => 'photofeatured', 'title' => __('Use in:', 'stallion'), 'type' => 'checkbox', 'desc' => 'Checking this box will .' ),
);
$page_photo_meta_boxes = array(
'photothumb' => array( 'name' => 'photothumb', 'title' => __('Photo Navigation Menu Image:', 'stallion'), 'type' => 'upload' ,'desc' => 'Upload an image you wish to use with the Stallion Photo Navigation Menu. Ideally the image would be 300px by 200px, if not Stallion will zoom and crop the image using Timthumb 2. Make a Photo Navigation menu under Appearance >> Menus.' ),
);
add_action( 'admin_menu', 'st_create_photo_meta_box' );
add_action( 'save_post', 'st_save_photo_meta_data' );

/**
 * Function for adding meta boxes to the admin.
 * Separate the post and page meta boxes.

*/ 
function st_create_photo_meta_box() {
global $themename;

add_meta_box( 'post-photo-meta-boxes', __($themename.' Stallion Photo Navigation Menu Image Options','stallion'), 'post_photo_meta_boxes', 'post', 'normal', 'high' );
add_meta_box( 'page-photo-meta-boxes', __($themename.' Stallion Photo Navigation Menu Image Options','stallion'), 'page_photo_meta_boxes', 'page', 'normal', 'high' );
}

function st_post_photo_meta_boxes() {
global $post_photo_meta_boxes;
return apply_filters( 'st_post_photo_meta_boxes', $post_photo_meta_boxes );
}

function st_page_photo_meta_boxes() {
global $page_photo_meta_boxes;
return apply_filters( 'st_page_photo_meta_boxes', $page_photo_meta_boxes );
}

function post_photo_meta_boxes() {
global $post;
$meta_boxes = st_post_photo_meta_boxes(); ?>
<table class="form-table">
<?php foreach ( $meta_boxes as $meta ) :

$value = get_post_meta( $post->ID, $meta['name'], true );

if ( $meta['type'] == 'text' )
get_photo_meta_text_input( $meta, $value );
elseif ( $meta['type'] == 'upload' )
get_photo_meta_upload_input( $meta, $value );
elseif ( $meta['type'] == 'checkbox' )
get_photo_meta_checkbox_input( $meta, $value );
elseif ( $meta['type'] == 'textarea' )
get_photo_meta_textarea( $meta, $value );
elseif ( $meta['type'] == 'select' )
get_photo_meta_select( $meta, $value );

endforeach; ?>
</table>
<?php
}

/**
 * Displays meta boxes on the Write Page panel.  Loops
 * through each meta box in the $meta_boxes variable.
 * Gets array from st_page_photo_meta_boxes()
 *
 * @since 6.1
 */
function page_photo_meta_boxes() {
global $post;
$meta_boxes = st_page_photo_meta_boxes(); ?>
<table class="form-table">
<?php foreach ( $meta_boxes as $meta ) :

$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

if ( $meta['type'] == 'text' )
get_photo_meta_text_input( $meta, $value );
elseif ( $meta['type'] == 'upload' )
get_photo_meta_upload_input( $meta, $value );
elseif ( $meta['type'] == 'checkbox' )
get_photo_meta_checkbox_input( $meta, $value );
elseif ( $meta['type'] == 'textarea' )
get_photo_meta_textarea( $meta, $value );
elseif ( $meta['type'] == 'select' )
get_photo_meta_select( $meta, $value );

endforeach; ?>
</table>
<?php
}

/**
 * Outputs a text input box with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 6.1
 * @param array $args
 * @param array string|bool $value
 */
function get_photo_meta_text_input( $args = array(), $value = false ) {

extract( $args ); ?>
<tr>
<th style="width:10%;">
<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
</th>
<td>
<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars( $value, 1 ); ?>" size="30" tabindex="30" style="width: 97%;" />
<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
<p><?php echo $desc ;?></p>
</td>
</tr>
<?php
}
/**
 * Outputs a text input box with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 6.1
 * @param array $args
 * @param array string|bool $value
 */
function get_photo_meta_upload_input( $args = array(), $value = false ) {

extract( $args ); ?>
<?php if(st_nav_menu_photo_temp()==1){ ?>
<script type="text/javascript" language="javascript">

jQuery(document).ready(function() {

var header_clicked = "false";

jQuery('#<?php echo $name; ?>_button').click(function() {
jQuery('html').addClass('<?php echo $name; ?>');
formfield = jQuery('#<?php echo $name; ?>').attr('name');
tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
header_clicked = "true";
return false;
});

// user inserts file into post. only run custom if user started process using the above process
// window.send_to_editor(html) is how wp would normally handle the received data

window.original_send_to_editor = window.send_to_editor;
window.send_to_editor = function(html){

if (header_clicked == "true") {
fileurl = jQuery('img',html).attr('src');
jQuery('#<?php echo $name; ?>').val(fileurl);
tb_remove();
header_clicked = "false";
jQuery('html').removeClass('<?php echo $name; ?>');
} else {
window.original_send_to_editor(html);
}
};

});

</script>
<?php } ?>
<tr>
<th style="width:10%;">
<label for="upload_<?php echo $name; ?>"><?php echo $title; ?></label>
</th>
<td>
<input size="40" type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars( $value, 1 ); ?>" />
<?php if(st_nav_menu_photo_temp()==1){ ?>
<input id="<?php echo $name; ?>_button" class="upload_button button" type="button" value="<?php _e('Upload image','stallion');?>" rel="300" />
<?php } ?>
<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
<p><?php echo $desc ;?></p>
</td>
</tr>
<?php
}
/**
 * Outputs a select box with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 6.1
 * @param array $args
 * @param array string|bool $value
 */
function get_photo_meta_select( $args = array(), $value = false ) {
extract( $args ); ?>
<tr>
<th style="width:10%;">
<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
</th>
<td>
<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
<?php foreach ( $options as $option ) : ?>
<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
<?php echo $option; ?>
</option>
<?php endforeach; ?>
</select>
<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
</td>
</tr>
<?php
}
/**
 * Outputs a textarea with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 6.1
 * @param array $args
 * @param array string|bool $value
 */
function get_photo_meta_textarea( $args = array(), $value = false ) {
extract( $args ); ?>
<tr>
<th style="width:10%;">
<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
</th>
<td>
<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( $value, 1 ); ?></textarea>
<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
<p><?php echo $desc ;?></p>
</td>
</tr>
<?php
}
function get_photo_meta_checkbox_input( $args = array(), $value = false ) {
global $post_id;
extract( $args ); ?>
<tr>
<th style="width:10%;">
<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
</th>
<td>
<?php
if(get_post_meta( $post_id, $name, true ) == 'true')
$checked = ' checked="checked"';
else
$checked = '';
?>
<input type="checkbox" name="<?php echo $name; ?>" value="true" <?php echo $checked; ?> /> <span><?php echo $desc ;?></span>

<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
</td>
</tr>
<?php
}
/**
 * Loops through each meta box set of variables.
 * Saves them to the database as custom fields.
 *
 * @since 6.1
 * @param int $post_id
 */
function st_save_photo_meta_data( $post_id ) {
global $post;

if ( 'page' == $_POST['post_type'] )
$meta_boxes = array_merge( st_page_photo_meta_boxes() );
else
$meta_boxes = array_merge( st_post_photo_meta_boxes() );

foreach ( $meta_boxes as $meta_box ) :

if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
return $post_id;

if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
return $post_id;

elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
return $post_id;

$data = stripslashes( $_POST[$meta_box['name']] );

if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
add_post_meta( $post_id, $meta_box['name'], $data, true );

elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
update_post_meta( $post_id, $meta_box['name'], $data );

elseif ( $data == '' )
delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );
endforeach;
}
?>