<?php
class term_top_article_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'term_top_article_widget',
            __('Terme Last Article Widget', 'terme'),
            array( 'description' => __( 'Show the Last Articles', 'terme' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3;
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
        echo '<ul class="top_article">';
        $arg = array(
            'posts_per_page'         => $count,
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

    public function form( $instance ) {
        $count = ( isset($instance['count']) && !empty($instance['count']) ) ? $instance['count'] : 3;
        $title = ( isset($instance['title']) && !empty($instance['title']) ) ? $instance['title'] : __( 'Lastest posts', 'terme' );
        $check = ( isset($instance['check']) && !empty($instance['check']) ) ? $instance['check'] : __( 'Lastest posts', 'terme' );
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
function term_top_article_widget() {
	register_widget( 'term_top_article_widget' );
}
add_action( 'widgets_init', 'term_top_article_widget' );
