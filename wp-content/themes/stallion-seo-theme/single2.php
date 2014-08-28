<?php get_header2(); ?>
<div id="content_all">
<div id="maincontent">
<?php if (is_active_sidebar('banner-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/banner-widget.php"); ?>
<?php endif; ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post-meta <?php /* semantic_entries(); */ ?>">
<!-- google_ad_section_start --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_ON-->');} ?>
<h1 class="archives"><?php the_title(); ?></h1>

<div class="post-content">
<?php if(st_social_network()==1){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?><?php } ?>
<?php if(st_kontera_on()==1){echo('<div class="KonaBody">');} ?><?php if(st_linkwords_on()==1){echo('<div id="lw_context_ads">');} ?>
<?php if (is_active_sidebar('content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/content-widget.php"); ?>
<?php endif; ?>
<?php if(st_adsense_on()==1 && st_adsense_con1()==0){if ($wp_query->current_post == st_adsense_main_ad()){_e('<div class="' . st_adsense_float() . '">'); st_adsense_insert($AdSense1);?>
</div><?php }} ?>
<?php if(st_chitika_on()==1 && st_chitika_con1()==0){if ($wp_query->current_post == st_chitika_main_ad()){_e('<div class="' . st_chitika_float() . '">'); st_chitika_insert($Chitika1);?>
</div><?php }} ?>
<?php if(st_clickbank_on()==1 && st_cb_con1()==0){if ($wp_query->current_post == st_clickbank_main_ad()){_e('<div class="' . st_cb_float() . '">'); st_cb_insert($ClickBank1);?>
</div><?php }} ?>
<?php the_content() ;?>

<?php if(st_adsense_on()==1 && st_adsense_lnk6()==0 && st_adsense_lnk6_sing()==1){_e('<div class="adscenter">'); st_adsense_insert($AdSense6);?>
</div><?php } ?>

<p class="tags"><?php the_tags(); ?></p>

<div class="clear"></div>
<?php if(st_linkwords_on()==1){echo('</div>');} ?><?php if(st_kontera_on()==1){echo('</div>');} ?>
<!-- google_ad_section_end --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>

<?php if(st_social_network()==2){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?>
<div class="clear"></div><?php } ?>

<?php if (is_active_sidebar('bottom-content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/bottom-content-widget.php"); ?>
<?php endif; ?>

<?php if(st_clickbank_on()==1 && st_cb_con3_sing()==1 && st_cb_con3()==0){_e('<div class="adscenter">'); st_cb_insert($ClickBank3);?>
</div><?php } ?>
<?php if(st_chitika_on()==1 && st_chitika_con6()==0){ ?><div class="adscenter">
<?php st_chitika_insert($Chitika6);?>
</div><?php } ?>
</div>

</div>

<div class="divpadding"></div>

<?php endwhile; ?>

<?php if(st_chitika_on()==1 && st_chitika_con4()==0){ ?><div class="adscenter">
<?php st_chitika_insert($Chitika4);?>
</div><?php } ?>

<?php if (function_exists('echo_ald_crp')) { ?>
<div class="post-meta"><div class="post-content">
<h3>Related Articles to <?php the_title(); ?></h3>
<?php echo_ald_crp(); ?>
</div></div><?php } ?>

<?php if(st_clickbank_on()==1 && st_cb_con2()==0){ ?><div class="adscenter">
<?php st_cb_insert($ClickBank2);?>
</div></div><?php } ?>

<div class="divpadding"></div>

<?php if(st_chitika_on()==1 && st_chitika_con3()==0 && st_chitika_switch()==0){ ?><div class="adscenter">
<?php st_chitika_insert($Chitika3); ?>
</div><?php } ?>

<?php if(st_adsense_on()==1 && st_adsense_con3()==0 && st_adsense_switch()==0){ ?><div class="adscenter">
<?php st_adsense_insert($AdSense3); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()==1){ ?><div class="adscenter">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()==2){ ?><div class="adscenter">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>

<?php else: ?>

<h1>Sorry The Comment Has Been Removed</h1>

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>