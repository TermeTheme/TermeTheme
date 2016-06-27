<?php
function terme_pb_get_elements() {
    $elements = array();

    $classes = array('Terme_Element_One', 'Terme_Element_Two', 'Terme_Element_Three', 'Terme_Element_Four', 'Terme_Element_Five' );
    foreach ($classes as $key => $class) {
        $element = new $class;
        $new_elements = $element->get_dashboard_output();
        $elements[] = $new_elements;
    }

    $elements = apply_filters( 'after_terme_page_builder_elements', $elements );
    return $elements;
}

function terme_page_builder_enqueue_scripts(){
    global $post;
    $screen = get_current_screen();
	if( get_post_type ( $post->ID ) != 'page' || $screen->post_type != 'page' )	{
		return;
	}
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_style( 'wpmlr_select2', get_template_directory_uri() . '/assets/admin/css/select2.min.css', array() );
    wp_enqueue_script( 'wpmlr_select2', get_template_directory_uri() . '/assets/admin/js/select2.min.js', array('jquery'), true );
}
add_action('admin_enqueue_scripts','terme_page_builder_enqueue_scripts');

include TEMPLATEPATH . '/inc/page-builder/class.abstract.terme_page_builder_element.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_01.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_02.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_03.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_04.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_05.php';
include TEMPLATEPATH . '/inc/page-builder/metabox.php';
