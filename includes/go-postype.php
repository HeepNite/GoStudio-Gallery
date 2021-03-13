<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Register Custom Post Type
function go_gallery_postype() {
    $labels = array(
        'name'                  => _x( 'Project', 'Post type general name', 'gogalery' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'gogalery' ),
        'menu_name'             => _x( 'Go Gallery', 'Admin Menu text', 'gogalery' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'gogalery' ),
        'add_new'               => __( 'Add New', 'gogalery' ),
        'add_new_item'          => __( 'Add New Project', 'gogalery' ),
        'new_item'              => __( 'New Project', 'gogalery' ),
        'edit_item'             => __( 'Edit Project', 'gogalery' ),
        'view_item'             => __( 'View Project', 'gogalery' ),
        'all_items'             => __( 'All Projects', 'gogalery' ),
        'search_items'          => __( 'Search Projects', 'gogalery' ),
        'parent_item_colon'     => __( 'Parent Projects:', 'gogalery' ),
        'not_found'             => __( 'Not found.', 'gogalery' ),
        'not_found_in_trash'    => __( 'No found in trash.', 'gogalery' ),
        'featured_image'        => _x( 'Featured image', '', 'gogalery' ),
        'set_featured_image'    => _x( 'Set featured image', '', 'gogalery' ),
        'remove_featured_image' => _x( 'Remove featured image', '', 'gogalery' ),
        'use_featured_image'    => _x( 'Use featured image', '', 'gogalery' ),
        'archives'              => _x( 'Projects Archive', '', 'gogalery' ),
        'insert_into_item'      => _x( 'Insert into Project', '', 'gogalery' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Project', '', 'gogalery' ),
        'filter_items_list'     => _x( 'Filter Projects list', '. Added in 4.4', 'gogalery' ),
        'items_list_navigation' => _x( 'Projects list navigation', '', 'gogalery' ),
        'items_list'            => _x( 'Projects List', '', 'gogalery' ),
    );

    $args = array(
        'labels'             => $labels,
        'supports'           => array( 'title', 'editor','thumbnail','excerpt'),
        'taxonomies'         => array( 'category'),
        'capability_type'    => array('project', 'projects'),
        'menu_icon'          => 'dashicons-clipboard',
        'rewrite'            => array( 'slug' => 'projects' ),
        'menu_position'      => 6,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'map_meta_cap'       => true,
        'hierarchical'       => false
        
    );

    register_post_type( 'gogalery', $args );
}

add_action( 'init', 'go_gallery_postype' );

/* activatios rewrite */
function go_galery_rewrite_flush() {
	go_gallery_postype();
	flush_rewrite_rules();
}
?>