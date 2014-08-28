<?php
/*
Name: Revolution Slider Box for Thesis 2.x by OrgSpring
Author: Craig Grella
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: orgspring_revolution_slider
*/

class orgspring_revolution_slider extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('Revolution Slider', 'os-rev-thesis');
		$this->title = sprintf(__('OrgSpring Revolution Slider Box', 'os-rev-thesis'));
                
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
		// Defaults 
		$slidershort = !empty($this->options['slidershort']) ? $this->options['slidershort'] : '';
               
		// Options
		$slider_short = $this->options['slidershort'];
		               
        // HTML
        ?>
        	<div id="revolution-slider-container">
                <div class="revolution-slider">
                	<?php 

	                	echo do_shortcode('[layerslider id="1"]');

	                			
	                ?>
                </div>
            </div>
        
        <?php
    }
}