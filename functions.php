<?php
/**
 * MonarchConnectedReplica Theme Functions
 */

// Theme Setup
function monarch_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for featured images
    add_theme_support('post-thumbnails');
    
    // Add theme support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'monarchconnectedreplica'),
        'footer-menu' => esc_html__('Footer Menu', 'monarchconnectedreplica'),
    ));
    
    // Add custom image sizes
    add_image_size('monarch-featured', 1200, 600, true);
    add_image_size('monarch-card', 400, 300, true);
}
add_action('after_setup_theme', 'monarch_theme_setup');

// Enqueue styles and scripts
function monarch_enqueue_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    
    // Enqueue main stylesheet
    wp_enqueue_style('monarch-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue main JavaScript file
    wp_enqueue_script('monarch-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Enqueue comment reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'monarch_enqueue_scripts');

// Register widget areas
function monarch_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'monarchconnectedreplica'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here to appear in your sidebar.', 'monarchconnectedreplica'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'monarchconnectedreplica'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here to appear in the first footer column.', 'monarchconnectedreplica'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'monarchconnectedreplica'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here to appear in the second footer column.', 'monarchconnectedreplica'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'monarchconnectedreplica'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here to appear in the third footer column.', 'monarchconnectedreplica'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'monarchconnectedreplica'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here to appear in the fourth footer column.', 'monarchconnectedreplica'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'monarch_widgets_init');

// Create folder for JavaScript files if it doesn't exist
if (!file_exists(get_template_directory() . '/js')) {
    mkdir(get_template_directory() . '/js', 0777, true);
}

// Create the main JavaScript file if it doesn't exist
if (!file_exists(get_template_directory() . '/js/main.js')) {
    $js_content = <<<EOT
jQuery(document).ready(function($) {
    // Mobile menu toggle
    $('.menu-toggle').click(function() {
        $('.main-navigation').toggleClass('active');
    });
    
    // Smooth scroll for anchor links
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
                return false;
            }
        }
    });
});
EOT;
    file_put_contents(get_template_directory() . '/js/main.js', $js_content);
}

// Custom excerpt length
function monarch_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'monarch_custom_excerpt_length');

// Custom excerpt more
function monarch_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'monarch_custom_excerpt_more');

// Custom pagination function
function monarch_pagination() {
    global $wp_query;
    
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    
    $big = 999999999;
    $args = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>',
        'type' => 'list',
    );
    
    echo '<div class="pagination">';
    echo paginate_links($args);
    echo '</div>';
}

// Custom SVG icons
function monarch_get_svg_icon($icon) {
    switch ($icon) {
        case 'it-support':
            return '<i class="fas fa-desktop"></i>';
        case 'security':
            return '<i class="fas fa-shield-alt"></i>';
        case 'telecom':
            return '<i class="fas fa-phone-alt"></i>';
        case 'cloud':
            return '<i class="fas fa-cloud"></i>';
        case 'networking':
            return '<i class="fas fa-network-wired"></i>';
        case 'consulting':
            return '<i class="fas fa-users-cog"></i>';
        default:
            return '<i class="fas fa-cog"></i>';
    }
}

// Custom Classes for Menu Items
function monarch_add_menu_item_classes($classes, $item, $args) {
    if($args->theme_location == 'primary-menu') {
        $classes[] = 'menu-item-' . $item->ID;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'monarch_add_menu_item_classes', 10, 3);

// Display featured image or fallback
function monarch_featured_image($size = 'large', $class = '') {
    if (has_post_thumbnail()) {
        the_post_thumbnail($size, array('class' => $class));
    } else {
        echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt="' . get_the_title() . '" class="' . $class . '">';
    }
}

// Create assets/images folder if it doesn't exist with a placeholder image
if (!file_exists(get_template_directory() . '/assets/images')) {
    mkdir(get_template_directory() . '/assets/images', 0777, true);
    
    // Create a placeholder image (we'll just create a 1x1 transparent pixel)
    $placeholder = base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
    file_put_contents(get_template_directory() . '/assets/images/placeholder.jpg', $placeholder);
}

// Create Custom Post Types for Services and Industries
function monarch_register_custom_post_types() {
    // Register Services CPT
    register_post_type('services', 
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new' => __('Ad
