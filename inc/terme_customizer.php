<?php
/*-----------------------------------------------------------------------------------*/
# Terme Add Custom CSS STyle
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_head', 'terme_head_style' );
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
      } else {
        echo '<link rel="shortcut icon" href="' .$terme_options['favicon_16']['url']. '" />';
      }
    	echo '<style>'; ?>
      <?php
      print_r($terme_options);
      if (isset($terme_options['custom_css']) && !empty($terme_options['custom_css'])) { ?>
        @font-face {
          font-family: 'MyWebFont';
          src: url('../custom-fonts/WebFont.eot'); /* IE9 Compat Modes */
          src: url('../custom-fonts/WebFont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
               url('../custom-fonts/WebFont.woff2') format('woff2'), /* Super Modern Browsers */
               url('../custom-fonts/WebFont.woff') format('woff'), /* Pretty Modern Browsers */
               url('../custom-fonts/WebFont.ttf')  format('truetype'), /* Safari, Android, iOS */
        }
      <?php } ?>
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
 ?>
