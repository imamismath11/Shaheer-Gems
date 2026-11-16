<?php
/**
 * Custom Meta Boxes & Fields for Gemstone Details & Homepage Editor in WordPress Admin
 *
 * @package Shaheer_Gems
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Meta Boxes
 */
function shaheer_gems_add_meta_boxes($post_type, $post) {
    // 1. Gemstone Details Meta Box
    add_meta_box(
        'shaheer_gemstone_details',
        __('Gemstone Specifications & Inventory Data', 'shaheer-gems'),
        'shaheer_gems_render_details_metabox',
        'gemstone',
        'normal',
        'high'
    );

    // 2. Homepage Content & Design Meta Box
    // Appears when editing any page that is the Front Page, named Home, or using front-page template
    if ($post_type === 'page' && is_object($post)) {
        $front_page_id = (int) get_option('page_on_front');
        $is_home_slug  = in_array($post->post_name, array('home', 'homepage', 'front-page'));
        $is_home_title = in_array(strtolower(trim($post->post_title)), array('home', 'homepage'));
        $page_template = get_page_template_slug($post->ID);
        $is_front_tpl  = ($page_template === 'front-page.php' || $page_template === 'page-home.php');

        if ($post->ID === $front_page_id || $is_home_slug || $is_home_title || $is_front_tpl || empty($front_page_id)) {
            add_meta_box(
                'shaheer_homepage_editor',
                __('Shaheer Gems – Homepage Content & Section Settings', 'shaheer-gems'),
                'shaheer_gems_render_homepage_metabox',
                'page',
                'normal',
                'high'
            );
        }
    }
}
add_action('add_meta_boxes', 'shaheer_gems_add_meta_boxes', 10, 2);

/**
 * Render Gemstone Inventory Meta Box
 */
function shaheer_gems_render_details_metabox($post) {
    wp_nonce_field('shaheer_gems_save_meta', 'shaheer_gems_meta_nonce');

    $gem_id          = get_post_meta($post->ID, '_gem_id', true);
    $gem_carat       = get_post_meta($post->ID, '_gem_carat', true);
    $gem_color       = get_post_meta($post->ID, '_gem_color', true);
    $gem_cut         = get_post_meta($post->ID, '_gem_cut', true);
    $gem_clarity     = get_post_meta($post->ID, '_gem_clarity', true);
    $gem_origin      = get_post_meta($post->ID, '_gem_origin', true);
    $gem_treatment   = get_post_meta($post->ID, '_gem_treatment', true);
    $gem_dimensions  = get_post_meta($post->ID, '_gem_dimensions', true);
    $gem_cert        = get_post_meta($post->ID, '_gem_certification', true);
    $gem_price       = get_post_meta($post->ID, '_gem_price', true);
    $gem_price_mode  = get_post_meta($post->ID, '_gem_price_mode', true);
    $gem_status      = get_post_meta($post->ID, '_gem_status', true);
    $gem_is_featured = get_post_meta($post->ID, '_gem_is_featured', true);

    if (empty($gem_status)) $gem_status = 'available';
    if (empty($gem_price_mode)) $gem_price_mode = 'price_on_request';
    if (empty($gem_origin)) $gem_origin = 'Sri Lanka (Ceylon)';
    ?>
    <style>
        .shaheer-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px 24px; padding: 12px 0; }
        .shaheer-meta-field { display: flex; flex-direction: column; }
        .shaheer-meta-field label { font-weight: 600; margin-bottom: 6px; color: #123A70; }
        .shaheer-meta-field input[type="text"],
        .shaheer-meta-field input[type="number"],
        .shaheer-meta-field select { width: 100%; padding: 8px 12px; border: 1px solid #C5A059; border-radius: 4px; }
        .shaheer-meta-full { grid-column: span 2; }
        .shaheer-meta-checkbox { display: flex; align-items: center; gap: 8px; margin-top: 8px; }
        .shaheer-meta-help { font-size: 11px; color: #666; margin-top: 4px; }
    </style>

    <div class="shaheer-meta-grid">
        <div class="shaheer-meta-field">
            <label for="gem_id"><?php _e('Gem ID / Stock Code', 'shaheer-gems'); ?> *</label>
            <input type="text" id="gem_id" name="gem_id" value="<?php echo esc_attr($gem_id); ?>" placeholder="e.g. SG001" required />
            <span class="shaheer-meta-help"><?php _e('Unique identifier used in customer WhatsApp inquiries.', 'shaheer-gems'); ?></span>
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_carat"><?php _e('Carat Weight (ct)', 'shaheer-gems'); ?> *</label>
            <input type="text" id="gem_carat" name="gem_carat" value="<?php echo esc_attr($gem_carat); ?>" placeholder="e.g. 2.85" required />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_color"><?php _e('Color Tone / Description', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_color" name="gem_color" value="<?php echo esc_attr($gem_color); ?>" placeholder="e.g. Royal Blue / Vivid Cornflower" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_cut"><?php _e('Shape & Cut Style', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_cut" name="gem_cut" value="<?php echo esc_attr($gem_cut); ?>" placeholder="e.g. Cushion Mixed Cut, Oval Brilliant" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_clarity"><?php _e('Clarity Grade', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_clarity" name="gem_clarity" value="<?php echo esc_attr($gem_clarity); ?>" placeholder="e.g. Eye Clean / VVS / Loupe Clean" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_origin"><?php _e('Origin', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_origin" name="gem_origin" value="<?php echo esc_attr($gem_origin); ?>" placeholder="e.g. Ratnapura, Sri Lanka (Ceylon)" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_treatment"><?php _e('Treatment / Enhancement', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_treatment" name="gem_treatment" value="<?php echo esc_attr($gem_treatment); ?>" placeholder="e.g. Natural Unheated / None" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_dimensions"><?php _e('Dimensions (mm)', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_dimensions" name="gem_dimensions" value="<?php echo esc_attr($gem_dimensions); ?>" placeholder="e.g. 8.42 x 7.15 x 5.10 mm" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_certification"><?php _e('Certification', 'shaheer-gems'); ?></label>
            <input type="text" id="gem_certification" name="gem_certification" value="<?php echo esc_attr($gem_cert); ?>" placeholder="e.g. NGJA Certified / GIA / Certified on Request" />
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_status"><?php _e('Availability Status', 'shaheer-gems'); ?></label>
            <select id="gem_status" name="gem_status">
                <option value="available" <?php selected($gem_status, 'available'); ?>><?php _e('Available (In Stock)', 'shaheer-gems'); ?></option>
                <option value="reserved" <?php selected($gem_status, 'reserved'); ?>><?php _e('Reserved', 'shaheer-gems'); ?></option>
                <option value="sold" <?php selected($gem_status, 'sold'); ?>><?php _e('Sold', 'shaheer-gems'); ?></option>
            </select>
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_price_mode"><?php _e('Pricing Display Mode', 'shaheer-gems'); ?></label>
            <select id="gem_price_mode" name="gem_price_mode">
                <option value="price_on_request" <?php selected($gem_price_mode, 'price_on_request'); ?>><?php _e('Price on Request (Recommended for High Value)', 'shaheer-gems'); ?></option>
                <option value="show_price" <?php selected($gem_price_mode, 'show_price'); ?>><?php _e('Show Numerical Price', 'shaheer-gems'); ?></option>
            </select>
        </div>

        <div class="shaheer-meta-field">
            <label for="gem_price"><?php _e('Price (LKR or USD Value)', 'shaheer-gems'); ?></label>
            <input type="number" id="gem_price" name="gem_price" value="<?php echo esc_attr($gem_price); ?>" placeholder="e.g. 150000" />
            <span class="shaheer-meta-help"><?php _e('Used for price filtering and displayed if numerical price mode is chosen.', 'shaheer-gems'); ?></span>
        </div>

        <div class="shaheer-meta-full shaheer-meta-checkbox">
            <input type="checkbox" id="gem_is_featured" name="gem_is_featured" value="1" <?php checked($gem_is_featured, '1'); ?> />
            <label for="gem_is_featured" style="margin: 0; font-weight: 600; color: #123A70; cursor: pointer;">
                <?php _e('Display this Gemstone in Homepage "Featured Gemstones" Section', 'shaheer-gems'); ?>
            </label>
        </div>
    </div>
    <?php
}

/**
 * Render Homepage Content Editor Meta Box
 */
function shaheer_gems_render_homepage_metabox($post) {
    wp_nonce_field('shaheer_gems_save_homepage_meta', 'shaheer_homepage_meta_nonce');

    // Retrieve Hero fields
    $hero_badge      = get_post_meta($post->ID, '_hero_badge', true) ?: 'Premier Sri Lankan Gemstone Dealer';
    $hero_title      = get_post_meta($post->ID, '_hero_title', true) ?: 'SHAHEER GEMS';
    $hero_subtitle   = get_post_meta($post->ID, '_hero_subtitle', true) ?: 'Discover the Timeless Beauty of Precious Gemstones';
    $hero_desc       = get_post_meta($post->ID, '_hero_desc', true) ?: 'Explore an exquisite collection of beautiful gemstones, carefully selected for their brilliance, elegance and unique characteristics.';
    $hero_btn1_text  = get_post_meta($post->ID, '_hero_btn1_text', true) ?: 'Explore Gemstones';
    $hero_btn1_link  = get_post_meta($post->ID, '_hero_btn1_link', true) ?: home_url('/gemstones/');
    $hero_btn2_text  = get_post_meta($post->ID, '_hero_btn2_text', true) ?: 'Contact Us';
    $hero_btn2_link  = get_post_meta($post->ID, '_hero_btn2_link', true) ?: home_url('/contact/');
    $hero_img        = get_post_meta($post->ID, '_hero_img', true) ?: '';
    $hero_gem_title  = get_post_meta($post->ID, '_hero_gem_title', true) ?: 'Ceylon Royal Blue Sapphire';
    $hero_gem_sub    = get_post_meta($post->ID, '_hero_gem_sub', true) ?: '3.45 Carats • Unheated • Ratnapura Origin';
    $hero_trust1     = get_post_meta($post->ID, '_hero_trust1', true) ?: '100% Natural Ceylon Gems';
    $hero_trust2     = get_post_meta($post->ID, '_hero_trust2', true) ?: 'Worldwide Insured Shipping';
    $hero_trust3     = get_post_meta($post->ID, '_hero_trust3', true) ?: 'Authenticity Guaranteed';

    // Retrieve About fields
    $about_subtitle  = get_post_meta($post->ID, '_about_subtitle', true) ?: 'CRAFT & INTEGRITY';
    $about_title     = get_post_meta($post->ID, '_about_title', true) ?: 'ABOUT SHAHEER GEMS';
    $about_lead      = get_post_meta($post->ID, '_about_lead', true) ?: 'Welcome to Shaheer Gems, where the natural beauty of precious gemstones meets elegance and craftsmanship.';
    $about_body1     = get_post_meta($post->ID, '_about_body1', true) ?: 'Based in Sri Lanka, we are dedicated to presenting a beautiful selection of gemstones to customers who appreciate quality, rarity and timeless beauty. Sourcing directly from reputable mines in Ratnapura, Elahera, and renowned Ceylon gem deposits, our collection showcases natural brilliance and exceptional character.';
    $about_body2     = get_post_meta($post->ID, '_about_body2', true) ?: 'Every gem in our inventory is carefully inspected and presented with complete transparency regarding cut, clarity, treatment status, and origin.';
    $about_btn_text  = get_post_meta($post->ID, '_about_btn_text', true) ?: 'Learn More About Us';
    $about_btn_link  = get_post_meta($post->ID, '_about_btn_link', true) ?: home_url('/about/');
    $about_img       = get_post_meta($post->ID, '_about_img', true) ?: '';
    $about_badge_ttl = get_post_meta($post->ID, '_about_badge_title', true) ?: 'Island of Gems';
    $about_badge_sub = get_post_meta($post->ID, '_about_badge_sub', true) ?: 'Pure Natural Ceylon Corundum';

    // Retrieve Featured fields
    $feat_subtitle   = get_post_meta($post->ID, '_featured_subtitle', true) ?: 'HAND-SELECTED PIECES';
    $feat_title      = get_post_meta($post->ID, '_featured_title', true) ?: 'FEATURED GEMSTONES';
    $feat_desc       = get_post_meta($post->ID, '_featured_desc', true) ?: 'Browse a curated selection of our finest precious gemstones, each accompanied by comprehensive gemological details.';
    $feat_count      = get_post_meta($post->ID, '_featured_count', true) ?: '8';

    // Retrieve CTA fields
    $cta_subtitle    = get_post_meta($post->ID, '_cta_subtitle', true) ?: 'BESPOKE SOURCING';
    $cta_title       = get_post_meta($post->ID, '_cta_title', true) ?: 'Looking for Your Perfect Gemstone?';
    $cta_desc        = get_post_meta($post->ID, '_cta_desc', true) ?: 'Explore our collection or contact us to find a gemstone that suits your preferences.';
    $cta_btn1_text   = get_post_meta($post->ID, '_cta_btn1_text', true) ?: 'Contact Us';
    $cta_btn1_link   = get_post_meta($post->ID, '_cta_btn1_link', true) ?: home_url('/contact/');
    $cta_btn2_text   = get_post_meta($post->ID, '_cta_btn2_text', true) ?: 'WhatsApp Inquiry';

    // Contact info sync
    $contact_phone   = shaheer_get_option('shaheer_phone_number');
    $contact_wa      = shaheer_get_option('shaheer_whatsapp_number');
    $contact_email   = shaheer_get_option('shaheer_email_address');
    $contact_address = shaheer_get_option('shaheer_office_address');
    ?>

    <div class="shaheer-admin-wrap">
        <div class="shaheer-section-callout">
            <strong><?php _e('✨ Live Homepage Editor:', 'shaheer-gems'); ?></strong>
            <?php _e('All changes made in these tabs update your homepage immediately upon clicking the "Update" button.', 'shaheer-gems'); ?>
        </div>

        <!-- Navigation Tabs -->
        <div class="shaheer-tab-nav">
            <button type="button" class="shaheer-tab-btn active" data-tab="tab-hero">
                <span class="dashicons dashicons-slides"></span> <?php _e('1. Hero Banner', 'shaheer-gems'); ?>
            </button>
            <button type="button" class="shaheer-tab-btn" data-tab="tab-about">
                <span class="dashicons dashicons-businessman"></span> <?php _e('2. About Us Section', 'shaheer-gems'); ?>
            </button>
            <button type="button" class="shaheer-tab-btn" data-tab="tab-featured">
                <span class="dashicons dashicons-awards"></span> <?php _e('3. Featured Gemstones', 'shaheer-gems'); ?>
            </button>
            <button type="button" class="shaheer-tab-btn" data-tab="tab-cta">
                <span class="dashicons dashicons-megaphone"></span> <?php _e('4. Contact Call-to-Action', 'shaheer-gems'); ?>
            </button>
            <button type="button" class="shaheer-tab-btn" data-tab="tab-contact">
                <span class="dashicons dashicons-phone"></span> <?php _e('5. Business Contact Info', 'shaheer-gems'); ?>
            </button>
        </div>

        <!-- Tab 1: Hero Banner -->
        <div id="tab-hero" class="shaheer-tab-pane active">
            <div class="shaheer-field-grid">
                <div class="shaheer-form-group">
                    <label for="hero_title"><?php _e('Main Homepage Heading', 'shaheer-gems'); ?> *</label>
                    <input type="text" id="hero_title" name="hero_title" value="<?php echo esc_attr($hero_title); ?>" required />
                    <span class="shaheer-field-desc"><?php _e('Default: SHAHEER GEMS', 'shaheer-gems'); ?></span>
                </div>

                <div class="shaheer-form-group">
                    <label for="hero_badge"><?php _e('Hero Badge Text', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_badge" name="hero_badge" value="<?php echo esc_attr($hero_badge); ?>" />
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="hero_subtitle"><?php _e('Hero Subtitle / Tagline', 'shaheer-gems'); ?> *</label>
                    <input type="text" id="hero_subtitle" name="hero_subtitle" value="<?php echo esc_attr($hero_subtitle); ?>" required />
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="hero_desc"><?php _e('Hero Supporting Description', 'shaheer-gems'); ?></label>
                    <textarea id="hero_desc" name="hero_desc" rows="3"><?php echo esc_textarea($hero_desc); ?></textarea>
                </div>

                <div class="shaheer-form-group">
                    <label for="hero_btn1_text"><?php _e('Primary Button Text', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_btn1_text" name="hero_btn1_text" value="<?php echo esc_attr($hero_btn1_text); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="hero_btn1_link"><?php _e('Primary Button Link', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_btn1_link" name="hero_btn1_link" value="<?php echo esc_attr($hero_btn1_link); ?>" />
                </div>

                <div class="shaheer-form-group">
                    <label for="hero_btn2_text"><?php _e('Secondary Button Text', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_btn2_text" name="hero_btn2_text" value="<?php echo esc_attr($hero_btn2_text); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="hero_btn2_link"><?php _e('Secondary Button Link', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_btn2_link" name="hero_btn2_link" value="<?php echo esc_attr($hero_btn2_link); ?>" />
                </div>

                <!-- Hero Image Upload with Media Library -->
                <div class="shaheer-form-group shaheer-field-full">
                    <label><?php _e('Hero Showcase Gemstone Image', 'shaheer-gems'); ?></label>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <input type="text" id="hero_img" name="hero_img" value="<?php echo esc_attr($hero_img); ?>" placeholder="<?php _e('Leave blank to use default Ceylon Blue Sapphire SVG', 'shaheer-gems'); ?>" style="flex: 1;" />
                        <button type="button" class="shaheer-upload-btn" data-target="hero_img" data-preview="hero_img_preview"><?php _e('Upload / Choose Image', 'shaheer-gems'); ?></button>
                        <button type="button" class="shaheer-remove-btn" data-target="hero_img" data-preview="hero_img_preview"><?php _e('Remove', 'shaheer-gems'); ?></button>
                    </div>
                    <div class="shaheer-img-preview-box">
                        <img id="hero_img_preview" src="<?php echo esc_url($hero_img); ?>" alt="Hero Preview" />
                    </div>
                </div>

                <div class="shaheer-form-group">
                    <label for="hero_gem_title"><?php _e('Showcase Card Gem Title', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_gem_title" name="hero_gem_title" value="<?php echo esc_attr($hero_gem_title); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="hero_gem_sub"><?php _e('Showcase Card Gem Subtitle', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_gem_sub" name="hero_gem_sub" value="<?php echo esc_attr($hero_gem_sub); ?>" />
                </div>

                <!-- Trust Badges -->
                <div class="shaheer-form-group">
                    <label for="hero_trust1"><?php _e('Trust Badge 1', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_trust1" name="hero_trust1" value="<?php echo esc_attr($hero_trust1); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="hero_trust2"><?php _e('Trust Badge 2', 'shaheer-gems'); ?></label>
                    <input type="text" id="hero_trust2" name="hero_trust2" value="<?php echo esc_attr($hero_trust2); ?>" />
                </div>
            </div>
        </div>

        <!-- Tab 2: About Us -->
        <div id="tab-about" class="shaheer-tab-pane">
            <div class="shaheer-field-grid">
                <div class="shaheer-form-group">
                    <label for="about_subtitle"><?php _e('Section Subtitle / Tagline', 'shaheer-gems'); ?></label>
                    <input type="text" id="about_subtitle" name="about_subtitle" value="<?php echo esc_attr($about_subtitle); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="about_title"><?php _e('Main Section Heading', 'shaheer-gems'); ?></label>
                    <input type="text" id="about_title" name="about_title" value="<?php echo esc_attr($about_title); ?>" />
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="about_lead"><?php _e('Introduction Lead Paragraph', 'shaheer-gems'); ?></label>
                    <textarea id="about_lead" name="about_lead" rows="2"><?php echo esc_textarea($about_lead); ?></textarea>
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="about_body1"><?php _e('Body Paragraph 1', 'shaheer-gems'); ?></label>
                    <textarea id="about_body1" name="about_body1" rows="3"><?php echo esc_textarea($about_body1); ?></textarea>
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="about_body2"><?php _e('Body Paragraph 2', 'shaheer-gems'); ?></label>
                    <textarea id="about_body2" name="about_body2" rows="3"><?php echo esc_textarea($about_body2); ?></textarea>
                </div>

                <div class="shaheer-form-group">
                    <label for="about_btn_text"><?php _e('Learn More Button Text', 'shaheer-gems'); ?></label>
                    <input type="text" id="about_btn_text" name="about_btn_text" value="<?php echo esc_attr($about_btn_text); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="about_btn_link"><?php _e('Learn More Button Link', 'shaheer-gems'); ?></label>
                    <input type="text" id="about_btn_link" name="about_btn_link" value="<?php echo esc_attr($about_btn_link); ?>" />
                </div>

                <!-- About Image Upload -->
                <div class="shaheer-form-group shaheer-field-full">
                    <label><?php _e('About Craft Photography / Image', 'shaheer-gems'); ?></label>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <input type="text" id="about_img" name="about_img" value="<?php echo esc_attr($about_img); ?>" placeholder="<?php _e('Leave blank to use default precision inspection graphic', 'shaheer-gems'); ?>" style="flex: 1;" />
                        <button type="button" class="shaheer-upload-btn" data-target="about_img" data-preview="about_img_preview"><?php _e('Upload / Choose Image', 'shaheer-gems'); ?></button>
                        <button type="button" class="shaheer-remove-btn" data-target="about_img" data-preview="about_img_preview"><?php _e('Remove', 'shaheer-gems'); ?></button>
                    </div>
                    <div class="shaheer-img-preview-box">
                        <img id="about_img_preview" src="<?php echo esc_url($about_img); ?>" alt="About Preview" />
                    </div>
                </div>

                <div class="shaheer-form-group">
                    <label for="about_badge_title"><?php _e('Floating Badge Main Title', 'shaheer-gems'); ?></label>
                    <input type="text" id="about_badge_title" name="about_badge_title" value="<?php echo esc_attr($about_badge_ttl); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="about_badge_sub"><?php _e('Floating Badge Subtitle', 'shaheer-gems'); ?></label>
                    <input type="text" id="about_badge_sub" name="about_badge_sub" value="<?php echo esc_attr($about_badge_sub); ?>" />
                </div>
            </div>
        </div>

        <!-- Tab 3: Featured Gemstones -->
        <div id="tab-featured" class="shaheer-tab-pane">
            <div class="shaheer-field-grid">
                <div class="shaheer-form-group">
                    <label for="featured_subtitle"><?php _e('Section Subtitle', 'shaheer-gems'); ?></label>
                    <input type="text" id="featured_subtitle" name="featured_subtitle" value="<?php echo esc_attr($feat_subtitle); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="featured_title"><?php _e('Section Title', 'shaheer-gems'); ?></label>
                    <input type="text" id="featured_title" name="featured_title" value="<?php echo esc_attr($feat_title); ?>" />
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="featured_desc"><?php _e('Section Description', 'shaheer-gems'); ?></label>
                    <textarea id="featured_desc" name="featured_desc" rows="2"><?php echo esc_textarea($feat_desc); ?></textarea>
                </div>

                <div class="shaheer-form-group">
                    <label for="featured_count"><?php _e('Maximum Gemstones to Display', 'shaheer-gems'); ?></label>
                    <input type="number" id="featured_count" name="featured_count" value="<?php echo esc_attr($feat_count); ?>" min="1" max="24" />
                    <span class="shaheer-field-desc"><?php _e('Displays gemstones marked as "Featured" in the Gemstones menu. If fewer are marked, it displays latest in inventory.', 'shaheer-gems'); ?></span>
                </div>
            </div>
        </div>

        <!-- Tab 4: Contact CTA -->
        <div id="tab-cta" class="shaheer-tab-pane">
            <div class="shaheer-field-grid">
                <div class="shaheer-form-group">
                    <label for="cta_subtitle"><?php _e('Banner Tagline', 'shaheer-gems'); ?></label>
                    <input type="text" id="cta_subtitle" name="cta_subtitle" value="<?php echo esc_attr($cta_subtitle); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="cta_title"><?php _e('Banner Heading', 'shaheer-gems'); ?></label>
                    <input type="text" id="cta_title" name="cta_title" value="<?php echo esc_attr($cta_title); ?>" />
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="cta_desc"><?php _e('Banner Description', 'shaheer-gems'); ?></label>
                    <textarea id="cta_desc" name="cta_desc" rows="2"><?php echo esc_textarea($cta_desc); ?></textarea>
                </div>

                <div class="shaheer-form-group">
                    <label for="cta_btn1_text"><?php _e('Contact Us Button Label', 'shaheer-gems'); ?></label>
                    <input type="text" id="cta_btn1_text" name="cta_btn1_text" value="<?php echo esc_attr($cta_btn1_text); ?>" />
                </div>
                <div class="shaheer-form-group">
                    <label for="cta_btn1_link"><?php _e('Contact Us Button Link', 'shaheer-gems'); ?></label>
                    <input type="text" id="cta_btn1_link" name="cta_btn1_link" value="<?php echo esc_attr($cta_btn1_link); ?>" />
                </div>

                <div class="shaheer-form-group shaheer-field-full">
                    <label for="cta_btn2_text"><?php _e('WhatsApp Button Label', 'shaheer-gems'); ?></label>
                    <input type="text" id="cta_btn2_text" name="cta_btn2_text" value="<?php echo esc_attr($cta_btn2_text); ?>" />
                </div>
            </div>
        </div>

        <!-- Tab 5: Business Contact Info -->
        <div id="tab-contact" class="shaheer-tab-pane">
            <p style="margin-top: 0; color: #555;">
                <?php _e('These contact details are automatically used across your Header, Footer, Contact Page, and WhatsApp Inquiry buttons. You can update them right here or under ', 'shaheer-gems'); ?>
                <a href="<?php echo admin_url('admin.php?page=shaheer-gems-settings'); ?>" target="_blank" style="font-weight: 600; color: #C5A059;"><?php _e('Shaheer Gems Settings &rarr;', 'shaheer-gems'); ?></a>
            </p>
            <div class="shaheer-field-grid">
                <div class="shaheer-form-group">
                    <label for="home_wa"><?php _e('WhatsApp Number (with country code)', 'shaheer-gems'); ?> *</label>
                    <input type="text" id="home_wa" name="home_wa" value="<?php echo esc_attr($contact_wa); ?>" />
                    <span class="shaheer-field-desc"><?php _e('e.g. +94 77 707 2131', 'shaheer-gems'); ?></span>
                </div>
                <div class="shaheer-form-group">
                    <label for="home_phone"><?php _e('Showroom Phone', 'shaheer-gems'); ?></label>
                    <input type="text" id="home_phone" name="home_phone" value="<?php echo esc_attr($contact_phone); ?>" />
                </div>
                <div class="shaheer-form-group shaheer-field-full">
                    <label for="home_email"><?php _e('Inquiry Email Address', 'shaheer-gems'); ?></label>
                    <input type="email" id="home_email" name="home_email" value="<?php echo esc_attr($contact_email); ?>" />
                </div>
                <div class="shaheer-form-group shaheer-field-full">
                    <label for="home_address"><?php _e('Showroom & Office Address', 'shaheer-gems'); ?></label>
                    <textarea id="home_address" name="home_address" rows="2"><?php echo esc_textarea($contact_address); ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Save Meta Box Values
 */
function shaheer_gems_save_meta_box($post_id) {
    // 1. Save Gemstone Meta
    if (isset($_POST['shaheer_gems_meta_nonce']) && wp_verify_nonce($_POST['shaheer_gems_meta_nonce'], 'shaheer_gems_save_meta')) {
        if (!defined('DOING_AUTOSAVE') || !DOING_AUTOSAVE) {
            if (current_user_can('edit_post', $post_id)) {
                $fields = array(
                    '_gem_id'          => 'sanitize_text_field',
                    '_gem_carat'       => 'sanitize_text_field',
                    '_gem_color'       => 'sanitize_text_field',
                    '_gem_cut'         => 'sanitize_text_field',
                    '_gem_clarity'     => 'sanitize_text_field',
                    '_gem_origin'      => 'sanitize_text_field',
                    '_gem_treatment'   => 'sanitize_text_field',
                    '_gem_dimensions'  => 'sanitize_text_field',
                    '_gem_certification'=> 'sanitize_text_field',
                    '_gem_status'      => 'sanitize_text_field',
                    '_gem_price_mode'  => 'sanitize_text_field',
                    '_gem_price'       => 'sanitize_text_field',
                );

                foreach ($fields as $key => $sanitizer) {
                    $post_key = ltrim($key, '_');
                    if (isset($_POST[$post_key])) {
                        update_post_meta($post_id, $key, call_user_func($sanitizer, $_POST[$post_key]));
                    }
                }

                $is_featured = isset($_POST['gem_is_featured']) ? '1' : '0';
                update_post_meta($post_id, '_gem_is_featured', $is_featured);
            }
        }
    }

    // 2. Save Homepage Editor Meta
    if (isset($_POST['shaheer_homepage_meta_nonce']) && wp_verify_nonce($_POST['shaheer_homepage_meta_nonce'], 'shaheer_gems_save_homepage_meta')) {
        if (!defined('DOING_AUTOSAVE') || !DOING_AUTOSAVE) {
            if (current_user_can('edit_page', $post_id)) {
                $hp_fields = array(
                    // Hero
                    '_hero_badge'       => 'sanitize_text_field',
                    '_hero_title'       => 'sanitize_text_field',
                    '_hero_subtitle'    => 'sanitize_text_field',
                    '_hero_desc'        => 'sanitize_textarea_field',
                    '_hero_btn1_text'   => 'sanitize_text_field',
                    '_hero_btn1_link'   => 'esc_url_raw',
                    '_hero_btn2_text'   => 'sanitize_text_field',
                    '_hero_btn2_link'   => 'esc_url_raw',
                    '_hero_img'         => 'esc_url_raw',
                    '_hero_gem_title'   => 'sanitize_text_field',
                    '_hero_gem_sub'     => 'sanitize_text_field',
                    '_hero_trust1'      => 'sanitize_text_field',
                    '_hero_trust2'      => 'sanitize_text_field',
                    // About
                    '_about_subtitle'   => 'sanitize_text_field',
                    '_about_title'      => 'sanitize_text_field',
                    '_about_lead'       => 'sanitize_textarea_field',
                    '_about_body1'      => 'sanitize_textarea_field',
                    '_about_body2'      => 'sanitize_textarea_field',
                    '_about_btn_text'   => 'sanitize_text_field',
                    '_about_btn_link'   => 'esc_url_raw',
                    '_about_img'        => 'esc_url_raw',
                    '_about_badge_title'=> 'sanitize_text_field',
                    '_about_badge_sub'  => 'sanitize_text_field',
                    // Featured
                    '_featured_subtitle'=> 'sanitize_text_field',
                    '_featured_title'   => 'sanitize_text_field',
                    '_featured_desc'    => 'sanitize_textarea_field',
                    '_featured_count'   => 'intval',
                    // CTA
                    '_cta_subtitle'     => 'sanitize_text_field',
                    '_cta_title'        => 'sanitize_text_field',
                    '_cta_desc'         => 'sanitize_textarea_field',
                    '_cta_btn1_text'    => 'sanitize_text_field',
                    '_cta_btn1_link'    => 'esc_url_raw',
                    '_cta_btn2_text'    => 'sanitize_text_field',
                );

                foreach ($hp_fields as $meta_key => $sanitizer) {
                    $form_key = ltrim($meta_key, '_');
                    if (isset($_POST[$form_key])) {
                        update_post_meta($post_id, $meta_key, call_user_func($sanitizer, $_POST[$form_key]));
                    }
                }

                // Sync contact info options if submitted
                if (!empty($_POST['home_wa'])) {
                    update_option('shaheer_whatsapp_number', sanitize_text_field($_POST['home_wa']));
                }
                if (!empty($_POST['home_phone'])) {
                    update_option('shaheer_phone_number', sanitize_text_field($_POST['home_phone']));
                }
                if (!empty($_POST['home_email'])) {
                    update_option('shaheer_email_address', sanitize_email($_POST['home_email']));
                }
                if (!empty($_POST['home_address'])) {
                    update_option('shaheer_office_address', sanitize_textarea_field($_POST['home_address']));
                }
            }
        }
    }
}
add_action('save_post', 'shaheer_gems_save_meta_box');
