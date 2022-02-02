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

        echo '</section>';
    endif;
    
elseif($post->post_name === 'teams') :
    /* $players = get_posts(
        array(
            'post_type'   => 'players',
            'numberposts' => -1,
            'post_status' => 'publish',
            'fields'      => 'ids'
        )
    ); */
    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'taxonomy' => 'teams',
        'hide_empty' => false,
    ) );

    echo '<pre>';

    if(!empty($categories)) :
        echo '<section>';

        foreach($categories as $category) :
            var_dump($category);
            //var_dump(get_the_category($player));
?>





<?php  
        endforeach;

        echo '<section>';
    endif;
endif;
?>
