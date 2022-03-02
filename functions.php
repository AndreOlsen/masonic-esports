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
         * 
         * @since 1.0.0
         */
        function masonic_theme_setup() {
            // Make theme translatable.
            load_theme_textdomain('masonic-esports');

            // Let WordPress manage site title.
            add_theme_support('title-tag');

            // Add custom logo support.
            add_theme_support('custom-logo', array(
                'height'      => 180,
                'width'       => 180,
                'flex-height' => true,
                'flex-width'  => true
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
         * 
         * @since 1.0.0
         */
        function masonic_enqueue_styles() {
            wp_enqueue_style('masonic-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
        }

    endif;

    add_action('wp_enqueue_scripts', 'masonic_enqueue_styles');

    if(!function_exists('masonic_enqueue_scripts')) :

        /**
         * Enqueue theme scripts.
         * 
         * @since 1.0.0
         */
        function masonic_enqueue_scripts() {
            wp_enqueue_script('header-scroll', get_stylesheet_directory_uri() . '/assets/js/header-scroll.js', array(), wp_get_theme()->get('Version'));
            wp_enqueue_script('mobile-menu', get_stylesheet_directory_uri() . '/assets/js/mobile-menu.js', array(), wp_get_theme()->get('Version'));
            wp_enqueue_script('login-form', get_stylesheet_directory_uri() . '/assets/js/login-form.js', array(), wp_get_theme()->get('Version'));
            wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax-script.js', array('jquery'), wp_get_theme('Version'));
            wp_localize_script('ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
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
    // WooCommerce exclusive settings.
    require 'inc/woocommerce-settings.php';

    if(!function_exists('disable_embeds_filter_oembed_response_data_')) :

        /**
         * Disable oEmbeds author name & author url ~ Stops Showing in embeds
         * 
         * @since 1.0.0
         */
        function disable_embeds_filter_oembed_response_data_($data) {
            unset($data['author_url']);
            unset($data['author_name']);
            return $data;
        }

    endif;

    add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );

    // Add featured image support to custom post types.
    add_post_type_support( 'partners', 'thumbnail' );
    add_post_type_support( 'players', 'thumbnail' );
    add_post_type_support( 'management', 'thumbnail' );

    if(!function_exists('cpt_init')) :

        /**
         * Register custom post types.
         * 
         * @since 1.0.0
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
                'public'             => true,
                'publicly_queryable' => true,
                'menu_icon'          => 'dashicons-businessman',
                'show_in_rest'       => true,
                'hierarchical'       => true
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
                'show_ui'      => true,
                'menu_icon'    => 'dashicons-groups',
                'show_in_rest' => true
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
                    'show_tagcloud'     => false,
                    'show_admin_column' => true,
                    'show_in_rest'      => true
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
                'public'             => true,
                'publicly_queryable' => false,
                'menu_icon'          => 'dashicons-businessperson',
                'show_in_rest'       => true
            );

            register_post_type('management', $args);
        }

    endif;

    add_action('init', 'cpt_init');

    if(!function_exists('register_menus')) :

        /**
         * Register menu areas.
         * 
         * @since 1.0.0
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
         * 
         * @since 1.0.0
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

    if(!function_exists('get_social_icons')) :

    /**
     * Gets the social icons by name => url.
     * 
     * @since 1.1.5
     */
    function get_social_icons($socials) {
        $html = '';
            foreach($socials as $social => $url) {
                if(empty($url)) continue;

                $html .= '<a class="player__social player__social--' . $social . '" href="' . $url . '" target="_blank"><i class="fab fa-' . $social . '"></i></a>';
            }

        return $html;
    }

    endif;

    if(!function_exists('add_latest_posts')) :

        /**
         * Register shortcode which returns latest posts. 
         * Defaults to showing 4 posts.
         *
         * @param array $atts
         * @return string
         */
        function add_latest_posts($atts) {
            $numberposts = shortcode_atts(array(
                'numberposts' => 4,
            ), $atts);

            $latest_posts = new WP_Query(array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'orderby'        => 'post_date',
                'order'          => 'DESC',
                'posts_per_page' => $numberposts['numberposts']
            ));

            $html = '';
            if($latest_posts->have_posts()) :
                $html .= '<section class="posts-grid">';
                while($latest_posts->have_posts()) :
                    $latest_posts->the_post();
                    ob_start();
                    get_template_part('template-parts/post/content');
                    $html .= ob_get_contents();
                    ob_end_clean();
                endwhile;
                $html .= '</section>';
            endif;

            return $html;
        }

    endif;

    add_shortcode('latest_posts', 'add_latest_posts');

    if(!function_exists('get_post_by_category')) :

        /**
         * Handle ajax call for sorting posts by categories.
         *
         * @since 1.1.6
         */
        function get_post_by_category() {
            $args = array(
                'post_type'       => 'post',
                'posts_per_page'  => -1,
                'orderby'         => 'post_date',
                'order'           => 'DESC',
                'post__not_in'    => array(intval($_POST['lastest_post_id']))
            );

            if(intval($_POST['term_id']) !== 0) {
                $args['cat'] = intval($_POST['term_id']);
            }

            $sorted_posts = new WP_Query($args);

            $html = '';
            if($sorted_posts->have_posts()) :
                while($sorted_posts->have_posts()) :
                    $sorted_posts->the_post();
                    ob_start();
                    get_template_part('template-parts/post/content');
                    $html .= ob_get_contents();
                    ob_end_clean();
                endwhile;
            endif;
            wp_reset_postdata();

            
            if(!empty($html)) {
                wp_send_json_success(array(
                    'html' => $html
                ));
            } else {
                wp_send_json_error();
            }
        }       

    endif;

    add_action('wp_ajax_nopriv_get_post_by_category', 'get_post_by_category');
    add_action('wp_ajax_get_post_by_category', 'get_post_by_category');

    if(!function_exists('theme_current_type_nav_class')) :

        /**
         * Makes a custom post type able to be parent of their posts.
         *
         * @since 1.1.9
         * 
         * @param  array $css_class
         * @param  object $page
         * @return array
         */
        function theme_current_type_nav_class($css_class, $page) {
            static $custom_post_types, $post_type;

            if(empty($custom_post_types))
                $custom_post_types = get_post_types(array('_builtin' => false));
        
            if(empty($post_type))
                $post_type = get_post_type();
            
            if('page' == $page->object && in_array($post_type, $custom_post_types)) {
                $css_class = array_filter($css_class, function($el) {
                    return $el !== "current_page_parent";
                });

                if(!empty(stristr($page->url, $post_type)))
                    array_push($css_class, 'current_page_parent');
            }
        
            return $css_class;
        }

    endif;

    add_filter('nav_menu_css_class', 'theme_current_type_nav_class', 1, 2);