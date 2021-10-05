<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_Service
 * @subpackage Ds_Service/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ds_Service
 * @subpackage Ds_Service/includes
 * @author     Esubalew <esubalew.a2009@gmail.com>
 */
class Ds_Service_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		
		global $table_prefix, $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_services");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_users");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_shares");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_likes");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_reactions");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_comments");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_tags");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_post_tags");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_follows");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_notifs");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_reward_types");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_points");
		$wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "ds_point_items");
		// $wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "");
		// $wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "");
		// $wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "");
		// $wpdb->query("DROP TABLE IF EXISTS " .  $table_prefix . "");
	}

}
