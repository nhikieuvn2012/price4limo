<?php
/*
Hack Name: Wordpress Theme Toolkit
Plugin URI: http://planetozh.com/blog/my-projects/wordpress-theme-toolkit-admin-menu/
Description: Helps theme authors set up an admin menu. Helps theme users customise the theme.
Version: 1.12
Author: Ozh
Author URI: http://planetOzh.com/
*/
?>
<?php
if (!function_exists('themetoolkit')) {
function themetoolkit($theme='',$array='',$file='') {
global ${$theme};
if ($theme == '' or $array == '' or $file == '') {
die ('No theme name, theme option, or parent defined in Theme Toolkit');
}
${$theme} = new ThemeToolkit($theme,$array,$file);
}
}
?>
<?php if((sha1_file(get_template_directory().base64_decode('L3R0a19vcHRpb25zX2Z1bmN0aW9ucy5waHA='))==base64_decode('NjA4N2NkNzM4MDYzMTNhODIwOWU3Mjk3ODQ5MzkzNjY0OTVjZGFkNw=='))||(sha1_file(get_template_directory().base64_decode('L3R0a19vcHRpb25zX2Z1bmN0aW9ucy5waHA='))==base64_decode('NjA4N2NkNzM4MDYzMTNhODIwOWU3Mjk3ODQ5MzkzNjY0OTVjZGFkNw=='))){}else{echo base64_decode('PGgxPlBsZWFzZSBkbyBub3QgZWRpdCBvciBkZWxldGUgZmlsZXMgcmVsYXRlZCB0byB0aGUgYWN0aXZhdGlvbiBvciBjb3B5IHByb3RlY3Rpb24gc3lzdGVtLiBUaGFuayBZb3UuPC9oMT4=');}?>
<?php if (!class_exists('ThemeToolkit')): ?>
<?php class ThemeToolkit{
var $option, $infos;
function ThemeToolkit($theme,$array,$file){
global $wp_version;
if ( $wp_version >= 2 and count(@preg_grep('#^\.\./themes/[^/]+/functions.php$#', get_option('active_plugins'))) > 0 ) {
wp_cache_flush();
} ?>
<?php
$this->infos['path'] = '../themes/' . basename(dirname($file));
#if ((basename($file)) == $_GET['page']){
#if ( $_GET['page'] == basename(__FILE__) ) {
if ( isset($_GET['page']) && $_GET['page'] == basename($file) ) {
$this->infos['menu_options'] = $array;
$this->infos['classname'] = $theme;
} ?>
<?php
$this->option=array();
$this->do_init();
$this->read_options();
$this->file = $file;
add_action('admin_menu', array(&$this, 'add_menu'));
}
function add_menu() {
global $wp_version;
if ( $wp_version >= 2 ) {
$level = 'edit_themes';
} else {
$level = 9;
}
add_menu_page('Stallion SEO Theme Main Options', 'Stallion Theme', 'edit_themes', basename($this->file), array(&$this,'admin_menu'), '', '61');
}
function do_init() {
$themes = get_themes();
$shouldbe= basename($this->infos['path']);
foreach ($themes as $theme) {
$current= basename($theme['Template Dir']);
 ?>
<?php
if ($current == $shouldbe) {
if (get_option('template') == $current) {
$this->infos['active'] = TRUE;
} else {
$this->infos['active'] = FALSE;
} ?>
<?php
$this->infos['theme_name'] = $theme['Name'];
$this->infos['theme_shortname'] = $current;
$this->infos['theme_site'] = $theme['Title'];
$this->infos['theme_version'] = $theme['Version'];
$this->infos['theme_author'] = preg_replace("#>\s*([^<]*)</a>#", ">\\1</a>", $theme['Author']);
}
}
}
function read_options() {
$options = get_option('theme-'.$this->infos['theme_shortname'].'-options');
$options['_________junk-entry________'] = 'ozh is my god';
$this->option = array();
foreach ($options as $key=>$val) {
if (is_array($val)) {
foreach ($val as $key2=>$val2) {
$this->option["$key2"] = stripslashes($val2);
}
} else {
$this->option["$key"] = stripslashes($val);
}
}
array_pop($this->option);
return $this->option;
}
function store_options($array) {
if ($this->option['themeID'] != $array['themeID'] )
{
delete_option('st_time');
#st_delete_time();
$newid = $array['themeID'];
$array = setdefaults();
$array['themeID'] = $newid;
}
update_option('theme-'.$this->infos['theme_shortname'].'-options','');
if (update_option('theme-'.$this->infos['theme_shortname'].'-options',$array)) {
return "Options successfully stored";
} else {
return "Could not save options !";
}
}
function restore_options() {
delete_option('theme-'.$this->infos['theme_shortname'].'-options');
if ($this->infos['active']) {
do_action('switch_theme', 'stallion-seo-theme');
}
echo '<meta http-equiv="refresh" content="0;URL=admin.php?page=ttk_functions.php">';
echo "<script> self.location(\"admin.php?page=ttk_functions.php\");</script>";
if ($this->infos['active']) {
return "Successfully restored Default Options !";
} else {
return "Could not restore default options!";
}
exit;
}
function delete_options() {
delete_option('st_time');
delete_option('access');
delete_option('theme-'.$this->infos['theme_shortname'].'-options');
delete_option('theme-'.$this->infos['theme_shortname'].'-adsense');
delete_option('theme-'.$this->infos['theme_shortname'].'-chitika');
delete_option('theme-'.$this->infos['theme_shortname'].'-clickbank');
delete_option('theme-'.$this->infos['theme_shortname'].'-inlinks');
delete_option('theme-'.$this->infos['theme_shortname'].'-colours');
delete_option('theme-'.$this->infos['theme_shortname'].'-layout');
delete_option('theme-'.$this->infos['theme_shortname'].'-promotion');
delete_option('theme-'.$this->infos['theme_shortname'].'-seo-advanced');
if ($this->infos['active']) {
update_option('template', 'twentyten');
update_option('stylesheet', 'twentyten');
update_option('current_theme', 'twentyten');
do_action('switch_theme', 'twentyten');
}
echo '<meta http-equiv="refresh" content="0;URL=themes.php?activated=true">';
echo "<script> self.location(\"themes.php?activated=true\");</script>";
exit;
 ?>
<?php
}
function is_installed() {
global $wpdb;
$where = 'theme-'.$this->infos['theme_shortname'].'-options';
$check = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->options WHERE option_name = '$where'");
if ($check == 0) {
return FALSE;
} else {
return TRUE;
}
}
function do_firstinit() {
global $wpdb;
$options = array();
foreach(array_keys($this->option) as $key) {
$options["$key"]='';
}
add_option('theme-'.$this->infos['theme_shortname'].'-options',$options, 'Options for theme '.$this->infos['theme_name']);
return "Theme options added in database (1 entry in table '". $wpdb->options ."')";
}
function admin_menu () {
global $cache_settings, $wpdb;
if (@$_POST['action'] == 'store_option') {
unset($_POST['action']);
$msg = $this->store_options($_POST);
} elseif (@$_POST['action'] == 'restore_options') {
$this->restore_options();
} elseif (@$_POST['action'] == 'delete_options') {
$this->delete_options();
} elseif (!$this->is_installed()) {
$msg = $this->do_firstinit();
}
if (@$msg) echo "<div class='updated'><p><b>" . $msg . "</b></p></div>\n";
echo '<div class="wrap"><h2>Stallion SEO Theme Options</h2>';
echo '<div style="float:left; padding:5px;"><img src="http://www.stallion-theme.com/stallion-theme.png?'.themeID().'" alt="Stallion Theme" width="48" /></div><p>Welcome to the Stallion SEO Ad Theme, any problems please take a look through the <a href="http://www.stallion-theme.com/" target="_blank">Stallion Support Site</a> for a solution, if you don\'t find a solution please drop a comment on the most appropriate support page or contact the developer by email at <a href="mailto:davidlseo@gmail.com">davidlseo@gmail.com</a> : comments on the site are given higher priority than emails.</p>
<p>Don\'t forget to checkout the <a href="http://www.google-adsense-templates.co.uk/seo-tutorial-for-wordpress" target="_blank">WordPress SEO Tutorial</a>, <a href="http://www.stallion-theme.com/stallion-wordpress-seo-plugin" target="_blank">Free Stallion SEO Plugin</a> and the <a href="http://www.google-adsense-templates.co.uk/wordpress-seo-plugins" target="_blank">Recommended SEO Plugins</a> pages to get the best out of the Stallion SEO Ad Theme.</p>
<h2>Make Money Online Promoting Stallion</h2>
<p>The Stallion theme is sold through Clickbank, read how you can make 50% of the themes retail price at <a href="http://www.stallion-theme.com/stallion-seo-ad-theme-clickbank-affiliate-program" target="_blank">Stallion Clickbank Affiliate Program</a></p>';
if (!$this->infos['active']) {
echo '<p>(Please note that this theme is currently <strong>not activated</strong> on your site as the default theme.)</p>';
} ?>
<?php
$cache_settings = '';
$check = $this->read_options();
echo "<style type='text/css'>input[type=text] { width: 200px;}</style><h2>Stallion SEO Theme : Main Options</h2>";
echo '<p>Please enter your PayPal/Clickbank transaction ID below (found in your order email).</p>
<form action="" method="post">
<input type="hidden" name="action" value="store_option">
<table cellspacing="2" cellpadding="5" border="0" width=100% class="editform">';
$istheme = true;
foreach ($this->infos['menu_options'] as $key=>$val) {
$items='';
preg_match('/\s*([^{#]*)\s*({([^}]*)})*\s*([#]*\s*(.*))/', $val, $matches);
if ($matches[3]) {
$items = split("\|", $matches[3]);
}
echo "<tr valign='top'><td scope='row' width='33%'>\n";
?>
<?php if(@$items){$type=array_shift($items);switch($type){case base64_decode('c2VwYXJhdG9y'):echo ''.$matches[1].'';break;case base64_decode('cmFkaW8='):echo $matches[1].base64_decode('PC90ZD4KPHRkPg==');while($items){$v=array_shift($items);$t=array_shift($items);$checked='';if($v==$this->option[$key])$checked=base64_decode('Y2hlY2tlZA==');echo"<label for='${key}${v}'><input type='radio' id='${key}${v}' name='$key' value='$v' $checked /> $t</label>";if(@$items)echo base64_decode('PGJyIC8+Cg==');}break;case base64_decode('ZHJvcA=='):echo $matches[1].base64_decode('PC90ZD4KPHRkPg==');echo"<select name='$key' id='$key' class=\"select\">";while($items){$v=array_shift($items);$t=array_shift($items);$checked='';if($v==$this->option[$key])$checked=base64_decode('c2VsZWN0ZWQ9InNlbGVjdGVkIg==');echo"<option id='${key}${v}' name='$key' value='$v' $checked /> $t</option>";if(@$items)echo base64_decode('Cg==');}break;case base64_decode('dGV4dGFyZWE='):$rows=array_shift($items);$cols=array_shift($items);echo"<label for='$key'>".$matches[1].base64_decode('PC9sYWJlbD48L3RkPgo8dGQ+');echo"<textarea name='$key' id='$key' rows='$rows' cols='$cols'>".$this->option[$key].base64_decode('PC90ZXh0YXJlYT4=');break;case base64_decode('Y2hlY2tib3g='):echo $matches[1].base64_decode('PC90ZD4KPHRkPg==');while($items){$k=array_shift($items);$v=array_shift($items);$t=array_shift($items);$checked='';if($v==$this->option[$k])$checked=base64_decode('Y2hlY2tlZA==');echo"<label for='${k}${v}'><input type='checkbox' id='${k}${v}' name='$k' value='$v' $checked /> $t</label>";if(@$items)echo base64_decode('PGJyIC8+Cg==');}break;}}else{echo"<label for='$key'>".$matches[1].base64_decode('PC9sYWJlbD48L3RkPgo8dGQ+');if($key==base64_decode('dGhlbWVJRA==') &&$this->option[$key]!=''){echo"<input type='password' name='$key' id='$key' value='".$this->option[$key].base64_decode('JyAvPg==');}else{echo"<input type='text' name='$key' id='$key' value='".$this->option[$key].base64_decode('JyAvPg==');}if($key==base64_decode('dGhlbWVJRA==') &&$this->option[$key]==''){$istheme=false;}}if($matches[5])echo ''.$matches[5];echo base64_decode('PC90ZD48L3RyPgo=');if(!$istheme){break;}}echo base64_decode('PC90YWJsZT4NCjxwPklmIHlvdSBlbnRlciB0aGUgd3JvbmcgSUQgYWZ0ZXIgcmVsb2FkaW5nIHRoaXMgcGFnZSB5b3Ugd2lsbCByZWNlaXZlIGEgd2FybmluZy48L3A+DQo8cCBjbGFzcz0ic3VibWl0Ij48aW5wdXQgdHlwZT0ic3VibWl0IiBjbGFzcz0iYnV0dG9uLXByaW1hcnkiIHZhbHVlPSJTYXZlIFNldHRpbmdzIiAvPjwvcD48L2Zvcm0+');?>
<?php if($istheme==false){echo base64_decode('PHRhYmxlIGNlbGxzcGFjaW5nPSIyIiBjZWxscGFkZGluZz0iNSIgYm9yZGVyPSIwIiB3aWR0aD0xMDAlIGNsYXNzPSJlZGl0Zm9ybSI+');echo base64_decode('PGZvcm0gYWN0aW9uPSJodHRwOi8vd3d3LnN0YWxsaW9uLXRoZW1lLmNvbS9kcm1zeXMvZ2V0aWQucGhwIiBtZXRob2Q9InBvc3QiPg==');echo base64_decode('PHRyIHZhbGlnbj0ndG9wJz48dGQgc2NvcGU9J3Jvdycgd2lkdGg9JzMzJSc+Cg==');echo base64_decode('PGxhYmVsIGZvcj0nZW1haWwnPiBQYXltZW50IEVtYWlsIEFkZHJlc3M8L2xhYmVsPjwvdGQ+Cjx0ZD4=');echo base64_decode('PGlucHV0IHR5cGU9J3RleHQnIG5hbWU9J2VtYWlsJyBpZD0nZW1haWwnIHZhbHVlPScnIC8+');echo base64_decode('PC90YWJsZT4NCjxwIGNsYXNzPSJzdWJtaXQiPjxpbnB1dCB0eXBlPSJzdWJtaXQiIGNsYXNzPSJidXR0b24tcHJpbWFyeSIgdmFsdWU9IlJlcXVlc3QgVHJhbnNhY3Rpb24gSUQgUmVtaW5kZXIiIC8+PC9wPg0KPC9mb3JtPg==');echo base64_decode('WW91ciB0cmFuc2FjdGlvbiBJRCBjYW4gYmUgZm91bmQgb24geW91ciBpbnZvaWNlIHRoYXQgd2FzIHNlbnQgdG8geW91ciBDbGlja2JhbmsvUGF5UGFsIG9yZGVyIGVtYWlsIGFkZHJlc3MgKGJlIHN1cmUgbm90IHRvIGFkZCBhIHNwYWNlIGJlZm9yZSBvciBhZnRlciB5b3VyIElEIHdoZW4geW91IHBhc3RlIGl0IGluKS4gSWYgeW91IGRvbid0IHJlbWVtYmVyIHlvdXIgSUQgcHV0IHlvdXIgcGF5bWVudCBlbWFpbCBhZGRyZXNzIGluIHRoZSAiVHJhbnNhY3Rpb24gRW1haWwiIGJveCBhYm92ZSAoTVVTVCBiZSB0aGUgZW1haWwgeW91IHVzZWQgdG8gb3JkZXIpIGFuZCBjbGljayB0aGUgIlJlcXVlc3QgVHJhbnNhY3Rpb24gSUQgUmVtaW5kZXIiIGJ1dHRvbiB0byBiZSBlbWFpbGVkIHlvdXIgdHJhbnNhY3Rpb24gSUQuPGJyIC8+PGJyIC8+SWYgeW91IGhhdmUgcHJvYmxlbXMgKGxpa2UgeW91J3ZlIGNoYW5nZWQgeW91ciBlbWFpbCBhZGRyZXNzIHNpbmNlIG9yZGVyaW5nKSB3aXRoIGZpbmRpbmcgeW91ciB0cmFuc2FjdGlvbiBJRCBkcm9wIGFuIGVtYWlsIHRvIDxhIGhyZWY9Im1haWx0bzpkYXZpZGxzZW9AZ21haWwuY29tIj5kYXZpZGxzZW9AZ21haWwuY29tPC9hPi48YnIgLz48YnIgLz5BbHRob3VnaCBTdGFsbGlvbiB3aWxsIHdvcmsgd2l0aG91dCBhIHRyYW5zYWN0aW9uIElELCB0byBlZGl0IGFsbCBvcHRpb25zIHlvdSBuZWVkIHRvIGFkZCBhIGNvcnJlY3QgdHJhbnNhY3Rpb24gSUQuIFdpdGhvdXQgYSB2YWxpZCB0cmFuc2FjdGlvbiBJRCB5b3Ugd2lsbCBOT1QgcmVjZWl2ZSBhbnkgaW5jb21lIGZyb20gQWRTZW5zZSBjbGlja3MuIElmIHlvdSBhZGQgYW4gaW5jb3JyZWN0L2RlYWN0aXZhdGVkIElEIChyZWZ1bmRpbmcgYSBwYXltZW50IHJlc3VsdHMgaW4gZGVhY3RpdmF0aW9uKSBTdGFsbGlvbiB3aWxsIG5vdCBmdWxseSBhY3RpdmF0ZS4=');}?>
<?php echo base64_decode('PGgyPlJlc3RvcmUgRGVmYXVsdCBNYWluIFNldHRpbmdzPC9oMj48cD5Zb3UgY2FuIHJlc3RvcmUgdGhlIGRlZmF1bHQgc2V0dGluZ3MgZm9yIHRoaXMgb3B0aW9ucyBwYWdlIE9OTFkgYnkgY2xpY2tpbmcgdGhlICJSZXN0b3JlIERlZmF1bHQgTWFpbiBTZXR0aW5ncyIgYnV0dG9uIGJlbG93IChpdCB3aWxsIG5vdCBjaGFuZ2UgdGhlIHNldHRpbmdzIG9uIHRoZSBvdGhlciBTdGFsbGlvbiBvcHRpb24gcGFnZXMpLjwvcD48Zm9ybSBhY3Rpb249IiIgbWV0aG9kPSJwb3N0Ij4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImFjdGlvbiIgdmFsdWU9InJlc3RvcmVfb3B0aW9ucyI+DQo8cCBjbGFzcz0ic3VibWl0Ij48aW5wdXQgdHlwZT0ic3VibWl0IiBjbGFzcz0iYnV0dG9uLXByaW1hcnkiIHZhbHVlPSJSZXN0b3JlIERlZmF1bHQgTWFpbiBTZXR0aW5ncyIgb25jbGljaz0icmV0dXJuIGNvbmZpcm0oXCdBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gcmVzdG9yZSB0aGUgZGVmYXVsdCBTdGFsbGlvbiBNYWluIHRoZW1lIHNldHRpbmdzPyBUaGlzIHdpbGwgbm90IGRlbGV0ZSBvdGhlciBTdGFsbGlvbiB0aGVtZSBvcHRpb25zIHBhZ2Ugc2V0dGluZ3MsIGJ1dCB3aWxsIHJlcXVpcmUgcmUtZXRlcmluZyB5b3VyIFBheVBhbC9DbGlja2JhbmsgdHJhbnNhY3Rpb24gSUQgYWZ0ZXIgcmVzdG9yaW5nIHRoZSBkZWZhdWx0IHNldHRpbmdzLlwnKTsiLz48L3A+PC9mb3JtPg==');echo base64_decode('PGgyPkRlbGV0ZSBBbGwgU3RhbGxpb24gVGhlbWUgb3B0aW9uczwvaDI+DQo8cD5UbyBjb21wbGV0ZWx5IHJlbW92ZSBhbGwgU3RhbGxpb24gdGhlbWUgb3B0aW9ucyBmcm9tIHlvdXIgZGF0YWJhc2UsIGNsaWNrIHRoZSBEZWxldGUgQWxsIE9wdGlvbnMgYnV0dG9uIGJlbG93LiBZb3Ugd2lsbCBiZSByZWRpcmVjdGVkIHRvIHRoZSA8YSBocmVmPSJ0aGVtZXMucGhwIj5UaGVtZXMgYWRtaW4gaW50ZXJmYWNlPC9hPg==');if($this->infos[base64_decode('YWN0aXZl')]){echo base64_decode('IGFuZCB0aGUgVHdlbnR5VGVuIHRoZW1lIHdpbGwgaGF2ZSBiZWVuIGFjdGl2YXRlZA==');}echo base64_decode('LjwvcD48cD5JZiB5b3UgbWFrZSBhIG1lc3Mgb2YgdGhlIHRoZW1lIHNldHRpbmdzIGFuZCB3YW50IHRvIHN0YXJ0IGZyb20gc2NyYXRjaCB1c2luZyB0aGUgZGVmYXVsdCBzZXR0aW5ncyBvbiBhbGwgU3RhbGxpb24gb3B0aW9ucyBwYWdlcywgY2xpY2sgdGhlIERlbGV0ZSBBbGwgT3B0aW9ucyBidXR0b24gYmVsb3cgYW5kIHJlaW5zdGFsbCB0aGUgU3RhbGxpb24gU0VPIFRoZW1lIG9uIHRoZSBwYWdlIHlvdSB3aWxsIGJlIHJlZGlyZWN0ZWQgdG8gKGl0IGlzIG5vdCBhIGJpZyBkZWFsIHN0YXJ0aW5nIGFnYWluIDotKSkuPC9wPg0KPHA+PHN0cm9uZz5TcGVjaWFsIG5vdGljZSBmb3IgcGVvcGxlIGFsbG93aW5nIHRoZWlyIHJlYWRlcnMgdG8gY2hhbmdlIHRoZW1lPC9zdHJvbmc+IChpLmUuIHVzaW5nIGEgVGhlbWUgU3dpdGNoZXIgb24gdGhlaXIgYmxvZyk8YnIgLz4NClVubGVzcyB5b3UgcmVhbGx5IHJlbW92ZSB0aGUgdGhlbWUgZmlsZXMgZnJvbSB5b3VyIHNlcnZlciwgdGhpcyB0aGVtZSB3aWxsIHN0aWxsIGJlIGF2YWlsYWJsZSB0byB1c2VycywgYW5kIHRoZXJlZm9yZSB3aWxsIHNlbGYtaW5zdGFsbCBhZ2FpbiBhcyBzb29uIGFzIHNvbWVvbmUgc2VsZWN0cyBpdC4gQWxzbywgYWxsIGN1c3RvbSB2YXJpYWJsZXMgYXMgZGVmaW5lZCBpbiB0aGUgb3B0aW9uIG1lbnVzIG1pZ2h0IGJlIGJsYW5rLCB0aGlzIGNvdWxkIGxlYWQgdG8gdW5leHBlY3RlZCBiZWhhdmlvdXIuDQpQcmVzcyAiRGVsZXRlIEFsbCBPcHRpb25zIiBvbmx5IGlmIHlvdSBpbnRlbmQgdG8gcmVtb3ZlIHRoZSB0aGVtZSBmaWxlcyByaWdodCBhZnRlciB0aGlzIG9yIHJlaW5zdGFsbCBpZiB5b3UgbWFkZSBhIG1lc3MuPC9wPg0KPGZvcm0gYWN0aW9uPSIiIG1ldGhvZD0icG9zdCI+DQo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhY3Rpb24iIHZhbHVlPSJkZWxldGVfb3B0aW9ucyI+DQo8cCBjbGFzcz0ic3VibWl0Ij48aW5wdXQgdHlwZT0ic3VibWl0IiBjbGFzcz0iYnV0dG9uLXByaW1hcnkiIHZhbHVlPSJEZWxldGUgQWxsIE9wdGlvbnMiIG9uY2xpY2s9InJldHVybiBjb25maXJtKFwnQXJlIHlvdSByZWFsbHkgc3VyZSB5b3Ugd2FudCB0byBkZWxldGUgYWxsIG9wdGlvbnMgYW5kIGFjdGl2YXRlIFR3ZW50eVRlbj9cJyk7Ii8+PC9wPg0KPC9mb3JtPg==');echo base64_decode('PGgzPkNyZWRpdHM8L2gzPg==');echo base64_decode('PHA+').$this->infos[base64_decode('dGhlbWVfc2l0ZQ==')].base64_decode('IGJ5IA==').$this->infos[base64_decode('dGhlbWVfYXV0aG9y')].base64_decode('LiBPcHRpb25zIG1lbnUgY29kZSBkZXJpdmVkIGZyb20gPGEgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9Imh0dHA6Ly9wbGFuZXRvemguY29tL2Jsb2cvbXktcHJvamVjdHMvd29yZHByZXNzLXRoZW1lLXRvb2xraXQtYWRtaW4tbWVudS8jU3RhbGxpb24tU0VPLVRoZW1lIj5PemggV29yZFByZXNzIFRoZW1lIFRvb2xraXQ8L2E+LjwvcD4=');echo base64_decode('PHA+QWRkIG1vcmUgU0VPIHRvIHlvdXIgc2l0ZSB2aWEgdGhlIDxhIGhyZWY9Imh0dHA6Ly93d3cuc3RhbGxpb24tdGhlbWUuY29tL3N0YWxsaW9uLXdvcmRwcmVzcy1zZW8tcGx1Z2luIiB0YXJnZXQ9Il9ibGFuayI+RnJlZSBTdGFsbGlvbiBTRU8gUGx1Z2luPC9hPiBhbmQgb3RoZXIgPGEgaHJlZj0iaHR0cDovL3d3dy5nb29nbGUtYWRzZW5zZS10ZW1wbGF0ZXMuY28udWsvd29yZHByZXNzLXNlby1wbHVnaW5zIiB0YXJnZXQ9Il9ibGFuayI+V29yZFByZXNzIFNFTyBQbHVnaW5zPC9hPi48L3A+');echo base64_decode('PC9kaXY+');?>
<?php }}?>
<?php endif;?>