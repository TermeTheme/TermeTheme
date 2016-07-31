<?php
include TEMPLATEPATH . '/inc/widgets/social_widget.php';
include TEMPLATEPATH . '/inc/widgets/video.php';
include TEMPLATEPATH . '/inc/widgets/top_articles.php';
include TEMPLATEPATH . '/inc/widgets/ads.php';
include TEMPLATEPATH . '/inc/widgets/news.php';

/*-----------------------------------------------------------------------------------*/
# Adjust Category Widget HTML Structure
/*-----------------------------------------------------------------------------------*/
function terme_adjust_category_widget($output) {
    $output = str_replace('</a> (','<span> ',$output);
    $output = str_replace(')','</span></a> ',$output);
    return $output;
}
add_filter('wp_list_categories', 'terme_adjust_category_widget');
 ?>
