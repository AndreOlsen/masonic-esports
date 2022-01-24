<?php 
/**
 * Template for displaying posts.
 * 
 * @package Masonic
 * @version 1.0.0
 */

get_header(); 

$categories = get_categories();
?>

    <section class="posts-container">

        <?php get_template_part('template-parts/post/content', 'full-width'); ?>

        <section class="posts-grid">
            <?php
                if(have_posts()) : while(have_posts()) : the_post();
                    if($GLOBALS['wp_query']->current_post !== (int) 0 && $GLOBALS['page'] === (int) 1 ? true : false) :
                        get_template_part('template-parts/post/content', 'grid');
                    endif;
                endwhile; else:
                    esc_html_e('Ingen nyheder fundet.', 'masonic-esports');
                endif;
            ?>
        </section>
       
    <section>

<?php get_footer(); ?>