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
	$content_width = 730; /* pixels */
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
		'primary' => esc_html__( 'Primary Menu', 'parallax-one' ),
		'parallax_footer_menu' => esc_html__('Footer Menu', 'parallax-one'),
	) );

	
	 /* Switch default core markup for search form, comment form, and comments
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
	add_theme_support('custom-background',apply_filters( 'parallax_one_custom_background_args', array(
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
		'default-attachment'     => 'fixed'
	)));

	 /*
	 * This feature enables Custom_Headers support for a theme as of Version 3.4.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Header
	 */
	
	add_theme_support( 'custom-header',apply_filters( 'parallax_one_custom_header_args', array(
		'default-image' => get_template_directory_uri().'/images/background-images/background.jpg',
		'width'         => 1000,
		'height'        => 680,
		'flex-height'   => true,
		'flex-width'    => true,
	)));
	
	register_default_headers( array(
		'parallax_one_default_header_image' => array(
			'url'   => get_template_directory_uri().'/images/background-images/background.jpg',
			'thumbnail_url' => get_template_directory_uri().'/images/background-images/background_thumbnail.jpg',
		),
	));
	
	//Theme Support for WooCommerce
	add_theme_support( 'woocommerce' );

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' ); 

	/* Set the image size by cropping the image */
	add_image_size( 'parallax-one-post-thumbnail-big', 730, 340, true );
	add_image_size( 'parallax-one-post-thumbnail-mobile', 500, 233, true );

	// Latest news Section (homepage)
	add_image_size( 'parallax-one-post-thumbnail-latest-news', 150, 150, true ); 	
	add_image_size( 'parallax-one-team', 268, 273, true );
	add_image_size( 'parallax-one-services',60,62,true );
	add_image_size( 'parallax-one-customers',75,75,true );

}
endif; // parallax_one_setup
add_action( 'after_setup_theme', 'parallax_one_setup' );


add_filter( 'image_size_names_choose', 'parallax_one_media_uploader_custom_sizes' );

function parallax_one_media_uploader_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'parallax-one-team' => esc_html__('Parallax One Team Member','parallax-one'),
		'parallax-one-services' => esc_html__('Parallax One Services','parallax-one'),
		'parallax-one-customers' => esc_html__('Parallax One Testimonials','parallax-one')
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
			'name'          => esc_html__( 'Sidebar', 'parallax-one' ),
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
			'name' => esc_html__('Footer area %d','parallax-one'),
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

	wp_enqueue_style( 'parallax-one-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css','3.3.1');

	wp_enqueue_style( 'parallax-one-style', get_stylesheet_uri(), array('parallax-one-bootstrap-style'),'1.0.0');

	wp_enqueue_script( 'parallax-one-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.5', true );

	wp_enqueue_script( 'parallax-one-custom-all', get_template_directory_uri() . '/js/custom.all.js', array('jquery'), '1.0.0', true );

	if ( 'posts' == get_option( 'show_on_front' ) && is_front_page() ) {
	
		wp_enqueue_script( 'parallax-one-grid-a-licious', get_template_directory_uri() . '/js/jquery.grid-a-licious.min.js', array(), '3.0.1', true );
		
		wp_enqueue_script( 'parallax-one-custom-home', get_template_directory_uri() . '/js/custom.home.js', array('parallax-one-grid-a-licious','jquery'), '1.0.0', true );
	}

	wp_enqueue_script( 'parallax-one-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'parallax_one_scripts' );


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

function parallax_one_admin_styles() {
	wp_enqueue_style( 'parallax_admin_stylesheet', get_template_directory_uri() . '/css/admin-style.css','1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'parallax_one_admin_styles', 10 );

// Adding IE-only scripts to header.
function parallax_one_ie () {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="'. get_template_directory_uri() . '/js/html5shiv.min.js"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action('wp_head', 'parallax_one_ie');




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


/* tgm-plugin-activation */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'parallax_one_register_required_plugins' );
function parallax_one_register_required_plugins() {
	
		$plugins = array(
			array(
	 
				'name'      => 'Intergeo Maps - Google Maps Plugin',
	 
				'slug'      => 'intergeo-maps',
	 
				'required'  => false,
	 
			)
		);
	
	$config = array(
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins', 
        'has_notices'  => true,                   
        'dismissable'  => true,                  
        'dismiss_msg'  => '',                   
        'is_automatic' => false,                 
        'message'      => '',     
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'parallax-one' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'parallax-one' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'parallax-one' ), 
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'parallax-one' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), 
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), 
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), 
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'parallax-one' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'parallax-one' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'parallax-one' ), 
            'nag_type'                        => 'updated'
        )
    );
 
	tgmpa( $plugins, $config );
 
}

add_action('wp_footer','parallax_one_php_style', 100);
function parallax_one_php_style() {
	
	echo '<style type="text/css">';
	
	$parallax_one_title_color = get_theme_mod('parallax_one_title_color');
	if(!empty($parallax_one_title_color)){
		echo '.dark-text { color: '. $parallax_one_title_color .' }';
	}
	$parallax_one_text_color = get_theme_mod('parallax_one_text_color');
	if(!empty($parallax_one_text_color)){
		echo 'body{ color: '.$parallax_one_text_color.'}';
	}
	$parallax_one_header_image = get_header_image();
	if(!empty($parallax_one_header_image)){
		echo '.header{ background-image: url('.$parallax_one_header_image.');}';
	}
	echo '</style>';
}



$pro_functions_path = get_template_directory_uri() . '/pro/functions.php';
if (file_exists($pro_functions_path)) {
	require $pro_functions_path;
}


function parallax_get_file($file){
	$file_parts = pathinfo($file);
	$accepted_ext = array("jpg","img","png");
	if( in_array($file_parts['extension'], $accepted_ext) ){
		$file_path = get_stylesheet_directory() . $file;
		if ( file_exists( $file_path ) ){
			get_stylesheet_directory_uri() . $file; 
		} else {
			get_template_directory_uri();
		}
	}
}