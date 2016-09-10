<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "terme_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'terme_options/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Terme Setting', 'terme' ),
        'page_title'           => __( 'Terme Setting', 'terme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => false,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-docs',
    //     'href'  => 'http://docs.reduxframework.com/',
    //     'title' => __( 'Documentation', 'terme' ),
    // );
    //
    // $args['admin_bar_links'][] = array(
    //     //'id'    => 'redux-support',
    //     'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    //     'title' => __( 'Support', 'terme' ),
    // );
    //
    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-extensions',
    //     'href'  => 'reduxframework.com/extensions',
    //     'title' => __( 'Extensions', 'terme' ),
    // );
    //
    // // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    // $args['share_icons'][] = array(
    //     'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    //     'title' => 'Visit us on GitHub',
    //     'icon'  => 'el el-github'
    //     //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    //     'title' => 'Like us on Facebook',
    //     'icon'  => 'el el-facebook'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'terme' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'terme' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'terme' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'terme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'terme' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'terme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'terme' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'terme' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START General Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General Settings', 'terme' ),
        'id'               => 'general-settings',
        'customizer_width' => '400px',
        'icon'             => 'el el-wrench',
        'fields'           => array(
          array(
              'id'       => 'theme_layout',
              'type'     => 'image_select',
              'title'    => __( 'Theme Layout', 'terme' ),
              'subtitle' => __( 'Select the general sidebar you want to use by default.', 'terme' ),
              'options'  => array(
                  '0' => array(
                      'alt' => 'right sidebar',
                      'img' => get_template_directory_uri().'/assets/admin/images/right_sidebar.png',
                  ),
                  '1' => array(
                      'alt' => 'left sidebar',
                      'img' => get_template_directory_uri().'/assets/admin/images/left_sidebar.png',
                  ),
              ),
              'default'  => '0',
          ),
          array(
              'id'       => 'scroll_to_top',
              'type'     => 'switch',
              'title'    => __( 'Scroll to Top Button', 'terme' ),
              'subtitle' => __( 'Enabling this option will add a "Back To Top" button to pages.', 'terme' ),
              'default'  => true,
              'on'       =>  __('Enabled', 'terme'),
              'off'      =>  __('Disabled', 'terme'),
          ),
          array(
              'id'       => 'newsticker',
              'type'     => 'switch',
              'title'    => __( 'NewsTicker', 'terme' ),
              'subtitle' => __( 'Enable or disable the NewsTicker', 'terme' ),
              'default'  => true,
              'on'       =>  __('Enabled', 'terme'),
              'off'      =>  __('Disabled', 'terme'),
          ),
          array(
              'id'       => 'favicon_16',
              'type'     => 'media',
              'title'    => __( 'Favicon (16x16)', 'terme' ),

          ),
          array(
              'id'       => 'favicon_57',
              'type'     => 'media',
              'title'    => __( 'Apple iPhone Icon', 'terme' ),
              'desc' => __( 'Icon for Apple iPhone (57px x 57px)', 'terme' ),

          ),
          array(
              'id'       => 'favicon_72',
              'type'     => 'media',
              'title'    => __( 'Apple iPad Icon', 'terme' ),
              'desc' => __( 'Icon for Apple iPhone (72px x 72px)', 'terme' ),

          ),
          array(
              'id'       => 'favicon_114',
              'type'     => 'media',
              'title'    => __( 'Apple iPhone Retina Icon', 'terme' ),
              'desc' => __( 'Apple iPhone Retina Version (114px x 114px)', 'terme' ),
          ),
          array(
              'id'       => 'favicon_144',
              'type'     => 'media',
              'title'    => __( 'Apple iPad Retina Icon', 'terme' ),
              'desc' => __( 'Icon for Apple iPad Retina Version (144px x 144px)', 'terme' ),
          ),

          array(
              'id'       => 'date_format',
              'type'     => 'text',
              'title'    => __( 'Date Format', 'terme' ),
              'subtitle' => __( 'Change date format click <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">here</a> to see how to change it', 'terme' ),
              'default'  => 'F j, Y',
          ),
        )
    ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Post Settings', 'terme' ),
            'id'               => 'post_settings',
            'icon'             => 'el el-website',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(
              array(
                  'id'    => 'post_breadcrumb_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-share',
                  'title' => __( 'Post Breadcrumb Options', 'terme' ),
              ),
              array(
                  'id'       => 'post_breadcrumb',
                  'type'     => 'switch',
                  'title'    => __( 'Post Breadcrumb', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'       => 'home_link_type',
                  'type'     => 'select',
                  'title'    => __( 'Home Link Type', 'terme' ),
                  'indent'   => true,
                  'required' => array( 'post_breadcrumb', "=", 1 ),
                  'options'  => array(
                      '0' => __( 'Disable', 'terme' ),
                      '1' => __( 'Icon', 'terme' ),
                      '2' => __( 'Text', 'terme' ),
                      '3' => __( 'Icon & Text', 'terme' ),
                  ),
                  'default'  => '3'
              ),



                  array(
                      'id'       => 'home_text',
                      'type'     => 'text',
                      'title'    => __( 'Home Text', 'terme' ),
                      'indent'   => true,
                      'required' => array( 'home_link_type', "=", 2 ),
                      'default'  => 'Home'
                  ),


                  array(
                      'id'       => 'home_icon_text_text',
                      'type'     => 'text',
                      'title'    => __( 'Home Text', 'terme' ),
                      'indent'   => true,
                      'required' => array( 'home_link_type', "=", 3 ),
                      'default'  => 'Home'
                  ),
                  array(
                      'id'       => 'post_breadcrumb_seprator',
                      'type'     => 'icon_selector',
                      'title'    => __( 'Delimiter Icon', 'terme' ),
                      'indent'   => true,
                      'required' => array( 'post_breadcrumb', "=", 1 ),
                      'default'  => 'fa-angle-right',
                  ),

                  array(
                    'id'       => 'home_icon_text_icon',
                    'type'     => 'icon_selector',
                    'title'    => __( 'Home Icon', 'terme' ),
                    'indent'   => true,
                    'required' => array( 'post_breadcrumb', "=", 1 ),
                    'default'  => 'fa-home',
                  ),

              array(
                  'id'    => 'post_meta_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-share',
                  'title' => __( 'Post Meta Options', 'terme' ),
              ),
              array(
                  'id'       => 'post_meta',
                  'type'     => 'switch',
                  'title'    => __( 'Post Meta', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'       => 'post_date',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post Date', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_meta', '=' , 1),
              ),

              array(
                  'id'       => 'post_date_format',
                  'type'     => 'text',
                  'title'    => __( 'Post Date Format', 'terme' ),
                  'required' => array( 'post_date', '=', '1' ),
                  'default'  => 'F j, Y',



              ),
              array(
                  'id'       => 'post_category',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post Category', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_meta', '=' , 1),
              ),
              array(
                  'id'       => 'view_count',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post view Count', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_meta', '=' , 1),
              ),

              array(
                  'id'       => 'comment_count',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post Comment Count', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_meta', '=' , 1),
              ),
              array(
                  'id'       => 'section-start',
                  'type'     => 'section',
                  'indent'   => true,
              ),
              array(
                  'id'     => 'section-end',
                  'type'   => 'section',
                  'indent' => false,
              ),
              array(
                  'id'       => 'post_tags',
                  'type'     => 'switch',
                  'title'    => __( 'Post Tags', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'       => 'author_box',
                  'type'     => 'switch',
                  'title'    => __( 'Author Box', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'       => 'post_comments',
                  'type'     => 'switch',
                  'title'    => __( 'Post Comments', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'    => 'post_share_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-share',
                  'title' => __( 'Post Sharing Options', 'terme' ),
              ),
              array(
                  'id'       => 'post_share',
                  'type'     => 'switch',
                  'title'    => __( 'Post Share', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'       => 'section-start',
                  'type'     => 'section',
                  'indent'   => true,
              ),
              array(
                  'id'       => 'facebook_share',
                  'type'     => 'switch',
                  'title'    => __( 'Facebook', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'twitter_share',
                  'type'     => 'switch',
                  'title'    => __( 'Twitter', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'pinterest_share',
                  'type'     => 'switch',
                  'title'    => __( 'Pinterest', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'tumblr_share',
                  'type'     => 'switch',
                  'title'    => __( 'Tumblr', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'wordpress_share',
                  'type'     => 'switch',
                  'title'    => __( 'Wordpress', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'     => 'section-end',
                  'type'   => 'section',
                  'indent' => false,
              ),
              array(
                  'id'    => 'related_posts_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-link',
                  'title' => __( 'Related Posts Setting', 'terme' ),
              ),
              array(
                  'id'       => 'related_posts',
                  'type'     => 'switch',
                  'title'    => __( 'Related Post', 'terme' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'id'            => 'related_number_of_posts',
                  'type'          => 'slider',
                  'title'         => __( 'Number of Posts', 'terme' ),
                  'subtitle'      => __( 'How many related articles to show:', 'terme' ),
                  'default'       => 5,
                  'min'           => 1,
                  'step'          => 1,
                  'max'           => 10,
                  'display_value' => 'text',
                  'required' => array( 'related_posts', '=', 1 ),
              ),
              array(
                  'id'       => 'related_posts_display_by',
                  'type'     => 'select',
                  'title'    => __( 'Related Post By', 'terme' ),
                  'required' => array( 'related_posts', '=', 1 ),
                  'options'  => array(
                      '1' => 'Category',
                      '2' => 'tags',
                  ),
                  'default'  => '2'
              ),

            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Social Icons', 'terme' ),
            'id'               => 'social_icons',
            'icon'             => 'el el-globe',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(

              array(
                  'id'       => 'facebook',
                  'type'     => 'text',
                  'title'    => __( 'Facebook', 'terme' ),
              ),
              array(
                  'id'       => 'twitter',
                  'type'     => 'text',
                  'title'    => __( 'Twitter', 'terme' ),
              ),
              array(
                  'id'       => 'google_plus',
                  'type'     => 'text',
                  'title'    => __( 'Google+', 'terme' ),
              ),
              array(
                  'id'       => 'youtube',
                  'type'     => 'text',
                  'title'    => __( 'Youtube', 'terme' ),
              ),
              array(
                  'id'       => 'instagram',
                  'type'     => 'text',
                  'title'    => __( 'Instagram', 'terme' ),
              ),
              array(
                  'id'       => 'dribbble',
                  'type'     => 'text',
                  'title'    => __( 'Dribbble', 'terme' ),
              ),
              array(
                  'id'       => 'rss',
                  'type'     => 'text',
                  'title'    => __( 'RSS', 'terme' ),
              ),
              array(
                  'id'       => 'vimeo',
                  'type'     => 'text',
                  'title'    => __( 'Vimeo', 'terme' ),
              ),

            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Slider Settings', 'terme' ),
            'id'               => 'slider_setting',
            'icon'             => 'el el-picture',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(
              array(
                  'id'       => 'slider',
                  'type'     => 'switch',
                  'title'    => __( 'Slider', 'terme' ),
                  'default'  => false,
                  'on'       =>  __('Enabled', 'terme'),
                  'off'      =>  __('Disabled', 'terme'),
              ),
              array(
                  'title'    => __( 'Select Slider', 'terme' ),
                  'id'       => 'slider_id',
                  'type'     => 'select',
                  'multi'    => false,
                  'data'     => 'posts',
                  'args' => array('post_type' => array('slider')),
                  'subtitle' => __( 'Select Slider will be displayed in Homepage', 'terme' ),
                  'required' => array('slider', '=' , 1),
              ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Login & Logout Settings', 'terme' ),
            'id'               => 'login_setting',
            'icon'             => 'el el-lock',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(
              array(
                  'id'       => 'login_text',
                  'type'     => 'text',
                  'title'    => __( 'Login Text Button', 'terme' ),
                  'default'=>'Login',
              ),
                array(
                    'title'    => __( 'Login Page', 'terme' ),
                    'id'       => 'login_page',
                    'type'     => 'select',
                    'multi'    => false,
                    'data'     => 'page',
                    'subtitle' => __( 'Select Login Page', 'terme' ),
                ),
                array(
                    'id'       => 'register_text',
                    'type'     => 'text',
                    'title'    => __( 'Register Text Button', 'terme' ),
                    'default'=>'Register',
                ),
                array(
                    'title'    => __( 'Register Page', 'terme' ),
                    'id'       => 'register_page',
                    'type'     => 'select',
                    'multi'    => false,
                    'data'     => 'page',
                    'subtitle' => __( 'Select Register Page', 'terme' ),
                ),
                array(
                    'id'       => 'logout_text',
                    'type'     => 'text',
                    'title'    => __( 'Logout Text Button', 'terme' ),
                    'default'=>'Logout',
                ),
            )
        ) );

    // -> START Header Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Settings', 'terme' ),
        'id'               => 'header_settings',
        'customizer_width' => '500px',
        'icon'             => 'el el-screen',
        'fields'     => array(
          array(
              'id'       => 'header_layout',
              'type'     => 'image_select',
              'title'    => __( 'Header Layout', 'terme' ),
              'subtitle' => __( 'Choose the default header layout', 'terme' ),
              'options'  => array(
                  '1' => array(
                      'alt' => 'Header(1)',
                      'img' => get_template_directory_uri().'/assets/admin/images/header_01.png',
                  ),
                  '2' => array(
                      'alt' => 'Header(2)',
                      'img' => get_template_directory_uri().'/assets/admin/images/header_02.png',
                  ),
                  '3' => array(
                      'alt' => 'Header(3)',
                      'img' => get_template_directory_uri().'/assets/admin/images/header_03.png',
                  ),
                  '4' => array(
                      'alt' => 'Header(4)',
                      'img' => get_template_directory_uri().'/assets/admin/images/header_04.png',
                  ),

              ),
              'default'  => '2'
          ),
          array(
              'id'       => 'logo_type',
              'type'     => 'select',
              'title'    => __( 'Select Logo type', 'terme' ),
              'options' => array(
                  'logo_image' => __('Logo Image', 'terme'),
                  'logo_name' => __('Site Name', 'terme'),
                  ),
              'default' => 'logo_image',
          ),
          array(
          'id'=>'logo_img',
          'type' => 'media',
          'title' => __('Upload your logo image', 'terme'),
          'default'=> array(
            'url'=> get_template_directory_uri().'/assets/img/terme_logo.png'
          ),
          'required' => array('logo_type', '=' , 'logo_image'),
          ),
          array(
          'id'=>'retina_logo_img',
          'type' => 'media',
          'title' => __('Upload your retina logo image', 'terme'),
          'subtitle' => __( 'If you want to upload a Retina Image, It\'s Image Size should be exactly double in compare with your normal Logo.', 'terme' ),
          'required' => array('logo_type', '=' , 'logo_image'),
          ),
          array(
              'id'       => 'site_name',
              'type'     => 'text',
              'title'    => __( 'Site Name', 'terme' ),
              'required' => array('logo_type', '=' , 'logo_name'),
              'default'=>'TermeTheme',

          ),
          array(
              'id'       => 'site_description',
              'type'     => 'text',
              'title'    => __( 'Site Description', 'terme' ),
              'required' => array('logo_type', '=' , 'logo_name'),
              'default'=>'Free Wordpress Template',
          ),
          array(
              'id'          => 'site_name_style',
              'type'        => 'typography',
              'title'       => __( 'Site Name Style', 'terme' ),
              'required' => array('logo_type', '=' , 'logo_name'),

              //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
              'google'      => true,
              // Disable google fonts. Won't work if you haven't defined your google api key
              'font-backup' => true,
              // Select a backup non-google font in addition to a google font
              //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
              //'subsets'       => false, // Only appears if google is true and subsets not set to false
              //'font-size'     => false,
              //'line-height'   => false,
              'word-spacing'  => true,  // Defaults to false
              'letter-spacing'=> true,  // Defaults to false
              //'color'         => false,
              //'preview'       => false, // Disable the previewer
              'all_styles'  => true,
              // Enable all Google Font style/weight variations to be added to the page
              'output'      => array( '.logo>h1>a' ),
              // An array of CSS selectors to apply this font style to dynamically
              // 'compiler'    => array( 'logo>a-compiler' ),
              // An array of CSS selectors to apply this font style to dynamically
              'units'       => 'px',
              // Defaults to px
              'default'     => array(
                  'color'       => '#333',
                  'font-style'  => '700',
                  'font-family' => 'Abel',
                  'google'      => true,
                  'font-size'   => '33px',
                  'line-height' => '40px'
              ),
          ),
          array(
              'id'          => 'site_descriotion_style',
              'type'        => 'typography',
              'title'       => __( 'Site Description Style', 'terme' ),
              'required' => array('logo_type', '=' , 'logo_name'),

              //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
              //'google'      => false,
              // Disable google fonts. Won't work if you haven't defined your google api key
              'font-backup' => true,
              // Select a backup non-google font in addition to a google font
              //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
              //'subsets'       => false, // Only appears if google is true and subsets not set to false
              //'font-size'     => false,
              //'line-height'   => false,
              //'word-spacing'  => true,  // Defaults to false
              //'letter-spacing'=> true,  // Defaults to false
              //'color'         => false,
              //'preview'       => false, // Disable the previewer
              'all_styles'  => true,
              // Enable all Google Font style/weight variations to be added to the page
              'output'      => array( '.logo>h2' ),
              // An array of CSS selectors to apply this font style to dynamically
              // 'compiler'    => array( 'logo>a-compiler' ),
              // An array of CSS selectors to apply this font style to dynamically
              'units'       => 'px',
              // Defaults to px
              'default'     => array(
                  'color'       => '#333',
                  'font-style'  => '700',
                  'font-family' => 'Abel',
                  'google'      => true,
                  'font-size'   => '20px',
                  'line-height' => '0',
              ),
          ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Top Bar', 'terme' ),
        'id'         => 'top_bar',
        //'icon'  => 'el el-home'
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'hide_top_bar',
              'type'     => 'switch',
              'title'    => __( 'Hide Top Bar', 'terme' ),
              'default'  => true,
              'on'       => 'Yes',
              'off'      => 'No',
          ),
          array(
              'id'       => 'today_date_format',
              'type'     => 'text',
              'title'    => __( 'Today Date Format', 'terme' ),
              'default'  => 'F j, Y',
              'required' => array( 'hide_top_bar', '=', '0' ),
          ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Top Banner', 'terme' ),
        'id'         => 'top_banner',
        //'icon'  => 'el el-home'
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'top_banner_switch',
              'type'     => 'switch',
              'title'    => __( 'Top Banner', 'terme' ),
              'default'  => 0,
              'on'       =>  __('Enabled', 'terme'),
              'off'      =>  __('Disabled', 'terme'),
          ),
          array(
              'id'       => 'banner_type',
              'type'     => 'button_set',
              'title'    => __( 'Banner Type', 'terme' ),
              'required' => array( 'top_banner_switch', '=', '1' ),
              'options'  => array(
                  '1' => 'Image',
                  '2' => 'Custom'
              ),
              'default'  => '2'
          ),
          array(
          'id'=>'top_banner_img',
          'type' => 'media',
          'title' => __('Upload your logo image', 'framework'),
          'width' => '460px',
          'height' => '60px',
          'default'=>'',
          'required' => array( 'banner_type', '=', '1' ),
          ),
          array(
              'id'      => 'top_banner_link',
              'type'    => 'text',
              'title'   => __( 'URL Link', 'terme' ),
              'default'  => 'test@test.com',
              'required' => array( 'banner_type', '=', '1' ),
          ),
          array(
              'id'      => 'banner_custom_content',
              'type'    => 'text',
              'title'   => __( 'Custom Content', 'terme' ),
              'default'  => 'test@test.com',
              'required' => array( 'banner_type', '=', '2' ),
          ),
          array(
            'id'       => 'bg_banner_custom_content',
            'type'     => 'color',
            'title'    => __('Background Color', 'terme'),
            'validate' => 'color',
            'required' => array( 'banner_type', '=', '2' ),
            'output'    => array(
                'background-color' => '.header_ads>a',
            )
        ),
          array(
            'id'       => 'txt_banner_custom_content',
            'type'     => 'color',
            'title'    => __('Text Color', 'terme'),
            'validate' => 'color',
            'required' => array( 'banner_type', '=', '2' ),
            'output'    => array(
                'color'            => '.header_ads>a',
            )

        ),

        ),
    ) );


    // -> START Footer Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Settings', 'terme' ),
        'id'               => 'footer_settings',
        'desc'             => __( 'The footer uses sidebars to show information. To add content to the footer head go to the widgets section and drag widget to the Footer 1, Footer 2, Footer 3 and Footer 4 sidebars.', 'terme' ),
        'customizer_width' => '500px',
        'icon'             => 'el el-screen',
        'fields'     => array(
          array(
              'id'       => 'footer_layout',
              'type'     => 'image_select',
              'title'    => __( 'Footer Layout', 'terme' ),
              'subtitle' => __( 'Set the footer template', 'terme' ),
              'options'  => array(
                  '1' => array(
                      'alt' => '1 Column',
                      'img' => get_template_directory_uri().'/assets/admin/images/footer_01.png',
                  ),
                  '2' => array(
                      'alt' => '2 Column Left',
                      'img' => get_template_directory_uri().'/assets/admin/images/footer_02.png',
                  ),
                  '3' => array(
                      'alt' => '2 Column Right',
                      'img' => get_template_directory_uri().'/assets/admin/images/footer_03.png',
                  ),
                  '4' => array(
                      'alt' => '3 Column Middle',
                      'img' => get_template_directory_uri().'/assets/admin/images/footer_04.png',
                  ),
                  '5' => array(
                      'alt' => '3 Column Left',
                      'img' => get_template_directory_uri().'/assets/admin/images/footer_05.png',
                  ),

              ),
              'default'  => '1'
          ),
            array(
                'id'       => 'email_footer',
                'type'     => 'text',
                'title'    => __( 'Footer Email', 'terme' ),
                'default'  => 'info@termetheme.com',
            ),
            array(
                'id'       => 'copyright-footer',
                'type'     => 'switch',
                'title'    => __( 'Footer Copyright', 'terme' ),
                'subtitle' => __( 'Show or hide the Footer Copyright', 'terme' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-text',
                'type'     => 'textarea',
                'title'   => __( 'Footer Copyright Text', 'terme' ),
                'default' => 'Copyright © 2016 <a href="http://termetheme.com">TermeTheme.com </a>',
                'required' => array('copyright-footer', '=' , 1),
            ),
            array(
                'id'       => 'Social_icon_footer',
                'type'     => 'switch',
                'title'    => __( 'Footer Social Icons', 'terme' ),
                'subtitle' => __( 'Show or hide the social icons, to setup the Social icons go to Social Networks', 'terme' ),
                'default'  => true,
            ),
        ),
    ) );
    // -> START Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Woocommerce Settings', 'terme' ),
        'id'               => 'woocommerce_settings',
        'customizer_width' => '500px',
        'icon'             => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'woocommerce_column',
                'type'     => 'select',
                'title'    => __( 'WooCommerce Column', 'terme' ),
                'options' => array(
                    'column_3' => __('3 Column', 'terme'),
                    'column_4' => __('4 Column', 'terme'),
                    ),
                'default' => 'column_3',
            ),
            array(
                'id'       => 'is_on_sale',
                'type'     => 'switch',
                'title'    => __( 'Sale Section', 'terme' ),
                'subtitle' => __( 'Enabling this option will add a Sale Section for Products are in sell', 'terme' ),
                'default'  => true,
            ),
            array(
                'id'       => 'is_on_sale_title',
                'type'     => 'text',
                'title'    => __( 'Sale Title', 'terme' ),
                'default'  => 'Sale',
                'required' => array( 'is_on_sale', "=", 1 ),
            ),
        ),
    ) );
    // -> Custom CSS & JS
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Custom CSS & JS', 'terme' ),
        'id'               => 'custom_css_js',
        'customizer_width' => '400px',
        'icon'             => 'el el-css',
        'fields' => array(
          array(
              'id'       => 'custom_css',
              'type'     => 'textarea',
              'title'    => __( 'Custom Css', 'terme' ),
              'subtitle' => __( 'The following code will add to the head tag. Useful if you need to add additional codes such as CSS.', 'terme' ),

          ),
          array(
              'id'       => 'custom_js',
              'type'     => 'textarea',
              'title'    => __( 'Custom Js', 'terme' ),
              'subtitle' => __( 'The following code will add to the footer before the closing body tag. Useful if you need to add Javascript or tracking code.', 'terme' ),
          ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Responsive CSS', 'terme' ),
        'id'               => 'responsive_css',
        'icon'             => 'el el-resize-full',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Paste your custom css in the appropriate box, to run only on a specific device', 'terme' ),
        'fields'           => array(
          array(
              'id'       => 'large_desktop',
              'type'     => 'textarea',
              'title'    => __( 'Large Desktop', 'terme' ),
              'subtitle' => __( '+ 1200px', 'terme' ),
          ),
          array(
              'id'       => 'desktop',
              'type'     => 'textarea',
              'title'    => __( 'Desktop', 'terme' ),
              'subtitle' => __( '992px ~ 1200px', 'terme' ),
          ),
          array(
              'id'       => 'tablet',
              'type'     => 'textarea',
              'title'    => __( 'Tablet', 'terme' ),
              'subtitle' => __( '768px ~ 992px', 'terme' ),
          ),
          array(
              'id'       => 'mobile',
              'type'     => 'textarea',
              'title'    => __( 'Mobile', 'terme' ),
              'subtitle' => __( '0 ~ 768px', 'terme' ),
          ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Advanced CSS', 'terme' ),
        'id'               => 'advanced_css',
        'icon'             => 'el el-puzzle',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
          array(
              'id'       => 'custom_body_class',
              'type'     => 'text',
              'title'    => __( 'Homepage Custom Body Class', 'terme' ),
              'subtitle' => __( 'This classes will be added in body of all Homepage.', 'terme' ),
'desc'     => __( 'Separate classes with space', 'terme' ),

          ),
          array(
              'id'       => 'categories_class',
              'type'     => 'text',
              'title'    => __( 'Categories Custom Body Class', 'terme' ),
              'subtitle' => __( 'This classes will be added in body of all categories.', 'terme' ),
              'desc'     => __( 'Separate classes with space', 'terme' ),
          ),

          array(
              'id'       => 'authors_class',
              'type'     => 'text',
              'title'    => __( 'Authors Custom Body Class', 'terme' ),
              'subtitle' => __( 'This classes will be added in body of all authors.', 'terme' ),
'desc'     => __( 'Separate classes with space', 'terme' ),

          ),
          array(
              'id'       => 'posts_class',
              'type'     => 'text',
              'title'    => __( 'Posts Custom Body Class', 'terme' ),
              'subtitle' => __( 'This classes will be added in body of all posts.', 'terme' ),
'desc'     => __( 'Separate classes with space', 'terme' ),

          ),
          array(
              'id'       => 'pages_class',
              'type'     => 'text',
              'title'    => __( 'Pages Custom Body Class', 'terme' ),
              'subtitle' => __( 'This classes will be added in body of all pages.', 'terme' ),
'desc'     => __( 'Separate classes with space', 'terme' ),

          ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'terme' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'terme' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'terme' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'terme' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'terme' ),
                'customizer_only' => true,
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'terme' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'terme' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'terme' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
