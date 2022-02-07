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
    <?php if('post' === get_post_type()) : ?>
        
        <div class="post-single__spacer"></div>

        <article <?php post_class('post-single'); ?>>
            <?php if($banner_url) : ?>
                <figure class="post-single__featured-image" style="background-image:url(<?php echo $banner_url ?>); "></figure>
            <?php endif; ?>
            
            <?php
                if(have_posts()) :
                    while(have_posts()) : 
                        the_post();

                        get_template_part('template-parts/post/content', 'single');
                    endwhile; 
                endif;
            ?>
        </article>

        <section class="other-news">
            <h2><?php _e('Other News', 'masonic_esports'); ?></h2>

            <section class="posts-grid">
                <?php
                    $other_news = new Wp_Query(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'post__not_in'   => array(get_the_ID())
                    ));

                    if($other_news->have_posts()) :
                        while($other_news->have_posts()) :
                            $other_news->the_post();
                            get_template_part('template-parts/post/content');
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </section>
        </section>

    <?php 
    else: 
        if(have_posts()) :
            while(have_posts()) : 
                the_post();
                the_content();
            endwhile; 
        endif; 
    endif; 
         
get_footer();