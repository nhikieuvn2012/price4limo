<?php

$folderIncludes = dirname(__FILE__)."/";

if(!function_exists("dmp"))
	require_once $folderIncludes . 'functions.php';

if(!class_exists("UniteFunctions"))
	require_once $folderIncludes . 'functions.class.php';
	
if(!class_exists("UniteFunctionsWP"))
	require_once $folderIncludes . 'functions_wordpress.class.php';

if(!class_exists("UniteDB"))
	require_once $folderIncludes . 'db.class.php';


if(!class_exists("UniteSettings"))
	require_once $folderIncludes . 'settings.class.php';

if(!class_exists("UniteCssParser"))
	require_once $folderIncludes . 'cssparser.class.php';
	
if(!class_exists("UniteSettingsAdvanced"))
	require_once $folderIncludes . 'settings_advances.class.php';

if(!class_exists("UniteSettingsProduct"))
	require_once $folderIncludes . 'settings_product.class.php';

if(!class_exists("UniteSettingsProductSidebar"))
	require_once $folderIncludes . 'settings_product_sidebar.class.php';

if(!class_exists("UniteImageView"))
	require_once $folderIncludes . 'image_view.class.php';


?>