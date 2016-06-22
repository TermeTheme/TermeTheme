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
        'menu_title'           => __( 'Sample Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Sample Options', 'redux-framework-demo' ),
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
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

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
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
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
     // -> START Homepage
     Redux::setSection( $opt_name, array(
         'title'            => __( 'Homepage', 'redux-framework-demo' ),
         'id'               => 'homepage',
         'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
         'customizer_width' => '400px',
         'icon'             => 'el el-home',
         'fields'           => array (
         array(
             'id'       => 'homepage_display',
             'type'     => 'select',
             'title'    => __( 'Default Homepage Display', 'redux-framework-demo' ),
             //Must provide key => value pairs for select options
             'options' => array(
                'blog' => __('Blog', 'framework'),
                ),
             'default' => 'blog',
         ),
         array(
             'id'       => 'homepage_layout',
             'type'     => 'select',
             'title'    => __( 'Default Homepage Layout Style', 'redux-framework-demo' ),
             //Must provide key => value pairs for select options
             'options' => array(
                'full_width' => __('Full Width', 'framework'),
                ),
             'default' => 'full_width',
         ),
         array(
             'id'            => 'number_of_posts_in_homepage',
             'type'          => 'slider',
             'title'         => __( 'Number Of Posts in Homepage', 'redux-framework-demo' ),
             "default" => "5",
             "min" 	=> "-1",
             "step"	=> "1",
             "max" 	=> "10",
             'desc' => __('-1 for show all posts', 'redux-framework-demo'),
         ),
       ),

     ) );

    // -> START General Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General Settings', 'redux-framework-demo' ),
        'id'               => 'general-settings',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-wrench',
        'fields'           => array(

          array(
              'id'       => 'scroll-to-top',
              'type'     => 'switch',
              'title'    => __( 'Scroll to Top Button', 'redux-framework-demo' ),
              'subtitle' => __( 'Enabling this option will add a "Back To Top" button to pages.', 'redux-framework-demo' ),
              'default'  => true,
          ),
          array(
              'id'       => 'newsticker',
              'type'     => 'switch',
              'title'    => __( 'NewsTicker', 'redux-framework-demo' ),
              'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
              'default'  => true,
              'on'       => 'Enabled',
              'off'      => 'Disabled',
          ),
          array(
              'id'       => 'favicon_16',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Favicon (16x16)', 'redux-framework-demo' ),
              // 'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'subtitle'     => __( 'Default Favicon. 16px x 16px', 'redux-framework-demo' ),
              // 'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'favicon_57',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Apple iPhone Icon (57x57)', 'redux-framework-demo' ),
              // 'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'subtitle'     => __( 'Icon for Classic iPhone', 'redux-framework-demo' ),
              // 'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'favicon_72',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Apple iPad Icon (72x72)', 'redux-framework-demo' ),
              'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'subtitle'     => __( 'Icon for Classic iPad', 'redux-framework-demo' ),
              // 'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'favicon_114',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Apple iPhone Retina Icon (114x114)', 'redux-framework-demo' ),
              // 'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'subtitle'     => __( 'Icon for Retina iPhone', 'redux-framework-demo' ),
              // 'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'favicon_144',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Apple iPad Retina Icon (144x144)', 'redux-framework-demo' ),
              // 'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'subtitle'     => __( 'Icon for Retina iPad', 'redux-framework-demo' ),
              // 'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'header-script',
              'type'     => 'textarea',
              'title'    => __( 'Header Script - HTML Validated Custom', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              // 'default'  => 'Default Text',
          ),
          array(
              'id'       => 'footer-script',
              'type'     => 'textarea',
              'title'    => __( 'Footer Script - HTML Validated Custom', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              // 'default'  => 'Default Text',
          ),
          array(
              'id'       => 'date_format',
              'type'     => 'text',
              'title'    => __( 'Date Format', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'F j, Y',
          ),
        )
    ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Post Settings', 'redux-framework-demo' ),
            'id'               => 'post_settings',
            'subsection'       => true,
            'customizer_width' => '450px',
            'desc'             => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
            'fields'           => array(
              array(
                  'id'       => 'post_breadcrumb',
                  'type'     => 'switch',
                  'title'    => __( 'Post Breadcrumb', 'redux-framework-demo' ),
                  'subtitle' => __( 'Breadcrumbs are a hierarchy of links displayed below the main navigation. They are displayed on all pages but the home-page.', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
              ),
              array(
                  'id'       => 'post_breadcrumb_seprator',
                  'type'     => 'text',
                  'title'    => __( 'Breadcrumb Seprator', 'redux-framework-demo' ),
                  'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'required' => array('post_breadcrumb', '=' , 1),

              ),
              array(
                  'id'    => 'post_meta_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-share',
                  'title' => __( 'Post Meta Options', 'redux-framework-demo' ),
                  // 'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
              ),
              array(
                  'id'       => 'post_meta',
                  'type'     => 'switch',
                  'title'    => __( 'Post Meta', 'redux-framework-demo' ),
                  'subtitle' => __( 'You can hide post meta ( date, author and comments ) inside single posts with enabling this option.', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
              ),
              array(
                  'id'       => 'post_date',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post Date', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
                  'required' => array('post_meta', '=' , 1),
              ),
              array(
                  'id'       => 'post_date_format',
                  'type'     => 'text',
                  'title'    => __( 'Post Date Format', 'redux-framework-demo' ),
                  'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => 'test@test.com',
                  'required' => array( 'post_date', '=', '1' ),

              ),
              array(
                  'id'       => 'post_category',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post Category', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
                  'required' => array('post_meta', '=' , 1),
              ),
              array(
                  'id'       => 'view_count',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post view Count', 'redux-framework-demo' ),
                  'subtitle' => __( 'You can hide post views count inside post meta info for all content listings with disabling this option.', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
                  'required' => array('post_meta', '=' , 1),
              ),
              array(
                  'id'       => 'comment_count',
                  'type'     => 'switch',
                  'title'    => __( 'Show Post Comment Count', 'redux-framework-demo' ),
                  'subtitle' => __( 'You can hide post comments count inside post meta info for all content listings with disabling this option.', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
                  'required' => array('post_meta', '=' , 1),
              ),
              array(
                  'id'       => 'section-start',
                  'type'     => 'section',
                  // 'title'    => __( 'Section Example', 'redux-framework-demo' ),
                  // 'subtitle' => __( 'With the "section" field you can create indented option sections.', 'redux-framework-demo' ),
                  'indent'   => true, // Indent all options below until the next 'section' option is set.
              ),




              array(
                  'id'     => 'section-end',
                  'type'   => 'section',
                  'indent' => false, // Indent all options below until the next 'section' option is set.
              ),
              array(
                  'id'       => 'post_tags',
                  'type'     => 'switch',
                  'title'    => __( 'Post Tags', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
              ),
              array(
                  'id'       => 'author_box',
                  'type'     => 'switch',
                  'title'    => __( 'Author Box', 'redux-framework-demo' ),
                  'subtitle' => __( 'You can hide post author inside post meta info for all content listings with disabling this option.', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
              ),
              array(
                  'id'       => 'post_comments',
                  'type'     => 'switch',
                  'title'    => __( 'Post Comments', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
              ),
              array(
                  'id'    => 'post_share_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-share',
                  'title' => __( 'Post Sharing Options', 'redux-framework-demo' ),
                  // 'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
              ),
              array(
                  'id'       => 'post_share',
                  'type'     => 'switch',
                  'title'    => __( 'Post Share', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       => 'Enabled',
                  'off'      => 'Disabled',
              ),
              array(
                  'id'       => 'section-start',
                  'type'     => 'section',
                  // 'title'    => __( 'Section Example', 'redux-framework-demo' ),
                  // 'subtitle' => __( 'With the "section" field you can create indented option sections.', 'redux-framework-demo' ),
                  'indent'   => true, // Indent all options below until the next 'section' option is set.
              ),
              array(
                  'id'       => 'facebook_share',
                  'type'     => 'switch',
                  'title'    => __( 'Facebook Share', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'twitter_share',
                  'type'     => 'switch',
                  'title'    => __( 'Twitter Share', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'pinterest_share',
                  'type'     => 'switch',
                  'title'    => __( 'Pinterest Share', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'tumblr_share',
                  'type'     => 'switch',
                  'title'    => __( 'Tumblr Share', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'wordpress_share',
                  'type'     => 'switch',
                  'title'    => __( 'Wordpress Share', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'       => 'print_share',
                  'type'     => 'switch',
                  'title'    => __( 'Print Icon', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
                  'required' => array('post_share', '=' , 1),
              ),
              array(
                  'id'     => 'section-end',
                  'type'   => 'section',
                  'indent' => false, // Indent all options below until the next 'section' option is set.
              ),
              array(
                  'id'    => 'related_posts_info',
                  'type'  => 'info',
                  'style' => 'success',
                  'icon'  => 'el el-link',
                  'title' => __( 'Related Posts Setting', 'redux-framework-demo' ),
                  // 'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
              ),
              array(
                  'id'       => 'related_posts',
                  'type'     => 'switch',
                  'title'    => __( 'Related Post', 'redux-framework-demo' ),
                  'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                  'default'  => true,
                  'on'       =>  __('Enabled', 'redux-framework-demo'),
                  'off'      =>  __('Disabled', 'redux-framework-demo'),
              ),
              array(
                  'id'            => 'related_number_of_posts',
                  'type'          => 'slider',
                  'title'         => __( 'Number of Posts', 'redux-framework-demo' ),
                  'subtitle'      => __( 'This slider displays the value as a label.', 'redux-framework-demo' ),
                  'desc'          => __( 'Slider description. Min: 1, max: 500, step: 1, default value: 250', 'redux-framework-demo' ),
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
                  'title'    => __( 'Select Option', 'redux-framework-demo' ),
                  'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
                  'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                  'required' => array( 'related_posts', '=', 1 ),
                  //Must provide key => value pairs for select options
                  'options'  => array(
                      '1' => 'Category',
                      '2' => 'tags',
                  ),
                  'default'  => '2'
              ),

            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Social Icons', 'redux-framework-demo' ),
            'id'               => 'social_icons',
            'subsection'       => true,
            'customizer_width' => '450px',
            'desc'             => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
            'fields'           => array(

              array(
                  'id'       => 'facebook',
                  'type'     => 'text',
                  'title'    => __( 'Facebook', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),
              array(
                  'id'       => 'twitter',
                  'type'     => 'text',
                  'title'    => __( 'Twitter', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),
              array(
                  'id'       => 'youtube',
                  'type'     => 'text',
                  'title'    => __( 'Youtube', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),
              array(
                  'id'       => 'instagram',
                  'type'     => 'text',
                  'title'    => __( 'Instagram', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),
              array(
                  'id'       => 'dribbble',
                  'type'     => 'text',
                  'title'    => __( 'Dribbble', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),
              array(
                  'id'       => 'rss',
                  'type'     => 'text',
                  'title'    => __( 'RSS', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),
              array(
                  'id'       => 'vimeo',
                  'type'     => 'text',
                  'title'    => __( 'Vimeo', 'redux-framework-demo' ),
                  'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                  'default'  => '#',
              ),

            )
        ) );

    // -> START Header Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Settings', 'redux-framework-demo' ),
        'id'               => 'header_settings',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
        'fields'     => array(
          array(
              'id'       => 'header_layout',
              'type'     => 'image_select',
              'title'    => __( 'header Layout', 'redux-framework-demo' ),
              'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
              'desc'     => __( 'This uses some of the built in images, you can use them for layout options.', 'redux-framework-demo' ),
              //Must provide key => value(array:title|img) pairs for radio options
              'options'  => array(
                  '1' => array(
                      'alt' => '1 Column',
                      'img' => ReduxFramework::$_url . 'assets/img/header/1.jpg',
                  ),
                  '2' => array(
                      'alt' => '2 Column Left',
                      'img' => ReduxFramework::$_url . 'assets/img/header/1.jpg'
                  ),
                  '3' => array(
                      'alt' => '2 Column Right',
                      'img' => ReduxFramework::$_url . 'assets/img/header/1.jpg'
                  ),
                  '4' => array(
                      'alt' => '3 Column Middle',
                      'img' => ReduxFramework::$_url . 'assets/img/header/1.jpg'
                  ),

              ),
              'default'  => '2'
          ),
          array(
              'id'       => 'logo_type',
              'type'     => 'select',
              'title'    => __( 'Select Logo type', 'redux-framework-demo' ),
              'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              //Must provide key => value pairs for select options
              'options' => array(
                  'logo_image' => __('Logo Image', 'framework'),
                  'logo_name' => __('Site Name', 'framework'),
                  ),
              'default' => 'logo_image',
          ),
          array(
          'id'=>'logo_img',
          'type' => 'media',
          'title' => __('Upload your logo image', 'framework'),
          'url'=> true,
          'default'=>'',
          'subtitle' => __( 'By default, a text-based logo is created using your site title. But you can also upload an image-based logo here.', 'redux-framework-demo' ),

          'required' => array('logo_type', '=' , 'logo_image'),
          ),
          array(
          'id'=>'retina_logo_img',
          'type' => 'media',
          'title' => __('Upload your retina logo image', 'framework'),
          'url'=> true,
          'default'=> 0,
          'subtitle' => __( 'If you want to upload a Retina Image, It\'s Image Size should be exactly double in compare with your normal Logo. It requires WP Retina 2x plugin.', 'redux-framework-demo' ),

          'required' => array('logo_type', '=' , 'logo_image'),
          ),
          array(
              'id'       => 'site_name',
              'type'     => 'text',
              'title'    => __( 'Site Name', 'redux-framework-demo' ),
              'subtitle' => __( 'The desired text will be used if logo images are not provided below.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
              'required' => array('logo_type', '=' , 'logo_name'),

          ),
          array(
              'id'       => 'site_description',
              'type'     => 'text',
              'title'    => __( 'Site Description', 'redux-framework-demo' ),
              'subtitle' => __( 'The desired text will be used if logo images are not provided below.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
              'required' => array('logo_type', '=' , 'logo_name'),

          ),
          array(
              'id'          => 'site_name_style',
              'type'        => 'typography',
              'title'       => __( 'Site Name Style', 'redux-framework-demo' ),
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
              'subtitle'    => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
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
              'title'       => __( 'Site Descriotion Style', 'redux-framework-demo' ),
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
              'subtitle'    => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
              'default'     => array(
                  'color'       => '#333',
                  'font-style'  => '700',
                  'font-family' => 'Abel',
                  'google'      => true,
                  'font-size'   => '33px',
                  'line-height' => '40px'
              ),
          ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Top Bar', 'redux-framework-demo' ),
        'id'         => 'top_bar',
        //'icon'  => 'el el-home'
        'desc'       => __( 'Enabling this will disable the top bar element that appears above the logo area.', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'hide_top_bar',
              'type'     => 'switch',
              'title'    => __( 'Hide Top Bar', 'redux-framework-demo' ),
              'subtitle' => __( 'Look, it\'s on! Also hidden child elements!', 'redux-framework-demo' ),
              'default'  => 0,
              'on'       => 'Yes',
              'off'      => 'No',
          ),
          array(
              'id'       => 'today_date_format',
              'type'     => 'text',
              'title'    => __( 'Today Date Format', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'F j, Y',
              'required' => array( 'hide_top_bar', '=', '0' ),
          ),


        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Top Banner', 'redux-framework-demo' ),
        'id'         => 'top_banner',
        //'icon'  => 'el el-home'
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'top_banner_switch',
              'type'     => 'switch',
              'title'    => __( 'Top Banner', 'redux-framework-demo' ),
              'subtitle' => __( 'Look, it\'s on! Also hidden child elements!', 'redux-framework-demo' ),
              'default'  => 0,
              'on'       => 'Enabled',
              'off'      => 'Disabled',
          ),

          array(
              'id'       => 'banner_type',
              'type'     => 'button_set',
              'title'    => __( 'Banner Type', 'redux-framework-demo' ),
              'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              'required' => array( 'top_banner_switch', '=', '1' ),
              //Must provide key => value pairs for radio options
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
          // 'url'=> true,
          'width' => '460px',
          'height' => '60px',
          'default'=>'',
          'required' => array( 'banner_type', '=', '1' ),
          ),
          array(
              'id'      => 'banner_custom_content',
              'type'    => 'text',
              'title'   => __( 'Custom Content', 'redux-framework-demo' ),
              'default'  => 'test@test.com',
              'required' => array( 'banner_type', '=', '2' ),

          ),
          array(
            'id'       => 'bg_banner_custom_content',
            'type'     => 'color',
            'title'    => __('Background Color', 'redux-framework-demo'),
            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
            'validate' => 'color',
            'required' => array( 'banner_type', '=', '2' ),
            'output'    => array(
                'background-color' => '.header_ads>a',
            )
        ),
          array(
            'id'       => 'txt_banner_custom_content',
            'type'     => 'color',
            'title'    => __('Text Color', 'redux-framework-demo'),
            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
            'validate' => 'color',
            'required' => array( 'banner_type', '=', '2' ),
            'output'    => array(
                'color'            => '.header_ads>a',
            )

        ),
        array(
            'id'       => 'close_button',
            'type'     => 'switch',
            'title'    => __( 'Close Button', 'redux-framework-demo' ),
            'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
            'default'  => true,
            'required' => array( 'banner_type', '=', '2' ),
        ),
        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
    ) );


    // -> START Footer Settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Settings', 'redux-framework-demo' ),
        'id'               => 'footer_settings',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
        'fields'     => array(
          array(
              'id'       => 'footer_layout',
              'type'     => 'image_select',
              'title'    => __( 'Footer Layout', 'redux-framework-demo' ),
              'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
              'desc'     => __( 'This uses some of the built in images, you can use them for layout options.', 'redux-framework-demo' ),
              //Must provide key => value(array:title|img) pairs for radio options
              'options'  => array(
                  '1' => array(
                      'alt' => '1 Column',
                      'img' => ReduxFramework::$_url . 'assets/img/footer/1.jpg',
                  ),
                  '2' => array(
                      'alt' => '2 Column Left',
                      'img' => ReduxFramework::$_url . 'assets/img/footer/2.jpg'
                  ),
                  '3' => array(
                      'alt' => '2 Column Right',
                      'img' => ReduxFramework::$_url . 'assets/img/footer/3.jpg'
                  ),
                  '4' => array(
                      'alt' => '3 Column Middle',
                      'img' => ReduxFramework::$_url . 'assets/img/footer/4.jpg'
                  ),
                  '5' => array(
                      'alt' => '3 Column Left',
                      'img' => ReduxFramework::$_url . 'assets/img/footer/5.jpg'
                  ),

              ),
              'default'  => '2'
          ),
            array(
                'id'       => 'copyright-footer',
                'type'     => 'switch',
                'title'    => __( 'Copyright Footer', 'redux-framework-demo' ),
                'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                'default'  => true,
            ),
            array(
                'id'      => 'footer-text',
                'type'    => 'editor',
                'title'   => __( 'Footer Text', 'redux-framework-demo' ),
                'default' => 'Powered by Redux Framework.',
                'required' => array('copyright-footer', '=' , 1),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'Social_icon_footer',
                'type'     => 'switch',
                'title'    => __( 'Footer Social Icons', 'redux-framework-demo' ),
                'subtitle' => __( 'Look, it\'s on!', 'redux-framework-demo' ),
                'default'  => true,
            ),



        ),
    ) );

    // -> API's Authentication
    Redux::setSection( $opt_name, array(
        'title'            => __( 'API\'s Authentication', 'redux-framework-demo' ),
        'id'               => 'api_authentication',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-opensource',
        'fields' => array(
          array(
              'id'    => 'facebook_access_token_info',
              'type'  => 'info',
              'style' => 'success',
              'icon'  => 'el el-facebook',
              'title' => __( 'This is a title.', 'redux-framework-demo' ),
              'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
          ),
          array(
              'id'       => 'facebook_access_token',
              'type'     => 'text',
              'title'    => __( 'Facebook Access Token', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'    => 'twitter_access_token_info',
              'type'  => 'info',
              'style' => 'success',
              'icon'  => 'el el-twitter',
              'title' => __( 'This is a title.', 'redux-framework-demo' ),
              'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
          ),
          array(
              'id'       => 'twitter_api_key',
              'type'     => 'text',
              'title'    => __( 'API Key', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'twitter_api_secret',
              'type'     => 'text',
              'title'    => __( 'API Secret', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'twitter_access_token',
              'type'     => 'text',
              'title'    => __( 'API Access Token', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'twitter_access_token_secret',
              'type'     => 'text',
              'title'    => __( 'API Access Token Secret', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'    => 'mailchimp_api_key_info',
              'type'  => 'info',
              'style' => 'success',
              'icon'  => 'el el-envelope-alt',
              'title' => __( 'This is a title.', 'redux-framework-demo' ),
              'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
          ),
          array(
              'id'       => 'mailchimp_api_key',
              'type'     => 'text',
              'title'    => __( 'Mailchimp API Key', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'    => 'google_api_key_info',
              'type'  => 'info',
              'style' => 'success',
              'icon'  => 'el el-googleplus',
              'title' => __( 'This is a title.', 'redux-framework-demo' ),
              'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
          ),
          array(
              'id'       => 'google_api_key',
              'type'     => 'text',
              'title'    => __( 'Google+ API Key', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'    => 'youtube_api_key_info',
              'type'  => 'info',
              'style' => 'success',
              'icon'  => 'el el-youtube',
              'title' => __( 'This is a title.', 'redux-framework-demo' ),
              'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
          ),
          array(
              'id'       => 'youtube_api_key',
              'type'     => 'text',
              'title'    => __( 'Youtube API Key', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'    => 'instagram_access_token_info',
              'type'  => 'info',
              'style' => 'success',
              'icon'  => 'el el-instagram',
              'title' => __( 'This is a title.', 'redux-framework-demo' ),
              'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' )
          ),
          array(
              'id'       => 'instagram_access_token',
              'type'     => 'text',
              'title'    => __( 'Instagram Access Token', 'redux-framework-demo' ),
              'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
              'desc'     => __( 'Field Description', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),


        )
    ) );

    // -> Custom CSS
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Custom CSS', 'redux-framework-demo' ),
        'id'               => 'custom_css',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-css',
        'fields' => array(
          array(
              'id'       => 'custom_css-code',
              'type'     => 'textarea',
              'title'    => __( 'Custom CSS Code', 'redux-framework-demo' ),
              'subtitle' => __( 'Paste your CSS code, do not include any tags or HTML in the field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'custom_body_class',
              'type'     => 'text',
              'title'    => __( 'Custom Body Class', 'redux-framework-demo' ),
              'subtitle' => __( 'This classes will be added in body of overall site.
Separate classes with space.
', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),



        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Responsive CSS', 'redux-framework-demo' ),
        'id'               => 'responsive_css',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Paste your custom css in the appropriate box, to run only on a specific device', 'redux-framework-demo' ),
        'fields'           => array(
          array(
              'id'       => 'large_desktop',
              'type'     => 'textarea',
              'title'    => __( 'Large Desktop', 'redux-framework-demo' ),
              'subtitle' => __( '1200px', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'desktop',
              'type'     => 'textarea',
              'title'    => __( 'Desktop', 'redux-framework-demo' ),
              'subtitle' => __( '992px ~ 1200px', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'tablet',
              'type'     => 'textarea',
              'title'    => __( 'Tablet', 'redux-framework-demo' ),
              'subtitle' => __( '768px ~ 992px', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'mobile',
              'type'     => 'textarea',
              'title'    => __( 'Mobile', 'redux-framework-demo' ),
              'subtitle' => __( '0 ~ 768px', 'redux-framework-demo' ),
              'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Advanced CSS', 'redux-framework-demo' ),
        'id'               => 'advanced_css',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
        'fields'           => array(
          array(
              'id'       => 'categories_class',
              'type'     => 'text',
              'title'    => __( 'Categories Custom Body Class', 'redux-framework-demo' ),
              'subtitle' => __( 'This classes will be added in body of all categories.
Separate classes with space.
', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'tags_class',
              'type'     => 'text',
              'title'    => __( 'Tags Custom Body Class', 'redux-framework-demo' ),
              'subtitle' => __( 'This classes will be added in body of all tags.
Separate classes with space.
', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'authors_class',
              'type'     => 'text',
              'title'    => __( 'Authors Custom Body Class', 'redux-framework-demo' ),
              'subtitle' => __( 'This classes will be added in body of all authors.
Separate classes with space.
', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'posts_class',
              'type'     => 'text',
              'title'    => __( 'Posts Custom Body Class', 'redux-framework-demo' ),
              'subtitle' => __( 'This classes will be added in body of all posts.
Separate classes with space.
', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
          array(
              'id'       => 'pages_class',
              'type'     => 'text',
              'title'    => __( 'Pages Custom Body Class', 'redux-framework-demo' ),
              'subtitle' => __( 'This classes will be added in body of all pages.
Separate classes with space.
', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
        )
    ) );
    // -> Analytics $ JS
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Analytics & JS' , 'redux-framework-demo' ),
        'id'               => 'analytics_js',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-graph',
        'fields' => array(
          array(
              'id'       => 'google_analytics_code',
              'type'     => 'textarea',
              'title'    => __( 'Google Analytics Code', 'redux-framework-demo' ),
              'subtitle' => __( 'Paste your Google Analytics (or other) tracking code here. This code will be placed before </body> tag in html. Please put code inside script tags.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),

          array(
              'id'       => 'code_before_head',
              'type'     => 'textarea',
              'title'    => __( 'Code Before head tag', 'redux-framework-demo' ),
              'subtitle' => __( 'This code will be placed before </head> tag in html. Useful if you have an external script that requires it.', 'redux-framework-demo' ),
              'default'  => 'Default Text',
          ),
        )
    ) );
    // -> Custom Fonts
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Custom Fonts' , 'redux-framework-demo' ),
        'id'               => 'custom_fonts',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-font',
        'fields' => array(
          array(
              'id'       => 'font_woff',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Font.woff', 'redux-framework-demo' ),
              'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'desc'     => __( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
              'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
              'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              'preview'  => false,
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'font_ttf',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Font.ttf', 'redux-framework-demo' ),
              'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'desc'     => __( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
              'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
              'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              'preview'  => false,
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'font_svg',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Font.svg', 'redux-framework-demo' ),
              'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'desc'     => __( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
              'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
              'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              'preview'  => false,
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),
          array(
              'id'       => 'font_eot',
              'type'     => 'media',
              'url'      => true,
              'title'    => __( 'Font.eot', 'redux-framework-demo' ),
              'compiler' => 'true',
              //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
              'desc'     => __( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
              'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
              'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
              'preview'  => false,
              //'hint'      => array(
              //    'title'     => 'Hint Title',
              //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
              //)
          ),

        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'redux-framework-demo' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'redux-framework-demo' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'redux-framework-demo' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'redux-framework-demo' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'redux-framework-demo' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
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
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
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
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
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
