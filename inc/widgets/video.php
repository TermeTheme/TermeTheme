<?php
// Creating the widget
class video_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'video_widget',

// Widget name will appear in UI
__('Video', 'terme'),

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
'<section class="video">
    <h4>Video</h4>
    <a href="#" class="more">More</a>
    <ul>
      <li>
        <figure>
          <img src="/assets/img/video1.jpg" />
            <figcaption>
              <span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
              <a href="#">
                <h2>Title</h2>
                  <div class="info">
                  <span><i class="fa fa-eye" aria-hidden="true"></i> 2.745</span>
                   <span><i class="fa fa-commenting" aria-hidden="true"></i> 1.586</span>
                   <span><i class="fa fa-heart" aria-hidden="true"></i> 45</span>
                  </div>
              </a>
            </figcaption>
        </figure>
      </li>
      <li>
        <figure>
          <img src="/assets/img/video2.jpg" />
            <figcaption>
              <span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
              <a href="#">
                <h2>Title</h2>
                  <div class="info">
                  <span><i class="fa fa-eye" aria-hidden="true"></i> 2.745</span>
                   <span><i class="fa fa-commenting" aria-hidden="true"></i> 1.586</span>
                   <span><i class="fa fa-heart" aria-hidden="true"></i> 45</span>
                  </div>
              </a>
            </figcaption>
        </figure>
      </li>
    </ul>

  </section><!-- video -->';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Video', 'terme');
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
function video_widget() {
	register_widget( 'video_widget' );
}
add_action( 'widgets_init', 'video_widget' );
