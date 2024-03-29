<?php

function thesis_post_image_info($type = 'image') {
	global $post, $thesis_design;

	$image_string = ($type == 'image') ? 'post_image' : 'thumb';
	$image_url = get_post_meta(get_the_id(), 'thesis_' . $image_string, true);
	
	$post_image['type'] = $type;

	if ($type == 'thumb' && $image_url != '') {
		$post_image['show'] = true;
		$post_image['url'] = $image_url;
		$post_image['resize'] = false;
	}
	elseif ($type == 'thumb') {
		$image_url = get_post_meta(get_the_id(), 'thesis_post_image', true);

		if ($image_url != '') {
			$post_image['show'] = true;
			$post_image['url'] = $image_url;
			$post_image['resize'] = true;
		}
		else
			$post_image['show'] = false;
	}
	elseif ($image_url != '') {
		$post_image['url'] = $image_url;
		$post_image['resize'] = false;
	}

	if ($type == 'image' && (isset($post_image['url']) && strlen($post_image['url']) !== 0)) {
		$post_image['show'] = ((is_single() && !$thesis_design->image['post']['single']) || (is_archive() && !$thesis_design->image['post']['archives'])) ? false : true;

		if ($post_image['show']) {
			$image_vertical_override = get_post_meta(get_the_id(), 'thesis_post_image_vertical', true);
			$post_image['y'] = ($image_vertical_override) ? $image_vertical_override : $thesis_design->image['post']['y'];
			$image_horizontal_override = get_post_meta(get_the_id(), 'thesis_post_image_horizontal', true);	
			$post_image['x'] = ($image_horizontal_override != '') ? $image_horizontal_override : $thesis_design->image['post']['x'];
			$frame_override = get_post_meta(get_the_id(), 'thesis_' . $image_string . '_frame', true);
			$post_image['frame'] = ($frame_override != '' && $frame_override != $thesis_design->image['post']['frame']) ? $frame_override : $thesis_design->image['post']['frame'];
		}
	}
	elseif ($type == 'thumb' && $post_image['url'] != '') {
		$thumb_vertical_override = get_post_meta(get_the_id(), 'thesis_thumb_vertical', true);
		$post_image['y'] = ($thumb_vertical_override) ? $thumb_vertical_override : $thesis_design->image['thumb']['y'];
		$image_horizontal_override = get_post_meta(get_the_id(), 'thesis_thumb_horizontal', true);
		$post_image['x'] = ($image_horizontal_override != '') ? $image_horizontal_override : $thesis_design->image['thumb']['x'];
		$frame_override = get_post_meta(get_the_id(), 'thesis_' . $image_string . '_frame', true);
		$post_image['frame'] = ($frame_override != '' && $frame_override != $thesis_design->image['thumb']['frame']) ? $frame_override : $thesis_design->image['thumb']['frame'];
	}
	else
		$post_image['show'] = false;

	if ($post_image['show'] && $post_image['url'] != '') {
		$upload_info = wp_upload_dir();
		if ($thesis_design->image['fopen'] && (! preg_match("/{$upload_info['basurl']}/i", $post_image['url'])))
			$image_path = $post_image['url'];
		else {
			$base = preg_quote($upload_info['baseurl'], '/');
			$path = preg_split("/$base/i", $post_image['url']);
			$image_path = $upload_info['basedir'] . $path[1];
			
//			$local_path = explode($_SERVER['SERVER_NAME'], $post_image['url']);
//			$image_path = $_SERVER['DOCUMENT_ROOT'] . $local_path[1];
		}

		$post_image['alt'] = get_post_meta(get_the_id(), 'thesis_' . $image_string . '_alt', true);
		
		if (@getimagesize($image_path)) {
				
			$image['class'] = thesis_get_image_classes($post_image);
			$image['attributes'] = thesis_image_attributes($post_image);

			if ($post_image['alt'] != '')
				$image['alt'] = $post_image['alt'];
			elseif ($type == 'thumb')
				$image['alt'] = 'Thumbnail image for ' . get_the_title();
			else
				$image['alt'] = 'Post image for ' . get_the_title();

			if (is_single() || is_page()) {
				$open_link = '';
				$close_link = '';
			}
			else {
				$open_link = '<a class="post_image_link" href="' . get_permalink() . '" title="Permanent link to ' . get_the_title() . '">';
				$close_link = '</a>';
			}

			$post_image['output'] = $open_link . '<img ' . $image['class'] . $image['attributes'] . ' alt="' . $image['alt'] . '" />' . $close_link . "\n";
		}
	}

	return $post_image;
}

function thesis_get_image_classes($post_image) {
	$classes['image'] = ($post_image['type'] == 'image') ? 'post_image' : 'thumb';

	if ($post_image['x'] == 'flush')
		$classes['position'] = 'alignnone';
	elseif ($post_image['x'] == 'left')
		$classes['position'] = 'alignleft';
	elseif ($post_image['x'] == 'right')
		$classes['position'] = 'alignright';
	elseif ($post_image['x'] == 'center')
		$classes['position'] = 'aligncenter';
		
	if ($post_image['y'] == 'after-headline')
		$classes['margin'] = 'remove_bottom_margin';
	
	if ($post_image['frame'] == 'on' || $post_image['frame'] == 1)
		$classes['frame'] = 'frame';
	
	if ($classes)
		return 'class="' . implode(' ', $classes) . '" ';
}

function thesis_image_attributes($post_image) {
	if ($post_image['url']) {
		global $thesis_design;
		
		$multisite = '';
		if (defined('MULTISITE') && MULTISITE) {
			global $blog_id;
			$multisite = '&amp;multisite=' . (int) $blog_id;
		}

		if ($post_image['type'] == 'thumb' && $post_image['resize']) {
			$dimensions = array(
				'width' => $thesis_design->image['thumb']['width'],
				'height' => $thesis_design->image['thumb']['height']
			);

			$width_override = get_post_meta(get_the_id(), 'thesis_thumb_width', true);
			$height_override = get_post_meta(get_the_id(), 'thesis_thumb_height', true);

			if ($width_override != '')
				$dimensions['width'] = $width_override;
			if ($height_override != '')
				$dimensions['height'] = $height_override;

			$image['width'] = $dimensions['width'];
			$image['height'] = $dimensions['height'];
			$image['url'] = THESIS_SCRIPTS_FOLDER . '/thumb.php?src=' . urlencode($post_image['url']) . '&amp;w=' . $image['width'] . '&amp;h=' . $image['height'] . '&amp;zc=1&amp;q=100' . $multisite;
		}
		else {
			$image['url'] = $post_image['url'];
			$image_path = explode($_SERVER['SERVER_NAME'], $image['url']);
			$image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path[1];
			$image_info = @getimagesize($image_path);

			// If we cannot get the image locally, try for an external URL
			if (!$image_info && $thesis_design->image['fopen'])
				$image_info = @getimagesize($image['url']);

			$image['width'] = $image_info[0];
			$image['height'] = $image_info[1];
		}

		return 'src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '"';
	}
}

function thesis_add_image_to_feed($content) {
	if (is_feed()) {
		$post_image = thesis_post_image_info('image');		
		return '<p>' . $post_image['output'] . '</p>' . $content;
	}
	else
		return $content;
}

function thesis_max_post_image_width($frame = false) {
	global $thesis_design;
	$thesis_css = new Thesis_CSS;
	$thesis_css->baselines();
	return ($frame) ? $thesis_design->layout['widths']['content'] - $thesis_css->line_heights['content'] : $thesis_design->layout['widths']['content'];
}