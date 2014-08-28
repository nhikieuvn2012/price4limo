<?php
/*
Name: box party bus fleet
Author: Thanh
Version: 1.0
Description: bust fleet
Class: box_party_bus_fleet
*/

class box_party_bus_fleet extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box party bus fleetr', 'os-rev-thesis');
		$this->title = sprintf(__('box party bus fleet', 'os-rev-thesis'));
                
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
			wp_reset_query();
			global $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			//Large bus
			$wp_query = new WP_Query();

			$properties = array(
				'post_type' => 'bus',
				'posts_per_page' => 200,
				'meta_query' => array(),
			);
			$properties['meta_query'][] = array(
				'key' => 'bus_type',
				'value' => 'bus party',
				'compare' => 'LIKE'
			);
			$query = $wp_query->query($properties);
			
			$group_title='Bust Party';
			
			echo '<div class="boxFeelt">';
				echo '<h2>'.$group_title.'</h2>';
				foreach ($query as $perres){
				$postid = $perres->ID;
				$image_values = get_post_meta($postid, 'post_image', true);
				$title_value = get_post_meta($postid, 'post_name', true);
					echo '<div class="boxBus"><a href="http://myjobodesk.com/price4limo/bus-detail/'.$postid.'/">';
					echo wp_get_attachment_image($image_values, 'full');
					echo '</a><div class="busName"><a href="http://myjobodesk.com/price4limo/bus-detail/'.$postid.'/">'.$title_value.'</a></div>';
					echo '</div>';
				}
			echo '</div>';
			
			//limo
			$properties = array(
				'post_type' => 'bus',
				'paged' => 1,
				'meta_query' => array(),
			);
			$properties['meta_query'][] = array(
				'key' => 'bus_type',
				'value' => 'bus limo',
				'compare' => 'LIKE'
			);
			$query = $wp_query->query($properties);
			
			$group_title='Bust Limo';
			
			echo '<div class="boxFeelt">';
				echo '<h2>'.$group_title.'</h2>';
				foreach ($query as $perres){
				$postid = $perres->ID;
				$image_values = get_post_meta($postid, 'post_image', true);
				$title_value = get_post_meta($postid, 'post_name', true);
					echo '<div class="boxBus"><a href="http://myjobodesk.com/price4limo/bus-detail/'.$postid.'/">';
					echo wp_get_attachment_image($image_values, 'full');
					echo '</a><div class="busName"><a href="http://myjobodesk.com/price4limo/bus-detail/'.$postid.'/">'.$title_value.'</a></div>';
					echo '</div>';
				}
			echo '</div>';
	}
}