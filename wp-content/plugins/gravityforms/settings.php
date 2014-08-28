<?php

class GFSettings{

    public static $addon_pages = array();

    public static function add_settings_page($name, $handler, $icon_path){
        add_action("gform_settings_" . str_replace(" " , "_", $name), $handler);
        self::$addon_pages[$name] = array("name" => $name, "icon" => $icon_path);
    }

    public static function settings_page() {

        $subview = self::get_subview();

        switch($subview) {
	        case 'settings':
	            self::gravityforms_settings_page();
	            break;
	        case 'uninstall':
	            self::settings_uninstall_page();
	            break;
	        default:
	        	self::page_header(__($subview, "gravityforms"), "");
	            do_action("gform_settings_" . str_replace(" ", "_", $subview));
	            self::page_footer();
        }
    }

    public static function settings_uninstall_page(){
    	self::page_header(__("Uninstall Gravity Forms", "gravityforms"), "");
    	if(isset($_POST["uninstall"])){

            if(!GFCommon::current_user_can_any("gravityforms_uninstall") || (function_exists("is_multisite") && is_multisite() && !is_super_admin()))
                die(__("You don't have adequate permission to uninstall Gravity Forms.", "gravityforms"));

            //dropping all tables
            RGFormsModel::drop_tables();

            //removing options
            delete_option("rg_form_version");
            delete_option("rg_gforms_key");
            delete_option("rg_gforms_disable_css");
            delete_option("rg_gforms_enable_html5");
            delete_option("rg_gforms_captcha_public_key");
            delete_option("rg_gforms_captcha_private_key");
            delete_option("rg_gforms_message");
            delete_option("gf_dismissed_upgrades");
            delete_option("rg_gforms_currency");

            //removing gravity forms upload folder
            GFCommon::delete_directory(RGFormsModel::get_upload_root());

            //Deactivating plugin
            $plugin = "gravityforms/gravityforms.php";
            deactivate_plugins($plugin);
            update_option('recently_activated', array($plugin => time()) + (array)get_option('recently_activated'));

            ?>
            <div class="updated fade" style="padding:20px;"><?php echo sprintf(__("Gravity Forms have been successfully uninstalled. It can be re-activated from the %splugins page%s.", "gravityforms"), "<a href='plugins.php'>","</a>")?></div>
            <?php
            return;
		}
    	?>

    <form action="" method="post">
            <?php if(GFCommon::current_user_can_any("gravityforms_uninstall") && (!function_exists("is_multisite") || !is_multisite() || is_super_admin())) { ?>
                <div class="delete-alert alert_red">

                    <h3 style="margin-top:1em;"><?php _e("Warning", "gravityforms"); ?></h3>
                    <p><?php _e("This operation deletes ALL Gravity Forms data. If you continue, You will not be able to retrieve or restore your forms or entries.", "gravityforms"); ?></p>

                    <?php
                    $uninstall_button = '<input type="submit" name="uninstall" value="' . __("Uninstall Gravity Forms", "gravityforms") . '" class="button" onclick="return confirm(\'' . __("Warning! ALL Gravity Forms data, including form entries will be deleted. This cannot be undone. \'OK\' to delete, \'Cancel\' to stop", "gravityforms") . '\');"/>';
                    echo apply_filters("gform_uninstall_button", $uninstall_button);
                    ?>

                </div>
            <?php } ?>
        </form>

		<?php
		self::page_footer();
	}

    public static function gravityforms_settings_page(){
        global $wpdb;

        if(!GFCommon::ensure_wp_version())
            return;

        if(isset($_GET["setup"])){
            //forcing setup
            RGForms::setup(true);
        }

        if(isset($_POST["submit"])){
            check_admin_referer('gforms_update_settings', 'gforms_update_settings');

            if(!GFCommon::current_user_can_any("gravityforms_edit_settings"))
                die(__("You don't have adequate permission to edit settings.", "gravityforms"));

            RGFormsModel::save_key($_POST["gforms_key"]);
            update_option("rg_gforms_disable_css", rgpost("gforms_disable_css"));
            update_option("rg_gforms_enable_html5", rgpost("gforms_enable_html5"));
            update_option("gform_enable_noconflict", rgpost("gform_enable_noconflict"));
            update_option("rg_gforms_enable_akismet", rgpost("gforms_enable_akismet"));
            update_option("rg_gforms_captcha_public_key", rgpost("gforms_captcha_public_key"));
            update_option("rg_gforms_captcha_private_key", rgpost("gforms_captcha_private_key"));

            if(!rgempty("gforms_currency"))
                update_option("rg_gforms_currency", rgpost("gforms_currency"));


            //Updating message because key could have been changed
            GFCommon::cache_remote_message();

            //Re-caching version info
            $version_info = GFCommon::get_version_info(false);
            ?>
            <div class="updated fade" style="padding:6px;">
                <?php _e("Settings Updated", "gravityforms"); ?>.
             </div>
             <?php
        }

        if(!isset($version_info))
            $version_info = GFCommon::get_version_info();
        self::page_header(__("General Settings", "gravityforms"), "");
        ?>
        <form method="post">
            <?php wp_nonce_field('gforms_update_settings', 'gforms_update_settings') ?>
            <h3><?php _e("General Settings", "gravityforms"); ?></h3>
            <table class="form-table">
              <tr valign="top">
                   <th scope="row"><label for="gforms_key"><?php _e("Support License Key", "gravityforms"); ?></label>  <?php gform_tooltip("settings_license_key") ?></th>
                    <td>
                        <?php
                        $key = GFCommon::get_key();
                        $key_field = '<input type="password" name="gforms_key" id="gforms_key" style="width:350px;" value="' . $key . '" />';
                        if($version_info["is_valid_key"])
                            $key_field .= "&nbsp;<img src='" . GFCommon::get_base_url() ."/images/tick.png' class='gf_keystatus_valid' alt='valid key' title='valid key'/>";
                        else if (!empty($key))
                            $key_field .= "&nbsp;<img src='" . GFCommon::get_base_url() ."/images/cross.png' class='gf_keystatus_invalid' alt='invalid key' title='invalid key'/>";

                        echo apply_filters('gform_settings_key_field', $key_field);
                        ?>
                        <br />
                        <?php _e("The license key is used for access to automatic upgrades and support.", "gravityforms"); ?>
                    </td>
                </tr>
               <tr valign="top">
                    <th scope="row"><label for="gforms_disable_css"><?php _e("Output CSS", "gravityforms"); ?></label>  <?php gform_tooltip("settings_output_css") ?></th>
                    <td>
                        <input type="radio" name="gforms_disable_css" value="0" id="gforms_css_output_enabled" <?php echo get_option('rg_gforms_disable_css') == 1 ? "" : "checked='checked'" ?> /> <?php _e("Yes", "gravityforms"); ?>&nbsp;&nbsp;
                        <input type="radio" name="gforms_disable_css" value="1" id="gforms_css_output_disabled" <?php echo get_option('rg_gforms_disable_css') == 1 ? "checked='checked'" : "" ?> /> <?php _e("No", "gravityforms"); ?><br />
                        <?php _e("Set this to No if you would like to disable the plugin from outputting the form CSS.", "gravityforms"); ?>
                    </td>
                </tr>
                <tr valign="top">
                     <th scope="row"><label for="gforms_enable_html5"><?php _e("Output HTML5", "gravityforms"); ?></label>  <?php gform_tooltip("settings_html5") ?></th>
                    <td>
                        <input type="radio" name="gforms_enable_html5" value="1" <?php echo get_option('rg_gforms_enable_html5') == 1 ? "checked='checked'" : "" ?> id="gforms_enable_html5"/> <?php _e("Yes", "gravityforms"); ?>&nbsp;&nbsp;
                        <input type="radio" name="gforms_enable_html5" value="0" <?php echo get_option('rg_gforms_enable_html5') == 1 ? "" : "checked='checked'" ?> /> <?php _e("No", "gravityforms"); ?><br />
                        <?php _e("Set this to No if you would like to disable the plugin from outputting HTML5 form fields.", "gravityforms"); ?>
                    </td>
                </tr>

                <tr valign="top">
                     <th scope="row"><label for="gform_enable_noconflict"><?php _e("No-Conflict Mode", "gravityforms"); ?></label>  <?php gform_tooltip("settings_noconflict") ?></th>
                    <td>
                        <input type="radio" name="gform_enable_noconflict" value="1" <?php echo get_option('gform_enable_noconflict') == 1 ? "checked='checked'" : "" ?> id="gform_enable_noconflict"/> <?php _e("On", "gravityforms"); ?>&nbsp;&nbsp;
                        <input type="radio" name="gform_enable_noconflict" value="0" <?php echo get_option('gform_enable_noconflict') == 1 ? "" : "checked='checked'" ?> id="gform_disable_noconflict"/> <?php _e("Off", "gravityforms"); ?><br />
                        <?php _e("Set this to On to prevent extraneous scripts and styles from being printed on Gravity Forms admin pages, reducing conflicts with other plugins and themes.", "gravityforms"); ?>
                    </td>
                </tr>

                <?php if(GFCommon::has_akismet()){ ?>
                <tr valign="top">
                     <th scope="row"><label for="gforms_enable_akismet"><?php _e("Akismet Integration", "gravityforms"); ?></label>  <?php gform_tooltip("settings_akismet") ?></th>
                    <td>
                        <input type="radio" name="gforms_enable_akismet" value="1" <?php echo get_option('rg_gforms_enable_akismet') == 1 ? "checked='checked'" : "" ?> id="gforms_enable_akismet"/> <?php _e("Yes", "gravityforms"); ?>&nbsp;&nbsp;
                        <input type="radio" name="gforms_enable_akismet" value="0" <?php echo get_option('rg_gforms_enable_akismet') == 1 ? "" : "checked='checked'" ?> /> <?php _e("No", "gravityforms"); ?><br />
                        <?php _e("Protect your form entries from spam using Akismet.", "gravityforms"); ?>
                    </td>
                </tr>
                <?php } ?>

                <tr valign="top">
                    <th scope="row"><label for="gforms_currency"><?php _e("Currency", "gravityforms"); ?></label>  <?php gform_tooltip("settings_currency") ?></th>
                    <td>
                        <?php
                        $disabled = apply_filters("gform_currency_disabled", false) ? "disabled='disabled'" : ""
                        ?>

                        <select id="gforms_currency" name="gforms_currency" <?php echo $disabled ?>>
                            <?php
                                require_once("currency.php");
                                $current_currency = GFCommon::get_currency();

                                foreach(RGCurrency::get_currencies() as $code => $currency){
                                    ?>
                                    <option value="<?php echo $code ?>" <?php echo $current_currency == $code ? "selected='selected'" : "" ?>><?php echo $currency["name"]?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <?php do_action("gform_currency_setting_message", ""); ?>
                    </td>
                </tr>
            </table>

            <div class="hr-divider"></div>

              <h3><?php _e("reCAPTCHA Settings", "gravityforms"); ?></h3>

              <p style="text-align: left;"><?php _e("Gravity Forms integrates with reCAPTCHA, a free CAPTCHA service that helps to digitize books while protecting your forms from spam bots. ", "gravityforms"); ?><a href="http://www.google.com/recaptcha/" target="_blank"><?php _e("Read more about reCAPTCHA", "gravityforms"); ?></a>.</p>

              <table class="form-table">


                <tr valign="top">
                   <th scope="row"><label for="gforms_captcha_public_key"><?php _e("reCAPTCHA Public Key", "gravityforms"); ?></label>  <?php gform_tooltip("settings_recaptcha_public") ?></th>
                    <td>
                        <input type="text" name="gforms_captcha_public_key" style="width:350px;" value="<?php echo get_option("rg_gforms_captcha_public_key") ?>" /><br />
                        <?php _e("Required only if you decide to use the reCAPTCHA field.", "gravityforms"); ?> <?php printf(__("%sSign up%s for a free account to get the key.", "gravityforms"), '<a target="_blank" href="http://www.google.com/recaptcha/whyrecaptcha">', '</a>'); ?>
                    </td>
                </tr>
                <tr valign="top">
                   <th scope="row"><label for="gforms_captcha_private_key"><?php _e("reCAPTCHA Private Key", "gravityforms"); ?></label>  <?php gform_tooltip("settings_recaptcha_private") ?></th>
                    <td>
                        <input type="text" name="gforms_captcha_private_key" style="width:350px;" value="<?php echo esc_attr(get_option("rg_gforms_captcha_private_key")) ?>" /><br />
                        <?php _e("Required only if you decide to use the reCAPTCHA field.", "gravityforms"); ?> <?php printf(__("%sSign up%s for a free account to get the key.", "gravityforms"), '<a target="_blank" href="http://www.google.com/recaptcha/whyrecaptcha">', '</a>'); ?>
                    </td>
                </tr>

              </table>

           <?php if(GFCommon::current_user_can_any("gravityforms_edit_settings")){ ?>
                <br/><br/>
                <p class="submit" style="text-align: left;">
                <?php
                $save_button = '<input type="submit" name="submit" value="' . __("Save Settings", "gravityforms"). '" class="button-primary gf_settings_savebutton"/>';
                echo apply_filters("gform_settings_save_button", $save_button);
                ?>
                </p>
           <?php } ?>
        </form>

              <div id='gform_upgrade_license' style="display:none;"></div>
              <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery.post(ajaxurl,{
                            action:"gf_upgrade_license",
                            gf_upgrade_license: "<?php echo wp_create_nonce("gf_upgrade_license") ?>"},

                            function(data){
                                if(data.trim().length > 0)
                                    jQuery("#gform_upgrade_license").replaceWith(data);
                            }
                    );
                });
              </script>

              <div class="hr-divider"></div>

              <h3><?php _e("Installation Status", "gravityforms"); ?></h3>
              <table class="form-table">

                <tr valign="top">
                   <th scope="row"><label><?php _e("PHP Version", "gravityforms"); ?></label></th>
                    <td class="installation_item_cell">
                        <strong><?php echo phpversion(); ?></strong>
                    </td>
                    <td>
                        <?php
                            if(version_compare(phpversion(), '5.0.0', '>')){
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/tick.png"/>
                                <?php
                            }
                            else{
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/cross.png"/>
                                <span class="installation_item_message"><?php _e("Gravity Forms requires PHP 5 or above.", "gravityforms"); ?></span>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr valign="top">
                   <th scope="row"><label><?php _e("MySQL Version", "gravityforms"); ?></label></th>
                    <td class="installation_item_cell">
                        <strong><?php echo $wpdb->db_version();?></strong>
                    </td>
                    <td>
                        <?php
                            if(version_compare($wpdb->db_version(), '5.0.0', '>')){
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/tick.png"/>
                                <?php
                            }
                            else{
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/cross.png"/>
                                <span class="installation_item_message"><?php _e("Gravity Forms requires MySQL 5 or above.", "gravityforms"); ?></span>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr valign="top">
                   <th scope="row"><label><?php _e("WordPress Version", "gravityforms"); ?></label></th>
                    <td class="installation_item_cell">
                        <strong><?php echo get_bloginfo("version"); ?></strong>
                    </td>
                    <td>
                        <?php
                            if(version_compare(get_bloginfo("version"), '3.0', '>')){
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/tick.png"/>
                                <?php
                            }
                            else{
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/cross.png"/>
                                <span class="installation_item_message"><?php printf(__("Gravity Forms requires WordPress v%s or greater. You must upgrade WordPress in order to use this version of Gravity Forms.", "gravityforms"), GF_MIN_WP_VERSION); ?></span>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                 <tr valign="top">
                   <th scope="row"><label><?php _e("Gravity Forms Version", "gravityforms"); ?></label></th>
                    <td class="installation_item_cell">
                        <strong><?php echo GFCommon::$version ?></strong>
                    </td>
                    <td>
                        <?php
                            if(version_compare(GFCommon::$version, $version_info["version"], '>=')){
                                ?>
                                <img src="<?php echo GFCommon::get_base_url() ?>/images/tick.png"/>
                                <?php
                            }
                            else{
                                echo sprintf(__("New version %s available. Automatic upgrade available on the %splugins page%s", "gravityforms"), $version_info["version"], '<a href="plugins.php">', '</a>');
                            }
                        ?>
                    </td>
                </tr>
            </table>
        <?php
        self::page_footer();
    }

    public static function upgrade_license(){
        //check_ajax_referer('gf_upgrade_license','gf_upgrade_license');

        $key = GFCommon::get_key();
        $body = "key=$key";
        $options = array('method' => 'POST', 'timeout' => 3, 'body' => $body);
        $options['headers'] = array(
            'Content-Type' => 'application/x-www-form-urlencoded; charset=' . get_option('blog_charset'),
            'Content-Length' => strlen($body),
            'User-Agent' => 'WordPress/' . get_bloginfo("version"),
            'Referer' => get_bloginfo("url")
        );

        $request_url = GRAVITY_MANAGER_URL . "/api.php?op=upgrade_message&key=" . GFCommon::get_key();
        $raw_response = wp_remote_request($request_url, $options);

        if ( is_wp_error( $raw_response ) || 200 != $raw_response['response']['code'] )
            $message = "";
        else
            $message = $raw_response['body'];

        //validating that message is a valid Gravity Form message. If message is invalid, don't display anything
        if(substr($message, 0, 10) != "<!--GFM-->")
            $message = "";

        echo $message;

        exit;
    }

    public static function page_header($title = '', $message = ''){

        // register admin styles
        wp_register_style('gform_admin', GFCommon::get_base_url() . '/css/admin.css');
        wp_print_styles(array('jquery-ui-styles', 'gform_admin'));

        $current_tab = self::get_subview();

        //build left side options, always have GF Settings first and Uninstall last, put add-ons in the middle
        $setting_tabs = array("10" => array("name" => "settings", "label" => __("Settings", "gravityforms")));
        $start_add_on_location = 11;
        $i = 0;
        if(!empty(self::$addon_pages)){
			$sorted_addons = self::$addon_pages;
			asort($sorted_addons);
			//add add-ons to menu
			$count = sizeof($sorted_addons);
            for($i = 0; $i<$count; $i++){
                $addon_keys = array_keys($sorted_addons);
                $addon = $addon_keys[$i];
                $setting_tabs[$start_add_on_location + $i] = array("name" => urlencode($addon) , "label" => __(esc_html($addon), "gravityforms"));
            }

		}
      	$setting_tabs[$start_add_on_location + $i] = array("name" => "uninstall" , "label" => __("Uninstall", "gravityforms"));

        $setting_tabs = apply_filters("gform_settings_menu", $setting_tabs);
        ksort($setting_tabs, SORT_NUMERIC);

        // kind of boring having to pass the title, optionally get it from the settings tab
        if(!$title) {
            foreach($setting_tabs as $tab) {
                if($tab['name'] == $current_tab)
                    $title = $tab['name'];
            }
        }

        ?>

        <style type="text/css">
        /* temporary styles */

        #form_settings { margin-top: 0; }

        .gform_tab_group { background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); margin-top: 10px; }
        .gform_tabs { width: 150px; float: left; }
        .gform_tab_container { margin-left: 150px; background-color: #fff; padding: 20px; border-left: 1px solid #ccc; }

        .gform_tabs { margin-top: 10px; }
        .gform_tabs a { border: 1px solid #f1f1f1; padding: 6px 10px; text-decoration: none; display: block; }
        .gform_tabs li.active a { background-color: #fff; border: 1px solid #ccc; border-right-color: #fff;
            line-height: 18px; margin: 0 -1px 0 -4px; }

        .gform_tab_content { overflow: hidden; }
        .gform_tab_content h3 { font-size: 1.6em; margin-top: 2px; }

        </style>

        <div class="wrap">

            <?php if($message){ ?>
                <div id="message" class="updated"><p><?php echo $message; ?></p></div>
            <?php } ?>

            <div class="icon32" style="background: url(<?php echo GFCommon::get_base_url()?>/images/gravity-edit-icon-32.png) no-repeat 3px 2px;"></div>
            <h2><?php echo $title ?></h2>

            <div id="gform_tab_group" class="gform_tab_group vertical_tabs">
                <ul id="gform_tabs" class="gform_tabs">
                    <?php
                    foreach($setting_tabs as $tab){
                        ?>
                        <li <?php echo urlencode($current_tab) == $tab["name"] ? "class='active'" : ""?>>
                            <a href="<?php echo add_query_arg(array("subview" => $tab["name"])); ?>"><?php echo $tab["label"] ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

                <div id="gform_tab_container" class="gform_tab_container">
                    <div class="gform_tab_content" id="tab_<?php echo $current_tab ?>">

        <?php
    }

    public static function page_footer(){
        ?>
                    </div> <!-- / gform_tab_content -->
                </div> <!-- / gform_tab_container -->
            </div> <!-- / gform_tab_group -->

            <br class="clear" style="clear: both;" />

        </div> <!-- / wrap -->

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#gform_tab_container').css( 'minHeight', jQuery('#gform_tabs').height() + 100 );
            });
        </script>

        <?php
    }

    public static function get_subview() {

        // default to subview, if no subview provided support
        $subview = rgget( 'subview' ) ? rgget( 'subview' ) : rgget( 'addon' );

        if( !$subview )
            $subview = 'settings';

        return $subview;
    }
}

?>