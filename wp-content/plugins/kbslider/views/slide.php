<?php
	
	//get the slide object
	$slideID = UniteFunctions::getGetVar("id");
	$slide = new KBSlide();
	$slide->initByID($slideID);
	$slideParams = $slide->getParams();
	
	$operations = new KBOperations();
	
	$arrLayers = $slide->getLayers();

	//get slider object
	$sliderID = $slide->getSliderID();
	$slider = new KBSlider();
	$slider->initByID($sliderID);
	$sliderParams = $slider->getParams();
	
	//get settings objects
	$settingsLayer = self::getSettings("layer_settings");
	$settingsSlide = self::getSettings("slide_settings");
	
	$cssContent = self::getSettings("css_captions_content");
	 
	//set stored values from "slide params"
	$settingsSlide->setStoredValues($slideParams);
	
	$arrSlideSettings = $settingsSlide->getArrSettings();
	
	//modify slide settings, addong movie controls and set some options:	
	$arrSlideSettings = $operations->modifySlideSettings($arrSlideSettings,$sliderParams);
	$settingsSlide->setArrSettings($arrSlideSettings);
	
	
	//set various parameters needed for the page
	$width = $sliderParams["width"];
	$height = $sliderParams["height"];
	$imageUrl = $slide->getImageUrl();
	$imageFilename = $slide->getImageFilename();
	$urlCaptionsCSS = GlobalsKBSlider::$urlCaptionsCSS;
	$arrCaptionClasses = $operations->getArrCaptionClasses($cssContent);
	
	$style = "width:{$width}px;height:{$height}px;background-image:url('$imageUrl')";	
	$closeUrl = self::getViewUrl(KBSliderAdmin::VIEW_SLIDES,"id=".$sliderID);
	
	$jsonLayers = UniteFunctions::jsonEncodeForClientSide($arrLayers);
	$jsonCaptions = UniteFunctions::jsonEncodeForClientSide($arrCaptionClasses);
	
	require self::getPathTemplate("slide");
?>
	
