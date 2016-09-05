<div class="col-md-8 col-sm-12 col-xs-12">
  <div class="article_content">
      <?php if(have_posts()) : while(have_posts()) : the_post();
      global $terme_options;
      // $terme_postmeta = get_post_meta( $post->ID, 'terme_postmeta', true );
                    $defaults = array(
                        'date' => 1,
                        'category' => 1,
                        'viewcount' => 1,
                        'commentcount' => 1,
                        'dateformat' => 1,
                        'relatedpost-by' => 1,
                        'relatedpost-display' => 1,
                        'relatedpost-count' => 1,
                        'comment-display' => 1,
                        'author-display' => 1,
                        'share-display' => 1,
                        'breadcrumb' => 1,
                    );
                    $terme_postmeta = (get_post_meta( get_the_id(), 'terme_postmeta', true )) ? get_post_meta( get_the_id(), 'terme_postmeta', true ) : $defaults ;
      ?>
    <div class="article_info ">
      <?php if ((isset($terme_postmeta['breadcrumb']) && !empty($terme_postmeta['breadcrumb']) || $terme_options['post_breadcrumb'] ) ) : ?>
          <?php terme_breadcrumb() ?>
      <?php endif; ?>
      <h1 class="article_title"><?php the_title(''); ?></h1>
      <?php if ( $terme_options['post_meta'] == 1 ): ?>
        <div class="article_meta">
          <?php if ((isset($terme_postmeta['date']) && !empty($terme_postmeta['date']) || $terme_options['post_date'] ) ) : ?>
          <span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp <?php echo get_the_date(); ?> </span>
          <?php endif; ?>
          <?php if ((isset($terme_postmeta['category']) && !empty($terme_postmeta['category']) || $terme_options['post_category'] ) ) : ?>
          <span class="category"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp <a href="#"><?php the_category($post->ID); ?></a> </span>
          <?php endif; ?>
          <?php if ((isset($terme_postmeta['viewcount']) && !empty($terme_postmeta['viewcount']) || $terme_options['view_count'] ) ) : ?>
          <span class="view"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp <?php echo terme_get_post_views(get_the_ID()); ?></span>
          <?php endif; ?>
          <?php if ((isset($terme_postmeta['commentcount']) && !empty($terme_postmeta['commentcount']) || $terme_options['comment_count'] ) ) : ?>
          <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp  <?php comments_number( 0, 1, '%' ); ?> </span>
          <?php endif; ?>
        </div><!-- article_meta -->
    <?php	endif;?>
    </div><!-- article_info -->
    <div class="terme_post">
      <div class="thumb">
        <?php the_post_thumbnail( '' ); ?>
      </div>
        <?php the_content(''); ?>

      <?php if ((isset($terme_postmeta['post_tags']) && !empty($terme_postmeta['post_tags']) || $terme_options['post_tags'] ) ) : ?>
        <div class="article_tags">
          <h3><?php _e('Tags:', 'terme') ?></h3>
            <?php
                $posttags = get_the_tags();
                foreach ( $posttags as $posttag ) {
                  $tag_link = get_tag_link( $posttag->term_id );
                  $html .= "<a href='{$tag_link}' title='{$posttag->name}' class='{$posttag->slug}' data-termehover=''>";
                  $html .= "{$posttag->name}</a>";
                }
            echo $html; ?>
        </div><!-- article_tags -->
      <?php endif; ?>


      <?php if ((isset($terme_postmeta['share-display']) && !empty($terme_postmeta['share-display']) || $terme_options['post_share'] ) ) : ?>
        <div class="article_social">
          <ul>
            <?php if (isset($terme_options['facebook_share']) && !empty($terme_options['facebook_share']))  : ?>
            <li><a href="<?php echo $terme_options['facebook_share'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if (isset($terme_options['twitter_share']) && !empty($terme_options['twitter_share']))  : ?>
            <li><a href="<?php echo $terme_options['twitter_share'] ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['pinterest_share']) && !empty($terme_options['pinterest_share']))  : ?>
            <li><a href="<?php echo $terme_options['pinterest_share'] ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['tumblr_share']) && !empty($terme_options['tumblr_share']))  : ?>
            <li><a href="<?php echo $terme_options['tumblr_share'] ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          <?php if (isset($terme_options['wordpress_share']) && !empty($terme_options['wordpress_share']))  : ?>
            <li><a href="<?php echo $terme_options['wordpress_share'] ?>"><i class="fa fa-wordpress" aria-hidden="true"></i></a></li>
          <?php endif; ?>
          </ul>
        </div><!-- article_social -->
      <?php endif; ?>
    </div><!-- terme_post -->
    <?php if ((isset($terme_postmeta['author-display']) && !empty($terme_postmeta['author-display']) || $terme_options['author_box'] ) ) : ?>
      <div class="article_author">
          <?php echo get_avatar( $comment, 90 ); ?>
          <div class="name">
            <?php the_author_posts_link(); ?>

            <span><?php the_author_posts(); ?> <?php _e('Articles', 'terme') ?></span>
          </div>
          <div class="desc">
            <p>
              <?php the_author_meta( 'user_description' ); ?>
            </p>
          </div>
      </div>
    <?php endif; ?>
    <?php if ((isset($terme_postmeta['relatedpost-display']) && !empty($terme_postmeta['relatedpost-display']) || $terme_options['related_posts'] ) ) : ?>
      <div class="article_related">
        <h4><?php _e('Related Post', 'terme'); ?></h4>
        <ul>
        <?php
            $tags = wp_get_post_tags($post->ID);
            $categories = wp_get_post_categories($post->ID);
            if ($tags) {
                $tag_ids = array();
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            }
            if ($terme_options['related_posts_display_by']=="2") {
                $related=array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>$terme_options['related_number_of_posts'],
                    'ignore_sticky_posts'=>1
                );
            } elseif ($terme_options['related_posts_display_by']=="1") {
                $related=array(
                    'category__in' => $categories,
                    'post__not_in' => array($post->ID),
                    'showposts'=>$terme_options['related_number_of_posts'],
                    'ignore_sticky_posts'=>1
                );

            }
            // elseif ($terme_options['related_posts_display_by']['options']=="author") {
            //     $related=array(
            //         'author' => get_the_author_meta('ID'),
            //         'post__not_in' => array($post->ID),
            //         'showposts'=>$terme_options['related_number_of_posts'],
            //         'ignore_sticky_posts'=>1
            //     );
            // }
            else {
                $related=array(
                    'tag__in' => $tag_ids,
                    'category__in' => $categories,
                    'post__not_in' => array($post->ID),
                    'showposts'=>$terme_options['related_number_of_posts'],
                    'ignore_sticky_posts'=>1
                );
            }
            $related_query = new wp_query($related);
            if( $related_query->have_posts() ) {
                while ($related_query->have_posts()) {
                    $related_query->the_post();
        ?>
          <li>
            <div class="thumb"><?php the_post_thumbnail( 'related_thumb' ); ?></div>
            <h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <div class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></div>
          </li>
            <?php } wp_reset_postdata(); }  ?>
            </ul>
      </div>
    <?php endif; ?>
    <?php if ((isset($terme_postmeta['comment-display']) && !empty($terme_postmeta['comment-display']) || $terme_options['post_comments'] ) ) : ?>
      <div class="article_comment">
      <?php comments_template(); ?>
      </div>
    <?php endif; ?>
    <?php terme_set_post_views(get_the_ID()); endwhile; else: ?>
    <?php endif; ?>
  </div><!-- article_content -->
</div><!--col-md-8-->