<?php
// Creating the widget
class terme_video_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'html_widget',
            __('Terme - Video', 'terme'),
            array( 'description' => __( 'Recommended for Posts Have Video', 'terme' ), )
        );
    }
    public function widget( $args, $instance ) {
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : '' ;
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3 ;
        $selectopt = ( isset($instance['selectopt']) && !empty($instance['selectopt']) ) ? $instance['selectopt'] : '' ;
        echo '<section class="terme_widget_body">';
        echo $args['before_title'] . $title . $args['after_title'];
        echo '<ul class="video">';
        $arg = array(
            'showposts'         => $count,
            'cat' => $selectopt,
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
                      <h2>'. terme_shorten_text(get_the_title(), 40) .'</h2>
                        <div class="info">
                         <span><i class="fa fa-eye" aria-hidden="true"></i>' .terme_get_post_views(get_the_ID()).'</span>
                         <span><i class="fa fa-commenting" aria-hidden="true"></i>' .get_comments_number( 0, 1, '%' ).'</span>
                        </div>
                    </a>
                  </figcaption>
              </figure>
              </li>';
        endwhile;
        echo'</ul>';
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3 ;
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : '' ;
        $selectopt = ( isset($instance['selectopt']) && !empty($instance['selectopt']) ) ? $instance['selectopt'] : '' ;
    ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'terme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:', 'terme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'selectopt' ); ?>"><?php _e( 'Select Category:', 'terme' ); ?></label>
            <select class="terme_select2" style="width: 100%" name="<?php echo $this->get_field_name( 'selectopt' ); ?>" id="<?php echo $this->get_field_id( 'selectopt' ); ?>">
          <?php
              $categories = get_categories( array( 'orderby' => 'name',
              ));
              foreach ( $categories as $category ) {
                  printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
                      $category->term_id,
                      selected($selectopt, $category->term_id, false),
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
	register_widget( 'terme_video_widget' );
}
add_action( 'widgets_init', 'html_load_widget' );
