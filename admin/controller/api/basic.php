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
class DS_basic_API
{

	public function __construct()
	{
	}

	function rest_ds_basics()
	{
		add_action('rest_api_init', function () {
			register_rest_route(DSSERVICE . '/v1', '/last_update', array(
				'methods' => 'GET',
				'callback' => function () {

					return array(
						"success" => true,
						"error" => false,
						"last_update" => date("Y-m-d")
					);
				},
			));
		});
	}

}
