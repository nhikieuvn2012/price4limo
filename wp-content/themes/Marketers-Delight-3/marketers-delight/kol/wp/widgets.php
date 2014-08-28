<?php
// register widgets
$widgets = array('kol_popular_articles', 'kol_affiliate_listing', 'kol_quote_widget');
foreach ($widgets as $widget)
	register_widget($widget);

// affiliate listing
class kol_affiliate_listing extends WP_Widget {
	function kol_affiliate_listing() {
		$widget_ops = array('classname' => 'affiliate-box box-style', 'description' => __('Create a listing of your favorite affiliate products to promote on your site!', 'kol'));
		$control_ops = array('id_base' => 'affiliate-widget');
		$this->WP_Widget('affiliate-widget', __('Kol &raquo; Affiliate Marketing', 'kol'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$description = apply_filters('widget_text', $instance['description']);
		$spacing = $instance['spacing'];
		$link = $instance['link'];
		$image = $instance['image'];
		$circle = $instance['circle'];
		$button = $instance['button'];
		$button_color = $instance['button_color'];
		$button_icon = $instance['button_icon'];
		echo
			"\n$before_widget\n".
			(!empty($image) ? "\t<img class=\"affiliate-image" . (($circle == true) ? " circle\"" : "\"") . " src=\"$image\" alt=\"" . (!empty($title) ? $title : __('Featured product', 'kol')) . "\"" . (!empty($spacing) || ($spacing != 0) ? " style=\"margin-top: " . $spacing . "px\"" : '') . " />\n" : '').
			(!empty($title) ? "\t$before_title" . (!empty($link) ? "<a href=\"" . esc_url($link) . "\">" : '') . $title . (!empty($link) ? "</a>" : '') . "$after_title\n" : '').
			(!empty($description) ? "\t" . wpautop($description) : '').
			(!empty($button) ? "\t<p><a class=\"button block $button_color\" href=\"$link\">" . (!empty($button_icon) ? "<span class=\"icon\">$button_icon</span>&nbsp;&nbsp;" : '') . "$button</a></p>" : '').
			"$after_widget\n";
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sprintf('%s', strip_tags(stripslashes($new_instance['title'])));
		$instance['link'] = sprintf('%s', strip_tags(stripslashes(esc_url($new_instance['link']))));
		$instance['image'] = sprintf('%s', strip_tags(stripslashes($new_instance['image'])));
		$instance['circle'] = $new_instance['circle'];
		$instance['spacing'] = sprintf('%s', strip_tags(stripslashes($new_instance['spacing'])));
		$instance['description'] = sprintf('%s', wp_kses_data($new_instance['description']));
		$instance['button'] = sprintf('%s', strip_tags(stripslashes($new_instance['button'])));
		$instance['button_color'] = $new_instance['button_color'];
		$instance['button_icon'] = sprintf('%s', strip_tags(stripslashes($new_instance['button_icon'])));
		return $instance;
	}

	function form($instance) {
		$defaults = array('spacing' => '-40', 'button_icon' => 'H');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php printf('%s', esc_attr((string)$instance['title'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Your affiliate link:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php printf('%s', esc_attr((string)$instance['link'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php printf('%s', esc_attr((string)$instance['image'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['circle'], 'true' ); ?> id="<?php echo $this->get_field_id('circle'); ?>" name="<?php echo $this->get_field_name('circle'); ?>" value="true" /> 
			<label for="<?php echo $this->get_field_id('circle'); ?>"><?php _e('Convert image to circle', 'kol'); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('spacing'); ?>"><?php _e('Image spacing:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('spacing'); ?>" name="<?php echo $this->get_field_name('spacing'); ?>" value="<?php printf('%s', esc_attr((string)$instance['spacing'])); ?>" class="widefat" style="width: 15%" type="text" /> px
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'kol'); ?></label>
			<textarea id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" class="widefat" rows="5" cols="10"><?php printf('%s', esc_textarea($instance['description'])); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button text:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" value="<?php printf('%s', esc_attr((string)$instance['button'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_color'); ?>"><?php _e('Button color:', 'kol'); ?></label>
			<!-- todo: clean this sh*t up -->
			<select id="<?php echo $this->get_field_id('button_color'); ?>" name="<?php echo $this->get_field_name('button_color'); ?>">
				<option <?php if('red' == $instance['button_color']) echo "selected=\"selected\""; ?>><?php _e('red', 'kol') ?></option>
				<option <?php if('orange' == $instance['button_color']) echo "selected=\"selected\""; ?>><?php _e('orange', 'kol') ?></option>
				<option <?php if('green' == $instance['button_color']) echo "selected=\"selected\""; ?>><?php _e('green', 'kol') ?></option>
				<option <?php if('blue' == $instance['button_color']) echo "selected=\"selected\""; ?>><?php _e('blue', 'kol') ?></option>
				<option <?php if('gray' == $instance['button_color']) echo "selected=\"selected\""; ?>><?php _e('gray', 'kol') ?></option>
				<option <?php if('dark' == $instance['button_color']) echo "selected=\"selected\""; ?>><?php _e('dark', 'kol') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_icon'); ?>"><?php _e('Button icon (enter a letter) <a href="http://www.justbenicestudio.com/studio/websymbols/">[?]</a>:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('button_icon'); ?>" name="<?php echo $this->get_field_name('button_icon'); ?>" value="<?php printf('%s', esc_attr((string)$instance['button_icon'])); ?>" class="widefat" style="width: 15%" type="text" />
		</p>
	<?php
	}
}

// quotes
class kol_quote_widget extends WP_Widget {
	function kol_quote_widget() {
		$widget_ops = array('classname' => 'quotes', 'description' => __('Add a testimonial/quote to any designated widget area!', 'kol'));
		$control_ops = array('id_base' => 'quotes-widget');
		$this->WP_Widget('quotes-widget', __('Kol &raquo; Quotes Widget', 'kol'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$quote = apply_filters('widget_text', $instance['quote']);
		$source = $instance['source'];
		$image = $instance['image'];
		$image_align = $instance['image_align'];
		echo
			"\n$before_widget\n".
			"\t<div class=\"quote-box box-style\">\n".
			(!empty($title) ? "\t\t$before_title{$title}$after_title\n" : '').
			(!empty($image) ? "\t\t<img src=\"$image\" class=\"$image_align\" alt=\"" . (!empty($title) ? $title : __('Featured testimonial', 'kol')) . "\" />\n" : '').
			(!empty($quote) ? "\t\t" . wpautop($quote) : '').
			"\t</div>\n".
			(!empty($source) ? "\t<p class=\"quote-source\">$source</p>\n" : '').
			"$after_widget\n";
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sprintf('%s', strip_tags(stripslashes($new_instance['title'])));
		$instance['quote'] = sprintf('%s', wp_kses_data($new_instance['quote']));
		$instance['source'] = sprintf('%s', strip_tags(stripslashes($new_instance['source'])));
		$instance['image'] = sprintf('%s', strip_tags(stripslashes($new_instance['image'])));
		$instance['image_align'] = $new_instance['image_align'];
		return $instance;
	}

	function form($instance) {
		$defaults = array('quote' => __('&#34;Use this box to display quotes or testimonials from people who love your work!&#34;', 'kol'), 'name' => __('Alex Mangini', 'kol'), 'role' => __('Creator of MD3', 'kol'), 'image_align' => 'right');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php printf('%s', esc_textarea($instance['title'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('quote'); ?>"><?php _e('Quote:', 'kol'); ?></label>
			<textarea id="<?php echo $this->get_field_id('quote'); ?>" name="<?php echo $this->get_field_name('quote'); ?>" class="widefat" rows="4" cols="10"><?php printf('%s', esc_textarea($instance['quote'])); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('source'); ?>"><?php _e('Author/Source:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('source'); ?>" name="<?php echo $this->get_field_name('source'); ?>" value="<?php printf('%s', esc_textarea($instance['source'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php printf('%s', esc_attr((string)$instance['image'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_align'); ?>"><?php _e('Image alignment:', 'kol'); ?></label>
			<!-- todo: clean this sh*t up -->
			<select id="<?php echo $this->get_field_id('image_align'); ?>" name="<?php echo $this->get_field_name('image_align'); ?>">
				<option <?php if('right' == $instance['image_align']) echo "selected=\"selected\""; ?>><?php _e('right', 'kol') ?></option>
				<option <?php if('left' == $instance['image_align']) echo "selected=\"selected\""; ?>><?php _e('left', 'kol') ?></option>
			</select>
		</p>
	<?php
	}
}

// popular articles
class kol_popular_articles extends WP_Widget {
	function kol_popular_articles() {
		$widget_ops = array('classname' => 'popular-articles', 'description' => __('Display your most popular articles on your blog!', 'kol'));
		$control_ops = array('id_base' => 'popular-widget');
		$this->WP_Widget('popular-widget', __('Kol &raquo; Popular Articles', 'kol'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$popular_articles = new WP_Query(array('orderby' => 'comment_count', 'posts_per_page' => $instance['article_count']));
		echo
			"\n$before_widget\n".
			(!empty($title) ? "\t$before_title{$title}$after_title\n" : '').
			"\t<ul class=\"box-style\">\n";
		while ($popular_articles->have_posts()) : $popular_articles->the_post();
			echo
				"\t\t<li>\n".
				"\t\t\t<a href=\"" . get_permalink() . "\" title=\"" . esc_attr('Permalink to %s') . the_title_attribute('echo=0') . "\">" . the_title_attribute('echo=0') . (($instance['comments'] == true) ? " <span class=\"icon\">d</span><span class=\"comment-text\">" . get_comments_number('0', '1', '%') . "</span>" : '') . "</a>\n".
				"\t\t</li>\n";
		endwhile;
		echo
			"\t</ul>\n".
			"$after_widget\n";
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sprintf('%s', strip_tags(stripslashes(trim($new_instance['title']))));
		$instance['article_count'] = $new_instance['article_count'];
		$instance['comments'] = sprintf('%s', strip_tags(stripslashes(trim($new_instance['comments']))));
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => __('Popular Articles', 'kol'), 'article_count' => 5, 'comments' => true);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php printf('%s', esc_attr((string)$instance['title'])); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('article_count'); ?>"><?php _e('# of Articles:', 'kol'); ?></label>
			<input id="<?php echo $this->get_field_id('article_count'); ?>" name="<?php echo $this->get_field_name('article_count'); ?>" value="<?php echo $instance['article_count']; ?>" type="text" size="1" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked((bool)$instance['comments'], true); ?> id="<?php echo $this->get_field_id('comments'); ?>" name="<?php echo $this->get_field_name('comments'); ?>" /> 
			<label for="<?php echo $this->get_field_id('comments'); ?>"><?php _e('Show comments?', 'kol'); ?></label>
		</p>
	<?php
	}
}