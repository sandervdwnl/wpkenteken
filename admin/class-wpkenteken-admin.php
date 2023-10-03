<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://windt.dev
 * @since      1.0.0
 *
 * @package    Wpkenteken
 * @subpackage Wpkenteken/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpkenteken
 * @subpackage Wpkenteken/admin
 * @author     Sander van der WIndt <sander@windt.dev>
 */
class Wpkenteken_Admin {

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

	/**
	 * Set class properties
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
		 * defined in Wpkenteken_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpkenteken_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpkenteken-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wpkenteken_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpkenteken_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpkenteken-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register sub-menu item for the Admin page.
	 */

	public function wpkenteken_options_menu( ) {
		
		add_submenu_page( 
			'options-general.php', 
			'WPKenteken Options', 
			'WPKenteken Options', 
			'manage_options', 
			'wpkenteken',
			array( $this, 'show_options_page' )
		);
	}

	public function show_options_page() {
		include plugin_dir_path( __FILE__ ) . '/partials/wpkenteken-admin-display.php';
	}

	
}
