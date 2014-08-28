
	<div class="postbox box-slideslist">
		<h3>
			<span class='slideslist-title'>Slides List</span>
			<span id="saving_indicator" class='slideslist-loading'>Saving Order...</span>
		</h3>
		<div class="inside">
			<?php if(empty($arrSlides)):?>
			No Slides Found
			<?php endif?>
			
			
			<ul id="list_slides" class="list_slides ui-sortable">
			
				<?php foreach($arrSlides as $slide):
					$imageFilepath = $slide->getImageFilepath();
					$urlImage = self::getImageUrl($imageFilepath,200,100,true);
					$filename = $slide->getImageFilename();
					$slideid = $slide->getID();
					
					$urlEditSlide = self::getViewUrl(KBSliderAdmin::VIEW_SLIDE,"id=$slideid");
					$linkEdit = UniteFunctions::getHtmlLink($urlEditSlide, $filename);
				?>
					<li id="slidelist_item_<?php echo $slideid?>" class="ui-state-default">
					
						<span class="slide-col col-id">
							<?php echo $slideid?>
						</span>
						
						<span class="slide-col col-name">
							<?php echo $linkEdit?>
							<a class='button-secondary button_edit_slide' href='<?php echo $urlEditSlide?>'>Edit Slide</a>
						</span>
						<span class="slide-col col-image">
							<img id="slide_image_<?php echo $slideid?>" src="<?php echo $urlImage?>" class="slide_image" title="Slide Image - Click to change" alt="<?php echo $filename?>"></img>
						</span>
						
						<span class="slide-col col-operations">
							<a id="button_delete_slide_<?php echo $slideid?>" class='button-secondary button_delete_slide' href='javascript:void(0)'>Delete</a>
						</span>
						
						<span class="slide-col col-handle">
							<div class="col-handle-inside">
								<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
							</div>
						</span>	
						<div class="clear"></div>
					</li>
				<?php endforeach;?>
			</ul>
			
		</div>
	</div>