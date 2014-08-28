<?php

/*
Name: Nude960 - Responsive
Author: Richard Barratt
Version: 2.0.1
Description: ** Not Tested on Thesis 2.1 Yet ** A totally naked full width Thesis 2.0 skin rocking a RESPONSIVE 12 column 960 grid. Turbo start your next personal or commercial project. Courtesy of SkinMyThesis.com
Class: n960r_2
*/

class n960r_2 extends thesis_skin {


		public $boxes_class_list = array	('smt_credits',
											'smt_ios_favicon',
											'smt_social_buttons_lite',
											'smt_read_more_button');


		function construct(){
		
						define('NUDER_PATH', THESIS_USER_SKINS . '/n960r_2');
						define('NUDER_URL', THESIS_USER_SKINS_URL . '/n960r_2');
						
						add_action('wp_head', array($this, 'head_scripts'));
						
						add_filter('thesis_boxes', array($this, 'add_boxes'));
						
		}
					
					
		function head_scripts(){
			
			echo "<meta name=\"viewport\" content=\"initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width\" /> \n";
		
		}
		
		
		function add_boxes($boxes){
			
			require_once(NUDER_PATH . '/lib/boxes/box.php');
			return array_merge($boxes, $this->boxes_class_list);
		}
	



} // end of n960r_2 class()


// Browser and OS Detection to <body class>

function mv_browser_body_class($classes) {
global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
if($is_lynx) $classes[] = 'lynx';
elseif($is_gecko) $classes[] = 'gecko';
elseif($is_opera) $classes[] = 'opera';
elseif($is_NS4) $classes[] = 'ns4';
elseif($is_safari) $classes[] = 'safari';
elseif($is_chrome) $classes[] = 'chrome';
elseif($is_IE) {
$classes[] = 'ie';
if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
$classes[] = 'ie'.$browser_version[1];
} else $classes[] = 'unknown';
if($is_iphone) $classes[] = 'iphone';
if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
$classes[] = 'osx';
} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
$classes[] = 'linux';
} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
$classes[] = 'windows';
}
return $classes;
}
add_filter('body_class','mv_browser_body_class');








