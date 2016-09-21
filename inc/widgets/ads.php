<?php
// Creating the widget
class ads_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'ads_widget',
            __('Terme - Ads', 'terme'),
            array( 'description' => __( 'Show the ADS Section', 'terme' ), )
        );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    public function upload_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/assets/admin/js/media.js', array('jquery'), true );
    }
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $url = ( isset($instance['url']) && !empty($instance['url']) ) ? esc_url( $instance['url'] ) : '' ;
        $thumb = wp_get_attachment_image_src( $instance['image'], '' );
        echo '<section><div class="ads">';
        echo '<figure>
                <img src="'.$thumb['0'].'" alt="" />
                <figcaption>
                  <a href="'.$url.'"><i class="fa fa-plus" aria-hidden="true"></i> More</a>
                </figcaption>
              </figure>';
        echo'</div></section>';
    }
    public function form( $instance ) {
        $url = ( isset($instance['url']) && !empty($instance['url']) ) ? esc_url( $instance['url'] ) : '' ;
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'ADS', 'terme' );
        }
        $image = (isset($instance['image']) && !empty($instance['image'])) ? $instance['image'] : '' ;
    ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'terme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:','terme' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="ads_widget_img_id" type="hidden"  value="<?php echo $image; ?>" />
            <input class="button upload_image_button" type="button" value="<?php _e('Upload Image', 'terme') ?>" />
            <span class="terme_ads_widget_thumb">
                <?php
                    if ( isset($image) && !empty($image) ) {
                        $thumb = wp_get_attachment_image_src( $image, 'thumbnail' );
                        echo '<img src="'.$thumb['0'].'" />';
                    }
                ?>
            </span>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'terme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
        </p>
    <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : __( 'ADS', 'terme' );;
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
        $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function ads_widget() {
	register_widget( 'ads_widget' );
}
add_action( 'widgets_init', 'ads_widget' );
