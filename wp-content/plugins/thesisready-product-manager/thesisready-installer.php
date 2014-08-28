<?php 

/**
 * @package ThesisReady Product Installer
 */
/*
Plugin Name: ThesisReady Installer
Plugin URI: http://thesisready.com/
Description: One touch installation and management of ThesisReady products.
Version: 1.0
Author: ThesisReady
Author URI: http://thesisready.com
*/


// BEGIN GLOBALS
define('THESISREADY_INSTALLER_VERSION', '1.0');
define('THESISREADY_INSTALLER_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('RELATIVE_THEME_DIRECTORY_PATH','../wp-content/themes/');

// error messages
define('ERROR_THEME_DIRECTORY_ALREADY_EXISTS','Error - The theme directory already exists. We did not do anything so as not to overwrite your current theme. <a href="' . $_SERVER["REQUEST_URI"] . '">Return</a>');
define('ERROR_COULD_NOT_CLOSE_WRITTEN_ZIP_FILE','Error - Could not close written zip file.');
define('ERROR_ZERO_BYTES_WRITTEN','Error - Zero Bytes Written');
define('ERROR_UNZIP','Error - Could not unzip');
define('ERROR_REMOVE_TEMP_FILE','Error - Could not remove temp file.');
define('ERROR_COULD_NOT_GET_FILE_FROM_SERVER','Error - Could not get file from server.');
define('ERROR_REMOVE_OSX_FOLDER','Error - There was a problem removing a directory.');


// success messages
define('GET_THEME_AND_SAVE_SUCCESS','Success! Your theme has been successfully installed! <a href="' . $_SERVER["REQUEST_URI"] . '">Return</a>');
// END GLOBALS

// BEGIN ADD ACTIONS
add_action('wp_dashboard_setup', 'tr_installer_add_dashboard' );
add_action('admin_menu', 'tr_installer_options');
// END ADD ACTIONS

// Build Dashboard Widget	
	function tr_installer_add_dashboard() { }   	
// Add Widget to Dashboard	
	function tr_installer_dashboard() { }
	
	function tr_installer_options() { 
		add_options_page('ThesisReady Installer', 'ThesisReady Installer', 8, 'thesisready_installer_admin', 'thesisready_installer_admin'); 
	} 
	
	
/**
 * connectToApi
 *
 * This function will take the username, email, and password
 * and return the results from the API call
 *
 * @author gavreh
 */
function connectToApi($username, $email, $password) {
		$Submit = '';
		$fields = array(
            'username'=>urlencode($username),
            'email'=>urlencode($email),
			      'password'=>urlencode($password),
			      'Submit'=>urlencode($Submit)
        );
    $apiUrl = 'http://api.thesisready.com/index.php?username='.$fields['username'].'&email='.$fields['email'].'&password='.$fields['password'];

		
		//open connection
		$ch = curl_init();		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $apiUrl);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$response = curl_exec($curl);
		$status = curl_getinfo($curl);
		curl_close($curl);
		
		// Debug show API url
		//echo $apiUrl;

		
		if (parseApiLoginSuccess($response) == true) {
	        // Store the data in the WP Directory
	        add_option('pip_username',$username);
	        add_option('pip_email',$email);
	        add_option('pip_password',$password);
		}
		return $response;
}


/**
 * parseApiResults
 *
 * Parses and echos the results from the API
 *
 * @author abarber, gavreh
 */
 
function thesisready_table_class($i) {
	switch ($i) {
		case 1; $class_name = 'top left'; break;
		case 2; $class_name = 'top';break;
		case 3; $class_name = 'top right';break;
		
		case 4; $class_name = 'left';   break;
		case 5; $class_name = 'middle'; break;
		case 6; $class_name = 'right';  break;

		case 7; $class_name = 'left';   break;
		case 8; $class_name = 'middle'; break;
		case 9; $class_name = 'right';  break;
		
		case 10; $class_name = 'bottom left';break;
		case 11; $class_name = 'bottom';break;
		case 12; $class_name = 'bottom right';break;
	}
	echo $class_name;	
}

function thesisready_table_row($position, $i) {
	if($position === 'before') {
		switch ($i) {
			case 1; $tablerow =  '<tr>'; break; 
			case 4; $tablerow =  '<tr>'; break; 
			case 7; $tablerow =  '<tr>'; break; 
			case 10; $tablerow =  '<tr>'; break; 								
		} 
	}
	if($position === 'after') {
		switch ($i) {
			case 3; $tablerow = '</tr>'; break;
			case 6; $tablerow = '</tr>'; break;
			case 9; $tablerow = '</tr>'; break;		
			case 12; $tablerow = '</tr>'; break;											
		} 
	}	
	echo $tablerow;
}

function parseApiResultsUserInfo($response) {

	$resultsArray = json_decode($response, true);
	 ?>
		<h3>Account Information</h3> 
		<ul>
			<li><strong>Your Name: </strong><?= $resultsArray['userInfo']['userNameF'] ?> <?= $resultsArray['userInfo']['userNameL'] ?></li>
			<li><strong>Your Account Name: </strong><?= $resultsArray['userInfo']['userNameLogin'] ?></li>
			<li><strong>Your Join Date: </strong><?= $resultsArray['userInfo']['userNameDate'] ?></li>
		</ul>
<?php  }

function parseApiResultsProducts($response) {

	$resultsArray = json_decode($response, true);
		
	$last = count($resultsArray['userProducts']) - 1;
	$num = 0;
	foreach ($resultsArray['userProducts'] as $i => $product) {
	
	// Check by price group to make sure the products listed are Thesis Skins
	// Price Group 100 = Premium Thesis Skins
	// Price Group 2 = Free Thesis Skins
	// Price Group 300 = WordPress Plugins
	
	if ((($product['productPriceGroup'] === '100') || ($product['productPriceGroup'] === '2')) && (isset($product['productSlug']))) {
	$num++;
	thesisready_table_row('before', $num);
	
	?> 
		<td class="thesisready_product available-theme <?php echo thesisready_table_class($num); ?>" >
			<a href="<?= $product['productUrl'] ?>">
				<img src="<?= $product['productImage'] ?>" alt="<?= $product['productName'] ?>" width="240" height="180" />
			</a>
			<h3><?= $product['productName'] ?> by <a href="http://thesisready.com">ThesisReady.com</a></h3>
			<p class="description">
			<?= $product['productDesc']; ?>
			</p>
			<span class="action-links">
				<?php 
					printDownloadButton($product['productUrl'],$product['productName'],$product['productSlug'] );
				?>
			</span>
		</td>
	<?php 
	thesisready_table_row('after', $num);
	}
	
	}

}

function parseApiLoginSuccess($response) {
	$resultsArray = json_decode($response, true);	
	if ($resultsArray['userInfo']['userNameLogin'] == null) {
		return false;
	}
	else {
		return true;
	}
}

/**
 * printHead
 *
 * @author gavreh
 */
function printHead($message) {
	echo '<div class="wrap">';
	echo '<h2>Install ThesisReady Products</h2>';
	echo $message . ' Here are the thesis skins you have purchased:';
	echo '<table id="availablethemes" cellspacing="0" cellpadding="0">';
	echo '<tbody id="the-list" class="list:themes">';

}

/**
 * printFailureHead
 *
 * @author gavreh
 */
function printFailureHead() {
	echo '<div class="wrap">';
	echo '<h2>Login Failure</h2>';
	echo '<table id="availablethemes" cellspacing="0" cellpadding="0">';
	echo '<tbody id="the-list" class="list:themes">';

}

/**
 * printFooter
 *
 * @author gavreh
 */
function printFooter() {

	echo '</tbody></table>';
	printLogoutButton();
	echo '</div>';
}

function printLogoutButton() {
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="pip_logout_form">
	<button type="submit" name="pip_logout" value="1">Logout</button>
</form>
<?php
}

function printDownloadButton($url, $name, $foldername) {
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="pip_download_form">
	<input type="hidden" name="downloadurl" value="<?php echo $url; ?>" />
	<input type="hidden" name="themefoldername" value="<?php echo $foldername; ?>" />
	<button type="submit" name="pip_download" value="1">Download <?php echo $name; ?></button>
</form>
<?php
}

/**
 * thesisready_installer_admin
 *
 * This function displays the admin page, the main part of the plugin.
 * First the user must login. We store these credentials in the WP Database.
 *
 * @return void
 * @author abarber, grehkemper
 */
function thesisready_installer_admin() { 
	
	if(isset($_POST['pip_download'])) {
		echo GetThemeFromUrlAndSaveToDirectory($_POST['downloadurl'], $_POST['themefoldername']); // echo the error or success
		return;
	}
	
	if(isset($_POST['pip_logout'])) {
		$username = delete_option('pip_username');
		$email = delete_option('pip_email');
		$password = delete_option('pip_password');
	}
	
	
	if (get_option('pip_username')) {
		// Logged in!
		$username = get_option('pip_username');
		$email = get_option('pip_email');
		$password = get_option('pip_password');
		$result = connectToApi($username, $email, $password);
		
		printHead('');
		parseApiResultsProducts($result); // echos the results
		printFooter();
	}
	else { // not logged in
	
		// The form as posted.
		// Log in and display a message.
		if (isset($_POST['pip_form_update'])) {
			extract($_POST);
	
			$result = connectToApi($username, $email, $password);
			
			if(parseApiLoginSuccess($result) == true) {
				
				printHead('You have successfully logged in.');
				parseApiResultsProducts($result); // echos the results
				printFooter();
			}
			else {
				// login failure.
				printFailureHead();
				echo 'Those were not the valid login credentials. Please try to <a href="' . $_SERVER['REQUEST_URI'] . '">login again</a> or vist <a href="http://thesisready.com/support">ThesisReady.com<a/>';
				printFooter();
			}
			
		} else {
			// else write out the form.
			?> 
				<div class="wrap">
				<h2>Login to Your ThesisReady Account</h2>
					<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="thesis_installer_form">
					<input type="hidden" name="pip_form_update" value="1" />
						<ul>
							<li>
								<label for="username">User Name</label>
								<input type="text" name="username" />
							</li>
							
							<li>
								<label for="email">Email Address</label>				
								<input type="text" name="email" />
							</li>
							
							<li>
								<label for="password">Password</label>				
								<input type="password" name="password" />
							</li>
							
							<li>
								<button type="submit" name="Submit">Authorize Account</button>
								
							</li>
						</ul>
					</form>
				</div>	
	<?php }
	}
}

/**
 * makeDirectory
 *
 * Create a directory
 *
 * @author gavreh
 */
function makeDirectory($dir) {
	if(is_dir($dir)) {
		return;
	}
	if (!mkdir($dir)) {
    	die('Failed to create folders...');
	}
}
	
/**
 * GetThemeFromUrlAndSaveToDirectory
 *
 * @author gavreh
 */
function GetThemeFromUrlAndSaveToDirectory($url, $themeDirName) {
	
	// if directory does not exist TODO
	if (is_dir(RELATIVE_THEME_DIRECTORY_PATH . $themeDirName)) {
		// The directory exists already! Do not proceed - dispaly an error.
		return ERROR_THEME_DIRECTORY_ALREADY_EXISTS;
	}
	
	if ($fp = fopen($url, 'r')) { // Get the file for reading
		$content = '';
		
		// Read the file in 1024 byte chunks until we're done
		
		while ($line = fread($fp, 1024)) {
			$content .= $line;
			// Do whatever we want to do with the download meter here.
		}
		fclose($fp);
		
		
		// Save $content to a local file:
		$fileName = 'temp.zip';
		$fd = fopen(RELATIVE_THEME_DIRECTORY_PATH . '/' . $fileName, 'w'); // open the local zip file for writing
		$numBytesWritten = fwrite($fd, $content); // write the data we just got.
		if (!fclose($fd)) {return ERROR_COULD_NOT_CLOSE_WRITTEN_ZIP_FILE;}
		if ($numBytesWritten == 0) {return ERROR_ZERO_BYTES_WRITTEN;}
		
		// unzip file
		if (!unzipFile(RELATIVE_THEME_DIRECTORY_PATH, $fileName)) {return ERROR_UNZIP;}
		
		// remove temp file
		if (!removeTempFile(RELATIVE_THEME_DIRECTORY_PATH, $fileName)) {return ERROR_REMOVE_TEMP_FILE;};
		
		if (!removeOsxFolder(RELATIVE_THEME_DIRECTORY_PATH, $themeDirName)) {return ERROR_REMOVE_OSX_FOLDER;};
		
		return GET_THEME_AND_SAVE_SUCCESS;
	
	} else {
		// Error!
		return ERROR_COULD_NOT_GET_FILE_FROM_SERVER;
	}

}

/**
 * removeTempFile($directory, $filename) 
 *
 * @author gavreh
 */
function removeTempFile($directory, $filename) {
	$fullpath = $directory . $filename;
	if (file_exists($fullpath)) {
		return unlink($fullpath);
	}
	else {
		return false;
	}
	
}

/**
 * removeOsxFolder
 *
 * @param string $directory 
 * @param string $filename 
 * @return true or false
 * @author gavreh
 */
function removeOsxFolder($directory, $themeDirName) {
	if (is_dir($directory . '__MACOSX')) {
		return rmdirr($directory . '__MACOSX');
	} else {
		// the MACOSX folder does not exist
		// but that doesn't necessiarily mean 
		// there's an error.
		return true;
	}
}

/**
 * rmdirr
 *
 * @param string $dirname 
 * @return true or false
 * @author gavreh
 */
function rmdirr($dirname)
{
	
    if (!file_exists($dirname)) {
        return false;
    }
 
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        
        rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
    }
 
    // Clean up
    $dir->close();
    return rmdir($dirname);
}

/**
 * unzipFile
 *
 * Returns true on success, false on fail
 *
 * @author gavreh
 */
function unzipFile($directory, $filename) {
	if (class_exists('ZipArchive')) {
		$zip = new ZipArchive;
		if ($zip->open($directory . $filename) === TRUE) {
		    $zip->extractTo($directory);
		    $zip->close();
		    return true;
		} else {
		    return false;
		}
	}
	else {
		// run it using PCLZip
		unzipFilePcl($directory, $filename);
		return true;
	}
}

/**
 * unzipFilePcl
 *
 * @param string $directory 
 * @param string $filename 
 * @return void
 * @author gavreh
 */
function unzipFilePcl($directory, $filename) {
	require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
	$archive = new PclZip($directory . $filename);
	$result = $archive->extract(PCLZIP_OPT_PATH, $directory);
	if ($result == 0) {
		die("Error : ".$archive->errorInfo(true));
	}
	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';
	
}


?>