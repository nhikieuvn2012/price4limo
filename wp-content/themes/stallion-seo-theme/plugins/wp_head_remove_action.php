<?php global $st_op_main; $user = $st_op_main->option['themeID'];?>
<?php if ($user == '') : ?><?php else: ?>
<?php if (st_wp_generatoroff() == 'off') { ?><?php remove_action('wp_head', 'wp_generator');?><?php } ?>
<?php if (st_wp_shortlink_wp_headoff() == 'off') { ?><?php remove_action('wp_head', 'wp_shortlink_wp_head');?><?php } ?>
<?php if (st_start_post_rel_linkoff() == 'off') { ?><?php remove_action('wp_head', 'start_post_rel_link');?><?php } ?>
<?php if (st_adjacent_posts_rel_link_wp_headoff() == 'off') { ?><?php remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');?><?php } ?>
<?php if (st_index_rel_linkoff() == 'off') { ?><?php remove_action('wp_head', 'index_rel_link');?><?php } ?>
<?php if (st_parent_post_rel_linkoff() == 'off') { ?><?php remove_action('wp_head', 'parent_post_rel_link', 10, 0);?><?php } ?>
<?php if (st_wlwmanifest_linkoff() == 'off') { ?><?php remove_action('wp_head', 'wlwmanifest_link');?><?php } ?>
<?php if (st_rsd_linkoff() == 'off') { ?><?php remove_action('wp_head', 'rsd_link');?><?php } ?>
<?php if (st_wp_enqueue_scriptsoff() == 'off') { ?><?php remove_action('wp_head', 'wp_enqueue_scripts', 1);?><?php } ?>
<?php if (st_wp_print_head_scriptsoff() == 'off') { ?><?php remove_action('wp_head', 'wp_print_head_scripts', 9);?><?php } ?>
<?php if (st_wp_print_stylesoff() == 'off') { ?><?php remove_action('wp_head', 'wp_print_styles', 8);?><?php } ?>
<?php if (st_feed_linksoff() == 'off') { ?><?php remove_action('wp_head', 'feed_links', 2);?><?php } ?>
<?php if (st_feed_links_extraoff() == 'off') { ?><?php remove_action('wp_head', 'feed_links_extra', 3);?><?php } ?>
<?php if (st_rel_canonicaloff() == 'off') { ?><?php remove_action('wp_head', 'rel_canonical');?><?php } ?>
<?php if (st_automatic_feedoff() != 'off') { ?><?php add_theme_support( 'automatic-feed-links' );?><?php } ?>
<?php if (st_admin_baroff()==0){ ?><?php add_filter('show_admin_bar', '__return_false' );?><?php } ?><?php endif; ?>