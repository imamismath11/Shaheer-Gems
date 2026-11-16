<?php
/**
 * Sample Gemstone Data Seeder for Shaheer Gems
 *
 * @package Shaheer_Gems
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Return array of realistic Ceylon sample gemstone inventory
 */
function shaheer_get_sample_gemstones() {
    $theme_uri = get_template_directory_uri();

    return array(
        array(
            'id'           => 'SG001',
            'title'        => 'Royal Blue Ceylon Sapphire – 3.45 Carat',
            'category'     => 'Blue Sapphire',
            'category_slug'=> 'blue-sapphire',
            'carat'        => '3.45',
            'color'        => 'Vivid Royal Blue',
            'color_slug'   => 'royal-blue',
            'cut'          => 'Cushion Mixed Cut',
            'cut_slug'     => 'cushion',
            'clarity'      => 'Eye Clean (VVS1)',
            'origin'       => 'Ratnapura, Sri Lanka (Ceylon)',
            'treatment'    => 'Natural Unheated / Untreated',
            'dimensions'   => '8.92 x 7.65 x 5.80 mm',
            'cert'         => 'NGJA Certified (National Gem & Jewellery Authority)',
            'price_mode'   => 'show_price',
            'price'        => '450,000',
            'status'       => 'available',
            'featured'     => true,
            'image'        => $theme_uri . '/assets/images/gemstones/blue-sapphire.svg',
            'description'  => 'An exceptional natural Ceylon royal blue sapphire displaying world-class saturation, brilliance, and luster. Ethically mined in the legendary gem fields of Ratnapura, Sri Lanka.'
        ),
        array(
            'id'           => 'SG002',
            'title'        => 'Ceylon Padparadscha Sapphire – 2.80 Carat',
            'category'     => 'Padparadscha Sapphire',
            'category_slug'=> 'padparadscha-sapphire',
            'carat'        => '2.80',
            'color'        => 'Lotus Pink-Orange',
            'color_slug'   => 'pink-orange',
            'cut'          => 'Oval Mixed Cut',
            'cut_slug'     => 'oval',
            'clarity'      => 'Loupe Clean (IF)',
            'origin'       => 'Elahera, Sri Lanka (Ceylon)',
            'treatment'    => '100% Natural Unheated',
            'dimensions'   => '8.40 x 6.95 x 5.15 mm',
            'cert'         => 'Certified Natural Padparadscha',
            'price_mode'   => 'price_on_request',
            'price'        => 'Price on Request',
            'status'       => 'available',
            'featured'     => true,
            'image'        => $theme_uri . '/assets/images/gemstones/padparadscha.svg',
            'description'  => 'The king of sapphires. A true Sri Lankan Padparadscha featuring the harmonious blend of lotus blossom pink and golden tropical sunset orange.'
        ),
        array(
            'id'           => 'SG003',
            'title'        => 'Natural Pigeon Blood Ruby – 2.15 Carat',
            'category'     => 'Ruby',
            'category_slug'=> 'ruby',
            'carat'        => '2.15',
            'color'        => 'Pigeon Blood Red',
            'color_slug'   => 'red',
            'cut'          => 'Cushion Brilliant Cut',
            'cut_slug'     => 'cushion',
            'clarity'      => 'Eye Clean (VVS2)',
            'origin'       => 'Ratnapura, Sri Lanka (Ceylon)',
            'treatment'    => 'Natural Unheated',
            'dimensions'   => '7.85 x 6.80 x 4.60 mm',
            'cert'         => 'Gemological Lab Certified',
            'price_mode'   => 'show_price',
            'price'        => '380,000',
            'status'       => 'available',
            'featured'     => true,
            'image'        => $theme_uri . '/assets/images/gemstones/ruby.svg',
            'description'  => 'Fiery and commanding crimson ruby with intense red fluorescence and exceptional facet symmetry.'
        ),
        array(
            'id'           => 'SG004',
            'title'        => 'Canary Yellow Ceylon Sapphire – 4.10 Carat',
            'category'     => 'Yellow Sapphire',
            'category_slug'=> 'yellow-sapphire',
            'carat'        => '4.10',
            'color'        => 'Vivid Golden Yellow',
            'color_slug'   => 'yellow',
            'cut'          => 'Oval Brilliant Cut',
            'cut_slug'     => 'oval',
            'clarity'      => 'Eye Clean (VVS1)',
            'origin'       => 'Ratnapura, Sri Lanka (Ceylon)',
            'treatment'    => 'Natural Untreated',
            'dimensions'   => '9.80 x 8.10 x 5.95 mm',
            'cert'         => 'NGJA Certified',
            'price_mode'   => 'show_price',
            'price'        => '285,000',
            'status'       => 'available',
            'featured'     => true,
            'image'        => $theme_uri . '/assets/images/gemstones/yellow-sapphire.svg',
            'description'  => 'Radiant golden warmth and extraordinary sparkle. Ceylon yellow sapphires are internationally treasured for both jewelry and auspicious heritage.'
        ),
        array(
            'id'           => 'SG005',
            'title'        => 'Vivid Emerald Cut Emerald – 3.20 Carat',
            'category'     => 'Emerald',
            'category_slug'=> 'emerald',
            'carat'        => '3.20',
            'color'        => 'Deep Vivid Green',
            'color_slug'   => 'green',
            'cut'          => 'Octagonal Emerald Cut',
            'cut_slug'     => 'emerald-cut',
            'clarity'      => 'Minor Natural Jardiniere',
            'origin'       => 'Natural Gem Deposit',
            'treatment'    => 'Insignificant Traditional Oil Only',
            'dimensions'   => '9.20 x 7.40 x 5.10 mm',
            'cert'         => 'Certified Natural Beryl',
            'price_mode'   => 'show_price',
            'price'        => '320,000',
            'status'       => 'available',
            'featured'     => true,
            'image'        => $theme_uri . '/assets/images/gemstones/emerald.svg',
            'description'  => 'A majestic emerald featuring a balanced step-cut pavilion and rich, deep green luminescence.'
        ),
        array(
            'id'           => 'SG006',
            'title'        => 'Hot Pink Ceylon Sapphire – 2.65 Carat',
            'category'     => 'Pink Sapphire',
            'category_slug'=> 'pink-sapphire',
            'carat'        => '2.65',
            'color'        => 'Vivid Magenta Pink',
            'color_slug'   => 'pink',
            'cut'          => 'Oval Mixed Cut',
            'cut_slug'     => 'oval',
            'clarity'      => 'Eye Clean (VVS)',
            'origin'       => 'Balangoda, Sri Lanka',
            'treatment'    => 'Natural Unheated',
            'dimensions'   => '8.25 x 6.70 x 4.80 mm',
            'cert'         => 'Certified Ceylon Corundum',
            'price_mode'   => 'show_price',
            'price'        => '220,000',
            'status'       => 'available',
            'featured'     => true,
            'image'        => $theme_uri . '/assets/images/gemstones/pink-sapphire.svg',
            'description'  => 'Electrifying pink brilliance with unmatched crystal clarity. Perfect for bespoke luxury fine jewelry.'
        ),
        array(
            'id'           => 'SG007',
            'title'        => 'Brilliant White Ceylon Sapphire – 3.85 Carat',
            'category'     => 'White Sapphire',
            'category_slug'=> 'white-sapphire',
            'carat'        => '3.85',
            'color'        => 'Colorless / D-F Equivalent',
            'color_slug'   => 'white',
            'cut'          => 'Round Brilliant Cut',
            'cut_slug'     => 'round',
            'clarity'      => 'Flawless (IF)',
            'origin'       => 'Ratnapura, Sri Lanka',
            'treatment'    => 'Natural Unheated',
            'dimensions'   => '8.90 x 8.90 x 5.40 mm',
            'cert'         => 'Certified Natural White Sapphire',
            'price_mode'   => 'show_price',
            'price'        => '175,000',
            'status'       => 'available',
            'featured'     => false,
            'image'        => $theme_uri . '/assets/images/gemstones/white-sapphire.svg',
            'description'  => 'Natural pure white corundum exhibiting diamond-like optical fire and superior hardness.'
        ),
        array(
            'id'           => 'SG008',
            'title'        => 'Flame Red Ceylon Spinel – 2.90 Carat',
            'category'     => 'Spinel',
            'category_slug'=> 'spinel',
            'carat'        => '2.90',
            'color'        => 'Intense Flame Scarlet',
            'color_slug'   => 'red',
            'cut'          => 'Cushion Mixed Cut',
            'cut_slug'     => 'cushion',
            'clarity'      => 'Eye Clean (VVS1)',
            'origin'       => 'Pelmadulla, Sri Lanka',
            'treatment'    => 'Untreated / Completely Natural',
            'dimensions'   => '8.10 x 7.30 x 5.20 mm',
            'cert'         => 'Certified Natural Spinel',
            'price_mode'   => 'show_price',
            'price'        => '195,000',
            'status'       => 'available',
            'featured'     => false,
            'image'        => $theme_uri . '/assets/images/gemstones/spinel.svg',
            'description'  => 'Singular singly-refractive gemstone with incandescent fire and legendary collector allure.'
        ),
        array(
            'id'           => 'SG009',
            'title'        => 'Rhodolite Ceylon Garnet – 4.50 Carat',
            'category'     => 'Garnet',
            'category_slug'=> 'garnet',
            'carat'        => '4.50',
            'color'        => 'Velvet Wine Red',
            'color_slug'   => 'red',
            'cut'          => 'Oval Brilliant Cut',
            'cut_slug'     => 'oval',
            'clarity'      => 'Eye Clean',
            'origin'       => 'Monaragala, Sri Lanka',
            'treatment'    => 'Natural Untreated',
            'dimensions'   => '10.20 x 8.40 x 5.60 mm',
            'cert'         => 'Certified Natural Garnet',
            'price_mode'   => 'show_price',
            'price'        => '110,000',
            'status'       => 'available',
            'featured'     => false,
            'image'        => $theme_uri . '/assets/images/gemstones/garnet.svg',
            'description'  => 'Rich burgundy-raspberry red hue with magnificent depth and clean transparent luster.'
        ),
        array(
            'id'           => 'SG010',
            'title'        => 'Teal Lagoon Ceylon Tourmaline – 3.75 Carat',
            'category'     => 'Tourmaline',
            'category_slug'=> 'tourmaline',
            'carat'        => '3.75',
            'color'        => 'Teal / Deep Blue-Green',
            'color_slug'   => 'green',
            'cut'          => 'Emerald Step Cut',
            'cut_slug'     => 'emerald-cut',
            'clarity'      => 'Eye Clean (VVS)',
            'origin'       => 'Ratnapura, Sri Lanka',
            'treatment'    => 'Natural Untreated',
            'dimensions'   => '9.85 x 6.90 x 5.10 mm',
            'cert'         => 'Certified Natural Tourmaline',
            'price_mode'   => 'show_price',
            'price'        => '160,000',
            'status'       => 'available',
            'featured'     => false,
            'image'        => $theme_uri . '/assets/images/gemstones/tourmaline.svg',
            'description'  => 'Mesmerizing ocean teal pleochroism cutting through an immaculate emerald-shaped table.'
        ),
    );
}

/**
 * Automatically populate sample posts upon theme activation if empty
 */
function shaheer_seed_sample_data_on_activate() {
    $existing = get_posts(array(
        'post_type'      => 'gemstone',
        'posts_per_page' => 1,
        'post_status'    => 'any'
    ));

    if (!empty($existing)) {
        return; // Don't duplicate if already seeded
    }

    $samples = shaheer_get_sample_gemstones();

    foreach ($samples as $sample) {
        $post_id = wp_insert_post(array(
            'post_title'   => $sample['title'],
            'post_content' => $sample['description'],
            'post_type'    => 'gemstone',
            'post_status'  => 'publish'
        ));

        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, '_gem_id', $sample['id']);
            update_post_meta($post_id, '_gem_carat', $sample['carat']);
            update_post_meta($post_id, '_gem_color', $sample['color']);
            update_post_meta($post_id, '_gem_cut', $sample['cut']);
            update_post_meta($post_id, '_gem_clarity', $sample['clarity']);
            update_post_meta($post_id, '_gem_origin', $sample['origin']);
            update_post_meta($post_id, '_gem_treatment', $sample['treatment']);
            update_post_meta($post_id, '_gem_dimensions', $sample['dimensions']);
            update_post_meta($post_id, '_gem_certification', $sample['cert']);
            update_post_meta($post_id, '_gem_status', $sample['status']);
            update_post_meta($post_id, '_gem_price_mode', $sample['price_mode']);
            update_post_meta($post_id, '_gem_price', str_replace(',', '', $sample['price']));
            update_post_meta($post_id, '_gem_is_featured', $sample['featured'] ? '1' : '0');

            // Assign taxonomy
            wp_set_object_terms($post_id, $sample['category'], 'gemstone_category');
            wp_set_object_terms($post_id, $sample['cut'], 'gemstone_cut');
            wp_set_object_terms($post_id, $sample['color'], 'gemstone_color');
        }
    }
}
add_action('after_switch_theme', 'shaheer_seed_sample_data_on_activate');
