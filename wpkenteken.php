<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://windt.dev
 * @since             1.0.0
 * @package           Wpkenteken
 *
 * @wordpress-plugin
 * Plugin Name:       WPKenteken
 * Plugin URI:        https://github.com/sandervdwnl/wpkenteken-plugin
 * Description:       Fill your form with the car information by filling the car registration number.
 * Version:           1.0.0
 * Author:            Sander van der WIndt
 * Author URI:        https://windt.dev/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpkenteken
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
define( 'WPKENTEKEN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpkenteken-activator.php
 */
function activate_wpkenteken() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpkenteken-activator.php';
	Wpkenteken_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpkenteken-deactivator.php
 */
function deactivate_wpkenteken() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpkenteken-deactivator.php';
	Wpkenteken_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpkenteken' );
register_deactivation_hook( __FILE__, 'deactivate_wpkenteken' );

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
 * @since    1.0.0
 */
function run_wpkenteken() {

	$plugin = new Wpkenteken();
	$plugin->run();

}
run_wpkenteken();
