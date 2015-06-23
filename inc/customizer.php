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
	
	
	/* Disable comments on pages */
	$wp_customize->add_setting( 'paralax_one_disable_comments_on_pages', array(
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control(
			'paralax_one_disable_comments_on_pages',
			array(
				'type' => 'checkbox',
				'label' => __('Disable comments on pages?','parallax-one'),
				'description' => __('If this box is checked, the comments will be disabled on pages.','parallax-one'),
				'section' => 'parallax_one_general_section',
				'settings' => 'paralax_one_disable_comments_on_pages',
				'priority'    => 3,
			)
	);

	/********************************************************/
	/************* HEADER OPTIONS  ********************/
	/********************************************************/	
	$wp_customize->add_panel( 'panel_7', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Header section', 'parallax-one' )
	) );
	
	/* HEADER SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_header_show' , array(
			'title'       => __( 'Settings', 'parallax-one' ),
			'priority'    => 1,
			'panel' => 'panel_7'
	));
	
	$wp_customize->add_setting( 'parallax_one_header_show');

	$wp_customize->add_control(
		'parallax_one_header_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Header section?','parallax-one'),
			'description' => __('If you check this box, the Header section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_header_show',
			'active_callback' => 'is_front_page',
			'priority'    => 1,
		)
	);
	
	$wp_customize->get_setting( 'parallax_one_header_show' )->transport = 'postMessage';
	
	
	/* HEADER CONTENT */
	
	$wp_customize->add_section( 'parallax_one_header_content' , array(
			'title'       => __( 'Content', 'parallax-one' ),
			'priority'    => 2,
			'panel' => 'panel_7'
	));
	
	/* Header Logo	*/
	$wp_customize->add_setting( 'paralax_one_header_logo', array(
		'default' => get_stylesheet_directory_uri().'/images/logo-2.png',
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_header_logo', array(
	      	'label'    => __( 'Header Logo', 'parallax-one' ),
	      	'section'  => 'parallax_one_header_content',
	      	'settings' => 'paralax_one_header_logo',
			'active_callback' => 'is_front_page',
			'priority'    => 1
	)));
	$wp_customize->get_setting( 'paralax_one_header_logo' )->transport = 'postMessage';
	
	/* Header title */
	$wp_customize->add_setting( 'parallax_one_header_title', array(
		'default' => __('Simple, Reliable and Awesome.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_header_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'settings' => 'parallax_one_header_title',
		'active_callback' => 'is_front_page',
		'priority'    => 2
	));
	$wp_customize->get_setting( 'parallax_one_header_title' )->transport = 'postMessage';
	
	/* Header subtitle */
	$wp_customize->add_setting( 'parallax_one_header_subtitle', array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_header_subtitle', array(
		'label'    => __( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'settings' => 'parallax_one_header_subtitle',
		'active_callback' => 'is_front_page',
		'priority'    => 3
	));
	$wp_customize->get_setting( 'parallax_one_header_subtitle' )->transport = 'postMessage';
	
	/*Header Button text*/
	$wp_customize->add_setting( 'parallax_one_header_button_text', array(
		'default' => __('GET STARTED','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_header_button_text', array(
		'label'    => __( 'Button label', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'settings' => 'parallax_one_header_button_text',
		'active_callback' => 'is_front_page',
		'priority'    => 4
	));
	$wp_customize->get_setting( 'parallax_one_header_button_text' )->transport = 'postMessage';
	
	
	$wp_customize->add_setting( 'parallax_one_header_button_link', array(
		'default' => __('#','parallax-one'),
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control( 'parallax_one_header_button_link', array(
		'label'    => __( 'Button link', 'parallax-one' ),
		'section'  => 'parallax_one_header_content',
		'settings' => 'parallax_one_header_button_link',
		'active_callback' => 'is_front_page',
		'priority'    => 5
	));
	$wp_customize->get_setting( 'parallax_one_header_button_link' )->transport = 'postMessage';
	
	

	
	/* HEADER COLORS */
	$wp_customize->add_section( 'parallax_one_header_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_7'
	));
	
	$wp_customize->add_setting( 'parallax_one_header_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_header_colors_section',
		array(
			'section' => 'parallax_one_header_colors_section',
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));
	
	/* LOGOS SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_logos_settings_section' , array(
			'title'       => __( 'Logos Bar', 'parallax-one' ),
			'priority'    => 4,
			'panel' => 'panel_7'
	));
	
    
    require_once ( 'class/parallax-one-general-control.php');
	
	$wp_customize->add_setting( 'parallax_one_logos_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(array( array("image_url" => get_stylesheet_directory_uri().'/images/companies/1.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/2.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/3.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/4.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/5.png' ,"link" => "#" ) ))

	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_logos_content', array(
		'label'   => __('Add new social icon','parallax-one'),
		'section' => 'parallax_one_logos_settings_section',
		'settings' => 'parallax_one_logos_content',
		'active_callback' => 'is_front_page',
		'priority' => 2,
        'parallax_image_control' => true,
        'parallax_icon_control' => false,
        'parallax_text_control' => false,
        'parallax_link_control' => true
	) ) );
    
	
	$wp_customize->add_setting( 'parallax_one_logos_show');

	$wp_customize->add_control(
		'parallax_one_logos_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Logos section?','parallax-one'),
			'description' => __('If you check this box, the Logos section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_logos_settings_section',
			'active_callback' => 'is_front_page',
			'priority'    => 1
		)
	);
	
	$wp_customize->get_setting( 'parallax_one_logos_show' )->transport = 'postMessage';
	
	/********************************************************/
	/******* OUR SERVICES OPTIONS  *******************/
	/********************************************************/
	
	$wp_customize->add_panel( 'panel_4', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Our Services section', 'parallax-one' )
	) );
	
	/* OUR SERVICES SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_our_services_show' , array(
			'title'       => __( 'Settings', 'parallax-one' ),
			'priority'    => 1,
			'panel' => 'panel_4'
	));
	
	$wp_customize->add_setting( 'parallax_one_our_services_show');

	$wp_customize->add_control(
		'parallax_one_our_services_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Our Services section?','parallax-one'),
			'description' => __('If you check this box, the Our Services section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_our_services_show',
			'active_callback' => 'is_front_page',
			'priority'    => 1
		)
	);
	
	$wp_customize->get_setting( 'parallax_one_our_services_show' )->transport = 'postMessage';
	
	/* OUR SERVICES HEADER */
	
	$wp_customize->add_section( 'parallax_one_our_services_header' , array(
			'title'       => __( 'Header', 'parallax-one' ),
			'priority'    => 2,
			'panel' => 'panel_4'
	));
	
	/* Our Services title */
	$wp_customize->add_setting( 'parallax_one_our_services_title', array(
		'default' => __('Our Services','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_our_services_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_our_services_header',
		'settings' => 'parallax_one_our_services_title',
		'active_callback' => 'is_front_page',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_our_services_title' )->transport = 'postMessage';
	
	/* Our Services subtitle */
	$wp_customize->add_setting( 'parallax_one_our_services_subtitle', array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_our_services_subtitle', array(
		'label'    => __( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_our_services_header',
		'settings' => 'parallax_one_our_services_subtitle',
		'active_callback' => 'is_front_page',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_our_services_subtitle' )->transport = 'postMessage';

	/* OUR SERVICES CONTENT */
	
	$wp_customize->add_section( 'parallax_one_our_services_content' , array(
			'title'       => __( 'Content', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_4'
	));
	
	
	$wp_customize->add_setting( 'parallax_one_our_services_content' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_our_services_content',
		array(
			'section' => 'parallax_one_our_services_content',
			'active_callback' => 'is_front_page'
	   ),__('The main content of this section is customizable in:<br> Customize -> Widgets -> Our Services section.<br> There you must add the "Parallax One - Our Services widget"','parallax-one')
	));
	
	/* OUR SERVICES COLORS */
	$wp_customize->add_section( 'parallax_one_our_services_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_4'
	));
	
	$wp_customize->add_setting( 'parallax_one_our_services_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_our_services_colors_section',
		array(
			'section' => 'parallax_one_our_services_colors_section',
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));	

	/********************************************************/
	/************** OUR STORY OPTIONS  ***************/
	/********************************************************/
	$wp_customize->add_panel( 'panel_5', array(
		'priority' => 32,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Our Story section', 'parallax-one' )
	) );
	
	/* OUR STORY SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_our_story_show' , array(
			'title'       => __( 'Settings', 'parallax-one' ),
			'priority'    => 1,
			'panel' => 'panel_5'
	));
	
	$wp_customize->add_setting( 'parallax_one_our_story_show');

	$wp_customize->add_control(
		'parallax_one_our_story_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Our Story section?','parallax-one'),
			'description' => __('If you check this box, the Our Story section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_our_story_show',
			'active_callback' => 'is_front_page',
			'priority'    => 1
		)
	);
	
	$wp_customize->get_setting( 'parallax_one_our_story_show' )->transport = 'postMessage';
	
	/* OUR STORY HEADER */
	
	$wp_customize->add_section( 'parallax_one_our_story_header' , array(
			'title'       => __( 'Header', 'parallax-one' ),
			'priority'    => 2,
			'panel' => 'panel_5'
	));
	
	/* Our Story title */
	$wp_customize->add_setting( 'parallax_one_our_story_title', array(
		'default' => __('Our Story','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_our_story_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_our_story_header',
		'settings' => 'parallax_one_our_story_title',
		'active_callback' => 'is_front_page',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_our_story_title' )->transport = 'postMessage';

	/* OUR STORY CONTENT */
	
	$wp_customize->add_section( 'parallax_one_our_story_content' , array(
			'title'       => __( 'Content', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_5'
	));
	
	/* Our Story Content */
	require_once ( 'class/parallax-one-textarea-custom-control.php');
	
	$wp_customize->add_setting( 'parallax_one_our_story_text', array( 
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
		
	));
    $wp_customize->add_control( new Parallax_One_Customize_Textarea_Control( $wp_customize, 'parallax_one_our_story_text', array(
            'label'   => __( 'Content', 'parallax-one' ),
            'section' => 'parallax_one_our_story_content',
            'settings'   => 'parallax_one_our_story_text',
			'active_callback' => 'is_front_page',
            'priority' => 1,
    )) );
	$wp_customize->get_setting( 'parallax_one_our_story_text' )->transport = 'postMessage';
	
	/* Our Story Image	*/
	$wp_customize->add_setting( 'paralax_one_our_story_image', array(
		'default' => get_stylesheet_directory_uri().'/images/about-us.jpg',
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paralax_one_our_story_image', array(
	      	'label'    => __( 'Image', 'parallax-one' ),
	      	'section'  => 'parallax_one_our_story_content',
	      	'settings' => 'paralax_one_our_story_image',
			'active_callback' => 'is_front_page',
			'priority'    => 2,
	)));
	$wp_customize->get_setting( 'paralax_one_our_story_image' )->transport = 'postMessage';
	
	/*Our Story Image Position*/
	$wp_customize->add_setting( 'parallax_one_our_story_image_position',array( 
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_our_story_image_position',
		array(
			'label'    => __( 'Image Position', 'parallax-one' ),
			'section' => 'parallax_one_our_story_content',
			'active_callback' => 'is_front_page',
			'priority'    => 3
	   ),__('Check out the PRO version for full control over the image position !','parallax-one')
	));
	
	/* OUR STORY COLORS */
	$wp_customize->add_section( 'parallax_one_our_story_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 4,
			'panel' => 'panel_5'
	));
	
	$wp_customize->add_setting( 'parallax_one_our_story_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_our_story_colors_section',
		array(
			'section' => 'parallax_one_our_story_colors_section',
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));	

	/********************************************************/
	/******* OUR TEAM OPTIONS  *******************/
	/********************************************************/
	
	$wp_customize->add_panel( 'panel_3', array(
		'priority' => 33,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Our Team section', 'parallax-one' )
	) );
	
	/* OUR TEAM SETTINGS */
	
	$wp_customize->add_section( 'parallax_one_our_team_show' , array(
			'title'       => __( 'Settings', 'parallax-one' ),
			'priority'    => 1,
			'panel' => 'panel_3'
	));
	
	$wp_customize->add_setting( 'parallax_one_our_team_show');

	$wp_customize->add_control(
		'parallax_one_our_team_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Our Team section?','parallax-one'),
			'description' => __('If you check this box, the Our Team section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_our_team_show',
			'active_callback' => 'is_front_page',
			'priority'    => 1,
		)
	);
	
	$wp_customize->get_setting( 'parallax_one_our_team_show' )->transport = 'postMessage';
	
	/* OUR TEAM HEADER */
	
	$wp_customize->add_section( 'parallax_one_our_team_header' , array(
			'title'       => __( 'Header', 'parallax-one' ),
			'priority'    => 2,
			'panel' => 'panel_3'
	));
	
	/* Our Team title */
	$wp_customize->add_setting( 'parallax_one_our_team_title', array(
		'default' => __('Our Team','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_our_team_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_our_team_header',
		'settings' => 'parallax_one_our_team_title',
		'active_callback' => 'is_front_page',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_our_team_title' )->transport = 'postMessage';
	
	/* Our Team subtitle */
	$wp_customize->add_setting( 'parallax_one_our_team_subtitle', array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_our_team_subtitle', array(
		'label'    => __( 'Subtitle', 'parallax-one' ),
		'section'  => 'parallax_one_our_team_header',
		'settings' => 'parallax_one_our_team_subtitle',
		'active_callback' => 'is_front_page',
		'priority'    => 1,
	));
	$wp_customize->get_setting( 'parallax_one_our_team_subtitle' )->transport = 'postMessage';

	/* OUR TEAM CONTENT */
	
	$wp_customize->add_section( 'parallax_one_our_team_content' , array(
			'title'       => __( 'Content', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_3'
	));
	
	
	$wp_customize->add_setting( 'parallax_one_our_team_content' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_our_team_content',
		array(
			'section' => 'parallax_one_our_team_content',
			'active_callback' => 'is_front_page'
	   ),__('The main content of this section is customizable in:<br> Customize -> Widgets -> Our Team section.<br> There you must add the "Parallax One - Our Team widget"','parallax-one')
	));
	
	/* OUR TEAM COLORS */
	$wp_customize->add_section( 'parallax_one_our_team_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_3'
	));
	
	$wp_customize->add_setting( 'parallax_one_our_team_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_our_team_colors_section',
		array(
			'section' => 'parallax_one_our_team_colors_section',
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));	

	/********************************************************/
	/******* HAPPY CUSTOMERS OPTIONS  ***********************/
	/********************************************************/
	
	$wp_customize->add_panel( 'panel_2', array(
		'priority' => 34,
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
			'active_callback' => 'is_front_page',
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
		'active_callback' => 'is_front_page',
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
		'active_callback' => 'is_front_page',
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
			'active_callback' => 'is_front_page'
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
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));
	
	/********************************************************/
	/***************** RIBBON OPTIONS  *****************/
	/********************************************************/
	$wp_customize->add_panel( 'panel_6', array(
		'priority' => 35,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Ribbon section', 'parallax-one' )
	) );
	
	/* RIBBON SETTINGS */
	$wp_customize->add_section( 'parallax_one_ribbon_show' , array(
		'title'       => __( 'Settings', 'parallax-one' ),
		'priority'    => 1,
		'panel' => 'panel_6'
	));
	
	$wp_customize->add_setting( 'parallax_one_ribbon_show');

	$wp_customize->add_control(
		'parallax_one_ribbon_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Ribbon section?','parallax-one'),
			'description' => __('If you check this box, the Ribbon section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_ribbon_show',
			'active_callback' => 'is_front_page',
			'priority'    => 1
		)
	);
	$wp_customize->get_setting( 'parallax_one_ribbon_show' )->transport = 'postMessage';

	/* RIBBON CONTENT */
	$wp_customize->add_section( 'parallax_one_ribbon_content' , array(
		'title'       => __( 'Content', 'parallax-one' ),
		'priority'    => 2,
		'panel' => 'panel_6'
	));
	
	$wp_customize->add_setting( 'parallax_one_ribbon_title', array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_ribbon_title', array(
		'label'    => __( 'Main title', 'parallax-one' ),
		'section'  => 'parallax_one_ribbon_content',
		'settings' => 'parallax_one_ribbon_title',
		'active_callback' => 'is_front_page',
		'priority'    => 2
	));
	$wp_customize->get_setting( 'parallax_one_ribbon_title' )->transport = 'postMessage';
	

	$wp_customize->add_setting( 'parallax_one_button_text', array(
		'default' => __('GET STARTED','parallax-one'),
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_button_text', array(
		'label'    => __( 'Button label', 'parallax-one' ),
		'section'  => 'parallax_one_ribbon_content',
		'settings' => 'parallax_one_button_text',
		'active_callback' => 'is_front_page',
		'priority'    => 3
	));
	$wp_customize->get_setting( 'parallax_one_button_text' )->transport = 'postMessage';
	
	
	$wp_customize->add_setting( 'parallax_one_button_link', array(
		'default' => __('#','parallax-one'),
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control( 'parallax_one_button_link', array(
		'label'    => __( 'Button link', 'parallax-one' ),
		'section'  => 'parallax_one_ribbon_content',
		'settings' => 'parallax_one_button_link',
		'active_callback' => 'is_front_page',
		'priority'    => 4
	));
	$wp_customize->get_setting( 'parallax_one_button_link' )->transport = 'postMessage';

	/* RIBBON COLORS */
	$wp_customize->add_section( 'parallax_one_ribbon_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_6'
	));
	
	$wp_customize->add_setting( 'parallax_one_ribbon_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_ribbon_colors_section',
		array(
			'section' => 'parallax_one_ribbon_colors_section',
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));
	

	/********************************************************/
	/************ LATEST NEWS OPTIONS  **************/
	/********************************************************/
	
	$wp_customize->add_section( 'parallax_one_latest_news_section' , array(
			'title'       => __( 'Latest news section', 'parallax-one' ),
			'priority'    => 36
	));
	
	
	$wp_customize->add_setting( 'parallax_one_latest_news_show');

	$wp_customize->add_control(
		'parallax_one_latest_news_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Latest news section?','parallax-one'),
			'description' => __('If you check this box, the Latest news section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_latest_news_section',
			'active_callback' => 'is_front_page',
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
		'active_callback' => 'is_front_page',
		'priority'    => 2
	));
	$wp_customize->get_setting( 'parallax_one_latest_news_title' )->transport = 'postMessage';
	
	/********************************************************/
	/************ CONTACT INFO OPTIONS  **************/
	/********************************************************/
	
	$wp_customize->add_panel( 'panel_8', array(
		'priority' => 37,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Contact Info section', 'parallax-one' )
	) );
	
	/* CONTACT INFO SETTINGS */
	$wp_customize->add_section( 'parallax_one_contact_info_show' , array(
		'title'       => __( 'Settings', 'parallax-one' ),
		'priority'    => 1,
		'panel' => 'panel_8'
	));
	
	$wp_customize->add_setting( 'parallax_one_contact_info_show');

	$wp_customize->add_control(
		'parallax_one_contact_info_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Contact Info section?','parallax-one'),
			'description' => __('If you check this box, the Ribbon section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_contact_info_show',
			'active_callback' => 'is_front_page',
			'priority'    => 1
		)
	);
	$wp_customize->get_setting( 'parallax_one_contact_info_show' )->transport = 'postMessage';


	/* CONTACT INFO CONTENT */
	$wp_customize->add_section( 'parallax_one_contact_info' , array(
		'title'       => __( 'Content', 'parallax-one' ),
		'priority'    => 2,
		'panel' => 'panel_8'
	));
	
	
	$wp_customize->add_setting( 'parallax_one_contact_info_content', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(array( array("icon_value" => "icon-basic-mail" ,"text" => "hey@designlab.co", "link" => "#" ), array("icon_value" => "icon-basic-geolocalize-01" ,"text" => "Glen Road, E13 8 London, UK", "link" => "#" ), array("icon_value" => "icon-basic-tablet" ,"text" => "+44-12-3456-7890", "link" => "#" ) ))
	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_contact_info_content', array(
		'label'   => __('Add new social icon','parallax-one'),
		'section' => 'parallax_one_contact_info',
		'settings' => 'parallax_one_contact_info_content',
		'active_callback' => 'is_front_page',
		'priority' => 3,
        'parallax_image_control' => false,
        'parallax_icon_control' => true,
        'parallax_text_control' => true,
        'parallax_link_control' => true
	) ) );
	
	/* CONTACT INFO COLORS */
	$wp_customize->add_section( 'parallax_one_contact_info_colors_section' , array(
			'title'       => __( 'Colors', 'parallax-one' ),
			'priority'    => 3,
			'panel' => 'panel_8'
	));
	
	$wp_customize->add_setting( 'parallax_one_contact_info_colors_section' );

	$wp_customize->add_control( new Parallax_One_Display_Message( $wp_customize, 'parallax_one_contact_info_colors_section',
		array(
			'section' => 'parallax_one_contact_info_colors_section',
			'active_callback' => 'is_front_page'
	   ), __('Check out the PRO version for full control over the color scheme !','parallax-one')
	));
	/********************************************************/
	/******************* INTERGEO MAPS  *********************/
	/********************************************************/
    $wp_customize->add_section( 'parallax_one_map_section' , array(
		'title'       => __( 'Map section', 'parallax-one' ),
      	'priority'    => 38,
	));
    
	$wp_customize->add_setting( 'parallax_one_frontpage_map_show');

	$wp_customize->add_control(
		'parallax_one_frontpage_map_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Map section?','parallax-one'),
			'description' => __('If you check this box, the Map section will disappear from homepage.','parallax-one'),
			'section' => 'parallax_one_map_section',
			'active_callback' => 'is_front_page',
			'priority'    => 1
		)
	);
	$wp_customize->get_setting( 'parallax_one_frontpage_map_show' )->transport = 'postMessage';
    

	/* Map ShortCode  */
	$wp_customize->add_setting( 'parallax_one_frontpage_map_shortcode', array(
		'default' => '',
		
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_frontpage_map_shortcode', array(
		'label'    => __( 'Map shortcode', 'parallax-one' ),
		'description' => __('To use this section please install Intergeo Maps plugin then use it to create a map and paste here the shortcode generated','parallax-one'),
		'section'  => 'parallax_one_map_section',
		'active_callback' => 'is_front_page',
		'settings' => 'parallax_one_frontpage_map_shortcode',
		'priority'    => 2
	));
    
	/********************************************************/
	/********** CONTACT PAGE OPTIONS  ***************/
	/********************************************************/	

	$wp_customize->add_section( 'parallax_one_contact_page' , array(
		'title'       => __( 'Contact page', 'parallax-one' ),
      	'priority'    => 39,
	));
	
	/* Contact Form  */
	$wp_customize->add_setting( 'parallax_one_contact_form_shortcode', array(
		'default' => '',
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_contact_form_shortcode', array(
		'label'    => __( 'Contact form shortcode', 'parallax-one' ),
		'section'  => 'parallax_one_contact_page',
		'settings' => 'parallax_one_contact_form_shortcode',
		'active_callback' => 'parallax_one_is_contact_page',
		'priority'    => 1
	));
	
	/* Map ShortCode  */
	$wp_customize->add_setting( 'parallax_one_contact_map_shortcode', array(
		'default' => '',
		
		'sanitize_callback' => 'parallax_one_sanitize_text'
	));
	$wp_customize->add_control( 'parallax_one_contact_map_shortcode', array(
		'label'    => __( 'Map shortcode', 'parallax-one' ),
		'description' => __('To use this section please install Intergeo Maps plugin then use it to create a map and paste here the shortcode generated','parallax-one'),
		'section'  => 'parallax_one_contact_page',
		'active_callback' => 'parallax_one_is_contact_page',
		'settings' => 'parallax_one_contact_map_shortcode',
		'priority'    => 1
	));
	
	/********************************************************/
	/************** FOOTER OPTIONS  *****************/
	/********************************************************/	
	
	$wp_customize->add_section( 'parallax_one_footer_section' , array(
		'title'       => __( 'Footer options', 'parallax-one' ),
      	'priority'    => 39,
      	'description' => __('The main content of this section is customizable in: <br/>Customize -> Widgets -> Footer area. ','parallax-one'),
	));	
	
	/* Footer Menu */
	require_once ( 'class/parallax-one-menu-dropdown-custom-control.php');
	
	$wp_customize->add_setting( 'parallax_one_menu_dropdown_setting', array(
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
		'priority'    => 2
	));
	$wp_customize->get_setting( 'parallax_one_copyright' )->transport = 'postMessage';
	
	
	/* Socials icons */
	
	
	$wp_customize->add_setting( 'parallax_one_social_icons', array(
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'default' => json_encode(array(array('icon_value' =>'icon-social-facebook' , 'link' => '#'),array('icon_value' =>'icon-social-twitter' , 'link' => '#'),array('icon_value' =>'icon-social-googleplus' , 'link' => '#')))

	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'parallax_one_social_icons', array(
		'label'   => __('Add new social icon','parallax-one'),
		'section' => 'parallax_one_footer_section',
		'settings' => 'parallax_one_social_icons',
		'active_callback' => 'is_front_page',
		'priority' => 3,
        'parallax_image_control' => false,
        'parallax_icon_control' => true,
        'parallax_text_control' => false,
        'parallax_link_control' => true
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

function parallax_one_is_contact_page() { 
		return is_page_template('template-contact.php');
};