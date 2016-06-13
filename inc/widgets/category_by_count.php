<?php
// Creating the widget
class category_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'category_widget',

// Widget name will appear in UI
__('Terme Category Posts', 'terme'),

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
'<section class="category">
    <h4>Category</h4>
    <ul>
      <li>
        <a href="">Politic
          <span>502</span>
        </a>
      </li>
      <li>
      <a href="">Sport
<span>1.258</span>
      </a>
      </li>
      <li>
      <a href="">Technology
<span>125</span>
      </a>
      </li>
    </ul>
  </section><!-- category -->';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Terme Category Posts', 'terme');
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
function category_widget() {
	register_widget( 'category_widget' );
}
add_action( 'widgets_init', 'category_widget' );
