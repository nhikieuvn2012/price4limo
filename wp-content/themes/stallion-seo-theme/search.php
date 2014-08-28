<?php get_header(); ?>
<div id="content_all">
<div id="maincontent">
<?php if (is_active_sidebar('banner-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/banner-widget.php"); ?>
<?php endif; ?>
<?php if(st_feature_slide()==2){ ?><?php include(get_template_directory()."/layout/featured-slideshow.php"); ?><?php } ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">
<?php if(st_kontera_on()==1){echo('<div class="KonaBody">');} ?><?php if(st_linkwords_on()==1){echo('<div id="lw_context_ads">');} ?>
<?php if(have_posts()) : ?>
<!-- google_ad_section_start --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_ON-->');} ?>
<div class="post-meta">
<div class="post-content">
<h1 class="archives">Search For &quot;<?php the_search_query(); ?>&quot;</h1>
</div>
</div>

<?php while(have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post-meta <?php /* semantic_entries(); */ ?> <?php if(st_post_lo()==1){echo 'odd'.($st_odd++%2);} ?>">

<?php get_template_part( 'content', get_post_format() ); ?>
</div>

<?php if ($wp_query->current_post == 4 && st_post_lo() != 1) : ?>
<?php if(st_banners_on()==2 or st_banners_on()==3){ ?><div class="landscape" style="background: url(<?php bloginfo('template_url'); ?><?php _e('/landscape/' . st_banners_set_mid() . '/landscape-'); ?><?php echo(rand(1,st_banners_size_mid())); ?>.jpg) no-repeat"></div><?php } ?>
<?php endif; ?>

<?php endwhile; ?>
<div class="divpadding"></div>
<!-- google_ad_section_end --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>

<?php if(st_chitika_on()==1 && st_chitika_con4()==0){ ?><div class="adscenter">
<?php st_chitika_insert($Chitika4);?>
</div><?php } ?>

<?php if(st_clickbank_on()==1 && st_cb_con2()==0){ ?><div class="adscenter">
<?php st_cb_insert($ClickBank2);?>
</div><?php } ?>

<div class="post-content wp-pagenavi">
<?php if(function_exists('wp_pagenavi')): ?> <?php wp_pagenavi(); ?><?php else : ?>
<?php posts_nav_link(); ?><?php endif; ?>
</div>

<?php if(st_chitika_on()==1 && st_chitika_con3()==0 && st_chitika_switch()==0){ ?><div class="adscenter">
<?php st_chitika_insert($Chitika3); ?>
</div><?php } ?>

<div class="divpadding"></div>

<?php if(st_adsense_on()==1 && st_adsense_con3()==0 && st_adsense_switch()==0){ ?><div class="adscenter">
<?php st_adsense_insert($AdSense3); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()!=0){ ?><div class="adscenter">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>
<?php else: ?>

<h1>Sorry No Match For Your Search</h1>

<?php endif; ?>

<?php if(st_linkwords_on()==1){echo('</div>');} ?><?php if(st_kontera_on()==1){echo('</div>');} ?>
</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>