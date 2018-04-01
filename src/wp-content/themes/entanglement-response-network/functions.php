<?php

add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
global $pagenow;

//if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
wp_deregister_script('heartbeat');
}