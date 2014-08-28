<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php if (is_home() || is_404() || is_front_page()) { ?><?php if(st_seo_title_home()!=''): ?><?php _e(st_seo_title_home()); ?><?php else : ?><?php bloginfo('name'); ?><?php endif; ?><?php } ?>
<?php if (is_year() || is_month() || is_day() || is_author()) { ?><?php bloginfo('name'); ?><?php wp_title(); ?><?php } ?>
<?php if (is_single() || is_page() &! is_front_page()) { ?><?php the_title(); ?><?php if(st_seo_titles()==0){ ?> &raquo; <?php bloginfo('name'); ?><?php } ?><?php } ?>
<?php if (is_category()) { ?><?php wp_title(); ?><?php if(st_seo_titles()==0){ ?> &raquo; <?php bloginfo('name'); ?><?php } ?><?php } ?>
<?php if (is_tag()) { ?><?php single_tag_title(); ?><?php if(st_seo_titles()==0){ ?> &raquo; <?php bloginfo('name'); ?><?php } ?><?php } ?>
<?php if (is_search()) { ?><?php the_search_query(); ?><?php if(st_seo_titles()==0){ ?> &raquo; <?php bloginfo('name'); ?><?php } ?><?php } ?></title>
<?php if(st_seo_plugin_desc()==1){ ?>
<meta name="description" content="<?php if (is_home() || is_404()) { ?><?php bloginfo('name'); ?><?php } ?>
<?php if (is_year() || is_month() || is_day() || is_author()) { ?><?php wp_title(); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if (is_single() || is_page()) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php the_excerpt_rss(','); ?><?php endwhile; ?><?php else : ?><?php endif; ?><?php } ?>
<?php if (is_category()) { ?><?php wp_title(); ?><?php } ?>
<?php if (is_tag()) { ?><?php single_tag_title(); ?><?php echo tag_description(); ?>
<?php } ?>
<?php if (is_search()) { ?><?php the_search_query(); ?><?php } ?>, <?php bloginfo('description');?>" />
<?php } ?>
<?php if(st_seo_plugin_key()==1){ ?><meta name="keywords" content="<?php if (is_home() || is_404()) { ?><?php bloginfo('name'); ?><?php } ?>
<?php if (is_year() || is_month() || is_day() || is_author()) { ?><?php wp_title(); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if (is_single() || is_page()) { ?><?php the_title(); ?><?php } ?>
<?php if (is_category()) { ?><?php wp_title(); ?><?php } ?>
<?php if (is_tag()) { ?><?php single_tag_title(); ?><?php } ?>
<?php if (is_search()) { ?><?php the_search_query(); ?><?php } ?>" />
<?php } ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?><?php _e('/style-' . st_sidebar_lo() . '.css'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?><?php _e('/style-' . st_themecolor() . '.css'); ?>" type="text/css" media="screen" />
<?php if(st_header_bg_on()==1){ ?><style type="text/css">#header_stallion {background-image: url(<?php bloginfo('template_url'); ?><?php _e('/headers/' . st_header_bg_img() . ''); ?>);}</style>
<?php } ?>
<?php if (st_robot_noodpydir() == '1') { ?><meta name="robots" content="noodp,noydir" /><?php } ?>
<?php if (is_home() || is_front_page() && !is_paged()) { ?><?php if (st_google_verify() != '') { ?><meta name="google-site-verification" content="<?php echo st_google_verify(); ?>" /><?php } ?>
<?php if (st_bing_verify() != '') { ?><meta name="msvalidate.01" content="<?php echo st_bing_verify(); ?>" /><?php } ?>
<?php if (st_yahoo_verify() != '') { ?><META name="y_key" content="<?php echo st_yahoo_verify(); ?>" /><?php } ?><?php } ?><?php wp_head(); ?>
<?php if(st_feature_slide()==1 or st_feature_slide()==2){ ?>
<?php if (is_home() || is_category() || is_tag() || is_search() || is_front_page() || is_404()) { ?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.6.2.min.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js" type="text/javascript" ></script><?php } ?><?php } ?>
</head>
<body <?php body_class(); ?>><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>
<div id="wrap_stallion">	
<?php if(st_header_hide()==1){ ?>
<div id="header_stallion2">
<div id="header_stallion">
<div class="h1disc">
<div class="headleft">
<?php if(st_title_hide()==1){ ?><?php if (is_page("archives") || is_year() || is_month() || is_day() || is_home() || is_404() || is_author()) { ?><h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1><?php } ?>
<?php if (is_category() || is_single() || is_page() || is_search() || is_tag()) { ?><span><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></span><?php } ?><?php } ?>
<?php if(st_tagline()==1){ ?><p class="description"><?php bloginfo('description'); ?></p>
<?php } ?>
</div>

</div>
</div></div><?php } ?>
<?php if(st_header_2011_activate()==1){ ?>
<div id="header_stallion_2011">
<div id="branding" role="banner"><?php if(st_header_2011_title()==1){ ?><span id="header_stallion_2011_top"><?php if (is_page("archives") || is_year() || is_month() || is_day() || is_home() || is_404() || is_author()) { ?><h1 id="site-title"><br /><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1><?php } ?>
<?php if (is_category() || is_single() || is_page() || is_search() || is_tag()) { ?><div id="site-title"><br /><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></div><?php } ?>
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
