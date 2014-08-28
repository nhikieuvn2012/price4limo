<?php

	class KBSliderFront extends UniteBaseFrontClassKB{
		
		/**
		 * 
		 * the constructor
		 */
		public function __construct($mainFilepath){
			
			parent::__construct($mainFilepath,$this);
			
			//set table names
			GlobalsKBSlider::$table_sliders = self::$table_prefix.GlobalsKBSlider::TABLE_SLIDERS_NAME;
			GlobalsKBSlider::$table_slides = self::$table_prefix.GlobalsKBSlider::TABLE_SLIDES_NAME;
			
			GlobalsKBSlider::$urlKBPlugin = self::$url_plugin."kb-plugin/";
		}
		
		
		/**
		 * 
		 * a must function. you can not use it, but the function must stay there!.
		 */		
		public static function onAddScripts(){
			
			self::addStyle("settings","kb-plugin/css");
			self::addStyle("captions","kb-plugin/css");

			$url_jquery = "http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js";
			self::addScriptAbsoluteUrl($url_jquery, "jquery");
			
			self::addScript("jquery.themepunch.plugins.min","kb-plugin/js","themepunch.plugins");
			self::addScript("jquery.themepunch.kenburn.min","kb-plugin/js");
			
			//$url_font = "http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700";
			//self::addStyleAbsoluteUrl($url_font, "google-font-pt-sans-narrow");			
		}
		
		
	}
	

?>