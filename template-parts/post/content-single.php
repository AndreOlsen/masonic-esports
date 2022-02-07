<article class="post-single__content">
    <div class="post-single__tagline">
        <h1 class="post-single__title"><?php the_title(); ?></h1>
        <ul class="post-single__meta">
            <li class="post-single__date"><?php echo get_the_date(); ?></li>
            <li class="post-single__category"><?php echo get_the_category()[0]->name; ?></li>
        </ul>
    </div>
    
    <div class="post-single__article">
        <?php the_content(); ?>
    </div>
</article>