<?php
/**
 * GillonHolding functions and definitions
 *
 * @package GillonHolding
 */

if ( ! defined( 'gillonholdings_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( 'gillonholdings_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function gillonholdings_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus(
        array(
            'main-menu' => esc_html__( 'Main Menu', 'gillonholding' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'gillonholding' ),
        )
    );

    // Switch default core markup to valid HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 60,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'gillonholdings_setup' );

/**
 * Set the content width in pixels, based on the theme's design.
 */
function gillonholdings_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'gillonholdings_content_width', 1200 );
}
add_action( 'after_setup_theme', 'gillonholdings_content_width', 0 );

/**
 * Register widget areas.
 */
function gillonholdings_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'gillonholding' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'gillonholding' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 1', 'gillonholding' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here to appear in the first footer column.', 'gillonholding' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 2', 'gillonholding' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here to appear in the second footer column.', 'gillonholding' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 3', 'gillonholding' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here to appear in the third footer column.', 'gillonholding' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'gillonholdings_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gillonholdings_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'gillonholding-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap', array(), null );
    
    // Enqueue Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );
    
    // Enqueue main stylesheet
    wp_enqueue_style( 'gillonholding-style', get_stylesheet_uri(), array(), gillonholdings_VERSION );
    
    // Enqueue main JavaScript
    wp_enqueue_script( 'gillonholding-navigation', get_template_directory_uri() . '/js/navigation.js', array(), gillonholdings_VERSION, true );
    
    // Enqueue custom JavaScript
    wp_enqueue_script( 'gillonholding-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), gillonholdings_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'gillonholdings_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Create the js directory and JavaScript files if they don't exist
 */
function gillonholdings_create_files() {
    // Create the js directory if it doesn't exist
    if ( ! file_exists( get_template_directory() . '/js' ) ) {
        wp_mkdir_p( get_template_directory() . '/js' );
    }

    // Create navigation.js if it doesn't exist
    $navigation_file = get_template_directory() . '/js/navigation.js';
    if ( ! file_exists( $navigation_file ) ) {
        $navigation_content = "/**
 * Navigation functions
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNavigation = document.querySelector('.main-navigation');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mainNavigation.classList.toggle('active');
        });
    }
});";
        file_put_contents( $navigation_file, $navigation_content );
    }

    // Create scripts.js if it doesn't exist
    $scripts_file = get_template_directory() . '/js/scripts.js';
    if ( ! file_exists( $scripts_file ) ) {
        $scripts_content = "/**
 * Custom scripts for GillonHolding theme
 */
(function($) {
    'use strict';
    
    // Make header sticky on scroll
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            $('.site-header').addClass('sticky');
        } else {
            $('.site-header').removeClass('sticky');
        }
    });
    
    // Initialize smooth scroll for anchor links
    $('a[href*=\"#\"]:not([href=\"#\"])').click(function() {
        if (location.pathname.replace(/^\\//, '') === this.pathname.replace(/^\\//, '') && location.hostname === this.hostname) {
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
    
})(jQuery);";
        file_put_contents( $scripts_file, $scripts_content );
    }

    // Create images directory if it doesn't exist
    if ( ! file_exists( get_template_directory() . '/images' ) ) {
        wp_mkdir_p( get_template_directory() . '/images' );
    }

    // Create inc directory and files if they don't exist
    if ( ! file_exists( get_template_directory() . '/inc' ) ) {
        wp_mkdir_p( get_template_directory() . '/inc' );
        
        // Create template-tags.php
        $template_tags_file = get_template_directory() . '/inc/template-tags.php';
        if ( ! file_exists( $template_tags_file ) ) {
            $template_tags_content = "<?php
/**
 * Custom template tags for this theme
 *
 * @package GillonHolding
 */

if ( ! function_exists( 'gillonholdings_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function gillonholdings_posted_on() {
        $time_string = '<time class=\"entry-date published updated\" datetime=\"%1\$s\">%2\$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class=\"entry-date published\" datetime=\"%1\$s\">%2\$s</time><time class=\"updated\" datetime=\"%3\$s\">%4\$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        echo '<span class=\"posted-on\"><i class=\"far fa-calendar-alt\"></i> ' . $time_string . '</span>';
    }
endif;

if ( ! function_exists( 'gillonholdings_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function gillonholdings_posted_by() {
        echo '<span class=\"byline\"><i class=\"far fa-user\"></i> ' . esc_html__( 'by ', 'gillonholding' ) . '<span class=\"author vcard\"><a href=\"' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '\">' . esc_html( get_the_author() ) . '</a></span></span>';
    }
endif;

if ( ! function_exists( 'gillonholdings_comments_count' ) ) :
    /**
     * Prints HTML with meta information for the comments count.
     */
    function gillonholdings_comments_count() {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class=\"comments-link\"><i class=\"far fa-comment\"></i> ';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __( 'Leave a Comment<span class=\"screen-reader-text\"> on %s</span>', 'gillonholding' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );
            echo '</span>';
        }
    }
endif;

if ( ! function_exists( 'gillonholdings_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for categories and tags.
     */
    function gillonholdings_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'gillonholding' ) );
            if ( $categories_list ) {
                printf( '<div class=\"cat-links\"><i class=\"fas fa-folder-open\"></i> ' . esc_html__( 'Categories: %1\$s', 'gillonholding' ) . '</div>', $categories_list );
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gillonholding' ) );
            if ( $tags_list ) {
                printf( '<div class=\"post-tags\"><i class=\"fas fa-tags\"></i> ' . esc_html__( 'Tags: %1\$s', 'gillonholding' ) . '</div>', $tags_list );
            }
        }
    }
endif;

if ( ! function_exists( 'gillonholdings_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     */
    function gillonholdings_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>
            <div class=\"post-thumbnail\">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php else : ?>
            <a class=\"post-thumbnail\" href=\"<?php the_permalink(); ?>\">
                <?php the_post_thumbnail( 'medium', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
            </a>
        <?php
        endif;
    }
endif;

if ( ! function_exists( 'gillonholdings_breadcrumbs' ) ) :
    /**
     * Display breadcrumbs for pages
     */
    function gillonholdings_breadcrumbs() {
        global $post;
        
        echo '<div class=\"breadcrumbs\">';
        echo '<a href=\"' . esc_url( home_url( '/' ) ) . '\">' . esc_html__( 'Home', 'gillonholding' ) . '</a>';
        
        if ( is_category() || is_single() ) {
            echo ' &gt; ';
            $categories = get_the_category();
            if ( $categories ) {
                echo '<a href=\"' . esc_url( get_category_link( $categories[0]->term_id ) ) . '\">' . esc_html( $categories[0]->name ) . '</a>';
            }
            
            if ( is_single() ) {
                echo ' &gt; ';
                the_title();
            }
        } elseif ( is_page() ) {
            echo ' &gt; ';
            
            if ( $post->post_parent ) {
                $ancestors = get_post_ancestors( $post->ID );
                $ancestors = array_reverse( $ancestors );
                
                foreach ( $ancestors as $ancestor ) {
                    echo '<a href=\"' . esc_url( get_permalink( $ancestor ) ) . '\">' . esc_html( get_the_title( $ancestor ) ) . '</a> &gt; ';
                }
            }
            
            the_title();
        }
        
        echo '</div>';
    }
endif;";
            file_put_contents( $template_tags_file, $template_tags_content );
        }
        
        // Create template-functions.php
        $template_functions_file = get_template_directory() . '/inc/template-functions.php';
        if ( ! file_exists( $template_functions_file ) ) {
            $template_functions_content = "<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package GillonHolding
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array \$classes Classes for the body element.
 * @return array
 */
function gillonholdings_body_classes( \$classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        \$classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        \$classes[] = 'no-sidebar';
    }

    return \$classes;
}
add_filter( 'body_class', 'gillonholdings_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gillonholdings_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel=\"pingback\" href=\"%s\">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'gillonholdings_pingback_header' );

/**
 * Limit excerpt length
 */
function gillonholdings_excerpt_length( \$length ) {
    return 20;
}
add_filter( 'excerpt_length', 'gillonholdings_excerpt_length', 999 );

/**
 * Change excerpt more string
 */
function gillonholdings_excerpt_more( \$more ) {
    return '...';
}
add_filter( 'excerpt_more', 'gillonholdings_excerpt_more' );";
            file_put_contents( $template_functions_file, $template_functions_content );
        }
    }
}
add_action( 'after_switch_theme', 'gillonholdings_create_files' );
