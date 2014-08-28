<?php if (function_exists('st_ads_chck')){ ?>
<?php include(get_template_directory()."/ad_includes/chitika.php"); ?>
<?php function st_chitika_widget1() { ?>
<?php if(st_chitika_con1_head()==1): ?>
<span class="gat_widget stallionhidewads">Adverts</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_chitika_con1_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $Chitika2; st_chitika_insert($Chitika2);?>
<?php _e('</' . st_chitika_con1_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'9gat-chitika-ad-s1',
'Stallion Chitika Ad S1 Widget',
'st_chitika_widget1',
array(
'description' => 'Chitika Sidebar Ad Unit 1, change settings under the Stallion Theme >> Chitika Options page'
)
);
?>
<?php function st_chitika_widget2() { ?>
<?php if(st_chitika_lnk5_head()==1): ?>
<span class="gat_widget stallionhidewads">Adverts</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_chitika_lnk5_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $Chitika5; st_chitika_insert($Chitika5);?>
<?php _e('</' . st_chitika_lnk5_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'9gat-chitika-ad-s2',
'Stallion Chitika Ad S2 Widget',
'st_chitika_widget2',
array(
'description' => 'Chitika Sidebar Ad Unit 2, change settings under the Stallion Theme >> Chitika Options page'
)
);
?>
<?php } ?>