<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    DSSERVICE
 * @subpackage DSSERVICE/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    DSSERVICE
 * @subpackage DSSERVICE/admin
 * @author     Esubalew Amenu <esubalew.a2009@gmail.com>
 */
class DS_admin_common
{

	public function __construct()
	{
	
	}

	function ds_bs_post_type_registration_init()
	{
		$labels = array(
			'name'                  => _x('Base Service', 'Post type general name', 'ds_base_service'),
			'singular_name'         => _x('Factory', 'Post type singular name', 'ds_base_service'),
			'menu_name'             => _x('Base Service', 'Admin Menu text', 'ds_base_service'),
			'name_admin_bar'        => _x('Factory', 'Add New on Toolbar', 'ds_base_service'),
			'add_new'               => __('Add New', 'ds_base_service'),
			'add_new_item'          => __('Add New ds_base_service', 'ds_base_service'),
			'new_item'              => __('New ds_base_service', 'ds_base_service'),
			'edit_item'             => __('Edit ds_base_service', 'ds_base_service'),
			'view_item'             => __('View ds_base_service', 'ds_base_service'),
			'all_items'             => __('All ds_base_services', 'ds_base_service'),
			'search_items'          => __('Search ds_base_services', 'ds_base_service'),
			'parent_item_colon'     => __('Parent ds_base_services:', 'ds_base_service'),
			'not_found'             => __('No ds_base_services found.', 'ds_base_service'),
			'not_found_in_trash'    => __('No ds_base_services found in Trash.', 'ds_base_service'),
			'featured_image'        => _x('Factory Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ds_base_service'),
			'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ds_base_service'),
			'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ds_base_service'),
			'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ds_base_service'),
			'archives'              => _x('Factory archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ds_base_service'),
			'insert_into_item'      => _x('Insert into ds_base_service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ds_base_service'),
			'uploaded_to_this_item' => _x('Uploaded to this ds_base_service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ds_base_service'),
			'filter_items_list'     => _x('Filter ds_base_services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ds_base_service'),
			'items_list_navigation' => _x('Base Service list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ds_base_service'),
			'items_list'            => _x('Base Service list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ds_base_service'),
		);
		$args = array(
			'labels'             => $labels,
			'description'        => 'Base Service custom post type.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'ds_base_services'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => array('title', 'editor', 'author', 'thumbnail'),
			'taxonomies'         => array('category', 'post_tag'),
			'show_in_rest'       => true
		);

		register_post_type('ds_base_services', $args);
	}
}
