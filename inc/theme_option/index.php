<?php
include get_template_directory() . '/inc/theme_option/redux-extensions-loader/loader.php';
 if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/terme_options_config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/terme_options_config.php' );
}
function terme_redux_customizer() {
  wp_dequeue_style( 'redux-admin-css' );
  wp_register_style(
    'redux-custom-css',
    get_template_directory_uri().'/assets/admin/css/redux-custom-css.css',
    array( 'farbtastic' ),
    time(),
    'all'
  );
  wp_enqueue_style('redux-custom-css');
}
add_action( 'redux/page/terme_options/enqueue', 'terme_redux_customizer' );
