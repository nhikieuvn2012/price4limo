<?php
/*
	Name: Marketers Delight 3
	Author: Alex Mangini, kolakube.com
	Version: 3.0
	Description: Packed full of features like landing pages, social proof boxes, buttons, optin forms and more&mdash; Marketers Delight is truly the perfect Thesis skin for marketing just about&hellip; anything!
	Class: marketers_delight
*/

// include
include('kol/wp/widgets.php');
include('kol/wp/shortcodes.php');
include('kol/wp/profile-fields.php');

// define constants
define('KOL_SKIN_PATH', 'marketers-delight');

class marketers_delight extends thesis_skin {		
	function construct() {
		add_action('wp_head', array($this, 'kol_viewport'));
	}

	function kol_viewport() {
		echo "<meta name=\"viewport\" content=\"width=device-width\" />\n";
	}

	public function boxes() {
		return array(
			'kol_logo_box',
			'kol_author_box',
			'kol_attribution',
			'kol_landing_box',
			'kol_product_lead_box',
			'kol_funnel_lead_box',
			'kol_orb_lead_box',
			'kol_pricing_lead_box');
	}
	
	public function packages() {
		return array(
			'kol_product_lead_pkg',
			'kol_funnel_lead_pkg',
			'kol_orb_lead_pkg',
			'kol_pricing_lead_pkg');
	}
}