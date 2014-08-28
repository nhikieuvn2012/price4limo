<?php 
if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') )
	exit();

$currentFile = __FILE__;
$currentFolder = dirname($currentFile);
require_once $currentFolder . '/inc_php/kbslider_globals.class.php';

	
global $wpdb;
$tableSliders = $wpdb->prefix . GlobalsKBSlider::TABLE_SLIDERS_NAME;
$tableSlides = $wpdb->prefix . GlobalsKBSlider::TABLE_SLIDES_NAME;

$wpdb->query( "DROP TABLE $tableSliders" );
$wpdb->query( "DROP TABLE $tableSlides" );


?>