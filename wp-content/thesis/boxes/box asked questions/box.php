<?php
/*
Name:box asked questions
Author: Thanh
Version: 1.0
Description: bust fleet
Class:box_asked_questions
*/

class box_asked_questions extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box asked questions', 'os-rev-thesis');
		$this->title = sprintf(__('box asked questions', 'os-rev-thesis'));
                
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
			$wp_query = new WP_Query();
			$properties = array(
				'post_type' => 'frequently_aq',
				'meta_query' => array(),
			);
			
			echo '<h2>Questions & Answer:</h2>';

			$str='';
			$query = $wp_query->query($properties);
			foreach ($query as $perres){
			$postid = $perres->ID;
			$txt_asked = get_post_meta($postid, 'txt_asked', true);
			$txt_question = get_post_meta($postid, 'txt_questions', true);
				$str=$str.'[accordion title="'.$txt_question.'" class="new-class"]'.$txt_asked.'[/accordion]';
			}	
			
			echo do_shortcode('[accordions autoHeight="true"  disabled="false" active=0  clearStyle=false collapsible=false fillSpace=false ]'.$str.'[/accordions]');
	}
}