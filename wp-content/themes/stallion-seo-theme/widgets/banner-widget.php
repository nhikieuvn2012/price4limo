<?php global $st_op_main; $user = $st_op_main->option['themeID'];?>
<?php if ($user != '') : ?>
<?php
if ( ! is_active_sidebar( 'banner-widget-area'  )
)
return;
?>
<div id="banner_widget">
<?php if ( is_active_sidebar( 'banner-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'banner-widget-area' ); ?>
<?php endif; ?>
</div><?php endif; ?>