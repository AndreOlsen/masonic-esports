<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package masonic
 * @since 1.0
 */

get_header();
?>

    <section class="error-404">
        <h1 class="error-404__title"><?php _e('404', 'masonic-esports'); ?></h1>
        <h2 class="error-404__subtitle"><?php _e('Page not found', 'masonic-esports'); ?></h2>
        <div class="error-404__spacer"></div>
        <p class="error-404__text"><?php _e("Either an error occurred or the page you're looking for doesn't exist anymore.", 'masonic-esports'); ?></p>
    </section>

<?php
get_footer();
