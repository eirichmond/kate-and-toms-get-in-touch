<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://elliottrichmond.co.uk
 * @since      1.0.0
 *
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/includes
 * @author     Elliott Richmond <elliott@squareonemd.co.uk>
 */
class Kate_And_Toms_Get_In_Touch_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'kate-and-toms-get-in-touch',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
