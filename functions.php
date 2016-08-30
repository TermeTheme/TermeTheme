<?php
add_action('wp_enqueue_scripts', 'TermeTheme');
function TermeTheme()
{
    wp_enqueue_style('OwlCarousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), '4.0.0');
    wp_enqueue_style('Bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('TermeStyle', get_template_directory_uri().'/assets/css/terme.css', array(), '4.0.0');
    wp_enqueue_style('FontAwesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.0.0');
    wp_enqueue_style('SlideBars', get_template_directory_uri().'/assets/css/slidebars.min.css', array(), '4.0.0');
    wp_enqueue_style('termeAdmin', get_template_directory_uri().'/assets/admin/css/terme.css', array(), '4.0.0');
    // Scripts
    wp_enqueue_script('jQuery-OwlCarousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-Bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-Newsticker', get_template_directory_uri().'/assets/js/typed.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-SlidebarS', get_template_directory_uri().'/assets/js/slidebars.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-terme', get_template_directory_uri().'/assets/js/terme.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-accordion', get_template_directory_uri().'/assets/js/jquery.dcjqaccordion.2.7.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-Hover', get_template_directory_uri().'/assets/js/jquery.hoverIntent.minified.js', array('jquery'), '1.4.1', true);
}
// Enable thumbnails
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
if (function_exists('add_image_size')) {
    add_image_size('category_thumb', 210, 210, true);
    add_image_size('related_thumb', 100, 70, true);
    add_image_size('element_01_thumb_01', 420, 250, true);
    add_image_size('element_01_thumb_02', 100, 75, true);
    add_image_size('element_03_thumb_01', 420, 250, true);
    add_image_size('element_05_thumb_01', 215, 215, true);
    add_image_size('wc_product', 250, 250, true);
    add_image_size('slider', 750, 385, true);
}
// Register our sidebars and widgetized areas.
function terme_sidebars()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'description' => __( 'Widgets in this area will be shown in the default sidebar.', 'terme' ),
        'before_widget' => '<section>',
        'after_widget' => '</div></section>',
        'before_title' => '<h4>',
        'after_title' => '</h4><div class="widget_body">',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 1)',
        'id' => 'footer_1',
        'description' => __( 'Widgets in this area will be shown in the footer column 1.', 'terme' ),
        'before_widget' => '<div class="box_1">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 2)',
        'id' => 'footer_2',
        'description' => __( 'Widgets in this area will be shown in the footer column 2.', 'terme' ),
        'before_widget' => '<div class="box_2">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 3)',
        'id' => 'footer_3',
        'description' => __( 'Widgets in this area will be shown in the footer column 3.', 'terme' ),
        'before_widget' => '<div class="box_3">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 4)',
        'id' => 'footer_4',
        'description' => __( 'Widgets in this area will be shown in the footer column 4.', 'terme' ),
        'before_widget' => '<div class="box_4">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'terme_sidebars');

add_action('admin_head', 'terme_theme_admin_assets', 1);
function terme_theme_admin_assets()
{
    wp_enqueue_style('TermeTheme-admin-style', get_template_directory_uri().'/assets/admin/css/terme.css', array());
    wp_enqueue_script('TermeTheme-Admin-Js', get_template_directory_uri().'/assets/admin/js/terme.js', array('jquery'), true);
}
// Woocommerce Theme Support
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}
// Translation Text Domin
add_action('after_setup_theme', 'terme_load_textdomain');
function terme_load_textdomain()
{
    // load_theme_textdomain('terme', get_template_directory().'/languages');
    load_theme_textdomain( 'terme', TEMPLATEPATH.'/languages' );
    $locale = get_locale();
    $locale_file = TEMPLATEPATH."/languages/$locale.php";
    if ( is_readable($locale_file) )
    	require_once($locale_file);
}
// Menu
add_action( 'init', 'theme_setup' );
function theme_setup() {
	register_nav_menus(
		array(
			'header_menu' => __( 'Header Menu','terme' ),
			'footer_menu' => __( 'Footer Menu','terme' ),
			)
	);
}




// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );
include TEMPLATEPATH.'/inc/terme_funcs.php';
include TEMPLATEPATH.'/inc/hooks.php';
include TEMPLATEPATH.'/inc/widgets/widgets.php';
include TEMPLATEPATH.'/inc/theme_option/index.php';
include TEMPLATEPATH.'/inc/page-builder/index.php';
include TEMPLATEPATH.'/inc/metabox/terme_meta.php';
include TEMPLATEPATH.'/woocommerce/wc_functions.php';
// include TEMPLATEPATH.'/inc/post_type/slider.php';
include TEMPLATEPATH.'/inc/post_type/post_type_ini.php';
include TEMPLATEPATH.'/inc/post_type/meta_box_ini.php';
?>

<?php
    function advanced_comment($comment, $args, $depth)  {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> >
          <article id="comment-<?php comment_ID(); ?>">
            <div class="comment_author">
              <?php echo get_avatar($comment, 75);
        ?>
            </div>
            <div class="comment_metadata">
              <b class="name"><?php echo get_comment_author_link();
        ?></b>
              <time><?php printf(__('%1$s'), get_comment_date('j F Y در g:i a'), get_comment_time()) ?></time>
              <div class="reply">
                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
              </div>
            </div>
            <div class="comment_content">
                <?php comment_text();
        ?>
            </div>
          </article>

					<?php if ($comment->comment_approved == '0') : ?>
                  <?php endif;?>
<?php
    } ?>
