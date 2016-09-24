<?php
/*-----------------------------------------------------------------------------------*/
# Terme Shorten Text
/*-----------------------------------------------------------------------------------*/
function terme_shorten_text($text,$chars_limit) {
    $chars_text = strlen($text);
    $text = $text." ";
    $text = substr($text,0,$chars_limit);
    $text = substr($text,0,strrpos($text,' '));
    if ($chars_text > $chars_limit) { $text = $text."..."; }
    return $text;
}
/*-----------------------------------------------------------------------------------*/
# Terme breadcrumbs
/*-----------------------------------------------------------------------------------*/
function terme_breadcrumb() {
    global $post;
    global $terme_options;
    echo '<div class="breadcrumbs"><ul>';
    if (!is_home()) {
        if (!($terme_options['home_link_type'] == 0)) {
            if ($terme_options['home_link_type'] == 1) {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo '<i class="fa '.$terme_options['home_icon_text_icon'].'"></i>';
                echo '</a> <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li>';
            } elseif ($terme_options['home_link_type'] == 2) {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo $terme_options['home_text'];
                echo '</a> <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li>';
            } else {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo '<i class="fa '.$terme_options['home_icon_text_icon'].'"></i> '.$terme_options['home_icon_text_text'];
                echo '</a> <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li>';
            }
        }
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li><li> ');
            if (is_single()) {
                echo ' <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                $title = get_the_title();
                foreach ($anc as $ancestor) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> <i class="fa '.$terme_options['delimiter_icon'].'"></i></li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    } elseif (is_tag()) {
        single_tag_title();
    } elseif (is_day()) {
        echo'<li>Archive for ';
        the_time('F jS, Y');
        echo'</li>';
    } elseif (is_month()) {
        echo'<li>Archive for ';
        the_time('F, Y');
        echo'</li>';
    } elseif (is_year()) {
        echo'<li>Archive for ';
        the_time('Y');
        echo'</li>';
    } elseif (is_author()) {
        echo'<li>Author Archive';
        echo'</li>';
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        echo '<li>Blog Archives';
        echo'</li>';
    } elseif (is_search()) {
        echo'<li>Search Results';
        echo'</li>';
    }
    echo '</ul></div>';
}
/*-----------------------------------------------------------------------------------*/
# Terme Add Span Count To Category
/*-----------------------------------------------------------------------------------*/
add_filter('wp_list_categories', 'add_span_cat_count');
function add_span_cat_count($output) {
  $output = str_replace('</a> (','<span> ',$output);
  $output = str_replace(')','</span></a> ',$output);
  return $output;
}
/*-----------------------------------------------------------------------------------*/
# Terme Add Custom Data-attribute To Tag
/*-----------------------------------------------------------------------------------*/
add_filter('wp_tag_cloud','add_data_the_tags');
function add_data_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a data-termehover=""',$html);
    return $html;
}
/*-----------------------------------------------------------------------------------*/
# Terme Popular Post By View
/*-----------------------------------------------------------------------------------*/
function terme_set_post_views($postID) {
    $count_key = 'terme_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ( isset($count) && !empty($count) ) {
        $count++;
        update_post_meta($postID, $count_key, $count);
    } else {
        update_post_meta($postID, $count_key, 0);
    }
}
function terme_get_post_views($postID) {
    $count_key = 'terme_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    $count = (isset($count) && !empty($count)) ? $count : 0 ;
    $result = printf(
      __('%s View','terme'),
      $count
    );
    return $result;
}
