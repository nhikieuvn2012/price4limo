<div class="header_nav_box_bot<?php if(st_header_hide()==0){ ?>2<?php } ?>">
<div class="navigators">
<?php if(st_nav_menu_on()==1){ ?>
<?php wp_nav_menu(array('depth' => st_nav_depth(), 'container' => 'div', 'container_class' => 'menu', 'theme_location' => 'primary')); ?>
<?php } ?>
<?php if(st_nav_menu_on()==2){ ?>
<div class="menu">
<ul><?php if(st_home_nav_link()==1){ ?><li class="page_item"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></li><?php } ?>
<?php wp_list_pages('sort_column=menu_order&title_li=&depth='. st_nav_depth() .'&'. st_include_exclude() .'=' . st_pages_in_exclude()); ?><?php _e(st_extra_nav_links()); ?></ul>
</div>
<?php } ?>
</div>
</div>