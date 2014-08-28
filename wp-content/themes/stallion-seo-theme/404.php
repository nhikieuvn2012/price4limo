<?php get_header(); ?>
<div id="content_all">
<div id="maincontent">
<?php if (is_active_sidebar('banner-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/banner-widget.php"); ?>
<?php endif; ?>
<?php if(st_feature_slide()==1 or st_feature_slide()==2){ ?><?php include(get_template_directory()."/layout/featured-slideshow.php"); ?><?php } ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">
<?php if(st_kontera_on()==1){echo('<div class="KonaBody">');} ?><?php if(st_linkwords_on()==1){echo('<div id="lw_context_ads">');} ?>

<div class="post-meta">
<div class="post-content">

<h2>Page Not Found on <?php bloginfo('name'); ?> Site</h2>

<?php if(st_adsense_on()==1){if (st_adsense_main_ad()==0){_e('<div class="' . st_adsense_float() . '">'); st_adsense_insert($AdSense1);?>
</div><?php }} ?>
<?php if(st_chitika_on()==1){if (st_chitika_main_ad()==0){_e('<div class="' . st_chitika_float() . '">'); st_chitika_insert($Chitika1);?>
</div><?php }} ?>
<?php if(st_clickbank_on()==1){if (st_clickbank_main_ad()==0){_e('<div class="' . st_cb_float() . '">'); st_cb_insert($ClickBank1);?>
</div><?php }} ?>

<p>Sorry you didn't find what you were looking for, why not take a look at the most recent posts <?php if (get_option('default_comment_status') == 'open'){ ?>and comments <?php } ?>on <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>.</p>

<h3>10 Most Recent Posts</h3>
<ul>
<?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul>

<?php if (get_option('default_comment_status') == 'open'){ ?>
<h3>5 Most Recent Comments on the <?php bloginfo('name'); ?> website</h3>

<?php mw_recent_comments(5, false, 100, 50, 100, 'comment_only', '<H3><a href="%permalink%">%title%</a></H3><p><strong>Comment %comid% by %author_name%</strong> on %date%</p><p>%comment_cont%</p><p class="align-right">View post and comment <a href="%permalink%">%title%</a></p><hr>','d.m.y, H:i'); ?>
<?php } ?>
</div>
</div>

<div class="divpadding"></div>

<?php if(st_clickbank_on()==1){ ?><div class="adscenter">
<?php st_cb_insert($ClickBank2);?>
</div><?php } ?>

<div class="divpadding"></div>

<?php if(st_chitika_on()==1){ ?><div class="adscenter">
<?php st_chitika_insert($Chitika4);?>
</div><?php } ?>

<?php if(st_adsense_on()==1){ ?><div class="adscenter">
<?php if(st_adsense_switch()==0) st_adsense_insert($AdSense3); else st_adsense_insert($AdSense4);?>
</div><?php } ?>

<?php if(st_linkwords_on()==1){echo('</div>');} ?><?php if(st_kontera_on()==1){echo('</div>');} ?>
</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>