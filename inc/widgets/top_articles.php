<?php
// Creating the widget
class top_articles_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'top_articles_widget',

// Widget name will appear in UI
__('Terme Hot news', 'terme'),

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
'   <section class="last_articles">
    <h4>Top Articles</h4>
    <a href="#" class="more">More</a>
    <ul>
      <li>
      <a href="">Google Ranked As The Worlds Most Valuable Brands</a>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016 - 10:26</div>
      </li>
      <li>
      <a href="">Google Ranked As The Worlds Most Valuable Brands</a>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016 - 10:26</div>
      </li>
      <li>
        <a href="">Google Ranked As The Worlds Most Valuable Brands</a>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016 - 10:26</div>
      </li>
      <li>
      <a href="">Google Ranked As The Worlds Most Valuable Brands</a>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016 - 10:26</div>
      </li>
                    </ul>
  </section><!-- last_articles -->';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Terme Hot news', 'terme');
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
function top_articles_widget() {
	register_widget( 'top_articles_widget' );
}
add_action( 'widgets_init', 'top_articles_widget' );
