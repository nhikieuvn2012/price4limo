<?php

/*
*	There are a number of things that we had to do for MS support. One of which is make custom folders for each install that runs Thesis.
*
*	Another thing we had to do was alter the version of timthumb we ship. Before you cry about timthumb, our version does NOT, I repeat NOT,
*	contain the security flaws that have been so popluar. So chill out and have a beer.
*
*	If you need assistance with multisite, please contact mattonomics@gmail.com. Be ready to provide your DIYthemes forum login details or you
*	won't be helped. Gotta keep it legit ;)
*
*	- Matt G
*/

function thesis_multisite_structure() {
	include_once(ABSPATH . 'wp-admin/includes/file.php');
	WP_Filesystem(); // sets up the $wp_filesystem global. no args should set it up for direct method
	global $wp_filesystem, $blog_id;
	
	$structure = array( // the structure of any given custom folder
		'dir' => array(
			'cache', 'images', 'rotator' // note that I'm not gonna move the original images from /custom
		),
		'file' => array(
			'custom.css', 'custom_functions.php', 'layout.css'
		)
	);
	$errors = array();
	
	if ($blog_id >= 1 && $wp_filesystem->is_writable(TEMPLATEPATH)) { // not sure why blog_id would be <= 0, but may as well check
		$custom = TEMPLATEPATH . '/custom' . thesis_multisite_support();
		if (! $wp_filesystem->exists($custom)) { // check to see if the folder exists already
			if ($wp_filesystem->mkdir($custom)) { // makes the site specific custom folder, 755
				foreach ($structure['dir'] as $directory) {
					if (! $wp_filesystem->mkdir($custom . "/$directory")) // make the directories, 755
						$errors['mkdir'][] = $directory;
				}
				foreach ($structure['file'] as $file) {
					$mode = $file == 'layout.css' ? 0666 : false;
					if (! $wp_filesystem->put_contents($custom . "/$file", "", $mode)) // make the files
						$errors['fopen'][] = $file;
				}
			}
		}
	}
	if (! empty($errors))
		return $errors;
}
