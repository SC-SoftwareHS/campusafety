<?php
/**
 * The template for displaying the front page
 *
 * @package GillonHolding
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <!-- Hero Section -->
            <section class="hero">
                <div class="container">
                    <div class="hero-content">
                        <h1><?php esc_html_e( 'IT Solutions That Transform Your Business', 'gillonholding' ); ?></h1>
                        <p><?php esc_html_e( 'Innovative technology solutions designed to enhance efficiency, security, and growth for businesses of all sizes.', 'gillonholding' ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Contact Us', 'gillonholding' ); ?></a>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="services section">
                <div class="container">
                    <div class="section-title">
                        <h2><?php esc_html_e( 'Our Services', 'gillonholding' ); ?></h2>
                    </div>
                    
                    <div class="services-grid">
                        <!-- Service 1 -->
                        <div class="service-box">
                            <div class="service-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <h3><?php esc_html_e( 'IT Support', 'gillonholding' ); ?></h3>
                            <p><?php esc_html_e( 'Comprehensive IT support services to keep your business running smoothly. Our team of experts is available 24/7.', 'gillonholding' ); ?></p>
                            <a href="#" class="service-link"><?php esc_html_e( 'Learn More', 'gillonholding' ); ?></a>
                        </div>
                        
                        <!-- Service 2 -->
                        <div class="service-box">
                            <div class="service-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h3><?php esc_html_e( 'Cybersecurity', 'gillonholding' ); ?></h3>
                            <p><?php esc_html_e( 'Protect your business from cyber threats with our advanced security solutions. Stay one step ahead of hackers.', 'gillonholding' ); ?></p>
                            <a href="#" class="service-link"><?php esc_html_e( 'Learn More', 'gillonholding' ); ?></a>
                        </div>
                        
                        <!-- Service 3 -->
                        <div class="service-box">
                            <div class="service-icon">
                                <i class="fas fa-network-wired"></i>
                            </div>
                            <h3><?php esc_html_e( 'Telecom Solutions', 'gillonholding' ); ?></h3>
                            <p><?php esc_html_e( 'State-of-the-art voice and data solutions to keep your team connected. Reliable communication is essential.', 'gillonholding' ); ?></p>
                            <a href="#" class="service-link"><?php esc_html_e( 'Learn More', 'gillonholding' ); ?></a>
                        </div>
                        
                        <!-- Service 4 -->
                        <div class="service-box">
                            <div class="service-icon">
                                <i class="fas fa-cloud"></i>
                            </div>
                            <h3><?php esc_html_e( 'Cloud Services', 'gillonholding' ); ?></h3>
                            <p><?php esc_html_e( 'Leverage the power of the cloud to enhance flexibility, scalability, and reduce costs for your business.', 'gillonholding' ); ?></p>
                            <a href="#" class="service-link"><?php esc_html_e( 'Learn More', 'gillonholding' ); ?></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Industries Section -->
            <section class="industries section">
                <div class="container">
                    <div class="section-title">
                        <h2><?php esc_html_e( 'Industries We Serve', 'gillonholding' ); ?></h2>
                    </div>
                    
                    <div class="industries-grid">
                        <!-- Industry 1 -->
                        <div class="industry-box">
                            <div class="industry-image">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/healthcare.jpg' ); ?>" alt="<?php esc_attr_e( 'Healthcare Industry', 'gillonholding' ); ?>">
                            </div>
                            <div class="industry-content">
                                <h3><?php esc_html_e( 'Healthcare', 'gillonholding' ); ?></h3>
                                <p><?php esc_html_e( 'IT solutions tailored to the unique needs of healthcare providers.', 'gillonholding' ); ?></p>
                            </div>
                        </div>
                        
                        <!-- Industry 2 -->
                        <div class="industry-box">
                            <div class="industry-image">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/finance.jpg' ); ?>" alt="<?php esc_attr_e( 'Financial Services', 'gillonholding' ); ?>">
                            </div>
                            <div class="industry-content">
                                <h3><?php esc_html_e( 'Financial Services', 'gillonholding' ); ?></h3>
                                <p><?php esc_html_e( 'Secure and compliant solutions for the financial industry.', 'gillonholding' ); ?></p>
                            </div>
                        </div>
                        
                        <!-- Industry 3 -->
                        <div class="industry-box">
                            <div class="industry-image">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/education.jpg' ); ?>" alt="<?php esc_attr_e( 'Education', 'gillonholding' ); ?>">
                            </div>
                            <div class="industry-content">
                                <h3><?php esc_html_e( 'Education', 'gillonholding' ); ?></h3>
                                <p><?php esc_html_e( 'Empowering educational institutions with technology solutions.', 'gillonholding' ); ?></p>
                            </div>
                        </div>
                        
                        <!-- Industry 4 -->
                        <div class="industry-box">
                            <div class="industry-image">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/legal.jpg' ); ?>" alt="<?php esc_attr_e( 'Legal', 'gillonholding' ); ?>">
                            </div>
                            <div class="industry-content">
                                <h3><?php esc_html_e( 'Legal', 'gillonholding' ); ?></h3>
                                <p><?php esc_html_e( 'Supporting law firms with specialized IT solutions.', 'gillonholding' ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Banner -->
            <section class="cta-banner">
                <div class="container">
                    <h2><?php esc_html_e( 'Ready to Transform Your Business?', 'gillonholding' ); ?></h2>
                    <p><?php esc_html_e( 'Contact our team today to learn how our IT solutions can help you achieve your business goals.', 'gillonholding' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Request a Quote', 'gillonholding' ); ?></a>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
