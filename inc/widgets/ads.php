<?php
// Creating the widget
class ads_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'ads_widget',

// Widget name will appear in UI
__('Terme ADS Widget', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Show the ADS', 'wpb_widget_domain' ), )
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



echo '<section><ul class="ads">';
echo '<figure>
        <img src="'.$instance['image'].'" alt="" />
        <figcaption>
          <a href="'.$url.'"><i class="fa fa-plus" aria-hidden="true"></i> More</a>
        </figcaption>
      </figure>';
echo'</ul></section>';
}

// Widget Backend
public function form( $instance ) {
  $url   = (string)$instance['url'];

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'متن همیار', 'wpb_widget_domain' );
}
$image = '';
      if(isset($instance['image']))
      {
          $image = $instance['image'];
      }
// Widget admin form
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Count:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo $url; ?>"  />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
    <input class="upload_image_button" type="button" value="Upload Image" />
</p>
<?php echo $instance['image']; ?>

<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function ads_widget() {
	register_widget( 'ads_widget' );
}
add_action( 'widgets_init', 'ads_widget' );
