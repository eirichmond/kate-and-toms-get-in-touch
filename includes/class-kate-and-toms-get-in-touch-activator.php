<?php

/**
 * Fired during plugin activation
 *
 * @link       https://elliottrichmond.co.uk
 * @since      1.0.0
 *
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Kate_And_Toms_Get_In_Touch
 * @subpackage Kate_And_Toms_Get_In_Touch/includes
 * @author     Elliott Richmond <elliott@squareonemd.co.uk>
 */
class Kate_And_Toms_Get_In_Touch_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$kate_and_toms_get_in_touch_config = array(
			'public_pages' => array(
				array(
					'title' => 'Process Contact Forms',
					'slug' => 'process-contact-forms',
					'post_type' => 'page'
				),
				array(
					'title' => 'Process Booking Forms',
					'slug' => 'process-booking-forms',
					'post_type' => 'page'
				)
			)
		);

		foreach ($kate_and_toms_get_in_touch_config['public_pages'] as $page) {

			$page_id = -1;
			$title = $page['title'];
			$slug = $page['slug'];
			// If a post doesn't already exist with the specified title, create it
			//if( null == bdaily_get_permalink_by_title( $slug, $post_type ) ) {
			if( null == get_page_by_title( $title ) ) {
				$page_id = wp_insert_post(
					array(
						'comment_status' =>	'closed',
						'ping_status'    =>	'closed',
						'post_author'    =>	1,			// Administrator
						'post_title'     =>	$title,
						'post_name'      =>	$slug,
						'post_status'    =>	'publish',
						'post_type'      =>	'page',
						'post_parent'    => 0
					)
				);
			}

		}


	}

}
