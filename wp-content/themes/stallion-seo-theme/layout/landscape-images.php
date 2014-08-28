<?php if(st_clickbank_on()==1){ ?><?php include(get_template_directory()."/ad_includes/clickbank.php"); ?><?php } ?><?php if(st_adsense_on()==1){ ?><?php include(get_template_directory()."/ad_includes/adsense.php"); ?>
<?php if(st_adsense_switch()==1){ ?><?php if(st_adsense_con3()==0){ ?><div class="centerad stallionhideads">
<?php st_adsense_insert($AdSense3);?>
</div><?php } ?><?php } ?>
<?php if(st_adsense_switch()==0 or st_adsense_switch()==3){ ?><?php if(st_adsense_lnk4()==0){ ?><div class="centerad stallionhidewads">
<?php st_adsense_insert($AdSense4);?>
</div><?php } ?><?php } ?>
<?php } ?>
<?php if(st_chitika_on()==1){ ?><?php include(get_template_directory()."/ad_includes/chitika.php"); ?>
<?php if(st_chitika_switch()==1){ ?><?php if(st_chitika_con3()==0){ ?><div class="centerad stallionhidewads">
<?php st_chitika_insert($Chitika3);?>
</div><?php } ?><?php } ?>
<?php } ?>
<?php st_banners_disp(); ?>
<?php if(st_banners_on()==1 or st_banners_on()==3){ ?><div class="landscape" style="background: url(<?php bloginfo('template_url'); ?><?php _e('/landscape/' . st_banners_set() . '/landscape-'); ?><?php echo(rand(1,st_banners_size())); ?>.jpg) no-repeat"></div><?php } ?>