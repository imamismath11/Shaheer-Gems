<?php
/**
 * Custom Post Types & Taxonomies for Shaheer Gems
 *
 * @package Shaheer_Gems
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function shaheer_gems_register_cpt() {
    // 1. Register Gemstone Custom Post Type
    $labels = array(
        'name'                  => _x('Gemstones', 'Post type general name', 'shaheer-gems'),
        'singular_name'         => _x('Gemstone', 'Post type singular name', 'shaheer-gems'),
        'menu_name'             => _x('Gemstones', 'Admin Menu text', 'shaheer-gems'),
        'name_admin_bar'        => _x('Gemstone', 'Add New on Toolbar', 'shaheer-gems'),
        'add_new'               => __('Add New Gemstone', 'shaheer-gems'),
        'add_new_item'          => __('Add New Gemstone', 'shaheer-gems'),
        'new_item'              => __('New Gemstone', 'shaheer-gems'),
        'edit_item'             => __('Edit Gemstone', 'shaheer-gems'),
        'view_item'             => __('View Gemstone', 'shaheer-gems'),
        'all_items'             => __('All Gemstones', 'shaheer-gems'),
        'search_items'          => __('Search Gemstones', 'shaheer-gems'),
        'not_found'             => __('No gemstones found.', 'shaheer-gems'),
        'not_found_in_trash'    => __('No gemstones found in Trash.', 'shaheer-gems'),
        'featured_image'        => _x('Gemstone Main Image', 'Overrides the “Featured Image” phrase', 'shaheer-gems'),
        'set_featured_image'    => _x('Set gemstone image', 'Overrides the “Set featured image” phrase', 'shaheer-gems'),
        'remove_featured_image' => _x('Remove gemstone image', 'Overrides the “Remove featured image” phrase', 'shaheer-gems'),
        'use_featured_image'    => _x('Use as gemstone image', 'Overrides the “Use as featured image” phrase', 'shaheer-gems'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'gemstone', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-awards',
        'show_in_rest'       => true, // Enables Block Editor & REST API
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
    );

    register_post_type('gemstone', $args);

    // 2. Register Gemstone Category Taxonomy
    $cat_labels = array(
        'name'              => _x('Gemstone Categories', 'taxonomy general name', 'shaheer-gems'),
        'singular_name'     => _x('Gemstone Category', 'taxonomy singular name', 'shaheer-gems'),
        'search_items'      => __('Search Categories', 'shaheer-gems'),
        'all_items'         => __('All Categories', 'shaheer-gems'),
        'parent_item'       => __('Parent Category', 'shaheer-gems'),
        'parent_item_colon' => __('Parent Category:', 'shaheer-gems'),
        'edit_item'         => __('Edit Category', 'shaheer-gems'),
        'update_item'       => __('Update Category', 'shaheer-gems'),
        'add_new_item'      => __('Add New Category', 'shaheer-gems'),
        'new_item_name'     => __('New Category Name', 'shaheer-gems'),
        'menu_name'         => __('Categories', 'shaheer-gems'),
    );

    $cat_args = array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'gemstone-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('gemstone_category', array('gemstone'), $cat_args);

    // 3. Register Gemstone Cut Taxonomy
    $cut_labels = array(
        'name'          => _x('Gemstone Cuts', 'taxonomy general name', 'shaheer-gems'),
        'singular_name' => _x('Cut / Shape', 'taxonomy singular name', 'shaheer-gems'),
        'menu_name'     => __('Cuts / Shapes', 'shaheer-gems'),
    );

    $cut_args = array(
        'hierarchical'      => false,
        'labels'            => $cut_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'gemstone-cut'),
        'show_in_rest'      => true,
    );

    register_taxonomy('gemstone_cut', array('gemstone'), $cut_args);

    // 4. Register Gemstone Color Taxonomy
    $color_labels = array(
        'name'          => _x('Gemstone Colors', 'taxonomy general name', 'shaheer-gems'),
        'singular_name' => _x('Color Tone', 'taxonomy singular name', 'shaheer-gems'),
        'menu_name'     => __('Colors', 'shaheer-gems'),
    );

    $color_args = array(
        'hierarchical'      => false,
        'labels'            => $color_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'gemstone-color'),
        'show_in_rest'      => true,
    );

    register_taxonomy('gemstone_color', array('gemstone'), $color_args);
}
add_action('init', 'shaheer_gems_register_cpt');
