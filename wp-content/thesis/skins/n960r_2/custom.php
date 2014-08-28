<?php
/*
	This file is for skin specific customizations. Be careful not to change your skin's skin.php file as that will be upgraded in the future and your work will be lost.
	If you are more comfortable with PHP, we recommend using the super powerful Thesis Box system to create elements that you can interact with in the Thesis HTML Editor.
*/
add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
} );

function addMyRewrite() {
    add_rewrite_tag('%bus_id_para%', '([^&]+)');
    add_rewrite_rule('bus-details/(.*)/?', 'index.php?pagename=bus-details&bus_id_para=$matches[1]', 'top');
    //flush_rewrite_rules();
}
add_action('init', 'addMyRewrite');