<?php if (function_exists('st_ads_chck')){ ?>
<?php include(get_template_directory()."/ad_includes/adsense.php"); ?>
<?php function st_adsense_widget_1() { ?>
<?php if(st_adsense_con1_head()==1): ?>
<span class="gat_widget stallionhidewads">Adverts</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_adsense_con1_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $AdSense2; st_adsense_insert($AdSense2);?>
<?php _e('</' . st_adsense_con1_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'1gat-adsense-content-s1',
'Stallion AdSense Content S1 Widget',
'st_adsense_widget_1',
array(
'description' => 'Sidebar Content Ad Unit 3, change settings under the Stallion Theme >> AdSense Options page'
)
);
?>
<?php function st_adsense_widget_2() { ?>
<?php if(st_adsense_lnk5_head()==1): ?>
<span class="gat_widget stallionhidewads">Related Searches</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_adsense_lnk5_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $AdSense5; st_adsense_insert($AdSense5);?>
<?php _e('</' . st_adsense_lnk5_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'9gat-adsense-link-s2',
'Stallion AdSense Link S2 Widget',
'st_adsense_widget_2',
array(
'description' => 'Sidebar Link Ad Unit 6, change settings under the Stallion Theme >> AdSense Options page'
)
);
?>
<?php if(st_adsense_con1()==1 or st_adsense_con3()==1){ ?>
<?php function st_adsense_widget_7() { ?>
<?php if(st_adsense_con7_head()==1): ?>
<span class="gat_widget stallionhidewads">Adverts</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_adsense_con7_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $AdSense7; st_adsense_insert($AdSense7);?>
<?php _e('</' . st_adsense_con7_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'1gat-adsense-content-s1-extra',
'Stallion AdSense Content S1 Extra Widget',
'st_adsense_widget_7',
array(
'description' => 'Sidebar Content Ad Unit 3x, change settings under the Stallion Theme >> AdSense Options page'
)
);
?>
<?php } ?>
<?php
#Stallion Test Feature : Google AdSense Search Intigration.
#
# Create an "AdSense for Search" ad unit at https://www.google.com/adsense/adsense-products
# Within the final code you will see a line like this:
# <input type="hidden" name="cx" value="partner-pub-8325072546567078:RANDOMCHARACHTERS" />
# Add the RANDOMCHARACHTERS code to the Stallion Adsense options page.
# Your main Google AdSense ID is taken from the main Stallion theme Options page, so don't forget to set that as well. AdSense also needs to be turned on for this widget to be available.
#
# Drag and Drop the "9GAT Google AdSense Search" widget to a sidebar to activate.
# 
# This is a new Stallion feature I've not finished yet, currently it only works with the setting "Open results on Google in a new window", if you select "Open results within my own site" it won't open the results in your own site. Many of the other settings you select do work. If you find the search results have a Stallion logo at the top with a link to http://www.stallion-theme.com/stallion-seo-ad-theme-clickbank-affiliate-program you've probably made a mistake (that's my default search setup).
?>
<?php function st_Search_google() { ?>
<span class="gat_widget">Search</span>
<script type="text/javascript">
function displaygoogle(checkbox) {
if (checkbox.checked) {
document.getElementById("googlesearchbox").style.display = 'block';
document.getElementById("searchforms").style.display = 'none';
document.getElementById("googlesearchinput").value = document.getElementById("searchsubmit").value;
}
else {
document.getElementById("googlesearchbox").style.display = 'none';
document.getElementById("searchforms").style.display = 'block';
document.getElementById("searchsubmit").value = document.getElementById("googlesearchinput").value;
}
}
</script>
<div class="loginfm">
<input type="checkbox" onclick="displaygoogle(this);" /> <small>Use Google Search</small>
<div id="googlesearchbox" style="display:none">
<!--GOOGLE-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load('search', '1');
google.setOnLoadCallback(function() {
google.search.CustomSearchControl.attachAutoCompletion(
'<?php _e('partner-' . st_adsense_pub() . ':' . st_googlesearch()); ?>',
document.getElementById('googlesearchinput'),
'cse-search-box');
});
</script>

<form action="http://www.google.com/cse" id="cse-search-box" target="_blank">
<div><input type="hidden" name="cx" value="<?php _e('partner-' . st_adsense_pub() . ':' . st_googlesearch()); ?>" />
<input type="hidden" name="ie" value="ISO-8859-1" />
<input type="text" name="q" autocomplete="off" style="width: 95%;" id="googlesearchinput" />
<span class="art-button-wrapper">
<span class="l"> </span>
<span class="r"> </span>
<input class="art-button" type="submit" name="sa" value="Search" />
</span>
<img style="vertical-align:text-top;" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google Custom Search" />
</div>
</form>
</div>
</div>
<div id="searchforms">
<div class="loginfm">
<form method="get" id="searchwidget" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<div><label class="screen-reader-text" for="s"></label>
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Go" />
</div>
</form>
</div>
</div>
<?php } wp_register_sidebar_widget(
'9gat-google-adsense-search',
'Stallion AdSense Google Search Widget',
'st_Search_google',
array(
'description' => 'Google AdSense Search Widget, change settings under the Stallion Theme >> AdSense Options page'
)
);
?>
<?php } ?>