<?php
// Creating the widget
class html_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'html_widget',

// Widget name will appear in UI
__('Terme Video Widget', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Show the Video', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

echo $args['before_widget'];
echo $args['before_title'] . $title . $args['after_title'];
echo '<ul class="video">';
$arg = array(
    'showposts'         => $instance['count'],
    'cat' => $instance['selectopt'],
    );
$my_query = new WP_Query($arg);
while ($my_query->have_posts()):
$my_query->the_post();


echo '<li>
      <figure>
      ' .get_the_post_thumbnail(get_the_id(), 'element_01_thumb_01'). '
          <figcaption>
            <span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
            <a href="'.get_permalink().'">
              <h2>'.get_the_title().'</h2>
                <div class="info">
                 <span><i class="fa fa-eye" aria-hidden="true"></i> 2.745</span>
                 <span><i class="fa fa-commenting" aria-hidden="true"></i> 1.586</span>
                 <span><i class="fa fa-heart" aria-hidden="true"></i> 45</span>
                </div>
            </a>
          </figcaption>
      </figure>
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
$title = __( 'متن همیار', 'wpb_widget_domain' );
}
// Widget admin form
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>"  />
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'selectopt' ); ?>"><?php _e( 'Select Category:' ); ?></label>
  <select class="widefat" name="<?php echo $this->get_field_name( 'selectopt' ); ?>" id="<?php echo $this->get_field_id( 'selectopt' ); ?>">
  <?php
      $categories = get_categories( array( 'orderby' => 'name',
      ));
      foreach ( $categories as $category ) {
          printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
              $category->term_id,
              selected($instance['selectopt'], $category->term_id, false),
              esc_html( $category->cat_name ),
              esc_html( $category->category_count )
          );
      }
  ?>

  </select>
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
$instance['selectopt'] = ( ! empty( $new_instance['selectopt'] ) ) ? strip_tags( $new_instance['selectopt'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function html_load_widget() {
	register_widget( 'html_widget' );
}
add_action( 'widgets_init', 'html_load_widget' );
