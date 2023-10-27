<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://windt.dev
 * @since      1.0.0
 *
 * @package    Wpkenteken
 * @subpackage Wpkenteken/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wpkenteken
 * @subpackage Wpkenteken/includes
 * @author     Sander van der WIndt <sander@windt.dev>
 */
class Wpkenteken_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 * 
	 * @return mixed
	 */
	public static function deactivate() {

		$setting = get_option( 'wpkenteken_rdw_api_key' );

		if ( strlen( $setting ) > 1 ) {
			delete_option( 'wpkenteken_rdw_api_key' );
		}
	}

}
