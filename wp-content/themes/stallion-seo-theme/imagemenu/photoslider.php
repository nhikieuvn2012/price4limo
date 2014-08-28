<?php
/*function get_the_post_thumbnail_url( $post_id = NULL ) {
global $id;
$post_id = ( NULL === $post_id ) ? $id : $post_id;
$src = get_image_path(wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full'));
$src = $src[0];
return $src;
}*/
class St_My_Walker extends Walker_Nav_Menu
{
var $item_count = 0;

function end_el(&$output, $item, $depth) {
$output .= "";
}
function start_el(&$output, $item, $depth, $args) {
        global $wp_query,$item_count;
$theme_url= get_bloginfo('template_url');
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if($item_count <= 3){
			if(isset($item->object_id)) {
			$thumbnailid = (int)$item->object_id;
#$thumbnail = get_image_path(get_the_post_thumbnail_url( $thumbnailid ));
$thumbnail = get_image_path(get_post_meta( $thumbnailid, 'photothumb', true ));
			} else {
$thumbnail = $theme_url.'/imagemenu/images/hot-post.jpg';
			}
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="bk'.(int)$item_count.'" ';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
if ($thumbnail == '') {
$thumbnail = $theme_url.'/imagemenu/images/hot-post.jpg';
$item_output = '<a' . $attributes .' style="background: url(\'' . $thumbnail. '\') repeat scroll 0%;">';
}
else {
$item_output = '<a' . $attributes . ' style="background: url(\'' . $theme_url . '/timthumb.php?src=' . $thumbnail. '&amp;w=300&amp;h=200&amp;zc=1&amp;q=75\') repeat scroll 0%;">';
}
        $item_output .=  apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= '</a>';
 		$item_output .= "</li>\n";

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
        if($item_count == 4){
			if(isset($item->object_id)) {
			$thumbnailid = (int)$item->object_id;
#$thumbnail = get_image_path(get_the_post_thumbnail_url( $thumbnailid ));
$thumbnail = get_image_path(get_post_meta( $thumbnailid, 'photothumb', true ));
			} else {
$thumbnail = $theme_url.'/imagemenu/images/hot-post.jpg';
			}
         $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="bk'.(int)$item_count.'" ';

 $output .= $indent . '<li class="bk4" id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		$attributes = ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
if ($thumbnail == '') {
$thumbnail = $theme_url.'/imagemenu/images/hot-post.jpg';
$item_output = '<a' . $attributes .' style="background: url(\'' . $thumbnail. '\') repeat scroll 0%;">';
}
else {
$item_output = '<a' . $attributes . ' style="background: url(\'' . $theme_url . '/timthumb.php?src=' . $thumbnail. '&amp;w=300&amp;h=200&amp;zc=1&amp;q=75\') repeat scroll 0%;">';
}
        $item_output .=  apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= '</a>';
 		$item_output .= "</li>\n";
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    $item_count ++;
	}   
}
function no_sliding_menu(){
$blog_url = site_url() ;
$theme_url= get_bloginfo('template_url');
$blogname = get_bloginfo('name');
 
echo "<ul>
<li class=\"bk0\"><a href=\"http://www.stallion-theme.com/stallion-theme-wordpress-navigation-menu-tutorial\" style=\"background: url('".$theme_url."/imagemenu/images/stallion-theme.jpg') repeat scroll 0%;\">Stallion WordPress SEO Theme</a></li>
<li class=\"bk1\"><a href=\"".$blog_url."\" style=\"background: url('".$theme_url."/imagemenu/images/hot-post.jpg') repeat scroll 0%;\">".$blogname."</a></li>
<li class=\"bk2\"><a href=\"".$blog_url."\" style=\"background: url('".$theme_url."/imagemenu/images/hot-post.jpg') repeat scroll 0%;\">".$blogname."</a></li>
<li class=\"bk3\"><a href=\"".$blog_url."\" style=\"background: url('".$theme_url."/imagemenu/images/hot-post.jpg') repeat scroll 0%;\">".$blogname."</a></li>
<li class=\"bk4\"><a href=\"".$blog_url."\" style=\"background: url('".$theme_url."/imagemenu/images/hot-post.jpg') repeat scroll 0%;\">".$blogname."</a></li>
</ul>";
}
?>