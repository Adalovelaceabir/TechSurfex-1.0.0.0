<?php get_header(); ?>

<section class="news-grid" style="width:100%; padding-right:0;">
    <h2 class="section-title"><?php single_cat_title(); ?></h2>
    
    <div class="grid-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="news-card">
                <div class="card-image">
                    <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
                    <span class="category-badge <?php $cats = get_the_category(); if($cats) echo newsportal_cat_class($cats[0]->name); ?>">
                        <?php $cats = get_the_category(); if($cats) echo esc_html($cats[0]->name); ?>
                    </span>
                </div>
                <div class="card-content">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="meta">
                        <span class="date"><?php echo get_the_date(); ?></span>
                    </div>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'newsportal'); ?></a>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
    
    <?php newsportal_pagination(); ?>
    
    <?php else : ?>
        <p><?php _e('No posts in this category.', 'newsportal'); ?></p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
