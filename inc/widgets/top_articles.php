<?php
// Creating the widget
class top_article_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'top_article_widget',

// Widget name will appear in UI
__('Terme Top Article Widget', 'terme'),

// Widget description
array( 'description' => __( 'Show the Last Articles', 'terme' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

echo $args['before_widget'];
echo $args['before_title'] . $title . $args['after_title'];
echo '<ul class="top_article">';
$arg = array(
    'showposts'         => $instance['count'],
    );
$my_query = new WP_Query($arg);
while ($my_query->have_posts()):
$my_query->the_post();


echo '<li>
        <a href="'.get_permalink().'">'.get_the_title().'</a>
        <div class="time"><i class="fa fa-clock-o"></i> ' .get_the_time('F j, Y g:i a'). '</div>
      </li>';
endwhile;
echo'</ul>';
echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
  $count   = (int)$instance['count'];

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Hot', 'terme' );
}
// Widget admin form
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'terme' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:', 'terme' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>"  />
</p>


<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function top_article_widget() {
	register_widget( 'top_article_widget' );
}
add_action( 'widgets_init', 'top_article_widget' );
