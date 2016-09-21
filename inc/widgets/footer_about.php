<?php
class terme_footer_about_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'terme_footer_about_widget',
            __('Terme(Footer) - About Us', 'terme'),
            array( 'description' => __( 'Show a Logo with short description', 'terme' ), )
        );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    public function upload_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/assets/admin/js/media.js', array('jquery'), true );
    }

    public function widget( $args, $instance ) {
        $image = ( isset($instance['image']) && !empty($instance['image']) ) ? $instance['image'] : '';
        $desc = ( isset($instance['desc']) && !empty($instance['desc']) ) ? $instance['desc'] : '';
        $thumb = wp_get_attachment_image_src( $image, 'element_01_thumb_02' );
        echo '<img src="'.$thumb['0'].'"/>';
        echo '<p class="about_us">'.$desc.'</p>';
    }

    // Widget Backend
    public function form( $instance ) {
        $image = ( isset($instance['image']) && !empty($instance['image']) ) ? $instance['image'] : '';
        $desc = ( isset($instance['desc']) && !empty($instance['desc']) ) ? $instance['desc'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:','terme' ); ?></label>
            <input  class="ads_widget_img_id" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="hidden" size="36" value="<?php echo $image ?>" />
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
          <?php _e('Recommended Size: 150*100 px','terme') ?>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Description:', 'terme' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" rows="8" cols="40"><?php echo esc_attr( $desc ); ?></textarea>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
        $instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

function terme_footer_about_widget() {
	register_widget( 'terme_footer_about_widget' );
}
add_action( 'widgets_init', 'terme_footer_about_widget' );
