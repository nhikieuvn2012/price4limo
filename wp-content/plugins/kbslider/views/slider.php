
<?php

	$settingsSliderMain = self::getSettings("slider_main");
	$settingsSliderParams = self::getSettings("slider_params");
	
	//check existing slider data:
	$sliderID = self::getGetVar("id");
	
	if(!empty($sliderID)){
		$slider = new KBSlider();
		$slider->initByID($sliderID);
		
		//get setting fields
		$settingsFields = $slider->getSettingsFields();
		$arrFieldsMain = $settingsFields["main"];
		$arrFieldsParams = $settingsFields["params"];
		
		//set setting values from the slider
		$settingsSliderMain->setStoredValues($arrFieldsMain);
		$settingsSliderParams->setStoredValues($arrFieldsParams);
		
		//get some vars
		$shortcode = $slider->getShortcode();
		
		//$settingsSliderMain = new UniteSettings();
		$settingsSliderMain->addTextBox("shortcode", $shortcode,"Slider Short Code",array("readonly"=>true,"class"=>"code"));
		
		$linksEditSlides = self::getViewUrl(KBSliderAdmin::VIEW_SLIDES,"id=$sliderID");
		
		require self::getPathTemplate("slider_edit");
		
	}
	else{
		require self::getPathTemplate("slider_new");		
	}
	
?>
	