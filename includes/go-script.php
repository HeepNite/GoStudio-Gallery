<?php 
/* adding css, js  and ajax */
function go_gallery_scripts_styles(){

 /* local css and js */   
wp_enqueue_style('go-styles-css', plugins_url('../assets/go-styles.css', __FILE__));
wp_enqueue_script( 'go-scprit-js', plugins_url('../assets/go-script.js', __FILE__), array('jquery'), '1.0', true);

/* ajax URL */
wp_localize_script( 'go-scprit-js','admin_url', array('ajax_url' =>admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts','go_gallery_scripts_styles');

/* Remove tags */
remove_filter( 'the_content', 'wpautop' );

?>