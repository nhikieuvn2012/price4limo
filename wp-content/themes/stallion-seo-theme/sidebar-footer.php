<?php
if ( ! is_active_sidebar( 'first-footer-widget-area'  )
&& ! is_active_sidebar( 'second-footer-widget-area' )
&& ! is_active_sidebar( 'third-footer-widget-area'  )
&& ! is_active_sidebar( 'fourth-footer-widget-area' )
&& ! is_active_sidebar( 'fifth-footer-widget-area' )
)
return;
?>
<div id="footer-widget-area">

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>

<div id="first" class="widget-area">
<div class="sidebar-box">
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
</div></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
<div id="second" class="widget-area">
<div class="sidebar-box">
<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
</div></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
<div id="third" class="widget-area">
<div class="sidebar-box">
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
</div></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
<div id="fourth" class="widget-area">
<div class="sidebar-box">
<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
</div></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'fifth-footer-widget-area' ) ) : ?>
<div id="fifth" class="widget-area">
<div class="sidebar-box">
<?php dynamic_sidebar( 'fifth-footer-widget-area' ); ?>
</div></div>
<?php endif; ?>
</div>