<?php
// Creating the widget
class tab_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'tab_widget',

// Widget name will appear in UI
__('Terme Tab Widget', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Show the News', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

echo $args['before_widget'];
echo $args['before_title'] . $title . $args['after_title'];
?>
<div class="tabbable-panel">
<div class="tabbable-line">
<ul class="nav nav-tabs nav-justified newsTab ">
<li class="active">
<a href="#tab_default_1" data-toggle="tab">
<?php echo $instance[ 'title_01' ] ?> </a>
</li>
<li>
<a href="#tab_default_2" data-toggle="tab">
<?php echo $instance[ 'title_02' ] ?> </a>
</li>
<li>
<a href="#tab_default_3" data-toggle="tab">
<?php echo $instance[ 'title_03' ] ?> </a>
</li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="tab_default_1">
    <ul>
      <?php $arg = array(
          'showposts'         => $instance['count_01'],
          'cat' => $instance['select_cat_01'],
          );
      $my_query = new WP_Query($arg);
      while ($my_query->have_posts()):
      $my_query->the_post(); ?>
      <li>
        <div class="thumb">	<?php the_post_thumbnail( 'related_thumb' ); ?></div>
        <h3><a href="<?php the_permalink() ?>"><?php echo terme_shorten_text(get_the_title(), 50); ?></a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>

<div class="tab-pane" id="tab_default_2">
  <ul>
    <?php $arg = array(
        'showposts'         => $instance['count_02'],
        'cat' => $instance['select_cat_02'],
        );
    $my_query = new WP_Query($arg);
    while ($my_query->have_posts()):
    $my_query->the_post(); ?>
    <li>
      <div class="thumb">	<?php the_post_thumbnail( 'related_thumb' ); ?></div>
      <h3><a href="<?php the_permalink() ?>"><?php echo terme_shorten_text(get_the_title(), 50); ?></a></h3>
      <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
    </li>
  <?php endwhile; ?>
</ul>
</div>
<div class="tab-pane" id="tab_default_3">
  <ul>
    <?php $arg = array(
        'showposts'         => $instance['count_03'],
        'cat' => $instance['select_cat_03'],
        );
    $my_query = new WP_Query($arg);
    while ($my_query->have_posts()):
    $my_query->the_post(); ?>
    <li>
      <div class="thumb">	<?php the_post_thumbnail( 'related_thumb' ); ?></div>
      <h3><a href="<?php the_permalink() ?>"><?php echo terme_shorten_text(get_the_title(), 50); ?></a></h3>
      <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
    </li>
  <?php endwhile; ?>
</ul>
</div>
</div></div>
</div>
<?php
echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
  $count_01   = (int)$instance['count_01'];
  $count_02   = (int)$instance['count_02'];
  $count_03   = (int)$instance['count_03'];

$title_01 = $instance[ 'title_01' ];
$title_02 = $instance[ 'title_02' ];
$title_03 = $instance[ 'title_03' ];
// Widget admin form
?>


<p>
<label for="<?php echo $this->get_field_id( 'title_01' ); ?>"><?php _e( 'Title 1:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title_01' ); ?>" name="<?php echo $this->get_field_name( 'title_01' ); ?>" type="text" value="<?php echo esc_attr( $title_01 ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'count_01' ); ?>"><?php _e( 'Count:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'count_01' ); ?>" name="<?php echo $this->get_field_name( 'count_01' ); ?>" type="text" value="<?php echo $count_01; ?>"  />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'select_cat_01' ); ?>"><?php _e( 'Select Category:' ); ?></label>
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
<hr />

<p>
<label for="<?php echo $this->get_field_id( 'title_02' ); ?>"><?php _e( 'Title 2:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title_02' ); ?>" name="<?php echo $this->get_field_name( 'title_02' ); ?>" type="text" value="<?php echo esc_attr( $title_02 ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'count_02' ); ?>"><?php _e( 'Count:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'count_02' ); ?>" name="<?php echo $this->get_field_name( 'count_02' ); ?>" type="text" value="<?php echo $count_02; ?>"  />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'select_cat_02' ); ?>"><?php _e( 'Select Category:' ); ?></label>
  <select class="widefat" name="<?php echo $this->get_field_name( 'select_cat_02' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_02' ); ?>">
  <?php
      $categories = get_categories( array( 'orderby' => 'name',
      ));
      foreach ( $categories as $category ) {
          printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
              $category->term_id,
              selected($instance['select_cat_02'], $category->term_id, false),
              esc_html( $category->cat_name ),
              esc_html( $category->category_count )
          );
      }
  ?>
  </select>
</p>
<hr />
<p>
<label for="<?php echo $this->get_field_id( 'title_03' ); ?>"><?php _e( 'Title 3:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title_03' ); ?>" name="<?php echo $this->get_field_name( 'title_03' ); ?>" type="text" value="<?php echo esc_attr( $title_03 ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'count_03' ); ?>"><?php _e( 'Count:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'count_03' ); ?>" name="<?php echo $this->get_field_name( 'count_03' ); ?>" type="text" value="<?php echo $count_03; ?>"  />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'select_cat_03' ); ?>"><?php _e( 'Select Category:' ); ?></label>
  <select class="widefat" name="<?php echo $this->get_field_name( 'select_cat_03' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_03' ); ?>">
  <?php
      $categories = get_categories( array( 'orderby' => 'name',
      ));
      foreach ( $categories as $category ) {
          printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
              $category->term_id,
              selected($instance['select_cat_03'], $category->term_id, false),
              esc_html( $category->cat_name ),
              esc_html( $category->category_count )
          );
      }
  ?>
  </select>
</p>
<hr />


<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['title_01'] = ( ! empty( $new_instance['title_01'] ) ) ? strip_tags( $new_instance['title_01'] ) : '';
$instance['count_01'] = ( ! empty( $new_instance['count_01'] ) ) ? strip_tags( $new_instance['count_01'] ) : '';
$instance['select_cat_01'] = ( ! empty( $new_instance['select_cat_01'] ) ) ? strip_tags( $new_instance['select_cat_01'] ) : '';
$instance['title_02'] = ( ! empty( $new_instance['title_02'] ) ) ? strip_tags( $new_instance['title_02'] ) : '';
$instance['count_02'] = ( ! empty( $new_instance['count_02'] ) ) ? strip_tags( $new_instance['count_02'] ) : '';
$instance['select_cat_02'] = ( ! empty( $new_instance['select_cat_02'] ) ) ? strip_tags( $new_instance['select_cat_02'] ) : '';
$instance['title_03'] = ( ! empty( $new_instance['title_03'] ) ) ? strip_tags( $new_instance['title_03'] ) : '';
$instance['count_03'] = ( ! empty( $new_instance['count_03'] ) ) ? strip_tags( $new_instance['count_03'] ) : '';
$instance['select_cat_03'] = ( ! empty( $new_instance['select_cat_03'] ) ) ? strip_tags( $new_instance['select_cat_03'] ) : '';

return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function terme_tab_widget() {
	register_widget( 'tab_widget' );
}
add_action( 'widgets_init', 'terme_tab_widget' );
