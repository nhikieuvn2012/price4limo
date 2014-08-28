<?php
/*
Plugin Name: Stallion Stop Stupid SPAMBOTS
Plugin URI: http://www.stallion-theme.com/
Description: Stallion Stop Stupid SPAMBOTS stops SPAMBOTS that don't use a HTTP_REFERER. Not so stupid SPAMBOTS will include a fake HTTP_REFERER value and won't be stopped by this plugin. Use in conjunction with plugins like Akismet to reduce the number of SPAM comments.
Version: 1
Author: David Law
Author URI: Stallion Stop Stupid SPAMBOTS
*/
function CHECK_HTTP_REFERER() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
        wp_die( __('If you are a real person please enable HTTP Referrer in your browser, on the other hand if you are a comment spambot please take a long walk off a short pier!') );
    }
}
add_action('check_comment_flood', 'CHECK_HTTP_REFERER');
?>