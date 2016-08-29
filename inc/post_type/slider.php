<?php
// Register Custom Post Type
function slider_post_type() {

	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'terme' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'terme' ),
		'menu_name'             => __( 'Sliders', 'terme' ),
		'name_admin_bar'        => __( 'Slider', 'terme' ),
		'archives'              => __( 'Item Archives', 'terme' ),
		'parent_item_colon'     => __( 'Parent Item:', 'terme' ),
		'all_items'             => __( 'All Items', 'terme' ),
		'add_new_item'          => __( 'Add New Item', 'terme' ),
		'add_new'               => __( 'Add New', 'terme' ),
		'new_item'              => __( 'New Item', 'terme' ),
		'edit_item'             => __( 'Edit Item', 'terme' ),
		'update_item'           => __( 'Update Item', 'terme' ),
		'view_item'             => __( 'View Item', 'terme' ),
		'search_items'          => __( 'Search Item', 'terme' ),
		'not_found'             => __( 'Not found', 'terme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'terme' ),
		'featured_image'        => __( 'Featured Image', 'terme' ),
		'set_featured_image'    => __( 'Set featured image', 'terme' ),
		'remove_featured_image' => __( 'Remove featured image', 'terme' ),
		'use_featured_image'    => __( 'Use as featured image', 'terme' ),
		'insert_into_item'      => __( 'Insert into item', 'terme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'terme' ),
		'items_list'            => __( 'Items list', 'terme' ),
		'items_list_navigation' => __( 'Items list navigation', 'terme' ),
		'filter_items_list'     => __( 'Filter items list', 'terme' ),
	);
	$args = array(
		'label'                 => __( 'Slider', 'terme' ),
		'description'           => __( 'Main Page Slider', 'terme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',

	);
	register_post_type( 'slider', $args );

}
add_action( 'init', 'slider_post_type', 0 ); ?>
