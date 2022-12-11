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
class DS_users_API
{

	public function __construct()
	{
	}
	function rest_ds_users()
	{
		add_action('rest_api_init', function () {
			register_rest_route(DSSERVICE . '/v1', '/available/subjects', array(
				'methods' => 'POST',
				'callback' => function () {


					global $table_prefix, $wpdb;

					$question_grades_table = $table_prefix . "ds_question_grades";
					$users_table = $table_prefix . "DSSERVICE";

					$subjects = $wpdb->get_results("SELECT id, grade, subject, chapter_name, id as chap FROM $question_grades_table", OBJECT);

					if (count($subjects)) {
						foreach ($subjects as $subject) {
							$subject->chap = $wpdb->get_results("SELECT DISTINCT chapter FROM $users_table where question_grade_id = " . $subject->id, OBJECT);
						}
					}

					return array(
						"success" => true,
						"error" => false,
						"que_service" => $subjects
					);
				},
				'permission_callback' => function () {
                    return true;//self::is_user_verified();
                }
			));
		});
	}
	function rest_ds_get_user()
	{
		add_action('rest_api_init', function () {
			register_rest_route(DSSERVICE . '/v1', '/users/(?P<id>\d+)', array(
				'methods' => 'GET',
				'callback' => function (WP_REST_Request $request) {

					$id = $request->get_param('id');

					global $table_prefix, $wpdb;

					$ds_users_table = $table_prefix . "ds_users";

					$ques = $wpdb->get_results(
						"SELECT * FROM $ds_users_table where id=" . $id
							. ' and enabled=1 LIMIT 1',
						OBJECT
					);

					return array(
						"success" => true,
						"error" => false,
						"ques" => $ques
					);
				},
				'permission_callback' => function () {
                    return true;//self::is_user_verified();
                }
			));
		});

		add_action('rest_api_init', function () {
			register_rest_route(DSSERVICE . '/v1', '/users/(?P<phone>\d+)', array( // change \d+ to string
				'methods' => 'GET',
				'callback' => function (WP_REST_Request $request) {

					$phone = $request->get_param('phone');

					global $table_prefix, $wpdb;

					$ds_users_table = $table_prefix . "ds_users";

					$ques = $wpdb->get_results(
						"SELECT * FROM $ds_users_table where phone=" . $phone . ' and enabled=1 LIMIT 1',
						OBJECT
					);

					return array(
						"success" => true,
						"error" => false,
						"ques" => $ques
					);
				},
				'permission_callback' => function () {
                    return true;//self::is_user_verified();
                }
			));
		});
	}
}
