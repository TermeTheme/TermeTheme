<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <?php $arg = array(
          'showposts'         => 1,
          'post_type' => 'slider',
          // 'cat'    => 28,
          );
      $my_query = new WP_Query($arg);
      while ($my_query->have_posts()):
      $my_query->the_post();
      ?>
        <div class="item active">
          <div class="slider_item">
              <?php echo the_post_thumbnail( 'slider' ); ?>
           <div class="slider_desc">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
              <span><?php the_time('F j, Y g:i a'); ?></span>
            </div>

          </div>
        </div>
      <?php endwhile; ?>
      <?php $arg = array(
          'showposts'         => 0,
          'post_type' => 'slider',
          'offset' => 1,
          );
      $my_query = new WP_Query($arg);
      while ($my_query->have_posts()):
      $my_query->the_post();
       ?>
      <div class="item">
        <div class="slider_item">
          <?php echo the_post_thumbnail( 'slider' ); ?>
          <div class="slider_desc">
            <h2><?php the_title() ?></h2>
            <span><?php the_time('F j, Y g:i a'); ?></span>
          </div>

        </div>
      </div>
    <?php endwhile; ?>

    </div><!-- carousel-inner -->

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
    </a>
</div><!-- carousel slide -->
