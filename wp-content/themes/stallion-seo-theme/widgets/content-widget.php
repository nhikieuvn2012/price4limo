<?php global $st_op_main; $user = $st_op_main->option['themeID'];?>
<?php if ($user != '') : ?>
<?php
if ( ! is_active_sidebar( 'content-widget-area'  )
)
return;
?>
<div id="content_widget">
<?php if ( is_active_sidebar( 'content-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'content-widget-area' ); ?>
<?php endif; ?>
</div><?php endif; ?>