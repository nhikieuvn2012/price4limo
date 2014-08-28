<?php
/*
Template Name: Static Page Blank Sales No Sidebars
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php the_title(); ?><?php if(st_seo_titles()==0){ ?> &raquo; <?php bloginfo('name'); ?><?php } ?></title>
<?php if(st_seo_plugin_desc()==1){ ?>
<meta name="description" content="<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php the_excerpt_rss(','); ?><?php endwhile; ?><?php else : ?><?php endif; ?><?php } ?>
<?php if(st_seo_plugin_key()==1){ ?><meta name="keywords" content="<?php the_title(); ?>
<?php } ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-1000.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?><?php _e('/style-' . st_themecolor() . '.css'); ?>" type="text/css" media="screen" />
<?php if (st_robot_noodpydir() == '1') { ?><meta name="robots" content="noodp,noydir" /><?php } ?>
<?php remove_filter ('the_content', 'wpautop'); ?><?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>
<div id="wrap_stallion">	
<?php if(st_header_hide()==10){ ?>
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
<?php if(st_header_2011_activate()==10){ ?>
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

<?php if(st_nav_menu_photo()==10){ ?><?php include(get_template_directory()."/layout/photonav.php"); ?><?php } ?>

<div id="content_all" class="konafilter">
<div id="maincontent">
<?php if(st_feature_slide()==1 or st_feature_slide()==2){ ?><?php if(is_front_page()){include(get_template_directory()."/layout/featured-slideshow.php"); } ?><?php } ?>
<div id="post-entry">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post-meta <?php /* semantic_entries(); */ ?>">

<!-- google_ad_section_start -->
<div class="post-content">
<?php if(st_social_network()==10){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?><?php } ?>
<?php the_content() ;?>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'stalliontheme' ) . '</span>', 'after' => '</div>' ) ); ?>

<p class="tags"><?php the_tags(); ?></p>

<?php if(st_social_network()==20){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?>
<div class="clear"></div><?php } ?>

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

<?php if ( ! is_front_page() ) { ?><?php if (function_exists('related_postszzz')) { ?>
<div class="post-meta"><div class="post-content">
<h3>Related Articles to <?php the_title(); ?></h3>
<?php related_posts(); ?>
</div></div><?php } ?>

<?php if (function_exists('echo_ald_crpzzz')) { ?>
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

<div class="singleside">
<div class="rightside">
<div id="right-sidebars">
<div class="sidebar-box">

</div>
</div>
</div>

<div class="leftside">
<div id="left-sidebars">

<div class="sidebar-box">

</div>

</div>
</div>

</div>

<div id="footer_stallion"><?php st_banners_disp(); ?>
<?php if(st_tagline()==0){ ?><?php bloginfo('description'); ?><br />
<?php } ?>
&copy;<?php the_time('Y'); ?>&nbsp;<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a><?php if(st_stallion_link()==1){ ?> powered by <a href="<?php if(st_clickbank_user()!='morearning'): ?><?php _e('http://' . st_clickbank_user() . '.stallionad.hop.clickbank.net/?tid=' . st_cb_track() . '&dpdid=Stallion_seo'); ?>
<?php else : ?>http://www.stallion-theme.com/<?php endif; ?>" target="_blank">WordPress Stallion Theme</a><?php } ?>
<?php wp_footer(); ?>
</div>
</div>


<?php if(st_nav_menu_on2()==10){ ?>


<?php if(st_header_hide()!=0 && st_nav_menu_on()!=0){ ?><?php include(get_template_directory()."/layout/navigation-menu.php"); ?><?php } ?>


<?php include(get_template_directory()."/layout/navigation-menu2.php"); ?><?php } ?>
<?php if(st_search_form_hide()==10){ ?><?php include(get_template_directory()."/layout/searchform.php"); ?><?php } ?>
<?php if(st_search_form_hide()==00){ ?><?php include(get_template_directory()."/widgets/header-widget.php"); ?><?php } ?>
</div>
<?php if(st_kontera_on()==10) { ?>
<?php include (get_template_directory() . "/ad_includes/kontera.php"); ?><?php } ?>
<?php if(st_infolinks_on()==10 && st_kontera_on()==0 && st_linkwords_on()==0){ ?>
<?php include (get_template_directory() . "/ad_includes/infolinks.php"); ?><?php } ?>
<?php if(st_linkwords_on()==10 && st_kontera_on()==0 && st_infolinks_on()==0){ ?>
<?php include (get_template_directory() . "/ad_includes/linkwords.php"); ?><?php } ?>
<?php if(st_g_analytics()==1){ ?><?php include(get_template_directory()."/plugins/google-analytics.php"); ?><?php } ?>
<?php if ($user != '') : ?>
<?php if(st_mppp_seo()==1 or st_wprobot_seo()==1 or st_cloak_links()==1){ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/test.js"></script>
<?php } ?><?php endif; ?>
<?php if(st_nav_menu_photo()==10){ ?><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/imagemenu/mootools.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/imagemenu/imageMenu.js"></script><?php } ?>
<?php if(st_social_network()!=0 && st_googlep1()==1){ ?><script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script><?php } ?>
<?php if (is_user_logged_in() && st_queries_used()==1) { ?><p class="align-center"><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds <?php if(function_exists('memory_get_usage')) echo '(Memory Usage '.number_format(memory_get_usage()/1024/1024, 2).'MB)'; ?>.</p><?php } ?>
</body>
</html>