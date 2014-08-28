<div class="singleside">
<div class="rightside">
<div id="right-sidebars">
<div class="sidebar-box">

<?php if ( is_active_sidebar( 'st-right-sidebar' ) ) : ?>
<?php dynamic_sidebar( 'st-right-sidebar' ); ?>
<?php else : ?>

<?php if(st_clickbank_user()!='morearning'): ?><?php if (class_exists('YPN_Functions')) : ?>
<div id="ypn-widget-300" class="widget-container ypn-widget">
<input type="hidden" name="delay" value="7" /><?php endif; ?>
<div>&nbsp;</div>
<div class="widget-content widget-content-ypn">
<div class="alcenter">
<a href="<?php if(st_clickbank_user()!='morearning'): ?><?php _e('http://' . st_clickbank_user() . '.stallionad.hop.clickbank.net/?tid=' . st_cb_track() . '&dpdid=Stallion_seo'); ?>
<?php else : ?>http://www.stallion-theme.com/<?php endif; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?><?php _e('/stallion-cbaf/stallion-200-200.jpg'); ?>" alt="Stallion SEO Ad Theme" width="200" /></a>
</div>
</div>
<?php if (class_exists('YPN_Functions')) : ?></div><?php endif; ?><?php endif; ?>

<span class="gat_widget"><?php _e('Recent Articles'); ?></span>
<ul>
<?php wp_get_archives('type=postbypost&limit=12'); ?>
</ul>

<span class="gat_widget"><?php _e('Recent Comments'); ?></span>
<ul>
<?php mw_recent_comments(10, false, 38, 20, 40, 'all', '<li><a href="%permalink%">%author_name% - <strong>%title%</strong></a></li>','d.m.y, H:i'); ?>
</ul>

<?php endif; ?>

</div>
</div>
</div>

<div class="leftside">
<div id="left-sidebars">

<div class="sidebar-box">

<?php if ( is_active_sidebar( 'st-left-sidebar' ) ) : ?>
<?php dynamic_sidebar( 'st-left-sidebar' ); ?>
<?php else : ?>
<?php if(st_adsense_on()==1 && st_adsense_con2()==0){ ?><?php include(get_template_directory()."/ad_includes/adsense.php"); ?>
<?php if(st_adsense_con1_head()==1): ?>
<span class="gat_widget stallionhideads"><?php _e('Adverts'); ?></span>
<?php else : ?><div>&nbsp;</div><?php endif; ?>
<?php _e('<' . st_adsense_con1_bg() . ' class="alcenter stallionhideads">'); ?>
<?php global $AdSense2; st_adsense_insert($AdSense2);?>
<?php _e('</' . st_adsense_con1_bg() . '>'); ?><?php } ?>

<span class="gat_widget"><?php _e('Categories'); ?></span>
<ul>
<?php wp_list_categories('title_li=&hide_empty=1'); ?>
</ul>

<span class="gat_widget"><?php _e('Links'); ?></span>
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
<?php global $st_op_main; $user = $st_op_main->option['themeID']; if ($user == '') { ?>
<li><a href="http://www.stallion-theme.com/wordpress-seo">WordPress SEO</a></li>
<?php } ?>
</ul>

<span class="gat_widget"><?php _e('Meta'); ?></span>
<div class="loginfm">
<?php wp_meta(); ?>
<?php wp_registerseo(); ?>
<?php wp_loginoutseo(); ?>
</div>

<span class="gat_widget"><?php _e('RSS Feeds'); ?></span>
<ul>
<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Article <abbr title="Really Simple Syndication">RSS</abbr> Feed'); ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/rss.gif" alt="<?php bloginfo('name'); ?> <?php _e('Article RSS Feed', 'default'); ?>" /></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr> Feed'); ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/rss.gif" alt="<?php bloginfo('name'); ?> <?php _e('Comments RSS Feed', 'default'); ?>" /></a></li>
</ul>

<?php endif; ?>

</div>

</div>
</div>

</div>