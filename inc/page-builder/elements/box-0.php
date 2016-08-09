<div class="selection">
  <h4>Top News</h4>
  <a href="#" class="more">More</a>
  <ul>
      <?php
    $args = array(
        'showposts'         => 3,
        'cat' => 1,
    );
    $my_query = new WP_Query($args);
    while ($my_query->have_posts()):
    $my_query->the_post();
    $do_not_duplicate = $post->ID;?>

    <li>
      <div class="thumb">	<?php the_post_thumbnail( 'element_01_thumb_02' ); ?>
      </div>
      <h3><a href="<?php the_permalink(); ?>"><?php echo terme_shorten_text(get_the_title(), 40); ?></h3>
      <div class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></div>
    </li>
    <?php endwhile; ?>
  </ul>
</div><!-- selection -->
