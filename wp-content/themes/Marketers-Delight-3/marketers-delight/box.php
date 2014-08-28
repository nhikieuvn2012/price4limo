<?php

/*---:[ author box ]:---*/

class kol_author_box extends thesis_box {
	public $templates = array('single', 'page');

	public function translate() {
		$this->title = __('Author Box (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'author-box clear';
		unset($options['id']);
		return array_merge($options, array(
			'display_options' => array(
				'type' => 'checkbox',
				'label' => __('Display Options', 'kol'),
				'tooltip' => __('Enable/disable what appears in your author box here.', 'kol'),
				'options' => array('bio' => __('Show author bio', 'kol'), 'twitter' => __('Show Twitter link', 'kol'), 'url' => __('Show website link', 'kol')),
				'default' => array('bio' => true),
				'dependents' => array('twitter' => true, 'url' => true)),
			'gravatar_size' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Gravatar Size', 'kol'),
				'default' => 100),
			'twitter_text' => array(
				'type' => 'text',
				'width' => 'medium',
				'label' => __('Twitter Text', 'kol'),
				'placeholder' => __('Follow me on Twitter', 'kol'),
				'parent' => array('display_options' => 'twitter')),
			'url_text' => array(
				'type' => 'text',
				'width' => 'medium',
				'label' => __('URL Text', 'kol'),
				'placeholder' => __('Visit my website &rarr;', 'kol'),
				'parent' => array('display_options' => 'url'))));
	}
				
	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab<div class=\"" . (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : "author-box clear") . "\">\n".
			"$tab\t<div class=\"author-avatar\">\n".
			"$tab\t\t" . get_avatar(get_the_author_meta('user_email'), !empty($this->options['gravatar_size']) && is_numeric($this->options['gravatar_size']) ? $this->options['gravatar_size'] : 100) . "\n".
			"$tab\t</div>\n".
			"$tab\t<div class=\"author-text\">\n".
			"$tab\t\t<p class=\"author-name\"><em>by</em> <a href=\"" . get_the_author_meta('user_url') . "\">" . get_the_author_meta('display_name') . "</a></p>\n".
			"$tab\t\t<p>" .  get_the_author_meta('description') . "</p>\n".
			(($this->options['display_options']['twitter'] == true) ? "$tab\t\t<p class=\"twitter-icon\"><span class=\"icon\">t</span> <a href=\"" . get_the_author_meta('kol_twitter') . "\">" . (!empty($this->options['twitter_text']) ? $this->options['twitter_text'] : __('Follow me on Twitter', 'kol')) . "</a></p>\n"  : false).
			(($this->options['display_options']['url'] == true) ? "$tab\t\t<p class=\"web-icon\"><span class=\"icon\">K</span><a href=\"" . get_the_author_meta('user_url') . "\">" . (!empty($this->options['url_text']) ? $this->options['url_text'] : __('Visit my website &rarr;', 'kol')) . "</a></p>\n"  : false).
			"$tab\t</div>\n".
			"$tab</div>\n";
	}
}


/*---:[ logo ]:---*/

class kol_logo_box extends thesis_image_uploader_box {
	public function translate() {
		$this->title = __('Logo Box (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'logo';
		unset($options['id']);
		return array_merge($options, array(
			'width' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Image width', 'kol')),
			'height' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Image height', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$url = stripslashes($this->options['image']['url']);
		$html = apply_filters("{$this->_class}_html", $wp_query->is_home || is_front_page() ? 'h1' : 'p'); #wp
		$width = (!empty($this->options['width']) && is_numeric($this->options['width']) ? $this->options['width'] : false);
		$height = (!empty($this->options['height']) && is_numeric($this->options['height']) ? $this->options['height'] : false);
		$tab = str_repeat("\t", $depth = !empty($depth) ? $depth : 0);
		echo
			"$tab\t<$html class=\"" . (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) . '' : 'logo') . "\"><a href=\"" . esc_url(home_url()) . "\"><img src=\"" . esc_url($url) . "\" alt=\"" . get_the_title() . "\"" . ($width ? " width=\"$width\"" : '') . ($height ? " height=\"$height\"" : '') . " /></a></$html>\n";
	}
}


/*---:[ attribution ]:---*/

class kol_attribution extends thesis_box {
	public function translate() {
		$this->title = __('Kolakube Attribution', 'kol');
	}

	public function options() {
		return array(
			'link' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Affiliate Link URL', 'kol'),
				'tooltip' => __('If you\'re apart of the <a href="http://kolakube.com/affiliates/">Kolakube affiliate program</a>, you can paste your affiliate link here and start earning money promoting your Kolakube skin!', 'kol')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", $depth = !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t\t<a href=\"" . (!empty($this->options['link']) ? esc_url(stripslashes($this->options['link'])) : 'http://kolakube.com/skins/marketers-delight/' . KOL_SKIN_PATH) . "\" class=\"kol-attribution\">Design by <span>Marketers Delight</span></a>\n";
	}
}


/*---:[ button ]:---*/

class kol_button extends thesis_box {
	public function translate() {
		$this->title = __('Button', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'button';
		return array_merge($options, array(
			'color' => array(
				'type' => 'select',
				'label' => __('Color', 'kol'),
				'options' => array('red' => 'Red', 'orange' => 'Orange', 'blue' => 'Blue', 'green' => 'Green', 'dark' => 'Dark', 'gray' => 'Gray'),
				'tooltip' => __('Select your preferred button color.', 'kol')),
			'text' => array(
				'type' => 'text',
				'label' => __('Text', 'kol'),
				'width' => 'medium',
				'tooltip' => __('What should the button say?', 'kol')),
			'link' => array(
				'type' => 'text',
				'label' => __('Link', 'kol'),
				'width' => 'full',
				'tooltip' => __('Enter the URL (including <code>http://</code> the user should be brought to when they click this button.', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$html = (!empty($this->options['link']) ? "a" : "span");
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			(!empty($this->options['text']) ? "$tab\t\t<p><$html" . (!empty($this->options['link']) ? " href=\"" . $this->options['link'] . "\"" : '') . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . " class=\"" . (!empty($this->options['color']) ? $this->options['color'] : 'red') . " " . (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'button') . '">' . stripslashes($this->options['text']) . "</$html></p>\n" : '');
	}
}


/*---:[ icon ]:---*/

class kol_icon extends thesis_box {
	public function translate() {
		$this->title = __('Icon', 'kol');
	}

	public function options() {
		return array(
			'icon' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Icon', 'kol'),
				'tooltip' => __('Enter the letter/symbol to represent your icon here.<br /><br /><strong>Note:</strong> Use <a href="http://kola.cc/webicons" target="_blank">this list</a> to pick icons and their representing letter/symbol.', 'kol')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo (!empty($this->options['icon']) ? "$tab\t\t\t<span class=\"icon\">" . stripslashes($this->options['icon']) . "</span>\n" : '');
	}
}


/*---:[ headline + desc ]:---*/

class kol_headline_desc extends thesis_box {
	public function translate() {
		$this->title = __('Headline + Description', 'kol');
	}

	public function construct() {
		global $thesis;
		$filters = !empty($this->options['filter']['on']) ? array('wptexturize' => false, 'convert_smilies' => false, 'convert_chars' => false, 'do_shortcode' => false) : array('wptexturize' => false, 'convert_smilies' => false, 'convert_chars' => false, 'wpautop' => false, 'shortcode_unautop' => false, 'do_shortcode' => false);
		$thesis->wp->filter($this->_id, $filters);
	}

	public function options() {
		global $thesis;
		return array(
			'headline_html' => array(
				'type' => 'select',
				'label' => __('Headline HTML', 'kol'),
				'options' => array('h1' => 'h1', 'h2' => 'h2', 'h3' => 'h3'),
				'default' => 'h3',
				'tooltip' => __('For most cases, you\'ll want to leave the headline HTML tag at &lt;h3&gt; for crucial SEO reasons. However, if this Page Lead is included on a page without posts or another main headline beneath it, consider using &lt;h2&gt; or &lt;h1&gt;.', 'kol')),
			'headline' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Headline', 'kol'),
				'tooltip' => __('Enter your main headline here', 'kol')),
			'description' => array(
				'type' => 'textarea',
				'rows' => 3,
				'label' => __('Description', 'kol'),
				'tooltip' => __('Add subtext to appear underneath your headline', 'kol')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		$html = !empty($this->options['headline_html']) ? $this->options['headline_html'] : 'h3';
		echo
			(!empty($this->options['headline']) || !empty($this->options['description']) ?
				"$tab\t<div class=\"text-area\">\n".
				(!empty($this->options['headline']) ? "$tab\t\t<{$html}>" . stripslashes($this->options['headline']) . "</{$html}>\n" : '').
				(!empty($this->options['description']) ? "$tab\t\t" . trim(apply_filters($this->_id, stripslashes($this->options['description']))) . "\n" : '').
				"$tab\t</div>\n": '');
	}
}

/*---:[ column headline + desc ]:---*/

class kol_col_headline_desc extends thesis_box {
	public function translate() {
		$this->title = __('Headline + Description', 'kol');
	}

	public function construct() {
		global $thesis;
		$filters = !empty($this->options['filter']['on']) ? array('wptexturize' => false, 'convert_smilies' => false, 'convert_chars' => false, 'do_shortcode' => false) : array('wptexturize' => false, 'convert_smilies' => false, 'convert_chars' => false, 'wpautop' => false, 'shortcode_unautop' => false, 'do_shortcode' => false);
		$thesis->wp->filter($this->_id, $filters);
	}

	public function options() {
		global $thesis;
		return array(
			'headline' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Headline', 'kol'),
				'tooltip' => __('Enter your main headline here', 'kol')),
			'description' => array(
				'type' => 'textarea',
				'rows' => 3,
				'label' => __('Description', 'kol'),
				'tooltip' => __('Add subtext to appear underneath your headline', 'kol')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		$html = !empty($this->options['headline_html']) ? $this->options['headline_html'] : 'h3';
		echo
			(!empty($this->options['headline']) || !empty($this->options['description']) ?
				"$tab\t<div class=\"text-area\">\n".
				(!empty($this->options['headline']) ? "$tab\t\t<h4>" . stripslashes($this->options['headline']) . "</h4>\n" : '').
				(!empty($this->options['description']) ? "$tab\t\t" . trim(apply_filters($this->_id, stripslashes($this->options['description']))) . "\n" : '').
				"$tab\t</div>\n": '');
	}
}


/*---:[ 2 column parent ]:---*/

class kol_two_cols extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_column_one', 'kol_column_two');
	public $children = array('kol_column_one', 'kol_column_two');

	public function translate() { $this->title = __('2 Columns', 'kol'); }

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		return array_merge($options, array(
			'style' => array(
				'type' => 'checkbox',
				'label' => __('Box Style', 'kol'),
				'tooltip' => __('If you want to add a background, border and shadow around the columns, check this option.', 'kol'),
				'options' => array('box-style' => __('Enable Box Effect', 'kol')))));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		$html = !empty($this->options['headline_html']) ? $this->options['headline_html'] : 'h2';
		echo
			"$tab\t<div class=\"" . (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'two-columns') . (!empty($this->options['style']) ? ' box-cols' : ' box-text') . " clear\">\n";
		$this->rotator($depth + 1);
		echo "$tab\t</div>\n";
	}
}


/*---:[ 3 column parent ]:---*/

class kol_three_cols extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_column_one', 'kol_column_two', 'kol_column_three');
	public $children = array('kol_column_one', 'kol_column_two', 'kol_column_three');

	public function translate() { $this->title = __('3 Columns', 'kol'); }

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		return array_merge($options, array(
			'style' => array(
				'type' => 'checkbox',
				'label' => __('Box Style', 'kol'),
				'tooltip' => __('If you want to add a background, border and shadow around the columns, check this option.', 'kol'),
				'options' => array('box-style' => __('Enable Box Effect', 'kol')))));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		$html = !empty($this->options['headline_html']) ? $this->options['headline_html'] : 'h2';
		echo
			"$tab\t<div class=\"" . (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'three-columns') . (!empty($this->options['style']) ? ' box-cols' : ' box-text') . " clear\">\n";
		$this->rotator($depth + 1);
		echo "$tab\t</div>\n";
	}
}


/*---:[ column 1 ]:---*/

class kol_column_one extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_icon', 'kol_col_headline_desc', 'kol_button');
	public $children = array('kol_icon', 'kol_col_headline_desc', 'kol_button');

	public function translate() {
		$this->title = __('Column 1', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'col col1 first';
		return array_merge($options, array(
			'link' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Link', 'kol'),
				'tooltip' => __('If you want this entire column to link somewhere, enter the desired URL in the below field.<br /><br /><strong>IMPORTANT: If you have ANY other links in this column (like a button link), you need to remove them. Otherwise, the layout will break. Sorry, not proud of this one. :/</strong>', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$html = (!empty($this->options['link']) ? "a" : "div");
		$link = (!empty($this->options['link']) ? " href=\"" . $this->options['link'] . "\"" : '');
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<$html{$link}" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'col col1 first') . "\">\n";
		$this->rotator($depth + 1);
		echo "$tab\t\t</$html>\n";
	}
}


/*---:[ column 2 ]:---*/

class kol_column_two extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_icon', 'kol_col_headline_desc', 'kol_button');
	public $children = array('kol_icon', 'kol_col_headline_desc', 'kol_button');

	public function translate() {
		$this->title = __('Column 2', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'col col2';
		return array_merge($options, array(
			'link' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Link', 'kol'),
				'tooltip' => __('If you want this entire column to link somewhere, enter the desired URL in the below field.<br /><br /><strong>IMPORTANT: If you have ANY other links in this column (like a button link), you need to remove them. Otherwise, the layout will break. Sorry, not proud of this one. :/</strong>', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$html = (!empty($this->options['link']) ? "a" : "div");
		$link = (!empty($this->options['link']) ? " href=\"" . $this->options['link'] . "\"" : '');
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<$html{$link}" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'col col2') . "\">\n";
		$this->rotator($depth + 1);
		echo "$tab\t\t</$html>\n";
	}
}


/*---:[ column 3 ]:---*/

class kol_column_three extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_icon', 'kol_col_headline_desc', 'kol_button');
	public $children = array('kol_icon', 'kol_col_headline_desc', 'kol_button');

	public function translate() {
		$this->title = __('Column 3', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'col col3';
		return array_merge($options, array(
			'link' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Link', 'kol'),
				'tooltip' => __('If you want this entire column to link somewhere, enter the desired URL in the below field.<br /><br /><strong>IMPORTANT: If you have ANY other links in this column (like a button link), you need to remove them. Otherwise, the layout will break. Sorry, not proud of this one. :/</strong>', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$html = (!empty($this->options['link']) ? "a" : "div");
		$link = (!empty($this->options['link']) ? " href=\"" . $this->options['link'] . "\"" : '');
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<$html{$link}" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'col col3') . "\">\n";
		$this->rotator($depth + 1);
		echo "$tab\t\t</$html>\n";
	}
}


/*---:[ product lead ]:---*/

class kol_product_lead_box extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_product_lead_email', 'kol_product_lead_image', 'kol_product_lead_video');

	public function translate() {
		$this->title = $this->name = __('Product Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'product-lead';
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'product-lead') . "\">\n".
			"\t<div class=\"page\">\n",
			$this->rotator($depth + 1),
			"\t</div>\n".
			"</div>\n";
	}
}

/*---:[ email lead ]:---*/

class kol_product_lead_email extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_email_box');
	public $children = array('kol_headline_desc', 'kol_email_box');

	public function translate() {
		$this->title = __('Email Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options['class']['default'] = 'email-lead';
		$options = $thesis->api->html_options();
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'email-lead') . "\">\n",
			$this->rotator($depth + 1),
			"$tab\t\t</div>\n";
	}
}

// email box

class kol_email_box extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_icon', 'kol_col_headline_desc', 'kol_email_code');
	public $children = array('kol_icon', 'kol_col_headline_desc', 'kol_email_code');

	public function translate() {
		$this->title = __('Email Form (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'email-form';
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'email-form') . "\">\n",
			$this->rotator($depth + 1),	
			"$tab\t\t\t</div>\n";
	}
}

// email code

class kol_email_code extends thesis_box {
	public function translate() {
		$this->title = __('Email Code (MD3)', 'kol');
	}

	public function options() {
		return array(
			'code' => array(
				'type' => 'textarea',
				'rows' => 8,
				'code' => true,
				'label' => __('Email Signup Code', 'kol'),
				'tooltip' => __('Paste the signup form code you got from your email service provider (AWeber, MailChimp, GetResponse, etc.) here.', 'kol')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			(!empty($this->options['code']) ? "$tab\t\t\t<div class=\"email-code\">\n".
			"$tab\t\t\t\t" . stripslashes($this->options['code']) . "\n".
			"$tab\t\t\t</div>\n" : '');
	}
}


/*---:[ image lead ]:---*/

class kol_product_lead_image extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_image_box');
	public $children = array('kol_headline_desc', 'kol_image_box');

	public function translate() {
		$this->title = __('Image Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'image-lead';
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'image-lead') . "\">\n",
			$this->rotator($depth + 1),
			"$tab\t\t</div>\n";
	}
}

// image box

class kol_image_box extends thesis_image_uploader_box {
	public function translate() {
		$this->title = __('Image (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'image-area';
		return array_merge($options, array(
			'width' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Image width', 'kol')),
			'height' => array(
				'type' => 'text',
				'width' => 'tiny',
				'label' => __('Image height', 'kol')),
			'link' => array(
				'type' => 'text',
				'width' => 'full',
				'label' => __('Link', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$url = stripslashes($this->options['image']['url']);
		$width = (!empty($this->options['width']) && is_numeric($this->options['width']) ? $this->options['width'] : false);
		$height = (!empty($this->options['height']) && is_numeric($this->options['height']) ? $this->options['height'] : false);
		$imglink = $this->options['link'];
		$tab = str_repeat("\t", $depth = !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'image-area') . "\">\n".
			(!empty($url) ? "$tab\t\t\t\t" . (!empty($imglink) ? "<a href=\"$imglink\">" : '') . "<img src=\"" . esc_url($url) . "\" alt=\"" . get_the_title() . "\"" . ($width ? " width=\"$width\"" : '') . ($height ? " height=\"$height\"" : '') . " />" . (!empty($imglink) ? '</a>' : '') . "\n" : '').
			"$tab\t\t\t</div>\n";
	}
}


/*---:[ video lead ]:---*/

class kol_product_lead_video extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_video_code', 'kol_email_code', 'kol_button');
	public $children = array('kol_headline_desc', 'kol_video_code');

	public function translate() {
		$this->title = __('Video Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options['class']['default'] = 'video-lead';
		$options = $thesis->api->html_options();
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'video-lead') . "\">\n",
			$this->rotator($depth + 1),
			"$tab\t\t</div>\n";
	}
}

// video code

class kol_video_code extends thesis_box {
	public function translate() {
		$this->title = __('Video Code (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		return array(
			'code' => array(
				'type' => 'textarea',
				'rows' => 8,
				'code' => true,
				'label' => __('Video Embed Code', 'kol'),
				'tooltip' => __('Paste the video embed code you got from your video service provider (YouTube, Vimeo, Amazon, etc.) here.', 'kol')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			(!empty($this->options['code']) ? "$tab\t\t\t<div class=\"video-embed video-box\">\n".
			"$tab\t\t\t\t" . stripslashes($this->options['code']) . "\n".
			"$tab\t\t\t</div>\n" : '');
	}
}


/*---:[ funnel lead ]:---*/

class kol_funnel_lead_box extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_three_cols');
	public $children = array('kol_headline_desc', 'kol_three_cols');

	public function translate() {
		$this->title = $this->name = __('Funnel Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'funnel-lead';
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", $depth);
		echo
			"<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'funnel-lead') . "\">\n".
			"$tab\t<div class=\"page\">\n",
			$this->rotator($depth + 1),
			"$tab\t</div>\n".
			"</div>\n";
	}
}


/*---:[ orb lead ]:---*/

class kol_orb_lead_box extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_three_cols');
	public $children = array('kol_headline_desc', 'kol_three_cols');

	public function translate() {
		$this->title = $this->name = __('Orb Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'orb-lead';
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", $depth);
		echo
			"<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'orb-lead') . "\">\n".
			"$tab\t<div class=\"page\">\n",
			$this->rotator($depth + 1),
			"$tab\t</div>\n".
			"</div>\n";
	}
}


/*---:[ pricing lead ]:---*/

class kol_pricing_lead_box extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_pricing_three_columns');
	public $children = array('kol_headline_desc', 'kol_pricing_three_columns');

	public function translate() {
		$this->title = $this->name = __('Pricing Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'pricing-lead';
		return $options;
	}
				
	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="page-lead '. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'pricing-lead') . "\">\n",
			"\t<div class=\"page\">\n",
			$this->rotator($depth + 1),
			"\t</div>\n",
			"</div>\n";
	}
}

/* 3 columns */

class kol_pricing_three_columns extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_pricing_lead_column_one', 'kol_pricing_lead_column_two', 'kol_pricing_lead_column_three');
	public $children = array('kol_pricing_lead_column_one', 'kol_pricing_lead_column_two', 'kol_pricing_lead_column_three');

	public function translate() { $this->title = __('3 Columns', 'kol'); }

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'three-columns';
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		$html = !empty($this->options['headline_html']) ? $this->options['headline_html'] : 'h2';
		echo
			"$tab\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'three-columns') . "\">\n",
			$this->rotator($depth + 1),
			"$tab\t</div>\n";
	}
}

// column 1

class kol_pricing_lead_column_one extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_col_headline_desc', 'kol_button', 'kol_pricing_lead_feature_list', 'kol_pricing_badge');
	public $children = array('kol_col_headline_desc', 'kol_button', 'kol_pricing_lead_feature_list', 'kol_pricing_badge');

	public function translate() {
		$this->title = __('Column 1', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'col col1 first';
		return array_merge($options, array(
			'spacer' => array(
				'type' => 'select',
				'label' => __('Column Spacing', 'kol'),
				'options' => array('none' => 'No top spacing', 'col-spacer' => 'Add top spacing'),
				'tooltip' => __('If you want to push this column down, as if it were to have less importance, select "Add top spacing."', 'kol'),
				'default' => 'none'),
			'link' => array(
				'type' => 'text',
				'label' => __('Link', 'kol'),
				'width' => 'full',
				'tooltip' => __('Enter the URL (including <code>http://</code> the user should be brought to when they click this button.', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$html = (!empty($this->options['link']) ? "a" : "div");
		$link = (!empty($this->options['link']) ? " href=\"" . $this->options['link'] . "\"" : '');
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<$html{$link}" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'col col1 first') . (!empty($this->options['spacer']) ? " " .  trim($thesis->api->esc($this->options['spacer'])) : '') . "\">\n",
		$this->rotator($depth + 1),
		"$tab\t\t</$html>\n";
	}
}

// column 2

class kol_pricing_lead_column_two extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_col_headline_desc', 'kol_button', 'kol_pricing_lead_feature_list', 'kol_pricing_badge');
	public $children = array('kol_col_headline_desc', 'kol_button', 'kol_pricing_lead_feature_list', 'kol_pricing_badge');

	public function translate() {
		$this->title = __('Column 2', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'col col2';
		return array_merge($options, array(
			'spacer' => array(
				'type' => 'select',
				'label' => __('Column Spacing', 'kol'),
				'options' => array('none' => 'No top spacing', 'col-spacer' => 'Add top spacing'),
				'tooltip' => __('If you want to push this column down, as if it were to have less importance, select "Add top spacing."', 'kol'),
				'default' => 'none')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'col col2') . (!empty($this->options['spacer']) ? " " .  trim($thesis->api->esc($this->options['spacer'])) : '') . "\">\n",
		$this->rotator($depth + 1),
		"$tab\t\t</div>\n";
	}
}

// column 3

class kol_pricing_lead_column_three extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_col_headline_desc', 'kol_button', 'kol_pricing_lead_feature_list', 'kol_pricing_badge');
	public $children = array('kol_col_headline_desc', 'kol_button', 'kol_pricing_lead_feature_list', 'kol_pricing_badge');

	public function translate() {
		$this->title = __('Column 3', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'col col3';
		return array_merge($options, array(
			'spacer' => array(
				'type' => 'select',
				'label' => __('Column Spacing', 'kol'),
				'options' => array('none' => 'No top spacing', 'col-spacer' => 'Add top spacing'),
				'tooltip' => __('If you want to push this column down, as if it were to have less importance, select "Add top spacing."', 'kol'),
				'default' => 'none')));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"$tab\t\t<div" . (!empty($this->options['id']) ? ' id="' . trim($thesis->api->esc($this->options['id'])) . '"' : '') . ' class="'. (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'col col3') . (!empty($this->options['spacer']) ? " " .  trim($thesis->api->esc($this->options['spacer'])) : '') . "\">\n",
		$this->rotator($depth + 1),
		"$tab\t\t</div>\n";
	}
}

// feature listing

class kol_pricing_lead_feature_list extends thesis_box {
	public function translate() {
		$this->title = __('Feature List', 'kol');
	}

	public function options() {
		$features = array('feature_one' => 1, 'feature_two' => 2, 'feature_three' => 3, 'feature_four' => 4, 'feature_five' => 5, 'feature_six' => 6, 'feature_seven' => 7, 'feature_eight' => 8);
		foreach ($features as $f => $n)
			$options[$f] = array(
				'type' => 'text',
				'label' => __("Feature $n", 'kol'),
				'width' => 'full',
				'tooltip' => __('Enter a feature that is included in this table column.', 'kol'));
		return $options;
	}

	public function html($args = false) {
		global $thesis;
		$features = array('feature_one', 'feature_two', 'feature_three', 'feature_four', 'feature_five', 'feature_six', 'feature_seven', 'feature_eight');
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo "$tab\t\t\t<ul>\n";
		foreach ($features as $f)
			echo (!empty($this->options[$f]) ? "$tab\t\t\t\t<li>" . stripslashes($this->options[$f]) . "</li>\n" : '');
		echo "$tab\t\t\t</ul>\n";
	}
}

// price badge

class kol_pricing_badge extends thesis_box {
	public function translate() {
		$this->title = __('Price Badge', 'kol');
	}

	public function options() {
		return array(
			'price' => array(
				'type' => 'text',
				'label' => __('Price', 'kol'),
				'width' => 'medium',
				'tooltip' => __('Enter the price here', 'kol')));
		}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo (!empty($this->options['price']) ? "$tab\t\t\t<span class=\"pricing-badge\">" . stripslashes($this->options['price']) . "</span>\n" : '');
	}
}


/*---:[ advanced landing page box ]:---*/

class kol_landing_box extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'kol_content_block', 'kol_three_cols', 'kol_two_cols');

	public function translate() {
		$this->title = $this->name = __('Landing Page Elements (MD3)', 'kol');
	}
	
	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		return array_merge($options, array(
			'style' => array(
				'type' => 'checkbox',
				'label' => __('Full-Width Background', 'kol'),
				'tooltip' => __('If you want the content of this box to have a background color that spans across the entire browser window, enable this option.', 'kol'),
				'options' => array('wrapper-bg' => __('Enable full-width background', 'kol')))));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo "<div" . (!empty($this->options['id']) ? " id=\"" . trim($thesis->api->esc($this->options['id'])) . "\"" : '') . " class=\"landing-box" . (!empty($this->options['class']) ? ' ' . trim($thesis->api->esc($this->options['class'])) : '') . (!empty($this->options['style']) ? ' landing-full' : '') . "\">\n";
		echo "$tab\t<div class=\"page\">\n",
		$this->rotator($depth + 1 ),
		"$tab\t</div>\n",
		"</div>\n";
	}
}

class kol_content_block extends thesis_box {
	public $type = 'rotator';
	public $dependents = array('kol_headline_desc', 'thesis_text_box');
	public $children = array('kol_headline_desc', 'thesis_text_box');

	public function translate() {
		$this->title = __('Content Block', 'kol');
	}

	public function options() {
		global $thesis;
		$options = $thesis->api->html_options();
		$options['class']['default'] = 'entry';
		return array_merge($options, array(
			'style' => array(
				'type' => 'checkbox',
				'label' => __('Box Style', 'kol'),
				'tooltip' => __('If you want to add a background, border and shadow around the columns, check this option.', 'kol'),
				'options' => array('box-style' => __('Enable Box Effect', 'kol')),
				'dependents' => array('box-style' => true)),
			'round' => array(
				'type' => 'select',
				'label' => __('Round corners', 'kol'),
				'options' => array(
					'round-top' => __('Top', 'kol'),
					'round-bottom' => __('Bottom', 'kol'),
					'round-full' => __('Full', 'kol'),
					'round-none' => __('None', 'kol')),
				'default' => 'full',
				'parent' => array('style' => 'box-style'),
				'tooltip' => __('If you want the content box to have rounded corners, you can select which parts here.', 'kol'))));
	}

	public function html($args = false) {
		global $thesis;
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		echo
			"<div" . (!empty($this->options['id']) ? " id=\"" . trim($thesis->api->esc($this->options['id'])) . "\"" : '') . " class=\"" . (!empty($this->options['class']) ? trim($thesis->api->esc($this->options['class'])) : 'entry') . ($this->options['style'] == true ? ' content' . ($this->options['round'] != 'round-none' ? ' ' . $this->options['round'] : '') : ' content-text') . "\">\n",
			$this->rotator($depth + 1),
			"</div>\n";
	}
}