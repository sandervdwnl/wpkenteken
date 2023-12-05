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
		$this->version     = $version;
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
	 * Register sub-menu item for the options page in the Options menu.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function wpkenteken_options_menu() {

		add_options_page(
			'WPKenteken Options', // page_title.
			'WPKenteken', // menu title.
			'manage_options', // capabilities.
			'wpkenteken', // menu slug.
			array( $this, 'wpkenteken_options_page' ), // callback (optional) for output.
			null // position in menu.
		);
	}

	/**
	 * Adds the form on the options page.
	 * Called by add_options_page function.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function wpkenteken_options_page() {

		// Get the active tab from the $_GET param.
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : null;

		if ( $tab === null ) {

			?>
		<div class="wrap">
		<nav class="nav-tab-wrapper">
			<a href="?page=wpkenteken" class="nav-tab nav-tab-active">Settings</a>
			<a href="?page=wpkenteken&tab=faq" class="nav-tab">Faq</a>
		</nav>
		<div class="tab-content">
		<form action="options.php" method="post">
			<?php
			settings_fields( 'wpkenteken_options' ); // Outputs hidden inputs.
			do_settings_sections( 'wpkenteken' ); // Outputs input fields.
			?>
		
		<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
		</form>
		</div>
		</div>
		
			<?php
		}

		if ( $tab === 'faq' ) {
			$this->wpkenteken_render_faq_page();
		}
	}

	/**
	 * Registeres a setting for the DB.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function wpkenteken_register_setting_init() {

		register_setting(
			'wpkenteken_options', // wp option_group (general. reading etc.).
			'wpkenteken_rdw_api_key', // option_name. This is the option name in the wp_options table.
			array( 'type' => 'string' ) // args.
		);

		/**
		 * Options section.
		 */
		add_settings_section(
			'wpkenteken_admin_settings_section', // id.
			__( 'RDW API Key', 'wpkenteken' ), // title for heading.
			array( $this, 'wpkenteken_add_settings_section_callback' ), // callback for echoing content between fields and heading.
			'wpkenteken', // wp options page title (generak, reading etc.).
			array() // args (optional).
		);

		/**
		 * Options field.
		 */
		add_settings_field(
			'api_key_value', // id.
			__( 'RDW Open Data API Key', 'wpkenteken' ), // title.
			array( $this, 'wpkenteken_add_settings_field_callback' ), // callback.
			'wpkenteken', // page (general, reading etc.).
			'wpkenteken_admin_settings_section', // slugname of section.
			array(), // args (optional).
		);
	}

	/**
	 * Callback for options section output.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function wpkenteken_add_settings_section_callback() {
		esc_html_e( 'RDW Open Data API Settings', 'wpkenteken' );
	}

	/**
	 * Callback for options field output.
	 * This adds the fields to the settings form.
	 *
	 * @ since 1.0
	 *
	 * @return void
	 */
	public function wpkenteken_add_settings_field_callback() {

		$setting = get_option( 'wpkenteken_rdw_api_key' );
		?>
		<input type="text" name="wpkenteken_rdw_api_key" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
		<?php
	}

	/**
	 * Render FAQ page
	 *
	 * @return mixed $output
	 */
	public function wpkenteken_render_faq_page() {
		?>
		<div class="wrap">
			<div class="tab-content">
				<nav class="nav-tab-wrapper">
					<a href="?page=wpkenteken" class="nav-tab">Settings</a>
					<a href="?page=wpkenteken&tab=faq" class="nav-tab nav-tab-active">Faq</a>
				</nav>
			<?php
			require 'assets/faq.php';
			?>
		</div>
		</div>
		
		<?php
	}
}
