<?php
/*
Template Name: Static Page No Ads, Main Content Only
*/
?>
<?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>
<?php get_header(); ?>
<div id="content_all">
<div id="maincontent">
<?php if(st_feature_slide()==1 or st_feature_slide()==2){ ?><?php if(is_front_page()){include(get_template_directory()."/layout/featured-slideshow.php"); } ?><?php } ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post-meta <?php /* semantic_entries(); */ ?>">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="post-date"><?php edit_post_link('Edit', '&#124; ', ''); ?></div>

<div class="post-content">
<?php the_content() ;?>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'stalliontheme' ) . '</span>', 'after' => '</div>' ) ); ?>

<div class="clear"></div>

</div>

</div>

<?php endwhile; ?>



<div class="divpadding"></div>

<?php else: ?>

<h1>Sorry The Page Has Been Removed</h1>

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>