<?php
/**
 * The Footer for Shaheer Gems Theme
 *
 * @package Shaheer_Gems
 */
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Column 1: Shaheer Gems Introduction -->
                <div class="footer-col footer-about">
                    <div style="margin-bottom: 20px;">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" alt="SHAHEER GEMS" width="280" style="filter: brightness(0) invert(1) hue-rotate(180deg);" />
                    </div>
                    <p>
                        <?php esc_html_e('Shaheer Gems is a premier natural gemstone dealer based in Sri Lanka, sourcing rare Ceylon sapphires, rubies, and precious gemstones of exceptional beauty, cut, and purity for discerning local and international collectors.', 'shaheer-gems'); ?>
                    </p>
                    <div style="color: var(--color-secondary-light); font-size: 0.85rem; font-weight: 600; letter-spacing: 1px;">
                        <?php esc_html_e('RATNAPURA • COLOMBO • WORLDWIDE', 'shaheer-gems'); ?>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h4 class="footer-col-title"><?php esc_html_e('Quick Links', 'shaheer-gems'); ?></h4>
                    <ul class="footer-links-list">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Us', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gemstones/')); ?>"><?php esc_html_e('Gemstone Catalog', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gallery/')); ?>"><?php esc_html_e('Photo Gallery', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'shaheer-gems'); ?></a></li>
                    </ul>
                </div>

                <!-- Column 3: Gemstone Categories -->
                <div class="footer-col">
                    <h4 class="footer-col-title"><?php esc_html_e('Precious Categories', 'shaheer-gems'); ?></h4>
                    <ul class="footer-links-list">
                        <li><a href="<?php echo esc_url(home_url('/gemstones/?category=blue-sapphire')); ?>"><?php esc_html_e('Blue Sapphire', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gemstones/?category=padparadscha-sapphire')); ?>"><?php esc_html_e('Padparadscha Sapphire', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gemstones/?category=yellow-sapphire')); ?>"><?php esc_html_e('Yellow Sapphire', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gemstones/?category=ruby')); ?>"><?php esc_html_e('Ruby Gems', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gemstones/?category=emerald')); ?>"><?php esc_html_e('Emerald Gems', 'shaheer-gems'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/gemstones/')); ?>"><?php esc_html_e('Other Precious Gems', 'shaheer-gems'); ?></a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Information -->
                <div class="footer-col">
                    <h4 class="footer-col-title"><?php esc_html_e('Contact Information', 'shaheer-gems'); ?></h4>
                    <div class="footer-contact-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span><?php echo nl2br(esc_html(shaheer_get_option('shaheer_office_address', 'No. 88, Galle Face Terrace, Colombo 03, Sri Lanka'))); ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <a href="tel:<?php echo esc_attr(shaheer_get_option('shaheer_phone_number', '+94112322131')); ?>"><?php echo esc_html(shaheer_get_option('shaheer_phone_number', '+94 11 232 2131')); ?></a>
                    </div>
                    <div class="footer-contact-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <a href="mailto:<?php echo esc_attr(shaheer_get_option('shaheer_email_address', 'info@shaheergems.com')); ?>"><?php echo esc_html(shaheer_get_option('shaheer_email_address', 'info@shaheergems.com')); ?></a>
                    </div>

                    <!-- Social Media Links -->
                    <div class="footer-social-links">
                        <?php 
                        $wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));
                        ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="WhatsApp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        </a>
                        <a href="<?php echo esc_url(shaheer_get_option('shaheer_facebook_url', '#')); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="<?php echo esc_url(shaheer_get_option('shaheer_instagram_url', '#')); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Bar -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php esc_html_e('Shaheer Gems. All Rights Reserved.', 'shaheer-gems'); ?></p>
                <div class="footer-bottom-links">
                    <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'shaheer-gems'); ?></a>
                    <span>|</span>
                    <a href="<?php echo esc_url(home_url('/terms/')); ?>"><?php esc_html_e('Terms & Conditions', 'shaheer-gems'); ?></a>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
