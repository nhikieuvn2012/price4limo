<?php

class smt_credits extends thesis_box {
    
	protected function translate() {
        global $thesis;    
        $this->title = __('Copyright Credits', 'smt');
		
	}

	protected function construct() {
	
	
		
	}
        
	protected function options() {
	global $thesis;
	
		return array(
		
			'start_date' => array(
				'type' => 'text',
				'width' => 'short',
				'label' => __('Founded Year (if before this year)', 'smt'),
				'tooltip' => __('Enter the founding &copy; date', 'smt'),
				'default' => 'Start Year?'),
		
			'thesis_link' => array(
				'type' => 'text',
				'width' => 'long',
				'label' => __('Thesis Affiliate Link', 'smt'),
				'tooltip' => __('Enter your Thesis Affiliate Link', 'smt'),
				'default' => 'http://mythesislink.com'),
			
			'studio_name' => array(
				'type' => 'text',
				'width' => 'long',
				'label' => __('Studio Name', 'smt'),
				'tooltip' => __('Enter the your name or the studio name you want to credit as designing this website', 'smt'),
				'default' => ''),
					);
								
	}


	public function html() {
	
		
	$studio_name = $this->options['studio_name'];
	$start_date = $this->options['start_date'];
	$thesis_link = $this->options['thesis_link'];
	$company_name = get_bloginfo('name');
	$site_description = get_bloginfo('description');
	$my_theme = wp_get_theme();
	
	
	echo "<div id=\"credits\" class=\"row small\">\n";
		
		echo "\t<div class=\"six columns\">\n";
		echo 	($start_date ? "\t\t<p><strong>&copy; " . $start_date . " - " : "<p><strong>&copy; ");
		echo 	"" . date("Y") . " | " . $company_name . "</strong><br />" . $site_description . "</p>\n";
		echo "\t</div>\n\n";
		
		echo "\t<div class=\"six columns text-right\">\n";
		echo 	($thesis_link ?
								"\t\t<p>Built with the <a href=\"" . $thesis_link . "\">Thesis " . $my_theme->Version . " Framework</a> for Wordpress<br />"
								:
								"\t\t<p>Built with the <a href=\"http://richerimage.co.uk/thesislink\">Thesis " . $my_theme->Version . " Framework</a> for Wordpress<br />"
				);
		
		echo	($studio_name ?
								"Design by " . $studio_name . " "
								:
								"Design by <a href=\"http://richerimage.co.uk\"><span class=\"orange\">richer</span><span class=\"black\">image.co.uk</span></a> "
				);		
		echo "using the <a href=\"http://nude960.skinmythesis.com\">n960r Responsive Skin</a></p>\n";
		echo "\t</div>\n";
		
	echo "</div>\n";
	
	          
	} // END > public function html()
	

} // End Thesis Box CREDITS



class smt_social_buttons_lite extends thesis_box {
    
    protected function translate() {
        global $thesis;    
        $this->name = __('Social Media Lite', 'smt');
        $this->title = sprintf(__('Social Media Lite', 'smt'));
    }


    


    protected function construct() {
		
		add_action('thesis_hook_body_bottom', array($this, 'sbl_scripts'));  
		
    }
        
    protected function options() {
    global $thesis;
        return array(
        
            'twitter_user_name' => array(
                'type' => 'text',
                'width' => 'medium',
                'label' => __('Twitter User Name', 'smt'),
                'tooltip' => __('Enter your twitter user name ** do not inlude the &lsquo;@&rsquo; symbol', 'smt'),
                'default' => 'Your Twitter Name'));
    }
	
	function sbl_scripts() {
			?>
			<?php
			}
    
    
    public function html() {
	 global $post;
    $twitter_user_name = $this->options['twitter_user_name'];
    $tit = get_the_title();
	
    echo '
            <div class="sbl-share-buttons">
                <ul>
                    <li class="sbl-facebook-share"><div id="fb-root"></div><fb:like href="'. get_permalink($attachment->ID) .'" send="false" layout="button_count" width="90" height="21" show_faces="false" action="like" font=""></fb:like></li>
                    <li class="sbl-twitter-share"><a href="http://twitter.com/share" class="twitter-share-button" data-url="'. get_permalink($attachment->ID) .'" data-text="' . $tit . '" data-count="horizontal" data-via="' . $twitter_user_name . '">Tweet</a></li>
					<li class="sbl-linkedin-share"><script type="in/share" data-url="'. get_permalink($attachment->ID) .'" data-counter="right"></script></li>
                </ul>
            </div>
    ';
    }
    
    
    
} 	// End Thesis Box SOCIAL MEDIA BUTTONS LITE




class smt_read_more_button extends thesis_box {
	
	public function translate() {
		
		$this->title = __('Read More Button', 'smt');
	    //$this->name = $this->title;
	}
	
	public function construct() {
		// You could do things like add_action, add_fileter, etc here.
		// add_action('init', array($this, 'your_custom_method');
	}
	
	
	public function options() {
		return array(
			'button_text' => array(
				'type' => 'text',
				'width' => 'medium',
				'label' => __('Button Text', 'smt'),
				'tooltip' => __('Enter button text in here', 'smt'),
				'default' => 'Read on...')
			
		);
	}

	// this is where all the output happens!
	public function html() {
	
	$button_text = $this->options['button_text'];
	$tit = get_the_title();
	
	echo "<p class=\"readon\"><a class=\"button\" href=\"". get_permalink($attachment->ID) ."\" title=\"". $tit ."\">";
	echo ($button_text ? "".$button_text."</a></p>" : "Read on...</a></p>");
	 }

}	// End n960r_read_more_button


