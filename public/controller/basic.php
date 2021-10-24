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
class DS_public_basic
{

	public function __construct()
	{
	}


	public function ds_basic_service_OnClick($choose)
	{

		// localhost:8082/wp/ds/services?activation=textbooks

		if (isset($_GET['activation'])) {
			if ($_GET['activation'] == "textbooks") {
				// echo "sklddddd";
				echo do_shortcode("[ds_act_tb_code]");
			} else {
				// echo "hellow else";
			}
		}
		//activation end

	}
}
