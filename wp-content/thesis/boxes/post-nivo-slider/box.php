<?php

/*
Name: Category Posts Nivo Slider
Author: NXthemes.com
Version: 1.0
Description: Posts Nivo Slider with category support and helpful options.
Class: thesis_posts_nivo
*/


class thesis_posts_nivo extends thesis_box {
	
	protected function translate() {
		$this->title = __('Posts Nivo Slider', 'thesis');
	}
	
	protected function construct() {
		wp_enqueue_style('posts-nivo-style', THESIS_USER_BOXES_URL . "/post-nivo-slider/css/post-nivo-slider.css");
		wp_enqueue_script('posts-nivo-script', THESIS_USER_BOXES_URL . "/post-nivo-slider/js/jquery.nivo.slider.js", array('jquery'), '3.1', TRUE);
	}
	
	protected function options() {
		global $thesis;
		return array(
			'amount' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Amount of Posts ', 'thesis'),
				'tooltip' => sprintf(__('Enter the amount of posts you would like to show', 'thesis')),
				'default' => '5'
				),
			'categories' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Categories To Display', 'thesis'),
				'tooltip' => sprintf(__('Enter the category IDs you want to display in your nivo slider (leave blank for all posts). If using multiple categories, seperate them with a comma. Example: "1, 2, 3"', 'thesis')),
				'default' => ''
				),
			'width' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Width', 'thesis'),
				'tooltip' => sprintf(__('Enter the width (in pixels)', 'thesis')),
				'default' => '950'
				),
			'height' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Height', 'thesis'),
				'tooltip' => sprintf(__('Enter the height (in pixels)', 'thesis')),
				'default' => '250'
				),
			'length' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Length of description', 'thesis'),
				'tooltip' => sprintf(__('Enter the length of description you would like to show', 'thesis')),
				'default' => '200'
				),	
			'background_nav' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Background color of a navigation', 'thesis'),
				'tooltip' => sprintf(__('Enter the background color', 'thesis')),
				'default' => '#F39A57'
				),	
			'background_redmore' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Background color of a "READ MORE" button', 'thesis'),
				'tooltip' => sprintf(__('Enter the background color', 'thesis')),
				'default' => '#F39A57'
				),
			'color_redmore' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Text color in "READ MORE" button', 'thesis'),
				'tooltip' => sprintf(__('Enter the text color', 'thesis')),
				'default' => '#FFFFFF'
				),
			'color_redmore_hover' => array(
				'type' => 'text',
				'width' => 'small',
				'label' => __('Text hover color in "READ MORE" button', 'thesis'),
				'tooltip' => sprintf(__('Enter the background color', 'thesis')),
				'default' => '#FFFFFF'
				),					
			'animation' => array(
				'type' => 'select',
				'label' => __('Slide Animation', 'thesis'),
				'tooltip' => sprintf(__('Set the animation', 'thesis')),
				'options' => array(
					'random' => 'random',
					'sliceDownRight' => 'sliceDownRight',
					'sliceDownLeft' => 'sliceDownLeft',
					'sliceUpRight' => 'sliceUpRight',
					'sliceUpLeft' => 'sliceUpLeft',
					'sliceUpDown' => 'sliceUpDown',
					'sliceUpDownLeft' => 'sliceUpDownLeft',
					'fold' => 'fold',
					'fade' => 'fade',
					'boxRandom' => 'boxRandom',
					'boxRain' => 'boxRain',
					'boxRainReverse' => 'boxRainReverse',
					'boxRainGrow' => 'boxRainGrow',
					'boxRainGrowReverse' => 'boxRainGrowReverse'
					),
				'default' => 'random')
			);
	}

	public function html() {
		global $thesis, $post;
		// Options
		$options = $thesis->api->get_options($this->_get_options(), $this->options);
		
		// Defaults 
		$amount = !empty($this->options['amount']) ? $this->options['amount'] : '5';
		$length = !empty($this->options['length']) ? $this->options['length'] : '200';
		$width = !empty($this->options['width']) ? $this->options['width'] : '950';
		$height = !empty($this->options['height']) ? $this->options['height'] : '250';
		$categories = !empty($this->options['categories']) ? $this->options['categories'] : '';
		?>
		
		<div class="slider-wrapper">
				<div id="slider" class="nivoSlider">
						<?php 
						$i=1;
						query_posts(array('posts_per_page' => $amount, 'post_type' => 'post', 'cat' => $categories)); 
						if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php if (has_post_thumbnail( $post->ID )) the_post_thumbnail( 'thumbnail', array( 'title' => "#htmlcaption".$i ) ) ?>
						<?php $i++; endwhile; else: endif; wp_reset_query(); ?>
				</div>
			<?php 
			    $j=1;
				query_posts(array('posts_per_page' => $amount, 'post_type' => 'post', 'cat' => $categories)); 
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div id="htmlcaption<?php echo $j ?>" class="nivo-html-caption">
					<div class="slider_title" >
						<?php the_title('<h2>', '</h2>'); ?>
					</div>
					<p>
					<?php
					        $j++;
							echo substr(get_the_excerpt(), 0, $length).'...' ;
							?>
				    </p>
					<section class="readmore but-wrap"><a href="<?php echo get_permalink(); ?>" class="button1">
					<span>Read more</span>
					</a>
					</section> 
				</div>
			<?php endwhile; else: endif; wp_reset_query(); ?>
        </div>
			<script type="text/javascript">	
			var j = jQuery.noConflict();

			j(document).ready(function() {
			    j('.slider-wrapper').css({'width' : <?php echo $width; ?>,'height' : <?php echo $height; ?>});
				j('.attachment-thumbnail').height(<?php echo $height; ?>);
				  j('#slider').nivoSlider({
					effect: '<?php echo $options['animation']; ?>',
					slices: 15,
					boxCols: 8,
					boxRows: 4,
					animSpeed: 500,
					pauseTime: 3000,
					startSlide: 0,
					directionNav: true,
					controlNav: true,
					controlNavThumbs: false,
					pauseOnHover: true,
					manualAdvance: false,
					prevText: 'Prev',
					nextText: 'Next',
					randomStart: false
					});
				j('.nivo-main-image').height(<?php echo $height; ?>);
			    j('.nivo-directionNav a').css({'background-color' : '<?php echo $options['background_nav']; ?>'});
				j('.but-wrap').css({'background-color' : '<?php echo $options['background_redmore']; ?>'});
				jQuery(".but-wrap").hover(function () {
					jQuery('.but-wrap a.button1').css({'color' : '<?php echo $options['color_redmore_hover']; ?>'});
				},function () {
				var cssObj = {
				  'color' : '<?php echo $options['color_redmore']; ?>'
				}
				jQuery('.but-wrap a.button1').css(cssObj);
			  });
			});
		</script>
        <?php
	}
}