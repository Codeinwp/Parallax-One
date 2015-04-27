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
	/************** SECTIONS ORDER  ************************/
	/********************************************************/

	require_once ( 'class/parallax-one-display-message-custom-control.php');
	$wp_customize->add_section( 'parallax_one_sections_order_in_pro' , array(
			'title'       => __( 'Sections order', 'parallax-one' ),
			'priority'    => 29,
	));
	
	$wp_customize->add_setting( 'parallax_one_sections_order_in_pro', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_sections_order_in_pro',
		array(
			'section' => 'parallax_one_sections_order_in_pro'
	   ), __('Check out the PRO version for full control over homepage sections order !','parallax-one')
	));	


	/********************************************************/
	/************** GENERAL OPTIONS  ************************/
	/********************************************************/
	
	$wp_customize->add_section( 'parallax_one_general_section' , array(
		'title'       => __( 'General options', 'parallax-one' ),
      	'priority'    => 30,
      	'description' => __('Paralax One theme general options','parallax-one'),
	));
	
	/* Logo	*/
	$wp_customize->add_setting( 'paralax_one_logo', array(
		'default' => get_stylesheet_directory_uri().'/images/logo-nav.png',
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_logo', array(
	      	'label'    => __( 'Logo', 'parallax-one' ),
	      	'section'  => 'parallax_one_general_section',
	      	'settings' => 'paralax_one_logo',
			'priority'    => 1,
	)));
	$wp_customize->get_setting( 'paralax_one_logo' )->transport = 'postMessage';
	
	
	
	/* Disable preloader */
	$wp_customize->add_setting( 'paralax_one_disable_preloader', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control(
			'paralax_one_disable_preloader',
			array(
				'type' => 'checkbox',
				'label' => __('Disable preloader?','parallax-one'),
				'description' => __('If this box is checked, the preloader will be disabled from homepage.','parallax-one'),
				'section' => 'parallax_one_general_section',
				'settings' => 'paralax_one_disable_preloader',
				'priority'    => 2,
			)
	);
	

	/********************************************************/
	/************* LOGOS OPTIONS  ***********************/
	/********************************************************/	
	
	
	$wp_customize->add_section( 'parallax_one_logos_sections_in_pro' , array(
			'title'       => __( 'Logos section', 'parallax-one' ),
			'priority'    => 30,
	));
	
	$wp_customize->add_setting( 'parallax_one_logos_sections_in_pro', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_logos_sections_in_pro',
		array(
			'section' => 'parallax_one_logos_sections_in_pro'
	   ), __('Check out the PRO version to add logos section !','parallax-one')
	));	
	

	/********************************************************/
	/******* HAPPY CUSTOMERS OPTIONS  ***********************/
	/********************************************************/
	
	$wp_customize->add_panel( 'panel_2', array(
		'priority' => 32,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Happy  Customers section', 'parallax-one' )
	) );
	
	/* HAPPY CUSTOMERS SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_happy_customers_show' , array(
			'title'       => __( 'Settings', 'parallax-one' ),
			'priority'    => 1,
			'panel' => 'panel_2'
	));
	
	$wp_customize->add_setting( 'parallax_one_happy_customers_show');

	$wp_customize->add_control(
		'parallax_one_happy_customers_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Happy Customers section?','parallax-one'),
			'description' => __('If you check this box, the Happy Customers section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_happy_customers_show',
			'priority'    => 1,
		)
	);
	
	$wp_customize->get_setting( 'parallax_one_happy_customers_show' )->transport = 'postMessage';
	
	/* HAPPY CUSTOMERS HEADER */
	
	$wp_customize->add_section( 'parallax_one_happy_customers_header' , array(
			'title'       => __( 'Header', 'parallax-one' ),
			'priority'    => 2,
			'panel' => 'panel_2'
	));
	
	/* Happy Customers title */
	$wp_customize->add_setting( 'parallax_one_happy_customers_title', array(
		'default' => __('Happy Customers','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_happy_customers_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_happy_customers_header',
		'settings' => 'parallax_one_happy_customers_title',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_happy_customers_title' )->transport = 'postMessage';
	
	/* Happy Customers subtitle */
	$wp_customize->add_setting( 'parallax_one_happy_customers_subtitle', array(
		'default' => __('Cloud computing subscription model out of the box proactive solution.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_happy_customers_subtitle', array(
		'label'    => __( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_happy_customers_header',
		'settings' => 'parallax_one_happy_customers_subtitle',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_happy_customers_subtitle' )->transport = 'postMessage';

	/* HAPPY CUSTOMERS CONTENT */
	
	$wp_customize->add_section( 'parallax_one_happy_customers_content' , array(
			'title'       => __( 'Content', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_2'
	));
	
	
	$wp_customize->add_setting( 'parallax_one_happy_customers_content' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_happy_customers_content',
		array(
			'section' => 'parallax_one_happy_customers_content',
	   ),__('The main content of this section is customizable in:<br> Customize -> Widgets -> Happy Customers section.<br> There you must add the "Parallax One - Happy Customer widget"','parallax-one')
	));
	
	/* HAPPY CUSTOMERS COLORS */
	$wp_customize->add_section( 'parallax_one_happy_customers_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_2'
	));
	
	$wp_customize->add_setting( 'parallax_one_happy_customers_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_happy_customers_colors_section',
		array(
			'section' => 'parallax_one_happy_customers_colors_section',
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));

	/********************************************************/
	/************ LATEST NEWS OPTIONS  **************/
	/********************************************************/
	
	$wp_customize->add_section( 'parallax_one_latest_news_section' , array(
			'title'       => __( 'Latest news section', 'parallax-one' ),
			'priority'    => 33
	));
	
	
	$wp_customize->add_setting( 'parallax_one_latest_news_show');

	$wp_customize->add_control(
		'parallax_one_latest_news_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Latest news section?','parallax-one'),
			'description' => __('If you check this box, the Latest news section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_latest_news_section',
			'priority'    => 1
		)
	);
	$wp_customize->get_setting( 'parallax_one_latest_news_show' )->transport = 'postMessage';
	
	
	
	$wp_customize->add_setting( 'parallax_one_latest_news_title', array(
		'default' => __('Latest news','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_latest_news_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_latest_news_section',
		'settings' => 'parallax_one_latest_news_title',
		'priority'    => 2
	));
	$wp_customize->get_setting( 'parallax_one_latest_news_title' )->transport = 'postMessage';
	
	/********************************************************/
	/************** FOOTER OPTIONS  *************************/
	/********************************************************/	
	
	$wp_customize->add_section( 'parallax_one_footer_section' , array(
		'title'       => __( 'Footer options', 'parallax-one' ),
      	'priority'    => 33,
      	'description' => __('The main content of this section is customizable in: <br/>Customize -> Widgets -> Footer area. ','parallax-one'),
	));	
	
	/* Footer Menu */
	require_once ( 'class/parallax-one-menu-dropdown-custom-control.php');
	
	$wp_customize->add_setting( 'parallax_one_menu_dropdown_setting', array(
		'default'        => '',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( new Parallax_One_Menu_Dropdown_Custom_Control( $wp_customize, 'parallax_one_menu_dropdown_setting', array(
		'label'   => __('Footer menu','parallax-one'),
		'section' => 'parallax_one_footer_section',
		'settings'   => 'parallax_one_menu_dropdown_setting',
		'priority' => 1
	) ) );
	
	
	/* Copyright */
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
	$wp_customize->get_setting( 'parallax_one_copyright' )->transport = 'postMessage';
	
	
	/* Socials icons */
	require_once ( 'class/parallax-one-socials-dropdown-custom-control.php');
	
	$wp_customize->add_setting( 'parallax_one_social_icons', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( new Parallax_One_Social_Icons_Repeater( $wp_customize, 'parallax_one_social_icons', array(
		'label'   => __('Add new social icon','parallax-one'),
		'section' => 'parallax_one_footer_section',
		'settings' => 'parallax_one_social_icons',
		'priority' => 3
	) ) );

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
	wp_enqueue_script( 'parallax_one_customizer_script', get_template_directory_uri() . '/js/parallax_one_customizer.js', array("jquery","jquery-ui-draggable"),'', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'parallax_one_customizer_script' );