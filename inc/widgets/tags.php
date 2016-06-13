<?php
// Creating the widget
class tags_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'tags_widget',

// Widget name will appear in UI
__('Tags', 'terme'),

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
'  <section class="tags">
    <h4>Tags</h4>
    <div class="tagcloud">
      <a href="#" data-termehover="">Sports</a>
      <a href="#">best offer</a>
      <a href="#">terme</a>
      <a href="#">game</a>
      <a href="#">Sports</a>
      <a href="#">Logic</a>
      <a href="#">politics</a>
      <a href="#">Logic</a>
      <a href="#">terme</a>
      <a href="#">goverments</a>
      <a href="#">hamyarwp</a>
      <a href="#">imojtaba</a>
      <a href="#">inima</a>
      <a href="#">iali</a>
    </div>


  </section>';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Tags', 'terme');
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
function tags_widget() {
	register_widget( 'tags_widget' );
}
add_action( 'widgets_init', 'tags_widget' );
