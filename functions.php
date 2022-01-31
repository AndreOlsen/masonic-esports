<?php 
/**
 * Masonic functions and definitions
 *
 * @package Masonic
 * @since 1.0.0
 */


    if(!function_exists('masonic_theme_setup')) :
        /**
         * Add WordPress functions support to theme.
         */
        function masonic_theme_setup() {
            // Let WordPress manage site title.
            add_theme_support('title-tag');

            // Add custom logo support.
            add_theme_support('custom-logo', array(
                'height'      => 120,
                'width'       => 90,
                'flex-height' => true,
                'flex-width'  => true, 
            ));
        
            // Enable thumbnail support for posts and pages.
            add_theme_support('post-thumbnails');
            
            // Add support for full and wide align images.
            add_theme_support('align-wide');
            
            // Add support for responsive embeds.
            add_theme_support('responsive-embeds');
            
            // Add support for custom line height controls.
            add_theme_support('custom-line-height');
            
            // Add support for experimental link color control.
            add_theme_support('experimental-link-color');
            
            // Add support for experimental cover block spacing.
            add_theme_support('custom-spacing');
            
            // Make theme translatable.
            load_theme_textdomain('masonic-esports');

            // Add support for Block Styles.
            add_theme_support('wp-block-styles');
            
            // Add support for editor styles.
            add_theme_support('editor-styles');

            // Enqueue editor styles.
            add_editor_style('assets/css/style-editor.css');
            
            // Pre-defined colors.
            $masonic_blue         = '#0E1626';
            $masonic_purple       = '#57009B';
            $masonic_pink         = '#872783';
            $masonic_lighter_blue = '#2E3186';
            $ghost_white          = '#F8F8FF';
            $black                = '#000000';

            // Custom background color.
		    add_theme_support('custom-background', array('default-color' => $masonic_blue));
            
            // Block editor color palette.
            add_theme_support(
                'editor-color-palette',
                array(
                    array(
                        'name'  => __('Masonic Blue', 'masonic_esports'),
                        'slug'  => 'masonic-blue',
                        'color' => $masonic_blue
                    ),
                    array(
                        'name'  => __('Masonic Lighter Blue', 'masonic_esports'),
                        'slug'  => 'masonic-lighter-blue',
                        'color' => $masonic_lighter_blue
                    ),
                    array(
                        'name'  => __('Masonic Purple', 'masonic_esports'),
                        'slug'  => 'masonic-purple',
                        'color' => $masonic_purple
                    ),
                    array(
                        'name'  => __('Masonic Pink', 'masonic_esports'),
                        'slug'  => 'masonic-pink',
                        'color' => $masonic_pink
                    ),
                    array(
                        'name'  => __('Ghost White', 'masonic_esports'),
                        'slug'  => 'ghost-white',
                        'color' => $ghost_white
                    ),
                    array(
                        'name'  => __('Black', 'masonic_esports'),
                        'slug'  => 'black',
                        'color' => $black
                    )
                )
            );

            // Block editor gradient palette.
            add_theme_support(
                'editor-gradient-presets',
                array(
                    array(
                        'name'     => __('Pink to Blue', 'masonic_esports'),
                        'slug'     => 'pink-to-blue',
                        'gradient' => 'linear-gradient(200deg, ' . $masonic_pink . ' 0%, ' . $masonic_lighter_blue . ' 100%)'
                    )
                )
            );
        }

    endif;

    add_action('after_setup_theme', 'masonic_theme_setup');

    if(!function_exists('masonic_enqueue_styles')) :

        /**
         * Enqueue theme styles.
         */
        function masonic_enqueue_styles() {
            wp_enqueue_style('masonic-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
        }

    endif;

    add_action('wp_enqueue_scripts', 'masonic_enqueue_styles');

    if(!function_exists('masonic_enqueue_scripts')) :

        /**
         * Enqueue theme scripts.
         */
        function masonic_enqueue_scripts() {
            wp_enqueue_script('header-scroll', get_stylesheet_directory_uri() . '/assets/js/header-scroll.js', array(), wp_get_theme()->get('Version'));
            wp_enqueue_script('mobile-menu', get_stylesheet_directory_uri() . '/assets/js/mobile-menu.js', array(), wp_get_theme()->get('Version'));
        }

    endif;

    add_action('wp_enqueue_scripts', 'masonic_enqueue_scripts');

    if(!function_exists('masonic_preload_webfonts')) :

        /**
         * Preloads the main web font to improve performance.
         *
         * @since 1.0.0
         */
        function masonic_preload_webfonts() {
            ?>
            <link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/D-DIN-PRO-400-Regular.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
            <?php
        }
    
    endif;

    add_action('wp_head', 'masonic_preload_webfonts');

    // Block patterns.
    require 'inc/masonic-patterns.php';

    add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );

    // Add featured image support to custom post types.
    add_post_type_support( 'partners', 'thumbnail' );
    add_post_type_support( 'players', 'thumbnail' );
    add_post_type_support( 'management', 'thumbnail' );

    if(!function_exists('cpt_init')) :

        /**
         * Register custom post types.
         */
        function cpt_init() {

            // Partners.
            $args = array(
                'labels' => array(
                    'name'          => _x('Partners', 'Post Type General Name', 'masonic-esports'),
                    'singular_name' => _x('Partner', 'Post Type Singular Name', 'masonic-esports'),
                    'all_items'     => __('All Partners', 'masonic-esports'),
                    'view_item'     => __('View Partner', 'masonic-esports'),
                    'add_new_item'  => __('Add New Partner', 'masonic-esports'),
                ),
                'public'              => true,
                'publicly_queryable'  => true,
                'menu_icon'           => 'dashicons-businessman',
                'show_in_rest'        => true
            );

            register_post_type('partners', $args);

            // Players.
            $args = array(
                'labels' => array(
                    'name'          => _x('Players', 'Post Type General Name', 'masonic-esports'),
                    'singular_name' => _x('Player', 'Post Type Singular name', 'masonic-esports'),
                    'all_items'     => __('All Players', 'masonic-esports'),
                    'view_item'     => __('View Player', 'masonic-esports'),
                    'add_new_item'  => __('Add New Player', 'masonic-esports'),
                ),
                'public'              => true,
                'publicly_queryable'  => true,
                'menu_icon'           => 'dashicons-groups',
                'show_in_rest'        => true
            );

            register_post_type('players', $args);

            // Teams taxonomy for Players cpt.
            register_taxonomy(
                'teams',
                'players',
                array(
                    'labels' => array(
                        'name'          => __('Teams', 'masonic-esports'),
                        'singular_name' => __('Team','masonic-esports'),
                        'add_new_item'  => 'New team',
                        'new_item_name' => 'New team',
                    ),
                    'show_ui'       => true,
                    'show_tagcloud' => false,
                    'hierarchical'  => true
                )
            );

            // Management.
            $args = array(
                'labels' => array(
                    'name'          => _x('Management', 'Post Type General Name', 'masonic-esports'),
                    'singular_name' => _x('Management', 'Post Type Singular Name', 'masonic-esports'),
                    'all_items'     => __('All Managers', 'masonic-esports'),
                    'view_item'     => __('View Mangement', 'masonic-esports'),
                    'add_new_item'  => __('Add New Manager', 'masonic-esports'),
                ),
                'public'              => true,
                'has_archive'         => true,
                'menu_icon'           => 'dashicons-businessperson',
                'publicly_queryable'  => false,
            );

            register_post_type('management', $args);
        }

    endif;

    add_action('init', 'cpt_init');

    if(!function_exists('register_menus')) :

        /**
         * Register menu areas.
         */
        function register_menus() {
            register_nav_menus(
                array(
                    'main-menu-left'    => __('Main Menu Left', 'masonic_esports'),
                    'main-menu-right'   => __('Main Menu Right', 'masonic_esports'),
                    'footer-menu-left'  => __('Footer Menu Left', 'masonic_esports'),
                    'footer-menu-right' => __('Footer Menu Right', 'masonic_esports'),
                    'mobile-menu'       => __('Mobile Menu', 'masonic_esports')
                )
            );
        }

    endif;

    add_action('init', 'register_menus');

    if(!function_exists('register_widget_area')) :

        /**
         * Register widget areas.
         */
        function register_widget_area() {
            register_sidebar(
                array(
                    'id'            => 'socials_widget_area',
                    'name'          => esc_html__( 'Socials', 'masonic-esports' ),
                    'description'   => esc_html__( 'Area for social icons', 'masonic-esports' ),
                    'before_widget' => '',
                    'after_widget'  => ''
                )
            );
        }

    endif;

    add_action( 'widgets_init', 'register_widget_area' );