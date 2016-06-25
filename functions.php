<?php
add_action( 'wp_enqueue_scripts', 'TermeTheme' );
function TermeTheme() {
	wp_enqueue_style( 'OwlCarousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '4.0.0' );
	wp_enqueue_style( 'Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'TermeStyle', get_template_directory_uri() . '/assets/css/terme.css', array(), '4.0.0' );
	wp_enqueue_style( 'FontAwesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'SlideBars', get_template_directory_uri() . '/assets/css/slidebars.min.css', array(), '4.0.0' );
	// Scripts
	wp_enqueue_script( 'jQuery-OwlCarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'jQuery-Bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'jQuery-Newsticker', get_template_directory_uri() . '/assets/js/typed.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'jQuery-SlidebarS', get_template_directory_uri() . '/assets/js/slidebars.min.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'jQuery-terme', get_template_directory_uri() . '/assets/js/terme.js', array( 'jquery' ), '1.4.1', true );
}
// Enable thumbnails
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ){
	add_image_size( 'category_thumb', 210, 210, true );
	add_image_size( 'related_thumb', 100, 70, true );
	add_image_size( 'element_01_thumb_01', 420, 250, true );
	add_image_size( 'element_01_thumb_02', 100, 75, true );
}
// Register our sidebars and widgetized areas.
function terme_sidebars() {
	register_sidebar( array(
		'name'          => 'Terme Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => 'footer Widget',
		'id'            => 'footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'terme_sidebars' );


add_action('admin_head', 'terme_theme_admin_assets',1);
function terme_theme_admin_assets() {
	wp_enqueue_style( 'TermeTheme-admin-style', get_template_directory_uri() . '/assets/admin/css/terme.css', array() );
    wp_enqueue_script( 'TermeTheme-Admin-Js', get_template_directory_uri() . '/assets/admin/js/terme.js', array('jquery'), true );
}

function terme_breadcrumb() {
    global $post;
    global $terme_options;
    echo '<div class="breadcrumbs"><ul>';
    if (!is_home()) {
      if (!($terme_options['home_link_type']==0)) {
        if ($terme_options['home_link_type']==1) {
            echo '<li><a href="';
            echo get_option('home');
            echo '">';
            echo '<i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i>';
            echo '</a> <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li>';
        } elseif ($terme_options['home_link_type']==2) {
            echo '<li><a href="';
            echo get_option('home');
            echo '">';
            echo $terme_options['home_text'];
            echo '</a> <i class="fa '.$terme_options['post_breadcrumb_seprator'].'"></i></li>';
        } else {
            echo '<li><a href="';
            echo get_option('home');
            echo '">';
            echo '<i class="fa '.$terme_options['home_icon_text-icon'].'"></i> '.$terme_options['home_icon_text-text'];
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
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> <i class="fa '.$terme_options['delimiter_icon'].'"></i></li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul></div>';
}
// Translation Text Domin
add_action('after_setup_theme', 'terme_load_textdomain');
function terme_load_textdomain(){
    load_theme_textdomain('terme', get_template_directory() . '/languages');
}
include TEMPLATEPATH . '/inc/terme_funcs.php';
include TEMPLATEPATH . '/inc/widgets/widgets.php';
include TEMPLATEPATH . '/inc/theme_option/index.php';
include TEMPLATEPATH . '/inc/page-builder/index.php';
?>
<?php
    function advanced_comment($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
			 	<li>
			 		<article class="">
						<div class="comment_author">
							<?php echo get_avatar( $comment, 90 ); ?>
						</div>
						<div class="comment_metadata">
		          <b class="name"><?php echo get_comment_author_link(); ?></b>
		          <time><?php printf(__('%1$s'), get_comment_date('j F Y در g:i a'), get_comment_time()) ?></time>
		          <div class="reply">
		            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		          </div>
		        </div>
		        <div class="comment_content">
		            <?php comment_text(); ?>
		        </div>
			 		</article>
				</li>
					<?php if ($comment->comment_approved == '0') : ?>
                  <?php endif; ?>
<?php } ?>
