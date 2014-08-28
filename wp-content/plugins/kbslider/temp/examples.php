
kb:
<?php
	$urlEditSlide = self::getViewUrl(KBSliderAdmin::VIEW_SLIDE,"id=$slideid");
	$linkEdit = UniteFunctions::getHtmlLink($urlEditSlide, $filename);
	
	require self::getPathTemplate("slide");
	
?>


//royal slider:
<?php

	/**
	* RoyalSlider shortcode
	*/
	function shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
				"id" => '-1'
		), $atts));
		return do_shortcode($this->get_slider($id));
	}	
	
	
	
?>