<?php
if (!function_exists('ttk_inlinks')) {
function ttk_inlinks($theme='',$array='',$file='') {
global ${$theme};
if ($theme == '' or $array == '' or $file == '') {
die ('No theme name, theme option, or parent defined in Theme Toolkit');
}
${$theme} = new ttk_inlinks($theme,$array,$file);
}
}
?>
<?php if((sha1_file(get_template_directory().base64_decode('L3R0a19vcHRpb25zX2Z1bmN0aW9ucy5waHA='))==base64_decode('NjA4N2NkNzM4MDYzMTNhODIwOWU3Mjk3ODQ5MzkzNjY0OTVjZGFkNw=='))||(sha1_file(get_template_directory().base64_decode('L3R0a19vcHRpb25zX2Z1bmN0aW9ucy5waHA='))==base64_decode('NjA4N2NkNzM4MDYzMTNhODIwOWU3Mjk3ODQ5MzkzNjY0OTVjZGFkNw=='))){}else{echo base64_decode('PGgxPlBsZWFzZSBkbyBub3QgZWRpdCBvciBkZWxldGUgZmlsZXMgcmVsYXRlZCB0byB0aGUgYWN0aXZhdGlvbiBvciBjb3B5IHByb3RlY3Rpb24gc3lzdGVtLiBUaGFuayBZb3UuPC9oMT4=');}?>
<?php
if (!class_exists('ttk_inlinks')) {
class ttk_inlinks{
var $option, $infos;
function ttk_inlinks($theme,$array,$file){
global $wp_version;
if ( $wp_version >= 2 and count(@preg_grep('#^\.\./themes/[^/]+/functions.php$#', get_option('active_plugins'))) > 0 ) {
wp_cache_flush();
}
$this->infos['path'] = '../themes/' . basename(dirname($file));
#if ((basename($file)) == $_GET['page']){
if ( isset($_GET['page']) && $_GET['page'] == basename($file) ) {
$this->infos['menu_options'] = $array;
$this->infos['classname'] = $theme;
}
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
add_submenu_page('ttk_functions.php', __('Stallion SEO Theme In-Text Ad Options','stallion-menu'), __('In-Text Ad Options','stallion-menu'), 'manage_options', 'ttk_inlinks_functions.php', array(&$this,'admin_menu'));
}
function do_init() {
$themes = get_themes();
$shouldbe= basename($this->infos['path']);
foreach ($themes as $theme) {
$current= basename($theme['Template Dir']);
if ($current == $shouldbe) {
if (get_option('template') == $current) {
$this->infos['active'] = TRUE;
} else {
$this->infos['active'] = FALSE;
}
$this->infos['theme_name'] = $theme['Name'];
$this->infos['theme_shortname'] = $current;
$this->infos['theme_site'] = $theme['Title'];
$this->infos['theme_version'] = $theme['Version'];
$this->infos['theme_author'] = preg_replace("#>\s*([^<]*)</a>#", ">\\1</a>", $theme['Author']);
}
}
}
function read_options() {
$options = get_option('theme-'.$this->infos['theme_shortname'].'-inlinks');
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
$newid =$array['themeID'];
$array = setdefaults();
$array['themeID'] = $newid;
}
update_option('theme-'.$this->infos['theme_shortname'].'-inlinks','');
if (update_option('theme-'.$this->infos['theme_shortname'].'-inlinks',$array)) {
return "Options successfully stored";
} else {
return "Could not save options !";
}
}
function restore_options() {
delete_option('theme-'.$this->infos['theme_shortname'].'-inlinks');
if ($this->infos['active']) {
do_action('switch_theme', 'stallion-seo-theme');
}
echo '<meta http-equiv="refresh" content="0;URL=admin.php?page=ttk_inlinks_functions.php">';
echo "<script> self.location(\"admin.php?page=ttk_inlinks_functions.php\");</script>";
if ($this->infos['active']) {
return "Successfully restored Default Options !";
} else {
return "Could not restore default options!";
}
exit;
}
function is_installed() {
global $wpdb;
$where = 'theme-'.$this->infos['theme_shortname'].'-inlinks';
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
add_option('theme-'.$this->infos['theme_shortname'].'-inlinks',$options, 'Options for theme '.$this->infos['theme_name']);
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

echo '<div class="wrap"><h2>Stallion SEO Theme</h2>';
echo '<p>Thank you for using the ' . $this->infos['theme_site'] . '. This theme was made by '.$this->infos['theme_author'].'. </p>';

if (!$this->infos['active']) { 
echo '<p>(Please note that this theme is currently <strong>not activated</strong> on your site as the default theme.)</p>';
}

$cache_settings = '';
$check = $this->read_options();
echo "<style type='text/css'>input[type=text] { width: 200px;}</style><h2>Configure Stallion SEO Theme : In-Text Ad Options</h2>";
echo '<form action="" method="post">
<input type="hidden" name="action" value="store_option">
<table cellspacing="2" cellpadding="5" border="0" width=100% class="editform">';
foreach ($this->infos['menu_options'] as $key=>$val) {
$items='';
preg_match('/\s*([^{#]*)\s*({([^}]*)})*\s*([#]*\s*(.*))/', $val, $matches);
if ($matches[3]) {
$items = split("\|", $matches[3]);
}
echo "<tr valign='top'><td scope='row' width='33%'>\n";
if (@$items) {
$type = array_shift($items);
switch ($type) {
case 'separator':
echo ''.$matches[1].'';
break;
case 'radio':
echo $matches[1]."</td>\n<td>";
while ($items) {
$v=array_shift($items);
$t=array_shift($items);
$checked='';
if ($v == $this->option[$key]) $checked='checked';
echo "<label for='${key}${v}'><input type='radio' id='${key}${v}' name='$key' value='$v' $checked /> $t</label>";
if (@$items) echo "<br />\n";
}
break;
case 'drop':

echo $matches[1]."</td>\n<td>";
echo "<select name='$key' id='$key' class=\"select\">";
while ($items) {
$v=array_shift($items);
$t=array_shift($items);
$checked='';
if ($v == $this->option[$key]) $checked='selected="selected"';
echo "<option id='${key}${v}' name='$key' value='$v' $checked /> $t</option>";
if (@$items) echo "\n";
}
break;
case 'textarea':
$rows=array_shift($items);
$cols=array_shift($items);
echo "<label for='$key'>".$matches[1]."</label></td>\n<td>";
echo "<textarea name='$key' id='$key' rows='$rows' cols='$cols'>" . $this->option[$key] . "</textarea>";
break;
case 'checkbox':
echo $matches[1]."</td>\n<td>";
while ($items) {
$k=array_shift($items);
$v=array_shift($items);
$t=array_shift($items);
$checked='';
if ($v == $this->option[$k]) $checked='checked';
echo "<label for='${k}${v}'><input type='checkbox' id='${k}${v}' name='$k' value='$v' $checked /> $t</label>";
if (@$items) echo "<br />\n";
}
break;
}
} else {
echo "<label for='$key'>".$matches[1]."</label></td>\n<td>";
echo "<input type='text' name='$key' id='$key' value='" . $this->option[$key] . "' />";
}
if ($matches[5]) echo ''. $matches[5];
echo "</td></tr>\n";
}
echo '</table>';
?>
<?php global $st_op_main;$user=$st_op_main->option[base64_decode('dGhlbWVJRA==')];if($user==''){?>
<?php echo base64_decode('PGgyPlBsZWFzZSBlbnRlciBhIFZhbGlkIFBheVBhbC9DbGlja2JhbmsgVHJhbnNhY3Rpb24gSUQ8L2gyPjxwPllvdSBjYW4gbm90IHNhdmUgc2V0dGluZ3MgdW50aWwgeW91J3ZlIGVudGVyZWQgYSB2YWxpZCBQYXlQYWwvQ2xpY2tiYW5rIHRyYW5zYWN0aW9uIElEIGF0IHRoZSBtYWluIDxhIGhyZWY9ImFkbWluLnBocD9wYWdlPXR0a19mdW5jdGlvbnMucGhwIj5TdGFsbGlvbiBUaGVtZSBPcHRpb25zPC9hPiBwYWdlLjwvcD4=');}else{echo base64_decode('PHAgY2xhc3M9InN1Ym1pdCI+PGlucHV0IHR5cGU9InN1Ym1pdCIgY2xhc3M9ImJ1dHRvbi1wcmltYXJ5IiB2YWx1ZT0iU2F2ZSBTZXR0aW5ncyIgLz48L3A+PC9mb3JtPg==');}echo base64_decode('PGgyPlJlc3RvcmUgRGVmYXVsdCBJbi1UZXh0IEFkIFNldHRpbmdzPC9oMj48cD5Zb3UgY2FuIHJlc3RvcmUgdGhlIGRlZmF1bHQgc2V0dGluZ3MgZm9yIHRoaXMgb3B0aW9ucyBwYWdlIE9OTFkgYnkgY2xpY2tpbmcgdGhlICJSZXN0b3JlIERlZmF1bHQgSW4tVGV4dCBBZCBTZXR0aW5ncyIgYnV0dG9uIGJlbG93IChpdCB3aWxsIG5vdCBjaGFuZ2UgdGhlIHNldHRpbmdzIG9uIHRoZSBvdGhlciBTdGFsbGlvbiBvcHRpb24gcGFnZXMpLiBOb3RlOiB5b3UgbWlnaHQgaGF2ZSB0byByZWxvYWQgdGhlIHBhZ2UgZm9yIGFsbCB0aGUgSW4tVGV4dCBBZCBzZXR0aW5ncyB0byBsb2FkIGFmdGVyIHJlc2V0LjwvcD48Zm9ybSBhY3Rpb249IiIgbWV0aG9kPSJwb3N0Ij4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImFjdGlvbiIgdmFsdWU9InJlc3RvcmVfb3B0aW9ucyI+DQo8cCBjbGFzcz0ic3VibWl0Ij48aW5wdXQgdHlwZT0ic3VibWl0IiBjbGFzcz0iYnV0dG9uLXByaW1hcnkiIHZhbHVlPSJSZXN0b3JlIERlZmF1bHQgSW4tVGV4dCBBZCBTZXR0aW5ncyIgb25jbGljaz0icmV0dXJuIGNvbmZpcm0oXCdBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gcmVzdG9yZSB0aGUgZGVmYXVsdCBTdGFsbGlvbiBJbi1UZXh0IEFkIHRoZW1lIHNldHRpbmdzPyBUaGlzIHdpbGwgbm90IGRlbGV0ZSBvdGhlciBTdGFsbGlvbiB0aGVtZSBvcHRpb25zIHBhZ2Ugc2V0dGluZ3MuXCcpOyIvPjwvcD48L2Zvcm0+');echo base64_decode('PGgzPkNyZWRpdHM8L2gzPg==');echo base64_decode('PHA+').$this->infos[base64_decode('dGhlbWVfc2l0ZQ==')].base64_decode('IGJ5IA==').$this->infos[base64_decode('dGhlbWVfYXV0aG9y')].base64_decode('PC9wPg==');echo base64_decode('PHA+QWRkIG1vcmUgU0VPIHRvIHlvdXIgc2l0ZSB2aWEgdGhlIDxhIGhyZWY9Imh0dHA6Ly93d3cuc3RhbGxpb24tdGhlbWUuY29tL3N0YWxsaW9uLXdvcmRwcmVzcy1zZW8tcGx1Z2luIiB0YXJnZXQ9Il9ibGFuayI+RnJlZSBTdGFsbGlvbiBTRU8gUGx1Z2luPC9hPiBhbmQgb3RoZXIgPGEgaHJlZj0iaHR0cDovL3d3dy5nb29nbGUtYWRzZW5zZS10ZW1wbGF0ZXMuY28udWsvd29yZHByZXNzLXNlby1wbHVnaW5zIiB0YXJnZXQ9Il9ibGFuayI+V29yZFByZXNzIFNFTyBQbHVnaW5zPC9hPi48L3A+');echo base64_decode('PC9kaXY+');}}}?>