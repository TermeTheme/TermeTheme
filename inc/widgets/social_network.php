<?php
// Creating the widget
class social_network_widget extends WP_Widget {

function __construct() {
    parent::__construct(
                // Base ID of your widget
                'social_network_widget',
                // Widget name will appear in UI
                __('Terme Socials', 'terme'),
                // Widget description
                array( 'description' => __( 'empty', 'terme' ), )
            );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo
'<section class="social_widget">
  <ul>
    <li class="facebook">
      <a href="#" data-termehover="">
      <span class="icon"><i class="fa fa-facebook"></i></span>
      <span class="name">Facebook</span>
      <span class="number">53.321</span>
      </a>
    </li>
    <li class="twitter">
      <a href="#" data-termehover="">
      <span class="icon"><i class="fa fa-twitter"></i></span>
      <span class="name">twitter</span>
      <span class="number">22.321</span>
      </a>
    </li>
    <li class="rss">
      <a href="#" data-termehover="">
      <span class="icon"><i class="fa fa-rss"></i></span>
      <span class="name">RSS</span>
      <span class="number">22.321</span>
      </a>
    </li>
    <li class="google">
      <a href="#" data-termehover="">
      <span class="icon"><i class="fa fa-google"></i></span>
      <span class="name">Google+</span>
      <span class="number">22.321</span>
      </a>
    </li>
  </ul>
</section><!-- social-widget -->';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Terme Socials', 'terme');
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function text_ads_load_widget() {
	register_widget( 'social_network_widget' );
}
add_action( 'widgets_init', 'text_ads_load_widget' );
