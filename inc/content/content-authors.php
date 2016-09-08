<div class="col-md-8 col-sm-12">
  <div class="author_content">
    <ul>
      <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <li>
        <article>
          <figure class="thumbnail">
            <?php the_post_thumbnail( 'category_thumb' ); ?>
          </figure>
          <section>
            <h2><a href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h2>
            <div class="post_time">
                <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp <?php echo get_the_date(); ?>
            </div>
            <div class="excerpt">
                <?php the_excerpt(); ?>
            </div>
          </section>
        </article>
      </li>
      <?php
          endwhile;
          the_posts_pagination( array(
              'prev_text'          => __( 'Previous page', 'terme' ),
              'next_text'          => __( 'Next page', 'terme' ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'terme' ) . ' </span>',
          ) );
          endif;
      ?>
    </ul>
        </div><!-- category_content -->
</div><!--col-md-8-->
