<?php
/**
 * Shaheer Gems Business & WhatsApp Settings Page
 *
 * @package Shaheer_Gems
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Admin Menu & Settings
 */
function shaheer_gems_register_admin_menu() {
    add_menu_page(
        __('Shaheer Gems Settings', 'shaheer-gems'),
        __('Shaheer Gems', 'shaheer-gems'),
        'manage_options',
        'shaheer-gems-settings',
        'shaheer_gems_render_settings_page',
        'dashicons-star-filled',
        30
    );
}
add_action('admin_menu', 'shaheer_gems_register_admin_menu');

function shaheer_gems_register_settings() {
    register_setting('shaheer_gems_options_group', 'shaheer_whatsapp_number', array('sanitize_callback' => 'sanitize_text_field'));
    register_setting('shaheer_gems_options_group', 'shaheer_phone_number', array('sanitize_callback' => 'sanitize_text_field'));
    register_setting('shaheer_gems_options_group', 'shaheer_email_address', array('sanitize_callback' => 'sanitize_email'));
    register_setting('shaheer_gems_options_group', 'shaheer_office_address', array('sanitize_callback' => 'sanitize_textarea_field'));
    register_setting('shaheer_gems_options_group', 'shaheer_business_hours', array('sanitize_callback' => 'sanitize_text_field'));
    register_setting('shaheer_gems_options_group', 'shaheer_currency_symbol', array('sanitize_callback' => 'sanitize_text_field'));
    register_setting('shaheer_gems_options_group', 'shaheer_facebook_url', array('sanitize_callback' => 'esc_url_raw'));
    register_setting('shaheer_gems_options_group', 'shaheer_instagram_url', array('sanitize_callback' => 'esc_url_raw'));
    register_setting('shaheer_gems_options_group', 'shaheer_google_map_embed', array('sanitize_callback' => 'esc_url_raw'));
}
add_action('admin_init', 'shaheer_gems_register_settings');

/**
 * Helper to get business option with default fallback
 */
function shaheer_get_option($key, $default = '') {
    $val = get_option($key);
    if (!empty($val)) {
        return $val;
    }
    $defaults = array(
        'shaheer_whatsapp_number' => '+94 77 707 2131',
        'shaheer_phone_number'    => '+94 11 232 2131',
        'shaheer_email_address'   => 'info@shaheergems.com',
        'shaheer_office_address'  => 'No. 88, Galle Face Terrace, Colombo 03, Sri Lanka',
        'shaheer_business_hours'  => 'Mon - Sat: 9:30 AM - 6:30 PM (IST)',
        'shaheer_currency_symbol' => 'Rs.',
        'shaheer_facebook_url'    => 'https://facebook.com/shaheergems',
        'shaheer_instagram_url'   => 'https://instagram.com/shaheergems',
        'shaheer_google_map_embed'=> 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798511757657!2d79.8436!3d6.9147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593b4e6a6a4f%3A0x6b72a4d33a1e2f7!2sColombo!5e0!3m2!1sen!2slk!4v1600000000000!5m2!1sen!2slk'
    );
    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

/**
 * Render Settings Page
 */
function shaheer_gems_render_settings_page() {
    ?>
    <div class="wrap">
        <h1 style="color: #123A70; font-family: Georgia, serif;"><?php _e('SHAHEER GEMS – Business & WhatsApp Configuration', 'shaheer-gems'); ?></h1>
        <p><?php _e('Configure your business details, contact information, and WhatsApp inquiry numbers used across the entire website.', 'shaheer-gems'); ?></p>

        <form method="post" action="options.php" style="background: #FFFFFF; padding: 25px 35px; border-radius: 8px; border: 1px solid #E8E2D5; max-width: 850px; margin-top: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <?php settings_fields('shaheer_gems_options_group'); ?>
            <?php do_settings_sections('shaheer_gems_options_group'); ?>

            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="shaheer_whatsapp_number"><?php _e('WhatsApp Number *', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_whatsapp_number" type="text" id="shaheer_whatsapp_number" value="<?php echo esc_attr(shaheer_get_option('shaheer_whatsapp_number')); ?>" class="regular-text" required />
                        <p class="description"><?php _e('Include country code, e.g. +94 77 707 2131. Used for all one-click inquiry buttons.', 'shaheer-gems'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_phone_number"><?php _e('Showroom Phone / Landline', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_phone_number" type="text" id="shaheer_phone_number" value="<?php echo esc_attr(shaheer_get_option('shaheer_phone_number')); ?>" class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_email_address"><?php _e('Inquiry Email Address *', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_email_address" type="email" id="shaheer_email_address" value="<?php echo esc_attr(shaheer_get_option('shaheer_email_address')); ?>" class="regular-text" required />
                        <p class="description"><?php _e('Contact form submissions are directed to this email address.', 'shaheer-gems'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_office_address"><?php _e('Business Address', 'shaheer-gems'); ?></label></th>
                    <td>
                        <textarea name="shaheer_office_address" id="shaheer_office_address" rows="3" class="large-text"><?php echo esc_textarea(shaheer_get_option('shaheer_office_address')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_business_hours"><?php _e('Business Hours', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_business_hours" type="text" id="shaheer_business_hours" value="<?php echo esc_attr(shaheer_get_option('shaheer_business_hours')); ?>" class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_currency_symbol"><?php _e('Currency Display Symbol', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_currency_symbol" type="text" id="shaheer_currency_symbol" value="<?php echo esc_attr(shaheer_get_option('shaheer_currency_symbol')); ?>" class="small-text" />
                        <p class="description"><?php _e('e.g. Rs. or $', 'shaheer-gems'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_facebook_url"><?php _e('Facebook Page URL', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_facebook_url" type="url" id="shaheer_facebook_url" value="<?php echo esc_attr(shaheer_get_option('shaheer_facebook_url')); ?>" class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_instagram_url"><?php _e('Instagram Profile URL', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_instagram_url" type="url" id="shaheer_instagram_url" value="<?php echo esc_attr(shaheer_get_option('shaheer_instagram_url')); ?>" class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="shaheer_google_map_embed"><?php _e('Google Map Embed URL', 'shaheer-gems'); ?></label></th>
                    <td>
                        <input name="shaheer_google_map_embed" type="url" id="shaheer_google_map_embed" value="<?php echo esc_attr(shaheer_get_option('shaheer_google_map_embed')); ?>" class="large-text" />
                        <p class="description"><?php _e('Paste the Google Maps iframe embed src URL.', 'shaheer-gems'); ?></p>
                    </td>
                </tr>
            </table>

            <?php submit_button(__('Save Shaheer Gems Settings', 'shaheer-gems')); ?>
        </form>
    </div>
    <?php
}
