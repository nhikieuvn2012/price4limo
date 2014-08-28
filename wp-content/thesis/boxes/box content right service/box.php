<?php
/*
Name:box content right service
Author: Thanh
Version: 1.0
Description: trang box buffalo limousine service
Class: box_content_right_service
*/

class box_content_right_service extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box content right service', 'os-rev-thesis');
		$this->title = sprintf(__('box content right service', 'os-rev-thesis'));
                
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

     
	$my_postid =268;//This is page id or post id
	$content_post = get_post($my_postid);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
       

      } 
}