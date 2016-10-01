<?php
function terme_slider_post_type() {
  $labels = array(
    'name'               => __( 'Sliders', 'terme' ),
    'singular_name'      => __( 'Slider', 'terme' ),
    'add_new'            => __( 'Add New', 'terme' ),
    'add_new_item'       => __( 'Add New Slider', 'terme' ),
    'edit_item'          => __( 'Edit Slider', 'terme' ),
    'new_item'           => __( 'New Slider', 'terme' ),
    'all_items'          => __( 'All Sliders', 'terme' ),
    'view_item'          => __( 'View Slider', 'terme' ),
    'search_items'       => __( 'Search Sliders', 'terme' ),
    'not_found'          => __( 'No Sliders found', 'terme' ),
    'not_found_in_trash' => __( 'No Sliders found in the Trash', 'terme' ),
    'parent_item_colon'  => '',
    'menu_name'          => __( 'Sliders', 'terme' )
  );
  $args = array(
    'labels'        => $labels,
    'public'        => false,
    'menu_icon'   => 'dashicons-format-gallery',
    'show_ui' => true,
    'menu_position' => 5,
    'supports'      => array( 'title', ),
    'has_archive'   => false,
  );
  register_post_type( 'slider', $args );
}
add_action( 'init', 'terme_slider_post_type' );
