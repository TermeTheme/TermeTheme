 <?php
 // include TEMPLATEPATH . '/inc/theme_option/redux-extensions-loader/loader.php';
 if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/terme_options_config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/terme_options_config.php' );
}

function addAndOverridePanelCSS() {
  wp_dequeue_style( 'redux-admin-css' );
  wp_register_style(
    'redux-custom-css',
    'http://localhost/wp/wp-content/themes/TermeTheme/assets/css/redux-custom-css.css',
    array( 'farbtastic' ), // Notice redux-admin-css is removed and the wordpress standard farbtastic is included instead
    time(),
    'all'
  );
  wp_enqueue_style('redux-custom-css');
}
// This example assumes your opt_name is set to redux_demo, replace with your opt_name value
add_action( 'redux/page/terme_options/enqueue', 'addAndOverridePanelCSS' );
