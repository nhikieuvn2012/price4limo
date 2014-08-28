<?php
// editor fix (ghetto)
function shortcode_filter($content) {   
	$array = array('<p>[' => '[', ']</p>' => ']', ']<br />' => ']');
	$content = strtr($content, $array);
	return $content;
}
	add_filter('the_content', 'shortcode_filter');

// button (shortcode)
function kol_button($atts, $content = null) {
	extract(shortcode_atts(array('link' => '', 'color' => '', 'icon' => '', 'class' => ''), $atts));
	return "<a href=\"" . $link . "\" class=\"button" . (!empty($class) ? " " . $class : '') . (!empty($color) ? " " . $color : '') . "\">" . (!empty($icon) ? "<span class=\"icon\">$icon</span>&nbsp;&nbsp;" : '') . do_shortcode($content) . "</a>";
}
	add_shortcode('button', 'kol_button');

// optin (shortcode)
function kol_optin($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	return "<div class=\"post-optin" . (!empty($align) ? " " . $align : '') . "\">" . do_shortcode($content) . "</div>";
}
	add_shortcode('optin', 'kol_optin');

/* quote (shortcode)
 * some of the insanity here is fallback support for 
 * the old format of this shortcode. i'd feel bad if people
 * had to go through their posts & edit all the past instances by hand
*/
function kol_quote($atts, $content = null) {
	extract(shortcode_atts(array('picture' => '', 'align' => '', 'source' => '', 'name' => '', 'role' => ''), $atts));
	return
		"<div class=\"quote-box box-style\">\n".
		(!empty($picture) ? "\t<img class=\"quote-image" . (!empty($align) ? " $align\" " : "\" ") . "src=\"" . $picture . "\" alt=\"" . (!empty($source) ? $source : __('Quote', 'kol')) . "\"/>\n" : '').
		(!empty($content) ? "\t" . wpautop(do_shortcode($content)) : '').
		"</div>".
		"\n<p class=\"quote-source\">" . (!empty($source) ? $source : '') . (!empty($name) ? $name . " " : '') . (!empty($role) ? $role : '') . "</p>";
}
	add_shortcode('testimonial', 'kol_quote');
	add_shortcode('quote', 'kol_quote');

// content block (shortcode)
function kol_block($atts, $content = null) {
	return
		"<div class=\"content-block clear\">\n".
		"\t" . wpautop(do_shortcode($content)) . "\n".
		"</div>";
}
	add_shortcode('block', 'kol_block');