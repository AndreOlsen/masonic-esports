<?php 
/**
 * Template for displaying single posts.
 * 
 * @package Masonic
 * @version 1.0.0
 */

get_header(); 

$banner_url = has_post_thumbnail(get_the_id()) ? get_the_post_thumbnail_url(get_the_id(), 'full') : '';
?>
    <div class="post-single__spacer"></div>

    <article class="post-single">
        <?php if($banner_url) : ?>
            <figure class="post-single__featured-image" style="background-image:url(<?php echo $banner_url ?>); "></figure>
        <?php endif; ?>
        
        <?php
            if(have_posts()) : while(have_posts()) : the_post();
                get_template_part('template-parts/post/content-single');
            endwhile; else:
                esc_html_e('Ingen nyheder fundet.', 'masonic-esports');
            endif;
        ?>
    </article>

    <section>
        
    </section>

<?php get_footer(); ?>