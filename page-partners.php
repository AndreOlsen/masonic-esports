<?php
/**
 * Template for displaying custom post type Partners page.
 * 
 * @package Masonic
 * @version 1.1.5
 */

get_header();

if(have_posts()) {
    while(have_posts()) {
        the_post();
        the_content();
        
        $partners = get_posts(
            array(
                'post_type'   => 'partners',
                'numberposts' => -1,
                'post_status' => 'publish'
            )
        );

        if(!empty($partners)) :
            echo '<section class="partners reading-width">';

            foreach($partners as $partner) :
    ?>


                <article class="partners__partner">
                    <a class="partner__link" href="<?php the_permalink($partner); ?>">
                        <figure class="partner__image" style="background-image: url('<?php echo get_the_post_thumbnail_url($partner, 'large'); ?>')"></figure>
                    </a>
                </article>


    <?php 
            endforeach;

            echo '</section>';
        endif;  
    }
}

get_footer();