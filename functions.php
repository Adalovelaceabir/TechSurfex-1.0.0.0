<?php
/**
 * News Portal Theme Functions
 */

// Theme Setup
function newsportal_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register Menus (Added 'right' menu)
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'newsportal'),
        'right'   => __('Right Menu (Header Right Side)', 'newsportal'),
        'footer'  => __('Footer Menu', 'newsportal'),
    ));
}
add_action('after_setup_theme', 'newsportal_setup');

// Enqueue Scripts and Styles
function newsportal_scripts() {
    wp_enqueue_style('newsportal-style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    
    wp_enqueue_script('newsportal-main', get_template_directory_uri() . '/js/main.js', array(), '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'newsportal_scripts');

// Register Widget Areas
function newsportal_widgets_init() {
    // Main Sidebar
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'newsportal'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="sidebar-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    // Footer Widgets (4 columns)
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(__('Footer Widget %d', 'newsportal'), $i),
            'id'            => 'footer-' . $i,
            'before_widget' => '<div class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));
    }
    
    // Ad Spaces
    register_sidebar(array(
        'name'          => __('Top Banner Ad', 'newsportal'),
        'id'            => 'ad-top',
        'before_widget' => '<div class="ad-banner top-banner">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="ad-title" style="display:none;">',
        'after_title'   => '</div>',
    ));
    
    register_sidebar(array(
        'name'          => __('Mid Content Ad', 'newsportal'),
        'id'            => 'ad-mid',
        'before_widget' => '<div class="ad-banner mid-banner">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="ad-title" style="display:none;">',
        'after_title'   => '</div>',
    ));
    
    register_sidebar(array(
        'name'          => __('Bottom Banner Ad', 'newsportal'),
        'id'            => 'ad-bottom',
        'before_widget' => '<div class="ad-banner bottom-banner">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="ad-title" style="display:none;">',
        'after_title'   => '</div>',
    ));
}
add_action('widgets_init', 'newsportal_widgets_init');

// Custom Excerpt Length
function newsportal_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'newsportal_excerpt_length');

// Pagination
function newsportal_pagination() {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>',
    ));
    if (is_array($pages)) {
        echo '<div class="pagination">';
        foreach ($pages as $page) {
            echo $page;
        }
        echo '</div>';
    }
}

// Get category color class
function newsportal_cat_class($cat_name) {
    $cat_slug = sanitize_title($cat_name);
    return 'category-' . $cat_slug;
}
?>
