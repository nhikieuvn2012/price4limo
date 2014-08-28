<?php
function unregister_default_wp_widgets() {
unregister_widget('WP_Widget_Calendar');
unregister_widget('WP_Widget_Meta');
unregister_widget('WP_Widget_Recent_Comments');
unregister_widget('WP_Widget_Search');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);
?>
<?php
function stallion_widgets_init() {
register_sidebar( array(
'name' => __( 'Left Sidebar', 'stallion' ),
'id' => 'st-left-sidebar',
'description' => __( 'Left Sidebar', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Right Sidebar', 'stallion' ),
'id' => 'st-right-sidebar',
'description' => __( 'Right Sidebar', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'First Footer Widget', 'stallion' ),
'id' => 'first-footer-widget-area',
'description' => __( '1 of 4, 230px wide footer widgets', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
));
register_sidebar( array(
'name' => __( 'Second Footer Widget', 'stallion' ),
'id' => 'second-footer-widget-area',
'description' => __( '2 of 4, 230px wide footer widgets', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Third Footer Widget', 'stallion' ),
'id' => 'third-footer-widget-area',
'description' => __( '3 of 4, 230px wide footer widgets', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Fourth Footer Widget', 'stallion' ),
'id' => 'fourth-footer-widget-area',
'description' => __( '4 of 4, 230px wide footer widgets', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Fifth Footer Ad Widget', 'stallion' ),
'id' => 'fifth-footer-widget-area',
'description' => __( 'Bottom footer widget, 970px wide, for custom ads/content : Add a Text Widget', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Header Ad Widget', 'stallion' ),
'id' => 'header-widget-area',
'description' => __( 'Replaces header search form widget, for custom ads/content : Add a Text Widget', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Content Ad Widget', 'stallion' ),
'id' => 'content-widget-area',
'description' => __( 'Floating ad area in main content, for custom ads/content : Add a Text Widget', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Bottom Content Ad Widget', 'stallion' ),
'id' => 'bottom-content-widget-area',
'description' => __( 'Bottom of content ad area in main content of posts and static pages only, for custom ads/content : Add a Text Widget', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
register_sidebar( array(
'name' => __( 'Banner Ad Widget', 'stallion' ),
'id' => 'banner-widget-area',
'description' => __( 'Banner ad area, for custom ads/content : Add a Text Widget', 'stallion' ),
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => '</div>',
'before_title' => '<span class="gat_widget">',
'after_title' => '</span>',
) );
}
add_action( 'widgets_init', 'stallion_widgets_init' );
?>
<?php function st_Categories() { ?>
<span class="gat_widget">Categories</span>
<ul>
<?php wp_list_categories('title_li=&hide_empty=1'); ?>
</ul>
<?php } wp_register_sidebar_widget(
'2gat-categories',
'Stallion Categories Widget',
'st_Categories',
array(
'description' => 'Stallion Basic Categories Widget'
)
);
?>
<?php function st_Blogroll() { ?>
<span class="gat_widget">Links</span>
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>
<?php } wp_register_sidebar_widget(
'3gat-links',
'Stallion Links Widget',
'st_Blogroll',
array(
'description' => 'Stallion Basic Blogroll Widget'
)
);
?>
<?php function st_Meta() { ?>
<span class="gat_widget">Meta</span>
<div class="loginfm">
<?php wp_meta(); ?>
<?php wp_registerseo(); ?>
<?php wp_loginoutseo(); ?>
</div>
<?php } wp_register_sidebar_widget(
'4gat-meta',
'Stallion Meta Widget',
'st_Meta',
array(
'description' => 'Stallion Meta Widget includes advanced SEO code to prevent wasted link benefit on login links'
)
);
?>
<?php function st_RSS() { ?>
<span class="gat_widget">RSS Feeds</span>
<ul>
<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Article <abbr title="Really Simple Syndication">RSS</abbr> Feed'); ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/rss.gif" alt="<?php bloginfo('name'); ?> <?php _e('Article RSS Feed', 'default'); ?>" /></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr> Feed'); ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/rss.gif" alt="<?php bloginfo('name'); ?> <?php _e('Comments RSS Feed', 'default'); ?>" /></a></li>
</ul>
<?php } wp_register_sidebar_widget(
'5gat-rss-feeds',
'Stallion RSS Feeds Widget',
'st_RSS',
array(
'description' => 'Stallion WordPress RSS Feeds Widget includes links to post feed and comment feed'
)
);
?>
<?php function st_Recent_Articles() { ?>
<span class="gat_widget">Recent Articles</span>
<ul>
<?php wp_get_archives('type=postbypost&limit=12'); ?>
</ul>
<?php } wp_register_sidebar_widget(
'6gat-recent-articles',
'Stallion Recent Articles Widget',
'st_Recent_Articles',
array(
'description' => 'Stallion Basic Recent Articles Widget, latest 12 articles'
)
);
?>
<?php function st_Recent_Comments12() { ?>
<span class="gat_widget">Recent Comments</span>
<ul>
<?php mw_recent_comments(12, false, 60, 50, 50, 'comment_only', '<li><a href="%permalink%">%author_name% - <strong>%title%</strong></a></li>','d.m.y, H:i'); ?>
</ul>
<?php } wp_register_sidebar_widget(
'7gat-recent-comments-12',
'Stallion Recent Comments 12 Widget',
'st_Recent_Comments12',
array(
'description' => 'Stallion Recent Comments Widget, includes SEO code to prevent wasted link benefit. 12 Comments shown'
)
);
?>
<?php function st_Recent_Comments18() { ?>
<span class="gat_widget">Recent Comments</span>
<ul>
<?php mw_recent_comments(18, false, 60, 50, 50, 'comment_only', '<li><a href="%permalink%">%author_name% - <strong>%title%</strong></a></li>','d.m.y, H:i'); ?>
</ul>
<?php } wp_register_sidebar_widget(
'7gat-recent-comments-18',
'Stallion Recent Comments 18 Widget',
'st_Recent_Comments18',
array(
'description' => 'Stallion Recent Comments Widget, includes SEO code to prevent wasted link benefit. 18 Comments shown'
)
);
?>
<?php function st_Pages() { ?>
<span class="gat_widget">Pages</span>
<ul>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
<?php } wp_register_sidebar_widget(
'9gat-pages',
'Stallion Pages Widget',
'st_Pages',
array(
'description' => 'Stallion Basic Pages Widget'
)
);
?>
<?php function st_Tags() { ?>
<span class="gat_widget">Tags</span>
<div class="loginfm">
<?php wp_tag_cloud('smallest=8&largest=14&number=18'); ?>
</div>
<?php } wp_register_sidebar_widget(
'9gat-tags',
'Stallion Tags Widget',
'st_Tags',
array(
'description' => 'Basic Tags Widget, Top 18 Tags'
)
);
?>
<?php function st_Search() { ?>
<span class="gat_widget">Search</span>
<div class="loginfm">
<form method="get" id="searchwidget" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<div><label class="screen-reader-text" for="s"></label>
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Go" />
</div>
</form>
</div>
<?php } wp_register_sidebar_widget(
'9gat-search',
'Stallion Search Widget',
'st_Search',
array(
'description' => 'Stallion WordPress Search Widget'
)
);
?>
<?php function st_Facebkfc() { ?>
<span class="gat_widget">Facebook</span>
<div class="loginfm alcenter">
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:activity site="<?php the_permalink(); ?>" width="195" height="400" header="false" font="arial" recommendations="false"></fb:activity>
</div>
<?php } wp_register_sidebar_widget(
'9gat-facebook',
'Stallion Facebook Widget',
'st_Facebkfc',
array(
'description' => 'Stallion Facebook Widget'
)
);
?>
<?php function st_Archives() { ?>
<?php if (is_home()) { ?>
<span class="gat_widget">Archives</span>
<ul>
<?php wp_get_archives('type=monthly&limit=12'); ?>
</ul>
<?php } ?>
<?php } wp_register_sidebar_widget(
'9gat-archives',
'Stallion Monthly Archives Widget',
'st_Archives',
array(
'description' => 'Monthly Archives are NOT a recommend widget SEO wise, if you use a monthly archive use this one it is less SEO damaging than the default Archives widget.'
)
);
?>