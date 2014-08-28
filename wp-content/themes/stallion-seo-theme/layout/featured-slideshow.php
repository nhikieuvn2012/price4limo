<div id="st_feature-wrap" class="post-content">
<div id="st_feature">
<div id="st_feature_content">
<?php function st_feature_excerpt($st_cont, $st_text, $st_end = "...")
{
$st_variable = $st_cont;
$array = explode(" ", $st_cont);
if (count($array)<=$st_text){
$st_variable = $st_cont;
}
else {
array_splice($array, $st_text);
$st_variable = implode(" ", $array);
}
return $st_variable.$st_end;
}
$st_fe_sl_num = st_feature_slide_num();
if($st_fe_sl_num == '') $st_fe_sl_num = '1';
query_posts("meta_key=featured&meta_value=true&posts_per_page=".$st_fe_sl_num);
$stthumb = 0;
while (have_posts()) : the_post();
$st_ft_thumb = get_image_path(get_post_meta( $id, 'thumb', true ));
if ($st_ft_thumb != '') {
if (st_sidebar_lo() == '200l200r' or st_sidebar_lo() == '200l200l' or st_sidebar_lo() == '200r200r')
{
$st_feature_thumb_width = 560;
};
if (st_sidebar_lo() == '255l165l' or st_sidebar_lo() == '255r165r')
{
$st_feature_thumb_width = 550;
};
if (st_sidebar_lo() == '310l' or st_sidebar_lo() == '310r')
{
$st_feature_thumb_width = 660;
};
if (st_sidebar_lo() == '1000')
{
$st_feature_thumb_width = 970;
};
$st_feature_thumb_height = 300;
$stthumb++;
?>
<div class="st_feature_post"<?php if($stthumb>1) echo ' class="st_feature_display"';?>>
<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo $st_ft_thumb;?>&amp;w=<?php echo $st_feature_thumb_width;?>&amp;h=<?php echo $st_feature_thumb_height;?>&amp;zc=1&amp;q=75" width="<?php echo $st_feature_thumb_width;?>" height="<?php echo $st_feature_thumb_height;?>" alt="<?php printf( esc_attr__( '%s', 'stallion' ), the_title_attribute( 'echo=0' ) ); ?>" /></a>
<div class="st_feature_main">
<span class="feature-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'stallion' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></span>
<?php echo '<p>' . st_feature_excerpt(get_the_excerpt(),25,'...') . '</p>';?>
</div>

</div>
<?php } ?>
<?php endwhile; ?>
<?php wp_reset_query(); ?>	
		
</div>
<div class="st_feature_nav">
<span class="st_feature_pager" id="st_feature_pager"></span>                
<a href="#st_feature_next" class="st_feature_next"></a>
<a href="#st_feature_prev" class="st_feature_prev"></a>
<div class="clear"></div>
</div>

</div>
</div>
<?php
$st_ft_effect = st_ft_effects();
if($st_ft_effect == '') $st_ft_effect = 'zoom';
$st_ft_easing = st_ft_easings();
if($st_ft_easing == '') $st_ft_easing = 'easeOutQuart';
$st_ft_time = st_ft_timing();
if($st_ft_time == '') $st_ft_time = 5000;
$st_ft_time2 = st_ft_timing2();
if($st_ft_time2 == '') $st_ft_time2 = 2000;
?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery('#st_feature_content').cycle({
fx: '<?php echo $st_ft_effect;?>',
timeout: <?php echo $st_ft_time;?>,
speed: <?php echo $st_ft_time2;?>,
next: '.st_feature_next',
prev: '.st_feature_prev',
pager: '.st_feature_pager',
continuous: 0,
sync: 1,
pause: 1,
pauseOnPagerHover: 1,
cleartype: true,
cleartypeNoBg: true,
easing: '<?php echo $st_ft_easing;?>'
});
});
</script>