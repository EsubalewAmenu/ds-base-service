<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_human_languages
 * @subpackage Ds_human_languages/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ds_human_languages
 * @subpackage Ds_human_languages/admin
 * @author     Esubalew A. <esubalew.amenu@singularitynet.io>
 */
class Ds_human_languages_taxonomy_Admin
{
     /**
      * Create two taxonomies, pls and writers for the post type "book".
      *
      * @see register_post_type() for registering custom post types.
      */
     function wpdocs_create_ds_human_lang_taxonomies()
     {
          $labels = array(
               'name'              => _x('Human languages', 'taxonomy general name', 'textdomain'),
               'singular_name'     => _x('Human language', 'taxonomy singular name', 'textdomain'),
               'search_items'      => __('Search Human languages', 'textdomain'),
               'all_items'         => __('All Human languages', 'textdomain'),
               'parent_item'       => __('Parent Human language', 'textdomain'),
               'parent_item_colon' => __('Parent Human language:', 'textdomain'),
               'edit_item'         => __('Edit Human language', 'textdomain'),
               'update_item'       => __('Update Human language', 'textdomain'),
               'add_new_item'      => __('Add New Human language', 'textdomain'),
               'new_item_name'     => __('New Human language Name', 'textdomain'),
               'menu_name'         => __('Human languages', 'textdomain'),
          );

          $args = array(
               'hierarchical'      => true,
               'labels'            => $labels,
               'show_ui'           => true,
               'show_admin_column' => true,
               'query_var'         => true,
               'rewrite'           => array('slug' => 'ds_human_lang'),
               'show_in_rest'       => true
          );

          register_taxonomy('ds_human_lang', array('ds_community_lessons'), $args);

          unset($args);
          unset($labels);
     }
}
