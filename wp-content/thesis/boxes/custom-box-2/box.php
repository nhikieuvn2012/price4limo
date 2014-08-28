<?php
/*
Name: Custom Box 2
Author: Thanhs
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: custom_box_2
*/

class custom_box_2 extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('Custom Box 2', 'os-rev-thesis');
		$this->title = sprintf(__('Custom Box 2', 'os-rev-thesis'));
                
	}

	        
        protected function options() {
	    
		    return array(
				'slidershort' => array(
					'type' => 'text',
					'width' => 'medium',
					'label' => __('Slider Shortcode', 'os-rev-thesis'),
					'tooltip' => sprintf(__('Enter the Slider Shortcode of the Slider you wish to use. Note - The Slider Shortcode can be found in the Revolution Slider Options for the slide plan to use.', 'os-rev-thesis')),
					'default' => ''
					)
			);
		}
		
		
		
	public function html() {


	}
}