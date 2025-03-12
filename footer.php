<?php
/**
 * The template for displaying the footer
 *
 * @package GillonHolding
 */

?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-widget">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'About Us', 'gillonholding' ); ?></h4>
                        <p><?php esc_html_e( 'Gillon Holding provides innovative IT solutions for businesses of all sizes. Our team of experts can help you navigate the complex world of technology.', 'gillonholding' ); ?></p>
                        <div class="social-icons">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="footer-widget">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Quick Links', 'gillonholding' ); ?></h4>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'menu_id'        => 'footer-menu',
                                'container'      => false,
                                'fallback_cb'    => function() {
                                    echo '<ul>
                                        <li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'gillonholding' ) . '</a></li>
                                        <li><a href="#">' . esc_html__( 'About Us', 'gillonholding' ) . '</a></li>
                                        <li><a href="#">' . esc_html__( 'Services', 'gillonholding' ) . '</a></li>
                                        <li><a href="#">' . esc_html__( 'Industries', 'gillonholding' ) . '</a></li>
                                        <li><a href="#">' . esc_html__( 'Contact', 'gillonholding' ) . '</a></li>
                                    </ul>';
                                },
                            )
                        );
                        ?>
                    <?php endif; ?>
                </div>
                
                <div class="footer-widget">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Contact Us', 'gillonholding' ); ?></h4>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> <?php esc_html_e( '123 Business Street, Suite 100, New York, NY 10001', 'gillonholding' ); ?></li>
                            <li><i class="fas fa-phone"></i> <?php esc_html_e( '(123) 456-7890', 'gillonholding' ); ?></li>
                            <li><i class="fas fa-envelope"></i> <?php esc_html_e( 'info@gillonholding', 'gillonholding' ); ?></li>
                            <li><i class="fas fa-clock"></i> <?php esc_html_e( 'Monday-Friday: 9am-5pm', 'gillonholding' ); ?></li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. 
                    <?php esc_html_e( 'All Rights Reserved.', 'gillonholding' ); ?>
                </p>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
