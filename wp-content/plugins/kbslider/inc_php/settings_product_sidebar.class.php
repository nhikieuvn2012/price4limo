<?php
	class UniteSettingsProductSidebar extends UniteSettingsAdvanced{
		
		private $addClass = "";		//add class to the main div
		private $arrButtons = array();
		
		/**
		 * 
		 * add buggon
		 */
		public function addButton($title,$id,$class = "button-secondary"){
			
			$button = array(
				"title"=>$title,
				"id"=>$id,
				"class"=>$class
			);
			
			$this->arrButtons[] = $button;			
		}
		
		
		/**
		 * 
		 * set add class for the main div
		 */
		public function setAddClass($addClass){
			$this->addClass = $addClass;
		}
		
		//-----------------------------------------------------------------------------------------------
		// draw after body additional settings accesories
		public function drawAfterBody(){
			$arrTypes = $this->getArrTypes();
			foreach($arrTypes as $type){
				switch($type){
					case self::TYPE_COLOR:
						?>
							<div id='divPickerWrapper' style='position:absolute;display:none;'><div id='divColorPicker'></div></div>
						<?php
					break;
				}
			}
		}		
		
		//-----------------------------------------------------------------------------------------------
		//draw text as input
		protected function drawTextInput($setting) {
			$disabled = "";
			$style="";
			if(isset($setting["style"])) 
				$style = "style='".$setting["style"]."'";
			if(isset($setting["disabled"])) 
				$disabled = 'disabled="disabled"';

			$class = UniteFunctions::getVal($setting, "class","text-sidebar");
			
			if(!empty($class))
				$class = "class='$class'";
			
			?>
				<input type="text" <?php echo $class?> <?php echo $style?> <?php echo $disabled?> id="<?php echo $setting["id"]?>" name="<?php echo $setting["name"]?>" value="<?php echo $setting["value"]?>" />
			<?php
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw a color picker
		protected function drawColorPickerInput($setting){			
			$bgcolor = $setting["value"];
			$bgcolor = str_replace("0x","#",$bgcolor);			
			// set the forent color (by black and white value)
			$rgb = UniteFunctions::html2rgb($bgcolor);
			$bw = UniteFunctions::yiq($rgb[0],$rgb[1],$rgb[2]);
			$color = "#000000";
			if($bw<128) $color = "#ffffff";
			
			
			$disabled = "";
			if(isset($setting["disabled"])){
				$color = "";
				$disabled = 'disabled="disabled"';
			}
			
			$style="style='background-color:$bgcolor;color:$color'";
			
			?>
				<input type="text" class="inputColorPicker" id="<?php echo $setting["id"]?>" <?php echo $style?> name="<?php echo $setting["name"]?>" value="<?php echo $bgcolor?>" <?php echo $disabled?>></input>
			<?php
		}
		
		//-----------------------------------------------------------------------------------------------
		// draw setting input by type
		protected function drawInputs($setting){
			switch($setting["type"]){
				case self::TYPE_TEXT:
					$this->drawTextInput($setting);
				break;
				case self::TYPE_COLOR:
					$this->drawColorPickerInput($setting);
				break;
				case self::TYPE_SELECT:
					$this->drawSelectInput($setting);
				break;
				case self::TYPE_CHECKBOX:
					$this->drawCheckboxInput($setting);
				break;
				case self::TYPE_RADIO:
					$this->drawRadioInput($setting);
				break;
				case self::TYPE_TEXTAREA:
					$this->drawTextAreaInput($setting);
				break;
				case self::TYPE_ORDERBOX:
					$this->drawOrderbox($setting);
				break;
				case self::TYPE_ORDERBOX_ADVANCED:
					$this->drawOrderbox_advanced($setting);
				break;
				case self::TYPE_CUSTOM:
					$this->drawCustom($setting);
				break;				
				default:
					throw new Exception("wrong setting type - ".$setting["type"]);
				break;
			}			
		}		
		
		//-----------------------------------------------------------------------------------------------
		//draw advanced order box
		protected function drawOrderbox_advanced($setting){
			
			$items = $setting["items"];
			if(!is_array($items))
				$this->throwError("Orderbox error - the items option must be array (items)");
				
			//get arrItems modify items by saved value			
			
			if(!empty($setting["value"]) && 
				getType($setting["value"]) == "array" &&
				count($setting["value"]) == count($items)):
				
				$savedItems = $setting["value"];
				
				//make assoc array by id:
				$arrAssoc = array();
				foreach($items as $item)
					$arrAssoc[$item[0]] = $item[1];
				
				foreach($savedItems as $item){
					$value = $item["id"];
					$text = $value;
					if(isset($arrAssoc[$value]))
						$text = $arrAssoc[$value];
					$arrItems[] = array($value,$text,$item["enabled"]);
				}
			else: 
				$arrItems = $items;
			endif;
			
			?>	
			<ul class="orderbox_advanced" id="<?php echo $setting["id"]?>">
			<?php 
			foreach($arrItems as $arrItem){
				switch(getType($arrItem)){
					case "string":
						$value = $arrItem;
						$text = $arrItem;
						$enabled = true;
					break;
					case "array":
						$value = $arrItem[0];
						$text = (count($arrItem)>1)?$arrItem[1]:$arrItem[0];
						$enabled = (count($arrItem)>2)?$arrItem[2]:true;
					break;
					default:
						$this->throwError("Error in setting:".$setting.". unknown item type.");
					break;
				}
				
				$checkboxClass = $enabled ? "div_checkbox_on" : "div_checkbox_off";
				
					?>
						<li>
							<div class="div_value"><?php echo $value?></div>
							<div class="div_checkbox <?php echo $checkboxClass?>"></div>
							<div class="div_text"><?php echo $text?></div>
							<div class="div_handle"></div>
						</li>
					<?php 
			}
			
			?>
			</ul>
			<?php 			
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw order box
		protected function drawOrderbox($setting){
						
			$items = $setting["items"];
			
			//get arrItems by saved value
			$arrItems = array();
					
			if(!empty($setting["value"]) && 
				getType($setting["value"]) == "array" &&
				count($setting["value"]) == count($items)){
				
				$savedItems = $setting["value"];
								
				foreach($savedItems as $value){
					$text = $value;
					if(isset($items[$value]))
						$text = $items[$value];
					$arrItems[] = array("value"=>$value,"text"=>$text);	
				}
			}		//get arrItems only from original items
			else{
				foreach($items as $value=>$text)
					$arrItems[] = array("value"=>$value,"text"=>$text);
			}
			
			
			?>
			<ul class="orderbox" id="<?php echo $setting["id"]?>">
			<?php 
				foreach($arrItems as $item){
					$itemKey = $item["value"];
					$itemText = $item["text"];
					
					$value = (getType($itemKey) == "string")?$itemKey:$itemText;
					?>
						<li>
							<div class="div_value"><?php echo $value?></div>
							<div class="div_text"><?php echo $itemText?></div>
						</li>
					<?php 
				} 
			?>
			</ul>
			<?php 
		}
		
		//-----------------------------------------------------------------------------------------------
		// draw text area input
		
		protected function drawTextAreaInput($setting){
			$disabled = "";
			if (isset($setting["disabled"])) $disabled = 'disabled="disabled"';
			if (isset($setting["style"])) {
				$style = "style='".$setting["style"]."'";
			} else {
				$width = UniteFunctions::getVal($setting,"width","250px");
				$height = UniteFunctions::getVal($setting,"height","");
				$styleContent = "";
				if($width != "") $styleContent .= 'width:'.$width.";";
				if($height != "") $styleContent .= 'height:'.$height.";";
				$style = "";
				if (!empty($styleContent)) $style = "style='$styleContent'";
			}			 
			?>
				<textarea id="<?php echo $setting["id"]?>" name="<?php echo $setting["name"]?>" <?php echo $style?> <?php echo $disabled?>><?php echo $setting["value"]?></textarea>				
			<?php
		}		
		
		//-----------------------------------------------------------------------------------------------
		// draw radio input
		protected function drawRadioInput($setting){
			$items = $setting["items"];
			$counter = 0;
			foreach($items as $value=>$text):
				$counter++;
				$radioID = $setting["id"]."_".$counter;
				$checked = "";
				if($value == $setting["value"]) $checked = " checked"; 
				?>
					<input type="radio" id="<?php echo $radioID?>" value="<?php echo $value?>" name="<?php echo $setting["name"]?>" <?php echo $checked?>/>
					<label for="<?php echo $radioID?>" style="cursor:pointer;"><?php echo $text?></label>
					&nbsp; &nbsp;
				<?php				
			endforeach;
		}
		
		
		//-----------------------------------------------------------------------------------------------
		// draw checkbox
		protected function drawCheckboxInput($setting){
			$checked = "";
			if($setting["value"] == true) $checked = 'checked="checked"';
			?>
				<input type="checkbox" id="<?php echo $setting["id"]?>" class="inputCheckbox" name="<?php echo $setting["name"]?>" <?php echo $checked?>/>
			<?php
		}		
		
		//-----------------------------------------------------------------------------------------------
		//draw select input
		protected function drawSelectInput($setting){
			
			$className = "";
			if(isset($this->arrControls[$setting["name"]])) $className = "control";
			$class = "";
			if($className != "") $class = "class='".$className."'";
			
			$disabled = "";
			if(isset($setting["disabled"])) $disabled = 'disabled="disabled"';
			
			?>
			<select id="<?php echo $setting["id"]?>" name="<?php echo $setting["name"]?>" <?php echo $disabled?> <?php echo $class?>>
			<?php			
			foreach($setting["items"] as $value=>$text):
				$selected = "";
				if($value == $setting["value"]) $selected = 'selected="selected"';
				?>
					<option value="<?php echo $value?>" <?php echo $selected?>><?php echo $text?></option>
				<?php
			endforeach
			?>
			</select>
			<?php
		}

		/**
		 * 
		 * draw custom setting
		 */
		protected function drawCustom($setting){
			dmp($setting);
			exit();
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw hr row
		protected function drawTextRow($setting){
			
			//set cell style
			$cellStyle = "";
			if(isset($setting["padding"])) 
				$cellStyle .= "padding-left:".$setting["padding"].";";
				
			if(!empty($cellStyle))
				$cellStyle="style='$cellStyle'";
				
			//set style
			$rowStyle = "";					
			if(isset($setting["hidden"])) 
				$rowStyle .= "display:none;";
				
			if(!empty($rowStyle))
				$rowStyle = "style='$rowStyle'";
			
			?>
				<span class="spanSettingsStaticText"><?php echo $setting["text"]?></span>
			<?php 
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw hr row
		protected function drawHrRow($setting){
			//set hidden
			$rowStyle = "";
			if(isset($setting["hidden"])) $rowStyle = "style='display:none;'";
			?>
				<hr />
			<?php 
		}
		
		//-----------------------------------------------------------------------------------------------
		// put header includes:
		public function drawHeaderIncludes(){
			$arrOnReady = array();
			$arrJs = array();
			
			//put json string types
			$jsonString = $this->getJsonClientString();
			$arrJs[] = "var g_jsonSettingTypes = '$jsonString'";
			$arrJs[] = "var objSettingTypes = JSON.parse(g_jsonSettingTypes);";
			
			//put sections vars
			if(!empty($this->arrSections)){
				$arrJs[] = "var g_sectionsEnabled = true;";
				$arrJs[] = "var g_numSections = ".count($this->arrSections).";";
			}
			else 
				$arrJs[] = "var g_sectionsEnabled = false;";
			
			//put controls json object:
			if(!empty($this->arrControls)){
				$strControls = json_encode($this->arrControls);
				$arrJs[] = "var g_jsonControls = '".$strControls."'";
				$arrJs[] = "var g_controls = JSON.parse(g_jsonControls)";
			}
						
			//put types onready function
			$arrTypes = $this->getArrTypes();
			//put script includes:
			foreach($arrTypes as $type){
				switch($type){
					case self::TYPE_COLOR:
						?>
							<script type="text/javascript" src="<?php echo CMGlobals::$URL_SITE?>inc_js/farbtastic.min.js"></script>
							<link rel="stylesheet" href="<?php echo CMGlobals::$URL_SITE?>inc_css/farbtastic.css" type="text/css" />
						<?php
						$arrJs[] = "var g_picker;";						
						$arrOnReady[] = "g_picker = $.farbtastic('#divColorPicker');";
					break;
					case self::TYPE_ORDERBOX:
						$arrOnReady[] = "$(function() { $( '.orderbox' ).sortable();}); ";
					break;
					case self::TYPE_ORDERBOX_ADVANCED:
						$arrOnReady[] = "init_advanced_orderbox();";
					break; 				
				}
			}
						
			//put js vars and onready func.
			
			echo "<script type='text/javascript'>\n";
				
			//put js 
			foreach($arrJs as $line){
				echo $line."\n";
			}
				
			if(!empty($arrOnReady)):
				//put onready
				echo "$(document).ready(function(){\n";
				foreach($arrOnReady as $line){
					echo $line."\n";
				}				
				echo "});";
			endif;
			echo "\n</script>\n";
		}
		
		
		//-----------------------------------------------------------------------------------------------
		//draw settings row
		protected function drawSettingRow($setting){
		
			//set cellstyle:
			$cellStyle = "";
			if(isset($setting[self::PARAM_CELLSTYLE])){
				$cellStyle .= $setting[self::PARAM_CELLSTYLE];
			}
			
			//set text style:
			$textStyle = $cellStyle;
			if(isset($setting[self::PARAM_TEXTSTYLE])){
				$textStyle .= $setting[self::PARAM_TEXTSTYLE];
			}
			
			if($textStyle != "") $textStyle = "style='".$textStyle."'";
			if($cellStyle != "") $cellStyle = "style='".$cellStyle."'";
			
			//set hidden
			$rowStyle = "";
			if(isset($setting["hidden"])) $rowStyle = "display:none;";
			if(!empty($rowStyle)) $rowStyle = "style='$rowStyle'";
			
			if($setting["type"] == self::TYPE_CHECKBOX)
				$text = "<label for='{$setting["id"]}'>$text</label>";
			
			//set text class:
			$class = "";
			if(isset($setting["disabled"])) $class = "class='disabled'";
			
			//modify text:
			$text = UniteFunctions::getVal($setting,"text","");				
			// prevent line break (convert spaces to nbsp)
			$text = str_replace(" ","&nbsp;",$text);
			
			//set settings text width:
			$textWidth = "";
			if(isset($setting["textWidth"])) $textWidth = 'width="'.$setting["textWidth"].'"';
			
			$description = UniteFunctions::getVal($setting, "description");
			$unit = UniteFunctions::getVal($setting, "unit");
			$required = UniteFunctions::getVal($setting, "required");
			
			$addHtml = UniteFunctions::getVal($setting, UniteSettings::PARAM_ADDTEXT);			
			
			?>
				<li>
					<span class='setting_text' title="<?php echo $description?>"><?php echo $text?></span>
					<span class='setting_input'>
						<?php $this->drawInputs($setting);?>
					</span>
					<?php if(!empty($unit)):?>
						<span class='setting_unit'><?php echo $unit?></span>
					<?php endif?>
					<?php if(!empty($required)):?>
						<span class='setting_required'>*</span>
					<?php endif?>
					<?php if(!empty($addHtml)):?>
						<span class="settings_addhtml"><?php echo $addHtml?></span>
					<?php endif?>
					<div class="clear"></div>
				</li>
			<?php 
		}
		
		/**
		 * 
		 * insert settings into saps array
		 */
		private function groupSettingsIntoSaps(){
			$arrSaps = $this->arrSections[0]["arrSaps"];
			
			//group settings by saps
			foreach($this->arrSettings as $key=>$setting){
				$sapID = $setting["sap"];
				
				if(isset($arrSaps[$sapID]["settings"]))
					$arrSaps[$sapID]["settings"][] = $setting;
				else 
					$arrSaps[$sapID]["settings"] = array($setting);
			}
			return($arrSaps);
		}
		
		/**
		 * 
		 * draw buttons that defined earlier
		 */
		private function drawButtons(){
			foreach($this->arrButtons as $key=>$button){
				if($key>0)
				echo "<span class='hor_sap'></span>";
				echo UniteFunctions::getHtmlLink("#", $button["title"],$button["id"],$button["class"]);
			}
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw all settings
		public function drawSettings(){
			$this->prepareToDraw();
			
			$arrSaps = $this->groupSettingsIntoSaps();			
			
			$class = "postbox";
			if(!empty($this->addClass))
				$class .= " ".$this->addClass;
			
			//draw settings - advanced - with sections
			foreach($arrSaps as $sap):
				
				?>
					<div class="<?php echo $class?>">
						<h3>
							<span><?php echo $sap["text"]?></span>
						</h3>			
												
						<div class="inside">
							<ul class="list_settings">
						<?php
						
							foreach($sap["settings"] as $setting){
								switch($setting["type"]){
									case self::TYPE_HR:
										$this->drawHrRow($setting);
									break;
									case self::TYPE_STATIC_TEXT:
										$this->drawTextRow($setting);
									break;
									default:
										$this->drawSettingRow($setting);
									break;
								}
							}
							
							?>
							</ul>
							
							<?php 
							if(!empty($this->arrButtons)){
								?>
								<div class="clear"></div>
								<div class="settings_buttons">
								<?php 
									$this->drawButtons();
								?>
								</div>	
								<div class="clear"></div>
								<?php 								
							}								
						?>
						
							<div class="clear"></div>
						</div>
					</div>
				<?php 			
														
			endforeach;
			
		}
		
		
		//-----------------------------------------------------------------------------------------------
		// draw sections menu
		public function drawSections($activeSection=0){
			if(!empty($this->arrSections)):
				echo "<ul class='listSections' >";
				for($i=0;$i<count($this->arrSections);$i++):
					$class = "";
					if($activeSection == $i) $class="class='selected'";
					$text = $this->arrSections[$i]["text"];
					echo '<li '.$class.'><a onfocus="this.blur()" href="#'.($i+1).'"><div>'.$text.'</div></a></li>';
				endfor;
				echo "</ul>";
			endif;
				
			//call custom draw function:
			if($this->customFunction_afterSections) call_user_func($this->customFunction_afterSections);
		}
		
		
		/**
		 * 
		 * do some operation before drawing the settings.
		 */
		protected function prepareToDraw(){
			
			$this->setSettingsStateByControls();
		}
		
		/**
		 * 
		 * draw settings function
		 */
		public function draw($formID=null){
			if(!empty($formID)){
				?>
				<form name="<?php echo $formID?>" id="<?php echo $formID?>">
					<?php $this->drawSettings() ?>
				</form>
				<?php 				
			}else
				$this->drawSettings();
		}
		
		
	}
?>