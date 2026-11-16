<?php
/**
 * Template Name: Gemstone Catalog Page
 *
 * @package Shaheer_Gems
 */

get_header();

$wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));

// Fetch gemstones from WordPress CPT or fallback to sample inventory
$catalog_query = new WP_Query(array(
    'post_type'      => 'gemstone',
    'posts_per_page' => 24,
    'post_status'    => 'publish'
));

$gemstones_list = array();

if ($catalog_query->have_posts()) {
    while ($catalog_query->have_posts()) {
        $catalog_query->the_post();
        $pid = get_the_ID();
        $terms_cat   = wp_get_post_terms($pid, 'gemstone_category');
        $terms_cut   = wp_get_post_terms($pid, 'gemstone_cut');
        $terms_color = wp_get_post_terms($pid, 'gemstone_color');

        $gemstones_list[] = array(
            'id'            => get_post_meta($pid, '_gem_id', true) ?: 'SG' . $pid,
            'title'         => get_the_title(),
            'category'      => !empty($terms_cat) ? $terms_cat[0]->name : 'Ceylon Gemstone',
            'category_slug' => !empty($terms_cat) ? $terms_cat[0]->slug : 'gemstone',
            'carat'         => get_post_meta($pid, '_gem_carat', true) ?: '2.50',
            'color'         => get_post_meta($pid, '_gem_color', true) ?: 'Royal Blue',
            'color_slug'    => !empty($terms_color) ? $terms_color[0]->slug : 'blue',
            'cut'           => get_post_meta($pid, '_gem_cut', true) ?: 'Cushion Mixed Cut',
            'cut_slug'      => !empty($terms_cut) ? $terms_cut[0]->slug : 'cushion',
            'clarity'       => get_post_meta($pid, '_gem_clarity', true) ?: 'Eye Clean',
            'origin'        => get_post_meta($pid, '_gem_origin', true) ?: 'Sri Lanka (Ceylon)',
            'treatment'     => get_post_meta($pid, '_gem_treatment', true) ?: 'Natural Unheated',
            'price'         => get_post_meta($pid, '_gem_price', true),
            'price_mode'    => get_post_meta($pid, '_gem_price_mode', true) ?: 'show_price',
            'status'        => get_post_meta($pid, '_gem_status', true) ?: 'available',
            'permalink'     => get_permalink($pid),
            'image'         => get_the_post_thumbnail_url($pid, 'gemstone-card') ?: get_template_directory_uri() . '/assets/images/gemstones/blue-sapphire.svg'
        );
    }
    wp_reset_postdata();
}

// Fallback to sample data if no posts yet created in DB
if (empty($gemstones_list)) {
    $gemstones_list = shaheer_get_sample_gemstones();
    foreach ($gemstones_list as &$item) {
        $item['permalink'] = home_url('/gemstone-detail/?id=' . $item['id']);
    }
}
?>

<main id="primary" class="site-main">

    <!-- Page Banner -->
    <section class="page-hero-banner">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('Precious Gemstone Catalog', 'shaheer-gems'); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php esc_html_e('Gemstones', 'shaheer-gems'); ?></span>
            </div>
        </div>
    </section>

    <!-- Catalog Section with Filter Sidebar -->
    <section class="section-padding" style="background-color: var(--color-bg);">
        <div class="container catalog-layout">

            <!-- Filter Sidebar -->
            <aside class="filter-sidebar">
                <h3 style="font-size: 1.15rem; margin-bottom: 20px; color: var(--color-accent-dark); border-bottom: 2px solid var(--color-secondary); padding-bottom: 8px;">
                    <?php esc_html_e('Filter Gemstones', 'shaheer-gems'); ?>
                </h3>

                <!-- Filter: Gemstone Category / Type -->
                <div class="filter-group">
                    <h4 class="filter-group-title"><?php esc_html_e('Gemstone Variety', 'shaheer-gems'); ?></h4>
                    <ul class="filter-list">
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="blue-sapphire" class="catalog-filter-input" />
                                <span><?php esc_html_e('Blue Sapphire', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="padparadscha-sapphire" class="catalog-filter-input" />
                                <span><?php esc_html_e('Padparadscha', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="yellow-sapphire" class="catalog-filter-input" />
                                <span><?php esc_html_e('Yellow Sapphire', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="pink-sapphire" class="catalog-filter-input" />
                                <span><?php esc_html_e('Pink Sapphire', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="white-sapphire" class="catalog-filter-input" />
                                <span><?php esc_html_e('White Sapphire', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="ruby" class="catalog-filter-input" />
                                <span><?php esc_html_e('Ruby', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="emerald" class="catalog-filter-input" />
                                <span><?php esc_html_e('Emerald', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="spinel" class="catalog-filter-input" />
                                <span><?php esc_html_e('Spinel', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="garnet" class="catalog-filter-input" />
                                <span><?php esc_html_e('Garnet', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_category" value="tourmaline" class="catalog-filter-input" />
                                <span><?php esc_html_e('Tourmaline', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                    </ul>
                </div>

                <!-- Filter: Cut / Shape -->
                <div class="filter-group">
                    <h4 class="filter-group-title"><?php esc_html_e('Shape / Cut', 'shaheer-gems'); ?></h4>
                    <ul class="filter-list">
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_cut" value="cushion" class="catalog-filter-input" />
                                <span><?php esc_html_e('Cushion Cut', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_cut" value="oval" class="catalog-filter-input" />
                                <span><?php esc_html_e('Oval Cut', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_cut" value="emerald-cut" class="catalog-filter-input" />
                                <span><?php esc_html_e('Emerald / Step Cut', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_cut" value="round" class="catalog-filter-input" />
                                <span><?php esc_html_e('Round Brilliant', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                    </ul>
                </div>

                <!-- Filter: Availability Status -->
                <div class="filter-group">
                    <h4 class="filter-group-title"><?php esc_html_e('Availability', 'shaheer-gems'); ?></h4>
                    <ul class="filter-list">
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_avail" value="available" class="catalog-filter-input" checked />
                                <span><?php esc_html_e('Available in Stock', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_avail" value="reserved" class="catalog-filter-input" />
                                <span><?php esc_html_e('Reserved', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                        <li>
                            <label class="filter-label">
                                <input type="checkbox" name="filter_avail" value="sold" class="catalog-filter-input" />
                                <span><?php esc_html_e('Sold (Archive)', 'shaheer-gems'); ?></span>
                            </label>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Catalog Content & Products Grid -->
            <div class="catalog-main-content">
                <!-- Topbar with Count and Sorting -->
                <div class="catalog-topbar">
                    <div class="results-counter">
                        <?php esc_html_e('Showing', 'shaheer-gems'); ?> 
                        <strong id="catalogResultsCount"><?php echo count($gemstones_list); ?></strong> 
                        <?php esc_html_e('exceptional gemstones', 'shaheer-gems'); ?>
                    </div>

                    <div class="catalog-sorting">
                        <label for="catalogSortSelect" style="font-size: 0.85rem; color: var(--color-text-muted);">
                            <?php esc_html_e('Sort by:', 'shaheer-gems'); ?>
                        </label>
                        <select id="catalogSortSelect">
                            <option value="newest"><?php esc_html_e('Newest Additions', 'shaheer-gems'); ?></option>
                            <option value="carat-high"><?php esc_html_e('Carat: High to Low', 'shaheer-gems'); ?></option>
                            <option value="price-low"><?php esc_html_e('Price: Low to High', 'shaheer-gems'); ?></option>
                            <option value="price-high"><?php esc_html_e('Price: High to Low', 'shaheer-gems'); ?></option>
                        </select>
                    </div>
                </div>

                <!-- Gemstones Grid (3 columns on catalog layout) -->
                <div class="gemstone-grid" id="gemstoneCatalogGrid" style="grid-template-columns: repeat(3, 1fr);">
                    <?php foreach ($gemstones_list as $gem) : 
                        $status_class = 'status-' . sanitize_html_class($gem['status']);
                    ?>
                        <div class="gemstone-card catalog-gem-item"
                             data-category="<?php echo esc_attr($gem['category_slug']); ?>"
                             data-color="<?php echo esc_attr($gem['color_slug']); ?>"
                             data-cut="<?php echo esc_attr($gem['cut_slug']); ?>"
                             data-availability="<?php echo esc_attr($gem['status']); ?>"
                             data-carat="<?php echo esc_attr($gem['carat']); ?>">
                            
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
                                <span class="gemstone-card-category"><?php echo esc_html($gem['category']); ?></span>
                                <h4 class="gemstone-card-title">
                                    <a href="<?php echo esc_url($gem['permalink']); ?>"><?php echo esc_html($gem['title']); ?></a>
                                </h4>

                                <div class="gemstone-specs-list">
                                    <div class="gemstone-spec-item">
                                        <span class="spec-label"><?php esc_html_e('Weight', 'shaheer-gems'); ?></span>
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
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
