<?php
/*
This is the functions.php file, if you are adding a feature 
(plugin for example) that requires adding code to the functions.php
file please use the file "zz_extra_functions.php" instead. The file
was added to Stallion for adding extra code making it easier to
keep track of your customizations and manage future Stallion updates.
*/ ?>
<?php /* include (get_template_directory() . "/plugins/semantic-classes.php"); */ ?>
<?php include (get_template_directory() . "/ttk_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_adsense_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_chitika_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_clickbank_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_inlinks_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_layout_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_colours_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_promotion_functions.php"); ?>
<?php include (get_template_directory() . "/ttk_seo_advanced_functions.php"); ?>
<?php include (get_template_directory() . "/layout/stallion-2011-header.php"); ?>
<?php include (get_template_directory() . "/layout/featured-meta-box.php"); ?>
<?php if(st_nav_menu_photo()==1){ ?>
<?php include (get_template_directory() . "/imagemenu/photoslider.php"); ?>
<?php include (get_template_directory() . "/imagemenu/photoslider-meta-box.php"); ?><?php } ?>
<?php if(st_adsense_on()==1){ ?>
<?php include (get_template_directory() . "/ad_includes/adsense-functions.php"); ?>
<?php include (get_template_directory() . "/widgets/adsense-widgets.php"); ?><?php } ?>
<?php if(st_clickbank_on()==1){ ?>
<?php include (get_template_directory() . "/ad_includes/clickbank-functions.php"); ?>
<?php include (get_template_directory() . "/widgets/clickbank-widgets.php"); ?><?php } ?>
<?php if(st_chitika_on()==1){ ?>
<?php include (get_template_directory() . "/ad_includes/chitika-functions.php"); ?>
<?php include (get_template_directory() . "/widgets/chitika-widgets.php"); ?><?php } ?>
<?php if (function_exists('st_seo_chck')){ ?><?php if(st_125px_widget()==1){ ?>
<?php include (get_template_directory() . "/ttk_125px-ads.php"); ?><?php } ?>
<?php if(st_flickr_widget()==1){ ?>
<?php include (get_template_directory() . "/widgets/flickr-widget.php"); ?><?php } ?>
<?php if(st_google_trans_widget()==1){ ?>
<?php include (get_template_directory() . "/widgets/google-translation.php"); ?><?php } ?>
<?php if(st_youtube_widget()==1){ ?>
<?php include (get_template_directory() . "/widgets/youtube-widget.php"); ?><?php } ?>
<?php include (get_template_directory() . "/widgets/stallion-wordpress-seo-recent-comments.php"); ?>
<?php if(st_customad_widget()==1){ ?>
<?php include (get_template_directory() . "/widgets/ad-widget.php"); ?><?php } ?>
<?php include (get_template_directory() . "/plugins/wp_head_remove_action.php"); ?><?php if(st_auto_thumbs()==1){ ?>
<?php include (get_template_directory() . "/plugins/auto-thumbnails.php"); ?><?php } ?>
<?php if(st_comment_titles()==1 && version_compare(PHP_VERSION, '5.0.0.', '>')){ ?>
<?php include (get_template_directory() . "/plugins/hikari-titled-comments.php"); ?><?php } ?>
<?php if(st_super_comments()==1){ ?>
<?php include (get_template_directory() . "/plugins/stallion-seo-super-comments.php"); ?><?php } ?>
<?php if(st_wprobot_seo()==1){ ?><?php if(function_exists('wpr_run_cron')){ ?>
<?php include (get_template_directory() . "/plugins/wprobot_seo.php"); ?><?php } ?><?php } ?>
<?php if(st_mppp_seo()==1){ ?><?php if(class_exists('wp_massivepassive')){ ?>
<?php include (get_template_directory() . "/plugins/mpp_seo.php"); ?><?php } ?><?php } ?><?php } ?>
<?php include (get_template_directory() . "/comments-reply-functions.php"); ?>
<?php include (get_template_directory() . "/seo-functions.php"); ?>
<?php if (function_exists('st_seo_chck')){ ?><?php if(st_wp_codeshield()==1){ ?>
<?php include (get_template_directory() . "/plugins/wp_codeshield.php"); ?><?php } ?>
<?php if(st_search_excerpt()==1){ ?>
<?php include (get_template_directory() . "/plugins/ylsy_search_excerpt.php"); ?><?php } ?>
<?php if(st_stupid_bots()==1){ ?>
<?php include (get_template_directory() . "/plugins/stallion-stop-stupid-spambots.php"); ?><?php } ?>
<?php include (get_template_directory() . "/plugins/misc-plugin.php"); ?><?php } ?>
<?php include (get_template_directory() . "/widgets/recent-comments-functions.php"); ?>
<?php include (get_template_directory() . "/widgets/general-widgets.php"); ?>
<?php include (get_template_directory() . "/widgets/custom-widgets.php"); ?>
<?php include (get_template_directory() . "/widgets/my_custom_dashboard_widgets.php"); ?>
<?php if(st_my_defaults()!=0 && st_my_defaults()!=2){ ?>
<?php include (get_template_directory() . "/mydefaults/stallion_defaults.php"); ?><?php } ?>
<?php if(st_my_defaults()==2){ ?>
<?php include (get_template_directory() . "/mydefaults/stallion_defaults_seo.php"); ?><?php } ?>
<?php if(st_update_now()==1 or st_version_number() < '6.2'){ ?>
<?php include (get_template_directory() . "/ttk_updates.php"); ?><?php } ?>
<?php include (get_template_directory() . "/zz_extra_functions.php"); ?>
<?php if(st_nofollow_content_links()==1 && st_cloak_links()==1){ ?>
<?php include (get_template_directory() . "/plugins/stallion-nofollow-links-content.php"); ?><?php } ?>
<?php if(st_nofollow_comment_links()==1 && st_cloak_links()==1){ ?>
<?php include (get_template_directory() . "/plugins/stallion-nofollow-links-comments.php"); ?><?php } ?>
<?php require 'plugins/update.php'; $example_update_checker = new ThemeUpdateChecker('stallion-seo-theme','http://www.stallion-theme.com/updates/themes/stallion-seo-theme/info.json'); ?>