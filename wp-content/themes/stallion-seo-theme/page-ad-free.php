<?php
/*
Template Name: Static Page No Ads
*/
?>
<?php get_header(); ?>
<div id="content_all" class="konafilter">
<div id="maincontent">
<?php if(st_feature_slide()==1 or st_feature_slide()==2){ ?><?php if(is_front_page()){include(get_template_directory()."/layout/featured-slideshow.php"); } ?><?php } ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post-meta <?php /* semantic_entries(); */ ?>">

<!-- google_ad_section_start -->
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="post-date"><?php if(st_post_dates_hide()==1){ ?>Posted on <?php the_time('F jS, Y') ?><?php } ?> <?php if(st_author_link_hide()==1){ ?>by <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><? the_author_meta('display_name'); ?></a> <?php } ?><?php edit_post_link('Edit', '&#124; ', ''); ?></div>

<div class="post-content">
<?php if(st_social_network()==1){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?><?php } ?>
<?php the_content() ;?>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'stalliontheme' ) . '</span>', 'after' => '</div>' ) ); ?>

<p class="tags"><?php the_tags(); ?></p>

<?php if(st_social_network()==2){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?>
<div class="clear"></div><?php } ?>

<?php if(st_author_bio()==1){ ?><?php include(get_template_directory()."/layout/author-bio.php"); ?><?php } ?>

</div>
<!-- google_ad_section_end -->
</div>

<div class="divpadding"></div>

<?php endwhile; ?>

<?php if (function_exists('wp_list_comments')): ?>

<?php comments_template('', true); ?>
<?php else : ?>
<?php comments_template(); ?>
<?php endif; ?>

<?php if ( ! is_front_page() ) { ?><?php if (function_exists('related_posts')) { ?>
<div class="post-meta"><div class="post-content">
<h3>Related Articles to <?php the_title(); ?></h3>
<?php related_posts(); ?>
</div></div><?php } ?>

<?php if (function_exists('echo_ald_crp')) { ?>
<div class="post-meta"><div class="post-content">
<h3>Related Articles to <?php the_title(); ?></h3>
<?php echo_ald_crp(); ?>
</div></div><?php } ?><?php } ?>

<div class="divpadding"></div>

<?php else: ?>

<h1>Sorry The Page Has Been Removed</h1>

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>