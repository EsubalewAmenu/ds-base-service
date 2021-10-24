<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_Service
 * @subpackage Ds_Service/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ds_Service
 * @subpackage Ds_Service/includes
 * @author     Esubalew <esubalew.a2009@gmail.com>
 */
class Ds_Service_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		self::ds_comment_create_table();
		self::ds_follow_create_table();
		self::ds_like_create_table();
		self::ds_notif_create_table();
		self::ds_post_tags_create_table();
		self::ds_react_create_table();
		self::ds_service_create_table();
		self::ds_share_create_table();
		self::ds_tag_create_table();
		self::ds_user_create_table(); 
	}


	// public static function ds_service_settings_create_table()
	// {
	// 	global $table_prefix, $wpdb;

	// 	$wp_ds_table = $table_prefix . "ds_b_service_settings";

	// 	if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
	// 		$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
	// 		$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

	// 		$sql .= "  `service_id`  int(10) NOT NULL, ";
	// 		$sql .= "  `reward_type_id`  int(10) NOT NULL, ";

	// 		$sql .= "  `amount` DECIMAL(16,8) NOT NULL, ";

	// 		$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			// $sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			// $sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

	// $sql .= "  `enabled` int(10) DEFAULT 1, ";
	// 		$sql .= "  `user_id` int(10) NOT NULL, ";
	// 		$sql .= "  PRIMARY KEY (`id`) ";
	// 		$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

	// 		dbDelta($sql);
	// 	}
	// }

	public static function ds_notif_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_notifs";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `notif` text NOT NULL, ";
			$sql .= "  `service_id`  int(10) NOT NULL, ";
			$sql .= "  `notif_of`  varchar(50) COLLATE utf8mb4_unicode_ci   NOT NULL, "; // approved, like .....
			$sql .= "  `additional`  varchar(25) COLLATE utf8mb4_unicode_ci   NOT NULL, "; // item service id,
			$sql .= "  `notif_type` ENUM('p', 'n', 'i') NOT NULL, "; // positive, negative & info

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `status` int(10) default 0, ";
			$sql .= "  `user_id`  int(10) NOT NULL, ";
			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

	public static function ds_follow_create_table()
	{

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_follows";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `service_id`  int(10) NOT NULL, ";
			$sql .= "  `follower_id`  int(10) NOT NULL, ";
			$sql .= "  `following_id`  int(10) NOT NULL, ";

			$sql .= "  `since_` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";
 
			$sql .= "  `status` int(10) NOT NULL, "; // 1 folow, 2 block
			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

	public static function ds_post_tags_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_post_tags";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `service_id`  int(10) NOT NULL, ";
			$sql .= "  `service_item_id`  int(10) NOT NULL, ";
			$sql .= "  `tag_id`  int(10) NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `enabled` int(10) DEFAULT 1, ";
			$sql .= "  `user_id`  int(10) NOT NULL, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

	public static function ds_tag_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_tags";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL, ";
			$sql .= "  `to_services` text COLLATE utf8mb4_unicode_ci NOT NULL, "; //when add " serviceid," - space service id comma

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `enabled` int(10) DEFAULT 1, ";
			$sql .= "  `user_id`  int(10) NOT NULL, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

	public static function ds_comment_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_comments";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `service_id`  int(10) NOT NULL, "; // for replay, make this 0 and service item to parent comment id
			$sql .= "  `service_item_id`  int(10) NOT NULL, ";
			$sql .= "  `author_id`  int(10) NOT NULL, ";

			$sql .= "  `content` text COLLATE utf8mb4_unicode_ci NOT NULL, ";
			$sql .= "  `status`  int(10) NOT NULL, ";
			$sql .= "  `approved_by`  int(10) NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `enabled` int(10) DEFAULT 1, ";
			$sql .= "  `user_id`  int(10) NOT NULL, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}
	public static function ds_react_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_reactions";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `service_id`  int(10) NOT NULL, ";
			$sql .= "  `service_item_id`  int(10) NOT NULL, ";
			$sql .= "  `sentiment` ENUM('P', 'N') NOT NULL, ";
			$sql .= "  `code`  varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `enabled` int(10) DEFAULT 1, ";
			$sql .= "  `user_id`  int(10) NOT NULL, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}
	public static function ds_like_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_likes";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `service_id`  int(10) NOT NULL, ";
			$sql .= "  `service_item_id`  int(10) NOT NULL, ";
			$sql .= "  `islike` ENUM('L', 'D') NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `user_id`  int(10) NOT NULL, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

	public static function ds_share_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_shares";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `service_id`  int(10) NOT NULL, ";
			$sql .= "  `service_item_id`  int(10) NOT NULL, ";
			$sql .= "  `shared_on` ENUM('FB', 'TW', 'WP', 'TG') NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `user_id`  int(10) NOT NULL, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}



	public static function ds_user_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_users";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `name`  varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL, ";
			$sql .= "  `phone`  varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `status` int(10) default 0, ";
			$sql .= "  `enabled` int(10) DEFAULT 1, ";
			$sql .= "  `user_id`  int(10) NOT NULL, "; // main wp user id

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

	public static function ds_service_create_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_table = $table_prefix . "ds_b_services";

		if ($wpdb->get_var("show tables like '$wp_ds_table'") != $wp_ds_table) {
			$sql = "CREATE TABLE `" . $wp_ds_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `title`  varchar(255) COLLATE utf8mb4_unicode_ci   NOT NULL, ";
			$sql .= "  `name`  varchar(255) COLLATE utf8mb4_unicode_ci   NOT NULL, ";

			$sql .= "  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `enabled` int(10) DEFAULT 1, ";
			$sql .= "  `user_id`  int(10) NOT NULL, ";
			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}

}
