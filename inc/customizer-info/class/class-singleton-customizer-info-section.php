<?php
/**
 * Customizer info singleton class file.
 *
 * @package parallax-one
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Customizer_Info_Singleton {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ), 1 );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager WordPress customizer object.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer-info/class/class-customizer-info-section.php' );

		// Register custom section types.
		$manager->register_section_type( 'Customizer_Info' );

		if ( ! class_exists( 'Parallax_One_Plus' ) ) {
			$manager->add_section(
				new Customizer_Info(
					$manager, 'parallax_one_view_pro', array(
						'section_title' => __( 'View PRO version', 'parallax-one' ),
						'section_url'   => 'https://themeisle.com/plugins/parallax-one-plus/',
						'section_text'  => __( 'Get it', 'parallax-one' ),
					)
				)
			);
		}

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'customizer-info-js', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-info/js/customizer-info-controls.js', array( 'customize-controls' ) );
	}
}

Customizer_Info_Singleton::get_instance();
