<?php
class terme_footer_social_widget extends WP_Widget {
    function __construct() {
            parent::__construct(
            'terme_footer_social_widget',
            __('Terme footer Social', 'terme'),
            array( 'description' => __( 'Show the ADS Section', 'terme' ), )
        );
    }
    public function widget( $args, $instance ) {
        // HRER IS OUTPUT
    }

    public function form( $instance ) {
        echo '<p>'.__('There is no option for this widget!', 'terme').'</p>';
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        return $instance;
    }
}
function terme_footer_social_widget() {
	register_widget( 'terme_footer_social_widget' );
}
add_action( 'widgets_init', 'terme_footer_social_widget' );
