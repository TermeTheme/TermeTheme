<?php
class terme_footer_last_posts_widget extends WP_Widget {
    function __construct() {
            parent::__construct(
            'terme_footer_last_posts_widget',
            __('Terme(Footer) - Last Posts', 'terme'),
            array( 'description' => __( 'Show the Last Posts', 'terme' ), )
        );
    }

    public function widget($args, $instance) {
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : __('Latest Posts', 'terme');
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3;
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
        echo '<ul class="items">';
        $arg = array(
            'posts_per_page' => $count,
            );
        $my_query = new WP_Query($arg);
        while ($my_query->have_posts()):
        $my_query->the_post();
            echo '<li>
                    <div class="thumb"><a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_id(), 'related_thumb'). '</a></div>
                    <h3><a href="'.get_permalink().'">'.terme_shorten_text(get_the_title(), 50).'</a></h3>
                    <div class="time"><i class="fa fa-clock-o"></i> ' .get_the_time('F j, Y'). '</div>
                  </li>';
        endwhile;
        echo'</ul>';
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : __('Latest Posts', 'terme') ;
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : '' ;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'terme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:', 'terme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
        return $instance;
    }
}

function terme_footer_last_posts_widget() {
	register_widget( 'terme_footer_last_posts_widget' );
}
add_action( 'widgets_init', 'terme_footer_last_posts_widget' );
