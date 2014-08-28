<?php if (function_exists('st_seo_chck')){ ?>
<?php
add_action('admin_menu', 'wprobot_stallion_seo');
function wprobot_stallion_seo() {
add_submenu_page( 'wpr-campaigns', 'SEO Settings - WpRobot Plugin'	, 'SEO Settings'		, 8, 'wprobot_seo'	, 'wprobot_seo_settings_page' );
add_action( 'admin_init', 'st_wpseo_register_mysettings' );
add_option(wprobot_seo_on, 'off');
add_option(wprobot_seo_images_folder, '/wp-content/themes/stallion-seo-theme/products/');
add_option(wprobot_seo_folder, 'wprobot3');
add_option(wprobot_seo_amazon_button, 'buynow.gif');
add_option(wprobot_seo_nofollow, 'off');
}

function st_wpseo_register_mysettings() {
register_setting( 'wprobot_seo-group', 'wprobot_seo_on' );
register_setting( 'wprobot_seo-group', 'wprobot_seo_images_folder' );
register_setting( 'wprobot_seo-group', 'wprobot_seo_folder' );
register_setting( 'wprobot_seo-group', 'wprobot_seo_amazon_button' );
register_setting( 'wprobot_seo-group', 'wprobot_seo_nofollow' );
}
function wprobot_seo_settings_page() {
?>
<div class="wrap">
<h2>WPRobot 3 Plugin : Stallion SEO Theme Settings</h2>

<p>Please go to <a href="http://www.45-year-old-millionaire.co.uk/tracking/track.php?id=16" target="_blank">WPRobot 3 Website</a> for general support for the WPRobot 3 plugin</p>
<p>The settings below are only available to Stallion SEO Theme users and improve an autoblogs search engine optimization and reduces thin affiliate content footprints that search engines use to find and downgrade autoblogs.</p>
<p>The WPRobot 3 settings below make no changes to your sites database, the settings act on the content just before it's served to a browser window or a search engine spider (it's rewritten on the fly). This means no matter how much content your autoblog has already posted (could be 100,000 pages) the settings below will SEO that content and any new content. If you deactivate this feature via the Stallion option page (or turn off the Stallion theme/use another theme) your sites content will revert back to what the WPRobot 3 Plugin generates by default.</p>
<form method="post" action="options.php">
<?php settings_fields( 'wprobot_seo-group' ); ?>
<table class="form-tables"> 
<tr valign="top">
<?php $wprobotseoon = get_option('wprobot_seo_on'); ?>
<td width="50%"><strong>WPRobot 3 Plugin SEO Features</strong><br />(WPRobot 3 SEO ON : Highly Recommended).</td>
<td width="50%">
<label for='seo-on'><input type="radio" id="seo-on" name="wprobot_seo_on" value="on" <?php checked('on' == $wprobotseoon); ?><?php checked('' == $wprobotseoon); ?> /> WPRobot 3 SEO ON</label><br />
<label for='seo-off'><input type="radio" id="seo-off" name="wprobot_seo_on" value="off" <?php checked('off' == $wprobotseoon); ?> /> WPRobot 3 SEO OFF</label><br /><br />
</td>
</tr>

<tr valign="top">
<td colspan="2">When set to WPRobot 3 SEO ON, affiliate links and links to articles source etc... will be hidden from search engines using javascript. Your visitors will see a standard text link or in the case of the Amazon buy now image an image link they can click like any other link (will take them to Amazon or the Article sources etc...). Search engines that can not access advanced javascript see just the anchor text of the link or the image minus the link component (it's not clickable).<br /><br />This gives you the best of both worlds SEO wise, you don't waste link benefit on affiliate type links, but the anchor text of those links (which is keyword rich with the WPRobot 3 plugin) is still counted by the search engines.<br /><br />Downside of this SEO technique is visitors with javascript turned off see what search engines see and they can't click the links: it's estimated below 10% of users have javascript turned off. IMO it's a small price to pay for removing an affiliate footprint and saving a lot of link benefit (I use this SEO technique on all my autoblogs and thin affiliate sites).<br /><br />Also fixed a few formatting issues with autoblog content (nothing serious).<br /><br /></td>
</tr>

<tr valign="top">
<?php $wprobotseonofollow = get_option('wprobot_seo_nofollow'); ?>
<td width="50%"><strong>Hide ALL rel="nofollow" Links</strong><br />(ON : Highly Recommended).</td>
<td width="50%">
<label for='seo-nofollow-on'><input type="radio" id="seo-nofollow-on" name="wprobot_seo_nofollow" value="on" <?php checked('on' == $wprobotseonofollow); ?><?php checked('' == $wprobotseonofollow); ?> /> Hide All ON</label><br />
<label for='seo-nofollow-ona'><input type="radio" id="seo-nofollow-ona" name="wprobot_seo_nofollow" value="ona" <?php checked('ona' == $wprobotseonofollow); ?><?php checked('' == $wprobotseonofollow); ?> /> Hide All ON Plus Amazon Comments</label><br />
<label for='seo-nofollow-off'><input type="radio" id="seo-nofollow-off" name="wprobot_seo_nofollow" value="off" <?php checked('off' == $wprobotseonofollow); ?> /> Hide All OFF</label><br /><br />
</td>
</tr>
<tr valign="top">
<td colspan="2">The above setting replaces rel="nofollow" links with format <strong>&lt;a href="http://www.example.com/" rel="nofollow">Anchor Text or Image&lt;/a></strong> and <strong>&lt;a rel="nofollow" href="http://www.example.com/">Anchor Text or Image&lt;/a></strong> with javascript/css based hidden links. These are the link formats used by the default WPRobot 3 module templates AND the same format your average webmaster might use for a manually added rel="nofollow" link.<br /><br />If you've manually set rel="nofollow" links on non-autoblog content within the body of a post or a comment with the above format it will be replaced with a hidden SEO link. Since rel="nofollow" deletes link benefit this is a good thing (can't think of any good reason why anyone would want to keep nofollow links).<br /><br />If this feature is turned off some WPRobot 3 rel="nofollow" links will be missed meaning wasted link benefit and more autoblog footprints for search engines to track.<br /><br />If you have set WPRobot 3 campaigns to convert Amazon reviews into comments you can set the above to "Hide All ON Plus Amazon Comments". This is "Hide All ON" and tries to fix some of HTML errors associated with the Amazon reviews, for example the review content is missing two closing div's (breaks theme formatting), this setting adds two closing div's, removes the yes/no images and other content you don't want added to a comment.</td>
</tr>
<tr valign="top">
<td width="50%"><strong>WPRobot 3 Plugin Folder Location</strong></td>
<td width="50%"><input size="60" type="text" name="wprobot_seo_folder" value="<?php if (get_option('wprobot_seo_folder') == ''){echo 'wprobot3';}else{echo get_option('wprobot_seo_folder');} ?>" /></td>
</tr>

<tr valign="top">
<td colspan="2">This sets the folder name of the WPRobot 3 plugin as found at /wp-content/plugins/.</td>
</tr>
<td colspan="2">It's advisable when using WPRobot 3 to rename the plugin folder from "wprobot3" to something else (like "folder654") ideally before posting any autoblog content so search engines can't easily find your WPRobot 3 usage (there are images under this folder that could be used by search engies as autoblog footprints).<br /><br />The author of the WPRobot 3 plugin advises you rename the folder, if you have you should set the folder name above so the Amazon buy Now Image settings below work.<br /><br />To rename the folder use an FTP program to go to /wp-content/plugins/ and rename the /wprobot3/ folder to something else.<br /><br />This is a must do setting for new autoblogs IMO, for old autoblogs be aware if you have the setting "Save Images to Server" set to Yes the images links will break, if you've not used that setting there shouldn't be a problem renaming now.<br /><br />Note: the above setting does NOT rename the default /wp-content/plugins/WPRobot3/ folder, you change it manually (by FTP for example) and copy the renamed folder name above.<br /><br /></td>
</tr>
<tr valign="top">
<?php $amazon_button = get_option('wprobot_seo_amazon_button'); ?>
<td width="50%"><strong>Amazon Buy Now Image</strong><br />This changes the filename and location of the Amazon image. Reduces an affiliate footprint and matches the buy now image button colours to the Stallion themes.</td>
<td width="50%">
<label for='buynow'><input type="radio" id="buynow.gif" name="wprobot_seo_amazon_button" value="buynow.gif" <?php checked('buynow.gif' == $amazon_button); ?><?php checked('' == $amazon_button); ?> /> Default Amazon Button</label><br />
<label for='buy-amazon'><input type="radio" id="buy-amazon.gif" name="wprobot_seo_amazon_button" value="buy-amazon.gif" <?php checked('buy-amazon.gif' == $amazon_button); ?> /> Thin Amazon Button</label><br />
<label for='buy-now'><input type="radio" id="buy-now.gif" name="wprobot_seo_amazon_button" value="buy-now.gif" <?php checked('buy-now.gif' == $amazon_button); ?> /> Big Amazon Button</label><br />
<label for='buy'><input type="radio" id="buy.gif" name="wprobot_seo_amazon_button" value="buy.gif" <?php checked('buy.gif' == $amazon_button); ?> /> Medium Amazon Button</label><br />
<label for='add-to-cart'><input type="radio" id="add-to-cart.jpg" name="wprobot_seo_amazon_button" value="add-to-cart.jpg" <?php checked('add-to-cart.jpg' == $amazon_button); ?> /> Add To Cart Button</label><br />
<label for='amazon-button'><input type="radio" id="amazon-button.jpg" name="wprobot_seo_amazon_button" value="amazon-button.jpg" <?php checked('amazon-button.jpg' == $amazon_button); ?> /> Another Amazon Button</label><br />
<label for='buy-now-blue'><input type="radio" id="buy-now-blue.gif" name="wprobot_seo_amazon_button" value="buy-now-blue.gif" <?php checked('buy-now-blue.gif' == $amazon_button); ?> /> Light Blue Buy Now Button</label><br />
<label for='buy-now-dark-blue'><input type="radio" id="buy-now-dark-blue.gif" name="wprobot_seo_amazon_button" value="buy-now-dark-blue.gif" <?php checked('buy-now-dark-blue.gif' == $amazon_button); ?> /> Dark Blue Buy Now Button</label><br /> 
<label for='buy-now-green'><input type="radio" id="buy-now-green.gif" name="wprobot_seo_amazon_button" value="buy-now-green.gif" <?php checked('buy-now-green.gif' == $amazon_button); ?> /> Green Buy Now Button</label><br />
<label for='buy-now-grey'><input type="radio" id="buy-now-grey.gif" name="wprobot_seo_amazon_button" value="buy-now-grey.gif" <?php checked('buy-now-grey.gif' == $amazon_button); ?> /> Grey Buy Now Button</label><br />
<label for='buy-now-orange'><input type="radio" id="buy-now-orange.gif" name="wprobot_seo_amazon_button" value="buy-now-orange.gif" <?php checked('buy-now-orange.gif' == $amazon_button); ?> /> Orange Buy Now Button</label><br />
<label for='buy-now-red'><input type="radio" id="buy-now-red.gif" name="wprobot_seo_amazon_button" value="buy-now-red.gif" <?php checked('buy-now-red.gif' == $amazon_button); ?> /> Red Buy Now Button</label><br />
<label for='buy-now-yellow'><input type="radio" id="buy-now-yellow.gif" name="wprobot_seo_amazon_button" value="buy-now-yellow.gif" <?php checked('buy-now-yellow.gif' == $amazon_button); ?> /> Yellow Buy Now Button</label><br /><br />
</td>
</tr>

<tr valign="top">
<td width="50%"><strong>WPRobot 3 Plugin Image Folder</strong></td>
<td width="50%"><input size="60" type="text" name="wprobot_seo_images_folder" value="<?php if (get_option('wprobot_seo_images_folder') == ''){echo '/wp-content/themes/'.get_option('template').'/products/';}else{echo get_option('wprobot_seo_images_folder');} ?>" /></td>
</tr>

<tr valign="top">
<td colspan="2">This changes the folder location of the Stallion theme WPRobot 3 plugins images (Amazon Buy Now button images). By default they will be found in the folder /wp-content/themes/<?php echo get_option('template'); ?>/products/.<br /><br />You can leave it as above or for even better removal of this affiliate footprint set the location by copying (use FTP: Filezilla for example) the /products/ folder (found within the Stallion themes zip file) somewhere on your server (you can also rename it) and setting the location box above with format<br /><br />
for location www.example.com/products/ use /products/<br /><br />
for location www.example.com/wp-content/uploads/images/ use /wp-content/uploads/images/<br /><br />
In this second example I renamed the /products/ folder to /images/ and uploaded it to /wp-content/uploads/ using FTP. You can put this folder anywhere on the main domain and rename it whatever you like.<br /><br />If you make a mistake or want to go back to the default, just empty the box above (delete the contents) and click the "Save Changes" button below, the default will be reset.</td>
</tr>
</table>
<p class="submit"><input type="submit" class="button-primary" value="<?php if (get_option('wprobot_seo_on')=='') {echo 'Save Settings For the First Time';}elseif (get_option('wprobot_seo_on')!='') {echo 'Save Changes';} ?>" /></p>
</form>
</div>
<?php } ?>
<?php
add_filter( 'the_content', 'st_wpseo_the_content' , 99 );
function st_wpseo_the_content( $content )
{
$content = str_replace('<p></p>', '',$content);
$content = str_replace('<br/>', '<br />',$content);
$content = str_replace('<br>', '<br />',$content);
$content = str_replace('<BR>', '<br />',$content);
$content = str_replace('target="_top"', '',$content);
$content = preg_replace('/<img src=http:(.*?)default.jpg \/>/i', '<img src="http:$1default.jpg" />', $content);
if (get_option('wprobot_seo_on') == 'on'){
$content = preg_replace('/alt="(.*?)" href=/i', 'href=', $content);
$content = preg_replace('/onclick="javascript:_gaq.push(.*?);" href=/i', 'href=', $content);
$content = preg_replace('/<a href="http:\/\/(.*?)\/go\/(.*?) rel="nofollow"(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://$1/go/$2$3</span>', $content);
$content = preg_replace('/<a href="http:\/\/(.*?)\/go\/(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://$1/go/$2</span>', $content);
$content = preg_replace('/<a href="http:\/\/rover.ebay.(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://rover.ebay.$1</span>', $content);
$content = preg_replace('/<a href="http:\/\/www.articlesbase.com\/(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://www.articlesbase.com/$1">$2</span>', $content);
$content = preg_replace('/<a href="http:\/\/www.flickr.com\/(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://www.flickr.com/$1">$2</span>', $content);
$content = preg_replace('/<a target="_blank" href="(.*?)" rel="nofollow external" title="(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$3</span>', $content);
$content = preg_replace('/<a target="_blank" href="(.*?)" rel="nofollow external">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel="nofollow" >(.*?)<\/a>/i', '<strong>$1</strong>', $content);
$content = preg_replace('/<a rel="nofollow">(.*?)<\/a>/i', '<strong>$1</strong>', $content);
if (get_option('wprobot_seo_nofollow') == 'ona'){
$content = preg_replace('/<div style="margin-bottom:0.5em\;">(.*?)people found the following review helpful:(.*?)<\/div>/si', '', $content);
$content = preg_replace('/<span style="margin-left: -5px\;"><img src="http:\/\/g-ecx.images-amazon.com\/(.*?)border="0"\/><\/span><br \/>/si', '', $content);
$content = preg_replace('/<span style="font-weight: bold\;">(.*?)<\/span>/i', '$1', $content);
$content = preg_replace('/<span class="h3color tiny">(.*?)<\/span>/i', '$1', $content);
$content = preg_replace('/<span class="crVerifiedStripe"><b class="h3Color tiny" style="margin-right: 0.5em\;">Amazon Verified Purchase<\/b><span class="tiny verifyWhatsThis">(.*?)\', \'AmazonHelp\', \'width=400,height=500,resizable=1,scrollbars=1,toolbar=0,status=1\'\)\;return false\; ">What(.*?)s this\?(.*?)\)<\/span><\/span>/i', '', $content);
$content = preg_replace('/<a(.*?)href=http(.*?)>/i', '<a$1href="http$2">', $content);
$content = preg_replace('/<a rel="nofollow" class="votingButtonReviews" href="(.*?)alt="Yes" style="vertical-align:middle\;" height="18" border="0"\/><\/a>/si', ' ', $content);
$content = preg_replace('/<a rel="nofollow" class="votingButtonReviews" href="(.*?)alt="no" style="vertical-align:middle\;" height="18" border="0"\/><\/a>/si', ' ', $content);
$content = str_replace('<span class="votingMessage"/></span>', '',$content);
$content = preg_replace('/<span class="reportingButton"><nobr><a rel="nofollow" class="reportingButton" href="http:\/\/www.amazon.com\/gp\/voting\/cast\/Reviews\/(.*?)"><\/a><\/nobr><\/span>/si', ' ', $content);
$content = preg_replace('/<div style="white-space:nowrap\;padding-left:-5px\;padding-top:5px\;"><span class="(.*?)>Comment(.*?)<\/span><\/div>/si', '</div></div>', $content);
$content = preg_replace('/<a href="http:\/\/www.amazon.(.*?)" >(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://www.amazon.$1">$2</span>', $content);
$content = preg_replace('/<div style="white-space:nowrap\;"><span class="tiny">(.*?)<\/span><\/div>/si', ' ', $content);
$content = str_replace('<div style="float:left; padding-right:15px; border-right:1px solid #CCCCCC">', '<div>',$content);
$content = preg_replace('/<a href="\/gp\/help\/customer\/display.html\/ref=cm_rn_bdg_help\/(.*?).gif" width="70" align="absmiddle" alt="\(REAL NAME\)" height="15" border="0"\/><\/a>/si', '', $content);
$content = preg_replace('/<span class="crVerifiedStripe"><b class="h3Color tiny" style="margin-right: 0.5em\;">Amazon Verified Purchase<\/b><span class="tiny verifyWhatsThis">(.*?)return false\; ">What(.*?)s this\?<\/a>\)<\/span><\/span>/i', '', $content);
$content = str_replace('<div style="margin-left:0.5em;">', '<div>',$content);
$content = str_replace('<div style="margin-bottom:0.5em;">', '<div>',$content);
$content = str_replace('<div class="tiny" style="margin-bottom:0.5em;">', '<div>',$content);
$content = str_replace('<div style="padding-top: 10px; clear: both; width: 100%;">', '<div>',$content);
$content = str_replace('<div style="padding-bottom:5px;"><b class="tiny" style="color:#666666;white-space:nowrap;">', '<div><b>',$content);
$content = str_replace('" target="AmazonHelp" onclick="return amz_js_PopWin(this.href,\'AmazonHelp\',\'width=340,height=340,resizable=1,scrollbars=1,toolbar=1,status=1\');">', '">',$content);
}
if (get_option('wprobot_seo_nofollow') == 'on' || get_option('wprobot_seo_nofollow') == 'ona'){
$content = preg_replace('/<a href="(.*?)" rel="nofollow">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a href=\'(.*?)\' rel=\'nofollow\'>(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel="nofollow" href="(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel=\'nofollow\' href=\'(.*?)\'>(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
}
}
if (get_option('wprobot_seo_images_folder') == ''){
$content = preg_replace('/<img src="(.*?)"  alt="(.*?)" title="(.*?)" \/>/i', '<img src="$1" alt="$2" />', $content);
$content = preg_replace('/<img src="(.*?)" alt="(.*?)" title="(.*?)" \/>/i', '<img src="$1" alt="$2" />', $content);
}
else{
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/'.get_option('wprobot_seo_folder').'\/images\/buynow-big.gif" \/>/i', '<img src="$1'.get_option('wprobot_seo_images_folder').''.get_option('wprobot_seo_amazon_button').'"  alt="Buy Product" />', $content);
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/'.get_option('wprobot_seo_folder').'\/images\/buynow-small.gif" \/>/i', '<img src="$1'.get_option('wprobot_seo_images_folder').''.get_option('wprobot_seo_amazon_button').'"  alt="Buy Product" />', $content);
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/'.get_option('wprobot_seo_folder').'\/images\/buynow-ger.gif" \/>/i', '<img src="$1'.get_option('wprobot_seo_images_folder').''.get_option('wprobot_seo_amazon_button').'"  alt="Buy Product" />', $content);
}
return $content; 
}
?>
<?php if (get_option('wprobot_seo_on') == 'on'){
add_filter( 'comment_text', 'st_wpseo_nofollow_comment' , 99 );
function st_wpseo_nofollow_comment( $content )
{
$content = str_replace('<p></p>', '',$content);
$content = str_replace('<br/>', '<br />',$content);
$content = str_replace('<br>', '<br />',$content);
$content = str_replace('<BR>', '<br />',$content);
$content = str_replace('target="_top"', '',$content);
if (get_option('wprobot_seo_nofollow') == 'ona'){
$content = preg_replace('/<div style="margin-bottom:0.5em\;">(.*?)people found the following review helpful:(.*?)<\/div>/si', '', $content);
$content = preg_replace('/<span style="margin-left: -5px\;"><img src="http:\/\/g-ecx.images-amazon.com\/(.*?)border="0"\/><\/span><br \/>/si', '', $content);
$content = preg_replace('/<span style="font-weight: bold\;">(.*?)<\/span>/i', '$1', $content);
$content = preg_replace('/<span class="h3color tiny">(.*?)<\/span>/i', '$1', $content);
$content = preg_replace('/<span class="crVerifiedStripe"><b class="h3Color tiny" style="margin-right: 0.5em\;">Amazon Verified Purchase<\/b><span class="tiny verifyWhatsThis">\(<a href="http:\/\/www.amazon.com\/gp\/community-help\/amazon-verified-purchase\/(.*?)" target="AmazonHelp" onclick="amz_js_PopWin\(\'http:\/\/www.amazon.com\/gp\/community-help\/amazon-verified-purchase\/(.*?)\', \'AmazonHelp\', \'width=400,height=500,resizable=1,scrollbars=1,toolbar=0,status=1\'\)\;return false\; ">What(.*?)s this\?<\/a>\)<\/span><\/span>/i', '', $content);
$content = preg_replace('/<a href="http:\/\/www.amazon.(.*?)" >(.*?)<\/a>/i', '<span class="affst" title="tests" id="http://www.amazon.$1">$2</span>', $content);
$content = preg_replace('/<a(.*?)href=http(.*?)>/i', '<a$1href="http$2">', $content);
$content = preg_replace('/<a rel="nofollow" class="votingButtonReviews" href="http:\/\/www.amazon.com\/gp\/voting\/cast\/Reviews\/(.*?)alt="Yes" style="vertical-align:middle\;" height="18" border="0"\/><\/a>/si', ' ', $content);
$content = preg_replace('/<a rel="nofollow" class="votingButtonReviews" href="http:\/\/www.amazon.com\/gp\/voting\/cast\/Reviews\/(.*?)alt="no" style="vertical-align:middle\;" height="18" border="0"\/><\/a>/si', ' ', $content);
$content = str_replace('<span class="votingMessage"/></span>', '',$content);
$content = preg_replace('/<span class="reportingButton"><nobr><a rel="nofollow" class="reportingButton" href="http:\/\/www.amazon.com\/gp\/voting\/cast\/Reviews\/(.*?)"><\/a><\/nobr><\/span>/si', ' ', $content);
$content = preg_replace('/<div style="white-space:nowrap\;padding-left:-5px\;padding-top:5px\;"><span class="affst" title="tests" id="http:\/\/www.amazon.(.*?)"><img src="http:\/\/g-ecx.images-amazon.(.*?)" width="16" alt="Comment" hspace="3" align="absmiddle" height="16" border="0"\/><\/span>(.*?)<span class="affst" title="tests" id="http:\/\/www.amazon.(.*?)wasThisHelpful">Comment(.*?)<\/span><\/div>/i', ' ', $content);
$content = preg_replace('/<div style="white-space:nowrap\;"><span class="tiny">(.*?)<\/span><\/div>/si', ' ', $content);
$content = str_replace('<div style="float:left; padding-right:15px; border-right:1px solid #CCCCCC">', '<div>',$content);
$content = preg_replace('/<a href="(.*?)\/help\/customer\/display.html\/ref=cm_rn_bdg_help\/(.*?).gif" width="70" align="absmiddle" alt="(.*?)" height="15" border="0"\/><\/a>/si', '', $content);
$content = preg_replace('/<span class="crVerifiedStripe"><b class="h3Color tiny" style="margin-right: 0.5em\;">Amazon Verified Purchase<\/b><span class="tiny verifyWhatsThis">(.*?)return false\; ">What(.*?)s this\?<\/a>\)<\/span><\/span>/i', '', $content);
$content = preg_replace('/<span class="crVerifiedStripe"><b class="h3Color tiny" style="margin-right: 0.5em\;">Amazon Verified Purchase<\/b><span class="tiny verifyWhatsThis">(.*?)>What(.*?)s this\?\)<\/span><\/span>/i', '', $content);
$content = str_replace('<div style="margin-left:0.5em;">', '<div>',$content);
$content = str_replace('<div style="margin-bottom:0.5em;">', '<div>',$content);
$content = str_replace('<div class="tiny" style="margin-bottom:0.5em;">', '<div>',$content);
$content = str_replace('<div style="padding-top: 10px; clear: both; width: 100%;">', '<div>',$content);
$content = str_replace('<div style="padding-bottom:5px;"><b class="tiny" style="color:#666666;white-space:nowrap;">', '<div><b>',$content);
}
if (get_option('wprobot_seo_nofollow') == 'on' || get_option('wprobot_seo_nofollow') == 'ona'){
$content = preg_replace('/<a href="(.*?)" rel="nofollow">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a href=\'(.*?)\' rel=\'nofollow\'>(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel="nofollow" href="(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel=\'nofollow\' href=\'(.*?)\'>(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
}
return $content; 
}}
?>
<?php } ?>