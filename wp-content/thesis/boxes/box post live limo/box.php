<?php
/*
Name: box post live limo
Author: Thanh
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: box_post_live_limo
*/

class box_post_live_limo extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box post live limo', 'os-rev-thesis');
		$this->title = sprintf(__('box post live limo', 'os-rev-thesis'));
                
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
	   echo '<h2>Live limo quoten in Under 30 seconds</h2>';
		echo do_shortcode('[contact-form-7 id="83" title="Live Limo Quotes in Under 30 Seconds"]');
	}
}