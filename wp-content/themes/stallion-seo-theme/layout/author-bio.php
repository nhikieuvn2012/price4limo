<div class="author-bio">
<div class="fadleft"><?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?></div>
<span class="author_name"><?php if(get_the_author_meta('st_pro_authorname')){ ?><?php the_author_meta('st_pro_authorname'); ?><?php } else { ?><?php the_author_meta('display_name'); ?><?php } ?></span> : <?php the_author_meta('description'); ?>

<p class="align-right">
<?php if(st_biography_links()==1 && st_cloak_links()==1){ ?>
<?php if(get_the_author_meta('st_pro_googleplus')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_googleplus'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/google-plus.png" alt="Google Plus <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_facebook')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_facebook'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/facebook.png" alt="Facebook <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_twitter')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_twitter'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/twitter.png" alt="Twitter <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_linkedin')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_linkedin'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/linkedin.png" alt="Linkedin <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_stumbleupon')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_stumbleupon'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/stumbleupon.png" alt="StumbleUpon <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_youtube')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_youtube'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/youtube.png" alt="<?php the_author_meta('display_name'); ?> YouTube Channel" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_flickr')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_flickr'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/flickr.png" alt="<?php the_author_meta('display_name'); ?> Flickr" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php if(get_the_author_meta('st_pro_rssfeed')){ ?><span class="affst" title="tests" id="<?php the_author_meta('st_pro_rssfeed'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico/rss-feed.png" alt="RSS Feed" width="32" height="32" class="wp-image-social" /></span> <?php } ?>
<?php } else { ?>
<?php if(get_the_author_meta('st_pro_googleplus')){ ?><a href="<?php the_author_meta('st_pro_googleplus'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/google-plus.png" alt="Google Plus <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_facebook')){ ?><a href="<?php the_author_meta('st_pro_facebook'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/facebook.png" alt="Facebook <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_twitter')){ ?><a href="<?php the_author_meta('st_pro_twitter'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/twitter.png" alt="Twitter <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_linkedin')){ ?><a href="<?php the_author_meta('st_pro_linkedin'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/linkedin.png" alt="Linkedin <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_stumbleupon')){ ?><a href="<?php the_author_meta('st_pro_stumbleupon'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/stumbleupon.png" alt="StumbleUpon <?php the_title(); ?>" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_youtube')){ ?><a href="<?php the_author_meta('st_pro_youtube'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/youtube.png" alt="<?php the_author_meta('display_name'); ?> YouTube Channel" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_flickr')){ ?><a href="<?php the_author_meta('st_pro_flickr'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/flickr.png" alt="<?php the_author_meta('display_name'); ?> Flickr" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php if(get_the_author_meta('st_pro_rssfeed')){ ?><a href="<?php the_author_meta('st_pro_rssfeed'); ?>" target="_blank" rel="me"><img src="<?php bloginfo('template_url'); ?>/images/ico/rss-feed.png" alt="RSS Feed" width="32" height="32" class="wp-image-social" /></a> <?php } ?>
<?php } ?>
<br />
<?php if(get_the_author_meta('st_pro_authorwebsiteurl') && get_the_author_meta('st_pro_authorwebsiteanchor')){ ?>Website - <a href="<?php the_author_meta('st_pro_authorwebsiteurl'); ?>" target="_blank" rel="me"><?php the_author_meta('st_pro_authorwebsiteanchor'); ?></a>
<?php } else { ?>
<?php if (get_the_author_url()) { ?>Website - <?php the_author_link(); ?><?php } ?>
<?php } ?></p>
</div>
<div class="clear"></div>