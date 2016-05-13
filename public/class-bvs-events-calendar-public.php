<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://reddes.bvsalud.org/
 * @since      1.0.0
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/public
 * @author     BIREME/OPAS/OMS <bvs.technical.support@listas.bireme.br>
 */
class BVS_Events_Calendar_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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
		 * defined in BVS_Events_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BVS_Events_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bvs-events-calendar-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'jquery-anyslider', plugin_dir_url( __FILE__ ) . 'anyslider/jquery-anyslider.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', array(), '1.11.4', 'all' );

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
		 * defined in BVS_Events_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BVS_Events_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '1.11.3', false );
        wp_enqueue_script( 'jquery-ui', '//code.jquery.com/ui/1.11.4/jquery-ui.js', array(), '1.11.4', false );
        wp_enqueue_script( 'jquery-anyslider', plugin_dir_url( __FILE__ ) . 'js/jquery.anyslider.js', array(), '2.1.0-beta', false );
        wp_enqueue_script( 'jquery-easing', plugin_dir_url( __FILE__ ) . 'js/jquery.easing.1.3.js', array(), '1.3', false );
        wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', false );
        wp_enqueue_script( 'google-map-init', plugin_dir_url( __FILE__ ) . 'js/google-maps.js', array('google-map', 'jquery'), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bvs-events-calendar-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Registra os temas do plugin BVS Agenda de Eventos
	 *
	 * @since     1.0.0
	 */
	public function events_calendar_register_theme() {
		$path = WP_PLUGIN_DIR . '/' . $this->plugin_name . '/wp-themes';
		register_theme_directory( $path );
	}

}
