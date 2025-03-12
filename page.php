<?php
/**
 * The template for displaying all pages
 *
 * @package GillonHolding
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php while ( have_posts() ) : the_post(); ?>
                
                <div class="page-header">
                    <div class="container">
                        <div class="page-header-content">
                            <h1><?php the_title(); ?></h1>
                            <?php gillonholdings_breadcrumbs(); ?>
                        </div>
                    </div>
                </div>
                
                <div class="site-main">
                    <div class="container">
                        <div class="page-content">
                            <?php
                            the_content();
                            
                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gillonholding' ),
                                    'after'  => '</div>',
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
                
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
