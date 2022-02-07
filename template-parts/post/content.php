<article class="post post-<?php the_ID(); ?> <?php echo !empty($args) ? $args['hero'] : ''; ?>">
    <a class="post__link" href="<?php the_permalink(); ?>">
        <div class="post__image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)">
            <div class="post__overlay">
                <h2 class="post__title"><?php the_title(); ?></h2>
                <ul class="post__meta">
                    <li class="post__date"><?php echo get_the_date(); ?></li>
                    <li class="post__category"><?php echo get_the_category()[0]->name; ?></li>
                </ul>
                <div class="post__readmore">
                    <p><?php _e('Read More', 'masonic_esports'); ?></p>
                    <i class="fas fa-angle-double-right"></i>
                </div>
            </div>
        </div>
    </a>
</article>