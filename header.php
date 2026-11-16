<?php
/**
 * The Header for Shaheer Gems Theme
 *
 * @package Shaheer Gems
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary" style="display:none;"><?php esc_html_e('Skip to content', 'shaheer-gems'); ?></a>

    <!-- Top Trust Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <span class="top-bar-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    <?php esc_html_e('100% Natural Ceylon Gemstones', 'shaheer-gems'); ?>
                </span>
                <span class="top-bar-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    <?php esc_html_e('Worldwide Insured Express Delivery', 'shaheer-gems'); ?>
                </span>
            </div>
            <div class="top-bar-right">
                <span class="top-bar-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <?php echo esc_html(shaheer_get_option('shaheer_phone_number', '+94 11 232 2131')); ?>
                </span>
                <span class="top-bar-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <a href="mailto:<?php echo esc_attr(shaheer_get_option('shaheer_email_address', 'info@shaheergems.com')); ?>"><?php echo esc_html(shaheer_get_option('shaheer_email_address', 'info@shaheergems.com')); ?></a>
                </span>
            </div>
        </div>
    </div>

    <!-- Main Sticky Header -->
    <header id="masthead" class="site-header">
        <div class="container header-container">
            <!-- Brand Logo -->
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" alt="SHAHEER    GEMS - Natural Precious Gemstones Sri Lanka" width="380" height="72" />
                </a>
            </div>

            <!-- Primary Navigation Menu -->
            <nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'shaheer-gems'); ?>">
                <button class="mobile-close-btn" aria-label="<?php esc_attr_e('Close Menu', 'shaheer-gems'); ?>">&times;</button>
                <ul class="nav-menu">
                    <li class="<?php echo is_front_page() ? 'active' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                    </li>
                    <li class="<?php echo is_page('about') ? 'active' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Us', 'shaheer-gems'); ?></a>
                    </li>
                    <li class="<?php echo (is_page('gemstones') || is_post_type_archive('gemstone') || is_singular('gemstone')) ? 'active' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/gemstones/')); ?>"><?php esc_html_e('Gemstones', 'shaheer-gems'); ?></a>
                    </li>
                    <li class="<?php echo is_page('gallery') ? 'active' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/gallery/')); ?>"><?php esc_html_e('Gallery', 'shaheer-gems'); ?></a>
                    </li>
                    <li class="<?php echo is_page('contact') ? 'active' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'shaheer-gems'); ?></a>
                    </li>
                </ul>
            </nav>

            <!-- Backdrop for Mobile Navigation -->
            <div class="nav-backdrop"></div>

            <!-- Header Actions & WhatsApp Button -->
            <div class="header-actions">
                <?php 
                $wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));
                ?>
                <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>&text=<?php echo urlencode('Hello Shaheer Gems, I would like to inquire about your gemstone collection.'); ?>" target="_blank" rel="noopener noreferrer" class="btn-header-whatsapp">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span><?php esc_html_e('WhatsApp Inquiry', 'shaheer-gems'); ?></span>
                </a>

                <button class="mobile-nav-toggle" aria-label="<?php esc_attr_e('Open Navigation Menu', 'shaheer-gems'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
