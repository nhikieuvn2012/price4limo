<?php
	class UniteSettingsProduct extends UniteSettingsAdvanced{
		
		
		
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
			$readonly = "";
			
			if(isset($setting["style"])) 
				$style = "style='".$setting["style"]."'";
			if(isset($setting["disabled"])) 
				$disabled = 'disabled="disabled"';
				
			if(isset($setting["readonly"])){
				$readonly = "readonly='readonly'";
			}
			
			$class = "regular-text";
						
			if(isset($setting["class"]) && !empty($setting["class"])){
				$class = $setting["class"];
				
				//convert short classes:
				switch($class){
					case "small":
						$class = "small-text";
					break;
					case "code":
						$class = "regular-text code";
					break;
				}
				
			}
				
			if(!empty($class))
				$class = "class='$class'";
			
			?>
				<input type="text" <?php echo $class?> <?php echo $style?> <?php echo $disabled?><?php echo $readonly?> id="<?php echo $setting["id"]?>" name="<?php echo $setting["name"]?>" value="<?php echo $setting["value"]?>" />
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
			
			$style = "";
			if(isset($setting["style"]))
				$style = "style='".$setting["style"]."'";

			$rows = UniteFunctions::getVal($setting, "rows");
			if(!empty($rows))
				$rows = "rows='$rows'";
				
			$cols = UniteFunctions::getVal($setting, "cols");
			if(!empty($cols))
				$cols = "cols='$cols'";
			
			?>
				<textarea id="<?php echo $setting["id"]?>" name="<?php echo $setting["name"]?>" <?php echo $style?> <?php echo $disabled?> <?php echo $rows?> <?php echo $cols?>  ><?php echo $setting["value"]?></textarea>
			<?php
			if(!empty($cols))
				echo "<br>";	//break line on big textareas.
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
		
		/**
		 * 
		 * drwap ken burns custom setting.
		 */
		protected function drawCustom_kenBurnsPosition($setting){
			$arrPosVert = array("random"=>"Random V.","top"=>"Top","center"=>"Middle","bottom"=>"Bottom");
			$arrPosHor = array("random"=>"Random H.","left"=>"Left","center"=>"Center","right"=>"Right");
			
			$id = $setting["id"];
			$name = $setting["name"];
			
			$value_vert = "random";
			$value_hor = "random";
			
			$value = $setting["value"];			
			$arr = explode(",",$value);
			if(count($arr) == 2){
				$value_vert = $arr[0];
				$value_hor = $arr[1];
			}
			
			$selectVert = UniteFunctions::getHTMLSelect($arrPosVert,$value_vert,"id='{$id}_vert' name='{$name}_vert'",true);
			$selectHor = UniteFunctions::getHTMLSelect($arrPosHor,$value_hor,"id='{$id}_hor' name='{$name}_hor'",true);
			
			?>
				<?php echo $selectVert?>
				<span>&nbsp;</span>
				<?php echo $selectHor?>
				<span>&nbsp;</span>
			<?php
		}
		
		
		/**
		 * 
		 * draw custom setting
		 */
		protected function drawCustom($setting){
			
			$customType = UniteFunctions::getVal($setting, "custom_type");
			switch($customType){
				case "kenburns_position":
					$this->drawCustom_kenBurnsPosition($setting);
				break;
				default:
					UniteFunctions::throwError("Wrong custom type: $customType");		
				break;	
			}
			
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
				<tr id="<?php echo $setting["id_row"]?>" <?php echo $rowStyle ?> valign="top">
					<td colspan="4" align="right" <?php echo $cellStyle?>>
						<span class="spanSettingsStaticText"><?php echo $setting["text"]?></span>
					</td>
				</tr>
			<?php 
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw hr row
		protected function drawHrRow($setting){
			//set hidden
			$rowStyle = "";
			if(isset($setting["hidden"])) $rowStyle = "style='display:none;'";
			?>
			<tr id="<?php echo $setting["id_row"]?>" <?php echo $rowStyle ?>>
				<td colspan="4" style="border-top:1px dashed black;"></td>
			</tr>
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
			
			//set text class:
			$class = "";
			if(isset($setting["disabled"])) $class = "class='disabled'";
			
			//modify text:
			$text = UniteFunctions::getVal($setting,"text","");				
			// prevent line break (convert spaces to nbsp)
			$text = str_replace(" ","&nbsp;",$text);
			switch($setting["type"]){					
				case self::TYPE_CHECKBOX:
					$text = "<label for='".$setting["id"]."' style='cursor:pointer;'>$text</label>";
				break;
			}			
			
			//set settings text width:
			$textWidth = "";
			if(isset($setting["textWidth"])) $textWidth = 'width="'.$setting["textWidth"].'"';
			
			$description = UniteFunctions::getVal($setting, "description");
			$required = UniteFunctions::getVal($setting, "required");
			
			?>
				<tr id="<?php echo $setting["id_row"]?>" <?php echo $rowStyle ?> <?php echo $class?> valign="top">
					<th <?php echo $textStyle?> scope="row" <?php echo $textWidth ?>>
						<?php echo $text?>:
					</th>
					<td <?php echo $cellStyle?>>
						<?php 
							$this->drawInputs($setting);
						?>
						<?php if(!empty($required)):?>
							<span class='setting_required'>*</span>
						<?php endif?>											
						<?php if(!empty($description)):?>
							<span class="description"><?php echo $description?></span>
						<?php endif?>						
					</td>
				</tr>								
			<?php 
		}
		
		//-----------------------------------------------------------------------------------------------
		//draw all settings
		public function drawSettings(){
			$this->prepareToDraw();
			
			//draw main div
			$lastSectionKey = -1;
			$visibleSectionKey = 0;
			$lastSapKey = -1;
			
			//draw settings - simple
			if(empty($this->arrSections)):
					?><table class='form-table'><?php
					foreach($this->arrSettings as $key=>$setting){
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
					?></table><?php					
			else:
			
				//draw settings - advanced - with sections
				foreach($this->arrSettings as $key=>$setting):
								
					//operate sections:
					if(!empty($this->arrSections) && isset($setting["section"])){										
						$sectionKey = $setting["section"];
												
						if($sectionKey != $lastSectionKey):	//new section					
							$arrSaps = $this->arrSections[$sectionKey]["arrSaps"];
							
							if(!empty($arrSaps)){
								//close sap
								if($lastSapKey != -1):
								?>
									</table>
									</div>
								<?php						
								endif;							
								$lastSapKey = -1;
							}
							
					 		$style = ($visibleSectionKey == $sectionKey)?"":"style='display:none'";
					 		
					 		//close section
					 		if($sectionKey != 0):
					 			if(empty($arrSaps))
					 				echo "</table>";
					 			echo "</div>\n";	 
					 		endif;					 		
					 		
							//if no saps - add table
							if(empty($arrSaps)):
							?><table class="form-table"><?php
							endif;								
						endif;
						$lastSectionKey = $sectionKey;
					}//end section manage
					
					//operate saps
					if(!empty($arrSaps) && isset($setting["sap"])){				
						$sapKey = $setting["sap"];
						if($sapKey != $lastSapKey){
							$sap = $this->getSap($sapKey,$sectionKey);
							
							//draw sap end					
							if($sapKey != 0): ?>
							</table>
							<?php endif;
							
							//set opened/closed states:
							//$style = "style='display:none;'";
							$style = "";
							
							$class = "divSapControl";
							
							if($sapKey == 0 || isset($sap["opened"]) && $sap["opened"] == true){
								$style = "";
								$class = "divSapControl opened";						
							}
							
							?>
								<div id="divSapControl_<?php echo $sectionKey."_".$sapKey?>" class="<?php echo $class?>">
									
									<h3><?php echo $sap["text"]?></h3>
								</div>
								<div id="divSap_<?php echo $sectionKey."_".$sapKey?>" class="divSap" <?php echo $style ?>>				
								<table class="form-table">
							<?php 
							$lastSapKey = $sapKey;
						}
					}//saps manage
					
					//draw row:
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
				endforeach;
			endif;	
			 ?>
			</table>
			
			<?php
			if(!empty($this->arrSections)):
				if(empty($arrSaps))	 //close table settings if no saps 
					echo "</table>";
				echo "</div>\n";	 //close last section div
			endif;
			
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