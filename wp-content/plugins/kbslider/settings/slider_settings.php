<?php
	
	//set "slider_main" settings
	$sliderMainSettings = new UniteSettingsProduct();
	$sliderMainSettings->addTextBox("title", "","Slider Title",array("description"=>"The title of the slider. Example: Slider1","required"=>"true"));	
	$sliderMainSettings->addTextBox("alias", "","Slider Alias",array("description"=>"The alias that will be used for embedding the slider. Example: slider1","required"=>"true"));
	
	self::storeSettings("slider_main",$sliderMainSettings);


	//set "slider_params" settings. 
	$sliderParamsSettings = new UniteSettingsProductSidebar();	
	$sliderParamsSettings->loadXMLFile(self::$path_settings."/slider_settings.xml");
	self::storeSettings("slider_params",$sliderParamsSettings); 
	
?>