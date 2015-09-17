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
	/************** WP DEFAULT CONTROLS  ********************/
	/********************************************************/
	
	$wp_customize->remove_control('background_color');
	$wp_customize->get_section('background_image')->panel='panel_2';
	$wp_customize->get_section('colors')->panel='panel_2';


	/********************************************************/
	/********************* APPEARANCE  **********************/
	/********************************************************/
	$wp_customize->add_panel( 'panel_2', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Appearance', 'parallax-one' )
	) );
	
	$wp_customize->add_setting( 'parallax_one_text_color', array( 
		'default' => '#313131',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
		
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'parallax_one_text_color',
			array(
				'label'      => esc_html__( 'Text color', 'parallax-one' ),
				'section'    => 'colors',
				'priority'   => 5
			)
		)
	);
	
	
	$wp_customize->add_setting( 'parallax_one_title_color', array( 
		'default' => '#454545',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
		
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'parallax_one_title_color',
			array(
				'label'      => esc_html__( 'Title color', 'parallax-one' ),
				'section'    => 'colors',
				'priority'   => 6
			)
		)
	);
	
	$wp_customize->add_section( 'parallax_one_appearance_general' , array(
		'title'       => esc_html__( 'General options', 'parallax-one' ),
      	'priority'    => 3,
      	'description' => esc_html__('Paralax One theme general appearance options','parallax-one'),
		'panel'		  => 'panel_2'
	));
	
		/* Logo	*/
	$wp_customize->add_setting( 'paralax_one_logo', array(
		'default' => parallax_get_file('/images/logo-nav.png'),
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_logo', array(
	      	'label'    => esc_html__( 'Logo', 'parallax-one' ),
	      	'section'  => 'parallax_one_appearance_general',
			'priority'    => 1,
	)));
	
	/* Sticky header */
	$wp_customize->add_setting( 'paralax_one_sticky_header', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
	));
	$wp_customize->add_control(
			'paralax_one_sticky_header',
			array(
				'type' => 'checkbox',
				'label' => esc_html__('Header visibility','parallax-one'),
				'description' => esc_html__('If this box is checked, the header will toggle on frontpage.','parallax-one'),
				'section' => 'parallax_one_appearance_general',
				'priority'    => 2,
			)
	);


	/********************************************************/
	/************* HEADER OPTIONS  ********************/
	/********************************************************/	
	$wp_customize->add_panel( 'panel_1', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Header section', 'parallax-one' )
	) );
	
	/* HEADER CONTENT */
	
	$wp_customize->add_section( 'parallax_one_header_content' , array(
			'title'       => esc_html__( 'Content', 'parallax-one' ),
			'priority'    => 1,
			'panel' => 'panel_1'
	));
	
	/* Header Logo	*/
	$wp_customize->add_setting( 'paralax_one_header_logo', array(
		'default' => parallax_get_file('/images/logo-2.png'),
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_header_logo', array(
	      	'label'    => esc_html__( 'Header Logo', 'parallax-one' ),
	      	'section'  => 'parallax_one_header_content',
			'active_callback' => 'parallax_one_show_on_front',
			'priority'    => 1
	)));
	
	/* Header title */
	$wp_customize->add_setting( 'parallax_one_header_title', array(
		'default' => esc_html__('Simple, Reliable and Awesome.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_header_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2
	));
	
	/* Header subtitle */
	$wp_customize->add_setting( 'parallax_one_header_subtitle', array(
		'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_header_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 3
	));

	
	/*Header Button text*/
	$wp_customize->add_setting( 'parallax_one_header_button_text', array(
		'default' => esc_html__('GET STARTED','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_header_button_text', array(
		'label'    => esc_html__( 'Button label', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 4
	));
	
	
	$wp_customize->add_setting( 'parallax_one_header_button_link', array(
		'default' => esc_html__('#','parallax-one'),
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_header_button_link', array(
		'label'    => esc_html__( 'Button link', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 5
	));
	
	
	/* LOGOS SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_logos_settings_section' , array(
			'title'       => esc_html__( 'Logos Bar', 'parallax-one' ),
			'priority'    => 2,
			'panel' => 'panel_1'
	));
	
    
    require_once ( 'class/parallax-one-general-control.php');
	
	$wp_customize->add_setting( 'parallax_one_logos_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(array( array("image_url" => parallax_get_file('/images/companies/1.png') ,"link" => "#" ),array("image_url" => parallax_get_file('/images/companies/2.png') ,"link" => "#" ),array("image_url" => parallax_get_file('/images/companies/3.png') ,"link" => "#" ),array("image_url" => parallax_get_file('/images/companies/4.png') ,"link" => "#" ),array("image_url" => parallax_get_file('/images/companies/5.png') ,"link" => "#" ) ))

	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_logos_content', array(
		'label'   => esc_html__('Add new social icon','parallax-one'),
		'section' => 'parallax_one_logos_settings_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority' => 1,
        'parallax_image_control' => true,
        'parallax_icon_control' => false,
        'parallax_text_control' => false,
        'parallax_link_control' => true
	) ) );
	
	$wp_customize->get_section('header_image')->panel='panel_1';
	$wp_customize->get_section('header_image')->title=esc_html__( 'Background', 'parallax-one' );
	
	/* Enable parallax effect*/
	$wp_customize->add_setting( 'paralax_one_enable_move', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
	));
	$wp_customize->add_control(
			'paralax_one_enable_move',
			array(
				'type' => 'checkbox',
				'label' => esc_html__('Parallax effect','parallax-one'),
				'description' => esc_html__('If this box is checked, the parallax effect is enabled.','parallax-one'),
				'section' => 'header_image',
				'priority'    => 3,
			)
	);
	
	/* Layer one */
	$wp_customize->add_setting( 'paralax_one_first_layer', array(
		'default' => parallax_get_file('/images/background1.png'),
		'sanitize_callback' => 'esc_url',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_first_layer', array(
	      	'label'    => esc_html__( 'First layer', 'parallax-one' ),
	      	'section'  => 'header_image',
			'priority'    => 4,
	)));
	
	/* Layer two */
	$wp_customize->add_setting( 'paralax_one_second_layer', array(
		'default' => parallax_get_file('/images/background2.png'),
		'sanitize_callback' => 'esc_url',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_second_layer', array(
	      	'label'    => esc_html__( 'Second layer', 'parallax-one' ),
	      	'section'  => 'header_image',
			'priority'    => 5,
	)));
	/********************************************************/
	/****************** SERVICES OPTIONS  *******************/
	/********************************************************/
	
	
	/* SERVICES SECTION */
	$wp_customize->add_section( 'parallax_one_services_section' , array(
			'title'       => esc_html__( 'Services section', 'parallax-one' ),
			'priority'    => 32,
	));
	
	/* Services title */
	$wp_customize->add_setting( 'parallax_one_our_services_title', array(
		'default' => esc_html__('Our Services','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_our_services_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_services_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	/* Services subtitle */
	$wp_customize->add_setting( 'parallax_one_our_services_subtitle', array(
		'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_our_services_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_services_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2
	));
    
    
    /* Services content */
	$wp_customize->add_setting( 'parallax_one_services_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(
							array(
									array('choice'=>'parallax_icon','icon_value' => 'icon-basic-webpage-multiple','title' => esc_html__('Lorem Ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one')),
									array('choice'=>'parallax_icon','icon_value' => 'icon-ecommerce-graph3','title' => esc_html__('Lorem Ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one')),
									array('choice'=>'parallax_icon','icon_value' => 'icon-basic-geolocalize-05','title' => esc_html__('Lorem Ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one'))
							)
						)
	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_services_content', array(
		'label'   => esc_html__('Add new service box','parallax-one'),
		'section' => 'parallax_one_services_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority' => 3,
        'parallax_image_control' => true,
        'parallax_icon_control' => true,
		'parallax_title_control' => true,
        'parallax_text_control' => true,
		'parallax_link_control' => true
	) ) );
	/********************************************************/
	/******************** ABOUT OPTIONS  ********************/
	/********************************************************/

	
	$wp_customize->add_section( 'parallax_one_about_section' , array(
			'title'       => esc_html__( 'About section', 'parallax-one' ),
			'priority'    => 33,
	));
	
	/* About title */
	$wp_customize->add_setting( 'parallax_one_our_story_title', array(
		'default' => esc_html__('Our Story','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_our_story_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_about_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1,
	));

	/* About Content */
	
	$wp_customize->add_setting( 'parallax_one_our_story_text', array( 
		'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_html',
		'transport' => 'postMessage'
		
	));
	
	$wp_customize->add_control(
			'parallax_one_our_story_text',
			array(
				'type' => 'textarea',
				'label'   => esc_html__( 'Content', 'parallax-one' ),
				'section' => 'parallax_one_about_section',
				'active_callback' => 'parallax_one_show_on_front',
				'priority'    => 2,
			)
	);
	
	/* About Image	*/
	$wp_customize->add_setting( 'paralax_one_our_story_image', array(
		'default' => parallax_get_file('/images/about-us.png'),
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_our_story_image', array(
	      	'label'    => esc_html__( 'Image', 'parallax-one' ),
	      	'section'  => 'parallax_one_about_section',
			'active_callback' => 'parallax_one_show_on_front',
			'priority'    => 3,
	)));

	/********************************************************/
	/*******************  TEAM OPTIONS  *********************/
	/********************************************************/

	
	$wp_customize->add_section( 'parallax_one_team_section' , array(
			'title'       => esc_html__( 'Team section', 'parallax-one' ),
			'priority'    => 34,
	));
	
	/* Team title */
	$wp_customize->add_setting( 'parallax_one_our_team_title', array(
		'default' => esc_html__('Our Team','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_our_team_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_team_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1,
	));
	
	/* Team subtitle */
	$wp_customize->add_setting( 'parallax_one_our_team_subtitle', array(
		'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_our_team_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_team_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2,
	));
	
	
    /* Team content */
	$wp_customize->add_setting( 'parallax_one_team_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(
							array(
									array('image_url' => parallax_get_file('/images/team/1.jpg'),'title' => esc_html__('Albert Jacobs','parallax-one'),'subtitle' => esc_html__('Founder & CEO','parallax-one')),
									array('image_url' => parallax_get_file('/images/team/2.jpg'),'title' => esc_html__('Tonya Garcia','parallax-one'),'subtitle' => esc_html__('Account Manager','parallax-one')),
									array('image_url' => parallax_get_file('/images/team/3.jpg'),'title' => esc_html__('Linda Guthrie','parallax-one'),'subtitle' => esc_html__('Business Development','parallax-one'))
							)
						)
	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_team_content', array(
		'label'   => esc_html__('Add new team member','parallax-one'),
		'section' => 'parallax_one_team_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority' => 3,
        'parallax_image_control' => true,
		'parallax_title_control' => true,
		'parallax_subtitle_control' => true
	) ) );
	
	/********************************************************/
	/********** TESTIMONIALS OPTIONS  ***********************/
	/********************************************************/
	
	
	$wp_customize->add_section( 'parallax_one_testimonials_section' , array(
			'title'       => esc_html__( 'Testimonial section', 'parallax-one' ),
			'priority'    => 35,
	));
	
	
	/* Testimonials title */
	$wp_customize->add_setting( 'parallax_one_happy_customers_title', array(
		'default' => esc_html__('Happy Customers','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_happy_customers_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_testimonials_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1,
	));
	
	/* Testimonials subtitle */
	$wp_customize->add_setting( 'parallax_one_happy_customers_subtitle', array(
		'default' => esc_html__('Cloud computing subscription model out of the box proactive solution.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_happy_customers_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_testimonials_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2,
	));
	
	
    /* Testimonials content */
	$wp_customize->add_setting( 'parallax_one_testimonials_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(
							array(
									array('image_url' => parallax_get_file('/images/clients/1.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
									array('image_url' => parallax_get_file('/images/clients/2.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
									array('image_url' => parallax_get_file('/images/clients/3.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one'))
							)
						)
	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_testimonials_content', array(
		'label'   => esc_html__('Add new testimonial','parallax-one'),
		'section' => 'parallax_one_testimonials_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority' => 3,
        'parallax_image_control' => true,
		'parallax_title_control' => true,
		'parallax_subtitle_control' => true,
		'parallax_text_control' => true
	) ) );


	/********************************************************/
	/***************** RIBBON OPTIONS  *****************/
	/********************************************************/
	
    
	/* RIBBON SETTINGS */
	$wp_customize->add_section( 'parallax_one_ribbon_section' , array(
		'title'       => esc_html__( 'Ribbon section', 'parallax-one' ),
		'priority'    => 36,
	));
	

	/* Ribbon Background	*/
	$wp_customize->add_setting( 'paralax_one_ribbon_background', array(
		'default' => parallax_get_file('/images/background-images/parallax-img/parallax-img1.jpg'),
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_ribbon_background', array(
	      	'label'    => esc_html__( 'Ribbon Background', 'parallax-one' ),
	      	'section'  => 'parallax_one_ribbon_section',
			'active_callback' => 'parallax_one_show_on_front',
			'priority'    => 1
	)));
	
	$wp_customize->add_setting( 'parallax_one_ribbon_title', array(
		'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_ribbon_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_ribbon_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2
	));
	

	$wp_customize->add_setting( 'parallax_one_button_text', array(
		'default' => esc_html__('GET STARTED','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_button_text', array(
		'label'    => esc_html__( 'Button label', 'parallax-one' ),
		'section'  => 'parallax_one_ribbon_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 3
	));
	
	
	$wp_customize->add_setting( 'parallax_one_button_link', array(
		'default' => esc_html__('#','parallax-one'),
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_button_link', array(
		'label'    => esc_html__( 'Button link', 'parallax-one' ),
		'section'  => 'parallax_one_ribbon_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 4
	));

	/********************************************************/
	/************ LATEST NEWS OPTIONS  **************/
	/********************************************************/
	
    
	$wp_customize->add_section( 'parallax_one_latest_news_section' , array(
			'title'       => esc_html__( 'Latest news section', 'parallax-one' ),
			'priority'    => 36
	));
	
	$wp_customize->add_setting( 'parallax_one_latest_news_title', array(
		'default' => esc_html__('Latest news','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_latest_news_title', array(
		'label'    => esc_html__( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_latest_news_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	/********************************************************/
	/****************** CONTACT OPTIONS  ********************/
	/********************************************************/
	
	
	/* CONTACT SETTINGS */
	$wp_customize->add_section( 'parallax_one_contact_section' , array(
		'title'       => esc_html__( 'Contact section', 'parallax-one' ),
		'priority'    => 37,
	));


	$wp_customize->add_setting( 'parallax_one_contact_info_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(
			array( 
					array("icon_value" => "icon-basic-mail" ,"text" => "contact@site.com", "link" => "#" ), 
					array("icon_value" => "icon-basic-geolocalize-01" ,"text" => "Company address", "link" => "#" ), 
					array("icon_value" => "icon-basic-tablet" ,"text" => "0 332 548 954", "link" => "#" ) 
			)
		)
	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_contact_info_content', array(
		'label'   => esc_html__('Add new contact field','parallax-one'),
		'section' => 'parallax_one_contact_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority' => 1,
        'parallax_image_control' => false,
        'parallax_icon_control' => true,
        'parallax_text_control' => true,
        'parallax_link_control' => true
	) ) );
	
    
	/* Map ShortCode  */
	$wp_customize->add_setting( 'parallax_one_frontpage_map_shortcode', array(
		'default' => '',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_frontpage_map_shortcode', array(
		'label'    => esc_html__( 'Map shortcode', 'parallax-one' ),
		'description' => __('To use this section please install <a href="https://wordpress.org/plugins/intergeo-maps/">Intergeo Maps</a> plugin then use it to create a map and paste here the shortcode generated','parallax-one'),
		'section'  => 'parallax_one_contact_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2
	));
	
    
	/********************************************************/
	/*************** CONTACT PAGE OPTIONS  ******************/
	/********************************************************/
	
	
	$wp_customize->add_section( 'parallax_one_contact_page' , array(
		'title'       => esc_html__( 'Contact page', 'parallax-one' ),
      	'priority'    => 39,
	));

	/* Contact Form  */
	$wp_customize->add_setting( 'parallax_one_contact_form_shortcode', array(
		'default' => '',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_contact_form_shortcode', array(
		'label'    => esc_html__( 'Contact form shortcode', 'parallax-one' ),
		'description' => __('Create a form, copy the shortcode generated and paste it here. We recommend <a href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> but you can use any plugin you like.','parallax-one'),
		'section'  => 'parallax_one_contact_page',
		'active_callback' => 'parallax_one_is_contact_page',
		'priority'    => 1
	));
	
	/* Map ShortCode  */
	$wp_customize->add_setting( 'parallax_one_contact_map_shortcode', array(
		'default' => '',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_contact_map_shortcode', array(
		'label'    => esc_html__( 'Map shortcode', 'parallax-one' ),
		'description' => __('To use this section please install <a href="https://wordpress.org/plugins/intergeo-maps/">Intergeo Maps</a> plugin then use it to create a map and paste here the shortcode generated','parallax-one'),
		'section'  => 'parallax_one_contact_page',
		'active_callback' => 'parallax_one_is_contact_page',
		'priority'    => 2
	));
	
	/********************************************************/
	/****************** FOOTER OPTIONS  *********************/
	/********************************************************/	
	
	$wp_customize->add_section( 'parallax_one_footer_section' , array(
		'title'       => esc_html__( 'Footer options', 'parallax-one' ),
      	'priority'    => 39,
      	'description' => esc_html__('The main content of this section is customizable in: Customize -> Widgets -> Footer area. ','parallax-one'),
	));	
	
	/* Footer Menu */
	$nav_menu_locations_footer = $wp_customize->get_control('nav_menu_locations[parallax_footer_menu]');
	if(!empty($nav_menu_locations_footer)){
		$nav_menu_locations_footer->section = 'parallax_one_footer_section';
		$nav_menu_locations_footer->priority = 1;
	}
	/* Copyright */
	$wp_customize->add_setting( 'parallax_one_copyright', array(
		'default' => 'Themeisle',
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_copyright', array(
		'label'    => esc_html__( 'Copyright', 'parallax-one' ),
		'section'  => 'parallax_one_footer_section',
		'priority'    => 2
	));
	
	
	/* Socials icons */
	
	
	$wp_customize->add_setting( 'parallax_one_social_icons', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(
			array(
				array('icon_value' =>'icon-social-facebook' , 'link' => '#'),
				array('icon_value' =>'icon-social-twitter' , 'link' => '#'),
				array('icon_value' =>'icon-social-googleplus' , 'link' => '#')
			)
		)

	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_social_icons', array(
		'label'   => esc_html__('Add new social icon','parallax-one'),
		'section' => 'parallax_one_footer_section',
		'priority' => 3,
        'parallax_image_control' => false,
        'parallax_icon_control' => true,
        'parallax_text_control' => false,
        'parallax_link_control' => true
	) ) );
	
	/********************************************************/
	/************** ADVANCED OPTIONS  ***********************/
	/********************************************************/
	
	$wp_customize->add_section( 'parallax_one_general_section' , array(
		'title'       => esc_html__( 'Advanced options', 'parallax-one' ),
      	'priority'    => 40,
      	'description' => esc_html__('Paralax One theme general options','parallax-one'),
	));
	
	$blogname = $wp_customize->get_control('blogname');
	$blogdescription = $wp_customize->get_control('blogdescription');
	$blogicon = $wp_customize->get_control('site_icon');
	$show_on_front = $wp_customize->get_control('show_on_front');
	$page_on_front = $wp_customize->get_control('page_on_front');
	$page_for_posts = $wp_customize->get_control('page_for_posts');
	if(!empty($blogname)){
		$blogname->section = 'parallax_one_general_section';
		$blogname->priority = 1;
	}
	if(!empty($blogdescription)){
		$blogdescription->section = 'parallax_one_general_section';
		$blogdescription->priority = 2;
	}
	if(!empty($blogicon)){
		$blogicon->section = 'parallax_one_general_section';
		$blogicon->priority = 3;
	}
	if(!empty($show_on_front)){
		$show_on_front->section='parallax_one_general_section';
		$show_on_front->priority=4;
	}
	if(!empty($page_on_front)){
		$page_on_front->section='parallax_one_general_section';
		$page_on_front->priority=5;
	}
	if(!empty($page_for_posts)){
		$page_for_posts->section='parallax_one_general_section';
		$page_for_posts->priority=6;
	}
	
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('title_tagline');
	
	$nav_menu_locations_primary = $wp_customize->get_control('nav_menu_locations[primary]');
	if(!empty($nav_menu_locations_primary)){
		$nav_menu_locations_primary->section = 'parallax_one_general_section';
		$nav_menu_locations_primary->priority = 6;
	}
	
	/* Disable preloader */
	$wp_customize->add_setting( 'paralax_one_disable_preloader', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control(
			'paralax_one_disable_preloader',
			array(
				'type' => 'checkbox',
				'label' => esc_html__('Disable preloader?','parallax-one'),
				'description' => esc_html__('If this box is checked, the preloader will be disabled from homepage.','parallax-one'),
				'section' => 'parallax_one_general_section',
				'priority'    => 7,
			) 
	); 
}
add_action( 'customize_register', 'parallax_one_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function parallax_one_customize_preview_js() {
	wp_enqueue_script( 'parallax_one_customizer', parallax_get_file('/js/customizer.js'), array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'parallax_one_customize_preview_js' );


function parallax_one_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function parallax_one_sanitize_html( $input ){
	$allowed_html = array(
    						'p' => array(),
							'br' => array(),
							'em' => array(),
							'strong' => array(),
							'ul' => array(),
							'li' => array()
						);
	$string = force_balance_tags($input);
	return wp_kses($string, $allowed_html);
}


function parallax_one_customizer_script() {
	wp_enqueue_script( 'parallax_one_customizer_script', parallax_get_file('/js/parallax_one_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
	wp_register_script( 'parallax_one_buttons', parallax_get_file('/js/parallax_one_buttons_control.js'), array("jquery"), '1.0.0', true  );
	wp_enqueue_script( 'parallax_one_buttons' );
	
	wp_localize_script( 'parallax_one_buttons', 'objectL10n', array(
		
		'documentation' => esc_html__( 'Documentation', 'parallax-one' ),
		'support' => esc_html__('Support Forum','parallax-one'),
		'github' => esc_html__('Github','parallax-one')
		
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'parallax_one_customizer_script' );

function parallax_one_is_contact_page() { 
		return is_page_template('template-contact.php');
};

function parallax_one_show_on_front(){
	if ( 'posts' == get_option( 'show_on_front' ) && is_front_page() ){
		return true;
	}
	return false;
}
