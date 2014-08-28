<?php if (function_exists('st_ads_chck')){ ?>
<?php include(get_template_directory()."/ad_includes/clickbank.php"); ?>
<?php function st_clickbank_widget1() { ?>
<?php if(st_cb_side4_head()==1): ?>
<span class="gat_widget stallionhidewads">Related Products</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_cb_side4_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $ClickBank4; st_cb_insert($ClickBank4);?>
<?php _e('</' . st_cb_side4_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'9gat-clickbank-s1',
'Stallion Clickbank S1 Widget',
'st_clickbank_widget1',
array(
'description' => 'Clickbank Sidebar Ad Unit 1, change settings under the Stallion Theme >> Clickbank Options page'
)
);
?>
<?php function st_clickbank_widget2() { ?>
<?php if(st_cb_side5_head()==1): ?>
<span class="gat_widget stallionhidewads">Related Products</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_cb_side5_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $ClickBank5; st_cb_insert($ClickBank5);?>
<?php _e('</' . st_cb_side5_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'9gat-clickbank-s2',
'Stallion Clickbank S2 Widget',
'st_clickbank_widget2',
array(
'description' => 'Clickbank Sidebar Ad Unit 2, change settings under the Stallion Theme >> Clickbank Options page'
)
);
?>
<?php function st_clickbank_widget3() { ?>
<?php if(st_cb_side6_head()==1): ?>
<span class="gat_widget stallionhidewads">Related Products</span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_cb_side6_bg() . ' class="alcenter stallionhidewads">'); ?>
<?php global $ClickBank6; st_cb_insert($ClickBank6);?>
<?php _e('</' . st_cb_side6_bg() . '>'); ?>
<?php } wp_register_sidebar_widget(
'9gat-clickbank-s3',
'Stallion Clickbank S3 Widget',
'st_clickbank_widget3',
array(
'description' => 'Clickbank Sidebar Ad Unit 3, change settings under the Stallion Theme >> Clickbank Options page'
)
);
?>
<?php } ?>