<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://windt.dev
 * @since      1.0.0
 *
 * @package    Wpkenteken
 * @subpackage Wpkenteken/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wpkenteken
 * @subpackage Wpkenteken/public
 * @author     Sander van der WIndt <sander@windt.dev>
 */
class Wpkenteken_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpkenteken-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpkenteken-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name );

		$wpkenteken_ajax_nonce   = wp_create_nonce( 'wpkenteken_ajax_nonce' );
		$ajax_url                = admin_url( 'admin-ajax.php' );
		$api_key                 = get_option( 'wpkenteken_rdw_api_key' ) ?? '';
		$no_results_msg          = esc_html__( 'No results found', 'wpkenteken' );
		$invalid_message         = esc_html__( 'Input is invalid. Check your input and try again.', 'wpkenteken' );
		$not_found_error_message = esc_html__( 'The resource could not be found.', 'wpkenteken' );
		$server_error_message    = esc_html__( 'Internal server error.', 'wpkenteken' );
		$default_error_message   = esc_html__( 'An unexpected error occurred.', 'wpkenteken' );

		wp_localize_script(
			$this->plugin_name,
			'wpkenteken_ajax_object',
			array(
				'ajax_url'                => $ajax_url,
				'wpkenteken_ajax_nonce'   => $wpkenteken_ajax_nonce,
				'api_key'                 => $api_key,
				'no_results_message'      => $no_results_msg,
				'invalid_message'         => $invalid_message,
				'not_found_error_message' => $not_found_error_message,
				'server_error_message'    => $server_error_message,
				'default_error_message'   => $default_error_message,
			)
		);
	}
}
