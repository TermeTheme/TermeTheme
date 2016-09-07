<?php
class terme_tab_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'tab_widget',
            __('Terme - Tab', 'terme'),
            array( 'description' => __( 'Show the Last Posts by Category in Tab', 'terme' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $count_01 = ( isset($instance['count_01']) && !empty($instance['count_01']) ) ? $instance['count_01'] : 3 ;
        $count_02 = ( isset($instance['count_02']) && !empty($instance['count_02']) ) ? $instance['count_02'] : 3 ;
        $count_03 = ( isset($instance['count_03']) && !empty($instance['count_03']) ) ? $instance['count_03'] : 3 ;
        $title_01 = ( isset($instance['title_01']) && !empty($instance['title_01']) ) ? $instance['title_01'] : '' ;
        $title_02 = ( isset($instance['title_02']) && !empty($instance['title_02']) ) ? $instance['title_02'] : '' ;
        $title_03 = ( isset($instance['title_03']) && !empty($instance['title_03']) ) ? $instance['title_03'] : '' ;
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
        ?>
        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs nav-justified newsTab ">
                    <li class="active"><a href="#tab_default_1" data-toggle="tab"><?php echo $title_01 ?></a></li>
                    <li><a href="#tab_default_2" data-toggle="tab"><?php echo $title_02 ?></a></li>
                    <li><a href="#tab_default_3" data-toggle="tab"><?php echo $title_03 ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_1">
                        <ul>
                            <?php $arg = array(
                              'posts_per_page'         => $count_01,
                              'cat' => $instance['select_cat_01'],
                              'meta_key' => 'terme_post_views_count',
                              'orderby' => 'meta_value_num',
                              'order' => 'DESC',
                              );
                          $my_query = new WP_Query($arg);
                          while ($my_query->have_posts()):
                          $my_query->the_post(); ?>
                              <li>
                                <div class="thumb">	<?php the_post_thumbnail( 'related_thumb' ); ?></div>
                                <h3><a href="<?php the_permalink() ?>"><?php echo terme_shorten_text(get_the_title(), 40); ?></a></h3>
                                <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                              </li>
                        <?php endwhile; ?>
                        </ul>
                    </div>

                    <div class="tab-pane" id="tab_default_2">
                        <ul>
                        <?php $arg = array(
                            'posts_per_page'         => $count_02,
                            'cat' => $instance['select_cat_02'],
                            );
                        $my_query = new WP_Query($arg);
                        while ($my_query->have_posts()):
                        $my_query->the_post(); ?>
                            <li>
                              <div class="thumb">	<?php the_post_thumbnail( 'related_thumb' ); ?></div>
                              <h3><a href="<?php the_permalink() ?>"><?php echo terme_shorten_text(get_the_title(), 40); ?></a></h3>
                              <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                            </li>
                      <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="tab-pane" id="tab_default_3">
                        <ul>
                            <?php $arg = array(
                                'posts_per_page'         => $count_03,
                                'cat' => $instance['select_cat_03'],
                                );
                            $my_query = new WP_Query($arg);
                            while ($my_query->have_posts()):
                            $my_query->the_post(); ?>
                                <li>
                                  <div class="thumb">	<?php the_post_thumbnail( 'related_thumb' ); ?></div>
                                  <h3><a href="<?php the_permalink() ?>"><?php echo terme_shorten_text(get_the_title(), 40); ?></a></h3>
                                  <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                                </li>
                          <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        $count_01 = ( isset($instance['count_01']) && !empty($instance['count_01']) ) ? $instance['count_01'] : 3 ;
        $count_02 = ( isset($instance['count_02']) && !empty($instance['count_02']) ) ? $instance['count_02'] : 3 ;
        $count_03 = ( isset($instance['count_03']) && !empty($instance['count_03']) ) ? $instance['count_03'] : 3 ;
        $title_01 = ( isset($instance['title_01']) && !empty($instance['title_01']) ) ? $instance['title_01'] : '' ;
        $title_02 = ( isset($instance['title_02']) && !empty($instance['title_02']) ) ? $instance['title_02'] : '' ;
        $title_03 = ( isset($instance['title_03']) && !empty($instance['title_03']) ) ? $instance['title_03'] : '' ;
    ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title_01' ); ?>"><?php _e( 'Title 1:', 'terme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title_01' ); ?>" name="<?php echo $this->get_field_name( 'title_01' ); ?>" type="text" value="<?php echo esc_attr( $title_01 ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count_01' ); ?>"><?php _e( 'Count:', 'terme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count_01' ); ?>" name="<?php echo $this->get_field_name( 'count_01' ); ?>" type="text" value="<?php echo $count_01; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'select_cat_01' ); ?>"><?php _e( 'Select Category:', 'terme'  ); ?></label>
            <select class="terme_select2" style="width:100%" name="<?php echo $this->get_field_name( 'select_cat_01' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_01' ); ?>">
          <?php
              $categories = get_categories( array( 'orderby' => 'name',
              ));
              foreach ( $categories as $category ) {
                  printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
                      $category->term_id,
                      selected($instance['select_cat_01'], $category->term_id, false),
                      esc_html( $category->cat_name ),
                      esc_html( $category->category_count )
                  );
              }
          ?>
          </select>
        </p>
        <hr />
        <p>
            <label for="<?php echo $this->get_field_id( 'title_02' ); ?>"><?php _e( 'Title 2:', 'terme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title_02' ); ?>" name="<?php echo $this->get_field_name( 'title_02' ); ?>" type="text" value="<?php echo esc_attr( $title_02 ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count_02' ); ?>"><?php _e( 'Count:', 'terme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count_02' ); ?>" name="<?php echo $this->get_field_name( 'count_02' ); ?>" type="text" value="<?php echo $count_02; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'select_cat_02' ); ?>"><?php _e( 'Select Category:', 'terme'  ); ?></label>
            <select class="terme_select2" style="width:100%" name="<?php echo $this->get_field_name( 'select_cat_02' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_02' ); ?>">
          <?php
              $categories = get_categories( array( 'orderby' => 'name',
              ));
              foreach ( $categories as $category ) {
                  printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
                      $category->term_id,
                      selected($instance['select_cat_02'], $category->term_id, false),
                      esc_html( $category->cat_name ),
                      esc_html( $category->category_count )
                  );
              }
          ?>
          </select>
        </p>
        <hr />
        <p>
            <label for="<?php echo $this->get_field_id( 'title_03' ); ?>"><?php _e( 'Title 3:', 'terme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title_03' ); ?>" name="<?php echo $this->get_field_name( 'title_03' ); ?>" type="text" value="<?php echo esc_attr( $title_03 ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count_03' ); ?>"><?php _e( 'Count:', 'terme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count_03' ); ?>" name="<?php echo $this->get_field_name( 'count_03' ); ?>" type="text" value="<?php echo $count_03; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'select_cat_03' ); ?>"><?php _e( 'Select Category:', 'terme'  ); ?></label>
            <select class="terme_select2" style="width:100%" name="<?php echo $this->get_field_name( 'select_cat_03' ); ?>" id="<?php echo $this->get_field_id( 'select_cat_03' ); ?>">
          <?php
              $categories = get_categories( array( 'orderby' => 'name',
              ));
              foreach ( $categories as $category ) {
                  printf( '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
                      $category->term_id,
                      selected($instance['select_cat_03'], $category->term_id, false),
                      esc_html( $category->cat_name ),
                      esc_html( $category->category_count )
                  );
              }
          ?>
          </select>
        </p>
        <hr />
    <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['title_01'] = ( ! empty( $new_instance['title_01'] ) ) ? strip_tags( $new_instance['title_01'] ) : '';
        $instance['count_01'] = ( ! empty( $new_instance['count_01'] ) ) ? strip_tags( $new_instance['count_01'] ) : 3;
        $instance['select_cat_01'] = ( ! empty( $new_instance['select_cat_01'] ) ) ? strip_tags( $new_instance['select_cat_01'] ) : '';
        $instance['title_02'] = ( ! empty( $new_instance['title_02'] ) ) ? strip_tags( $new_instance['title_02'] ) : '';
        $instance['count_02'] = ( ! empty( $new_instance['count_02'] ) ) ? strip_tags( $new_instance['count_02'] ) : 3;
        $instance['select_cat_02'] = ( ! empty( $new_instance['select_cat_02'] ) ) ? strip_tags( $new_instance['select_cat_02'] ) : '';
        $instance['title_03'] = ( ! empty( $new_instance['title_03'] ) ) ? strip_tags( $new_instance['title_03'] ) : '';
        $instance['count_03'] = ( ! empty( $new_instance['count_03'] ) ) ? strip_tags( $new_instance['count_03'] ) : 3;
        $instance['select_cat_03'] = ( ! empty( $new_instance['select_cat_03'] ) ) ? strip_tags( $new_instance['select_cat_03'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function terme_tab_widget() {
	register_widget( 'terme_tab_widget' );
}
add_action( 'widgets_init', 'terme_tab_widget' );
