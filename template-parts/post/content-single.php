<article class="post-single__content">
    <div class="post-single__tagline">
        <h1 class="post-single__title"><?php the_title(); ?></h1>
        <time class="post-single__date"><?php the_date(); ?></time>
    </div>
    
    <div class="post-single__article">
        <?php the_content(); ?>
    </div>
</article>