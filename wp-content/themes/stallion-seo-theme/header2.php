<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?><?php the_title(); ?><?php if(st_seo_titles()==0){ ?> &raquo; <?php bloginfo('name'); ?><?php } ?><?php endwhile; ?><?php endif; ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?><?php _e('/style-' . st_sidebar_lo() . '.css'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?><?php _e('/style-' . st_themecolor() . '.css'); ?>" type="text/css" media="screen" />
<?php if(st_header_bg_on()==1){ ?><style type="text/css">#header_stallion {background-image: url(<?php bloginfo('template_url'); ?><?php _e('/headers/' . st_header_bg_img() . ''); ?>);}</style>
<?php } ?>
<?php remove_action('wp_head', 'rel_canonical');?>
<?php remove_action('wp_head', 'wp_shortlink_wp_head');?>
<?php remove_action('wp_head', 'rsd_link');?>
<?php remove_action('wp_head', 'start_post_rel_link');?>
<?php remove_action('wp_head', 'wlwmanifest_link');?>
<?php remove_action('wp_head', 'index_rel_link');?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>
<div id="wrap_stallion">
<?php if(st_header_hide()==1){ ?>
<div id="header_stallion2">
<div id="header_stallion">

<div class="h1disc">
<div class="headleft">
<?php if(st_title_hide()==1){ ?><span><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></span><?php } ?>
<?php if(st_tagline()==1){ ?><p class="description"><?php bloginfo('description'); ?></p>
<?php } ?>
</div>

</div>
</div></div><?php } ?>

<?php if(st_header_2011_activate()==1){ ?>
<div id="header_stallion_2011">
<div id="branding" role="banner"><?php if(st_header_2011_title()==1){ ?><span id="header_stallion_2011_top">
<div id="site-title"><br /><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></div>
<?php if(st_tagline()==1){ ?><p id="site-description"><?php bloginfo('description'); ?></p>
<?php } ?></span><?php } ?>

<?php $header_image = get_header_image();
if ( ! empty( $header_image ) ) : ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php
if ( is_singular() && has_post_thumbnail( $post->ID ) &&
( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
$image[1] >= HEADER_IMAGE_WIDTH ) :
echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
else : ?><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /><?php endif; ?></a>
<?php endif; ?></div>

<?php if(st_header_hide()==0 && st_nav_menu_on()!=0){ ?><?php include(get_template_directory()."/layout/navigation-menu.php"); ?><?php } ?>
</div><?php } ?>

<?php if(st_nav_menu_photo()==1){ ?><?php include(get_template_directory()."/layout/photonav.php"); ?><?php } ?>
<?php include(get_template_directory()."/layout/header-ads.php"); ?>