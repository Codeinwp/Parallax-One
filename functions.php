<?php
/**
 * parallax-one functions and definitions
 *
 * @package parallax-one
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'parallax_one_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function parallax_one_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on parallax-one, use a find and replace
	 * to change 'parallax-one' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'parallax-one', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'parallax-one' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'parallax_one_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => get_stylesheet_directory_uri().'/images/background-images/background.jpg',
        'default-repeat'         => 'no-repeat',
        'default-position-x'     => 'center',
        'default-attachment'     => 'fixed'
	) ) );
	
	//Theme Support for WooCommerce
	add_theme_support( 'woocommerce' );

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' ); 

	/* Set the image size by cropping the image */
	add_image_size( 'post-thumbnail-big', 730, 340, true );
	add_image_size( 'post-thumbnail-tablet', 730, 340, true );
	add_image_size( 'post-thumbnail-mobile', 730, 340, true );

	// Latest news Section (homepage)
	add_image_size( 'post-thumbnail-latest-news', 150, 150, true ); 	
	add_image_size( 'parallax_one_team', 268, 273, true );
	add_image_size( 'parallax_one_services',60,62,true );
	add_image_size( 'parallax_one_customers',75,75,true );

}
endif; // parallax_one_setup
add_action( 'after_setup_theme', 'parallax_one_setup' );


add_filter( 'image_size_names_choose', 'parallax_one_media_uploader_custom_sizes' );

function parallax_one_media_uploader_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'parallax_one_team' => __('Parallax One Team Member','parallax-one'),
		'parallax_one_services' => __('Parallax One Services','parallax-one'),
		'parallax_one_customers' => __('Parallax One Customers','parallax-one')
    ) );
}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function parallax_one_widgets_init() {
	
	register_sidebar( 
		array(
			'name'          => __( 'Sidebar', 'parallax-one' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2><div class="colored-line-left"></div><div class="clearfix widget-title-margin"></div>',
		)
	);
	
	register_sidebars( 4, 
		array(
			'name' => __('Footer area %d','parallax-one'),
			'id' => 'footer-area',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
		) 
	);
	
}
add_action( 'widgets_init', 'parallax_one_widgets_init' );




/**
 * Fallback Menu
 *
 * If the menu doesn't exist, the fallback function to use.
 */
function parallax_one_wp_page_menu()
{
    echo '<ul class="nav navbar-nav navbar-right main-navigation small-text">';
    wp_list_pages(array('title_li' => '', 'depth' => 1));
    echo '</ul>';
}


/**
 * Enqueue scripts and styles.
 */
function parallax_one_scripts() {

	wp_enqueue_style( 'parallax-one-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style( 'parallax-one-style', get_stylesheet_uri(), array('parallax-one-bootstrap-style'),'v1');

	wp_enqueue_script( 'parallax-one-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), 'v3.3.1', true );

	wp_enqueue_script( 'parallax-one-jquery-all-plagins', get_template_directory_uri() . '/js/jquery.all_plugins.min.js', array('parallax-one-bootstrap'), '20150331', true );

	wp_enqueue_script( 'parallax-one-custom-all', get_template_directory_uri() . '/js/custom.all.js', array('parallax-one-jquery-all-plagins','jquery'), '20150331', true );

	if( is_home() ):

		wp_enqueue_script( 'parallax-one-jquery-home-plugins', get_template_directory_uri() . '/js/jquery.home_plugins.min.js', array(), '20150331', true );

		wp_enqueue_script( 'parallax-one-custom-home', get_template_directory_uri() . '/js/custom.home.js', array('parallax-one-jquery-home-plugins','jquery'), '20150331', true );

	endif;

	wp_enqueue_script( 'parallax-one-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'parallax_one_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function parallax_admin_styles() {
    wp_register_style( 'parallax_admin_stylesheet', get_template_directory_uri() . '/css/admin-style.css' );
    wp_enqueue_style( 'parallax_admin_stylesheet' );
}
add_action( 'admin_enqueue_scripts', 'parallax_admin_styles', 10 );

// Adding IE-only scripts to header.
function parallax_one_ie () {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="'. get_template_directory_uri() . '/js/html5shiv.min.js"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action('wp_head', 'parallax_one_ie');

/***************************************************/
/*********** Widgets and Sidebars ************/
/***************************************************/
add_action( 'widgets_init', 'parallax_widget_init' );

function parallax_widget_init(){
	
	register_widget( 'parallax_one_happy_customer_widget' );
	register_widget( 'parallax_one_our_team_widget' );
	register_widget( 'parallax_one_our_services_widget' );
	register_widget( 'parallax_one_logos_widget' );
	
	$active_widgets = get_option( 'sidebars_widgets' );
	
	$parallax_one_sidebars = array ( 'parallax-one-logos-sidebar' => 'parallax-one-logos-sidebar' , 'parallax-one-customers-sidebar' => 'parallax-one-customers-sidebar' , 'parallax-one-team-sidebar' => 'parallax-one-team-sidebar' , 'parallax-one-services-sidebar' => 'parallax-one-services-sidebar' );
	
	/* Register sidebar */
	foreach ( $parallax_one_sidebars as $parallax_one_sidebar ):
		
		if( $parallax_one_sidebar == 'parallax-one-logos-sidebar' ):
		
			$parallax_one_name = __( 'Logos section', 'parallax-one' );
		
		elseif( $parallax_one_sidebar == 'parallax-one-customers-sidebar' ):
		
			$parallax_one_name = __( 'Happy Customers section', 'parallax-one' );
		
		elseif( $parallax_one_sidebar == 'parallax-one-team-sidebar' ):
		
			$parallax_one_name = __( 'Our Team section', 'parallax-one' );
			
		elseif( $parallax_one_sidebar == 'parallax-one-services-sidebar' ):
		
			$parallax_one_name = __( 'Our Services section', 'parallax-one' );
			
		else:
		
			$parallax_one_name = $parallax_one_sidebar;
			
		endif;
		
        register_sidebar(
            array (
                'name'          => $parallax_one_name,
                'id'            => $parallax_one_sidebar,
                'before_widget' => '',
                'after_widget'  => ''
            )
        );
		
    endforeach;

}

/********************************************/
/********* JS Widget Scripts ************/
/********************************************/

require_once ( 'inc/class/parallax-one-our-services-widget.php');

require_once ( 'inc/class/parallax-one-our-team-widget.php');

require_once ( 'inc/class/parallax-one-happy-customer-widget.php');

require_once ( 'inc/class/parallax-one-logos-widget.php');

add_action('admin_enqueue_scripts', 'parallax_one_our_services_widget_scripts');

function parallax_one_our_services_widget_scripts() {

    wp_enqueue_media();

    wp_enqueue_script('paralax_one_our_services_widget_script', get_template_directory_uri() . '/js/widget-services.js', false, '1.0', true);

	wp_enqueue_script('paralax_one_team_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);
	
	wp_enqueue_script('paralax_one_customers_widget_script', get_template_directory_uri() . '/js/widget-customers.js', false, '1.0', true);
	
	wp_enqueue_script('parallax_one_logos_widget_script', get_template_directory_uri() . '/js/widget-logos.js', false, '1.0', true);
}

/********************************************/
/********* Default Widgets **************/
/*******************************************/

add_action( 'after_switch_theme', 'parallax_one_default_widgets_our_services' );

function parallax_one_default_widgets_our_services()
{

	$parallax_one_sidebars = array ( 'parallax-one-logos-sidebar' => 'parallax-one-logos-sidebar', 'parallax-one-services-sidebar' => 'parallax-one-services-sidebar', 'parallax-one-team-sidebar' => 'parallax-one-team-sidebar',  'parallax-one-customers-sidebar' => 'parallax-one-customers-sidebar'   );
	
	$active_widgets = get_option( 'sidebars_widgets' );
	
	
	/* Default Logos widgets */
	
	if ( empty ( $active_widgets[ $parallax_one_sidebars['parallax-one-logos-sidebar'] ] ) ):

		$parallax_one_counter = 1;
		
		$active_widgets[ 'parallax-one-logos-sidebar' ][0] = 'parallax_one_logos_widget-' . $parallax_one_counter;
		
		$logos_content[ $parallax_one_counter ] = array ( 'link' => '#', 'image_uri' => get_stylesheet_directory_uri().'/images/companies/1.png', 'new_tab' => false );
		
		update_option( 'widget_parallax_one_logos_widget', $logos_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ 'parallax-one-logos-sidebar' ][] = 'parallax_one_logos_widget-' . $parallax_one_counter;
		
		$logos_content[ $parallax_one_counter ] = array ( 'link' => '#', 'image_uri' => get_stylesheet_directory_uri().'/images/companies/2.png', 'new_tab' => false );
		
		update_option( 'widget_parallax_one_logos_widget', $logos_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ 'parallax-one-logos-sidebar' ][] = 'parallax_one_logos_widget-' . $parallax_one_counter;
		
		$logos_content[ $parallax_one_counter ] = array ( 'link' => '#', 'image_uri' => get_stylesheet_directory_uri().'/images/companies/3.png', 'new_tab' => false );
		
		update_option( 'widget_parallax_one_logos_widget', $logos_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ 'parallax-one-logos-sidebar' ][] = 'parallax_one_logos_widget-' . $parallax_one_counter;
		
		$logos_content[ $parallax_one_counter ] = array ( 'link' => '#', 'image_uri' => get_stylesheet_directory_uri().'/images/companies/4.png', 'new_tab' => false );
		
		update_option( 'widget_parallax_one_logos_widget', $logos_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ 'parallax-one-logos-sidebar' ][] = 'parallax_one_logos_widget-' . $parallax_one_counter;
		
		$logos_content[ $parallax_one_counter ] = array ( 'link' => '#', 'image_uri' => get_stylesheet_directory_uri().'/images/companies/5.png', 'new_tab' => false );
		
		update_option( 'widget_parallax_one_logos_widget', $logos_content );
	 
		$parallax_one_counter++;
		
		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;

	/* Default Our Services widgets */
	
	if ( empty ( $active_widgets[ $parallax_one_sidebars['parallax-one-services-sidebar'] ] ) ):

		$parallax_one_counter = 1;
		
		$active_widgets[ 'parallax-one-services-sidebar' ][0] = 'parallax_one_our_services_widget-' . $parallax_one_counter;
		
		$our_services_content[ $parallax_one_counter ] = array ( 'service_title' => __( 'Lorem Ipsum','parallax-one' ), 'service_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one' ), 'services_icon' => 'icon-basic-webpage-multiple', 'image_uri' => '', 'parallax_one_icon_type_our_services' => 'parallax_icon' );
		
		update_option( 'widget_parallax_one_our_services_widget', $our_services_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ 'parallax-one-services-sidebar' ][] = 'parallax_one_our_services_widget-' . $parallax_one_counter;
		
		$our_services_content[ $parallax_one_counter ] = array ( 'service_title' => __( 'Lorem Ipsum','parallax-one' ), 'service_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one' ), 'services_icon' => 'icon-ecommerce-graph3', 'image_uri' => '', 'parallax_one_icon_type_our_services' => 'parallax_icon' );
		
		update_option( 'widget_parallax_one_our_services_widget', $our_services_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ 'parallax-one-services-sidebar' ][] = 'parallax_one_our_services_widget-' . $parallax_one_counter;
		
		$our_services_content[ $parallax_one_counter ] = array ( 'service_title' => __( 'Lorem Ipsum','parallax-one' ), 'service_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one' ), 'services_icon' => 'icon-basic-geolocalize-05', 'image_uri' => '', 'parallax_one_icon_type_our_services' => 'parallax_icon' );
		
		update_option( 'widget_parallax_one_our_services_widget', $our_services_content );
	 
		$parallax_one_counter++;
		
		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	
	
	/* Default Our Team widgets */
		
	if ( empty ( $active_widgets[ $parallax_one_sidebars['parallax-one-team-sidebar'] ] ) ):

		$parallax_one_counter = 1;
		
		$colector = array(array('icon_value'=>'icon-social-facebook','icon_link' => '#'),array('icon_value'=>'icon-social-twitter','icon_link' => '#'),array('icon_value'=>'icon-social-pinterest','icon_link' => '#'));
		
		$json_colector = json_encode($colector);
		
		$active_widgets[ $parallax_one_sidebars['parallax-one-team-sidebar'] ][0] = 'parallax_one_our_team_widget-' . $parallax_one_counter;

		$our_team_content[ $parallax_one_counter ] = array ( 'name' => __( 'Albert Jacobs','parallax-one' ), 'position' => __( 'Founder & CEO','parallax-one' ), 'colector' => $json_colector, 'image_uri' => get_stylesheet_directory_uri().'/images/team/1.jpg' );
		
		update_option( 'widget_parallax_one_our_team_widget', $our_team_content );
	 
		$parallax_one_counter++;



		$active_widgets[ $parallax_one_sidebars['parallax-one-team-sidebar'] ][] = 'parallax_one_our_team_widget-' . $parallax_one_counter;

		$our_team_content[ $parallax_one_counter ] = array ( 'name' => __( 'Tonya Garcia','parallax-one' ), 'position' => __( 'Account Manager','parallax-one' ), 'colector' => $json_colector, 'image_uri' => get_stylesheet_directory_uri().'/images/team/2.jpg' );
		
		update_option( 'widget_parallax_one_our_team_widget', $our_team_content );
	 
		$parallax_one_counter++;



		$active_widgets[ $parallax_one_sidebars['parallax-one-team-sidebar'] ][] = 'parallax_one_our_team_widget-' . $parallax_one_counter;

		$our_team_content[ $parallax_one_counter ] = array ( 'name' => __( 'Linda Guthrie','parallax-one' ), 'position' => __( 'Business Development','parallax-one' ), 'colector' => $json_colector, 'image_uri' => get_stylesheet_directory_uri().'/images/team/3.jpg' );
		
		update_option( 'widget_parallax_one_our_team_widget', $our_team_content );
	 
		$parallax_one_counter++;
		
		update_option( 'sidebars_widgets', $active_widgets );
	
	endif;
	
	
	/* Default Happy Customer widgets */
	
	if ( empty ( $active_widgets[ $parallax_one_sidebars['parallax-one-customers-sidebar'] ] )):
    
		$parallax_one_counter = 1;
		
		$active_widgets[ $parallax_one_sidebars['parallax-one-customers-sidebar'] ][0] = 'parallax_one_happy_customer_widget-' . $parallax_one_counter;
		
		$happy_customer_content[ $parallax_one_counter ] = array ( 'title' => __( 'Happy Customer','parallax-one' ), 'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one' ), 'details' => __( 'Lorem ipsum','parallax-one' ), 'image_uri' => get_stylesheet_directory_uri().'/images/clients/1.jpg' );
		
		update_option( 'widget_parallax_one_happy_customer_widget', $happy_customer_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ $parallax_one_sidebars['parallax-one-customers-sidebar'] ][] = 'parallax_one_happy_customer_widget-' . $parallax_one_counter;
		
		$happy_customer_content[ $parallax_one_counter ] = array ( 'title' => __( 'Happy Customer','parallax-one' ), 'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one' ), 'details' => __( 'Lorem ipsum','parallax-one' ), 'image_uri' => get_stylesheet_directory_uri().'/images/clients/2.jpg' );
		
		update_option( 'widget_parallax_one_happy_customer_widget', $happy_customer_content );
	 
		$parallax_one_counter++;
		
		
		$active_widgets[ $parallax_one_sidebars['parallax-one-customers-sidebar'] ][] = 'parallax_one_happy_customer_widget-' . $parallax_one_counter;
		
		$happy_customer_content[ $parallax_one_counter ] = array ( 'title' => __( 'Happy Customer','parallax-one' ), 'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one' ), 'details' => __( 'Lorem ipsum','parallax-one' ), 'image_uri' => get_stylesheet_directory_uri().'/images/clients/3.jpg' );
		
		update_option( 'widget_parallax_one_happy_customer_widget', $happy_customer_content );
	 
		$parallax_one_counter++;
		
		update_option( 'sidebars_widgets', $active_widgets );
	
	endif;
	
	
}


/* remove custom-background from body_class() */
add_filter( 'body_class', 'remove_class_function' );

function remove_class_function( $classes ) {

    if ( !is_home() ) {
        // index of custom-background
        $key = array_search('custom-background', $classes);
        // remove class
        unset($classes[$key]);
    }
    return $classes;

}

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action('woocommerce_before_main_content', 'parallax_one_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'parallax_one_wrapper_end', 10);
	function parallax_one_wrapper_start() {
		echo '</div> </header>';
		echo '<div class="content-wrap">
				<div class="container">
					<div id="primary" class="content-area col-md-12">';
	}
	function parallax_one_wrapper_end() {
		echo '</div></div></div>';
	}


	// add this code directly, no action needed
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );