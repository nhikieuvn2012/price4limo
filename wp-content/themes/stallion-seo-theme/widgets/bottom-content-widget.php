<?php global $st_op_main; $user = $st_op_main->option['themeID'];?>
<?php if ($user != '') : ?>
<?php
if ( ! is_active_sidebar( 'bottom-content-widget-area'  )
)
return;
?>
<div id="bottom-content_widget">
<?php if ( is_active_sidebar( 'bottom-content-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'bottom-content-widget-area' ); ?>
<?php endif; ?>
</div>
<div class="clear"></div><?php endif; ?>