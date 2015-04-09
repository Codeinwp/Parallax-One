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
}
endif; // parallax_one_setup
add_action( 'after_setup_theme', 'parallax_one_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function parallax_one_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'parallax-one' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
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

	wp_enqueue_script( 'parallax-one-jquery-all-plagins', get_template_directory_uri() . '/js/jquery.all_plagins.min.js', array('parallax-one-bootstrap'), '20150331', true );

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
