<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="150">
                </a>
            <?php endif; ?>
        </div>
        
        <!-- Top Ad Banner (Widget Area) -->
        <?php if (is_active_sidebar('ad-top')) : ?>
            <?php dynamic_sidebar('ad-top'); ?>
        <?php else : ?>
            <div class="ad-banner top-banner">
                <div class="ad-placeholder" data-ad-size="728x90">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ad-placeholder-728x90.jpg" alt="Advertisement" class="ad-image">
                </div>
            </div>
        <?php endif; ?>
        
        <div class="nav-extras">
            <!-- Dark Mode Toggle -->
            <button id="dark-mode-toggle" class="nav-icon" aria-label="Dark Mode">
                <i class="fas fa-moon"></i>
            </button>
            
            <!-- Search Icon -->
            <button id="search-toggle" class="nav-icon" aria-label="Search">
                <i class="fas fa-search"></i>
            </button>
            
            <!-- User Account Icon -->
            <button id="user-toggle" class="nav-icon" aria-label="Account">
                <i class="fas fa-user"></i>
            </button>
        </div>
        
        <nav class="main-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </div>
</header>

<!-- Search Modal Overlay -->
<div id="search-modal" class="modal-overlay">
    <div class="modal-content">
        <button class="modal-close">&times;</button>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search articles...', 'newsportal'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<!-- User Modal Overlay (Login/Register Links) -->
<div id="user-modal" class="modal-overlay">
    <div class="modal-content user-modal-content">
        <button class="modal-close">&times;</button>
        <div class="user-links">
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo esc_url(admin_url()); ?>"><?php _e('Dashboard', 'newsportal'); ?></a>
                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"><?php _e('Logout', 'newsportal'); ?></a>
            <?php else : ?>
                <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>"><?php _e('Login', 'newsportal'); ?></a>
                <a href="<?php echo esc_url(wp_registration_url()); ?>"><?php _e('Register', 'newsportal'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Breaking News Ticker -->
<div class="breaking-news">
    <div class="container">
        <span class="breaking-label">Breaking:</span>
        <div class="ticker">
            <ul>
                <?php
                $breaking_query = new WP_Query(array(
                    'posts_per_page' => 5,
                    'category_name'  => 'breaking',
                    'meta_key'       => '_thumbnail_id',
                ));
                if ($breaking_query->have_posts()) :
                    while ($breaking_query->have_posts()) : $breaking_query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    $latest = new WP_Query(array('posts_per_page' => 5));
                    while ($latest->have_posts()) : $latest->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </ul>
        </div>
    </div>
</div>

<main class="container main-content">                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </div>
</header>

<!-- Breaking News Ticker -->
<div class="breaking-news">
    <div class="container">
        <span class="breaking-label">Breaking:</span>
        <div class="ticker">
            <ul>
                <?php
                $breaking_query = new WP_Query(array(
                    'posts_per_page' => 5,
                    'category_name'  => 'breaking', // Create a "breaking" category or change this
                    'meta_key'       => '_thumbnail_id',
                ));
                if ($breaking_query->have_posts()) :
                    while ($breaking_query->have_posts()) : $breaking_query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback to latest posts
                    $latest = new WP_Query(array('posts_per_page' => 5));
                    while ($latest->have_posts()) : $latest->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </ul>
        </div>
    </div>
</div>

<main class="container main-content">
