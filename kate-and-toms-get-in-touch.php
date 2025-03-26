<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://elliottrichmond.co.uk
 * @since             1.0.0
 * @package           Kate_And_Toms_Get_In_Touch
 *
 * @wordpress-plugin
 * Plugin Name:       Kate & Toms Get In Touch
 * Plugin URI:        https://kateandtoms.com
 * Description:       Renders the get intouch from specific to kateandtoms and using the action hook 'kateandtoms_get_in_touch'.
 * Version:           1.0.0
 * Author:            Elliott Richmond
 * Author URI:        https://elliottrichmond.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kate-and-toms-get-in-touch
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'KATE_AND_TOMS_GET_IN_TOUCH_VERSION', '1.0.0' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kate-and-toms-get-in-touch-activator.php
 */
function activate_kate_and_toms_get_in_touch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kate-and-toms-get-in-touch-activator.php';
	Kate_And_Toms_Get_In_Touch_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kate-and-toms-get-in-touch-deactivator.php
 */
function deactivate_kate_and_toms_get_in_touch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kate-and-toms-get-in-touch-deactivator.php';
	Kate_And_Toms_Get_In_Touch_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kate_and_toms_get_in_touch' );
register_deactivation_hook( __FILE__, 'deactivate_kate_and_toms_get_in_touch' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kate-and-toms-get-in-touch.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kate_and_toms_get_in_touch() {

	$plugin = new Kate_And_Toms_Get_In_Touch();
	$plugin->run();

}
run_kate_and_toms_get_in_touch();
