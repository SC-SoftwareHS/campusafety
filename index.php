<?php
/**
 * The main template file
 *
 * @package GillonHolding
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="page-header">
                <div class="container">
                    <div class="page-header-content">
                        <h1>
                            <?php
                            if ( is_home() && ! is_front_page() ) {
                                single_post_title();
                            } else {
                                esc_html_e( 'Blog', 'gillonholding' );
                            }
                            ?>
                        </h1>
                        <?php gillonholdings_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
            
            <div class="site-main">
                <div class="container">
                    <div class="row">
                        <div class="col" style="flex: 0 0 70%; max-width: 70%;">
                            <?php
                            if ( have_posts() ) :
                                ?>
                                <div class="blog-grid">
                                    <?php
                                    while ( have_posts() ) :
                                        the_post();
                                        ?>
                                        <div class="blog-card">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <div class="blog-image">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail( 'medium' ); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <span class="date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                                                    <span class="author"><i class="far fa-user"></i> <?php the_author(); ?></span>
                                                </div>
                                                
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                
                                                <div class="excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                
                                                <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'gillonholding' ); ?></a>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    ?>
                                </div>
                                
                                <div class="pagination" style="margin-top: 40px; text-align: center;">
                                    <?php
                                    echo paginate_links(
                                        array(
                                            'prev_text' => '<i class="fas fa-angle-left"></i>',
                                            'next_text' => '<i class="fas fa-angle-right"></i>',
                                        )
                                    );
                                    ?>
                                </div>
                                
                                <?php
                            else :
                                ?>
                                <div class="no-results">
                                    <h2><?php esc_html_e( 'No Posts Found', 'gillonholding' ); ?></h2>
                                    <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'gillonholding' ); ?></p>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                        
                        <div class="col" style="flex: 0 0 30%; max-width: 30%;">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
