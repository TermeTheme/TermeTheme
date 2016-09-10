<?php
add_action('wp_enqueue_scripts', 'terme_enqueue_scripts');
function terme_enqueue_scripts() {
    wp_enqueue_style('OwlCarousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), '4.0.0');
    wp_enqueue_style('Bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('TermeStyle', get_template_directory_uri().'/assets/css/terme.css', array(), '4.0.0');
    wp_enqueue_style('FontAwesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.0.0');
    wp_enqueue_style('SlideBars', get_template_directory_uri().'/assets/css/slidebars.min.css', array(), '4.0.0');
    wp_enqueue_style('termeAdmin', get_template_directory_uri().'/assets/admin/css/terme.css', array(), '4.0.0');
    if (is_rtl()) {
        wp_enqueue_style('Bootstrap-RTL', get_template_directory_uri().'/assets/css/bootstrap-rtl.min.css', array(), '4.0.0');
    }
    // Scripts
    wp_enqueue_script('jQuery-OwlCarousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-Bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-Newsticker', get_template_directory_uri().'/assets/js/typed.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-SlidebarS', get_template_directory_uri().'/assets/js/slidebars.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-terme', get_template_directory_uri().'/assets/js/terme.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-accordion', get_template_directory_uri().'/assets/js/jquery.dcjqaccordion.2.7.min.js', array('jquery'), '1.4.1', true);
    wp_enqueue_script('jQuery-Hover', get_template_directory_uri().'/assets/js/jquery.hoverIntent.minified.js', array('jquery'), '1.4.1', true);
}

// Register our sidebars and widgetized areas.
function terme_sidebars() {
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
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 2)',
        'id' => 'footer_2',
        'description' => __( 'Widgets in this area will be shown in the footer column 2.', 'terme' ),
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 3)',
        'id' => 'footer_3',
        'description' => __( 'Widgets in this area will be shown in the footer column 3.', 'terme' ),
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer (Column 4)',
        'id' => 'footer_4',
        'description' => __( 'Widgets in this area will be shown in the footer column 4.', 'terme' ),
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'terme_sidebars');

add_action('admin_enqueue_scripts', 'terme_theme_admin_assets');
function terme_theme_admin_assets() {
    wp_enqueue_style('TermeTheme-admin-style', get_template_directory_uri().'/assets/admin/css/terme.css', array());
    wp_enqueue_script('TermeTheme-Admin-Js', get_template_directory_uri().'/assets/admin/js/terme.js', array('jquery'), true);
    if (is_rtl()) {
        wp_enqueue_style('TermeTheme-admin-style-rtl', get_template_directory_uri().'/assets/admin/css/terme-rtl.css', array());
    }
}
// Woocommerce Theme Support
add_action('after_setup_theme', 'terme_setup', 1);
function terme_setup() {
    add_theme_support('woocommerce');
    add_theme_support( 'title-tag' );
    load_theme_textdomain( 'terme', TEMPLATEPATH . '/languages' );
    register_nav_menus(
		array(
			'header_menu' => __( 'Header Menu','terme' ),
			'footer_menu' => __( 'Footer Menu','terme' ),
			)
	);
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
        add_image_size('element_shop_thumb', 180, 190, true);
        add_image_size('wc_product', 250, 250, true);
        add_image_size('shop_catalog_home_3', 350, 320, true);
        add_image_size('shop_catalog_home_4', 250, 320, true);
        add_image_size('slider', 750, 385, true);
    }
    include TEMPLATEPATH.'/inc/theme_option/index.php';
}

include TEMPLATEPATH.'/inc/terme_funcs.php';
include TEMPLATEPATH.'/inc/terme_customizer.php';
include TEMPLATEPATH.'/inc/widgets/widgets.php';
include TEMPLATEPATH.'/inc/page-builder/index.php';
include TEMPLATEPATH.'/inc/metabox/terme_meta.php';
include TEMPLATEPATH.'/inc/wc_functions.php';
include TEMPLATEPATH.'/inc/slider/init.php';
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
                <?php comment_text(); ?>
                <?php if ($comment->comment_approved == '0') : ?>>
                    <p>
                        <?php _e('your comment is awaiting moderation') ?>
                    </p>
                <?php endif;?>
            </div>
          </article>


<?php
} ?>
