<?php if (function_exists('st_seo_chck')){ ?>
<?php
$allinone_options = get_option('aioseop_options');
{echo '<h3>All In One SEO Pack Plugin Warnings</h3>
<p>You are using the All In One SEO Pack Plugin, some of the settings within this plugin are SEO damaging. See <a target="_blank" href="http://www.google-adsense-templates.co.uk/wordpress-all-in-one-seo-plugin-review.html">All In One SEO Pack Review</a> for details.</p>
<p>Below are the <strong style="color:red;">damaging SEO settings</strong> you are currently using, if there are no <strong style="color:red;">red settings</strong> listed below, well done you haven\'t set any of the damaging SEO features.</p>';}
if ($allinone_options['aiosp_category_noindex']=='on')
{echo '<strong style="color:red;">Use noindex for Categories:</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder : significant SEO damage.<br />';}
if ($allinone_options['aiosp_archive_noindex']=='on')
{echo '<strong style="color:red;">Use noindex for Archives:</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder (ideally you wouldn\'t use the monthly archive widget, wastes link benefit) : significant SEO damage.<br />';}
if ($allinone_options['aiosp_tags_noindex']=='on')
{echo '<strong style="color:red;">Use noindex for Tag Archives:</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder : significant SEO damage.<br />';}
?><?php } ?>