 <?php
 include TEMPLATEPATH . '/inc/theme_option/redux-extensions-loader/loader.php';
 if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/terme_options_config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/terme_options_config.php' );
}
