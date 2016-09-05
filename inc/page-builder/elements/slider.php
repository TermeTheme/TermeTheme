<div class="MainSlider">
    <?php
         global $terme_options;
        $slider_id = $terme_options['slider_id'];
        $slider = get_post_meta( $slider_id, '_terme_slider_slides',true);
        if ( isset($slider) && !empty($slider) ) {
            $type = ( isset($slider['settings']['type']) && !empty($slider['settings']['type']) ) ? $slider['settings']['type'] : 'custom' ;
        }
    ?>
    <?php
        if ( $type == 'custom' ):
            $slides = ( isset($slider['slides']) && !empty($slider['slides']) ) ? $slider['slides'] : array();
            if ( isset($slides) && !empty($slides) ):
                foreach ($slides as $key => $slide ):
                    $image_id = $slide['img'];
                    $thumb = wp_get_attachment_image_src( $image_id, 'slider' );
                    $title = $slide['title'];
                    $url = $slide['url'];
    ?>
                <div class="item">
                    <div class="slider_item">
                        <img src="<?php echo $thumb['0']; ?>" alt="<?php echo $title ?>" />
                        <div class="slider_desc">
                            <h2><a href="<?php echo $url ?>"><?php echo $title ?></a></h2>
                        </div>
                    </div>
                </div>
    <?php
                endforeach;
            endif;
        else:
            $selected_cats = (isset($slider['settings']['cats']) && !empty($slider['settings']['cats'])) ? $slider['settings']['cats'] : array() ;
            $number = (isset($slider['settings']['number']) && !empty($slider['settings']['number'])) ? $slider['settings']['number'] : array() ;
            $args = array(
                'posts_per_page'         => $number,
                'post_type'		=> 'post',
                'category__in' => $selected_cats
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()):
            $my_query->the_post();
            $do_not_duplicate = $post->ID;?>

            <div class="item">
                <div class="slider_item">
                    <?php the_post_thumbnail( 'slider' ) ?>
                    <div class="slider_desc">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        <span><?php the_time('F j, Y g:i a'); ?></span>
                    </div>
                </div>
            </div>

            <?php endwhile; wp_reset_postdata(); ?>

    <?php endif; ?>

</div>
