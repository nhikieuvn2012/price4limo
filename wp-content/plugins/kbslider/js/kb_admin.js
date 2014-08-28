
var KBSliderAdmin = new function(){
		
		/**
		 * init "slider" view functionality
		 */
		var initSaveSliderButton = function(ajaxAction){
			
			jQuery("#button_save_slider").click(function(){
					
					//collect data
					var data = {						
							params: UniteSettings.getSettingsObject("form_slider_params"),
							main: UniteSettings.getSettingsObject("form_slider_main")
						};
					
					//add slider id to the data
					if(ajaxAction == "update_slider"){
						data.sliderid = jQuery("#sliderid").val();
						
						//some ajax beautifyer
						UniteAdmin.setAjaxLoaderID("loader_update");
						UniteAdmin.setAjaxHideButtonID("button_save_slider");
						UniteAdmin.setSuccessMessageID("update_slider_success");
					}
					
					UniteAdmin.ajaxRequest(ajaxAction ,data);
			});		
		}
		
		/**
		 * update shortcode from alias value.
		 */
		var updateShortcode = function(){
			var alias = jQuery("#alias").val();			
			var shortcode = "[kb_slider "+alias+"]";
			if(alias == "")
				shortcode = "-- wrong alias -- ";
			jQuery("#shortcode").val(shortcode);
		}
		
		
		/**
		 * init "slider->add" view.
		 */
		this.initAddSliderView = function(){
			jQuery("#title").focus();
			initSaveSliderButton("create_slider");
		}
		
		/**
		 * init "slider->edit" view.
		 */		
		this.initEditSliderView = function(){
			
			initSaveSliderButton("update_slider");
			
			//select shortcode text when click on it.
			jQuery("#shortcode").focus(function(){				
				this.select();
			});
			jQuery("#shortcode").click(function(){				
				this.select();
			});
			
			//update shortcode
			jQuery("#alias").change(function(){
				updateShortcode();
			});

			jQuery("#alias").keyup(function(){
				updateShortcode();
			});
			
			//delete slider action
			jQuery("#button_delete_slider").click(function(){
				
				if(confirm("Do you really want to delete '"+jQuery("#title").val()+"' ?") == false)
					return(true);
				
				var data = {sliderid: jQuery("#sliderid").val()}
				
				UniteAdmin.ajaxRequest("delete_slider" ,data);

			});			
		}
		
		/**
		 * update slides order
		 */
		var updateSlidesOrder = function(sliderID){
			var arrSlideHtmlIDs = jQuery( "#list_slides" ).sortable("toArray");
			
			//get slide id's from html (li) id's
			var arrIDs = [];
			jQuery(arrSlideHtmlIDs).each(function(index,value){
				var slideID = value.replace("slidelist_item_","");
				arrIDs.push(slideID);
			});
			
			//save order
			var data = {arrIDs:arrIDs,sliderID:sliderID};
			
			jQuery("#saving_indicator").show();
			UniteAdmin.ajaxRequest("update_slides_order" ,data,function(){
				jQuery("#saving_indicator").hide();
			});
			
		}
		
		/**
		 * init "sliders list" view 
		 */
		this.initSlidersListView = function(){
			jQuery(".button_delete_slider").click(function(){
				
				var sliderID = this.id.replace("button_delete_","");
				var sliderTitle = jQuery("#slider_title_"+sliderID).text(); 
				if(confirm("Do you really want to delete '"+sliderTitle+"' ?") == false)
					return(false);
				
				UniteAdmin.ajaxRequest("delete_slider" ,{sliderid:sliderID});
			});
		}
		
		/**
		 * init "slides list" view 
		 */
		this.initSlidesListView = function(sliderID){
			
			//set the slides sortable, init save order
			jQuery("#list_slides").sortable({
					axis:"y",
					handle:'.col-handle',
					update:function(){updateSlidesOrder(sliderID)}
			});
			
			//new slide
			jQuery("#button_new_slide, #button_new_slide_top").click(function(){
				
				UniteAdmin.openAddImageDialog("Select Slide Image",function(urlImage){
					var data = {sliderid:sliderID,url_image:urlImage};
					UniteAdmin.ajaxRequest("add_slide" ,data);
				});	
			});
			
			// delete single slide
			jQuery(".button_delete_slide").click(function(){
				var slideID = this.id.replace("button_delete_slide_","");
				var data = {slideID:slideID,sliderID:sliderID};
				if(confirm("Delete this slide?") == false)
					return(false);
				UniteAdmin.ajaxRequest("delete_slide" ,data);
			});
			
			//change image
			jQuery(".col-image .slide_image").click(function(){
				var slideID = this.id.replace("slide_image_","");
				UniteAdmin.openAddImageDialog("Select Slide Image",function(urlImage){					
					var data = {slider_id:sliderID,slide_id:slideID,url_image:urlImage};
					UniteAdmin.ajaxRequest("change_slide_image" ,data);
				}); 
				
			});
			
		}
		
		
		/**
		 * init "edit slide" view
		 */
		this.initEditSlideView = function(slideID){
			
			//save slide actions
			jQuery("#button_save_slide").click(function(){
				
				var data = {
						slideid:slideID,
						params:UniteSettings.getSettingsObject("form_slide_params"),
						layers:UniteLayers.getLayers()
					};
				
				UniteAdmin.setAjaxHideButtonID("button_save_slide");
				UniteAdmin.setAjaxLoaderID("loader_update");
				UniteAdmin.setSuccessMessageID("update_slide_success");
				UniteAdmin.ajaxRequest("update_slide" ,data);
			});
			
			//change image actions
			jQuery("#button_change_image").click(function(){
				
				UniteAdmin.openAddImageDialog("Select Slide Image",function(urlImage){
						//set visual image 
						jQuery("#divLayers").css("background-image","url("+urlImage+")");
						
						//update setting input
						jQuery("#image_url").val(urlImage);
					}); //dialog
			});	//change image click.
						
			//init video buttons:
			
			//nothing
			jQuery("#video_addon_1").click(function(){
				jQuery("#vimeo_id_row").hide();
				jQuery("#video_description_row").hide();
				jQuery("#video_fullscreen_row").hide();
				jQuery("#youtube_id_row").hide();
				jQuery("#video_description_row th").html("Video Description:");
			});	
			
			//youtube
			jQuery("#video_addon_2").click(function(){
				jQuery("#youtube_id_row").show();
				jQuery("#video_description_row").show();
				jQuery("#video_fullscreen_row").show();
				jQuery("#vimeo_id_row").hide();
				jQuery("#video_description_row th").html("Video Description:");
			});
			
			//vimeo
			jQuery("#video_addon_3").click(function(){
				jQuery("#vimeo_id_row").show();
				jQuery("#video_description_row").show();
				jQuery("#video_fullscreen_row").show();
				jQuery("#youtube_id_row").hide();
				jQuery("#video_description_row th").html("Video Description:");
			});

			jQuery("#video_addon_4").click(function(){
				jQuery("#vimeo_id_row").hide();
				jQuery("#video_fullscreen_row").hide();
				jQuery("#youtube_id_row").hide();
				jQuery("#video_description_row").show();
				jQuery("#video_description_row th").html("Custom HTML:");
			});
			
			
			//init ken burns settings:
			
			//default settings
			jQuery("#kenburn_type_1,#kenburn_type_2").click(function(){
				var selector =  "#kenburn_startpos_row,#kenburn_endpos_row,#zoom_type_row,#zoom_factor_row,#panduration_row,#effect_type_row,#color_transition_row"
				if(this.id == "kenburn_type_2")						
					jQuery(selector).show();
				else
					jQuery(selector).hide();
			});
			
			
		}
		
		

}
