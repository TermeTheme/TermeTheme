<?php
global $terme_options;
$option = $terme_options['theme_layout'];
$path = get_sidebar();
$sidebar = '<div class="col-md-4 hidden-sm hidden-xs">22222</div><!--col-xs-4-->';

            if(have_posts()) : while(have_posts()) : the_post();

              get_template_part( 'inc/content/content', 'loop' );

              endwhile; else:
              endif;

$content = 	'<div class="col-md-8 col-sm-12"><div class="home_content">' . $page_builder_output .'</div><!-- home_content --></div><!--col-xs-8-->';

    $layout = array(
        '0' => $sidebar,
        '1' => $content,
    );
    if ($option == '1' ) {
        $new_sort = array();
        for ($i=0; $i <= 1; $i++) {
            $new_sort[] = $layout[$i];
        }
    } else {
        $new_sort = array();
        for ($i=1; $i >= 0; $i--) {
            $new_sort[] = $layout[$i];
        }
    }
    foreach ($new_sort as $key => $value) {
      echo $value;
    }
    // print_r($option);
    // print_r($layout);
    // print_r($new_sort);
 ?>
