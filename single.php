<?php get_header(); ?>

<section class="featured-article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="featured">
            <div class="featured-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
                <span class="category-badge <?php $cats = get_the_category(); if($cats) echo newsportal_cat_class($cats[0]->name); ?>">
                    <?php $cats = get_the_category(); if($cats) echo esc_html($cats[0]->name); ?>
                </span>
            </div>
            <div class="featured-content">
                <h1><?php the_title(); ?></h1>
                <div class="meta">
                    <span class="author"><?php _e('By', 'newsportal'); ?> <?php the_author(); ?></span>
                    <span class="date"><?php echo get_the_date(); ?></span>
                    <span class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
                </div>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'newsportal'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>
        
        <?php comments_template(); ?>
        
    <?php endwhile; endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
