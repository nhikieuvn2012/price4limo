<?php
/*
Name:box review
Author: Thanh
Version: 1.0
Description: trang box buffalo limousine service
Class: box_review
*/

class box_review extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box review', 'os-rev-thesis');
		$this->title = sprintf(__('box review', 'os-rev-thesis'));
                
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
		echo '<hr style="border:solid 2px red;"/><h2>Price4Limo Review</h2>';
		echo '<p>Our Price 4 Limo review provides all of our visitors examples of what our customers are saying about their Limo and Party Bus rental. With vehicle rentals throughout the country Price 4 Limo strives at being one of the best transportation companies in the United States. With an instant quote we make it easy for our customers to reserve a vehicle without any of the hassle. Find what you are looking for whether it is for a wedding, sweet sixteen celebration, night on the town, or a corporate event we have you covered.</p>';
		echo '<p>The Price4Limo review section provides information by customers who have reserved a luxury vehicle first hand. From a party bus rental in Miami to a Los Angeles Limo service, Price 4 Limo provides you with the transportation service you need to get around your city.</p>';

		echo '<h2>Price For Limo Review</h2>';
		echo '<p>As a transportation company we want to continue to improve our nationwide travel service so let us know how your vehicle rental went with a Price for Limo Review. How was your experience traveling in a party bus or limousine rental? Was the driver professional? Was customer service able to answer all of your questions and provide helpful information about our vehicles? Did you have any problems going through the order process on our website in making a reservation? Let us know. It is our goal to provide our customers with the best Limo service and party bus rental in the country. With the help of our customers we can continue to improve our online presence and provide the best vehicles for your special event. Fill out the form below with your name, email, and review to let us know how your outing in one of the vehicle rentals went.</p>';
		
		
        require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CFDBFormIterator.php');
        $exp = new CFDBFormIterator();
        $exp->export($atts['review'], $atts);
        
        
        echo '<center><table width="70%"><tr><td>';
		echo do_shortcode('[contact-form-7 id="401" title="review"]');
		echo '<hr style="border:solid 2px red"/>';
        while ($row = $exp->nextRow()) {
            extract($row);
			if ($row['txtName'] != null) {
			echo '<div>';
            echo '<img src="http://myjobodesk.com/price4limo/wp-content/uploads/start.jpg"/><br/><b>' . $row['txtName'] . '</b>';
            echo '<p align="left">'.$row['txtaMess'].'</br>';
            echo '<i><font size="1">Email:'.$row['txtEmail'] . '</font></p></i>';
            echo '</div>';
			echo '<hr/>';
			}
        }
        echo '</td></tr></table></center>';
        
	} 
}