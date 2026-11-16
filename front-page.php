<?php
/**
 * The template for displaying the Homepage
 *
 * Fully editable via WordPress Dashboard → Pages → Home → Edit
 *
 * @package Shaheer  Gems
 */

get_header();

// Determine Page ID (either current post ID or designated Front Page)
$front_page_id = (int) get_option('page_on_front');
$post_id       = $front_page_id ?: get_the_ID();

// =========================================================================
// RETRIEVE DYNAMIC HOMEPAGE FIELDS (with elegant defaults)
// =========================================================================

// Hero Section
$hero_badge     = get_post_meta($post_id, '_hero_badge', true) ?: __('Premier Sri Lankan Gemstone Dealer', 'shaheer-gems');
$hero_title     = get_post_meta($post_id, '_hero_title', true) ?: 'SHAHEER GEMS';
$hero_subtitle  = get_post_meta($post_id, '_hero_subtitle', true) ?: __('Discover the Timeless Beauty of Precious Gemstones', 'shaheer-gems');
$hero_desc      = get_post_meta($post_id, '_hero_desc', true) ?: __('Explore an exquisite collection of beautiful gemstones, carefully selected for their brilliance, elegance and unique characteristics.', 'shaheer-gems');
$hero_btn1_text = get_post_meta($post_id, '_hero_btn1_text', true) ?: __('Explore Gemstones', 'shaheer-gems');
$hero_btn1_link = get_post_meta($post_id, '_hero_btn1_link', true) ?: home_url('/gemstones/');
$hero_btn2_text = get_post_meta($post_id, '_hero_btn2_text', true) ?: __('Contact Us', 'shaheer-gems');
$hero_btn2_link = get_post_meta($post_id, '_hero_btn2_link', true) ?: home_url('/contact/');
$hero_img       = get_post_meta($post_id, '_hero_img', true) ?: (get_template_directory_uri() . '/assets/images/gemstones/blue-sapphire.svg');
$hero_gem_title = get_post_meta($post_id, '_hero_gem_title', true) ?: __('Ceylon Royal Blue Sapphire', 'shaheer-gems');
$hero_gem_sub   = get_post_meta($post_id, '_hero_gem_sub', true) ?: __('3.45 Carats • Unheated • Ratnapura Origin', 'shaheer-gems');
$hero_trust1    = get_post_meta($post_id, '_hero_trust1', true) ?: __('100% Natural Ceylon Gems', 'shaheer-gems');
$hero_trust2    = get_post_meta($post_id, '_hero_trust2', true) ?: __('Worldwide Insured Shipping', 'shaheer-gems');
$hero_trust3    = get_post_meta($post_id, '_hero_trust3', true) ?: __('Authenticity Guaranteed', 'shaheer-gems');

// About Section
$about_subtitle  = get_post_meta($post_id, '_about_subtitle', true) ?: __('CRAFT & INTEGRITY', 'shaheer-gems');
$about_title     = get_post_meta($post_id, '_about_title', true) ?: __('ABOUT SHAHEER GEMS', 'shaheer-gems');
$about_lead      = get_post_meta($post_id, '_about_lead', true) ?: __('Welcome to Shaheer Gems, where the natural beauty of precious gemstones meets elegance and craftsmanship.', 'shaheer-gems');
$about_body1     = get_post_meta($post_id, '_about_body1', true) ?: __('Based in Sri Lanka, we are dedicated to presenting a beautiful selection of gemstones to customers who appreciate quality, rarity and timeless beauty. Sourcing directly from reputable mines in Ratnapura, Elahera, and renowned Ceylon gem deposits, our collection showcases natural brilliance and exceptional character.', 'shaheer-gems');
$about_body2     = get_post_meta($post_id, '_about_body2', true) ?: __('Every gem in our inventory is carefully inspected and presented with complete transparency regarding cut, clarity, treatment status, and origin.', 'shaheer-gems');
$about_btn_text  = get_post_meta($post_id, '_about_btn_text', true) ?: __('Learn More About Us', 'shaheer-gems');
$about_btn_link  = get_post_meta($post_id, '_about_btn_link', true) ?: home_url('/about/');
$about_img       = get_post_meta($post_id, '_about_img', true) ?: (get_template_directory_uri() . '/assets/images/about-craft.svg');
$about_badge_ttl = get_post_meta($post_id, '_about_badge_title', true) ?: __('Island of Gems', 'shaheer-gems');
$about_badge_sub = get_post_meta($post_id, '_about_badge_sub', true) ?: __('Pure Natural Ceylon Corundum', 'shaheer-gems');

// Featured Section
$featured_subtitle = get_post_meta($post_id, '_featured_subtitle', true) ?: __('HAND-SELECTED PIECES', 'shaheer-gems');
$featured_title    = get_post_meta($post_id, '_featured_title', true) ?: __('FEATURED GEMSTONES', 'shaheer-gems');
$featured_desc     = get_post_meta($post_id, '_featured_desc', true) ?: __('Browse a curated selection of our finest precious gemstones, each accompanied by comprehensive gemological details.', 'shaheer-gems');
$featured_count    = (int) (get_post_meta($post_id, '_featured_count', true) ?: 8);

// Contact CTA Section
$cta_subtitle  = get_post_meta($post_id, '_cta_subtitle', true) ?: __('BESPOKE SOURCING', 'shaheer-gems');
$cta_title     = get_post_meta($post_id, '_cta_title', true) ?: __('Looking for Your Perfect Gemstone?', 'shaheer-gems');
$cta_desc      = get_post_meta($post_id, '_cta_desc', true) ?: __('Explore our collection or contact us to find a gemstone that suits your preferences.', 'shaheer-gems');
$cta_btn1_text = get_post_meta($post_id, '_cta_btn1_text', true) ?: __('Contact Us', 'shaheer-gems');
$cta_btn1_link = get_post_meta($post_id, '_cta_btn1_link', true) ?: home_url('/contact/');
$cta_btn2_text = get_post_meta($post_id, '_cta_btn2_text', true) ?: __('WhatsApp Inquiry', 'shaheer-gems');

$wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));
?>

<main id="primary" class="site-main">

    <!-- =========================================================================
         SECTION 2: HERO BANNER (Editable in WP Dashboard)
         ========================================================================= -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-grid">
            <div class="hero-content">
                <?php if (!empty($hero_badge)) : ?>
                    <div class="hero-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <span><?php echo esc_html($hero_badge); ?></span>
                    </div>
                <?php endif; ?>

                <h1 class="hero-title">
                    <span><?php echo esc_html($hero_title); ?></span>
                </h1>

                <?php if (!empty($hero_subtitle)) : ?>
                    <span class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></span>
                <?php endif; ?>

                <?php if (!empty($hero_desc)) : ?>
                    <p class="hero-description">
                        <?php echo nl2br(esc_html($hero_desc)); ?>
                    </p>
                <?php endif; ?>

                <div class="hero-buttons">
                    <?php if (!empty($hero_btn1_text)) : ?>
                        <a href="<?php echo esc_url($hero_btn1_link); ?>" class="btn btn-gold">
                            <?php echo esc_html($hero_btn1_text); ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($hero_btn2_text)) : ?>
                        <a href="<?php echo esc_url($hero_btn2_link); ?>" class="btn btn-outline-white">
                            <?php echo esc_html($hero_btn2_text); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="hero-trust-list">
                    <?php if (!empty($hero_trust1)) : ?>
                        <div class="hero-trust-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><?php echo esc_html($hero_trust1); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($hero_trust2)) : ?>
                        <div class="hero-trust-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                            <span><?php echo esc_html($hero_trust2); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($hero_trust3)) : ?>
                        <div class="hero-trust-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            <span><?php echo esc_html($hero_trust3); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="hero-showcase">
                <div class="hero-gem-display">
                    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($hero_gem_title); ?>" width="400" height="400" />
                    <div class="hero-gem-card-badge">
                        <h5><?php echo esc_html($hero_gem_title); ?></h5>
                        <p><?php echo esc_html($hero_gem_sub); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         GUTENBERG / ELEMENTOR PAGE CONTENT (If added in the main editor)
         ========================================================================= -->
    <?php
    $page_content = get_post_field('post_content', $post_id);
    if (!empty(trim($page_content))) :
    ?>
        <section class="section-padding homepage-custom-content" style="background-color: #FFFFFF;">
            <div class="container">
                <?php
                // Apply standard content filters so Gutenberg blocks & Elementor render properly
                echo apply_filters('the_content', $page_content);
                ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- =========================================================================
         SECTION 3: ABOUT SHAHEER GEMS (Editable in WP Dashboard)
         ========================================================================= -->
    <section class="about-section section-padding">
        <div class="container about-grid">
            <!-- Left Column: Business Introduction -->
            <div class="about-content-left">
                <?php if (!empty($about_subtitle)) : ?>
                    <span class="section-subtitle"><?php echo esc_html($about_subtitle); ?></span>
                <?php endif; ?>

                <h2 class="section-title"><?php echo esc_html($about_title); ?></h2>

                <?php if (!empty($about_lead)) : ?>
                    <p class="section-desc" style="font-size: 1.15rem; color: var(--color-accent-dark); font-weight: 500; margin-bottom: 20px;">
                        <?php echo nl2br(esc_html($about_lead)); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($about_body1)) : ?>
                    <p><?php echo nl2br(esc_html($about_body1)); ?></p>
                <?php endif; ?>

                <?php if (!empty($about_body2)) : ?>
                    <p><?php echo nl2br(esc_html($about_body2)); ?></p>
                <?php endif; ?>

                <?php if (!empty($about_btn_text)) : ?>
                    <div style="margin-top: 32px;">
                        <a href="<?php echo esc_url($about_btn_link); ?>" class="btn btn-primary">
                            <?php echo esc_html($about_btn_text); ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Column: Gemstone Craft Photography -->
            <div class="about-image-wrapper">
                <div class="about-decorative-border"></div>
                <div class="about-image-frame">
                    <img src="<?php echo esc_url($about_img); ?>" alt="Shaheer Gems Inspection & Craft" width="700" height="520" />
                </div>
                <div class="about-badge-float">
                    <div class="about-badge-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="6 2 18 2 22 8 12 22 2 8 6 2"/><line x1="2" y1="8" x2="22" y2="8"/><line x1="12" y1="2" x2="8" y2="8"/><line x1="12" y1="2" x2="16" y2="8"/><line x1="8" y1="8" x2="12" y2="22"/><line x1="16" y1="8" x2="12" y2="22"/></svg>
                    </div>
                    <div class="about-badge-text">
                        <strong><?php echo esc_html($about_badge_ttl); ?></strong>
                        <span><?php echo esc_html($about_badge_sub); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 4: OUR GEMSTONE COLLECTION (10 Categories Grid)
         ========================================================================= -->
    <section class="categories-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e('CURATED OFFERINGS', 'shaheer-gems'); ?></span>
                <h2 class="section-title"><?php esc_html_e('OUR GEMSTONE COLLECTION', 'shaheer-gems'); ?></h2>
                <p class="section-desc">
                    <?php esc_html_e('Explore our world-renowned varieties of Ceylon sapphires, rubies, emeralds and rare collector gemstones.', 'shaheer-gems'); ?>
                </p>
            </div>

            <?php
            $categories_list = array(
                array('name' => 'Blue Sapphire', 'slug' => 'blue-sapphire', 'img' => 'blue-sapphire.svg'),
                array('name' => 'Yellow Sapphire', 'slug' => 'yellow-sapphire', 'img' => 'yellow-sapphire.svg'),
                array('name' => 'Pink Sapphire', 'slug' => 'pink-sapphire', 'img' => 'pink-sapphire.svg'),
                array('name' => 'White Sapphire', 'slug' => 'white-sapphire', 'img' => 'white-sapphire.svg'),
                array('name' => 'Ruby', 'slug' => 'ruby', 'img' => 'ruby.svg'),
                array('name' => 'Emerald', 'slug' => 'emerald', 'img' => 'emerald.svg'),
                array('name' => 'Padparadscha Sapphire', 'slug' => 'padparadscha-sapphire', 'img' => 'padparadscha.svg'),
                array('name' => 'Spinel', 'slug' => 'spinel', 'img' => 'spinel.svg'),
                array('name' => 'Garnet', 'slug' => 'garnet', 'img' => 'garnet.svg'),
                array('name' => 'Tourmaline', 'slug' => 'tourmaline', 'img' => 'tourmaline.svg'),
            );
            ?>

            <div class="category-grid">
                <?php foreach ($categories_list as $cat) : ?>
                    <a href="<?php echo esc_url(home_url('/gemstones/?category=' . $cat['slug'])); ?>" class="category-card">
                        <div class="category-img-box">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/gemstones/' . $cat['img']); ?>" alt="<?php echo esc_attr($cat['name']); ?>" width="110" height="110" loading="lazy" />
                        </div>
                        <h4 class="category-title"><?php echo esc_html($cat['name']); ?></h4>
                        <span class="category-link">
                            <?php esc_html_e('View Collection', 'shaheer-gems'); ?>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 5: FEATURED GEMSTONES (Editable in WP Dashboard)
         ========================================================================= -->
    <section class="featured-section section-padding">
        <div class="container">
            <div class="section-header">
                <?php if (!empty($featured_subtitle)) : ?>
                    <span class="section-subtitle"><?php echo esc_html($featured_subtitle); ?></span>
                <?php endif; ?>

                <h2 class="section-title"><?php echo esc_html($featured_title); ?></h2>

                <?php if (!empty($featured_desc)) : ?>
                    <p class="section-desc"><?php echo nl2br(esc_html($featured_desc)); ?></p>
                <?php endif; ?>
            </div>

            <?php
            // Query featured gemstones from CPT, fallback to sample data if database not yet initialized
            $featured_query = new WP_Query(array(
                'post_type'      => 'gemstone',
                'posts_per_page' => $featured_count,
                'meta_query'     => array(
                    array(
                        'key'     => '_gem_is_featured',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            ));

            $featured_items = array();

            if ($featured_query->have_posts()) {
                while ($featured_query->have_posts()) {
                    $featured_query->the_post();
                    $pid = get_the_ID();
                    $featured_items[] = array(
                        'title'      => get_the_title(),
                        'id'         => get_post_meta($pid, '_gem_id', true) ?: 'SG' . $pid,
                        'carat'      => get_post_meta($pid, '_gem_carat', true) ?: '2.50',
                        'color'      => get_post_meta($pid, '_gem_color', true) ?: 'Royal Blue',
                        'cut'        => get_post_meta($pid, '_gem_cut', true) ?: 'Cushion',
                        'price'      => get_post_meta($pid, '_gem_price', true),
                        'price_mode' => get_post_meta($pid, '_gem_price_mode', true) ?: 'show_price',
                        'status'     => get_post_meta($pid, '_gem_status', true) ?: 'available',
                        'permalink'  => get_permalink($pid),
                        'image'      => get_the_post_thumbnail_url($pid, 'gemstone-card') ?: get_template_directory_uri() . '/assets/images/gemstones/blue-sapphire.svg'
                    );
                }
                wp_reset_postdata();
            }

            // Fallback to rich sample items if no featured posts are tagged yet
            if (empty($featured_items)) {
                $all_samples = shaheer_get_sample_gemstones();
                $featured_items = array_slice($all_samples, 0, min($featured_count, count($all_samples)));
                foreach ($featured_items as &$item) {
                    $item['permalink'] = home_url('/gemstones/?gem=' . $item['id']);
                }
            }
            ?>

            <div class="gemstone-grid">
                <?php foreach ($featured_items as $gem) : 
                    $status_class = 'status-' . sanitize_html_class($gem['status']);
                ?>
                    <div class="gemstone-card">
                        <div class="gemstone-card-media">
                            <span class="gem-badge-status <?php echo esc_attr($status_class); ?>">
                                <?php echo esc_html(ucfirst($gem['status'])); ?>
                            </span>
                            <span class="gem-badge-id"><?php echo esc_html($gem['id']); ?></span>
                            <a href="<?php echo esc_url($gem['permalink']); ?>" style="display:flex; justify-content:center; width:100%;">
                                <img src="<?php echo esc_url($gem['image']); ?>" alt="<?php echo esc_attr($gem['title']); ?>" loading="lazy" />
                            </a>
                        </div>

                        <div class="gemstone-card-body">
                            <span class="gemstone-card-category"><?php echo esc_html(isset($gem['category']) ? $gem['category'] : 'Ceylon Gemstone'); ?></span>
                            <h4 class="gemstone-card-title">
                                <a href="<?php echo esc_url($gem['permalink']); ?>"><?php echo esc_html($gem['title']); ?></a>
                            </h4>

                            <div class="gemstone-specs-list">
                                <div class="gemstone-spec-item">
                                    <span class="spec-label"><?php esc_html_e('Carat', 'shaheer-gems'); ?></span>
                                    <span class="spec-val"><?php echo esc_html($gem['carat']); ?> ct</span>
                                </div>
                                <div class="gemstone-spec-item">
                                    <span class="spec-label"><?php esc_html_e('Color', 'shaheer-gems'); ?></span>
                                    <span class="spec-val"><?php echo esc_html($gem['color']); ?></span>
                                </div>
                                <div class="gemstone-spec-item" style="grid-column: span 2;">
                                    <span class="spec-label"><?php esc_html_e('Cut Style', 'shaheer-gems'); ?></span>
                                    <span class="spec-val"><?php echo esc_html($gem['cut']); ?></span>
                                </div>
                            </div>

                            <div class="gemstone-card-footer">
                                <div class="gemstone-price-row">
                                    <span class="gemstone-price-label"><?php esc_html_e('Valuation', 'shaheer-gems'); ?></span>
                                    <span class="gemstone-price-value">
                                        <?php echo shaheer_format_price($gem['price'], $gem['price_mode']); ?>
                                    </span>
                                </div>

                                <div class="gemstone-card-actions">
                                    <a href="<?php echo esc_url($gem['permalink']); ?>" class="btn btn-outline-gold btn-sm">
                                        <?php esc_html_e('View Details', 'shaheer-gems'); ?>
                                    </a>
                                    <button type="button" class="btn btn-whatsapp btn-sm btn-whatsapp-inquire"
                                        data-gem-name="<?php echo esc_attr($gem['title']); ?>"
                                        data-gem-id="<?php echo esc_attr($gem['id']); ?>"
                                        data-gem-carat="<?php echo esc_attr($gem['carat']); ?>"
                                        data-phone="<?php echo esc_attr($wa_num); ?>">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                        <span>Inquire</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 50px;">
                <a href="<?php echo esc_url(home_url('/gemstones/')); ?>" class="btn btn-primary">
                    <?php esc_html_e('Explore All Gemstones In Catalog', 'shaheer-gems'); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 6: WHY CHOOSE SHAHEER GEMS?
         ========================================================================= -->
    <section class="why-choose-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e('EXCELLENCE & TRUST', 'shaheer-gems'); ?></span>
                <h2 class="section-title"><?php esc_html_e('WHY CHOOSE SHAHEER GEMS?', 'shaheer-gems'); ?></h2>
                <p class="section-desc">
                    <?php esc_html_e('Our dedication to gemological integrity, ethical sourcing, and personalized client relationships defines everything we do.', 'shaheer-gems'); ?>
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Carefully Selected Gemstones', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc">
                        <?php esc_html_e('Hand-picked by experienced gemologists evaluating color saturation, facet precision, clarity, and distinct optical luster.', 'shaheer-gems'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Detailed Gemstone Information', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc">
                        <?php esc_html_e('Full disclosure of carat weight, dimensions, origin, treatment classification, and lab certification reports.', 'shaheer-gems'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Personalized Customer Service', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc">
                        <?php esc_html_e('Direct one-on-one consultation via WhatsApp, telephone, or showroom visits to guide your bespoke gemstone acquisition.', 'shaheer-gems'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Transparent Communication', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc">
                        <?php esc_html_e('High-definition photography, natural lighting views, and upfront honest pricing or valuation guidance without hidden costs.', 'shaheer-gems'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="6 2 18 2 22 8 12 22 2 8 6 2"/><line x1="2" y1="8" x2="22" y2="8"/><line x1="12" y1="2" x2="8" y2="8"/><line x1="12" y1="2" x2="16" y2="8"/><line x1="8" y1="8" x2="12" y2="22"/><line x1="16" y1="8" x2="12" y2="22"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Sri Lankan Gemstone Heritage', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc">
                        <?php esc_html_e('Rooted in Ceylon’s millennia-old legacy as the global capital of sapphires, preserving traditional lapidary artistry.', 'shaheer-gems'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 7: CONTACT CALL-TO-ACTION BANNER (Editable in WP Dashboard)
         ========================================================================= -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <?php if (!empty($cta_subtitle)) : ?>
                    <span class="section-subtitle" style="color: var(--color-secondary-light);"><?php echo esc_html($cta_subtitle); ?></span>
                <?php endif; ?>

                <h2 class="cta-title"><?php echo esc_html($cta_title); ?></h2>

                <?php if (!empty($cta_desc)) : ?>
                    <p class="cta-desc"><?php echo nl2br(esc_html($cta_desc)); ?></p>
                <?php endif; ?>

                <div class="cta-buttons">
                    <?php if (!empty($cta_btn1_text)) : ?>
                        <a href="<?php echo esc_url($cta_btn1_link); ?>" class="btn btn-gold">
                            <?php echo esc_html($cta_btn1_text); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($cta_btn2_text)) : ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>&text=<?php echo urlencode('Hello Shaheer Gems, I would like to inquire about a specific gemstone requirement.'); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span><?php echo esc_html($cta_btn2_text); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
