var UniteLayers = new function(){
	
	var initTop = 100;
	var initLeft = 100;
	var initText = "Caption Text";
	
	//init system vars	
	var t = this;	
	var containerID = "#divLayers";
	var container;	
	var arrLayers = {};
	var id_counter = 0;
	var initLayers = null;
	var selectedLayerSerial = -1;
	var urlCssCaptions = null;
	var initArrCaptionClasses = [];
	
	/**
	 * set init layers object (from db)
	 */
	t.setInitLayersJson = function(jsonLayers){
		initLayers = jQuery.parseJSON(jsonLayers);
	}
	
	/**
	 * set init captions classes array (from the captions.css)
	 */
	t.setInitCaptionClasses = function(jsonClasses){
		initArrCaptionClasses = jQuery.parseJSON(jsonClasses);
	}
	
	/**
	 * set captions url for refreshing when needed
	 */
	t.setCssCaptionsUrl = function(url){
		urlCssCaptions = url;
	}
	
	/**
	 * clear layer html fields, and disable buttons
	 */
	var disableFormFields = function(){
		//clear html form
		jQuery("#form_layers")[0].reset();
		jQuery("#form_layers input").attr("disabled", "disabled");
		jQuery("#form_layers select").attr("disabled", "disabled");
		
		jQuery("#button_delete_layer").addClass("button-disabled");
		
		jQuery("#form_layers .setting_text").addClass("text-disabled");
		
		jQuery("#layer_captions_down").removeClass("ui-state-active").addClass("ui-state-default");
	}
	
	/**
	 * enable buttons and form fields.
	 */
	var enableFormFields = function(){
		jQuery("#form_layers input").removeAttr("disabled");
		jQuery("#form_layers select").removeAttr("disabled");
		
		jQuery("#button_delete_layer").removeClass("button-disabled");
		
		jQuery("#form_layers .setting_text").removeClass("text-disabled");
		
		jQuery("#layer_captions_down").removeClass("ui-state-default").addClass("ui-state-active");
	}
	
	/**
	 * close css dialog
	 */
	t.closeCssDialog = function(){
		jQuery("#dialog_edit_css").dialog("close");
	}
	
	/**
	 * init the layout
	 */
	t.init = function(){
		
		container = jQuery(containerID);
		
		//add all layers from init
		if(initLayers){
			for(key in initLayers)
				addLayer(initLayers[key]);
		}
		
		//disable the properties box
		disableFormFields();
		
		//init elements
		initMainEvents();
		initSortbox();
		initButtons();
		initEditCSSDialog();
		initHtmlFields();
	}
	
	/**
	 * init general events
	 */
	var initMainEvents = function(){
		
		//unselect layers on container click
		container.click(unselectLayers);
		
		//jQuery("body").keypress(onBodyKeypress);
	}
	
	
	/**
	 * init events (update) for html properties change.
	 */
	var initHtmlFields = function(){
		
		//set layers autocompolete
		jQuery( "#layer_caption" ).autocomplete({
			source: initArrCaptionClasses,
			minLength:0,
			close:updateLayerFromFields
		});
		
		
		//open the list on right button
		jQuery( "#layer_captions_down" ).click(function(){
			if(jQuery(this).hasClass("ui-state-active"))
				jQuery( "#layer_caption" ).autocomplete( "search", "" );
		});
		
		//set events:
		jQuery("#layer_animation").change(updateLayerFromFields);
		jQuery("#layer_text").keyup(updateLayerFromFields);
		jQuery("#layer_left, #layer_top, #layer_caption").blur(updateLayerFromFields);
		jQuery("#layer_left, #layer_top, #layer_caption").keypress(function(event){
			if(event.keyCode == 13)
				updateLayerFromFields();
		});
	}
	
	/**
	 * init the sortbox
	 */
	var initSortbox = function(){
		
		//set the sortlist sortable
		jQuery( "#sortlist" ).sortable({
				axis:'y',
				update:function(){
					updateOrderFromSortbox();
				}
		});
		
	}
	
	
	
	/**
	 * init buttons actions
	 */
	var initButtons = function(){
		
		//set event buttons actions:
		jQuery("#button_add_layer").click(function(){
			addLayer();
		});
		
		jQuery("#button_add_layer_image").click(function(){
			UniteAdmin.openAddImageDialog("Select Layer Image",function(urlImage){
				addLayerImage(urlImage);
			});
		});
		
		jQuery("#button_delete_layer").click(function(){
			if(jQuery(this).hasClass("button-disabled"))
				return(false);
			
			//delete selected layer
			deleteCurrentLayer();
		});
		
		jQuery("#button_delete_all").click(function(){
			if(confirm("Do you really want to delete all the layers?") == false)
				return(true);
			
			if(jQuery(this).hasClass("button-disabled"))
				return(false);
			
			deleteAllLayers();
		});
	}
	
	
	/**
	 * init dialog actions
	 */
	var initEditCSSDialog = function(){
		jQuery("#button_edit_css").click(function(){
			
			UniteAdmin.ajaxRequest("get_captions_css","",function(response){				
				//update textarea with css:
				var cssData = response.data;
				jQuery("#textarea_edit").val(cssData);
				
				//open captions edit dialog	
				var buttons = {	
						
				//---- update button action:
						
				"Update":function(){
						UniteAdmin.setErrorMessageID("dialog_error_message");
						var data = jQuery("#textarea_edit").val();
						UniteAdmin.ajaxRequest("update_captions_css",data,function(response){
							jQuery("#dialog_success_message").show().html(response.message);
							setTimeout("UniteLayers.closeCssDialog()",500);
							
							if(urlCssCaptions)
								UniteAdmin.loadCssFile(urlCssCaptions,"paradigmslider-captions-css");
							
							//update html select (got as "data" from response)
							updateCaptionsInput(response.arrCaptions);	
						});
				},
				
				//---- restore original button action:
				
				"Restore Original":function(){
					UniteAdmin.setErrorMessageID("dialog_error_message");
					UniteAdmin.ajaxRequest("restore_captions_css","",function(response){						
						jQuery("#dialog_success_message").show().html("css content restored");
						jQuery("#textarea_edit").val(response.data);
						setTimeout("jQuery('#dialog_success_message').hide()",500);
					});					
				},
						
						//----- cancel button action:
				"Cancel":function(){t.closeCssDialog()}
				};
				
				//hide dialog error message
				jQuery("#dialog_error_message").hide();
				jQuery("#dialog_success_message").hide();
				
				//open the dialog
				jQuery("#dialog_edit_css").dialog({buttons:buttons,minWidth:800,modal:true});
				
			});	//main ajax request
			
		});	//edit css button click	
	}
	
	
	/**
	 * update layers order from sortbox elements
	 */
	var updateOrderFromSortbox = function(){
		var arrSortLayers = jQuery( "#sortlist" ).sortable("toArray");

		for(var i=0;i<arrSortLayers.length;i++){
			var sortID = arrSortLayers[i];
			var serial = getSerialFromSortID(sortID);
			var objUpdate = {order:i};
			updateLayer(serial,objUpdate);
		}
		
		//update z-index of the html by order
		updateZIndexByOrder();
	}
	
	
	/**
	 * update z-index of the layers by order value
	 */
	var updateZIndexByOrder = function(){
		for(var key in arrLayers){
			var layer = arrLayers[key];
			if(layer.order !== undefined){
				var zindex = layer.order+1;
				jQuery("#slide_layer_"+key).css("z-index",zindex);
			}
		};		
	}
	
	
	/**
	 * update the select html, set selected option, and update events.
	 */
	var updateCaptionsInput = function(arrCaptions){
		
		jQuery("#layer_caption").autocomplete("option","source",arrCaptions);
		
	}
	
	
	/**
	 * get layers array
	 */
	t.getLayers = function(){
		return(arrLayers);
	}
	
	
	/**
	 * refresh layer events
	 */
	var refreshEvents = function(serial){
		//update layer events.
		var layer = getHtmlLayerFromSerial(serial);		
		layer.draggable({
					drag: onLayerDrag,	//set ondrag event
					grid: [1,1]	//set the grid to 1 pixel
				});
		
		layer.click(function(event){
			setLayerSelected(serial);
			event.stopPropagation();
		});
		
		var sortItem = getHtmlSortItemFromSerial(serial);
			
		//on mouse down event - select layer
		sortItem.mousedown(function(){
			var serial = getSerialFromSortID(this.id);
			setLayerSelected(serial);
		});
		
	}

	/**
	 * get layer serial from id
	 */
	var getSerialFromID = function(layerID){
		var layerSerial = layerID.replace("slide_layer_","");
		return(layerSerial);
	}
	
	/**
	 * get serial from sortID
	 */
	var getSerialFromSortID = function(sortID){
		var layerSerial = sortID.replace("layer_sort_","");
		return(layerSerial);
	}
	
	/**
	 * get html layer from serial
	 */
	var getHtmlLayerFromSerial = function(serial){
		var htmlLayer = jQuery("#slide_layer_"+serial);
		if(htmlLayer.length == 0)
			UniteAdmin.showErrorMessage("Html Layer with serial: "+serial+" not found!");
		
		return(htmlLayer);
	}
	
	/**
	 * get sort field element from serial
	 */
	var getHtmlSortItemFromSerial = function(serial){
		var htmlSortItem = jQuery("#layer_sort_"+serial);
		if(htmlSortItem.length == 0){
			UniteAdmin.showErrorMessage("Html sort field with serial: "+serial+" not found!");
			return(false);
		}
		
		return(htmlSortItem);
	}
	
	/**
	 * get layer object by id
	 */
	var getLayer = function(serial){
		var layer = arrLayers[serial];
		if(!layer)
			UniteAdmin.showErrorMessage("getLayer error, Layer with serial:"+serial+"not found");
		
		return layer;
	}
	
	/**
	 * get current layer object
	 */
	var getCurrentLayer = function(){
		if(selectedLayerSerial == -1){
			UniteAdmin.showErrorMessage("Selected layer not set");
			return(null);
		}
		
		return getLayer(selectedLayerSerial);
	}
	
	
	/**
	 * set layer object to array
	 */
	var setLayer = function(layerID,layer){
		if(!arrLayers[layerID]){
			UniteAdmin.showErrorMessage("setLayer error, Layer with ID:"+layerID+"not found");
			return(false);
		}
		arrLayers[layerID] = layer;
	}
	
	
	/**
	 * make layer html, with params from the object
	 */
	var makeLayerHtml = function(serial,objLayer){
		var type = "text";
		if(objLayer.type)
			type = objLayer.type;
		
		var style = "left:"+objLayer.left+"px;top:"+objLayer.top+"px;z-index:"+serial;
		var html = '<div id="slide_layer_' + serial + '" style="' + style + '" class="slide_layer '+objLayer.style+'" >';
		
		//add html content
		if(type != "image")
			html += objLayer.text;
		else
			html += '<img src="'+objLayer.image_url+'" alt="'+objLayer.text+'"></img>';
		
		html += '</div>';
		return(html);
	}
	
	
	/**
	 * update layer by data object
	 */
	var updateLayer = function(serial,objData){
		var layer = getLayer(serial);
		if(!layer)
			return(false);
		
		for(key in objData){
			layer[key] = objData[key];
		}
		
		setLayer(serial,layer);
	}
	
	
	/**
	 * update current layer
	 */
	var updateCurrentLayer = function(objData){
		if(!arrLayers[selectedLayerSerial]){
			UniteAdmin.showErrorMessage("error! the layer with serial: "+selectedLayerSerial+" don't exists");
			return(false);
		}
		
		updateLayer(selectedLayerSerial,objData);
	}
	
	/**
	 * 
	 * add layer to sortbox
	 */
	var addToSortbox = function(serial,objLayer){
		var htmlLI = '<li id="layer_sort_'+serial+'" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><span class="sortbox_text">'+objLayer.text+'</span></li>';
		jQuery("#sortlist").append(htmlLI);
	}
	
	/**
	 * add image layer
	 */
	var addLayerImage = function(urlImage){
		addLayer(null,urlImage);
	}
	
	/**
	 * add layer
	 */
	var addLayer = function(objLayer,urlImage){
		
		//take default object - if not exists.
		if(!objLayer){
			var objLayer = {
				style:jQuery("#layer_caption").val(),
				left:initLeft,
				top:initTop,
				order: (id_counter+1),
				animation: jQuery("#layer_animation").val(),
				text:initText + (id_counter+1),
				type:"text"
			}
			
			//modify for image type
			if(urlImage){
				objLayer.style = "";
				objLayer.text = "Image " + (id_counter+1);
				objLayer.type = "image";
				objLayer.image_url = urlImage;
			}
		}
		
		
		objLayer.top = Math.round(objLayer.top);
		objLayer.left = Math.round(objLayer.left);
		
		arrLayers[id_counter] = objLayer;
		
		//add html
		var htmlLayer = makeLayerHtml(id_counter,objLayer);
		container.append(htmlLayer);
		
		//add layer to sortbox
		addToSortbox(id_counter,objLayer);
		
		//refresh draggable
		refreshEvents(id_counter);
		id_counter++;
		
		//enable "delete all" button, not event, but anyway :)
		jQuery("#button_delete_all").removeClass("button-disabled");

	}
	
	/**
	 * 
	 * delete layer from layers object
	 */
	var deleteLayerFromObject = function(serial){
		var arrLayersNew = {};
		var flagFound = false;
		for (key in arrLayers){
			if(key != serial)
				arrLayersNew[key] = arrLayers[key];
			else
				flagFound = true;
		}
		
		if(flagFound == false)
			UniteAdmin.showErrorMessage("Can't delete layer, serial: "+serial+" not found");
		
		arrLayers = arrLayersNew;
	}
	
	/**
	 * delete the layer from html.
	 */
	var deleteLayerFromHtml = function(serial){
		var htmlLayer = getHtmlLayerFromSerial(serial);
		htmlLayer.remove();
	}
	
	/**
	 * 
	 * delete layer from sortbox
	 */
	var deleteLayerFromSortbox = function(serial){
		var sortboxLayer = getHtmlSortItemFromSerial(serial);
		sortboxLayer.remove();
	}
	
	/**
	 * delete all representation of some layer
	 */
	var deleteLayer = function(serial){
		deleteLayerFromObject(serial);
		deleteLayerFromHtml(serial);
		deleteLayerFromSortbox(serial);
	}
	
	/**
	 * 
	 * call "deleteLayer" function with selected serial
	 */
	var deleteCurrentLayer = function(){
		if(selectedLayerSerial == -1)
			return(false);
		
		deleteLayer(selectedLayerSerial);
		
		//set unselected
		selectedLayerSerial = -1;
		
		//clear form and disable buttons
		disableFormFields();
	}

	/**
	 * delete all layers
	 */
	var deleteAllLayers = function(){

		arrLayers = {};
		container.html("");
		jQuery("#sortlist").html("");
		selectedLayerSerial = -1;
		
		disableFormFields();
		jQuery("#button_delete_all").addClass("button-disabled");		
	}
	
	/**
	 * update html layer position
	 */
	var updateHtmlLayerPosition = function(htmlLayer,top,left){
		htmlLayer.css({"top":top+"px","left":left+"px"});
	}
	
	
	/**
	 * update html layers from object
	 */
	var updateHtmlLayersFromObject = function(serial){
		if(!serial)
			serial = selectedLayerSerial
			
		var objLayer = getLayer(serial);
		
		if(!objLayer)
			return(false);
		
		var htmlLayer = getHtmlLayerFromSerial(serial);
		
		//set class name
		var className = "slide_layer ui-draggable";
		if(serial == selectedLayerSerial)
			className += " layer_selected";
		className += " "+objLayer.style;
		htmlLayer.attr("class",className);
		
		//set html
		var type = "text";
		if(objLayer.type)
			type = objLayer.type;
			
		if(type != "image")
			htmlLayer.html(objLayer.text);
		
		//set position
		updateHtmlLayerPosition(htmlLayer,objLayer.top,objLayer.left);
	}
	
	/**
	 * 
	 * update sortbox text from object
	 */
	var updateHtmlSortboxFromObject = function(serial){
		if(!serial)
			serial = selectedLayerSerial;

		var objLayer = getLayer(serial);
		
		if(!objLayer)
			return(false);
		
		var htmlSortItem = getHtmlSortItemFromSerial(serial);
		
		if(!htmlSortItem)
			return(false);
		
		htmlSortItem.children(".sortbox_text").text(objLayer.text);
	}
	
	/**
	 * update layer from html fields
	 */
	var updateLayerFromFields = function(){
		
		if(selectedLayerSerial == -1){
			UniteAdmin.showErrorMessage("No layer selected, can't update.");
			return(false);
		}
		
		var objUpdate = {};
		
		objUpdate.style = jQuery("#layer_caption").val();
		objUpdate.text = jQuery("#layer_text").val();
		objUpdate.top = Number(jQuery("#layer_top").val());
		objUpdate.left = Number(jQuery("#layer_left").val());				
		objUpdate.animation = jQuery("#layer_animation").val();				
		
		//update object
		updateCurrentLayer(objUpdate);
		
		//update html layers
		updateHtmlLayersFromObject();
		
		//update html sortbox
		updateHtmlSortboxFromObject();
	}
	
	
	/**
	 * update layer parameters from the object
	 */
	var updateLayerFormFields = function(serial){
		var objLayer = arrLayers[serial];		
		jQuery("#layer_caption").val(objLayer.style);
		jQuery("#layer_text").val(objLayer.text);
		jQuery("#layer_top").val(objLayer.top);
		jQuery("#layer_left").val(objLayer.left);
		jQuery("#layer_animation").val(objLayer.animation);
	}
	
	/**
	 * unselect all html layers
	 */
	var unselectHtmlLayers = function(){
		jQuery(containerID + " .slide_layer").removeClass("layer_selected");
	}
	
	
	/**
	 * 
	 * unselect all items in sortbox
	 */
	var unselectSortboxItems = function(){
		jQuery("#sortlist li").removeClass("ui-state-hover").addClass("ui-state-default");
	}

	
	/**
	 * set all layers unselected
	 */
	var unselectLayers = function(){
		unselectHtmlLayers();
		unselectSortboxItems();
		selectedLayerSerial = -1;
		disableFormFields();
	}
	
	
	/**
	 * set layer selected representation
	 */
	var setLayerSelected = function(serial){
		
		var layer = getHtmlLayerFromSerial(serial);
		var sortItem = getHtmlSortItemFromSerial(serial);
		
		//unselect all other layers
		unselectHtmlLayers();
		
		//set selected class
		layer.addClass("layer_selected");
		
		//unselect all sortbox items
		unselectSortboxItems();
		
		//set sort item selected class
		sortItem.removeClass("ui-state-default").addClass("ui-state-hover");
		
		//update selected serial var
		selectedLayerSerial = serial;
		
		//update bottom fields
		updateLayerFormFields(serial);
		
		//enable form fields
		enableFormFields();
	}
	
	/**
	 * 
	 * return if the layer is selected or not
	 */
	var isLayerSelected = function(serial){
		return(serial == selectedLayerSerial);
	}
	
	
//======================================================
	//			Events Functions
//======================================================	
	
	
	
	/**
	 * 
	 * on layer drag event - update layer position
	 */
	var onLayerDrag = function(){
		
		var layerSerial = getSerialFromID(this.id);
		var htmlLayer = jQuery(this); 
		var position = htmlLayer.position();
		var objUpdate = {top:Math.round(position.top),left:Math.round(position.left)};
		updateLayer(layerSerial,objUpdate);
				
		//update the position back with the rounded numbers (improve precision)
		updateHtmlLayerPosition(htmlLayer,objUpdate.top,objUpdate.left);
		
		//update bottom fields (only if selected)
		if(isLayerSelected(layerSerial))
			updateLayerFormFields(layerSerial);
		
	}
	
	/**
	 * move some layer
	 */
	var moveLayer = function(serial,dir,step){
		var layer = getLayer(serial);
		if(!layer)
			return(false);
		
		switch(dir){
			case "down":
				arrLayers[serial].top += step;
			break;
			case "up":
				arrLayers[serial].top -= step;
			break;
			case "right":
				arrLayers[serial].left += step;
			break;
			case "left":
				arrLayers[serial].left -= step;
			break;			
			default:
				UniteAdmin.showErrorMessage("wrong direction: "+dir);
				return(false);
			break;
		}
		
		updateHtmlLayersFromObject(serial);
		
		if(isLayerSelected(serial))
			updateLayerFormFields(serial);
		
	}
	
	
	/**
	 * if some layer is selected
	 */
	var onBodyKeypress = function(event){
		
		return(true);
		
		switch(event.keyCode){
			case 45:	//insert button: add layer
				//addLayer();
			break;
		}
		
		//the operations below only when some layer selected
		
		if(selectedLayerSerial == -1)
			return(true);
		
		var flagTriggered = true;		
		switch(event.keyCode){			
			case 40:	//right arrow
				moveLayer(selectedLayerSerial,"down",1);
			break;
			case 38:	//up arrow
				moveLayer(selectedLayerSerial,"up",1);
			break;
			case 39:	//right arrow
				moveLayer(selectedLayerSerial,"right",1);
			break;
			case 37:	//left arrow
				moveLayer(selectedLayerSerial,"left",1);
			break;		
			case 46:	//del button
				deleteCurrentLayer();
			break;
			default:
				flagTriggered = false;
			break;
		}
		
		if(flagTriggered == true){			
			event.preventDefault();
			return(false);
		}			
		
	}
	
	
}