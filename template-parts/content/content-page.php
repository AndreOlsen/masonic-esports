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

    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'taxonomy' => 'teams',
    ) );

    if(!empty($categories)) :
        echo '<section class="teams">';

        foreach($categories as $category) :
            echo '<section class="teams__team">';
            echo '<section class="team__headline">';
            echo '<h2>' . $category->name . '</h2>';  
            echo '</section>';

            $players = get_posts(
                array(
                    'post_type'   => 'players',
                    'numberposts' => -1,
                    'post_status' => 'publish',
                    'fields'      => 'ids',
                    'tax_query'   => [
                        [
                            'taxonomy' => 'teams',
                            'terms'    => $category->term_id,
                        ],
                    ],
                )
            );
            
            if(!empty($players)) :
                echo '<section class="team__players">';

                foreach($players as $player_id) :
                    $image_id = get_field('player_image', $player_id);
?>


                    <article class="player">
                        <h3 class="player__ign"><?php the_field('player_ign', $player_id); ?></h3>
                        <!-- <?php echo wp_get_attachment_image($image_id, 'medium'); ?> -->
                        <!-- <img src="" alt="<?php /* echo get_the_title($player_id); */ ?>"> -->
                        <figure class="player__image" style="background-image: url('<?php the_field('player_image', $player_id); ?>')"></figure>
                        <div class="player__meta">
                            <h3 class="player__name"><?php echo get_the_title($player_id); ?></h3>
                            <p class="player__role"><?php the_field('player_role', $player_id); ?></p>
                            <p class="player__nationality"><?php the_field('player_nationality', $player_id); ?></p>
                            <div class="player__social">
                                <?php echo \get_social_icons(get_field('player_socials', $player_id)); ?>
                            </div>
                        </div>
                    </article>


<?php           endforeach; // End players.

                echo '</section>';
            endif;

            echo '</section>';
        endforeach; // End categories.

        echo '</section>';
    endif;

endif;
?>
