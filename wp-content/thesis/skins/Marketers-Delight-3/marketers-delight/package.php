<?php

/*---:[ product lead ]:---*/

class kol_product_lead_pkg extends thesis_package {
	public $selector = '.product-lead';

	public function translate() {
		$this->title = __('Product Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$o = $thesis->api->css->options;
		$options['background-color'] = $o['background']['fields']['background-color'];
		$options['font'] = $o['font'];
		$options['font']['fields'] = array_merge($options['font']['fields'], array('main-headline' => $o['font'], 'sec-headline' => $o['font']));
		$options['color'] = $o['color'];
		$options['email'] = array(
			'type' => 'group',
			'label' => __('Email Box', 'kol'),
			'fields' => array(
				'email-background-color' => $o['background']['fields']['background-color'],
				'email-icon-color' => $o['color'],
				'email-color' => $o['color']));
		foreach (array('main', 'sec') as $h)
			foreach ($o['font']['fields'] as $name => $option) {
				unset($options['font']['fields']["$h-headline"]['fields'][$name]);
				$options['font']['fields']["$h-headline"]['fields']["$h-headline-$name"] = $option;
			}
		$options['background-color']['tooltip'] = __('Change the background color of the entire Page Lead.', 'kol');
		$options['font']['fields']['font-size']['default'] = 15;
		$options['font']['fields']['line-height']['default'] = 23;
		$options['font']['fields']['main-headline']['label'] = __('Main Headline', 'kol');
		$options['font']['fields']['main-headline-font-size']['default'] = 32;
		$options['font']['fields']['main-headline-line-height']['default'] = 44;
		$options['font']['fields']['sec-headline']['label'] = __('Secondary Headline', 'kol');
		$options['font']['fields']['sec-headline-font-size']['default'] = 24;
		$options['font']['fields']['sec-headline-line-height']['default'] = 35;
		$options['email']['fields']['email-background-color']['tooltip'] = __('You can change the background color of the email box here.', 'kol');
		$options['email']['fields']['email-background-color']['default'] = 'FFFFFF';
		$options['email']['fields']['email-icon-color']['label'] = __('Icon Color', 'kol');
		$options['email']['fields']['email-icon-color']['default'] = $options['color']['default'] = $options['email']['fields']['email-color']['default'] = '1E1E1E';
		return $options;
	}

	public function css() {
		global $thesis;
		$s = $this->selector;
		$fonts = array(
			'' => "$s",
			'main-headline-' => "$s h1, $s h2, $s h3",
			'sec-headline-' => "$s .email-form h4, $s .email-code h4");
		$font = array();
		foreach ($fonts as $f => $selector) {
			$font[$f]['size'] = !empty($this->options["{$f}font-size"]) ? 'font-size: ' . $thesis->api->css->number($this->options["{$f}font-size"]) . ';' : false;
			$font[$f]['height'] = !empty($this->options["{$f}line-height"]) || !!$width ? 'line-height: ' . (!empty($this->options["{$f}line-height"]) ? $thesis->api->css->number($this->options["{$f}line-height"]) : "{$height}px") . ';' : false;
			$font[$f]['family'] = !empty($this->options["{$f}font-family"]) ? ($this->options["{$f}font-family"] == 'inherit' ? "font-family: inherit;" : (!empty($thesis->api->css->fonts) && !empty($thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]) ? "font-family: " . $thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]['family'] . ";" : false)) : false;
			$font[$f]['weight'] = !empty($this->options["{$f}font-weight"]) ? "font-weight: " . $this->options["{$f}font-weight"] . ";" : false;
			$font[$f]['style'] = !empty($this->options["{$f}font-style"]) ? "font-style: " . $this->options["{$f}font-style"] . ";" : false;
			$font[$f]['variant'] = !empty($this->options["{$f}font-variant"]) ? "font-variant: " . $this->options["{$f}font-variant"] . ";" : false;
			$font[$f]['transform'] = !empty($this->options["{$f}text-transform"]) ? "text-transform: " . $this->options["{$f}text-transform"] . ";" : false;
			$font[$f]['align'] = !empty($this->options["{$f}text-align"]) ? "text-align: " . $this->options["{$f}text-align"] . ";" : false;
			$font[$f]['letter-spacing'] = !empty($this->options["{$f}letter-spacing"]) ? "letter-spacing: " . $thesis->api->css->number($this->options["{$f}letter-spacing"]) . ";" : false;
			$css .= "$selector { " . implode(' ', array_filter($font[$f])) . " }\n";
		}
		return trim($css.
			(!empty($this->colors['background-color']) ?
				"$s { background-color: " . $this->colors['background-color'] . "; }\n".
				"$s .page { padding-bottom: 36px; }\n" : '').
			".product-lead { color: " . $this->colors['color'] . "; }\n".
			".product-lead ul, .product-lead ol, .product-lead p { margin-bottom: " . $thesis->api->css->number($this->options['line-height']) . "; }\n".
			".product-lead ul, .product-lead ol { margin-left: " . $thesis->api->css->number($this->options['line-height']) . "; }\n".
			
			".email-lead .text-area { float: left; position: relative; width: 60%; }\n".
			".email-lead .email-form { background-color: " . $this->colors['email-background-color'] . "; color: " . $this->colors['email-color'] . "; float: left; padding: 24px; text-align: center; width: 35%; -moz-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px; }\n".
			".email-lead .email-form .text-area { float: none; margin-bottom: 24px; width: auto; }\n".
			".email-lead .text-area + .email-form, .email-lead .email-form + .text-area { margin-left: 5%; }\n".
			".email-lead .email-form .icon { background-color: " . $this->colors['email-background-color'] . "; color: " . $this->colors['email-icon-color'] . "; display: block; height: 100px; margin: -50px auto -35px; padding-top: 25px; width: 100px; -mox-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; }\n".
			".email-lead .email-form input { margin-bottom: 12px; width: 100%; }\n".
			".image-lead .text-area { float: left; width: 60%; }\n".
			".image-lead .image-area { float: left; width: 35%; }\n".
			".image-lead .text-area + .image-area, .image-lead .image-area + .text-area { margin-left: 5%; } { margin-left: 5%; }\n".	
		
			".video-lead { text-align: center; }\n".
			".video-lead .video-embed { margin-bottom: 36px; }\n".
			".video-lead .email-code { background-color: " . $this->colors['email-background-color'] . "; color: " . $this->colors['email-color'] . "; margin: 0 auto 36px; padding: 24px; }\n".
			".video-lead .email-code:last-child { margin-bottom: 0; }\n".
			".video-lead .email-code input { margin-right: 3%; }\n".
			".video-lead .email-code input[type=\"text\"], .video-lead .email-code input[type=\"email\"], .video-lead .email-code input[type=\"password\"] { width: 35%; }\n".
			".video-lead .email-code input[type=\"submit\"] { margin-right: 0; width: 22%; }\n"
			);
	}
}


/*---:[ funnel page lead ]:---*/

class kol_funnel_lead_pkg extends thesis_package {
	public $selector = '.funnel-lead';

	public function translate() {
		$this->title = __('Funnel Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$o = $thesis->api->css->options;
		$c = 0;
		$options['font'] = $o['font'];
		$options['font']['fields']['font-size']['default'] = 15;
		$options['font']['fields']['line-height']['default'] = 22;
		$options['font']['fields']['text-align']['default'] = 'center';
		$options['font']['fields'] = array_merge($options['font']['fields'], array('main-headline' => $o['font'], 'col-headline' => $o['font']));
		$options['font']['fields']['main-headline']['label'] = __('Main Headline', 'kol');
		$options['font']['fields']['main-headline-font-size']['default'] = 40;
		$options['font']['fields']['main-headline-line-height']['default'] = 56;
		$options['font']['fields']['col-headline']['label'] = __('Columns Headline', 'kol');
		$options['font']['fields']['col-headline-font-size']['default'] = 27;
		$options['font']['fields']['col-headline-line-height']['default'] = 37;
		foreach (array('main', 'col') as $h)
			foreach ($o['font']['fields'] as $name => $option) {
				unset($options['font']['fields']["$h-headline"]['fields'][$name]);
				$options['font']['fields']["$h-headline"]['fields']["$h-headline-$name"] = $option;
			}
		$options['background-color'] = $o['background']['fields']['background-color'];
		$options['background-color']['tooltip'] = __('Change the background color of the entire Page Lead.', 'kol');
		$options['color'] = $o['color'];
		$options['color']['default'] = '1E1E1E';
		$options['col-width'] = $o['width'];
		$options['col-width']['label'] = __('Column Width', 'kol');
		$options['col-width']['tooltip'] = __('The value you enter here will serve as the width for EACH funnel box.<br /><br />If you enter only a number, Thesis will assume you want your output in pixels. If you want to use any other unit, please supply it here.', 'kol');
		$options['col-width']['default'] = 344;
		$options['col-spacing'] = $o['margin']['fields']['margin-left'];
		$options['col-spacing']['label'] = __('Column Left Spacing (Margin)', 'kol');
		$options['col-spacing']['tooltip'] =  __('The value you enter here will add spacing to the left sides of each column.<br /><br />If all the columns don\'t fit on on line, consider lowering this value until they all fit.', 'kol');
		$options['col-spacing']['default'] = 24;
		foreach (array('col-1', 'col-2', 'col-3') as $col) {
			$c++;
			$options[$col] = array(
				'type' => 'group',
				'label' => __("Column $c", 'kol'),
				'fields' => array(
					"$col-background" => $o['background'],
					"$col-border" => $o['border'],
					"$col-icon" => array(
						'type' => 'group',
						'label' => __('Icon', 'kol'),
						'fields' => array(
							"$col-icon-background-color" => $o['background']['fields']['background-color'],
							"$col-icon-font-size" => $o['font']['fields']['font-size'],
							"$col-icon-color" => $o['color'])),
						"$col-color" => $o['color']));
			$options[$col]['fields']["$col-background-color"]['default'] = $options[$col]['fields']["$col-border-color"]['default'] = $options[$col]['fields']["$col-icon-color"]['default'] = 'FFFFFF';
			$options[$col]['fields']["$col-border-width"]['default'] = 5;
			$options[$col]['fields']["$col-icon-font-size"]['default'] = 36;
			$options[$col]['fields']["$col-icon-background-color"]['default'] = 'AE2525';
			$options[$col]['fields']["$col-icon"]['fields']["$col-icon-font-size"]['label'] = __('Icon Size', 'kol');
			$options[$col]['fields']["$col-icon-font-size"]['default'] = 30;
			$options[$col]['fields']["$col-icon"]['fields']["$col-icon-color"]['label'] = __('Icon Color', 'kol');
			$options[$col]['fields']["$col-color"]['default'] = '1E1E1E';
			foreach (array('background', 'border') as $key)
				foreach ($o[$key]['fields'] as $name => $option) {
					unset($options[$col]['fields']["$col-$key"]['fields'][$name]);
					$options[$col]['fields']["$col-$key"]['fields']["$col-$name"] = $option;
				}
		}
		return $options;
	}

	public function css() {
		global $thesis;
		$s = $this->selector;
		$col = $font = array();
		$classes = array('col-1-' => '.col1', 'col-2-' => '.col2', 'col-3-' => '.col3');
		$fonts = array('' => $s, 'main-headline-' => "$s h1, $s h2, $s h3", 'col-headline-' => "$s .col h4");
		foreach ($classes as $c => $selector) {
			$col[$c]['bg-color'] = "background-color: " . $this->colors["{$c}background-color"] . ";";
			if (!empty($this->options["{$c}background-image"])) {
				$col[$c]['bg-image'] = "background-image: url('" . $thesis->api->esc($this->options["{$c}background-image"]) . "');";
				$col[$c]['bg-position'] = !empty($this->options["{$c}background-position"]) ? 'background-position: ' . stripslashes($this->options["{$c}background-position"]) . ';' : false;
				$col[$c]['bg-attachment'] = !empty($this->options["{$c}background-attachment"]) ? "background-attachment: {$this->options['{$c}background-attachment']};" : false;
				$col[$c]['bg-repeat'] = !empty($this->options["{$c}background-repeat"]) ? "background-repeat: {$this->options['{$c}background-repeat']};" : false;
			}
			$col[$c]['border-width'] = ($bw = $thesis->api->css->number((!empty($this->options["{$c}border-width"]) ? $this->options["{$c}border-width"] : ''))) ? "border-width: $bw;" : false;
			$col[$c]['border-style'] = !empty($this->options["{$c}border-style"]) ? "border-style: {$this->options['{$c}border-style']};" : ($bw ? 'border-style: solid;' : false);
			$col[$c]['border-color'] = !empty($this->colors["{$c}border-color"]) ? "border-color: " . $this->colors["{$c}border-color"] . ";" : false;
			$col[$c]['color'] = !empty($this->colors["{$c}color"]) ? "color: " . $this->colors["{$c}color"] . ";" : false;
			$css .=
				"$s $selector { " . implode(' ', array_filter($col[$c])) . " }\n".
				(!empty($this->options["{$c}icon-font-size"]) ? "$s $selector .icon { background-color: " . $this->colors["{$c}icon-background-color"] . "; color: " . $this->colors["{$c}icon-color"] . "; font-size: " . $thesis->api->css->number($this->options["{$c}icon-font-size"]) . "; }\n" : false);
		}
		foreach ($fonts as $f => $selector) {
			$font[$f]['size'] = !empty($this->options["{$f}font-size"]) ? 'font-size: ' . $thesis->api->css->number($this->options["{$f}font-size"]) . ';' : false;
			$font[$f]['height'] = !empty($this->options["{$f}line-height"]) || !!$width ? 'line-height: ' . (!empty($this->options["{$f}line-height"]) ? $thesis->api->css->number($this->options["{$f}line-height"]) : "{$height}px") . ';' : false;
			$font[$f]['family'] = !empty($this->options["{$f}font-family"]) ? ($this->options["{$f}font-family"] == 'inherit' ? "font-family: inherit;" : (!empty($thesis->api->css->fonts) && !empty($thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]) ? "font-family: " . $thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]['family'] . ";" : false)) : false;
			$font[$f]['weight'] = !empty($this->options["{$f}font-weight"]) ? "font-weight: " . $this->options["{$f}font-weight"] . ";" : false;
			$font[$f]['style'] = !empty($this->options["{$f}font-style"]) ? "font-style: " . $this->options["{$f}font-style"] . ";" : false;
			$font[$f]['variant'] = !empty($this->options["{$f}font-variant"]) ? "font-variant: " . $this->options["{$f}font-variant"] . ";" : false;
			$font[$f]['transform'] = !empty($this->options["{$f}text-transform"]) ? "text-transform: " . $this->options["{$f}text-transform"] . ";" : false;
			$font[$f]['align'] = !empty($this->options["{$f}text-align"]) ? "text-align: " . $this->options["{$f}text-align"] . ";" : false;
			$font[$f]['letter-spacing'] = !empty($this->options["{$f}letter-spacing"]) ? "letter-spacing: " . $thesis->api->css->number($this->options["{$f}letter-spacing"]) . ";" : false;
			$css .= "$selector { " . implode(' ', array_filter($font[$f])) . " }\n";
		}
		return trim($css.
			(!empty($this->colors['background-color']) ?
				"$s { background-color: " . $this->colors['background-color'] . "; }\n".
				"$s .page { padding-bottom: 36px; }\n" : '').
			"$s { color: " . $this->colors['color'] . "; }\n".
			"$s p , $s .col .text-area { margin-bottom: " . $thesis->api->css->number($this->options['line-height']) . "; }\n".
			"$s .col { float: left; padding: 36px; margin-left: " . $this->options['col-spacing'] . 'px; width: ' . $thesis->api->css->number($this->options['col-width']) . "; -moz-box-shadow: inset 0 0 12px rgba(0, 0, 0, .1), 0 0 6px rgba(0, 0, 0, .2); -webkit-box-shadow: inset 0 0 12px rgba(0, 0, 0, .1), 0 0 6px rgba(0, 0, 0, .2); box-shadow: inset 0 0 12px rgba(0, 0, 0, .1), 0 0 6px rgba(0, 0, 0, .2); }\n".
			"$s .icon { display: block; height: 80px; margin: -60px auto 24px; padding-top: 28px; width: 80px; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; }\n");
	}
}


/*---:[ orb page lead ]:---*/

class kol_orb_lead_pkg extends thesis_package {
	public $selector = '.orb-lead';

	public function translate() {
		$this->title = __('Orb Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$o = $thesis->api->css->options;
		$c = 0;
		$options['background-color'] = $o['background']['fields']['background-color'];
		$options['background-color']['tooltip'] = __('Change the background color of the entire Page Lead.', 'kol');
		$options['color'] = $o['color'];
		$options['color']['default'] = '1E1E1E';
		$options['font'] = $o['font'];
		$options['font']['fields']['font-size']['default'] = 15;
		$options['font']['fields']['line-height']['default'] = 22;
		$options['font']['fields']['text-align']['default'] = 'center';
		$options['font']['fields'] = array_merge($options['font']['fields'], array('main-headline' => $o['font'], 'col-headline' => $o['font']));
		$options['font']['fields']['main-headline']['label'] = __('Main Headline', 'kol');
		$options['font']['fields']['main-headline-font-size']['default'] = 40;
		$options['font']['fields']['main-headline-line-height']['default'] = 56;
		$options['font']['fields']['col-headline']['label'] = __('Orb Headline', 'kol');
		$options['font']['fields']['col-headline-font-size']['default'] = 24;
		$options['font']['fields']['col-headline-line-height']['default'] = 33;
		foreach (array('main', 'col') as $h)
			foreach ($o['font']['fields'] as $name => $option) {
				unset($options['font']['fields']["$h-headline"]['fields'][$name]);
				$options['font']['fields']["$h-headline"]['fields']["$h-headline-$name"] = $option;
			}
		$options['col-size'] = $o['width'];
		$options['col-size']['label'] = __('Orb Size', 'kol');
		$options['col-size']['tooltip'] = __('The value entered here will account for the height and width of the orb.<br /><br />The default unit is px, but if you want to use a different unit, enter it here.', 'kol');
		$options['col-size']['default'] = 288;
		$options['col-spacing'] = $o['margin']['fields']['margin-left'];
		$options['col-spacing']['label'] = __('Orb Left Spacing (Margin)', 'kol');
		$options['col-spacing']['tooltip'] =  __('The value you enter here will add spacing to the left sides of each orb.<br /><br />If all the orbs don\'t fit on on line, consider lowering this value until they all fit.', 'kol');
		$options['col-spacing']['default'] = 60;
		foreach (array('col-1', 'col-2', 'col-3') as $col) {
			$c++;
			$options[$col] = array(
				'type' => 'group',
				'label' => __("Orb $c", 'kol'),
				'fields' => array(
					"$col-background-color" => $o['background']['fields']['background-color'],
					"$col-border" => $o['border'],
					"$col-padding" => $o['padding'],
					"$col-icon-font-size" => $o['font']['fields']['font-size'],
					"$col-color" => $o['color']));
			$options[$col]['fields']["$col-background-color"]['default'] = 'AE2525';
			$options[$col]['fields']["$col-border-color"]['default'] = '880A0A';
			$options[$col]['fields']["$col-border-width"]['default'] = 10;
			$options[$col]['fields']["$col-padding-top"]['default'] = 52;
			$options[$col]['fields']["$col-padding-right"]['default'] = $options[$col]['fields']["$col-padding-bottom"]['default'] = $options[$col]['fields']["$col-padding-left"]['default'] = 24;
			$options[$col]['fields']["$col-icon-font-size"]['label'] = __('Icon Font Size', 'kol');
			$options[$col]['fields']["$col-icon-font-size"]['default'] = 27;
			$options[$col]['fields']["$col-color"]['default'] = 'FFFFFF';
			foreach (array('background', 'border', 'padding') as $key)
				foreach ($o[$key]['fields'] as $name => $option) {
					unset($options[$col]['fields']["$col-$key"]['fields'][$name]);
					$options[$col]['fields']["$col-$key"]['fields']["$col-$name"] = $option;
				}
		}
		return $options;
	}

	public function css() {
		global $thesis;
		$s = $this->selector;
		$col = $font = array();
		$classes = array('col-1-' => '.col1', 'col-2-' => '.col2', 'col-3-' => '.col3');
		$fonts = array('' => $s, 'main-headline-' => "$s h1, $s h2, $s h3", 'col-headline-' => "$s .col h4");
		foreach ($classes as $c => $selector) {
			$col[$c]['bg-color'] = 'background-color: ' . $this->colors["{$c}background-color"] . ';';
			$col[$c]['border-width'] = ($bw = $thesis->api->css->number((!empty($this->options["{$c}border-width"]) ? $this->options["{$c}border-width"] : ''))) ? "border-width: $bw;" : false;
			$col[$c]['border-style'] = !empty($this->options["{$c}border-style"]) ? "border-style: {$this->options['{$c}border-style']};" : ($bw ? 'border-style: solid;' : false);
			$col[$c]['border-color'] = !empty($this->colors["{$c}border-color"]) ? "border-color: " . $this->colors["{$c}border-color"] . ";" : false;
			$col[$c]["{$c}padding"] = $thesis->api->css->trbl('padding', array(
				'padding-top' => !empty($this->options["{$c}padding-top"]) ? $this->options["{$c}padding-top"] : '',
				'padding-right' => !empty($this->options["{$c}padding-right"]) ? $this->options["{$c}padding-right"] : '',
				'padding-bottom' => !empty($this->options["{$c}padding-bottom"]) ? $this->options["{$c}padding-bottom"] : '',
				'padding-left' => !empty($this->options["{$c}padding-left"]) ? $this->options["{$c}padding-left"] : ''));
			$col[$c]['color'] = !empty($this->colors["{$c}color"]) ? 'color: ' . $this->colors["{$c}color"] . ";" : false;
			$css .=
				"$s $selector { " . implode(' ', array_filter($col[$c])) . " }\n".
				(!empty($this->options["{$c}icon-font-size"]) ? "$s $selector .icon { font-size: " . $thesis->api->css->number($this->options["{$c}icon-font-size"]) . "; }\n" : false);
		}
		foreach ($fonts as $f => $selector) {
			$font[$f]['size'] = !empty($this->options["{$f}font-size"]) ? 'font-size: ' . $thesis->api->css->number($this->options["{$f}font-size"]) . ';' : false;
			$font[$f]['height'] = !empty($this->options["{$f}line-height"]) || !!$width ? 'line-height: ' . (!empty($this->options["{$f}line-height"]) ? $thesis->api->css->number($this->options["{$f}line-height"]) : "{$height}px") . ';' : false;
			$font[$f]['family'] = !empty($this->options["{$f}font-family"]) ? ($this->options["{$f}font-family"] == 'inherit' ? "font-family: inherit;" : (!empty($thesis->api->css->fonts) && !empty($thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]) ? "font-family: " . $thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]['family'] . ';' : false)) : false;
			$font[$f]['weight'] = !empty($this->options["{$f}font-weight"]) ? "font-weight: " . $this->options["{$f}font-weight"] . ";" : false;
			$font[$f]['style'] = !empty($this->options["{$f}font-style"]) ? "font-style: " . $this->options["{$f}font-style"] . ";" : false;
			$font[$f]['variant'] = !empty($this->options["{$f}font-variant"]) ? "font-variant: " . $this->options["{$f}font-variant"] . ";" : false;
			$font[$f]['transform'] = !empty($this->options["{$f}text-transform"]) ? "text-transform: " . $this->options["{$f}text-transform"] . ";" : false;
			$font[$f]['align'] = !empty($this->options["{$f}text-align"]) ? "text-align: " . $this->options["{$f}text-align"] . ";" : false;
			$font[$f]['letter-spacing'] = !empty($this->options["{$f}letter-spacing"]) ? "letter-spacing: " . $thesis->api->css->number($this->options["{$f}letter-spacing"]) . ";" : false;
			$css .= "$selector { " . implode(' ', array_filter($font[$f])) . " }\n";
		}
		return trim($css.
			(!empty($this->colors['background-color']) ?
				"$s { background-color: " . $this->colors['background-color'] . "; }\n".
				"$s .page { padding-bottom: 36px; }\n" : '').
			"$s { color: " . $this->colors['color'] . "; }\n".
			"$s p, $s .col .text-area { margin-bottom: " . $thesis->api->css->number($this->options['line-height']) . "; }\n".
			"$s .col { display: block; float: left; height: " . $thesis->api->css->number($this->options['col-size']) . "; margin-left: " . $this->options['col-spacing'] . "px; width: " . $thesis->api->css->number($this->options['col-size']) . "; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; }\n".
			"$s .icon { margin-bottom: 12px; }\n");
	}
}


/*---:[ pricing page lead ]:---*/

class kol_pricing_lead_pkg extends thesis_package {
	public $selector = '.pricing-lead';

	public function translate() {
		$this->title = __('Pricing Page Lead (MD3)', 'kol');
	}

	public function options() {
		global $thesis;
		$o = $thesis->api->css->options;
		$c = 0;
		$options['font'] = $o['font'];
		$options['font']['fields']['font-size']['default'] = 15;
		$options['font']['fields']['line-height']['default'] = 22;
		$options['font']['fields']['text-align']['default'] = 'center';
		$options['font']['fields'] = array_merge($options['font']['fields'], array('main-headline' => $o['font'], 'col-headline' => $o['font']));
		$options['font']['fields']['main-headline']['label'] = __('Main Headline', 'kol');
		$options['font']['fields']['main-headline-font-size']['default'] = 40;
		$options['font']['fields']['main-headline-line-height']['default'] = 56;
		$options['font']['fields']['col-headline']['label'] = __('Column Headline', 'kol');
		$options['font']['fields']['col-headline-font-size']['default'] = 27;
		$options['font']['fields']['col-headline-line-height']['default'] = 37;
		foreach (array('main', 'col') as $h)
			foreach ($o['font']['fields'] as $name => $option) {
				unset($options['font']['fields']["$h-headline"]['fields'][$name]);
				$options['font']['fields']["$h-headline"]['fields']["$h-headline-$name"] = $option;
			}
		$options['background-color'] = $o['background']['fields']['background-color'];
		$options['background-color']['tooltip'] = __('Change the background color of the entire Page Lead.', 'kol');
		$options['color'] = $o['color'];
		$options['color']['default'] = '1E1E1E';
		$options['col-width'] = $o['width'];
		$options['col-width']['label'] = __('Column Width', 'kol');
		$options['col-width']['default'] = 360;
		$options['col-width']['tooltip'] = __('The value you enter here will serve as the width for EACH column.<br /><br />If you enter only a number, Thesis will assume you want your output in pixels. If you want to use any other unit, please supply it here.', 'kol');
		foreach (array('col-1', 'col-2', 'col-3') as $col) {
			$c++;
			$options[$col] = array(
				'type' => 'group',
				'label' => __("Column $c", 'kol'),
				'fields' => array(
					"$col-background-color" => $o['background']['fields']['background-color'],
					"$col-title" => array(
						'type' => 'group',
						'label' => __('Title Area', 'kol'),
						'fields' => array(
							"$col-title-background-color" => $o['background']['fields']['background-color'],
							"$col-title-color" => $o['color'])),
					"$col-border-color" => $o['border']['fields']['border-color'],
					"$col-badge" => array(
						'type' => 'group',
						'label' => __('Pricing Badge', 'kol'),
						'fields' => array(
							"$col-badge-background-color" => $o['background']['fields']['background-color'],
							"$col-badge-color" => $o['color'])),
					"$col-color" => $o['color']));
			$options[$col]['fields']["$col-background-color"]['default'] = $options[$col]['fields']["$col-title-color"]['default'] = $options[$col]['fields']["$col-badge-color"]['default'] = 'FFFFFF';
			$options[$col]['fields']["$col-border-color"]['label'] = __('List Border Color', 'kol');
			$options[$col]['fields']["$col-border-color"]['default'] = 'DDDDDD';
			$options[$col]['fields']["$col-border-color"]['tooltip'] = __('You can change the color of the border that appears after each list item in your table.', 'kol');
			$options[$col]['fields']["$col-badge-background-color"]['default'] = $options[$col]['fields']["$col-color"]['default'] = '1E1E1E';
			foreach (array('background', 'border') as $key)
				foreach ($o[$key]['fields'] as $name => $option) {
					unset($options[$col]['fields']["$col-$key"]['fields'][$name]);
					$options[$col]['fields']["$col-$key"]['fields']["$col-$name"] = $option;
				}
		}
		$options['col-1']['fields']['col-1-title-background-color']['default'] = $options['col-3']['fields']["col-3-title-background-color"]['default'] = '666666';
		$options['col-2']['fields']['col-2-title-background-color']['default'] = '32A4E6';
		return $options;
	}

	public function css() {
		global $thesis;
		$s = $this->selector;
		$col = $font = array();
		$classes = array('col-1' => '.col1', 'col-2' => '.col2', 'col-3' => '.col3');
		$fonts = array('' => $s, 'main-headline-' => "$s h1, $s h2, $s h3", 'col-headline-' => "$s .col h4");
		$halfwidth = ($this->options['col-width'] / 2);
		foreach ($classes as $c => $selector) {
			$col[$c]['bg-color'] = "background-color: " . $this->colors["$c-background-color"] . ";";
			$col[$c]['color'] = !empty($this->colors["$c-color"]) ? "color: " . $this->colors["$c-color"] . ";" : false;
			$css .=
				"$s $selector { " . implode(' ', array_filter($col[$c])) . " }\n".
				"$s $selector .text-area { background-color: " . $this->colors["$c-title-background-color"] . "; color: " . $this->colors["$c-title-color"] . "; }\n".
				"$s $selector .text-area:after { border-top: 24px solid " . $this->colors["$c-title-background-color"] . "; }\n".
				"$s $selector li { border-color: " . $this->colors["$c-border-color"] . "; }\n".
				"$s $selector .pricing-badge { background-color: " . $this->colors["$c-badge-background-color"] . "; color: " . $this->colors["$c-badge-color"] . "; }\n";
		}
		foreach ($fonts as $f => $selector) {
			$font[$f]['size'] = !empty($this->options["{$f}font-size"]) ? 'font-size: ' . $thesis->api->css->number($this->options["{$f}font-size"]) . ';' : false;
			$font[$f]['height'] = !empty($this->options["{$f}line-height"]) || !!$width ? 'line-height: ' . (!empty($this->options["{$f}line-height"]) ? $thesis->api->css->number($this->options["{$f}line-height"]) : "{$height}px") . ';' : false;
			$font[$f]['family'] = !empty($this->options["{$f}font-family"]) ? ($this->options["{$f}font-family"] == 'inherit' ? "font-family: inherit;" : (!empty($thesis->api->css->fonts) && !empty($thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]) ? "font-family: " . $thesis->api->css->fonts->fonts[$this->options["{$f}font-family"]]['family'] . ";" : false)) : false;
			$font[$f]['weight'] = !empty($this->options["{$f}font-weight"]) ? "font-weight: " . $this->options["{$f}font-weight"] . ";" : false;
			$font[$f]['style'] = !empty($this->options["{$f}font-style"]) ? "font-style: " . $this->options["{$f}font-style"] . ";" : false;
			$font[$f]['variant'] = !empty($this->options["{$f}font-variant"]) ? "font-variant: " . $this->options["{$f}font-variant"] . ";" : false;
			$font[$f]['transform'] = !empty($this->options["{$f}text-transform"]) ? "text-transform: " . $this->options["{$f}text-transform"] . ";" : false;
			$font[$f]['align'] = !empty($this->options["{$f}text-align"]) ? "text-align: " . $this->options["{$f}text-align"] . ";" : false;
			$font[$f]['letter-spacing'] = !empty($this->options["{$f}letter-spacing"]) ? "letter-spacing: " . $thesis->api->css->number($this->options["{$f}letter-spacing"]) . ';' : false;
			$css .= "$selector { " . implode(' ', array_filter($font[$f])) . " }\n";
		}
		return trim($css.
			(!empty($this->colors['background-color']) ?
				"$s { background-color: " . $this->colors['background-color'] . "; }\n".
				"$s .page { padding-bottom: 36px; }\n" : '').
			"$s { color: " . $this->colors['color'] . "; }\n".
			"$s p { margin-bottom: " . $thesis->api->css->number($this->options['line-height']) . "; }\n".
			"$s .col { float: left; padding: 24px; position: relative; width: " . $thesis->api->css->number($this->options['col-width']) . "; -moz-box-shadow: 0 0 6px rgba(0, 0, 0, .1); -webkit-box-shadow: 0 0 6px rgba(0, 0, 0, .1); box-shadow: 0 0 6px rgba(0, 0, 0, .1); }\n".
			"$s .col-spacer { margin-top: 24px; }\n".
			"$s .col .text-area { margin: -24px -24px 48px; padding: 48px 24px 24px; position: relative; }\n".
			"$s .col .text-area:after { border-left: {$halfwidth}px solid transparent; border-right: {$halfwidth}px solid transparent; bottom: -24px; content: ''; height: 0; margin-left: -{$halfwidth}px; left: 50%; position: absolute; width: 0; }\n".
			"$s .col ul { list-style: none; margin: 0; }\n".
			"$s .col li { border-style: solid; border-width: 0 0 1px; margin-bottom: 12px; padding-bottom: 12px; }\n".
			"$s .col li:last-child { border-bottom: none; padding-bottom: 0; }\n".
			"$s .pricing-badge { font-style: italic; height: 50px; width: 50px; right: -10px; padding-top: 15px; position: absolute; top: -10px; z-index: 10; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; }\n");
	}
}