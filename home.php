<?php 
/**
 * Template for displaying posts.
 * 
 * @package Masonic
 * @version 1.0.0
 */

get_header(); 
?>
    <?php if(is_home()) : ?>
        <section class="posts-container">

            <?php get_template_part('template-parts/post/content', null, array('post--hero')); ?>

            <section class="posts-grid">
                <?php
                    if(have_posts()) : while(have_posts()) : the_post();
                        if($GLOBALS['wp_query']->current_post !== (int) 0 && $GLOBALS['page'] === (int) 1 ? true : false) :
                            get_template_part('template-parts/post/content');
                        endif;
                    endwhile; else:
                        esc_html_e('Ingen nyheder fundet.', 'masonic-esports');
                    endif;
                ?>
            </section>
        
        <section>
    <?php endif; ?>

<?php get_footer(); ?>