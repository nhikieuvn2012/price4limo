<?php
function st_adtheme_admin_css() {
echo "<link rel='stylesheet' type='text/css' href='".get_stylesheet_directory_uri() . "/ad_includes/admin-style.css' />\n";
}
add_action('admin_head', 'st_adtheme_admin_css');

function st_adtheme_init() {
if (get_option('st_adtheme_count') === false) {
update_option('st_adtheme_count', 6);
update_option('st_adtheme_px', 125);
update_option('st_adtheme_px2', 125);
}
}
add_action('init', 'st_adtheme_init');

function st_adtheme_sidebar_ads() {
$sidebarAds = st_adtheme_pick_ads("sidebar", (int)get_option('st_adtheme_count'));
echo "\n";
foreach($sidebarAds as $ad) st_adtheme_output_ad($ad, "<div class=\"ad125px\">", "</div>\n");
echo "<div class=\"clear\"></div>\n\n";
}

function st_adtheme_output_ad($data, $before='', $after='') {
if (is_array($data)) {
$image = htmlentities($data['image'], ENT_QUOTES);
$url   = htmlentities($data['url'], ENT_QUOTES);
$title = htmlentities($data['title'], ENT_QUOTES);
$cloak = htmlentities($data['cloak'], ENT_QUOTES);
$stadpx = get_option('st_adtheme_px');
$stadpx2 = get_option('st_adtheme_px2');
if (!$image) $image = get_bloginfo('template_directory')."/images/125x125.jpg";

$format = '<img src="%2$s" alt="%3$s" width="'.$stadpx.'" height="'.$stadpx2.'" />';

if ($cloak=='y' && $url) $format = '<span class="affst" title="tests" id="%1$s">'.$format.'</span>';
if ($cloak!='y' && $url) $format = '<a href="%1$s" title="%3$s">'.$format.'</a>';

printf($before.$format.$after, $url, $image, $title);
}
}

function st_adtheme_add_settings_pages() {
add_submenu_page( 'ttk_functions.php', 'Stallion 125px by 125px Ads Settings', '125px Ad Settings', 8, 'ttk_125px-ads', 'st_adtheme_ad_settings_page' );
add_action( "admin_print_scripts-$ads", "st_adtheme_admin_css_link" );
}
add_action('admin_menu', 'st_adtheme_add_settings_pages');

function st_adtheme_admin_css_link() {
$url = trailingslashit(get_bloginfo('template_url')).basename(__FILE__).'?css=admin';
echo "<link rel='stylesheet' href='$url' type='text/css' />";
}

function st_adtheme_str_starts_with($string, $start) {
return ( strcmp( substr($string, 0, strlen($start)), $start ) === 0 );
}

function st_adtheme_pick_ads($section, $count) {
$allAds = st_adtheme_get_ads($section);

if (!$allAds || $count == 0 || count($allAds) === 0) {
return array();
} elseif (count($allAds) === 1) {
return array_values($allAds);
} else {
if ($count > count($allAds)) $count = count($allAds);
$returnedKeys = array_rand($allAds, $count);
if (is_array($returnedKeys)) {
$keys = $returnedKeys;
} else {
$keys = array();
$keys[0] = $returnedKeys;
}
$adData = array();
$i=0;
foreach ($keys as $key) {
$adData[$i] = $allAds[$key];
$i++;
}
return $adData;
}
}

function st_adtheme_get_ads($section) {
return maybe_unserialize(get_option("st_adtheme_{$section}_ads"));
}

function st_adtheme_have_ads($section) {
return (count(st_adtheme_get_ads($section)) > 0);
}

function st_adtheme_should_update_settings() {
if ( !current_user_can('edit_themes') )
wp_die(__("Insufficient user privileges.", "stallion6"));

if ($_POST['st_adtheme_submitted'] == 'Y') {
check_admin_referer('sds-theme-update-settings');
unset($_POST['st_adtheme_submitted']);
return true;
}
return false;
}

function st_adtheme_settings_textbox($id, $size=null, $value=null) {
if (is_null($value)) {
if ($value = get_option($id))
$value = htmlentities($value, ENT_QUOTES);
else $value='';
}

if (is_null($size))
$sizeAttr='';
else $sizeAttr = " size='$size'";
echo "<input type='text' name='$id' id='$id' value='$value'$sizeAttr />";
}

function st_adtheme_settings_checkbox($id) {
$check = get_option('sidebarAds');
if($check['y'])
$checked="checked ";
else $checked="nope ";
echo "<input type='checkbox' name='$id' id='$id' value='y' $checked />";
}

function st_adtheme_handle_checkbox($id) {
	if (!isset($_POST[$id])) update_option($id, "false");
}

function st_adtheme_update_ad_data($section) {
$data = array();

for ($ad=1; $ad<=20; $ad++) {
$image = $_POST["st_adtheme_{$section}_ad{$ad}_image"];
$url = $_POST["st_adtheme_{$section}_ad{$ad}_url"];
$title = $_POST["st_adtheme_{$section}_ad{$ad}_title"];
$cloak = $_POST["st_adtheme_{$section}_ad{$ad}_cloak"];
if ($image || $url || $title || $cloak) {
$data[$ad]['image'] = $image;
$data[$ad]['url']   = $url;
$data[$ad]['title'] = $title;
$data[$ad]['cloak'] = $cloak;
}
}
update_option("st_adtheme_{$section}_ads", serialize($data));
}

function st_adtheme_ad_settings_page() {
if (st_adtheme_should_update_settings()) {
st_adtheme_update_ad_data("sidebar");

update_option("st_adtheme_count", $_POST['st_adtheme_count']);
update_option("st_adtheme_px", $_POST['st_adtheme_px']);
update_option("st_adtheme_px2", $_POST['st_adtheme_px2']);

echo '<div id="message" class="updated fade"><p><strong>' . __('Settings saved.', 'stallion6') . '</strong></p></div>';
}

$sidebarAds = maybe_unserialize(get_option("st_adtheme_sidebar_ads"));
?>
<div id="st_adtheme_settings_page" class="wrap">

<h2>Stallion 125px by 125px Ad Settings</h2>

<p>Add 125px by 125px ads to your sidebars. Below you can add up to thirty 125px image ads to your own or other sites. Add "y" (lower case) to the "Cloak Ad" box to hide the ad from search engines. Cloaked ads will use the built in <a href="http://www.stallion-theme.com/stallion-theme-cloak-affiliate-links-tutorial" target="_blank">Stallion Theme Cloak Affiliate Links</a> feature. Cloaked links will pass no link benefit to the ads URL and the URL will not be read as a link by search engines (search engines only see the image). Cloaking is perfect for affiliate ads or ads you do not wish to pass SEO benefit to. Non-cloaked ads pass full SEO and link benefit.</p>
<p>Note: for link cloaking to work please turn on link cloaking under <a href="admin.php?page=ttk_seo_advanced_functions.php">Stallion SEO Advanced Options</a> page : "Cloak Affiliate Links ON".</p>

<form name="st_adtheme_ad_settings" id="st_adtheme_ad_settings" method="post" action="">
<input type="hidden" name="st_adtheme_submitted" value="Y" />

<h3>Sidebar Ads (125px x 125px)</h3>
<table class="form-table st_adtheme_ad_data">
<tr>
<th scope="col" class="adnumber">#</th>
<th scope="col">Image URL 125px by 125px<small>All ads will be 125px by 125px on the page.<br />Example: http://www.stallion-theme.com/stallion-125-125.jpg</small></th>
<th scope="col">URL<small>Where the AD goes.<br />Example: http://www.stallion-theme.com/</small></th>
<th scope="col">Alt Title<small>Hoverover text, has SEO value.<br />Example: Stallion SEO Theme</small></th>
<th scope="col"><div style="text-align:center;">Cloak Ad<small>Hide from Search Engines<br />(y = hide)</small></th>
</tr>

<?php for ($ad=1; $ad<=20; $ad++) { ?><tr>
<th scope="row" class="adnumber"><?php echo $ad; ?></th>
<td><?php st_adtheme_settings_textbox("st_adtheme_sidebar_ad{$ad}_image", null, $sidebarAds[$ad]['image']) ?></td>
<td><?php st_adtheme_settings_textbox("st_adtheme_sidebar_ad{$ad}_url",   null, $sidebarAds[$ad]['url']) ?></td>
<td><?php st_adtheme_settings_textbox("st_adtheme_sidebar_ad{$ad}_title", null, $sidebarAds[$ad]['title']) ?></td>
<td class="adnumber"><?php st_adtheme_settings_textbox("st_adtheme_sidebar_ad{$ad}_cloak", null, $sidebarAds[$ad]['cloak']) ?></td>
</tr><?php } ?>
</table>

<table class="form-table">
<?php $stadpx = get_option('st_adtheme_px');?>
<?php $stadpx2 = get_option('st_adtheme_px2');?>
<tr valign='top'>
<td scope='row' width="200px"><label for='st_adtheme_px'><strong>Width of Images (px)</strong> </label></td>
<td width="25%"><input type='text' name='st_adtheme_px' id='st_adtheme_px' value='<?php echo $stadpx; ?>' />px<br /></td>
<td><p>Width of the images in pixels (default 125px).</p></td>
</tr>

<tr valign='top'>
<td scope='row' width="200px"><label for='st_adtheme_px2'><strong>Height of Images (px)</strong> </label></td>
<td width="25%"><input type='text' name='st_adtheme_px2' id='st_adtheme_px2' value='<?php echo $stadpx2; ?>' />px<br /></td>
<td><p>height of the images in pixels (default 125px).</p></td>
</tr>

<tr valign='top'>
<th scope="row" width="200px"><strong>Number of Ads</strong></th>
<td width="25%"><select name="st_adtheme_count" id="st_adtheme_count">
<?php $adCount = get_option('st_adtheme_count');
for ($i=0; $i<=20; $i++) {
if ($adCount == $i) $selected = ' selected="selected"';
else $selected='';
echo "<option$selected>$i</option>";
} ?></select></td>
<td><p>Select a number below the ads added above to have those ads selected randomly. For example if you add 10 ads above and select 6 ads, 6 of the 10 ads above will be randomly selected with each page load.</p></td>
</tr></table>

<p>Don't forget to add the "Stallion 125px by 125px Ads Widget" to a sidebar from the widgets menu : <a href="widgets.php">Appearance >> Widgets</a>.</p>

<p id="st_adtheme_submit_button"><span class="submit">
<input type="submit" class="button-primary" name="submit" value="Save Settings" />
</span></p>
<?php wp_nonce_field('sds-theme-update-settings'); ?>
</form>
</div>
<?php
}

function widget_st_adtheme_ads($args) {
if (st_adtheme_have_ads('sidebar') && get_option('st_adtheme_count') > 0) {
extract($args);
echo $before_widget;
st_adtheme_sidebar_ads();
echo $after_widget;
}
}

function widget_st_adtheme_ads_control() {
echo '<p>You can edit the ads shown in this widget by going to <a href="admin.php?page=ttk_125px-ads">125px Ad Settings</a>.</p>';
}

function st_adtheme_widgets_init() {
	
$widget_ops = array(
'classname'    =>  'widget_ads',
'description'  =>  __( "125px by 125px Ads, as specified in Stallion Theme &#8658; 125px Ad Settings", "stallion6" )
);
wp_register_sidebar_widget( 'ads', __( 'Stallion 125px by 125px Ads Widget', 'stallion6' ), 'widget_st_adtheme_ads', $widget_ops );
wp_register_widget_control( 'ads', __( '125px by 125px Ads', 'stallion6' ), 'widget_st_adtheme_ads_control' );
}
add_action( 'init', 'st_adtheme_widgets_init' );

load_theme_textdomain('stallion6');
?>