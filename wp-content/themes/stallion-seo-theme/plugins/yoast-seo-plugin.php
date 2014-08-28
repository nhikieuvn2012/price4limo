<?php
$wpseo_options = get_wpseo_options();
{echo '<h3>Yoast WordPress SEO Plugin Warnings</h3>
<p>You are using the Yoast WordPress SEO Plugin, some of the settings within this plugin are SEO damaging. See <a target="_blank" href="http://www.google-adsense-templates.co.uk/yoast-wordpress-seo-plugin-review.html">Yoast WordPress SEO Plugin Review</a> for details.</p>
<p>Below are the <strong style="color:red;">damaging SEO settings</strong> you are currently using, if there are no <strong style="color:red;">red settings</strong> listed below, well done you haven\'t set any of the damaging SEO features.</p>
<p><strong>Indexation Rules</strong></p>';}
if ($wpseo_options['search']=='on')
{echo '<strong style="color:red;">This site\'s search result pages</strong> : ON >> Wastes link benefit : minor SEO damage.<br />';}
if ($wpseo_options['noindexsubpages']=='on')
{echo '<strong style="color:red;">Subpages of archives and taxonomies</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder : Significant SEO damage. Use the <a href="http://www.stallion-theme.com/stallion-wordpress-seo-plugin" target="_blank">Stallion SEO Plugin</a> to achieve the same without SEO damage.<br />';}
if ($wpseo_options['noindexauthor']=='on')
{echo '<strong style="color:red;">Author archives</strong> : ON >> Wastes link benefit, unless you have a multi-author site ideally your theme would not link to the author archives (the Stallion theme has this covered) : Minor SEO damage.<br />';}
if ($wpseo_options['noindexdate']=='on')
{echo '<strong style="color:red;">Date-based archives</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder (ideally you wouldn\'t use the monthly archive widget, wastes link benefit) : significant SEO damage. Use the <a href="http://www.stallion-theme.com/stallion-wordpress-seo-plugin" target="_blank">Stallion SEO Plugin</a> to achieve the same without SEO damage.<br />';}
if ($wpseo_options['noindexcat']=='on')
{echo '<strong style="color:red;">Category archives</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder : significant SEO damage. Use the <a href="http://www.stallion-theme.com/stallion-wordpress-seo-plugin" target="_blank">Stallion SEO Plugin</a> to achieve the same without SEO damage.<br />';}
if ($wpseo_options['noindextag']=='on')
{echo '<strong style="color:red;">Tag archives</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder : significant SEO damage. Use the <a href="http://www.stallion-theme.com/stallion-wordpress-seo-plugin" target="_blank">Stallion SEO Plugin</a> to achieve the same without SEO damage.<br />';}
if ($wpseo_options['noindexpostformat']=='on')
{echo '<strong style="color:red;">Post Formats archives</strong> : ON >> Wastes link benefit and makes indexing a site by search engines harder : significant SEO damage.<br />';}
{echo '<p><strong>Internal Nofollow Settings</strong></p>';}
if ($wpseo_options['nofollowmeta']=='on')
{echo '<strong style="color:red;">Nofollow login and registration links</strong> : ON >> Wastes link benefit, though no harm done to Stallion sites, you have custom login links.<br />';}
if ($wpseo_options['nofollowcommentlinks']=='on')
{echo '<strong style="color:red;">Nofollow comments links</strong> : ON >> Wastes link benefit : significant SEO damage.<br />';}
if ($wpseo_options['replacemetawidget']=='on')
{echo '<strong style="color:red;">Replace the Meta Widget with a nofollowed one</strong> : ON >> Wastes link benefit, DO NOT use the Nofollowed widget : significant SEO damage.<br />';}
{echo '<p><strong>Archive Settings</strong><br />I recommend setting all three of these settings to ON, these archives add no SEO value to a site.<br />
Disable the author archives<br />
Disable the date-based archives<br />
Disable the post format archives</p>';}
?>