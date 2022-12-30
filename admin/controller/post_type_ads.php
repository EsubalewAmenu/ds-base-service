<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_service_ads
 * @subpackage Ds_service_ads/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ds_service_ads
 * @subpackage Ds_service_ads/admin
 * @author     Esubalew A. <esubalew.amenu@singularitynet.io>
 */
class Ds_service_post_type_ads_Admin
{

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */

    public function __construct()
    {
    }

    function ads_registration_init()
    {
        $labels = array(
            'name'                  => _x('Ads', 'Post type general name', 'Ads'),
            'singular_name'         => _x('ad', 'Post type singular name', 'ad'),
            'menu_name'             => _x('Basic Services', 'Admin Menu text', 'Ads'),
            'name_admin_bar'        => _x('Ads', 'Add New on Toolbar', 'Ads'),
            'add_new'               => __('Add New', 'Ads'),
            'add_new_item'          => __('Add New ad', 'Ads'),
            'new_item'              => __('New Ad', 'Ads'),
            'edit_item'             => __('Edit Ad', 'Ads'),
            'view_item'             => __('View Ad', 'Ads'),
            'all_items'             => __('All Ads', 'Ads'),
            'search_items'          => __('Search ads', 'Ads'),
            'parent_item_colon'     => __('Parent ads:', 'Ads'),
            'not_found'             => __('No ads found.', 'Ads'),
            'not_found_in_trash'    => __('No ads found in Trash.', 'Ads'),
            'featured_image'        => _x('ad Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'general_plugin'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'general_plugin'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'general_plugin'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'general_plugin'),
            'archives'              => _x('ad archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'general_plugin'),
            'insert_into_item'      => _x('Insert into ad', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'general_plugin'),
            'uploaded_to_this_item' => _x('Uploaded to this ad', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'general_plugin'),
            'filter_items_list'     => _x('Filter ads list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'general_plugin'),
            'items_list_navigation' => _x('ad list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'general_plugin'),
            'items_list'            => _x('ad list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'general_plugin'),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => 'ad custom post type.',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'ds_service_ads'),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'menu_icon'   => 'dashicons-book',
            // 'supports'           => array('title', 'editor', 'author'),
            // 'taxonomies'         => array('post_tag'),
            'show_in_rest'       => true
        );

        register_post_type('ds_service_ads', $args);
    }
}
