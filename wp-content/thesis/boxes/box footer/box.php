<?php
/*
Name:box footer
Author: Thanh
Version: 1.0
Description: trang box buffalo limousine service
Class: box_footer
*/

class box_footer extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box footer', 'os-rev-thesis');
		$this->title = sprintf(__('box footer', 'os-rev-thesis'));
                
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
		echo '<div class="box-footer">';
		echo '</div>';
				echo '<div style="width:100%;text-align:center;">';
		echo '<a href="http://myjobodesk.com/price4limo/affiliate/">Affiliates</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/limousine-and-party-bus-affiliates/">Partners</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/contact/">Contact</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/the-kentucky-derby-the-greatest-two-minutes-in-sports/">Limo Blog</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/limo-fleet/">Limo Fleet</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/about/">About Us</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/privacy-policy/">Privacy Policy</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/frequently-fasked-questions/">Frequently asked Questions</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/limos-for-sale/">Limos For Sale</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/party-bus-for-sale/">Party Bus For Sale</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/price4limo-review/">Price 4 Limo Review</a> - ';
		echo '<a href="http://myjobodesk.com/price4limo/terms-of-service-terms-of-use-archive/>Terms of Service & Terms of Use Archives</a><br/>';
		echo '© 2013 Price 4 Limo';
		echo '</div>';
	} 
}