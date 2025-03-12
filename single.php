<?php
/**
 * The template for displaying all single posts
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
                            <?php monarchconnectedreplica_breadcrumbs(); ?>
                        </div>
                    </div>
                </div>
                
                <div class="site-main">
                    <div class="container">
                        <div class="row">
                            <div class="col" style="flex: 0 0 70%; max-width: 70%;">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="single-post-header">
                                        <div class="post-meta">
                                            <?php
                                            monarchconnectedreplica_posted_on();
                                            monarchconnectedreplica_posted_by();
                                            monarchconnectedreplica_comments_count();
                                            ?>
                                        </div>
                                    </div>

                                    <?php monarchconnectedreplica_post_thumbnail(); ?>

                                    <div class="post-content">
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

                                    <footer class="entry-footer">
                                        <?php monarchconnectedreplica_entry_footer(); ?>
                                    </footer>

                                    <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                    ?>
                                </article>
                            </div>
                            
                            <div class="col" style="flex: 0 0 30%; max-width: 30%;">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
