<?php
/**
 * Shaheer Gems Theme Functions and Definitions
 *
 * @package Shaheer_Gems
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SHAHEER_THEME_VERSION', '1.1.0');
define('SHAHEER_THEME_DIR', get_template_directory());
define('SHAHEER_THEME_URI', get_template_directory_uri());

/**
 * Include Core Theme Modules
 */
require_once SHAHEER_THEME_DIR . '/inc/custom-post-types.php';
require_once SHAHEER_THEME_DIR . '/inc/custom-fields.php';
require_once SHAHEER_THEME_DIR . '/inc/admin-settings.php';
require_once SHAHEER_THEME_DIR . '/inc/ajax-handlers.php';
require_once SHAHEER_THEME_DIR . '/inc/sample-data.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function shaheer_gems_setup() {
    // Make theme available for translation
    load_theme_textdomain('shaheer-gems', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(600, 600, true);
    add_image_size('gemstone-card', 500, 500, true);
    add_image_size('gemstone-single', 900, 900, false);
    add_image_size('gallery-thumb', 600, 600, true);

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation Menu', 'shaheer-gems'),
        'footer'  => __('Footer Quick Links', 'shaheer-gems'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Custom Logo support
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 420,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Selective Refresh for Widgets in Customizer
    add_theme_support('customize-selective-refresh-widgets');

    // Align wide support for Gutenberg blocks
    add_theme_support('align-wide');

    // Responsive embedded content
    add_theme_support('responsive-embeds');

    // Elementor Compatibility Support
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'shaheer_gems_setup');

/**
 * Enqueue scripts and styles.
 */
function shaheer_gems_scripts() {
    // Google Fonts: Cinzel, Playfair Display, Montserrat, Cormorant Garamond
    wp_enqueue_style(
        'shaheer-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,400;1,600&family=Montserrat:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main Theme Stylesheet
    wp_enqueue_style('shaheer-style', get_stylesheet_uri(), array(), SHAHEER_THEME_VERSION);
    wp_enqueue_style('shaheer-main', SHAHEER_THEME_URI . '/assets/css/main.css', array('shaheer-style'), SHAHEER_THEME_VERSION);

    // Main JavaScript
    wp_enqueue_script('shaheer-main-js', SHAHEER_THEME_URI . '/assets/js/main.js', array(), SHAHEER_THEME_VERSION, true);

    // Localize Script for AJAX & Business Config
    wp_localize_script('shaheer-main-js', 'shaheerThemeData', array(
        'ajaxUrl'        => admin_url('admin-ajax.php'),
        'nonce'          => wp_create_nonce('shaheer_contact_action'),
        'siteUrl'        => home_url('/'),
        'whatsappNumber' => shaheer_get_option('shaheer_whatsapp_number', '+94 77 707 2131')
    ));
}
add_action('wp_enqueue_scripts', 'shaheer_gems_scripts');

/**
 * Enqueue scripts and styles in WordPress Admin for Theme Custom Fields & Media Uploader
 */
function shaheer_gems_admin_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_media();
        wp_enqueue_style('shaheer-admin-css', SHAHEER_THEME_URI . '/assets/css/admin.css', array(), SHAHEER_THEME_VERSION);
        wp_enqueue_script('shaheer-admin-js', SHAHEER_THEME_URI . '/assets/js/admin.js', array('jquery'), SHAHEER_THEME_VERSION, true);
    }
}
add_action('admin_enqueue_scripts', 'shaheer_gems_admin_scripts');

/**
 * Custom Elementor Canvas & Header Footer support
 */
function shaheer_gems_elementor_support() {
    add_post_type_support('gemstone', 'elementor');
}
add_action('elementor/init', 'shaheer_gems_elementor_support');

/**
 * Helper: Format Gemstone Price
 */
function shaheer_format_price($price_val, $mode = 'show_price') {
    if ($mode === 'price_on_request' || empty($price_val)) {
        return __('Price on Request', 'shaheer-gems');
    }
    $currency = shaheer_get_option('shaheer_currency_symbol', 'Rs.');
    return esc_html($currency . ' ' . number_format((float)$price_val));
}
