<?php if (function_exists('st_seo_chck')){ ?>
<?php
add_action('admin_menu', 'mpp_stallion_seo');
function mpp_stallion_seo() {
    add_submenu_page( 'mppmain', 'SEO Settings - Massive Passive Plugin'	, 'SEO Settings'		, 8, 'mpp_seo'	, 'mpp_seo_settings_page' );
	add_action( 'admin_init', 'st_mpp_register_mysettings' );
}
function st_mpp_register_mysettings() {
	register_setting( 'mpp-group', 'mpp_images_folder' );
	register_setting( 'mpp-group', 'mpp_seo_on' );
	register_setting( 'mpp-group', 'mpp_amazon_button' );
}
function mpp_seo_settings_page() {
?>
<div class="wrap">
<h2>Massive Passive Profits Plugin : Stallion SEO Theme Settings</h2>

<p>Please go to <a href="http://www.45-year-old-millionaire.co.uk/tracking/track.php?id=21" target="_blank">Massive Passive Website</a> for general support for the MPP plugin</p>
<p>The settings below are only available to Stallion SEO Theme users and improve an autoblogs search engine optimization and reduces thin affiliate content footprints that search engines use to find and downgrade autoblogs.</p>
<p>The MMP settings below make no changes to your sites database, the settings act on the content just before it's served to a browser window or a search engine spider (it's rewritten on the fly). This means no matter how much content your autoblog has already posted (could be 100,000 pages) the settings below will SEO that content and any new content. If you deactivate this feature via the Stallion option page (or turn off the Stallion theme/use another theme) your sites content will revert back to what the Massive Passive Plugin generates by default.</p>
<p>Upon your first visit to this page the settings below need to be saved in the database, click the button labeled "Save Settings For the First Time" otherwise not all features will work.</p>

<form method="post" action="options.php">
<?php settings_fields( 'mpp-group' ); ?>
<table class="form-tables"> 
<tr valign="top">
<?php $mppseoon = get_option('mpp_seo_on'); ?>
<td width="50%"><strong>MPP Plugin SEO Features</strong><br />(SEO ON : Highly Recommended).</td>
<td width="50%">
<label for='seo-on'><input type="radio" id="seo-on" name="mpp_seo_on" value="on" <?php checked('on' == $mppseoon); ?><?php checked('' == $mppseoon); ?> /> SEO ON</label><br />
<label for='seo-off'><input type="radio" id="seo-off" name="mpp_seo_on" value="off" <?php checked('off' == $mppseoon); ?> /> SEO OFF</label><br />
</td>
</tr>

<tr valign="top">
<td colspan="2">When set to SEO ON, affiliate links and links to articles source etc... will be hidden from search engines using javascript. Your visitors will see a standard text link or in the case of the Amazon buy now image an image link they can click like any other link (will take them to Amazon or the Article sources etc...). Search engines that can not access advanced javascript see just the anchor text of the link or the image minus the link component (it's not clickable).<br /><br />This gives you the best of both worlds SEO wise, you don't waste link benefit on affiliate type links, but the anchor text of those links (which is keyword rich with the MMP plugin) is still counted by the search engines.<br /><br />Downside of this SEO technique is visitors with javascript turned off see what search engines see and they can't click the links: it's estimated below 10% of users have javascript turned off. IMO it's a small price to pay for removing an affiliate footprint and saving a lot of link benefit (I use this SEO technique on all my autoblogs and thin affiliate sites).<br /><br />Also fixed a few formatting issues with autoblog content (nothing serious) and changed the image rating setting for Amazon products, by default when an image has no rating it links to an image (0.png) that doesn't exist and adds no rating number. Since we want visitors to buy the product changed it to point to the 4 star rating :-)<br /><br /></td>
</tr>
<tr valign="top">
<?php $amazon_button = get_option('mpp_amazon_button'); ?>
<td width="50%"><strong>Amazon Buy Now Image</strong><br />This changes the filename and location of the Amazon image. Reduces an affiliate footprint.</td>
<td width="50%">
<label for='buynow'><input type="radio" id="buynow.gif" name="mpp_amazon_button" value="buynow.gif" <?php checked('buynow.gif' == $amazon_button); ?><?php checked('' == $amazon_button); ?> /> Default Amazon Button</label><br />
<label for='buy-amazon'><input type="radio" id="buy-amazon.gif" name="mpp_amazon_button" value="buy-amazon.gif" <?php checked('buy-amazon.gif' == $amazon_button); ?> /> Thin Amazon Button</label><br />
<label for='buy-now'><input type="radio" id="buy-now.gif" name="mpp_amazon_button" value="buy-now.gif" <?php checked('buy-now.gif' == $amazon_button); ?> /> Big Amazon Button</label><br />
<label for='buy'><input type="radio" id="buy.gif" name="mpp_amazon_button" value="buy.gif" <?php checked('buy.gif' == $amazon_button); ?> /> Medium Amazon Button</label><br />
<label for='add-to-cart'><input type="radio" id="add-to-cart.jpg" name="mpp_amazon_button" value="add-to-cart.jpg" <?php checked('add-to-cart.jpg' == $amazon_button); ?> /> Add To Cart Button</label><br />
<label for='amazon-button'><input type="radio" id="amazon-button.jpg" name="mpp_amazon_button" value="amazon-button.jpg" <?php checked('amazon-button.jpg' == $amazon_button); ?> /> Another Amazon Button</label><br />
<label for='buy-now-blue'><input type="radio" id="buy-now-blue.gif" name="mpp_amazon_button" value="buy-now-blue.gif" <?php checked('buy-now-blue.gif' == $amazon_button); ?> /> Light Blue Buy Now Button</label><br />
<label for='buy-now-dark-blue'><input type="radio" id="buy-now-dark-blue.gif" name="mpp_amazon_button" value="buy-now-dark-blue.gif" <?php checked('buy-now-dark-blue.gif' == $amazon_button); ?> /> Dark Blue Buy Now Button</label><br /> 
<label for='buy-now-green'><input type="radio" id="buy-now-green.gif" name="mpp_amazon_button" value="buy-now-green.gif" <?php checked('buy-now-green.gif' == $amazon_button); ?> /> Green Buy Now Button</label><br />
<label for='buy-now-grey'><input type="radio" id="buy-now-grey.gif" name="mpp_amazon_button" value="buy-now-grey.gif" <?php checked('buy-now-grey.gif' == $amazon_button); ?> /> Grey Buy Now Button</label><br />
<label for='buy-now-orange'><input type="radio" id="buy-now-orange.gif" name="mpp_amazon_button" value="buy-now-orange.gif" <?php checked('buy-now-orange.gif' == $amazon_button); ?> /> Orange Buy Now Button</label><br />
<label for='buy-now-red'><input type="radio" id="buy-now-red.gif" name="mpp_amazon_button" value="buy-now-red.gif" <?php checked('buy-now-red.gif' == $amazon_button); ?> /> Red Buy Now Button</label><br />
<label for='buy-now-yellow'><input type="radio" id="buy-now-yellow.gif" name="mpp_amazon_button" value="buy-now-yellow.gif" <?php checked('buy-now-yellow.gif' == $amazon_button); ?> /> Yellow Buy Now Button</label><br /><br />
</td>
</tr>

<tr valign="top">
<td width="50%"><strong>MPP Plugin Image Folder</strong></td>
<td width="50%"><input size="60" type="text" name="mpp_images_folder" value="<?php if (get_option('mpp_images_folder') == ''){echo '/wp-content/themes/'.get_option('template').'/products/';}else{echo get_option('mpp_images_folder');} ?>" /></td>
</tr>

<tr valign="top">
<td colspan="2">This changes the folder location of the MMP plugins images (Amazon buynow button and YouTube video rating images). By default they will be found in the folder /wp-content/themes/<?php echo get_option('template'); ?>/products/.<br /><br />You can leave it as above or for even better removal of this affiliate footprint set the location by copying (use FTP: Filezilla for example) the /products/ folder (found within the Stallion themes zip file) somewhere on your server (you can also rename it) and setting the location box above with format /products/ for location www.example.com/products/ or /wp-content/uploads/images/ for location www.example.com/wp-content/uploads/images/ (in this example I renamed the /products/ folder to /images/ and uploaded to /wp-content/uploads/ using FTP). You can put this folder anywhere on the main domain and rename it whatever you like.<br /><br />If you make a mistake or want to go back to the default, just empty the box above (delete the contents) and click the "Save Changes" button below, the default will be reset.</td>
</tr>
</table>
<p class="submit"><input type="submit" class="button-primary" value="<?php if (get_option('mpp_seo_on')=='') {echo 'Save Settings For the First Time';}elseif (get_option('mpp_seo_on')!='') {echo 'Save Changes';} ?>" /></p>
</form>
</div>
<?php } ?>
<?php
add_filter( 'the_content', 'mmpp_the_content' );
function mmpp_the_content( $content )
{
$content = str_replace('<p></p>', '',$content);
$content = str_replace('<br/>', '<br />',$content);
$content = str_replace('<br>', '<br />',$content);
$content = str_replace('<BR>', '<br />',$content);
if (get_option('mpp_seo_on') == 'on'){
$content = preg_replace('/<a target="_blank" href="(.*?)" rel="nofollow external" title="(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$3</span>', $content);
$content = preg_replace('/<a target="_blank" href="(.*?)" rel="nofollow external">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel="nofollow" href="(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel="nofollow" >(.*?)<\/a>/i', '<strong>$1</strong>', $content);
$content = preg_replace('/<a rel="nofollow">(.*?)<\/a>/i', '<strong>$1</strong>', $content);}
if (get_option('mpp_images_folder') == ''){
$content = preg_replace('/<img src="(.*?)"  alt="(.*?)" title="(.*?)" \/>/i', '<img src="$1" alt="$2" />', $content);
$content = preg_replace('/<img src="(.*?)" alt="(.*?)" title="(.*?)" \/>/i', '<img src="$1" alt="$2" />', $content);
$content = preg_replace('/<img src="(.*?)" title="(.*?)" alt="(.*?)" \/>/i', '<img src="$1" alt="YouTube Video $3" />', $content);}
else{
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/wp-mpp\/img\/buynow.gif"  alt="(.*?)" title="(.*?)" \/>/i', '<img src="$1'.get_option('mpp_images_folder').''.get_option('mpp_amazon_button').'"  alt="$2" />', $content);
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/wp-mpp\/img\/buynow.gif" alt="(.*?)" title="(.*?)" \/>/i', '<img src="$1'.get_option('mpp_images_folder').''.get_option('mpp_amazon_button').'"  alt="$2" />', $content);
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/wp-mpp\/img\/0.png"(.*?)\/>/i', '<img src="$1'.get_option('mpp_images_folder').'4.png" alt="Product Rating 4" />', $content);
$content = preg_replace('/<img src="(.*?)\/wp-content\/plugins\/wp-mpp\/img\/(.*?).png" title="(.*?)" alt="(.*?)" \/>/i', '<img src="$1'.get_option('mpp_images_folder').'$2.png" alt="YouTube Video $4" />', $content);}
$content = str_replace("<span style=\\\\\\'float:left\\\\\\'>", "<span style='float:left'>",$content);    
return $content; 
}
?><?php } ?>