<?php
// Creating the widget
class news_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'news_widget',

// Widget name will appear in UI
__('Terme News', 'terme'),

// Widget description
array( 'description' => __( 'empty', 'terme' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo
'  <section class="news">
    <div class="tabbable-panel">
<div class="tabbable-line">
<ul class="nav nav-tabs nav-justified newsTab ">
  <li class="active">
    <a href="#tab_default_1" data-toggle="tab">
    Top </a>
  </li>
  <li>
    <a href="#tab_default_2" data-toggle="tab">
    New </a>
  </li>
  <li>
    <a href="#tab_default_3" data-toggle="tab">
    Like </a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="tab_default_1">
    <ul>
      <li>
        <div class="thumb"><img src="/assets/img/top_new_01.jpg" height="75" width="100" alt=""></div>
        <h3><a href="">Google Ranked As The Worlds Most Valuable Brands</a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
      <li>
        <div class="thumb"><img src="/assets/img/top_new_02.jpg" height="75" width="100" alt=""></div>
        <h3><a href="">2016 Mac Pro release date rumours & specs</a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
      <li>
        <div class="thumb"><img src="/assets/img/top_new_03.jpg" height="75" width="100" alt=""></div>
        <h3><a href="">The world is changed! i feel in the water, i feel in ...</a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
    </ul>
  </div>
  <div class="tab-pane" id="tab_default_2">
  ...
  </div>
  <div class="tab-pane" id="tab_default_3">
    <ul>
      <li>
        <div class="thumb"><img src="/assets/img/top_new_01.jpg" height="75" width="100" alt=""></div>
        <h3><a href="">Google Ranked As The Worlds Most Valuable Brands</a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
      <li>
        <div class="thumb"><img src="/assets/img/top_new_02.jpg" height="75" width="100" alt=""></div>
        <h3><a href="">2016 Mac Pro release date rumours & specs</a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
      <li>
        <div class="thumb"><img src="/assets/img/top_new_03.jpg" height="75" width="100" alt=""></div>
        <h3><a href="">The world is changed! i feel in the water i feel in ...</a></h3>
        <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
      </li>
    </ul>
  </div>
</div>
</div>
</div>

  </section><!-- news -->';
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Terme News', 'terme');
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function news_widget() {
	register_widget( 'news_widget' );
}
add_action( 'widgets_init', 'news_widget' );
