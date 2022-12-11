<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_bm_metas
 * @subpackage Ds_bm_metas/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ds_bm_metas
 * @subpackage Ds_bm_metas/admin
 * @author     Esubalew A. <esubalew.amenu@singularitynet.io>
 */
class Ds_service_apps_taxonomy_Admin
{



     /**
      * Create two taxonomies, App and writers for the post type "app categorie".
      *
      * @see register_post_type() for registering custom post types.
      */
     function wpdocs_create_ds_service_apps_taxonomies()
     {
          $labels = array(
               'name'              => _x('App', 'taxonomy general name', 'textdomain'),
               'singular_name'     => _x('App', 'taxonomy singular name', 'textdomain'),
               'search_items'      => __('Search App', 'textdomain'),
               'all_items'         => __('All App', 'textdomain'),
               'parent_item'       => __('Parent App', 'textdomain'),
               'parent_item_colon' => __('Parent app categorie:', 'textdomain'),
               'edit_item'         => __('Edit App', 'textdomain'),
               'update_item'       => __('Update App', 'textdomain'),
               'add_new_item'      => __('Add New App', 'textdomain'),
               'new_item_name'     => __('New app categorie Name', 'textdomain'),
               'menu_name'         => __('App', 'textdomain'),
          );

          $args = array(
               'hierarchical'      => true,
               'labels'            => $labels,
               'show_ui'           => true,
               'show_admin_column' => true,
               'query_var'         => true,
               'rewrite'           => array('slug' => 'ds_service_apps'),
               'show_in_rest'       => true
          );

          register_taxonomy('ds_service_apps', array('ds_service_ads'), $args);

          unset($args);
          unset($labels);
     }
}
