<div id="searchform">
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p><input name="submit" type="image" src="<?php bloginfo('stylesheet_directory');?><?php _e('/images/' . st_themecolor() . '/search.gif'); ?>" alt="Search <?php bloginfo('name'); ?>" /></p>
<p><input name="s" type="text" class="src_field" value="<?php the_search_query(); ?>" /></p>
</form>
</div>