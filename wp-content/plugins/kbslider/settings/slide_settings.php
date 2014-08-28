<?php
	$operations = new KBOperations();
	
	//set Slide settings
	
	$slideSettings = new UniteSettingsProduct();	
	$slideSettings->loadXMLFile(self::$path_settings."/slide_settings.xml");
	
	self::storeSettings("slide_settings",$slideSettings);
	
	//set Layer settings	
	$contentCSS = $operations->getCaptionsContent();
	$arrAnimations = $operations->getArrAnimations();
	$htmlButtonDown = '<div id="layer_captions_down" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-arrowthick-1-s"></span></div>';
	$buttonEditStyles = UniteFunctions::getHtmlLink("javascript:void(0)", "Edit CSS File","button_edit_css","button-secondary");
	
	$captionsAddonHtml = $htmlButtonDown.$buttonEditStyles;
	
	//set Layer settings
	$layerSettings = new UniteSettingsProductSidebar();
	$layerSettings->addSection("Layer Params","layer_params");
	$layerSettings->addSap("Layer Params","layer_params");
	$layerSettings->addTextBox("layer_caption", "caption_green", "Style",array(UniteSettings::PARAM_ADDTEXT=>$captionsAddonHtml,"class"=>"textbox-caption"));		
	$layerSettings->addTextBox("layer_text", "","Text",array("class"=>"text-layer-params"));	
	$layerSettings->addSelect("layer_animation",$arrAnimations,"Animation","fade");	
	$layerSettings->addTextBox("layer_left", "","X");
	$layerSettings->addTextBox("layer_top", "","Y");
	
	self::storeSettings("layer_settings",$layerSettings);
	
	//store settings of content css for editing on the client.
	self::storeSettings("css_captions_content",$contentCSS);
	

?>