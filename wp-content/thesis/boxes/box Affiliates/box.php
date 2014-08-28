<?php
/*
Name:box Affiliates
Author: Thanh
Version: 1.0
Description: trang box buffalo limousine service
Class:box_Affiliates
*/

class box_Affiliates extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box Affiliates', 'os-rev-thesis');
		$this->title = sprintf(__('box Affiliates', 'os-rev-thesis'));
                
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
		echo '<h2>Limousine and Party Bus Affiliates</h2>';
		echo 'Would you like to see your Limousine or Party Bus marketed for FREE on the Price 4 Limo website??? If you want to join the fastest growing network of Limousine and Party Bus affiliates free of charge, fill the form below. We are looking for long term partnerships with reputable services and owner operators with experience. THIS IS FREE!';
		echo '<h2>New Member Application</h2>';
		echo 'Thank you for your interest in becoming an affiliate. Please provide your business and preferred contact information below. In most cases, we will respond within 24 hours. If you have any questions, please call us at 407-957-8978 or email us at info@price4limo.com';
	} 
}