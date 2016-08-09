<div class="MainSlider">
      <?php $arg = array(
              'showposts'         => 4,
              'post_type' => 'slider',
              // 'cat'    => 28,
              );
          $my_query = new WP_Query($arg);
          while ($my_query->have_posts()):
          $my_query->the_post();
          ?>
            <div class="item">
              <div class="slider_item">
                  <?php echo the_post_thumbnail( 'slider' ); ?>
               <div class="slider_desc">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                  <span><?php the_time('F j, Y g:i a'); ?></span>
                </div>

              </div>
            </div>
          <?php endwhile; ?>
</div>
