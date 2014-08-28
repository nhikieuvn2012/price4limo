<?php
/*
Template Name: Sitemap MultiSite
*/
?>
<?php
global $name_or_url;
global $begin_wrap;
global $end_wrap;
// determine whether using vhosts or not for both functions to use
$vhosts = (defined( "VHOST" ) && constant( "VHOST" ) == 'yes' );

function echoArrayBlogList($arrayName, $name_sort) {
    global $wpdb;
    global $name_or_url;
    global $begin_wrap;
    global $end_wrap;
	global $vhosts;
	
    $intArrayCount = 0;
    $bid = '';
	// if blog name requested, then get it
	if ($name_or_url == "name") {
		$blogs = array();
		$i = 1;
		foreach ($arrayName as $blog) {
			$blogname = get_blog_option( $blog['blog_id'], "blogname");
			$blogs[$i] = array('key' => strtolower($blogname), // give it a key to sort by
											'blog_name' => $blogname,
											'blog_id' => $blog['blog_id'], 
											'domain' => $blog['domain']);
			$i++;
		}
		// now sort if requested
		if($name_sort) {
			asort($blogs);
		}
		// replace array
		$arrayName = $blogs;
	}
    foreach ($arrayName as $blog) {
		// get blog url depending on vhost or not-vhost installtion
		if( $vhosts )
			$tmp_domain = $blog['domain'];
		else
			$tmp_domain = get_blog_option( $blog['blog_id'], "siteurl");
		if ($name_or_url == "name") {
			$tmp_display = $blog['blog_name'];
		} else {
			$tmp_display = $tmp_domain;
		}
		// get blog url depending on vhost or not-vhost installtion
		if( $vhosts )
			echo $begin_wrap . "<a href='http://" . $tmp_domain . $blog['path'] . "'>" . $tmp_display . "</a>" . $end_wrap;
		else
			echo $begin_wrap . "<a href='" . $tmp_domain . "'>" . $tmp_display . "</a>" . $end_wrap;
	}
}

function list_all_wpmu_blogs($tmp_limit, $tmp_name_or_url, $tmp_begin_wrap, $tmp_end_wrap, $tmp_order) {
    global $wpdb;
    global $name_or_url;
    global $begin_wrap;
    global $end_wrap;
	global $vhosts;

    if ($tmp_limit != "") {
        $limit = "LIMIT " . $tmp_limit;
    }
    if ($tmp_name_or_url == "" || $tmp_name_or_url == "name") {
        $name_or_url = "name";
			// did user request sort by blog_name
		$name_sort = ($tmp_order == "blog_name"); 
    } else {
        $name_or_url = "url";
		$name_sort = false;
    }
    if (tmp_begin_wrap == "" || tmp_end_wrap == "" ) {
        $begin_wrap = "<p>";
        $end_wrap = "</p>";
    } else {
        $begin_wrap = $tmp_begin_wrap;
        $end_wrap = $tmp_end_wrap;
    }
    if ($tmp_order == "" || $tmp_order == "updated") {
        $order = "ORDER BY  last_updated DESC";
	} else if ($tmp_order == "first_created") {
        $order = "ORDER BY  blog_id ASC";
	} else if ($tmp_order == "last_created") {
		$order = "ORDER BY  blog_id DESC";
	} else if ($tmp_order == "domain") {
		$order = "ORDER BY  domain ASC";
    } 
	// if vhosts retrieve all the data from global table in one query
	if($vhosts) {
		$extra = "domain, path, ";
	}
	
    $blog_list = $wpdb->get_results( "SELECT " . $extra . "blog_id, last_updated FROM " . $wpdb->blogs. 
		" WHERE public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted ='0' " . $order . " " . $limit . "", ARRAY_A );
    if (count($blog_list) < 2 ){ // we don't want to display the admin blog so we return this even if there is one blog
        echo "<p>There are currently no active blogs</p>";
    } else {
        echoArrayBlogList($blog_list, $name_sort);
    }
}
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
<ul>
<?php list_all_wpmu_blogs('300', 'name', '<li>', '</li>', 'last_created'); ?>
</ul>
<!-- google_ad_section_end --><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>

<?php if(st_social_network()==2){ ?><?php include(get_template_directory()."/plugins/social-network.php"); ?>
<div class="clear"></div><?php } ?>

</div>

<?php if (is_active_sidebar('bottom-content-widget-area')) : ?>
<?php include(get_template_directory()."/widgets/bottom-content-widget.php"); ?>
<?php endif; ?>

<?php if(st_chitika_on()==1 && st_chitika_con4()==0){ ?><div class="adscenter stallionhideads">
<?php st_chitika_insert($Chitika4);?>
</div><?php } ?>

<?php if(st_clickbank_on()==1 && st_cb_con2()==0){ ?><div class="adscenterv">
<?php st_cb_insert($ClickBank2);?>
</div><?php } ?>

<?php if(st_adsense_on()==1 && st_adsense_con3()==0 && st_adsense_switch()==0){ ?><div class="adscenter stallionhideads">
<?php st_adsense_insert($AdSense3); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()==1){ ?><div class="adscenter">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>
<?php if(st_adsense_on()==1 && st_adsense_lnk4()==0 && st_adsense_switch()==2){ ?><div class="adscenter stallionhideads">
<?php st_adsense_insert($AdSense4); ?>
</div><?php } ?>
<div class="divpadding"></div>

</div>

<?php endif; ?>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>