<?php
// Creating the widget
class footer_category extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'footer_category',

// Widget name will appear in UI
__('Terme Footer Category', 'terme'),

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
echo '<ul class="just_title">';
$arg = array(
    'showposts'         => $instance['count'],
      'cat' => $instance['select_cat_01'],
    );
$my_query = new WP_Query($arg);
while ($my_query->have_posts()):
$my_query->the_post();

echo '<li>
        <h3><a href="'.get_permalink().'">'.terme_shorten_text(get_the_title(), 50).'</a></h3>
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
<p>
  <label for="<?php echo $this->get_field_id( 'select_cat_01' ); ?>"><?php _e( 'Select Category:', 'terme'  ); ?></label>
  <select class="widefat" name="<?php echo $this->get_field_name( 'select_cat_01' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_01' ); ?>">
  <?php
      $categories = get_categories( array( 'orderby' => 'name',
      ));
      foreach ( $categories as $category ) {
          printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
              $category->term_id,
              selected($instance['select_cat_01'], $category->term_id, false),
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
$instance['select_cat_01'] = ( ! empty( $new_instance['select_cat_01'] ) ) ? strip_tags( $new_instance['select_cat_01'] ) : '';

return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function footer_category() {
	register_widget( 'footer_category' );
}
add_action( 'widgets_init', 'footer_category' );
