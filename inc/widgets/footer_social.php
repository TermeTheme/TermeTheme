<?php
// Creating the widget
class footer_social extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'footer_social',

// Widget name will appear in UI
__('Terme footer Social', 'terme'),

// Widget description
array( 'description' => __( 'Show the ADS Section', 'terme' ), )
);
add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
}

/**
 * Upload the Javascripts for the media uploader
 */
public function upload_scripts()
{
    wp_enqueue_media();
    wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/assets/admin/js/media.js', array('jquery'), true );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$url   = (string)$instance['url'];
$desc = $instance['desc'];



echo '<figure>
        <img src="'.$instance['image'].'" alt="" width="150" height="100"/>
        <p class="about_us"> '.$instance['desc'].'</p>
      </figure>';

}

// Widget Backend
public function form( $instance ) {
  $url   = (string)$instance['url'];
  $desc = $instance['desc'];


if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'ADS', 'terme' );
}
$image = '';
      if(isset($instance['image']))
      {
          $image = $instance['image'];
      }
// Widget admin form
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'terme' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:','terme' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
    <input class="upload_image_button" type="button" value="Upload Image" />
</p>
<p>
 <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Title:', 'terme' ); ?></label>
  <textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" rows="8" cols="40"><?php echo esc_attr( $desc ); ?></textarea>
</p>

<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function footer_social() {
	register_widget( 'footer_social' );
}
add_action( 'widgets_init', 'footer_social' );
