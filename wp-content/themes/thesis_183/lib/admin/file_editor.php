<?php
/**
 * Outputs the Thesis Custom File Editor
 *
 * @package Thesis
 * @since 1.6
 */
class thesis_custom_editor {
	function get_custom_files() {
		$files = array();
		$directory = opendir(THESIS_CUSTOM); // Open the directory
		$exts = array('.php', '.css', '.js', '.txt', '.inc', '.htaccess', '.html', '.htm'); // What type of files do we want?

		while ($file = readdir($directory)) { // Read the files
			if ($file != '.' && $file != '..' && (strpos($file, 'layout') === false)) { // Only list files within the _current_ directory
				$extension = substr($file, strrpos($file, '.')); // Get the extension of the file

				if ($extension && in_array($extension, $exts)) // Verify extension of the file; we can't edit images!
					$files[] = $file; // Add the file to the array
			}
		}

		closedir($directory); // Close the directory
		return $files; // Return the array of editable files
	}

	function is_custom_writable($file, $files) {
		if (!in_array($file, $files))
			$error = "<p><strong>" . __('Attention!', 'thesis') . '</strong> ' . __('For security reasons, the file you are attempting to edit cannot be modified via this screen.', 'thesis') . '</p>';
		elseif (!file_exists(THESIS_CUSTOM)) // The custom/ directory does not exist
			$error = "<p><strong>" . __('Attention!', 'thesis') . '</strong> ' . __('Your <code>custom/</code> directory does not appear to exist. Have you remembered to rename <code>/custom-sample</code>?', 'thesis') . '</p>';
		elseif (!is_file(THESIS_CUSTOM . '/' . $file)) // The selected file does not exist
			$error = "<p><strong>" . __('Attention!', 'thesis') . '</strong> ' . __('The file you are attempting does not appear to exist.', 'thesis') . '</p>';
		elseif (!is_writable(THESIS_CUSTOM . '/custom.css')) // The selected file is not writable
			$error = "<p><strong>" . __('Attention!', 'thesis') . '</strong> ' . sprintf(__('Your <code>/custom/%s</code> file is not writable by the server, and in order to modify the file via the admin panel, Thesis needs to be able to write to this file. All you have to do is set this file&#8217;s permissions to 666, and you&#8217;ll be good to go.', 'thesis'), $file) . '</p>';

		if (! empty($error)) { // Return the error + markup, if required
			$error = "<div class=\"warning\">\n\t$error\n</div>\n";
			return $error;
		}

		return false;
	}

	function save_file() {
		global $thesis_site;
		if (!current_user_can('edit_theme_options'))
			wp_die(__('Easy there, homey. You don&#8217;t have admin privileges to access theme options.', 'thesis'));

		$custom_editor = new thesis_custom_editor;

		if (isset($_POST['custom_file_submit'])) {
			check_admin_referer('thesis-custom-file', '_wpnonce-thesis-custom-file');
			$contents = stripslashes($_POST['newcontent']); // Get new custom content
			$file = $_POST['file']; // Which file?
			$allowed_files = $custom_editor->get_custom_files(); // Get list of allowed files

			if (!in_array($file, $allowed_files)) // Is the file allowed? If not, get outta here!
				wp_die(__('You have attempted to modify an ineligible file. Only files within the Thesis <code>/custom</code> folder may be modified via this interface. Thank you.', 'thesis'));

			$file_open = fopen(THESIS_CUSTOM . '/' . $file, 'w+'); // Open the file

			if ($file_open !== false) // If possible, write new custom file
				fwrite($file_open, $contents);

			fclose($file_open); // Close the file
			$updated = '&updated=true'; // Display updated message
			if (! empty($thesis_site->custom{'design_mode'}) && ! (bool) $thesis_site->custom{'design_mode'})
				thesis_generate_css();
		}
		elseif (isset($_POST['custom_file_jump'])) {
			check_admin_referer('thesis-custom-file-jump', '_wpnonce-thesis-custom-file-jump');
			$file = $_POST['custom_files'];
			$updated = '';
		}

		wp_redirect(admin_url("admin.php?page=thesis-file-editor$updated&file=$file"));
		exit;
	}

	function options_page() {
		global $thesis_site;
		$custom_editor = new thesis_custom_editor;
?>

<div id="thesis_options" class="wrap<?php if (get_bloginfo('text_direction') == 'rtl') { echo ' rtl'; } ?>">
<?php
	thesis_version_indicator();
	thesis_options_title(__('Thesis Custom File Editor', 'thesis'), false);
	thesis_options_nav();
	thesis_options_status_check();
	
	if (version_compare($thesis_site->version, thesis_version()) < 0) {
?>
	<form id="upgrade_needed" action="<?php echo admin_url('admin-post.php?action=thesis_upgrade'); ?>" method="post">
		<h3><?php _e('Oooh, Exciting!', 'thesis'); ?></h3>
		<p><?php _e('It&#8217;s time to upgrade your Thesis, which means there&#8217;s new awesomeness in your immediate future. Click the button below to fast-track your way to the awesomeness!', 'thesis'); ?></p>
		<p><input type="submit" class="upgrade_button" id="teh_upgrade" name="upgrade" value="<?php _e('Upgrade Thesis', 'thesis'); ?>" /></p>
	</form>
<?php
	}
	elseif (file_exists(THESIS_CUSTOM)) {
		// Determine which file we're editing. Default to something harmless, like custom.css.
		$file = ! empty($_GET['file']) ? $_GET['file'] : 'custom.css';
		$files = $custom_editor->get_custom_files();
		$extension = substr($file, strrpos($file, '.'));

		// Determine if the custom file exists and is writable. Otherwise, this page is useless.
		$error = $custom_editor->is_custom_writable($file, $files);

		if ($error)
			echo $error;
		else {
			// Get contents of custom.css
			if (filesize(THESIS_CUSTOM . '/' . $file) > 0) {
				$content = fopen(THESIS_CUSTOM . '/' . $file, 'r');
				$content = fread($content, filesize(THESIS_CUSTOM . '/' . $file));
				$content = htmlspecialchars($content);
			}
			else
				$content = '';
		}
?>
	<div class="one_col">
		<form method="post" id="file-jump" name="file-jump" action="<?php echo admin_url('admin-post.php?action=thesis_file_editor'); ?>">
			<h3><?php printf(__('Currently editing: <code>%s</code>', 'thesis'), "custom/$file"); ?></h3>
			<p>
				<select id="custom_files" name="custom_files">
					<option value="<?php echo $file; ?>"><?php echo $file; ?></option>
<?php
		foreach ($files as $f) // An option for each available file
			if ($f != $file) echo "\t\t\t\t\t<option value=\"$f\">$f</option>\n";
?>
				</select>
				<?php wp_nonce_field('thesis-custom-file-jump', '_wpnonce-thesis-custom-file-jump'); ?>
				<input type="submit" id="custom_file_jump" name="custom_file_jump" value="<?php _e('Edit selected file', 'thesis'); ?>" />
			</p>
<?php
		if ($extension == '.php')
			echo "\t\t\t<p class=\"alert\">" . __('<strong>Note:</strong> If you make a mistake in your code while modifying a <acronym title="PHP: Hypertext Preprocessor">PHP</acronym> file, saving this page <em>may</em> result your site becoming temporarily unusable. Prior to editing such files, be sure to have access to the file via <acronym title="File Transfer Protocol">FTP</acronym> or other means so that you can correct the error.', 'thesis') . "</p>\n";
?>
		</form>
		<form class="file_editor" method="post" id="template" name="template" action="<?php echo admin_url('admin-post.php?action=thesis_file_editor'); ?>">
			<input type="hidden" id="file" name="file" value="<?php echo $file; ?>" />
			<p><textarea id="newcontent" name="newcontent" rows="25" cols="50" class="large-text"><?php echo $content; ?></textarea></p>
			<p>
				<?php wp_nonce_field('thesis-custom-file', '_wpnonce-thesis-custom-file'); ?>
				<input type="submit" class="save_button" id="custom_file_submit" name="custom_file_submit" value="<?php thesis_save_button_text(); ?>" />
				<input class="color" type="text" id="handy-color-picker" name="handy-color-picker" value="ffffff" maxlength="6" />
				<label class="inline" for="handy-color-picker"><?php _e('quick color reference', 'thesis'); ?></label>
			</p>
		</form>
	</div>
<?php
	}
	else
		echo "<div class=\"warning\">\n\t<p><strong>" . __('Attention!', 'thesis') . '</strong> ' . __('In order to edit your custom files, you&#8217;ll need to change the name of your <code>custom-sample</code> folder to <code>custom</code>.', 'thesis') . "</p>\n</div>\n";
?>
</div>
<?php
	}
}