<?php global $st_op_main; $user = $st_op_main->option['themeID'];?>
<?php if ($user != '') : ?>
<?php
if ( ! is_active_sidebar( 'header-widget-area'  )
)
return;
?>
<div id="header_widget">
<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'header-widget-area' ); ?>
<?php endif; ?>
</div><?php endif; ?>