<div id="imageMenu">
<?php
$st_walker = new St_My_Walker;
wp_nav_menu( array( 
'theme_location' => 'custom-sliding-menu',
'fallback_cb' => 'no_sliding_menu',
'container' => '',
'container_class' =>'',
'container_id' =>'', 
'menu_class' =>'',
'menu_id' =>'',
'depth' => '1',  
'walker' => $st_walker
) 
); ?>
</div>