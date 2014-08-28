
var UniteSettings = new function(){
	
	this.getSettingsObject = function(formID){		
		var obj = new Object();
		var form = document.getElementById(formID);
		var name,value,type,flagUpdate;
		
		//enabling all form items connected to mx
		for(var i=0; i<form.elements.length; i++){
			name = form.elements[i].name;		
			value = form.elements[i].value;
			type = form.elements[i].type;
			
			flagUpdate = true;
			switch(type){
				case "checkbox":
					value = form.elements[i].checked;
				break;
				case "radio":
					if(form.elements[i].checked == false) 
						flagUpdate = false;				
				break;
			}
			if(flagUpdate == true && name != undefined) obj[name] = value;
		}
		return(obj);
	}
	
	/**
	 * init the settings function, set the tootips on sidebars.
	 */
	var init = function(){
		
		jQuery(".list_settings li .setting_text").tipsy({
			gravity:"e",
	        delayIn: 70
		});
		
	}
	
	//call "constructor"
	jQuery(document).ready(function(){
		init();
	});
	
} // UniteSettings class end


