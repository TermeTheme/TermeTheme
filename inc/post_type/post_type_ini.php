<?php
function cornita_slider_post_type() {
  $labels = array(
    'name'               => _x( 'Sliders', 'terme' ),
    'singular_name'      => _x( 'Slider', 'terme' ),
    'add_new'            => __( 'Add New', 'terme' ),
    'add_new_item'       => __( 'Add New Slider' ),
    'edit_item'          => __( 'Edit Slider' ),
    'new_item'           => __( 'New Slider' ),
    'all_items'          => __( 'All Sliders' ),
    'view_item'          => __( 'View Slider' ),
    'search_items'       => __( 'Search Sliders' ),
    'not_found'          => __( 'No Sliders found' ),
    'not_found_in_trash' => __( 'No Sliders found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Sliders'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Sliders and Slider specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', ),
    'has_archive'   => false,
  );
  register_post_type( 'slider', $args );
}
add_action( 'init', 'cornita_slider_post_type' );
