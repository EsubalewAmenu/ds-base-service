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
class DS_service_public_personal_ad
{

	public function __construct()
	{
	}


	function rest_get_ad()
	{
		add_action('rest_api_init', function () {
			register_rest_route(DSSERVICE . '/v1', '/ad/(?P<app>[a-zA-Z0-9-]+)/(?P<number_of_ad>\d+)', array(
				'methods' => 'GET',
				'callback' => function (WP_REST_Request $request) {

					$app = $request->get_param('app');
					$number_of_ad = $request->get_param('number_of_ad');

					if (!isset($app) || empty($app) || !isset($number_of_ad) || empty($number_of_ad)) {
						$error = new WP_Error();
						$error->add(406, __("'app' & 'number_of_ad' are required fields", 'wp-rest-courses'), array('status' => 400));
						return $error;
					}
					$options = array(
						'posts_per_page' => $number_of_ad,
						'post_type'  => 'ds_service_ads',
						'post_status' => 'publish',
						'orderby' => 'RAND',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'ds_service_apps',
								'field'    => 'slug',
								'terms'    => $app
							)
						)
					);

					$allAd = null;
					$ad = get_posts($options);


					if ($ad) {
						$allAd = [];
						foreach ($ad as $singleBook) {
							$allAd[] = $singleBook->post_content;
						}

						if (count($allAd) == 1)
							$allAd = $allAd[0];
					}


					$response = array();
					$response['code'] = 200;
					$response['ad'] = $allAd;
					$response['last_update'] = date("Y-m-d");
					return new WP_REST_Response($response, 123);
				},
				'permission_callback' => function () {
					return true; //self::is_user_verified();
				}
			));
		});
	}
}
