<?php get_header(); ?>

<section class="featured-article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="featured">
            <div class="featured-content" style="width:100%;">
                <h1><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
