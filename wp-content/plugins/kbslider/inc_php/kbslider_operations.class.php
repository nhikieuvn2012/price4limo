<?php

	class KBOperations extends UniteElementsBaseKB{
		
		/**
		 * 
		 * modify video settings
		 * @param $assoc
		 */
		private function modifySettings_video($assoc){
			
			$addonValue = $assoc["video_addon"]["value"];

			//set video hidden or not
			switch($addonValue){				
				default:					
				case "none":
					$assoc["vimeo_id"]["hidden"] = true;
					$assoc["youtube_id"]["hidden"] = true;
					$assoc["video_description"]["hidden"] = true;
					$assoc["video_fullscreen"]["hidden"] = true;
				break;
				case "youtube":
					$assoc["vimeo_id"]["hidden"] = false;
				break;
				case "vimeo":
					$assoc["youtube_id"]["hidden"] = true;
				break;
				case "html":		//show only description
					$assoc["vimeo_id"]["hidden"] = true;
					$assoc["youtube_id"]["hidden"] = true;
					$assoc["video_fullscreen"]["hidden"] = true;
					$assoc["video_description"]["text"] = "Custom HTML";
				break;
			}
			
			return($assoc);
		}
		
		/**
		 * 
		 * modify ken burns settings
		 * @param $assoc
		 */
		private function modifySettings_kenburns($assoc){
			
			$kenburnType = $assoc["kenburn_type"]["value"];
			$arr = array("kenburn_startpos",
						 "kenburn_endpos",
						 "zoom_type",
						 "zoom_factor",
						 "panduration",
						 "effect_type",
						 "color_transition",
			);
			
			foreach($arr as $fieldName){				
				if($kenburnType == "default")
					$assoc[$fieldName]["hidden"] = true;
				else
					$assoc[$fieldName]["hidden"] = false;
			}
			
			return($assoc);
		}
		
		
		/**
		 * 
		 * modify slide settings, set visiblity true/false to some items
		 */
		public function modifySlideSettings($arrSettings,$sliderParams){
			
			$assoc = UniteFunctions::arrayToAssoc($arrSettings, "name");
			
			//set timer default value
			$timer = UniteFunctions::getVal($sliderParams, "timer",10);
			$assoc["panduration"]["value"] = $timer;
			
			$assoc = $this->modifySettings_video($assoc);
			$assoc = $this->modifySettings_kenburns($assoc);
			
			$arrSettings = UniteFunctions::assocToArray($assoc);
			
			return($arrSettings);
		}
		
		
		/**
		 * 
		 * get animations array
		 */
		public function getArrAnimations(){
			
			$arrAnimations = array(
				"fade"=>"Fade",
				"fadeleft"=>"Fade Left",
				"faderight"=>"Fade Right",
				"fadeup"=>"Fade Up",
				"wipeleft"=>"Wipe Left",
				"wiperight"=>"Wipe Right",
				"wipeup"=>"Wipe Up",
				"wipedown"=>"Wipe Down",
				"masklesswipeleft"=>"Maskless Wipe Left",
				"masklesswiperight"=>"Maskless Wipe Right",
				"masklesswipeup"=>"Maskless Wipe Up",
				"masklesswipedown"=>"Maskless Wipe Down"
			);
			
			return($arrAnimations);
		}
		
		
		/**
		 * 
		 * parse css file and get the classes from there.
		 */
		public function getArrCaptionClasses($contentCSS){
			//parse css captions file
			$parser = new UniteCssParser();
			$parser->initContent($contentCSS);
			$arrCaptionClasses = $parser->getArrClasses();
			return($arrCaptionClasses);
		}
		
		/**
		 * 
		 * get the select classes html for putting in the html by ajax 
		 */
		private function getHtmlSelectCaptionClasses($contentCSS){
			$arrCaptions = $this->getArrCaptionClasses($contentCSS);
			$htmlSelect = UniteFunctions::getHTMLSelect($arrCaptions,"","id='layer_caption' name='layer_caption'",true);
			return($htmlSelect);
		}
		
		/**
		 * 
		 * get contents of the css file
		 */
		public function getCaptionsContent(){
			$contentCSS = file_get_contents(GlobalsKBSlider::$filepath_captions);
			return($contentCSS);
		}
		
		
		/**
		 * 
		 * update captions css file content
		 * @return new captions html select 
		 */
		public function updateCaptionsContentData($content){
			$content = stripslashes($content);
			$content = trim($content);
			UniteFunctions::writeFile($content, GlobalsKBSlider::$filepath_captions);
			
			//output captions array 
			$arrCaptions = $this->getArrCaptionClasses($content);
			return($arrCaptions);
		}
		
		/**
		 * 
		 * copy from original css file to the captions css.
		 */
		public function restoreCaptionsCss(){
			
			if(!file_exists(GlobalsKBSlider::$filepath_captions_original))
				UniteFunctions::throwError("The original css file: captions_original.css doesn't exists.");
			
			$success = @copy(GlobalsKBSlider::$filepath_captions_original, GlobalsKBSlider::$filepath_captions);
			if($success == false)
				UniteFunctions::throwError("Failed to restore from the original captions file.");
		}
		
	}

?>