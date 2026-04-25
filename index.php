<?php get_header(); ?>

<!-- Featured Article (Latest Post) -->
<?php
$featured_args = array('posts_per_page' => 1);
$featured_query = new WP_Query($featured_args);
if ($featured_query->have_posts()) :
    while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
        <section class="featured-article">
            <article class="featured">
                <div class="featured-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featured-news.jpg" alt="Featured News">
                    <?php endif; ?>
                    <span class="category-badge <?php $categories = get_the_category(); if($categories) echo newsportal_cat_class($categories[0]->name); ?>">
                        <?php $categories = get_the_category(); if($categories) echo esc_html($categories[0]->name); ?>
                    </span>
                </div>
                <div class="featured-content">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="meta">
                        <span class="author"><?php _e('By', 'newsportal'); ?> <?php the_author(); ?></span>
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <span class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
                    </div>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'newsportal'); ?></a>
                </div>
            </article>
        </section>
    <?php endwhile;
    wp_reset_postdata();
endif;
?>

<!-- Sidebar (left side in original, but we output sidebar after featured) -->
<?php get_sidebar(); ?>

<!-- News Grid -->
<section class="news-grid">
    <h2 class="section-title"><?php _e('Latest News', 'newsportal'); ?></h2>
    
    <!-- Mid Content Ad -->
    <?php if (is_active_sidebar('ad-mid')) : ?>
        <?php dynamic_sidebar('ad-mid'); ?>
    <?php else : ?>
        <div class="ad-banner mid-banner">
            <div class="ad-placeholder" data-ad-size="728x90">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ad-placeholder-728x90.jpg" alt="Ad">
            </div>
        </div>
    <?php endif; ?>
    
    <div class="grid-container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $main_query = new WP_Query(array(
            'posts_per_page' => 6,
            'paged'          => $paged,
            'offset'         => 1, // Skip featured post
        ));
        
        if ($main_query->have_posts()) :
            while ($main_query->have_posts()) : $main_query->the_post(); ?>
                <article class="news-card">
                    <div class="card-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/news-placeholder.jpg" alt="News">
                        <?php endif; ?>
                        <span class="category-badge <?php $cats = get_the_category(); if($cats) echo newsportal_cat_class($cats[0]->name); ?>">
                            <?php $cats = get_the_category(); if($cats) echo esc_html($cats[0]->name); ?>
                        </span>
                    </div>
                    <div class="card-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="meta">
                            <span class="author"><?php _e('By', 'newsportal'); ?> <?php the_author(); ?></span>
                            <span class="date"><?php echo get_the_date(); ?></span>
                        </div>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'newsportal'); ?></a>
                    </div>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php _e('No posts found.', 'newsportal'); ?></p>
        <?php endif; ?>
    </div>
    
    <?php newsportal_pagination(); ?>
</section>

<!-- Bottom Banner Ad -->
<?php if (is_active_sidebar('ad-bottom')) : ?>
    <?php dynamic_sidebar('ad-bottom'); ?>
<?php else : ?>
    <div class="ad-banner bottom-banner">
        <div class="ad-placeholder" data-ad-size="970x250">
            <img src="<?php echo get_template_directory_uri(); ?>/images/ad-placeholder-970x250.jpg" alt="Ad">
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
