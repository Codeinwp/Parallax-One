<?php
/**
 * parallax-one Theme Customizer
 *
 * @package parallax-one
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 

 

function parallax_one_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	
	
	
	/********************************************************/
	/************** GENERAL OPTIONS  ***************/
	/********************************************************/
	
	$wp_customize->add_section( 'parallax_one_general_section' , array(
		'title'       => __( 'General options', 'parallax-one' ),
      	'priority'    => 30,
      	'description' => __('Paralax One theme general options','parallax-one'),
	));
	
	
	/* LOGO	*/
	$wp_customize->add_setting( 'paralax_one_logo', array(
	'default' => get_template_directory_uri().'/images/logo-nav.png',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
	      	'label'    => __( 'Logo', 'parallax-one' ),
	      	'section'  => 'parallax_one_general_section',
	      	'settings' => 'paralax_one_logo',
			'priority'    => 1,
	)));
	
	/* Disable preloader */
	$wp_customize->add_setting( 'paralax_one_disable_preloader', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control(
			'paralax_one_disable_preloader',
			array(
				'type' => 'checkbox',
				'label' => __('Disable preloader?','parallax-one'),
				'section' => 'parallax_one_general_section',
				'settings' => 'paralax_one_disable_preloader',
				'priority'    => 2,
			)
	);
	
	
	/********************************************************/
	/************** FOOTER OPTIONS  ***************/
	/********************************************************/	
	
	$wp_customize->add_section( 'parallax_one_footer_section' , array(
		'title'       => __( 'Footer options', 'parallax-one' ),
      	'priority'    => 31,
      	'description' => __('Paralax One theme footer options','parallax-one'),
	));	
	
	
	/* Footer Menu */
	require_once ( 'class/parallax-one-menu-dropdown-custom-control.php');
	$wp_customize->add_setting( 'menu_dropdown_setting', array(
		'default'        => '',
	));
	$wp_customize->add_control( new Parallax_One_Menu_Dropdown_Custom_Control( $wp_customize, 'menu_dropdown_setting', array(
		'label'   => __('Footer menu','parallax-one'),
		'section' => 'parallax_one_footer_section',
		'settings'   => 'menu_dropdown_setting',
		'priority' => 1
	) ) );
	
	/* COPYRIGHT */
	$wp_customize->add_setting( 'parallax_one_copyright', array(
		'default' => '&copy;Themeisle',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_copyright', array(
		'label'    => __( 'Copyright', 'parallax-one' ),
		'section'  => 'parallax_one_footer_section',
		'settings' => 'parallax_one_copyright',
		'priority'    => 2,
	));

}
add_action( 'customize_register', 'parallax_one_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function parallax_one_customize_preview_js() {
	wp_enqueue_script( 'parallax_one_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'parallax_one_customize_preview_js' );


function parallax_one_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}


function parallax_one_customizer_script() {
	wp_enqueue_script( 'parallax_one_customizer_script', get_template_directory_uri() . '/js/parallax_one_customizer.js', array("jquery"),'', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'parallax_one_customizer_script' );





