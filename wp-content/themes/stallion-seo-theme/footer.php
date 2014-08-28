<div id="footer_stallion2">
<?php global $st_op_main; $user = $st_op_main->option['themeID'];?>
<?php if ($user != '') : ?>
<?php include(get_template_directory()."/sidebar-footer.php"); ?>
<?php endif; ?>
<?php include(get_template_directory()."/layout/footer-ads.php"); ?>
</div>

<div id="footer_stallion"><?php st_banners_disp(); ?>
<?php if(st_tagline()==0){ ?><?php bloginfo('description'); ?><br />
<?php } ?>
&copy;<?php the_time('Y'); ?>&nbsp;<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a><?php if(st_stallion_link()==1){ ?> powered by <a href="<?php if(st_clickbank_user()!='morearning'): ?><?php _e('http://' . st_clickbank_user() . '.stallionad.hop.clickbank.net/?tid=' . st_cb_track() . '&dpdid=Stallion_seo'); ?>
<?php else : ?>http://www.stallion-theme.com/<?php endif; ?>" target="_blank">Stallion WordPress SEO Theme</a><?php } ?>
<?php include(get_template_directory()."/layout/footer-menu.php"); ?>
<?php wp_footer(); ?>
</div>
</div>

<?php if(st_header_hide()!=0 && st_nav_menu_on()!=0){ ?><?php include(get_template_directory()."/layout/navigation-menu.php"); ?><?php } ?>
<?php if(st_nav_menu_on2()==1){ ?><?php include(get_template_directory()."/layout/navigation-menu2.php"); ?><?php } ?>
<?php if(st_search_form_hide()==1){ ?><?php include(get_template_directory()."/layout/searchform.php"); ?><?php } ?>
<?php if(st_search_form_hide()==0){ ?><?php include(get_template_directory()."/widgets/header-widget.php"); ?><?php } ?>
</div>
<?php if(st_bio_profile()==1){ ?><?php include(get_template_directory()."/layout/bio-profiles.php"); ?><?php } ?>
<?php if(st_kontera_on()==1) { ?>
<?php include (get_template_directory() . "/ad_includes/kontera.php"); ?><?php } ?>
<?php if(st_infolinks_on()==1 && st_kontera_on()==0 && st_linkwords_on()==0){ ?>
<?php include (get_template_directory() . "/ad_includes/infolinks.php"); ?><?php } ?>
<?php if(st_linkwords_on()==1 && st_kontera_on()==0 && st_infolinks_on()==0){ ?>
<?php include (get_template_directory() . "/ad_includes/linkwords.php"); ?><?php } ?>
<?php if(st_g_analytics()==1){ ?><?php include(get_template_directory()."/plugins/google-analytics.php"); ?><?php } ?>
<?php if ($user != '') : ?>
<?php if(st_mppp_seo()==1 or st_wprobot_seo()==1 or st_cloak_links()==1){ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/test.js"></script>
<?php } ?><?php endif; ?>
<?php if(st_nav_menu_photo()==1){ ?><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/imagemenu/mootools.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/imagemenu/imageMenu.js"></script><?php } ?>
<?php if(st_social_network()!=0 && st_googlep1()==1){ ?><script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script><?php } ?>
<?php if (is_user_logged_in() && st_queries_used()==1) { ?><p class="adscenter"><code><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds <?php if(function_exists('memory_get_usage')) echo '(Memory Usage '.number_format(memory_get_usage()/1024/1024, 2).'MB)'; ?></code></p><?php } ?>
</body>
</html>