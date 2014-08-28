<?php
/**
 * Aside Post Format on index and archive pages
 *
 * @package WordPress
 * @subpackage Stallion SEO Theme
 * @since Stallion 6.1
 */
?>

<div class="post-date"><?php edit_post_link('Edit', '', ''); ?></div>

<div class="post-content">
<?php if (is_active_sidebar('content-widget-area')) : ?>
<?php if ($wp_query->current_post == 0) include(get_template_directory()."/widgets/content-widget.php"); ?>
<?php endif; ?>
<?php if(st_auto_thumbs()!=0){ ?>
<?php $thumbnail = get_image_path(get_post_meta( $id, 'thumb', true ));
if($thumbnail!=''): ?>
<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo $thumbnail;?>&amp;w=<?php echo st_auto_thumb_wid(); ?>&amp;h=<?php echo st_auto_thumb_hei(); ?>&amp;zc=1&amp;q=75" class="<?php echo st_auto_thumb_align(); ?>" alt="<?php echo get_the_title(); ?>" width="<?php echo st_auto_thumb_wid(); ?>" height="<?php echo st_auto_thumb_hei(); ?>" /></a>
<?php else: ?>
<?php if(st_auto_thumbs()!=2 && st_auto_thumbs()!=0){ ?>
<?php $thumb=vp_get_thumb_url($post->post_content);
if ($thumb!=''): ?>
<a href="<?php the_permalink(); ?>"><img class="<?php echo st_auto_thumb_align(); ?>" src="<?php echo $thumb; ?>" width="<?php echo st_auto_thumb_wid(); ?>" alt="<?php echo get_the_title(); ?>" /></a>
<?php endif; ?>
<?php } ?>
<?php endif; ?>
<?php } ?>

<?php /*
<?php if(st_adsense_on()==1 && st_adsense_con1()==0){global $AdSense1; if ($wp_query->current_post == st_adsense_main_ad()){_e('<div class="' . st_adsense_float() . '">'); st_adsense_insert($AdSense1);?>
</div><?php }} ?>
<?php if(st_chitika_on()==1 && st_chitika_con1()==0){global $Chitika1; if ($wp_query->current_post == st_chitika_main_ad()){_e('<div class="' . st_chitika_float() . '">'); st_chitika_insert($Chitika1);?>
</div><?php }} ?>
<?php if(st_clickbank_on()==1 && st_cb_con1()==0){global $ClickBank1; if ($wp_query->current_post == st_clickbank_main_ad()){_e('<div class="' . st_cb_float() . '">'); st_cb_insert($ClickBank1);?>
</div><?php }} ?>
*/ ?>
<?php if(st_post_lo()==1){ ?>
<?php the_excerpt(','); ?>
<p class="clear">Continue Reading <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p><?php } ?>
<?php if(st_post_lo()==0){ ?>
<?php the_content(); ?>
<p class="clear"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p><?php } ?>

<?php if (comments_open() && st_commentlink()==1): ?><div class="postcom"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div><?php endif; ?>
<?php if (comments_open() && st_commentlink()==2): ?><div class="postcom"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></div><?php endif; ?>
<div class="clear"></div>

</div>

<?php /*
<?php if(st_adsense_on()==1 && st_adsense_lnk6()==0){global $AdSense6; if ($wp_query->current_post == st_adsense_lnk6_pm()){_e('<div class="adscenter">'); st_adsense_insert($AdSense6);?>
</div><?php }} ?>
<?php if(st_clickbank_on()==1 && st_cb_con3()==0){global $ClickBank3; if ($wp_query->current_post == st_cb_con3_pm()){_e('<div class="adscenter">'); st_cb_insert($ClickBank3);?>
</div><?php }} ?>
<?php if(st_chitika_on()==1 && st_chitika_con6()==0){global $Chitika6; if ($wp_query->current_post == st_chitika_con6_pm()){_e('<div class="adscenter">'); st_chitika_insert($Chitika6);?>
</div><?php }} ?>
*/ ?>