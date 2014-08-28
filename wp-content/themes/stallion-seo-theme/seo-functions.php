<?php
define('ICONPATH', '/wp-includes/images/rss.png');
function comments_rss_icon_link($alt_text = 'RSS Comments Feed') {
$url = get_post_comments_feed_link();
$feedurl = get_option('siteurl');
$link_img = ICONPATH;
echo "<a href=\"$url\">RSS Comments Feed</a>";
}
function wp_loginoutseo( $before = '', $after = '' ) {
if ( ! is_user_logged_in() )
$link = $before . '<form method="post" action="' . get_option('siteurl') . '/wp-login.php"><div><button class="loglinks">' . __('Login') . '</button></div></form>' . $after;
else
$link = $before . '<form method="post" action="' . get_option('siteurl') . '/wp-login.php?action=logout"><div><button class="loglinks">' . __('Logout') . '</button></div></form>' . $after;
echo apply_filters('loginout', $link);
}
function wp_registerseo( $before = '', $after = '' ) {
if ( ! is_user_logged_in() ) {
if ( get_option('users_can_register') )
$link = $before . '<form method="post" action="' . get_option('siteurl') . '/wp-login.php?action=register"><div><button class="loglinks">' . __('Register') . '</button></div></form>' . $after;
else
$link = '';
} else {
$link = $before . '<form method="post" action="' . get_option('siteurl') . '/wp-admin/"><div><button class="loglinks">' . __('Site Admin') . '</button></div></form>' . $after;
}
echo apply_filters('register', $link);
}
?>