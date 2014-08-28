<?php
/*
Template Name: 25 Most Recent Comments
*/
?>
<?php get_header(); ?>
<div id="content_all">
<div id="maincontent">
<?php if (is_active_sidebar('banner-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/banner-widget.php"); ?>
<?php endif; ?>
<?php if(st_feature_slide()==1 or st_feature_slide()==2){ ?><?php if(is_front_page()){include(get_template_directory()."/layout/featured-slideshow.php"); } ?><?php } ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">
<?php if(have_posts()) : ?>
<!-- google_ad_section_start --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_ON-->');} ?>
<div id="archives-sitemap" class="post-meta <?php /* semantic_entries(); */ ?>">

<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="post-content">
<?php if(st_social_network()==1){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?><?php } ?>
<?php if (is_active_sidebar('content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/content-widget.php"); ?>
<?php endif; ?>
<?php if(st_adsense_on()==1 && st_adsense_con1()==0){if (st_adsense_main_ad()==0){_e('<div class="' . st_adsense_float() . ' stallionhideads">'); st_adsense_insert($AdSense1);?>
</div><?php }} ?>
<?php if(st_chitika_on()==1 && st_chitika_con1()==0){if (st_chitika_main_ad()==0){_e('<div class="' . st_chitika_float() . ' stallionhideads">'); st_chitika_insert($Chitika1);?>
</div><?php }} ?>
<?php if(st_clickbank_on()==1 && st_cb_con1()==0){if (st_clickbank_main_ad()==0){_e('<div class="' . st_cb_float() . ' stallionhideads">'); st_cb_insert($ClickBank1);?>
</div><?php }} ?>
<p>25 Most Recent Comments on the <?php bloginfo('name'); ?> website</p>

<?php mw_recent_comments(25, false, 100, 50, 100, 'comment_only', '<H3><a href="%permalink%">%title%</a></H3><p><strong>Comment %comid% by %author_name%</strong> on %date%</p><p>%comment_cont%</p><p class="align-right">View post and comment <a href="%permalink%">%title%</a></p><hr>','d.m.y, H:i'); ?>

<!-- google_ad_section_end --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>
</div>

</div>

<div class="divpadding"></div>

<?php if(st_social_network()==2){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?>
<div class="clear"></div><?php } ?>

<?php if (is_active_sidebar('bottom-content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/bottom-content-widget.php"); ?>
<?php endif; ?>

<?php if(st_chitika_on()==1 && st_chitika_con4()==0){ ?><div class="adscenter stallionhideads">
<?php st_chitika_insert($Chitika4);?>
</div><?php } ?>

<?php if(st_clickbank_on()==1 && st_cb_con2()==0){ ?><div class="adscenter stallionhideads">
<?php st_cb_insert($ClickBank2);?>
</div><?php } ?>

<?php if(st_adsense_on()==1 && st_adsense_con3()==0 && st_adsense_switch()==0){ ?><div class="adscenter stallionhideads">
<?php st_adsense_insert($AdSense3); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()==1){ ?><div class="adscenter stallionhideads">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()==2){ ?><div class="adscenter stallionhideads">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>
<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>