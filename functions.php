<?php 

    /**
     * Add WordPress functions support to theme.
     */
    if(!function_exists('masonic_theme_setup')) {
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

            // Make theme translatable.
            load_theme_textdomain('masonic-esports');

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

            add_theme_support('wp-block-styles');

            add_theme_support('dark-editor-style');
        }
    }

    add_action('after_setup_theme', 'masonic_theme_setup');

    /**
     * Enqueue theme styles.
     */
    function masonic_enqueue_styles() {
        wp_enqueue_style('masonic-style', get_stylesheet_uri(), array(), '1.0.0', 'all');
    }

    add_action('wp_enqueue_scripts', 'masonic_enqueue_styles');

    /**
     * Enqueue theme scripts.
     */
    function masonic_enqueue_scripts() {
        wp_enqueue_script('header-scroll', get_stylesheet_directory_uri() . '/assets/js/header-scroll.js', array(), '1.0.0');
    }

    add_action('wp_enqueue_scripts', 'masonic_enqueue_scripts');

    /**
     * Get template in output buffer.
     * 
     * @param  string $template_name  Template name.
     * @param  string $part_name      Part name.
     * @param  array  $args           Array of variable being passed to the template.
     * @return string                 Returns the template html.
     */
    function load_template_part($template_name, $part_name = NULL, $args = array()) {
        ob_start();
        get_template_part($template_name, $part_name, $args);
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }

    add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );

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

    add_action('init', 'cpt_init');

    /**
     * Register menu areas.
     */
    function register_menus() {
        register_nav_menus(
            array(
                'main-menu-left'    => __('Main Menu Left'),
                'main-menu-right'   => __('Main Menu Right'),
                'footer-menu-left'  => __('Footer Menu Left'),
                'footer-menu-right' => __('Footer Menu Right')
            )
        );
    }

    add_action('init', 'register_menus');

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

    add_action( 'widgets_init', 'register_widget_area' )
    
?>