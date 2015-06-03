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

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

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
		'default-image' => '',
	) ) );

	add_theme_support( 'post-thumbnails' ); 

	/* Set the image size by cropping the image */
	add_image_size( 'post-thumbnail-big', 730, 340, true );
	add_image_size( 'post-thumbnail-tablet', 730, 340, true );
	add_image_size( 'post-thumbnail-mobile', 730, 340, true );

}
endif; // parallax_one_setup
add_action( 'after_setup_theme', 'parallax_one_setup' );

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
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	
	register_sidebars(4, 
		array(
			'name' => __('Footer area %d','parallax-one'),
			'id' => 'footer-area',
			'before_widget' => '<div class="widget widget_recent_entries">',
			'after_widget'  => '</div>',
			'before_title'=>'<h3 class="widget-title">',
			'after_title'=>'</h3>'
		) 
	);
	
	register_sidebar(
		array (
			'name'          => __( 'Our Services section', 'parallax-one' ),
			'id'            => 'parallax-one-services-sidebar',
			'before_widget' => '',
			'after_widget'  => ''
		)
	);
	
	register_sidebar(
		array (
			'name'          => __( 'Our Team section', 'parallax-one' ),
			'id'            => 'parallax-one-team-sidebar',
			'before_widget' => '',
			'after_widget'  => ''
		)
	);

	register_sidebar(
		array (
			'name'          => __( 'Our Customers section', 'parallax-one' ),
			'id'            => 'parallax-one-customers-sidebar',
			'before_widget' => '',
			'after_widget'  => ''
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








/*******************************************/
/*********** WIDGETS ***********************/
/*******************************************/

add_action('widgets_init', 'parallax_one_register_widgets');

function parallax_one_register_widgets() {

	register_widget( 'parallax_one_happy_customer_widget' );
	
	register_widget( 'parallax_one_our_team_widget' );
	
	register_widget( 'parallax_one_our_services_widget' );

}

/********************************************/
/********* JS Widget Scripts ************/
/********************************************/

require_once ( 'inc/class/parallax-one-our-services-widget.php');

require_once ( 'inc/class/parallax-one-our-team-widget.php');

require_once ( 'inc/class/parallax-one-happy-customer-widget.php');

add_action('admin_enqueue_scripts', 'parallax_one_our_services_widget_scripts');

function parallax_one_our_services_widget_scripts() {

    wp_enqueue_media();

    wp_enqueue_script('paralax_one_our_services_widget_script', get_template_directory_uri() . '/js/widget-services.js', false, '1.0', true);

	wp_enqueue_script('paralax_one_team_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);
	
	wp_enqueue_script('paralax_one_customers_widget_script', get_template_directory_uri() . '/js/widget-customers.js', false, '1.0', true);
}



/********************************************/
/*********** Default Widgets *************/
/********************************************/
function parallax_one_insert_widget( $sidebar, $name, $args = array() ) {
    if ( ! $sidebars = get_option( 'sidebars_widgets' ) )
        $sidebars = array();
 
    // Create the sidebar if it doesn't exist.
    if ( ! isset( $sidebars[ $sidebar ] ) )
        $sidebars[ $sidebar ] = array();

    // Check for existing saved widgets.
    if ( $widget_opts = get_option( "widget_$name" ) ) {
        // Get next insert id.
        ksort( $widget_opts );
        end( $widget_opts );
        $insert_id = key( $widget_opts );
    } else {
        // None existing, start fresh.
        $widget_opts = array( '_multiwidget' => 1 );
        $insert_id = 0;
    }
	
	// Add our settings to the stack.
	$widget_opts[ ++$insert_id ] = $args;
	// Add our widget!
	$sidebars[ $sidebar ][] = "$name-$insert_id";

	update_option( 'sidebars_widgets', $sidebars );
	update_option( "widget_$name", $widget_opts );
}




function parallax_trigger_default_widgets(){
	$active_widgets = get_option( 'sidebars_widgets' );
	
	if( empty($active_widgets['parallax-one-customers-sidebar']) ) {
		parallax_one_insert_widget( 'parallax-one-customers-sidebar', 'parallax_one_happy_customer_widget',
		   array ( 'title' => __( 'Happy Customer','parallax-one' ), 'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ante enim, vel feugiat tellus dignissim at. Nullam ultrices consequat neque, a laoreet sapien gravida non','parallax-one' ), 'details' => __( 'Lorem ipsum','parallax-one' ), 'image_uri' => get_stylesheet_directory_uri().'/images/clients/1.jpg' )
		);
		
		parallax_one_insert_widget( 'parallax-one-customers-sidebar', 'parallax_one_happy_customer_widget',
		   array ( 'title' => __( 'Happy Customer','parallax-one' ), 'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ante enim, vel feugiat tellus dignissim at. Nullam ultrices consequat neque, a laoreet sapien gravida non','parallax-one' ), 'details' => __( 'Lorem ipsum','parallax-one' ), 'image_uri' => get_stylesheet_directory_uri().'/images/clients/1.jpg' )
		);
		
		parallax_one_insert_widget( 'parallax-one-customers-sidebar', 'parallax_one_happy_customer_widget',
		   array ( 'title' => __( 'Happy Customer','parallax-one' ), 'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ante enim, vel feugiat tellus dignissim at. Nullam ultrices consequat neque, a laoreet sapien gravida non','parallax-one' ), 'details' => __( 'Lorem ipsum','parallax-one' ), 'image_uri' => get_stylesheet_directory_uri().'/images/clients/1.jpg' )
		);
	}
	
	if( empty($active_widgets['parallax-one-team-sidebar']) ){
		
		$colector = array(array('icon_value'=>'icon-social-facebook','icon_link' => '#'),array('icon_value'=>'icon-social-twitter','icon_link' => '#'),array('icon_value'=>'icon-social-pinterest','icon_link' => '#'));
		$json_colector = json_encode($colector);
		
		parallax_one_insert_widget( 'parallax-one-team-sidebar', 'parallax_one_our_team_widget',
		   array ( 'name' => __( 'Albert Jacobs','parallax-one' ), 'position' => __( 'Founder & CEO','parallax-one' ), 'colector' => $json_colector, 'image_uri' => get_stylesheet_directory_uri().'/images/team/1.jpg' )		
		);
		
		parallax_one_insert_widget( 'parallax-one-team-sidebar', 'parallax_one_our_team_widget',
		   array ( 'name' => __( 'Albert Jacobs','parallax-one' ), 'position' => __( 'Founder & CEO','parallax-one' ), 'colector' => $json_colector, 'image_uri' => get_stylesheet_directory_uri().'/images/team/2.jpg' )		
		);
		
		parallax_one_insert_widget( 'parallax-one-team-sidebar', 'parallax_one_our_team_widget',
		   array ( 'name' => __( 'Albert Jacobs','parallax-one' ), 'position' => __( 'Founder & CEO','parallax-one' ), 'colector' => $json_colector, 'image_uri' => get_stylesheet_directory_uri().'/images/team/3.jpg' )		
		);
	}
	
	if( empty($active_widgets['parallax-one-services-sidebar']) ){
		
		parallax_one_insert_widget( 'parallax-one-services-sidebar', 'parallax_one_our_services_widget',
		   array ( 'service_title' => __( 'Lorem Ipsum','parallax-one' ), 'service_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one' ), 'services_icon' => 'icon-basic-webpage-multiple', 'image_uri' => '', 'parallax_one_icon_type_our_services' => 'parallax_icon' )
		);
		
		parallax_one_insert_widget( 'parallax-one-services-sidebar', 'parallax_one_our_services_widget',
		   array ( 'service_title' => __( 'Lorem Ipsum','parallax-one' ), 'service_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one' ), 'services_icon' => 'icon-ecommerce-graph3', 'image_uri' => '', 'parallax_one_icon_type_our_services' => 'parallax_icon' )
		);
		
		parallax_one_insert_widget( 'parallax-one-services-sidebar', 'parallax_one_our_services_widget',
		   array ( 'service_title' => __( 'Lorem Ipsum','parallax-one' ), 'service_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one' ), 'services_icon' => 'icon-basic-geolocalize-05', 'image_uri' => '', 'parallax_one_icon_type_our_services' => 'parallax_icon' )
		);
		
	}
}
add_action( 'after_switch_theme', 'parallax_trigger_default_widgets' );

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