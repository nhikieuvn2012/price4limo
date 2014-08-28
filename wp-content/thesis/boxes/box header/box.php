<?php
/*
Name: box header
Author: Thanh
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: box_header
*/

class box_header extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box header', 'os-rev-thesis');
		$this->title = sprintf(__('box header', 'os-rev-thesis'));
                
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
	   	echo '<a href="http://myjobodesk.com/price4limo/"><div class="logos"><div class="logo-info"></div></div></a>';
        echo '<div style="width:100%;height:50px;"><p align="center" style="font-size:2px">WE ARE A NATIONAL LIMOUSINE BOOKING SERVICE IN ALL 50 STATES. RENT A LIMO OR PARTY BUS ANYWHERE IN THE U.S.A.A marketplace where independently owned limousine companies compete for your business.</p></div>';
	}
}