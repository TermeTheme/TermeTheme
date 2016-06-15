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
}
// Register our sidebars and widgetized areas.
function terme_sidebar() {
	register_sidebar( array(
		'name'          => 'Terme Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'terme_sidebar' );

add_action('after_setup_theme', 'terme_load_textdomain');
function terme_load_textdomain(){
    load_theme_textdomain('terme', get_template_directory() . '/languages');
}
include TEMPLATEPATH . '/inc/widgets/widgets.php';
include TEMPLATEPATH . '/inc/theme_option/index.php';
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
					<?php if ($comment->comment_approved == '0') : ?>
                  <?php endif; ?>
<?php } ?>
