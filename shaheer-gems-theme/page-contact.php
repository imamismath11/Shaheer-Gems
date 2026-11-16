<?php
/**
 * Template Name: Contact Us Page
 *
 * @package Shaheer_Gems
 */

get_header();

$wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));
?>

<main id="primary" class="site-main">

    <!-- Page Banner -->
    <section class="page-hero-banner">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('Contact Shaheer Gems', 'shaheer-gems'); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php esc_html_e('Contact Us', 'shaheer-gems'); ?></span>
            </div>
        </div>
    </section>

    <!-- Contact Details & Form Section -->
    <section class="section-padding" style="background-color: var(--color-bg);">
        <div class="container">
            <div class="contact-layout">

                <!-- Left Column: Business Information -->
                <div class="contact-info-card">
                    <span class="section-subtitle" style="margin-bottom: 8px;"><?php esc_html_e('GET IN TOUCH', 'shaheer-gems'); ?></span>
                    <h2 class="section-title" style="font-size: 1.8rem; margin-bottom: 16px;"><?php esc_html_e('We Are Here To Assist You', 'shaheer-gems'); ?></h2>
                    <p style="font-size: 0.95rem; line-height: 1.7; margin-bottom: 24px;">
                        <?php esc_html_e('Whether you are inquiring about a specific gemstone from our catalog, requesting bespoke gem sourcing in Sri Lanka, or planning a showroom appointment, we invite you to connect with us.', 'shaheer-gems'); ?>
                    </p>

                    <div class="contact-info-list">
                        <!-- Business Name -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="6 2 18 2 22 8 12 22 2 8 6 2"/></svg>
                            </div>
                            <div>
                                <div class="contact-info-label"><?php esc_html_e('Business Name', 'shaheer-gems'); ?></div>
                                <div class="contact-info-val">SHAHEER GEMS</div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <div class="contact-info-label"><?php esc_html_e('Showroom & Office Address', 'shaheer-gems'); ?></div>
                                <div class="contact-info-val"><?php echo nl2br(esc_html(shaheer_get_option('shaheer_office_address', 'No. 88, Galle Face Terrace, Colombo 03, Sri Lanka'))); ?></div>
                            </div>
                        </div>

                        <!-- Contact Telephone -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div>
                                <div class="contact-info-label"><?php esc_html_e('Telephone Hotline', 'shaheer-gems'); ?></div>
                                <div class="contact-info-val">
                                    <a href="tel:<?php echo esc_attr(shaheer_get_option('shaheer_phone_number', '+94112322131')); ?>"><?php echo esc_html(shaheer_get_option('shaheer_phone_number', '+94 11 232 2131')); ?></a>
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp Direct -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon" style="background: rgba(37, 211, 102, 0.15); color: #25D366;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            </div>
                            <div>
                                <div class="contact-info-label"><?php esc_html_e('WhatsApp Inquiry', 'shaheer-gems'); ?></div>
                                <div class="contact-info-val">
                                    <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html(shaheer_get_option('shaheer_whatsapp_number', '+94 77 707 2131')); ?></a>
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <div class="contact-info-label"><?php esc_html_e('Email Address', 'shaheer-gems'); ?></div>
                                <div class="contact-info-val">
                                    <a href="mailto:<?php echo esc_attr(shaheer_get_option('shaheer_email_address', 'info@shaheergems.com')); ?>"><?php echo esc_html(shaheer_get_option('shaheer_email_address', 'info@shaheergems.com')); ?></a>
                                </div>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <div class="contact-info-label"><?php esc_html_e('Showroom Hours', 'shaheer-gems'); ?></div>
                                <div class="contact-info-val"><?php echo esc_html(shaheer_get_option('shaheer_business_hours', 'Mon - Sat: 9:30 AM - 6:30 PM (IST)')); ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Direct WhatsApp Button -->
                    <div style="margin-top: 30px;">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp" style="width: 100%;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span><?php esc_html_e('Chat with Us on WhatsApp', 'shaheer-gems'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="contact-form-card">
                    <span class="section-subtitle" style="margin-bottom: 8px;"><?php esc_html_e('SEND A MESSAGE', 'shaheer-gems'); ?></span>
                    <h2 class="section-title" style="font-size: 1.8rem; margin-bottom: 24px;"><?php esc_html_e('Inquire or Request Valuation', 'shaheer-gems'); ?></h2>

                    <div id="formResponseAlert" class="form-response-alert"></div>

                    <form id="shaheerContactForm" method="post" action="">
                        <?php wp_nonce_field('shaheer_contact_action', 'contact_nonce'); ?>

                        <div class="form-group">
                            <label for="contact_name"><?php esc_html_e('Full Name *', 'shaheer-gems'); ?></label>
                            <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="e.g. Alexander Wright" required />
                        </div>

                        <div class="form-group">
                            <label for="contact_email"><?php esc_html_e('Email Address *', 'shaheer-gems'); ?></label>
                            <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="e.g. alexander@example.com" required />
                        </div>

                        <div class="form-group">
                            <label for="contact_phone"><?php esc_html_e('Phone / WhatsApp Number', 'shaheer-gems'); ?></label>
                            <input type="tel" id="contact_phone" name="contact_phone" class="form-control" placeholder="e.g. +1 555 123 4567" />
                        </div>

                        <div class="form-group">
                            <label for="contact_subject"><?php esc_html_e('Subject', 'shaheer-gems'); ?></label>
                            <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="e.g. Inquiry regarding Royal Blue Sapphire SG001" />
                        </div>

                        <div class="form-group">
                            <label for="contact_message"><?php esc_html_e('Your Message *', 'shaheer-gems'); ?></label>
                            <textarea id="contact_message" name="contact_message" class="form-control" rows="5" placeholder="Please provide details of your inquiry, carat preference, or custom order requirements..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-gold" style="width: 100%; padding: 15px;">
                            <?php esc_html_e('Send Message', 'shaheer-gems'); ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Google Map Embed Section -->
            <div class="map-wrapper">
                <iframe src="<?php echo esc_url(shaheer_get_option('shaheer_google_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798511757657!2d79.8436!3d6.9147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593b4e6a6a4f%3A0x6b72a4d33a1e2f7!2sColombo!5e0!3m2!1sen!2slk!4v1600000000000!5m2!1sen!2slk')); ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
