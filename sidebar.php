<aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <!-- Default sidebar content -->
        <div class="sidebar-widget ad-widget">
            <div class="ad-placeholder" data-ad-size="300x250">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ad-placeholder-300x250.jpg" alt="Ad">
            </div>
        </div>
        <div class="sidebar-widget newsletter-widget">
            <h3><?php _e('Subscribe to Newsletter', 'newsportal'); ?></h3>
            <form method="post">
                <input type="email" placeholder="<?php esc_attr_e('Your email address', 'newsportal'); ?>" required>
                <button type="submit"><?php _e('Subscribe', 'newsportal'); ?></button>
            </form>
        </div>
        <div class="sidebar-widget trending-widget">
            <h3><?php _e('Trending Now', 'newsportal'); ?></h3>
            <ul>
                <?php
                $trending = new WP_Query(array('posts_per_page' => 5, 'orderby' => 'comment_count'));
                while ($trending->have_posts()) : $trending->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>
