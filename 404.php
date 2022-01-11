<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package masonic
 * @since 1.0
 */

get_header();
?>

    <main class="error-404 not-found">
        <h1><?php _e('404', 'masonic'); ?></h1>
        <p><?php _e('Page not found', 'masonic'); ?></p>
        <p><?php _e("Either an error occurred or the page you're looking for doesn't exist anymore.", 'masonic'); ?></p>
    </main>

<?php
get_footer();
