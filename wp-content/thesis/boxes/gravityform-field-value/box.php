<?php
/*
Name: Gravityform field value
Author: Thanh Ho
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: gravityform_field_value
*/

class gravityform_field_value extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('Gravityform field value', 'os-rev-thesis');
		$this->title = sprintf(__('Gravityform field value', 'os-rev-thesis'));
                
	}

	        
        protected function options() {
	    
		}
		
		
		
	public function html() {

    }
}