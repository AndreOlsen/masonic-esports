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
    <?php if(is_home()) : ?>
        <section class="posts-container">
            <section class="posts-hero">
                <?php get_template_part('template-parts/post/content', null, array('hero' => 'post--hero')); ?>
            </section>

            <ul class="posts-categories">
                <li class="post__category post__category__0 post__category--current"><?php _e('All', 'masonic_esports'); ?></li>
                <?php
                    foreach($categories as $category) {
                        echo '<li class="post__category post__category__'.$category->term_id.'">' . $category->name . '</li>';
                    }
                ?>
            </ul>

            <section class="posts-grid">
                <?php
                    if(have_posts()) : 
                        while(have_posts()) : 
                            the_post();
                            if($GLOBALS['wp_query']->current_post !== (int) 0 && $GLOBALS['page'] === (int) 1 ? true : false) :
                                get_template_part('template-parts/post/content');
                            endif;
                        endwhile; 
                    else:
                        esc_html_e('No news found.', 'masonic-esports');
                    endif;
                ?>
            </section>
        
        <section>
    <?php endif; ?>

<?php get_footer(); ?>