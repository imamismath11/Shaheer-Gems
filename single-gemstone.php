<?php
/**
 * Template for displaying a Single Gemstone Details Page
 *
 * @package Shaheer_Gems
 */

get_header();

$wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));

$post_id         = get_the_ID();
$gem_id          = get_post_meta($post_id, '_gem_id', true) ?: 'SG' . $post_id;
$gem_carat       = get_post_meta($post_id, '_gem_carat', true) ?: '3.45';
$gem_color       = get_post_meta($post_id, '_gem_color', true) ?: 'Royal Blue';
$gem_cut         = get_post_meta($post_id, '_gem_cut', true) ?: 'Cushion Mixed Cut';
$gem_clarity     = get_post_meta($post_id, '_gem_clarity', true) ?: 'Eye Clean (VVS1)';
$gem_origin      = get_post_meta($post_id, '_gem_origin', true) ?: 'Ratnapura, Sri Lanka (Ceylon)';
$gem_treatment   = get_post_meta($post_id, '_gem_treatment', true) ?: '100% Natural Unheated';
$gem_dimensions  = get_post_meta($post_id, '_gem_dimensions', true) ?: '8.92 x 7.65 x 5.80 mm';
$gem_cert        = get_post_meta($post_id, '_gem_certification', true) ?: 'NGJA Certified / Available upon Request';
$gem_status      = get_post_meta($post_id, '_gem_status', true) ?: 'available';
$gem_price_mode  = get_post_meta($post_id, '_gem_price_mode', true) ?: 'show_price';
$gem_price       = get_post_meta($post_id, '_gem_price', true);

$main_img = get_the_post_thumbnail_url($post_id, 'gemstone-single') ?: get_template_directory_uri() . '/assets/images/gemstones/blue-sapphire.svg';

$wa_inquiry_text = sprintf(
    'Hello Shaheer Gems, I am interested in the %s, Gem ID %s, %s carats. Could you please provide more information?',
    get_the_title(),
    $gem_id,
    $gem_carat
);
?>

<main id="primary" class="site-main">

    <!-- Page Banner / Breadcrumbs -->
    <section class="page-hero-banner" style="padding: 40px 0;">
        <div class="container">
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <a href="<?php echo esc_url(home_url('/gemstones/')); ?>"><?php esc_html_e('Gemstones', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php the_title(); ?></span>
            </div>
        </div>
    </section>

    <!-- Gemstone Detail Section -->
    <section class="section-padding" style="background-color: var(--color-bg);">
        <div class="container single-gem-layout">

            <!-- Left: Interactive Gallery -->
            <div class="single-gem-media">
                <div class="gem-gallery-main">
                    <span class="gem-badge-status status-<?php echo esc_attr($gem_status); ?>" style="position: absolute; top: 20px; left: 20px;">
                        <?php echo esc_html(ucfirst($gem_status)); ?>
                    </span>
                    <img id="singleGemMainImage" src="<?php echo esc_url($main_img); ?>" alt="<?php the_title_attribute(); ?>" />
                </div>

                <!-- Gallery Thumbnails -->
                <div class="gem-gallery-thumbnails">
                    <div class="thumb-item active" data-full-img="<?php echo esc_url($main_img); ?>">
                        <img src="<?php echo esc_url($main_img); ?>" alt="Thumbnail 1" />
                    </div>
                    <div class="thumb-item" data-full-img="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-craft.svg'); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-craft.svg'); ?>" alt="Gemological Inspection" />
                    </div>
                </div>
            </div>

            <!-- Right: Gemstone Specifications & Inquiry -->
            <div class="single-gem-info">
                <div class="single-gem-id-row">
                    <span class="gem-badge-id" style="font-size: 0.9rem; padding: 6px 14px;"><?php esc_html_e('GEM ID:', 'shaheer-gems'); ?> <?php echo esc_html($gem_id); ?></span>
                    <span style="color: var(--color-secondary); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1.5px;">
                        <?php esc_html_e('NATURAL CEYLON CORUNDUM', 'shaheer-gems'); ?>
                    </span>
                </div>

                <h1 class="gem-title" style="color: var(--color-accent-dark);"><?php the_title(); ?></h1>

                <div style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-accent); font-weight: 700; margin: 15px 0 25px;">
                    <?php echo shaheer_format_price($gem_price, $gem_price_mode); ?>
                </div>

                <div class="gem-content-desc" style="line-height: 1.8; color: var(--color-text-muted); margin-bottom: 25px;">
                    <?php the_content(); ?>
                </div>

                <!-- Comprehensive Specifications Table -->
                <table class="single-gem-specs-table">
                    <tbody>
                        <tr>
                            <th><?php esc_html_e('Gem Identification', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_id); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Carat Weight', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_carat); ?> ct</td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Color Hue & Saturation', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_color); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Shape & Cut Style', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_cut); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Clarity Rating', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_clarity); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Dimensions (L x W x D)', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_dimensions); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Geographic Origin', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_origin); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Enhancement / Treatment', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_treatment); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Laboratory Certification', 'shaheer-gems'); ?></th>
                            <td><?php echo esc_html($gem_cert); ?></td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e('Stock Status', 'shaheer-gems'); ?></th>
                            <td>
                                <strong style="color: <?php echo ($gem_status === 'available') ? 'var(--color-available)' : 'var(--color-sold)'; ?>;">
                                    <?php echo esc_html(ucfirst($gem_status)); ?>
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Action Box: Direct WhatsApp Inquiry -->
                <div class="single-gem-inquiry-box">
                    <h4><?php esc_html_e('Interested in this Gemstone?', 'shaheer-gems'); ?></h4>
                    <p style="font-size: 0.9rem; margin-bottom: 18px;">
                        <?php esc_html_e('Our master gemologists are available on WhatsApp to share high-definition lighting videos, 360° loupe views, and certification documents.', 'shaheer-gems'); ?>
                    </p>
                    <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>&text=<?php echo urlencode($wa_inquiry_text); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp" style="width: 100%; padding: 16px; font-size: 1rem;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        <span><?php esc_html_e('Inquire on WhatsApp', 'shaheer-gems'); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
