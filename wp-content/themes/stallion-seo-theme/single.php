<?php get_header(); ?>
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
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="post-date">Posted <?php if(st_post_dates_hide()==1){ ?>on <?php the_time('F jS, Y') ?><?php } ?> <?php if(st_author_link_hide()==1){ ?>by <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><? the_author_meta('display_name'); ?></a> <?php } ?>in <?php the_category(', ') ?> <?php edit_post_link('Edit', '&#124; ', ''); ?></div>

<div class="post-content">
<?php if(st_social_network()==1){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?><?php } ?>
<?php if(st_kontera_on()==1){echo('<div class="KonaBody">');} ?><?php if(st_linkwords_on()==1){echo('<div id="lw_context_ads">');} ?>
<?php if (is_active_sidebar('content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/content-widget.php"); ?>
<?php endif; ?>
<?php if(st_adsense_on()==1 && st_adsense_con1()==0){if ($wp_query->current_post == st_adsense_main_ad()){_e('<div class="' . st_adsense_float() . ' stallionhideads">'); st_adsense_insert($AdSense1);?>
</div><?php }} ?>
<?php if(st_chitika_on()==1 && st_chitika_con1()==0){if ($wp_query->current_post == st_chitika_main_ad()){_e('<div class="' . st_chitika_float() . ' stallionhideads">'); st_chitika_insert($Chitika1);?>
</div><?php }} ?>
<?php if(st_clickbank_on()==1 && st_cb_con1()==0){if ($wp_query->current_post == st_clickbank_main_ad()){_e('<div class="' . st_cb_float() . ' stallionhideads">'); st_cb_insert($ClickBank1);?>
</div><?php }} ?>
<?php the_content() ;?>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'stalliontheme' ) . '</span>', 'after' => '</div>' ) ); ?>

<?php if(st_adsense_on()==1 && st_adsense_lnk6()==0 && st_adsense_lnk6_sing()==1){_e('<div class="adscenter stallionhideads">'); st_adsense_insert($AdSense6);?>
</div><?php } ?>

<p class="tags"><?php the_tags(); ?></p>
<div class="clear"></div>

<?php if(st_linkwords_on()==1){echo('</div>');} ?><?php if(st_kontera_on()==1){echo('</div>');} ?>
<!-- google_ad_section_end --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>

<?php if(st_social_network()==2){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?>
<div class="clear"></div><?php } ?>

<?php if(st_author_bio()==1){ ?><?php include(get_template_directory()."/layout/author-bio.php"); ?><?php } ?>

<?php if (is_active_sidebar('bottom-content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/bottom-content-widget.php"); ?>
<?php endif; ?>

<?php if(st_clickbank_on()==1 && st_cb_con3_sing()==1 && st_cb_con3()==0){_e('<div class="adscenter stallionhideads">'); st_cb_insert($ClickBank3);?>
</div><?php } ?>

</div>

</div>

<?php if(st_chitika_on()==1 && st_chitika_con6()==0){ ?><div class="adscenter stallionhideads">
<?php st_chitika_insert($Chitika6);?>
</div><?php } ?>

<?php endwhile; ?>
<?php if (comments_open()): ?>
<?php if (function_exists('wp_list_comments')): ?>
<?php comments_template('', true); ?>
<?php else : ?>
<?php comments_template(); ?>
<?php endif; ?>

<?php endif; ?>

<?php if(st_chitika_on()==1 && st_chitika_con4()==0){ ?><div class="adscenter stallionhideads">
<?php st_chitika_insert($Chitika4);?>
</div><?php } ?>

<?php if(st_clickbank_on()==1 && st_cb_con2()==0){ ?><div class="adscenter stallionhideads">
<?php st_cb_insert($ClickBank2);?>
</div><?php } ?>

<?php if ( ! is_front_page() ) { ?><?php if (function_exists('related_posts')) { ?><div class="post-meta"><div class="post-content">
<h3>Related Articles to <?php the_title(); ?></h3>
<?php related_posts(); ?>
</div></div><?php } ?>

<?php if (function_exists('echo_ald_crp')) { ?>
<div class="post-meta"><div class="post-content">
<h3>Related Articles to <?php the_title(); ?></h3>
<?php echo_ald_crp(); ?>
</div></div><?php } ?><?php } ?>

<?php if(st_chitika_on()==1 && st_chitika_con3()==0 && st_chitika_switch()==0){ ?><div class="adscenter stallionhideads">
<?php st_chitika_insert($Chitika3); ?>
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

<div class="divpadding"></div>

<?php else: ?>

<h1>Sorry The Post Has Been Removed</h1>

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>