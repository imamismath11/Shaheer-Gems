<?php
/**
 * Template Name: Gallery Page
 *
 * @package Shaheer_Gems
 */

get_header();

$theme_uri = get_template_directory_uri();

$gallery_items = array(
    array(
        'title'    => 'Ceylon Royal Blue Sapphire (Cushion Cut)',
        'category' => 'blue-sapphire',
        'cat_name' => 'Blue Sapphires',
        'image'    => $theme_uri . '/assets/images/gemstones/blue-sapphire.svg',
    ),
    array(
        'title'    => 'Canary Yellow Sapphire (Oval Brilliant Cut)',
        'category' => 'yellow-sapphire',
        'cat_name' => 'Yellow Sapphires',
        'image'    => $theme_uri . '/assets/images/gemstones/yellow-sapphire.svg',
    ),
    array(
        'title'    => 'Natural Pigeon Blood Ruby (Cushion Cut)',
        'category' => 'ruby',
        'cat_name' => 'Rubies',
        'image'    => $theme_uri . '/assets/images/gemstones/ruby.svg',
    ),
    array(
        'title'    => 'Octagonal Step Cut Emerald',
        'category' => 'emerald',
        'cat_name' => 'Emeralds',
        'image'    => $theme_uri . '/assets/images/gemstones/emerald.svg',
    ),
    array(
        'title'    => 'Rare Ceylon Padparadscha Sapphire',
        'category' => 'other',
        'cat_name' => 'Other Gemstones',
        'image'    => $theme_uri . '/assets/images/gemstones/padparadscha.svg',
    ),
    array(
        'title'    => 'Vivid Hot Pink Ceylon Sapphire',
        'category' => 'other',
        'cat_name' => 'Other Gemstones',
        'image'    => $theme_uri . '/assets/images/gemstones/pink-sapphire.svg',
    ),
    array(
        'title'    => 'Brilliant White Ceylon Sapphire',
        'category' => 'other',
        'cat_name' => 'Other Gemstones',
        'image'    => $theme_uri . '/assets/images/gemstones/white-sapphire.svg',
    ),
    array(
        'title'    => 'Flame Red Ceylon Spinel',
        'category' => 'other',
        'cat_name' => 'Other Gemstones',
        'image'    => $theme_uri . '/assets/images/gemstones/spinel.svg',
    ),
    array(
        'title'    => 'Teal Lagoon Ceylon Tourmaline',
        'category' => 'other',
        'cat_name' => 'Other Gemstones',
        'image'    => $theme_uri . '/assets/images/gemstones/tourmaline.svg',
    ),
);
?>

<main id="primary" class="site-main">

    <!-- Page Banner -->
    <section class="page-hero-banner">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('Precious Gemstone Photo Gallery', 'shaheer-gems'); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php esc_html_e('Gallery', 'shaheer-gems'); ?></span>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section-padding" style="background-color: var(--color-bg);">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e('VISUAL TREASURES', 'shaheer-gems'); ?></span>
                <h2 class="section-title"><?php esc_html_e('EXPLORE THE BRILLIANCE', 'shaheer-gems'); ?></h2>
                <p class="section-desc">
                    <?php esc_html_e('Click any photograph to view high-resolution facets, optical clarity, and exquisite color saturation in our full-screen lightbox.', 'shaheer-gems'); ?>
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="gallery-filter-tabs">
                <button type="button" class="gallery-tab-btn active" data-filter="all"><?php esc_html_e('All Gemstones', 'shaheer-gems'); ?></button>
                <button type="button" class="gallery-tab-btn" data-filter="blue-sapphire"><?php esc_html_e('Blue Sapphires', 'shaheer-gems'); ?></button>
                <button type="button" class="gallery-tab-btn" data-filter="yellow-sapphire"><?php esc_html_e('Yellow Sapphires', 'shaheer-gems'); ?></button>
                <button type="button" class="gallery-tab-btn" data-filter="ruby"><?php esc_html_e('Rubies', 'shaheer-gems'); ?></button>
                <button type="button" class="gallery-tab-btn" data-filter="emerald"><?php esc_html_e('Emeralds', 'shaheer-gems'); ?></button>
                <button type="button" class="gallery-tab-btn" data-filter="other"><?php esc_html_e('Other Gemstones', 'shaheer-gems'); ?></button>
            </div>

            <!-- Photo Grid -->
            <div class="photo-gallery-grid">
                <?php foreach ($gallery_items as $item) : ?>
                    <div class="gallery-item" data-category="<?php echo esc_attr($item['category']); ?>" data-full-img="<?php echo esc_url($item['image']); ?>">
                        <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>" loading="lazy" />
                        <div class="gallery-overlay">
                            <h4><?php echo esc_html($item['title']); ?></h4>
                            <p><?php echo esc_html($item['cat_name']); ?> • <?php esc_html_e('Click to Zoom', 'shaheer-gems'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Full-Screen Lightbox Modal -->
    <div id="galleryLightbox" class="lightbox-modal">
        <div class="lightbox-content">
            <button id="lightboxCloseBtn" class="lightbox-close" aria-label="<?php esc_attr_e('Close Lightbox', 'shaheer-gems'); ?>">&times;</button>
            <img id="lightboxActiveImg" class="lightbox-img" src="" alt="Zoomed Gemstone Preview" />
        </div>
    </div>

</main>

<?php
get_footer();
