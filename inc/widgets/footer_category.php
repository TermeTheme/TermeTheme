<?php
class terme_footer_category_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'terme_footer_category_widget',
            __('Terme Footer Category', 'terme'),
            array( 'description' => __( 'Show the Last Articles', 'terme' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : __('Latest Posts', 'terme');
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3 ;
        $select_cat_01 = ( isset($instance['select_cat_01']) && !empty($instance['select_cat_01']) ) ? $instance['select_cat_01'] : 3 ;
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
        echo '<ul class="just_title">';
        $arg = array(
            'posts_per_page'         => $count,
            'cat' => $select_cat_01,
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
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : __('Latest Posts', 'terme');
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3 ;
        $select_cat_01 = ( isset($instance['select_cat_01']) && !empty($instance['select_cat_01']) ) ? $instance['select_cat_01'] : 3 ;
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
            <label for="<?php echo $this->get_field_id( 'select_cat_01' ); ?>"><?php _e( 'Select Category:', 'terme'  ); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'select_cat_01' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_01' ); ?>">
          <?php
              $categories = get_categories( array( 'orderby' => 'name',
              ));
              foreach ( $categories as $category ) {
                  printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
                      $category->term_id,
                      selected($select_cat_01, $category->term_id, false),
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
} 
function terme_footer_category_widget() {
	register_widget( 'terme_footer_category_widget' );
}
add_action( 'widgets_init', 'terme_footer_category_widget' );
