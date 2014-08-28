<?php
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'Sallion SEO Ad Theme Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
echo "<div style=\"float:right; padding:5px;\"><img src=\"http://www.stallion-theme.com/stallion-theme.png\" alt=\"Stallion Theme\" width=\"48\" /></div><p>Welcome to the Stallion SEO Ad Theme, any problems please take a look through the <a href=\"http://www.stallion-theme.com/\" target=\"_blank\">Stallion Support Site</a> for a solution, if you don't find a solution drop a comment on the most appropriate support page or contact the developer by email at <a href=\"mailto:davidlseo@gmail.com\">davidlseo@gmail.com</a> : comments on the site are given higher priority than emails.</p>
<p>Don't forget to checkout the <a href=\"http://www.google-adsense-templates.co.uk/seo-tutorial-for-wordpress\" target=\"_blank\">WordPress SEO Tutorial</a> and the <a href=\"http://www.google-adsense-templates.co.uk/wordpress-seo-plugins\" target=\"_blank\">Recommended SEO Plugins</a> pages to get the best out of the Stallion SEO Ad Theme.</p>";
}
?>