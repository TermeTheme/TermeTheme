<?php
/**
 * Slider metaboxes class
 */
class Terme_Slider {

    function __construct() {
        add_action( 'add_meta_boxes', array($this, 'add_meta_box') );
        add_action( 'save_post', array($this, 'save') );
    }

    public function add_meta_box() {
		add_meta_box(
			'slider_type',
			__( 'Slider Settings', 'terme' ),
			array($this, 'settings_callback'),
			'slider',
            'normal'
		);
		// add_meta_box(
		// 	'slider_slides',
		// 	__( 'Image slides', 'cornita' ),
		// 	array($this, 'slides_callback'),
		// 	'slider'
		// );
    }

    public function slides_callback( $post ) {
    	wp_enqueue_script( 'wp-uploader', get_template_directory_uri() . '/assets/admin/js/wp-uploader.js', array(), '1.0.0', true );
    	wp_enqueue_script( 'cornita_slides', get_template_directory_uri() . '/assets/admin/js/slides.js', array(), '1.0.0', true );
    	wp_enqueue_media();
    	wp_enqueue_script('jquery-ui-core');
    	wp_nonce_field( 'slides_meta_box', 'slides_meta_box_nonce' );
    	$slides = get_post_meta( $post->ID, '_terme_slider_slides',true);
        include get_template_directory().'/inc/slider/slides_html.php';
    }

    public function settings_callback( $post ) {
        wp_enqueue_script( 'wp-uploader', get_template_directory_uri() . '/assets/admin/js/wp-uploader.js', array(), '1.0.0', true );
    	wp_enqueue_script( 'cornita_slides', get_template_directory_uri() . '/assets/admin/js/slides.js', array(), '1.0.0', true );
    	wp_enqueue_media();
    	wp_enqueue_script('jquery-ui-core');
    	wp_nonce_field( 'slides_meta_box', 'slides_meta_box_nonce' );
    	$slider = get_post_meta( $post->ID, '_terme_slider_slides',true);
        include get_template_directory().'/inc/slider/settings_html.php';
    }

    public function save( $post_id ) {
    	if ( ! isset( $_POST['slides_meta_box_nonce'] ) ) {
    		return;
    	}
    	if ( ! wp_verify_nonce( $_POST['slides_meta_box_nonce'], 'slides_meta_box' ) ) {
    		return;
    	}
    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    		return;
    	}

    	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

    		if ( ! current_user_can( 'edit_page', $post_id ) ) {
    			return;
    		}

    	} else {

    		if ( ! current_user_can( 'edit_post', $post_id ) ) {
    			return;
    		}
    	}
        $slides = $_POST['slider'];
        $save_array = array();
        $save_array['settings'] = ( isset($slides['settings']) && !empty($slides['settings']) ) ? $slides['settings'] : array('type' => 'custom') ;
        if ( isset($slides['slides']) && !empty($slides['slides']) ) {
            foreach ($slides['slides'] as $key => $slide) {
                if (
                    isset($slide['img']) && !empty($slide['img']) &&
                    isset($slide['title']) && !empty($slide['title']) &&
                    isset($slide['url']) && !empty($slide['url'])
                ) {
                    $save_array['slides'][] = $slide;
                }

            }
        }
    	update_post_meta( $post_id, '_terme_slider_slides', $save_array );
    }


}

$terme_slider = new Terme_Slider();
