<?php
	
	$sliderID = self::getGetVar("id");
	
	if(empty($sliderID))
		UniteFunctions::throwError("Slider ID not found"); 
	
	$slider = new KBSlider();
	$slider->initByID($sliderID);
	
	$arrSlides = $slider->getSlides();
	$numSlides = count($arrSlides);
	
	$linksSliderSettings = self::getViewUrl(KBSliderAdmin::VIEW_SLIDER,"id=$sliderID");
	
	require self::getPathTemplate("slides");
	
?>

	