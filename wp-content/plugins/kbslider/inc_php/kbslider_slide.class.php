<?php

	class KBSlide extends UniteElementsBaseKB{
		
		private $id;
		private $sliderID;
		
		private $imageRealPath;
		private $imageUrl;
		private $imageFilepath;
		private $imageFilename;
		
		private $params;
		private $arrLayers;
		
		public function __construct(){
			parent::__construct();
		}
		
		/**
		 * 
		 * init slide by db record
		 */
		public function initByData($record){
			
			$this->id = $record["id"];
			$this->sliderID = $record["slider_id"];
			$params = $record["params"];
			$params = (array)json_decode($params);
			
			$layers = $record["layers"];
			$layers = (array)json_decode($layers);
			$layers = UniteFunctions::convertStdClassToArray($layers);
			$layers = $this->modifyLayersAfterInit($layers);
						
			//set image path, file and url
			$this->imageFilepath = UniteFunctions::getVal($params, "image");
			UniteFunctions::validateNotEmpty($this->imageFilepath,"Image");
			
			$this->imageRealPath = UniteFunctionsWP::getPathContent().$this->imageFilepath;
			$this->imageUrl = UniteFunctionsWP::getImageUrlFromPath($this->imageFilepath);
			$this->imageFilename = basename($this->imageFilepath);
			
			$this->params = $params;
			$this->arrLayers = $layers;	
		}
		
		
		/**
		 * 
		 * init the slider by id
		 */
		public function initByID($slideid){
			UniteFunctions::validateNumeric($slideid,"Slide ID");
			$slideid = $this->db->escape($slideid);
			$record = $this->db->fetchSingle(GlobalsKBSlider::$table_slides,"id=$slideid");
			$this->initByData($record);
		}
		
		/**
		 * 
		 * get slide ID
		 */
		public function getID(){
			return($this->id);
		}
		
		/**
		 * 
		 * get image filename
		 */
		public function getImageFilename(){
			return($this->imageFilename);
		}
		
		/**
		 * 
		 * get layers in json format
		 */
		public function getLayers(){
			$this->validateInited();
			return($this->arrLayers);
		}
		
		/**
		 * normalize layers text, and get layers
		 * 
		 */
		public function getLayersNormalizeText(){
			$arrLayersNew = array();
			foreach ($this->arrLayers as $key=>$layer){
				$text = $layer["text"];
				$text = addslashes($text);
				$layer["text"] = $text;
				$arrLayersNew[] = $layer;
			}
			
			return($arrLayersNew);
		}
		

		/**
		 * 
		 * get slide params
		 */
		public function getParams(){
			$this->validateInited();
			return($this->params);
		}

		
		/**
		 * 
		 * get parameter from params array. if no default, then the param is a must!
		 */
		function getParam($name,$default=null){
			if($default == null){
				if(!array_key_exists($name, $this->params))
					UniteFunctions::throwError("The param <b>$name</b> not found in slider params.");
				$default = "";
			}
				
			return UniteFunctions::getVal($this->params, $name,$default);
		}
		
		
		/**
		 * 
		 * get image filepath
		 */
		public function getImageFilepath(){
			return($this->imageFilepath);
		}
		
		/**
		 * 
		 * get image url
		 */
		public function getImageUrl(){
			return($this->imageUrl);
		}
		
		
		/**
		 * 
		 * get the slider id
		 */
		public function getSliderID(){
			return($this->sliderID);
		}
		
		/**
		 * 
		 * validate that the slider exists
		 */
		private function validateSliderExists($sliderID){
			$slider = new KBSlider();
			$slider->initByID($sliderID);
		}
		
		/**
		 * 
		 * validate that the slide is inited and the id exists.
		 */
		private function validateInited(){
			if(empty($this->id))
				UniteFunctions::throwError("The slide is not inited!!!");
		}
		
		
		/**
		 * 
		 * create the slide (from image)
		 */
		public function createSlide($sliderID,$pathImage){
			//get max order
			$slider = new KBSlider();
			$slider->initByID($sliderID);
			$maxOrder = $slider->getMaxOrder();
			$order = $maxOrder+1;
			
			$params = array();
			$params["image"] = $pathImage;
			$jsonParams = json_encode($params);
			
			$arrInsert = array("params"=>$jsonParams,
			           		   "slider_id"=>$sliderID,
								"slide_order"=>$order);
			
			$slideID = $this->db->insert(GlobalsKBSlider::$table_slides, $arrInsert);
			
			return($slideID);
		}
		
		/**
		 * 
		 * update slide image from data
		 */
		public function updateSlideImageFromData($data){
			
			$slideID = UniteFunctions::getVal($data, "slide_id");			
			$this->initByID($slideID);
			
			$urlImage = UniteFunctions::getVal($data, "url_image");
			UniteFunctions::validateNotEmpty($urlImage);
			
			$pathImage = UniteFunctionsWP::getImagePathFromURL($urlImage);
			
			$arrUpdate = array();
			$arrUpdate["image"] = $pathImage;
			$this->updateParamsInDB($arrUpdate);
			
			return($urlImage);
		}
		
		/**
		 * 
		 * update slide parameters in db
		 */
		private function updateParamsInDB($arrUpdate){
			
			$this->params = array_merge($this->params,$arrUpdate);
			$jsonParams = json_encode($this->params);
			
			$arrDBUpdate = array("params"=>$jsonParams);
			
			$this->db->update(GlobalsKBSlider::$table_slides,$arrDBUpdate,array("id"=>$this->id));
		}

		
		/**
		 * 
		 * sort layers by order
		 */
		private function sortLayersByOrder($layer1,$layer2){
			$order1 = UniteFunctions::getVal($layer1, "order",1);
			$order2 = UniteFunctions::getVal($layer2, "order",2);
			if($order1 == $order2)
				return(0);
			
			return($order1 > $order2);
		}
		
		
		/**
		 * 
		 * go through the layers and fix small bugs if exists
		 */
		private function normalizeLayers($arrLayers){
			
			usort($arrLayers,array($this,"sortLayersByOrder"));
			$arrLayersNew = array();
			foreach ($arrLayers as $key=>$layer){
				//set type
				$type = UniteFunctions::getVal($layer, "type","text");
				$layer["type"] = $type;
				
				//normalize position:
				$layer["left"] = round($layer["left"]);
				$layer["top"] = round($layer["top"]);
				
				//unset order
				unset($layer["order"]);
				
				//modify text
				$layer["text"] = stripcslashes($layer["text"]);
				
				//modify image:
				if($type == "image"){
					$urlImage = UniteFunctions::getVal($layer, "image_url");
					$filepathImage = UniteFunctionsWP::getImagePathFromURL($urlImage);
					
					unset($layer["image_url"]);
					$layer["image_path"] = $filepathImage;
				}
				
				$arrLayersNew[] = $layer;
			}
			
			return($arrLayersNew);
		}  
		
		/**
		 * 
		 * modify the layers for output.
		 */
		private function modifyLayersAfterInit($layers){
						
			foreach($layers as $key=>$layer){
				$type = UniteFunctions::getVal($layer, "type","text");
				if($type == "image"){
					$imagePath = UniteFunctions::getVal($layer, "image_path");
					$layer["image_url"] = UniteFunctionsWP::getImageUrlFromPath($imagePath);
					unset($layer["image_path"]);
				}
				
				$layers[$key] = $layer;
			}
			
			return($layers);
		}
		
		
		/**
		 * 
		 * normalize params
		 */
		private function normalizeParams($params){
			
			$urlImage = $params["image_url"];
			if(empty($urlImage))
				UniteFunctions::throwError("the image could not be empty in params");
			
			$params["image"] = UniteFunctionsWP::getImagePathFromURL($urlImage);
			unset($params["image_url"]);
			
			$params["video_description"] = UniteFunctions::normalizeTextareaContent($params["video_description"]);
			
			
			return($params);
		}
		
		
		/**
		 * 
		 * update slide from data
		 * @param $data
		 */
		public function updateSlideFromData($data){
			
			$slideID = UniteFunctions::getVal($data, "slideid");
			$this->initByID($slideID);
			
			//treat params
			$params = UniteFunctions::getVal($data, "params");
			$params = $this->normalizeParams($params);
			
			//treat layers
			$layers = UniteFunctions::getVal($data, "layers");
			if(empty($layers) || gettype($layers) != "array")
				$layers = array();
						
			$layers = $this->normalizeLayers($layers);
			
			$arrUpdate = array();
			$arrUpdate["layers"] = json_encode($layers);
			$arrUpdate["params"] = json_encode($params);
			
			$this->db->update(GlobalsKBSlider::$table_slides,$arrUpdate,array("id"=>$this->id));
			
		}
		
		/**
		 * 
		 * delete slide from data
		 */
		public function deleteSlideFromData($data){
			$slideID = UniteFunctions::getVal($data, "slideID");
			$this->initByID($slideID);
			$this->db->delete(GlobalsKBSlider::$table_slides,"id='$slideID'");
		}
		
		
	}
	
?>