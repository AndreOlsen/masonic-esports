<?php

the_content();

if($post->post_name === 'partners') :

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
        wp_reset_postdata();

        echo '</section>';
    endif;
endif; 
?>
