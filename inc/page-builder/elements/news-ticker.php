<section class="latest_news">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="body">
          <div class="title">Latest News</div>
          <ul id="typed-strings">
            <?php
            $args = array(
                'showposts'         => 5,
                );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()):
            $my_query->the_post();
            $do_not_duplicate = $post->ID;?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          </ul>
          <span id="typed" style="white-space:pre;"></span>
        </div><!-- body -->
      </div><!-- col-xs-12 -->
    </div><!-- row -->
  </div><!-- container -->
</section><!-- latest_news -->
