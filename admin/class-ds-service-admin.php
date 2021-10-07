<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_Service
 * @subpackage Ds_Service/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ds_Service
 * @subpackage Ds_Service/admin
 * @author     Esubalew <esubalew.a2009@gmail.com>
 */
class Ds_Service_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ds_Service_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ds_Service_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ds-service-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ds_Service_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ds_Service_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ds-service-admin.js', array( 'jquery' ), $this->version, false );

	}




	function ds_service_admin_menu_section()
	{
		$page_title = "DS Services";
		$menu_title = "DS Services";
		$capability = "manage_options";
		$menu_slug = "ds-services-menu";
		$functionCallable = array($this, "ds_menupage_on_click");
		$icon_url = "";
		$position = 200;
		add_menu_page($page_title, $menu_title, $capability, $menu_slug, $functionCallable, $icon_url, $position);

		add_submenu_page($menu_slug, "Services", "Services", $capability, $menu_slug . '_services', array($this, "ds_services_OnClick"));
		// add_submenu_page($menu_slug, "Review Submissions", "Review Submissions", $capability, $menu_slug . '_review_submissions', array($this, "xcc_cf_review_submissions_OnClick"));
		// add_submenu_page($menu_slug, "Publication Review", "Publication Review", $capability, $menu_slug . '_publication_reviews', array($this, "xcc_cf_publication_reviews_OnClick"));
		// add_submenu_page($menu_slug, "Declined Requests", "Declined Requests", $capability, $menu_slug . '_declined_req_art', array($this, "xcc_cf_declined_req_art_OnClick"));
		// add_submenu_page($menu_slug, "XND Settings", "XND Settings", $capability, $menu_slug . '_xnd_settings', array($this, "xcc_cf_settings_OnClick"));
	}

	public function ds_services_OnClick()
	{
		echo "ds_services_OnClick page";
	}
	public function ds_menupage_on_click()
	{

		include_once DSSERVICE_PLAGIN_DIR . '/admin/partials/pages/services.php';
		// echo "What do you went? </br> Plese choose from sub-menu!!";
	}
}
