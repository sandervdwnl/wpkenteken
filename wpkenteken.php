<?php

/**
 * Plugin Name
 *
 * @package           WPKenteken
 * @author            sandervdw
 * @copyright         2023 Windt Webdesign
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WPKenteken
 * Description:       Fill your form with the car information by filling the car registration number.
 * Version:           0.9
 * Requires at least: 6.1
 * Requires PHP:      8.1
 * Author:            sandervdwnl
 * Author URI:        https://windt.dev
 * Text Domain:       wpkenteken
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */




if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Plugin name
define('PLUGIN_NAME', 'WPKenteken');

// Plugin version
define('PLUGIN_VERSION', '0.9');

// Plugin author
define('PLUGIN_AUTHOR', 'sandervdwnl');

// Pluginbeschrijving
define('PLUGIN_DESCRIPTION', 'Deze plugin haalt het kenteken op uit de Open Data API van RDW. Met de opgehaalde informatie kun je je formulier vullen.');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpkenteken.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.09
 */
function run_plugin_name() {

	$plugin = new WPKenteken();
	$plugin->run();

}
run_plugin_name();