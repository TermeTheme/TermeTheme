<?php
/*-----------------------------------------------------------------------------------*/
# Terme Add Custom CSS STyle
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_head', 'custom_css_style' );
  function custom_css_style (){
      global $terme_options;
    	echo '<style>';
      if (isset($terme_options['large_desktop']) && !empty($terme_options['large_desktop'])) {
        echo '@media (min-width: 1200px) {' . $terme_options['large_desktop'] . '}';
      }elseif (isset($terme_options['desktop']) && !empty($terme_options['desktop'])) {
        echo '@media (min-width: 992px) {' . $terme_options['desktop'] . '}';
      }elseif (isset($terme_options['tablet']) && !empty($terme_options['tablet'])) {
        echo '@media (min-width: 768px) {' . $terme_options['tablet'] . '}';
      }elseif (isset($terme_options['mobile']) && !empty($terme_options['mobile'])) {
        echo '@media (max-width: 768px) {' . $terme_options['mobile'] . '}';
      }
      echo '</style>';

  }
 ?>
