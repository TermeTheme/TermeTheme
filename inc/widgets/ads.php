<?php
// Creating the widget
class ads_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'ads_widget',

// Widget name will appear in UI
__('Terme ADS', 'terme'),

// Widget description
array( 'description' => __( 'Terme ads widget', 'terme' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo
'  <section class="ads">
    <figure>
      <img src="/assets/img/ads1.jpg" alt="" />
      <figcaption>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> More</a>
      </figcaption>
    </figure>
    <figure>
      <img src="/assets/img/ads2.jpg" alt="" />
      <figcaption>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> More</a>
      </figcaption>
    </figure>
  </section><!-- ads -->';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Terme ADS', 'terme');
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titlezzzz:', 'termess' ); ?></label>
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
function ads_widget() {
	register_widget( 'ads_widget' );
}
add_action( 'widgets_init', 'ads_widget' );
