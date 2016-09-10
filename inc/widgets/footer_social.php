<?php
class terme_footer_social_widget extends WP_Widget {
    function __construct() {
            parent::__construct(
            'terme_footer_social_widget',
            __('Terme(Footer) - Social Networks', 'terme'),
            array( 'description' => __( 'Show the Social Networks', 'terme' ), )
        );
    }
    public function widget( $args, $instance ) {
      global $terme_options; ?>
        <ul class="social_network">
          <li><a href="<?php echo $terme_options['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['google_plus']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['vimeo']; ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['dribbble']; ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['instagram']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['rss']; ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $terme_options['youtube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
        </ul>
    <?php }


    public function form( $instance ) {
        echo '<p>'.__('There is no option for this widget!', 'terme').'</p>';
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        return $instance;
    }
}
function terme_footer_social_widget() {
	register_widget( 'terme_footer_social_widget' );
}
add_action( 'widgets_init', 'terme_footer_social_widget' );
