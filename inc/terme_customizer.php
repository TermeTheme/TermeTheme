<?php
/*-----------------------------------------------------------------------------------*/
# Terme Add Custom CSS Style
/*-----------------------------------------------------------------------------------*/
add_action('wp_head', 'terme_head_style');
  function terme_head_style() {
      global $terme_options;
      if ( isset($terme_options['favicon_57']['url']) && !empty ($terme_options['favicon_57']['url'])) {
        echo '<link rel="shortcut icon" href="' .$terme_options['favicon_57']['url']. '" />';
       } elseif (isset($terme_options['favicon_72']['url']) && !empty ($terme_options['favicon_72']['url'])) {
         echo '<link rel="shortcut icon" href="' .$terme_options['favicon_72']['url']. '" />';
      } elseif (isset($terme_options['favicon_114']['url']) && !empty ($terme_options['favicon_114']['url'])) {
        echo '<link rel="shortcut icon" href="' .$terme_options['favicon_114']['url']. '" />';
       } elseif (isset($terme_options['favicon_144']['url']) && !empty ($terme_options['favicon_144']['url'])) {
         echo '<link rel="shortcut icon" href="' .$terme_options['favicon_144']['url']. '" />';
       } elseif( isset($terme_options['favicon_16']['url']) && !empty ($terme_options['favicon_16']['url']) ) {
        echo '<link rel="shortcut icon" href="' .$terme_options['favicon_16']['url']. '" />';
      }
    	echo '<style>'; ?>
      <?php
      if (isset($terme_options['large_desktop']) && !empty($terme_options['large_desktop'])) {
        echo '@media (min-width: 1200px) {' . $terme_options['large_desktop'] . '}';
      }elseif (isset($terme_options['desktop']) && !empty($terme_options['desktop'])) {
        echo '@media (min-width: 992px) {' . $terme_options['desktop'] . '}';
      }elseif (isset($terme_options['tablet']) && !empty($terme_options['tablet'])) {
        echo '@media (min-width: 768px) {' . $terme_options['tablet'] . '}';
      }elseif (isset($terme_options['mobile']) && !empty($terme_options['mobile'])) {
        echo '@media (max-width: 768px) {' . $terme_options['mobile'] . '}';
      }
      if (isset($terme_options['custom_css']) && !empty($terme_options['custom_css'])) {
        echo $terme_options['custom_css'];
      }
      echo '</style>';
  }
/*-----------------------------------------------------------------------------------*/
# Terme Add Custom Js
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_footer', 'terme_footer_script' );
  function terme_footer_script() {
      global $terme_options;
      if (isset($terme_options['custom_js']) && !empty($terme_options['custom_js'])) {
        echo '<script type="text/javascript">'.$terme_options['custom_js'].'</script>';
      }
  }
/*-----------------------------------------------------------------------------------*/
# Terme Add Custom Body Class
/*-----------------------------------------------------------------------------------*/
add_filter('body_class', 'terme_custom_body_classes');
function terme_custom_body_classes($classes) {
    global $terme_options;
    $custom_classes = ( isset($terme_options['custom_body_class']) && !empty($terme_options['custom_body_class']) ) ? $terme_options['custom_body_class'] : false ;
    if ($custom_classes) {
        $custom_classes = explode(' ', $custom_classes);
        $classes = array_merge($classes,$custom_classes);
    }
    return $classes;
}
