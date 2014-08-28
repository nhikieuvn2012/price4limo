<div class="adsspace">
<?php if(st_googlep1()==1 && $wp_query->current_post == 0){ ?>
<div class="floatleft"><g:plusone size="medium" callback="plusonevote"></g:plusone></div>
<?php } ?>

<?php if(st_twitter()==1){ ?>
<div class="floatleft"><iframe src="http://platform.twitter.com/widgets/tweet_button.html?via=<?php echo(st_twitter_name()); ?>&amp;text=<?php echo (strip_tags(get_the_title($post->ID))); ?>&amp;url=<?php the_permalink(); ?>&amp;counturl=<?php the_permalink(); ?>&amp;count=horizontal" style="width:130px; height:20px;" allowtransparency="true" frameborder="0" scrolling="no"></iframe></div>
<?php } ?>

<?php if(st_facebook()==1){ ?>
<div class="floatleft"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="true" width="270px" height="25px" font="arial"></fb:like></div>
<?php } ?>
<div class="clear"></div>
</div>