<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://elliottrichmond.co.uk
 * @since      1.0.0
 *
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/includes
 * @author     Elliott Richmond <elliott@squareonemd.co.uk>
 */
class Kate_And_Toms_Get_In_Touch {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Kate_And_Toms_Get_In_Touch_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'KATE_AND_TOMS_GET_IN_TOUCH_VERSION' ) ) {
			$this->version = KATE_AND_TOMS_GET_IN_TOUCH_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'kate-and-toms-get-in-touch';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Kate_And_Toms_Get_In_Touch_Loader. Orchestrates the hooks of the plugin.
	 * - Kate_And_Toms_Get_In_Touch_i18n. Defines internationalization functionality.
	 * - Kate_And_Toms_Get_In_Touch_Admin. Defines all hooks for the admin area.
	 * - Kate_And_Toms_Get_In_Touch_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kate-and-toms-get-in-touch-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kate-and-toms-get-in-touch-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-kate-and-toms-get-in-touch-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-kate-and-toms-get-in-touch-public.php';

		$this->loader = new Kate_And_Toms_Get_In_Touch_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Kate_And_Toms_Get_In_Touch_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Kate_And_Toms_Get_In_Touch_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Kate_And_Toms_Get_In_Touch_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Kate_And_Toms_Get_In_Touch_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_action( 'kateandtoms_get_in_touch', $plugin_public, 'kateandtoms_get_in_touch_callback' );
		$this->loader->add_action( 'template_include', $plugin_public, 'kateandtoms_process_contact_form_template', 99 );

		$this->loader->add_action( 'kateandtoms_process_contact_post', $plugin_public, 'kateandtoms_process_contact_post_callback', 10, 1 );
		$this->loader->add_action( 'kateandtoms_process_contact_partners_post', $plugin_public, 'kateandtoms_process_contact_partners_post_callback', 10, 1 );
		$this->loader->add_action( 'wp_ajax_nopriv_ktsgif_contact_form', $plugin_public, 'ktsgif_contact_form' );
		$this->loader->add_action( 'wp_ajax_ktsgif_contact_form', $plugin_public, 'ktsgif_contact_form' );

		$this->loader->add_action( 'kateandtoms_book_now', $plugin_public, 'kateandtoms_book_now_callback' );
		$this->loader->add_action( 'kateandtoms_get_in_touch_partners', $plugin_public, 'kateandtoms_get_in_touch_partners_callback' );
		$this->loader->add_action( 'kateandtoms_process_booking_post', $plugin_public, 'kateandtoms_process_booking_post_callback', 10, 1 );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Kate_And_Toms_Get_In_Touch_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
