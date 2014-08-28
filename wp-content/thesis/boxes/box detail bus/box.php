<?php
/*
Name: box detail bus
Author: Thanh
Version: 1.0
Description: bust fleet
Class: box_detail_bus
*/

class box_detail_bus extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box detail bus', 'os-rev-thesis');
		$this->title = sprintf(__('box detail bus', 'os-rev-thesis'));
                
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
			//echo do_shortcode('[kb_slider slider1]');
			
			$postid =intval(get_query_var( 'bus_id_para' ));
			$slider= get_post_meta($postid, 'bus_slider', true);
			$title_value = get_post_meta($postid, 'post_name', true);
			echo '<h2>'.$title_value.'</h2>';
			echo do_shortcode($slider);	
	}
}