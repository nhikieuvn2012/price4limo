<?php
	$slider = new KBSlider();
	$arrSliders = $slider->getArrSliders();
	
	$addNewLink = self::getViewUrl(KBSliderAdmin::VIEW_SLIDER);
	
	require self::getPathTemplate("sliders");
?>


	