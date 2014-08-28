<div class="adsspace">
<?php if(st_adsense_on()==1){ ?><?php include(get_template_directory()."/ad_includes/adsense.php"); ?>
<?php if(st_adsense_switch()==3){ ?><?php if(st_adsense_con3()==0){ ?><div class="centerad stallionhidewads">
<?php st_adsense_insert($AdSense3);?>
</div><?php } ?><?php } ?><?php } ?>
<?php if(st_chitika_on()==1){ ?><?php include(get_template_directory()."/ad_includes/chitika.php"); ?>
<?php if(st_chitika_switch()==3){ ?><?php if(st_chitika_con3()==0){ ?><div class="centerad stallionhidewads">
<?php st_chitika_insert($Chitika3);?>
</div><?php } ?><?php } ?><?php } ?>
</div>