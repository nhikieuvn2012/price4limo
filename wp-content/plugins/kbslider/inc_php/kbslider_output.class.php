<?php

	class KBSliderOutput{
		
		private static $sliderSerial = 0;
		
		private $sliderHtmlID;
		private $slider;
		
		
		/**
		 * 
		 * put the kb slider slider on the html page.
		 * @param $data - mixed, can be ID ot Alias.
		 */
		public static function putSlider($sliderID){
			$output = new KBSliderOutput();
			$slider = $output->putSliderBase($sliderID);
			
			return($slider);
		}
		
		
		/**
		 * 
		 * get thumbnail url, from the slide and slider params.
		 */
		private function getSlideThumbUrls(KBSlide $slide){
						
			$kenburnType = $slide->getParam("kenburn_type","default");
			
			$globalEffectType = $this->slider->getParam("global_effect_type",UniteImageView::EFFECT_BLUR);
			
			$imagePath = $pathImage = $slide->getImageFilepath();			
			$thumbWidth = $this->slider->getParam("thumbWidth");
			$thumbHeight = $this->slider->getParam("thumbHeight");
			
			//set effect type:
			if($kenburnType == "default")
				$effectType = $globalEffectType;
			else 
				$effectType = $slide->getParam("effect_type",$globalEffectType);
			
			
			//set image url's
			$urlImageEffect = "";
			if($effectType != "none")			
				$urlImageEffect = UniteBaseClassKB::getImageUrl($imagePath,null,null,false,$effectType);
			
			$urlThumb = UniteBaseClassKB::getImageUrl($imagePath,$thumbWidth,$thumbHeight,true);
			$urlThumbBW = UniteBaseClassKB::getImageUrl($imagePath,$thumbWidth,$thumbHeight,true,UniteImageView::EFFECT_BW);
			
			//set output
			$arrThumbs = array();
			$arrThumbs["normal"] = $urlThumb;
			$arrThumbs["bw"] = $urlThumbBW;
			$arrThumbs["image_effect"] = $urlImageEffect;
			
			return($arrThumbs);
		}
		
		
		/**
		 * 
		 * switch direction for image align
		 */
		private function switchDirection($dir){
			$arrDirs = array(
				"left"=>"right",
				"right"=>"left",
				"top"=>"bottom",
				"bottom"=>"top",
				"center"=>"center",
				"middle"=>"center"
			);
			
			if(array_key_exists($dir, $arrDirs) == false)
				UniteFunctions::throwError("dir: $dir not found!!!");
				
			$newDir = $arrDirs[$dir];
			
			return($newDir);
		}
		
		
		/**
		 * 
		 * put the slider slides
		 */
		private function putSlides(){
			
			$slides = $this->slider->getSlides();
			$sliderTimer = $this->slider->getParam("timer",10);

			$sliderWidth = $this->slider->getParam("width");
			$sliderHeight = $this->slider->getParam("height");
			
			
			foreach($slides as $slide){			
				$params = $slide->getParams();
				
				// ====== ken burns params ==========
				 				
				$kenburn_type = UniteFunctions::getVal($params, "kenburn_type","default"); 
				
				if($kenburn_type == "default"){
					$startAlign = "random";
					$endAlign = "random";
					$zoom = "random";
					$zoomFactor = "random";
					$panduration = $sliderTimer;
					$color_transition = 4;
						
				}else{
					
					//custom parameters:
					// ----- get start and end position
					
					$arrHor = array("left","center","right");
					$arrVert = array("top","center","bottom");
					
					$startpos_vert = UniteFunctions::getVal($params, "kenburn_startpos_vert");
					$startpos_hor = UniteFunctions::getVal($params, "kenburn_startpos_hor");
					
					$endpos_vert = UniteFunctions::getVal($params, "kenburn_endpos_vert");
					$endpos_hor = UniteFunctions::getVal($params, "kenburn_endpos_hor");
					
					//randomise the positions if needed
					if(empty($startpos_hor) || $startpos_hor == "random")
						$startpos_hor = UniteFunctions::getRandomArrayItem($arrHor);
						
					if(empty($endpos_hor) || $endpos_hor == "random")
						$endpos_hor = UniteFunctions::getRandomArrayItem($arrHor);
					
					if(empty($startpos_vert) || $startpos_vert == "random")
						$startpos_vert = UniteFunctions::getRandomArrayItem($arrVert);
						
					if(empty($endpos_vert) || $endpos_vert == "random")
						$endpos_vert = UniteFunctions::getRandomArrayItem($arrVert);
						
					$startpos_hor = $this->switchDirection($startpos_hor);
					$startpos_vert = $this->switchDirection($startpos_vert);
					$endpos_hor = $this->switchDirection($endpos_hor);
					$endpos_vert = $this->switchDirection($endpos_vert);
					
					$startAlign = "$startpos_hor,$startpos_vert";
					$endAlign = "$endpos_hor,$endpos_vert";
	
					//---- other ken burns params
					$zoom = UniteFunctions::getVal($params, "zoom_type","random");
					$zoomFactor = UniteFunctions::getVal($params, "zoom_factor","random");
					$panduration = UniteFunctions::getVal($params, "panduration",$sliderTimer);
					$color_transition = UniteFunctions::getVal($params, "color_transition",4);
					
				}
				
				//slide transition:
				$slideTransition = $slide->getParam("slide_transition","slide");
				
				//images and thumbs:
				$slideImage = $slide->getImageUrl();
				$slideThumbUrls = $this->getSlideThumbUrls($slide);
				
				$slideImageEffect = $slideThumbUrls["image_effect"];
				
				$thumbNormal = $slideThumbUrls["normal"];
				$thumbBW = $slideThumbUrls["bw"];
				
				//video:
				$video_addon = $slide->getParam("video_addon","none");
				$is_video = false;
				
				$iframeHeight = $sliderHeight-20;

				//handle video fullscreen
				$is_fullscreen = $slide->getParam("video_fullscreen","false");
				$videoClass = "video_container_wrap";
				$videoWidth = 534;
				
				if($is_fullscreen == "true"){
					$videoClass = "";
					$videoWidth = $sliderWidth;
				}
				
				switch($video_addon){
					case "youtube":
						$is_video = true;
						$youtubeID = $slide->getParam("youtube_id");
						$videoData = '<iframe class="video_clip" src="http://www.youtube.com/embed/'.$youtubeID.'?hd=1&amp;wmode=opaque&amp;autohide=1&amp;showinfo=0" height="'.$iframeHeight.'" width="'.$videoWidth.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
					break;
					case "vimeo":
						$is_video = true;
						$vimeoID = $slide->getParam("vimeo_id");
						$videoData = '<iframe class="video_clip" src="http://player.vimeo.com/video/'.$vimeoID.'?title=0&amp;byline=0&amp;portrait=0" width="'.$videoWidth.'" height="'.$iframeHeight.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
					break;
					case "html":
						$is_video = true;
						$videoData = "";
						$videoClass = "html_container_wrap";
					break;
				}
				
				
				//Put HTML:
				?>					
					<li data-transition="<?php echo $slideTransition?>" 
					    data-startalign="<?php echo $startAlign?>" data-endAlign="<?php echo $endAlign?>"
					    data-zoom="<?php echo $zoom?>"  data-zoomfact="<?php echo $zoomFactor?>" data-panduration="<?php echo $panduration?>" data-colortransition="<?php echo $color_transition?>">
					    
						<img src="<?php echo $slideImage?>" data-bw="<?php echo $slideImageEffect?>" data-thumb="<?php echo $thumbNormal?>" data-thumb_bw="<?php echo $thumbBW?>">
						  
						<?php if($is_video == true):?>
						<div class="video_container">
							<div class="<?php echo $videoClass?>">
							<?php echo $videoData?>
							<?php echo $slide->getParam("video_description","");?>
							<div id="close" class="close"></div>
							</div>									
						</div>
						<?php endif?>
						<?php $this->putCreativeLayer($slide)?>
					</li>
				<?php 
			}	//get foreach
		}
		
		
		/**
		 * 
		 * put creative layer
		 */
		public function putCreativeLayer(KBSlide $slide){
			$layers = $slide->getLayers();
			if(empty($layers))
				return(false);
			?>
			<div class="creative_layer">
				<?php foreach($layers as $layer):
					$class = UniteFunctions::getVal($layer, "style");
					$left = UniteFunctions::getVal($layer, "left",0);
					$top = UniteFunctions::getVal($layer, "top",0);
					$animation = UniteFunctions::getVal($layer, "animation","fade");
					$outputClass = trim($class);
					if(!empty($outputClass))
						$outputClass .= " ";
					$outputClass .= $animation;
					$outputClass = trim($outputClass);
					
					$text = UniteFunctions::getVal($layer, "text");
					$text = do_shortcode($text);
					$type = UniteFunctions::getVal($layer, "type","text");

					$outputHtml = $text;
					if($type == "image"){
						$imageUrl = UniteFunctions::getVal($layer, "image_url");
						$outputHtml = '<img src="'.$imageUrl.'" alt="'.$text.'">';
					}
				?>
					
				<div class="<?php echo $outputClass?>" style="top:<?php echo $top?>px;left:<?php echo $left?>px;position:absolute;"><?php echo $outputHtml?></div>
				<?php endforeach;?>
			</div>
			<?php 
		}

		
		/**
		 * 
		 * put slider javascript
		 */
		public function putJS(){
			$params = $this->slider->getParams();
			
			//set google font js file origin
			$jsOrigin = $this->slider->getParam("googleFontOrigin","cdn");			
			if($jsOrigin == "cdn")
				$googleFontJS = "http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js";
			else
				$googleFontJS = GlobalsKBSlider::$urlKBPlugin."js/jquery.googlefonts.js";
				
			$googleFonts = $this->slider->getParam("googleFonts","PT+Sans+Narrow:400,700");
			
			$useGoogleFonts = $this->slider->getParam("useGoogleFonts","yes");
			if($useGoogleFonts == "no"){
				$googleFonts = "";
				$googleFontJS = "";
			}
			
			$noConflict = $this->slider->getParam("jquery_noconflict","on");
			 
			?>
					
			
			<script type="text/javascript">
				
				var tpj=jQuery;
				
				<?php if($noConflict == "on"):?>				
					tpj.noConflict();
				<?php endif?>
				
				tpj(document).ready(function() {
				
				if (tpj.fn.cssOriginal!=undefined)
					tpj.fn.css = tpj.fn.cssOriginal;

				tpj('#<?php echo $this->sliderHtmlID?>').show().kenburn(
					{
						width:<?php echo $this->slider->getParam("width","900")?>,
						height:<?php echo $this->slider->getParam("height","300")?>,
						
						thumbWidth:<?php echo $this->slider->getParam("thumbWidth","90")?>,
						thumbHeight:<?php echo $this->slider->getParam("thumbHeight","50")?>,								
						thumbAmount:<?php echo $this->slider->getParam("thumbAmount","4")?>,							
						thumbSpaces:<?php echo $this->slider->getParam("thumbSpaces","4")?>,								
						thumbPadding:<?php echo $this->slider->getParam("thumbPadding","4")?>,
						thumbStyle:'<?php echo $this->slider->getParam("thumbStyle","thumb")?>',						
						bulletXOffset:<?php echo $this->slider->getParam("bulletXOffset","0")?>,
						bulletYOffset:<?php echo $this->slider->getParam("bulletYOffset","0")?>,
						shadow:'<?php echo $this->slider->getParam("shadow","true")?>',
						touchenabled:'<?php echo $this->slider->getParam("touchenabled","on")?>',			
						timer:<?php echo $this->slider->getParam("timer","10")?>,
						timerShow:'<?php echo $this->slider->getParam("showtimer","off")?>',
						
						pauseOnRollOverThumbs:'<?php echo $this->slider->getParam("pauseOnRollOverThumbs","off")?>',
						pauseOnRollOverMain:'<?php echo $this->slider->getParam("pauseOnRollOverMain","on")?>',
						preloadedSlides:<?php echo $this->slider->getParam("preloadedSlides","2")?>,
						
						debug:"<?php echo $this->slider->getParam("debug","off")?>",
						
						googleFonts:'<?php echo $googleFonts?>',
						googleFontJS:'<?php echo $googleFontJS?>'
					});
					
				});	//ready
				
			</script>
			
			<?php 
		}
		
		
		/**
		 * 
		 * put inline error message in a box.
		 */
		private function putErrorMessage($message){
			?>
			<div style="width:800px;height:300px;margin-bottom:10px;border:1px solid black;">
				<div style="padding-top:40px;color:red;font-size:16px;text-align:center;">
					KB Slider Error: <?php echo $message?> 
				</div>
			</div>
			<?php 
		}
		
		
		/**
		 * 
		 * put html slider on the html page.
		 * @param $data - mixed, can be ID ot Alias.
		 */
		public function putSliderBase($sliderID){
			global $g_kbSliderVersion;
			
			try{
			
				self::$sliderSerial++;
				
				$this->slider = new KBSlider();
				$this->slider->initByMixed($sliderID);
				
				//the initial id can be alias
				$sliderID = $this->slider->getID();
				
				$wrapperHeigh = 0;	// top and bottom margins
				$wrapperHeigh += $this->slider->getParam("height");
				//add thumb height
				if($this->slider->getParam("thumbStyle") == "thumb"){
					$wrapperHeigh += $this->slider->getParam("thumbHeight");
					$wrapperHeigh += $this->slider->getParam("thumbPadding");
				}
				$wrapperHeigh += 1;	//add some padding.
				
				$theme = $this->slider->getParam("theme","light");
				$this->sliderHtmlID = "kb_slider_".$sliderID."_".self::$sliderSerial;
				
				$wrapperStyle = "";
				
				$wrapperStyle .= "height:{$wrapperHeigh}px;";
				
				//set position:
				$sliderPosition = $this->slider->getParam("position","center");
				switch($sliderPosition){
					case "center":
					default:
						$wrapperStyle .= "margin:0px auto;";
					break;
					case "left":
						$wrapperStyle .= "float:left;";
					break;
					case "right":
						$wrapperStyle .= "float:right;";
					break;
				}
				
				//set margin:
				if($sliderPosition != "center"){
					$wrapperStyle .= "margin-left:".$this->slider->getParam("margin_left","0")."px;";
					$wrapperStyle .= "margin-right:".$this->slider->getParam("margin_right","0")."px;";
				}
				
				$wrapperStyle .= "margin-top:".$this->slider->getParam("margin_top","0")."px;";
				$wrapperStyle .= "margin-bottom:".$this->slider->getParam("margin_bottom","0")."px;";

				//pub js to body handle
				$htmlBeforeSlider = "";
				if($this->slider->getParam("js_to_body","false") == "true"){
					$urlIncludeJS1 = UniteBaseClassKB::$url_plugin."kb-plugin/js/jquery.themepunch.plugins.min.js";
					$urlIncludeJS2 = UniteBaseClassKB::$url_plugin."kb-plugin/js/jquery.themepunch.kenburn.min.js";
					$htmlBeforeSlider .= "<script type='text/javascript' src='$urlIncludeJS1'></script>";
					$htmlBeforeSlider .= "<script type='text/javascript' src='$urlIncludeJS2'></script>";
				}
				
				?>

				<!-- START KEN BURNS SLIDER ver. <?php echo $g_kbSliderVersion?> -->
				
				<?php echo $htmlBeforeSlider?>
				
				<div class="kb_slider_wrapper" style="<?echo $wrapperStyle?>">
					<div id="<?php echo $this->sliderHtmlID ?>" class="kb_slider <?php echo $theme ?>" style="display:none">
						<ul>
							<?php $this->putSlides()?>
						</ul>
					</div>		
				</div>
				<?php 
				
				$this->putJS();
				?>
				<!-- END KEN BURNS SLIDER -->
				<?php 
				
			}catch(Exception $e){
				$message = $e->getMessage();
				$this->putErrorMessage($message);
			}
			
			return($this->slider);
		}
		
		
	}

?>