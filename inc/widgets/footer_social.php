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
          <?php if (isset($terme_options['facebook']) & !empty($terme_options['facebook'])) : ?>
          <li><a href="<?php echo $terme_options['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['twitter']) & !empty($terme_options['twitter'])) : ?>
          <li><a href="<?php echo $terme_options['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['google_plus']) & !empty($terme_options['google_plus'])) : ?>
          <li><a href="<?php echo $terme_options['google_plus']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['vimeo']) & !empty($terme_options['vimeo'])) : ?>
          <li><a href="<?php echo $terme_options['vimeo']; ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['dribbble']) & !empty($terme_options['dribbble'])) : ?>
          <li><a href="<?php echo $terme_options['dribbble']; ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['instagram']) & !empty($terme_options['instagram'])) : ?>
          <li><a href="<?php echo $terme_options['instagram']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['rss']) & !empty($terme_options['rss'])) : ?>
          <li><a href="<?php echo $terme_options['rss']; ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['youtube']) & !empty($terme_options['youtube'])) : ?>
          <li><a href="<?php echo $terme_options['youtube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
          <?php endif; ?>
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
