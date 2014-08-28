<?php /* Widget start */
function st_Empty() { ?>
<span class="gat_widget">Empty Widget</span>

Put your Widget code over this text and change the title of the Widget above from "Empty Widget" to something relevant, you can also change the instances of "Empty Widget" below as well to label the widget something relevant on the Widget menu. To make more custom widgets (you can make as many as you like) copy all the lines between and including "Widget start" and "Widget end" and paste it at the end of this page. Change the three instances of "st_Empty" to something else, like "st_Custom2 (each custom widget needs this to be unique)". Below is another example widget showing some example links.

<?php } wp_register_sidebar_widget(
'st_Empty',
'Stallion Empty Custom Widget',
'st_Empty',
array(
'description' => 'An Example Empty Widget found within the file /stallion-seo-theme/widgets/custom-widgets.php. If a Text widget does not work edit this file.'
)
);
/* Widget end */ ?>
<?php /* Widget start */
function st_Coollinks() { ?>
<span class="gat_widget">Cool Links</span>

<ul>
<li><a href="http://www.stallion-theme.com/">WordPress SEO Theme</a></li>
<li><a href="http://www.google-adsense-templates.co.uk/">WordPress AdSense Templates</a></li>
<li><a href="http://www.google-adsense-templates.co.uk/wordpress-seo-plugins">WordPress SEO Plugins</a></li>
<li><a href="http://www.seo-gold.com/seo-tutorial">SEO Tutorial</a></li>
<li><a href="http://www.morearnings.com/">Make Money Online</a></li>
<li><a href="http://www.45-year-old-millionaire.co.uk/">45 Year Old Millionaire</a></li>
</ul>

<?php } wp_register_sidebar_widget(
'9gat-awesome-links',
'Stallion Awesome Links Widget',
'st_Coollinks',
array(
'description' => 'Example Custom Widget with SEO Links, found within the file /stallion-seo-theme/widgets/custom-widgets.php. If a Text widget does not work edit this file.'
)
);
/* Widget end */ ?>
<?php /* Widget start */
function st_stalliocbaf() { ?>
<?php if (class_exists('YPN_Functions')) : ?>
<div id="ypn-widget-300" class="widget-container ypn-widget">
<input type="hidden" name="delay" value="7" /><?php endif; ?>
<div>&nbsp;</div>
<div class="widget-content widget-content-ypn">
<div class="alcenter">
<a href="<?php if(st_clickbank_user()!='morearning'): ?><?php _e('http://' . st_clickbank_user() . '.stallionad.hop.clickbank.net/?tid=' . st_cb_track() . '&dpdid=Stallion_seo'); ?>
<?php else : ?>http://www.stallion-theme.com/<?php endif; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?><?php _e('/stallion-cbaf/stallion-200-200.jpg'); ?>" alt="Stallion WordPress SEO Theme" width="200" /></a>
</div>
</div>
<?php if (class_exists('YPN_Functions')) : ?></div><?php endif; ?>
<?php } wp_register_sidebar_widget(
'stallion-affiliate-banner',
'Stallion Clickbank Affiliate 200px Banner Widget',
'st_stalliocbaf',
array(
'description' => 'Stallion Clickbank Affiliate Banner 200px by 200px, uses your Clickbank username to share Stallion sales, earn money by promoting the Stallion theme.'
)
);
/* Widget end */ ?>
<?php /* Widget start */
function st_stalliocbaf300() { ?>
<?php if (class_exists('YPN_Functions')) : ?>
<div id="ypn-widget-301" class="widget-container ypn-widget">
<input type="hidden" name="delay" value="5" /><?php endif; ?>
<div class="fadright">
<a href="<?php if(st_clickbank_user()!='morearning'): ?><?php _e('http://' . st_clickbank_user() . '.stallionad.hop.clickbank.net/?tid=' . st_cb_track() . '&dpdid=Stallion_seo'); ?>
<?php else : ?>http://www.stallion-theme.com/<?php endif; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?><?php _e('/stallion-cbaf/stallion-300-250.gif'); ?>" alt="Stallion WordPress SEO Theme" width="300" /></a>
</div>
<?php if (class_exists('YPN_Functions')) : ?></div><?php endif; ?>
<?php } wp_register_sidebar_widget(
'stallion-affiliate-banner-for-content-ad-widget',
'Stallion Clickbank Affiliate 300px Banner Widget',
'st_stalliocbaf300',
array(
'description' => 'Stallion SEO Theme - Stallion Affiliate Banner for Content Ad Widget 300px by 250px, uses your Clickbank username to share Stallion sales, earn money by promoting the Stallion theme.'
)
);
/* Widget end */ ?>