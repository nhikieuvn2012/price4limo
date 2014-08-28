<?php get_header(); ?>
<div id="content_all">
<div id="maincontent">
<?php if (is_active_sidebar('banner-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/banner-widget.php"); ?>
<?php endif; ?>
<?php include(get_template_directory()."/layout/landscape-images.php"); ?>
<div id="post-entry">

<?php
// This also populates the iconsize for the next line
$attachment_link = get_the_attachment_link($post->ID, true, array(450, 800));
// This lets us style narrow icons specially
$_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment';
?>

<?php if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="post-meta <?php /* semantic_entries(); */ ?> <?php if(st_post_lo()==1){echo 'odd'.($st_odd++%2);} ?>">

<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

<div class="post-content" id="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br />
<p>This is an image of <?php the_title(); ?></p>
</div>

</div>

<?php endwhile; ?>

<div class="divpadding"></div>

<?php else: ?>

<h3>Sorry The Attachment Have Been Removed</h3>

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>