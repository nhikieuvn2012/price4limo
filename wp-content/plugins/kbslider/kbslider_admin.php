<?php

	class KBSliderAdmin extends UniteBaseAdminClassKB{
		
		const DEFAULT_VIEW = "sliders";
		
		const VIEW_SLIDER = "slider";
		const VIEW_SLIDERS = "sliders";
		
		const VIEW_SLIDES = "slides";
		const VIEW_SLIDE = "slide";
		
		/**
		 * 
		 * the constructor
		 */
		public function __construct($mainFilepath){
			
			parent::__construct($mainFilepath,$this,self::DEFAULT_VIEW);
			
			//set table names
			GlobalsKBSlider::$table_sliders = self::$table_prefix.GlobalsKBSlider::TABLE_SLIDERS_NAME;
			GlobalsKBSlider::$table_slides = self::$table_prefix.GlobalsKBSlider::TABLE_SLIDES_NAME;
			GlobalsKBSlider::$filepath_captions = self::$path_plugin."kb-plugin/css/captions.css";
			GlobalsKBSlider::$filepath_captions_original = self::$path_plugin."kb-plugin/css/captions_original.css";
			GlobalsKBSlider::$urlCaptionsCSS = self::$url_plugin."kb-plugin/css/captions.css";
			
			
			$this->init();
		}
		
		
		/**
		 * 
		 * init all actions
		 */
		private function init(){
			
			//self::setDebugMode();
			
			self::addMenuPage('KenBurns Slider', "adminPages");
			
			//add common scripts there
			//self::addAction(self::ACTION_ADMIN_INIT, "onAdminInit");
			
			//ajax response to save slider options.
			self::addActionAjax("ajax_action", "onAjaxAction");
		}
		
		
		/**
		 * a must function. please don't remove it.
		 * process activate event - install the db (with delta).
		 */
		public static function onActivate(){
			
			self::createTable(GlobalsKBSlider::TABLE_SLIDERS_NAME);
			self::createTable(GlobalsKBSlider::TABLE_SLIDES_NAME);
		}
		
		
		/**
		 * 
		 * load the jquery ui library
		 */
		private static function loadJQueryUI(){
			//include jquery ui
			$version = get_bloginfo("version");
			$version = (double)$version;
			if($version >= 3.5){	//load new jquery ui library
				
				$urlJqueryUI = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js";
				self::addScriptAbsoluteUrl($urlJqueryUI,"jquery-ui");
				self::addStyle("jquery-ui-1.9.2.custom.min","css/jui/new");
				
			}else{	//load old jquery ui library
				
				$urlJqueryUI = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js";
				self::addScriptAbsoluteUrl($urlJqueryUI,"jquery-ui");
				self::addStyle("jquery-ui-1.8.18.custom","css/jui/old");
			}
		}
		
		
		/**
		 * 
		 * admin main page function.
		 */
		public static function adminPages(){
			self::validateAdminPermissions();
			
			self::addScript("settings");
			self::addScriptCommon("admin","unite_admin");
			
			self::addScript("jquery.tipsy");
			self::addScript("kb_admin");
			
			//add css files
			self::addStyle("admin");
			self::addStyle("tipsy");
			
			$urlGoogleFont = "http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700";
			
			//require styles by view
			switch(self::$view){
				case self::VIEW_SLIDERS:
				case self::VIEW_SLIDER:
					self::requireSettings("slider_settings");
				break;
				
				case self::VIEW_SLIDES:
					//include all media upload scripts
					self::addMediaUploadIncludes();
					self::loadJQueryUI();
				break;
				case self::VIEW_SLIDE:
					//include all media upload scripts
					self::addMediaUploadIncludes();
					self::requireSettings("slide_settings");
					
					//add jquery ui
					self::loadJQueryUI();
					
					//add google font
					self::addStyleAbsoluteUrl($urlGoogleFont,"google-font-pt-sans-narrow");
					
					self::addScriptCommon("edit_layers","unite_layers");
					
					//add kb css:					
					self::addStyle("captions","kb-plugin/css");
					self::addStyle("settings","kb-plugin/css");
				break;
			}
			
			self::setMasterView("master_view");
			self::requireView(self::$view);
		}

		
		/**
		 * 
		 * craete tables
		 */
		public static function createTable($tableName){
			
			//if table exists - don't create it.
			$tableRealName = self::$table_prefix.$tableName;
			if(UniteFunctionsWP::isDBTableExists($tableRealName))
				return(false);
			
			switch($tableName){
				case GlobalsKBSlider::TABLE_SLIDERS_NAME:					
				$sql = "CREATE TABLE " .self::$table_prefix.$tableName ." (
							  id int(9) NOT NULL AUTO_INCREMENT,					  
							  title tinytext NOT NULL,
							  alias tinytext,
							  params text NOT NULL,
							  PRIMARY KEY (id)
							);";
				break;
				case GlobalsKBSlider::TABLE_SLIDES_NAME:
					$sql = "CREATE TABLE " .self::$table_prefix.$tableName ." (
								  id int(9) NOT NULL AUTO_INCREMENT,
								  slider_id int(9) NOT NULL,
								  slide_order int not NULL,					  
								  params text NOT NULL,
								  layers text NOT NULL,
								  PRIMARY KEY (id)
								);";
				break;
				default:
					UniteFunctions::throwError("table: $tableName not found");
				break;
			}
			
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}

		/**
		 * 
		 * onAjax action handler
		 */
		public static function onAjaxAction(){
			
			$slider = new KBSlider();
			$slide = new KBSlide();
			$operations = new KBOperations();
			
			$action = self::getPostVar("client_action");
			$data = self::getPostVar("data");
			
			try{
				
				switch($action){
					case "create_slider":
						$newSliderID = $slider->createSliderFromOptions($data);
						
						self::ajaxResponseSuccessRedirect(
						            "The slider successfully created", 
									self::getViewUrl("sliders"));
						
					break;
					case "update_slider":
						$slider->updateSliderFromOptions($data);
						self::ajaxResponseSuccess("Slider updated");
					break;
					
					case "delete_slider":
						
						$slider->deleteSliderFromData($data);
						
						self::ajaxResponseSuccessRedirect(
						            "The slider deleted", 
									self::getViewUrl(self::VIEW_SLIDERS));
					break;
					
					case "add_slide":
						
						$slider->createSlideFromData($data);
						$sliderID = $data["sliderid"];
						
						self::ajaxResponseSuccessRedirect(
						            "Slide Created", 
									self::getViewUrl(self::VIEW_SLIDES,"id=$sliderID"));
					break;
					case "update_slide":
						$slide->updateSlideFromData($data);
						self::ajaxResponseSuccess("Slide updated");
					break;
					case "delete_slide":
						$slide->deleteSlideFromData($data);
						$sliderID = UniteFunctions::getVal($data, "sliderID");
						self::ajaxResponseSuccessRedirect(
						            "Slide Deleted Successfully", 
									self::getViewUrl(self::VIEW_SLIDES,"id=$sliderID"));					
					break;
					case "get_captions_css":
						$contentCSS = $operations->getCaptionsContent();
						self::ajaxResponseData($contentCSS);
					break;
					case "update_captions_css":
						$arrCaptions = $operations->updateCaptionsContentData($data);
						self::ajaxResponseSuccess("CSS file saved succesfully!",array("arrCaptions"=>$arrCaptions));
					break;
					case "restore_captions_css":
						$operations->restoreCaptionsCss();
						$contentCSS = $operations->getCaptionsContent();
						self::ajaxResponseData($contentCSS);
					break;
					case "update_slides_order":
						$slider->updateSlidesOrderFromData($data);
						self::ajaxResponseSuccess("Order updated successfully");
					break;
					case "change_slide_image":
						$slide->updateSlideImageFromData($data);
						$sliderID = UniteFunctions::getVal($data, "slider_id");						
						self::ajaxResponseSuccessRedirect(
						            "Slide Changed Successfully", 
									self::getViewUrl(self::VIEW_SLIDES,"id=$sliderID"));
					break;
					default:
						self::ajaxResponseError("wrong ajax action: <b>$action</b> ");
					break;
				}
				
			}
			catch(Exception $e){
				$message = $e->getMessage();
				
				self::ajaxResponseError($message);
			}
			
			//it's an ajax action, so exit
			self::ajaxResponseError("No response output on <b> $action </b> action. please check with the developer.");
			exit();
		}
		
	}
	
	
?>