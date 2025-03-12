<?php
/**
 * Template Name: Contact Page
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
                        <div class="row">
                            <div class="col" style="flex: 0 0 60%; max-width: 60%;">
                                <div class="page-content">
                                    <?php the_content(); ?>
                                    
                                    <!-- Contact Form (if Contact Form 7 is not available) -->
                                    <?php if ( ! shortcode_exists( 'contact-form-7' ) ) : ?>
                                    <div class="contact-form">
                                        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                                            <div class="form-group">
                                                <label for="name"><?php esc_html_e( 'Name', 'gillonholding' ); ?> <span class="required">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email"><?php esc_html_e( 'Email', 'gillonholding' ); ?> <span class="required">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="phone"><?php esc_html_e( 'Phone', 'gillonholding' ); ?></label>
                                                <input type="tel" id="phone" name="phone" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="subject"><?php esc_html_e( 'Subject', 'gillonholding' ); ?> <span class="required">*</span></label>
                                                <input type="text" id="subject" name="subject" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="message"><?php esc_html_e( 'Message', 'gillonholding' ); ?> <span class="required">*</span></label>
                                                <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Send Message', 'gillonholding' ); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col" style="flex: 0 0 40%; max-width: 40%;">
                                <div class="contact-info" style="background-color: var(--light-gray); padding: 30px; border-radius: 6px;">
                                    <h3><?php esc_html_e( 'Contact Information', 'gillonholding' ); ?></h3>
                                    
                                    <ul style="list-style: none; padding: 0; margin: 20px 0;">
                                        <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                            <i class="fas fa-map-marker-alt" style="color: var(--secondary); margin-right: 10px; font-size: 20px;"></i>
                                            <div>
                                                <h4 style="margin: 0; font-size: 18px;"><?php esc_html_e( 'Our Office', 'gillonholding' ); ?></h4>
                                                <p style="margin: 5px 0 0;"><?php esc_html_e( '123 Business Street, Suite 100, New York, NY 10001', 'gillonholding' ); ?></p>
                                            </div>
                                        </li>
                                        
                                        <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                            <i class="fas fa-phone" style="color: var(--secondary); margin-right: 10px; font-size: 20px;"></i>
                                            <div>
                                                <h4 style="margin: 0; font-size: 18px;"><?php esc_html_e( 'Phone', 'gillonholding' ); ?></h4>
                                                <p style="margin: 5px 0 0;"><?php esc_html_e( '(123) 456-7890', 'gillonholding' ); ?></p>
                                            </div>
                                        </li>
                                        
                                        <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                            <i class="fas fa-envelope" style="color: var(--secondary); margin-right: 10px; font-size: 20px;"></i>
                                            <div>
                                                <h4 style="margin: 0; font-size: 18px;"><?php esc_html_e( 'Email', 'gillonholding' ); ?></h4>
                                                <p style="margin: 5px 0 0;"><?php esc_html_e( 'info@gillonholding', 'gillonholding' ); ?></p>
                                            </div>
                                        </li>
                                        
                                        <li style="display: flex; align-items: center;">
                                            <i class="fas fa-clock" style="color: var(--secondary); margin-right: 10px; font-size: 20px;"></i>
                                            <div>
                                                <h4 style="margin: 0; font-size: 18px;"><?php esc_html_e( 'Business Hours', 'gillonholding' ); ?></h4>
                                                <p style="margin: 5px 0 0;"><?php esc_html_e( 'Monday-Friday: 9am-5pm', 'gillonholding' ); ?></p>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                    <h3><?php esc_html_e( 'Follow Us', 'gillonholding' ); ?></h3>
                                    
                                    <div class="social-icons" style="display: flex; margin-top: 15px;">
                                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; background-color: var(--primary); color: var(--white); border-radius: 50%; margin-right: 10px;" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; background-color: var(--primary); color: var(--white); border-radius: 50%; margin-right: 10px;" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; background-color: var(--primary); color: var(--white); border-radius: 50%; margin-right: 10px;" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; background-color: var(--primary); color: var(--white); border-radius: 50%;" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
