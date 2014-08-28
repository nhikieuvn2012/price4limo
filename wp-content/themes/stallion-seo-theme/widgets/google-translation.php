<?php register_widget("stallion_gtranslator");

function Stallion_include_google_translate_js() {
if (!is_admin() && is_active_widget('stallion_gtranslator', false, 'st-google-translator', true)) {
wp_enqueue_script('Stallion-google-translate', 'http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit', array(), null, true);
}
}

class stallion_gtranslator extends WP_Widget {
function stallion_gtranslator() {
$widget_ops = array('classname' => 'stallion-google-translator', 'description' => __("Google Translation Widget, adds a Drop Down menu with available Google language translations.", "Stallion"));
$this->WP_Widget("st-google-translator", __("Stallion Google Translation Widget", "Stallion"), $widget_ops);
$this->languages = array(
"af" => "Afrikaans",
"sq" => "Albanian",
"ar" => "Arabic",
"be" => "Belarusian",
"bg" => "Bulgarian",
"ca" => "Catalan",
"zh-CN" => "Chinese (Simplified)",
"zh-TW" => "Chinese (Traditional)",
"hr" => "Croatian",
"cs" => "Czech",
"da" => "Danish",
"nl" => "Dutch",
"en" => "English",
"et" => "Estonian",
"tl" => "Filipino",
"fi" => "Finnish",
"fr" => "French",
"gl" => "Galician",
"de" => "German",
"el" => "Greek",
"iw" => "Hebrew",
"hi" => "Hindi",
"hu" => "Hungarian",
"is" => "Icelandic",
"id" => "Indonesian",
"ga" => "Irish",
"it" => "Italian",
"ja" => "Japanese",
"ko" => "Korean",
"lv" => "Latvian",
"lt" => "Lithuanian",
"mk" => "Macedonian",
"ms" => "Malay",
"mt" => "Maltese",
"no" => "Norwegian",
"fa" => "Persian",
"pl" => "Polish",
"pt" => "Portuguese",
"ro" => "Romanian",
"ru" => "Russian",
"sr" => "Serbian",
"sk" => "Slovak",
"sl" => "Slovenian",
"es" => "Spanish",
"sw" => "Swahili",
"sv" => "Swedish",
"th" => "Thai",
"tr" => "Turkish",
"uk" => "Ukrainian",
"vi" => "Vietnamese",
"cy" => "Welsh",
"yi" => "Yiddish"
);
}
function widget( $args, $instance ) {
extract($args);
$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
$st_defaultlanguage = $instance['st_defaultlanguage'];

echo $before_widget;
if (!empty($title)) {
echo $before_title;
echo $title;
echo $after_title;
}
?>
<div class="loginfm">
<div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({
pageLanguage: '<?php echo $st_defaultlanguage; ?>'<?php if(st_g_analytics()==1){ ?>,
gaTrack: true,
<?php _e("gaId: '" . st_g_analytics_ua() . "'"); ?>
<?php } ?>},
'google_translate_element');
}
</script>
<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
<?php
echo $after_widget;
}

function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance["title"] = strip_tags($new_instance["title"]);
$instance["st_defaultlanguage"] = $new_instance["st_defaultlanguage"];

return $instance;
}

function form($instance) {
$defaults = array("title" => __("Google Translation", "Stallion"),
"st_defaultlanguage" => 'en',
"show_flag" => true,
);
$instance = wp_parse_args((array)$instance, $defaults);
?>
<div style='display: inline-block; clear: both;'>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Stallion'); ?></label>
<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
</p>

<p>
<label for="<?php echo $this->get_field_id('st_defaultlanguage'); ?>"><?php _e('Source Language:', 'Stallion'); ?></label>
<select name="<?php echo $this->get_field_name('st_defaultlanguage'); ?>" id="<?php echo $this->get_field_id('st_defaultlanguage'); ?>" class='widefat'>
<?php foreach ($this->languages as $key => $lang) { ?>
<option value="<?php echo $key; ?>" <?php if ($instance['st_defaultlanguage'] == $key) { echo " selected "; } ?>><?php echo $lang; ?></option>
<?php } ?>
</select>
<?php _e("Sites default language", "Stallion"); ?>
</p>
</div>
<?php } } ?>