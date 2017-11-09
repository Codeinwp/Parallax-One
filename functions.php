<?php
/**
 * Functions and definitions
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
		register_nav_menus(
			array(
				'primary'              => esc_html__( 'Primary Menu', 'parallax-one' ),
				'parallax_footer_menu' => esc_html__( 'Footer Menu', 'parallax-one' ),
			)
		);

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'parallax_one_custom_background_args', array(
					'default-repeat'     => 'no-repeat',
					'default-position-x' => 'center',
					'default-attachment' => 'fixed',
				)
			)
		);

		/*
		* This feature enables Custom_Headers support for a theme as of Version 3.4.
		*
		* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Header
		*/

		add_theme_support(
			'custom-header', apply_filters(
				'parallax_one_custom_header_args', array(
					'default-image' => parallax_get_file( '/images/background-images/background.jpg' ),
					'width'         => 1000,
					'height'        => 680,
					'flex-height'   => true,
					'flex-width'    => true,
					'header-text'   => false,
				)
			)
		);

		register_default_headers(
			array(
				'parallax_one_default_header_image' => array(
					'url'           => parallax_get_file( '/images/background-images/background.jpg' ),
					'thumbnail_url' => parallax_get_file( '/images/background-images/background_thumbnail.jpg' ),
				),
			)
		);

		// Theme Support for WooCommerce 3.0+
		add_theme_support( 'woocommerce' );

		/* WooCommerce support for latest gallery */
		if ( class_exists( 'WooCommerce' ) ) {
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

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
		add_image_size( 'parallax_one_team', 268, 273, true );
		add_image_size( 'parallax_one_services', 60, 62, true );
		add_image_size( 'parallax_one_customers', 75, 75, true );

		/**
		 * Welcome screen
		 */
		if ( is_admin() ) {
			require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
		}
	}
endif; // parallax_one_setup
add_action( 'after_setup_theme', 'parallax_one_setup' );


/**
 * This function allows modification of the list of image sizes that are available to administrators in the WordPress.
 *
 * @param array $sizes Array of image sizes.
 *
 * @return array
 */
function parallax_one_media_uploader_custom_sizes( $sizes ) {
	return array_merge(
		$sizes, array(
			'parallax_one_team'      => esc_html__( 'Parallax One Team Member', 'parallax-one' ),
			'parallax_one_services'  => esc_html__( 'Parallax One Services', 'parallax-one' ),
			'parallax_one_customers' => esc_html__( 'Parallax One Testimonials', 'parallax-one' ),
		)
	);
}

add_filter( 'image_size_names_choose', 'parallax_one_media_uploader_custom_sizes' );

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

	register_sidebars(
		4,
		array(
			/* translators: %d is widget area id */
			'name'          => esc_html__( 'Footer area %d', 'parallax-one' ),
			'id'            => 'footer-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}

add_action( 'widgets_init', 'parallax_one_widgets_init' );


/**
 * Fallback Menu
 *
 * If the menu doesn't exist, the fallback function to use.
 */
function parallax_one_wp_page_menu() {
	echo '<ul class="nav navbar-nav navbar-right main-navigation small-text no-menu">';
	wp_list_pages(
		array(
			'title_li' => '',
			'depth'    => 1,
		)
	);
	echo '</ul>';
}

/**
 * Enqueue scripts for customizer.
 */
function parallax_one_customizer_scripts() {

	wp_enqueue_script( 'parallax_one_customizer_script', parallax_get_file( '/js/parallax_one_customizer.js' ), array( 'jquery' ), '1.0.2', true );

}

add_action( 'customize_controls_enqueue_scripts', 'parallax_one_customizer_scripts' );


/**
 * Enqueue fonts.
 *
 * @return string
 */
function parallax_one_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Lora, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$cabin = _x( 'on', 'Cabin font: on or off', 'parallax-one' );

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'parallax-one' );

	if ( 'off' !== $cabin || 'off' !== $open_sans ) {
		$font_families = array();

		if ( 'off' !== $cabin ) {
			$font_families[] = 'Cabin:400,600';
		}

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,300,600';
		}

		$parallax_one_character_cyrillic   = get_theme_mod( 'parallax_one_character_cyrillic' );
		$parallax_one_character_vietnamese = get_theme_mod( 'parallax_one_character_vietnamese' );
		$parallax_one_character_greek      = get_theme_mod( 'parallax_one_character_greek' );

		$parallax_one_character_cyrillic_text   = ( isset( $parallax_one_character_cyrillic ) && ( $parallax_one_character_cyrillic != 1 ) ? '' : ',cyrillic' );
		$parallax_one_character_greek_text      = ( isset( $parallax_one_character_greek ) && ( $parallax_one_character_greek != 1 ) ? '' : ',greek' );
		$parallax_one_character_vietnamese_text = ( isset( $parallax_one_character_vietnamese ) && ( $parallax_one_character_vietnamese != 1 ) ? '' : ',vietnamese' );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' . $parallax_one_character_cyrillic_text . $parallax_one_character_greek_text . $parallax_one_character_vietnamese_text ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function parallax_one_scripts() {

	wp_enqueue_style( 'parallax-one-fonts', parallax_one_fonts_url(), array(), null );

	wp_enqueue_style( 'parallax-one-bootstrap-style', parallax_get_file( '/css/bootstrap.min.css' ), array(), '3.3.1' );

	wp_enqueue_style( 'parallax-one-font-awesome', parallax_get_file( '/css/font-awesome.min.css' ), '4.7' );

	wp_enqueue_style( 'parallax-one-style', get_stylesheet_uri(), array( 'parallax-one-bootstrap-style' ), '1.0.0' );

	wp_enqueue_script( 'parallax-one-bootstrap', parallax_get_file( '/js/bootstrap.min.js' ), array(), '3.3.5', true );

	wp_enqueue_script( 'parallax-one-custom-all', parallax_get_file( '/js/custom.all.js' ), array( 'jquery' ), '2.0.2', true );

	wp_localize_script(
		'parallax-one-custom-all', 'screenReaderText', array(
			'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'parallax-one' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'parallax-one' ) . '</span>',
		)
	);

	$parallax_one_enable_move = get_theme_mod( 'paralax_one_enable_move' );
	if ( ! empty( $parallax_one_enable_move ) && $parallax_one_enable_move && 'posts' == get_option( 'show_on_front' ) && is_front_page() ) {

		wp_enqueue_script(
			'parallax-one-home-plugin', parallax_get_file( '/js/plugin.home.js' ), array(
				'jquery',
				'parallax-one-custom-all',
			), '1.0.1', true
		);

	}

	$parallax_one_frontpage_animations = get_theme_mod( 'parallax_one_enable_animations', false );
	if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) && 'posts' == get_option( 'show_on_front' ) && is_front_page() ) {

		wp_enqueue_script( 'parallax-one-home-animations', parallax_get_file( '/js/scrollReveal.js' ), array( 'jquery' ), '1.0.0', true );

	}

	if ( 'posts' == get_option( 'show_on_front' ) && is_front_page() ) {

		wp_enqueue_script( 'parallax-one-custom-home', parallax_get_file( '/js/custom.home.js' ), array( 'jquery' ), '1.0.0', true );
	}

	wp_enqueue_script( 'parallax-one-skip-link-focus-fix', parallax_get_file( '/js/skip-link-focus-fix.js' ), array(), '1.0.0', true );

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

/**
 * Enables user customization via WordPress plugin API
 */
require get_template_directory() . '/inc/hooks.php';

/**
 *  Customizer info
 */
require_once get_template_directory() . '/inc/customizer-info/class/class-singleton-customizer-info-section.php';

/**
 * Translations
 */
require get_template_directory() . '/inc/translations/general.php';

/**
 * TAV_Remote_Notification_Client.
 */
if ( ! class_exists( 'TAV_Remote_Notification_Client' ) ) {
	require( get_template_directory() . '/inc/admin/class-remote-notification-client.php' );
}
$parallax_one_notification = new TAV_Remote_Notification_Client( 49, 'a0973bf1bd1fe265', 'https://themeisle.com?post_type=notification' );

/**
 * Adding IE-only scripts to header.
 */
function parallax_one_ie() {
	echo '<!--[if lt IE 9]>' . "\n";
	echo '<script src="' . parallax_get_file( '/js/html5shiv.min.js' ) . '"></script>' . "\n";
	echo '<![endif]-->' . "\n";
}

add_action( 'wp_head', 'parallax_one_ie' );


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * WooCommerce code before main content.
 */
function parallax_one_wrapper_start() {
	echo '</div>';
	parallax_hook_header_bottom();
	echo '</header>';
	parallax_hook_header_after();
	echo '<div class="content-wrap">
				<div class="container">
					<div id="primary" class="content-area col-md-12">';
}

add_action( 'woocommerce_before_main_content', 'parallax_one_wrapper_start', 10 );

/**
 * WooCommerce code after main content.
 */
function parallax_one_wrapper_end() {
	echo '</div></div></div>';
}

add_action( 'woocommerce_after_main_content', 'parallax_one_wrapper_end', 10 );

/* add this code directly, no action needed */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/* tgm-plugin-activation */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';


/**
 * TGM Required plugins
 */
function parallax_one_register_required_plugins() {

	$plugins = array(
		array(

			'name'     => 'Intergeo Maps - Google Maps Plugin',

			'slug'     => 'intergeo-maps',

			'required' => false,

		),

		array(

			'name'     => 'Pirate Forms',

			'slug'     => 'pirate-forms',

			'required' => false,

		),
	);

	$config = array(
		'id'           => 'parallax-one',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}

add_action( 'tgmpa_register', 'parallax_one_register_required_plugins' );


/**
 * Parallax inline style.
 */
function parallax_one_php_style() {

	echo '<style type="text/css">';

	$parallax_one_title_color = get_theme_mod( 'parallax_one_title_color' );
	if ( ! empty( $parallax_one_title_color ) ) {
		echo '.dark-text, .entry-header h1, #sidebar-secondary .widget-title { color: ' . $parallax_one_title_color . ' }';
	}
	$parallax_one_text_color = get_theme_mod( 'parallax_one_text_color' );
	if ( ! empty( $parallax_one_text_color ) ) {
		echo 'body, .entry-content p, .pirate_forms_thankyou_wrap p { color: ' . $parallax_one_text_color . '}';
	}

	$parallax_one_enable_move = get_theme_mod( 'paralax_one_enable_move' );

	if ( ( empty( $parallax_one_enable_move ) || ! $parallax_one_enable_move ) && 'posts' == get_option( 'show_on_front' ) && is_front_page() ) {
		$parallax_one_header_image = get_header_image();
		if ( ! empty( $parallax_one_header_image ) ) {
			echo '.header{ background-image: url(' . parallax_one_make_protocol_relative_url( $parallax_one_header_image ) . ');}';
		}
	}

	$parallax_one_bigtitle_background = get_theme_mod( 'parallax_one_bigtitle_background', 'rgba(0, 0, 0, 0.7)' );
	if ( ! empty( $parallax_one_bigtitle_background ) ) {
		echo '.overlay-layer-wrap{ background:' . $parallax_one_bigtitle_background . ';}';
	}

	echo '</style>';
}

add_action( 'wp_footer', 'parallax_one_php_style', 100 );


/**
 * Get file from child-theme.
 *
 * @param string $file File name.
 *
 * @return string
 */
function parallax_get_file( $file ) {
	$file_parts   = pathinfo( $file );
	$accepted_ext = array( 'jpg', 'img', 'png', 'css', 'js' );
	if ( in_array( $file_parts['extension'], $accepted_ext ) ) {
		$file_path = get_stylesheet_directory() . $file;
		if ( file_exists( $file_path ) ) {
			return esc_url( get_stylesheet_directory_uri() . $file );
		} else {
			return esc_url( get_template_directory_uri() . $file );
		}
	}
}


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 */

add_filter( 'woocommerce_output_related_products_args', 'parallax_one_related_products_args' );

/**
 * Change number of related products in WooCommerce.
 *
 * @param array $args WooCommerce settings.
 *
 * @return mixed
 */
function parallax_one_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']        = 4;

	return $args;
}


/**
 * Prevent theme from beeing updated by wordpress.org updates
 *
 * @param array  $r Request.
 * @param string $url Url.
 *
 * @return mixed
 */
function parallax_one_prevent_wporg_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}

	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );

	return $r;
}

add_filter( 'http_request_args', 'parallax_one_prevent_wporg_update', 5, 2 );


/**
 * Adds container to embed video.
 *
 * @param mixed  $html The cached HTML result, stored in post meta.
 * @param string $url The attempted embed URL.
 * @param array  $attr An array of shortcode attributes.
 * @param int    $post_id Post ID.
 *
 * @return string
 */
function parallax_one_responsive_embed( $html, $url, $attr, $post_id ) {
	$return = '<div class="parallax-one-video-container">' . $html . '</div>';

	return $return;
}

add_filter( 'embed_oembed_html', 'parallax_one_responsive_embed', 10, 4 );


/**
 * Display sections from childtheme, theme or plus plugin.
 *
 * @param string $template Template file name.
 */
function parallax_one_get_template_part( $template ) {
	if ( locate_template( $template . '.php' ) ) {
		get_template_part( $template );
	} else {
		if ( defined( 'PARALLAX_ONE_PLUS_PATH' ) ) {
			$template = basename( $template );
			if ( get_template_directory() !== get_stylesheet_directory() ) {
				if ( file_exists( get_stylesheet_directory() . '/sections/' . $template . '.php' ) ) {
					require_once( get_stylesheet_directory() . '/sections/' . $template . '.php' );

					return;
				}
			}
			if ( file_exists( PARALLAX_ONE_PLUS_PATH . 'public/templates/' . $template . '.php' ) ) {
				require_once( PARALLAX_ONE_PLUS_PATH . 'public/templates/' . $template . '.php' );
			}
		}
	}
}

if ( ! function_exists( 'parallax_one_make_protocol_relative_url' ) ) {

	/**
	 * URL relative path;
	 *
	 * @param string $url URL.
	 *
	 * @return mixed
	 */
	function parallax_one_make_protocol_relative_url( $url ) {
		return preg_replace( '(https?://)', '//', $url );
	}
}

/**
 * Transform Enqueued Stylesheet URLs
 */
function parallax_one_style_loader_src( $src, $handle ) {
	return parallax_one_make_protocol_relative_url( $src );
}

add_filter( 'style_loader_src', 'parallax_one_style_loader_src', 10, 2 );

/**
 * Transform Enqueued JavaScript URLs
 */
function parallax_one_script_loader_src( $src, $handle ) {
	return parallax_one_make_protocol_relative_url( $src );
}

add_filter( 'script_loader_src', 'parallax_one_script_loader_src', 10, 2 );

/**
 * Transform Enqueued Theme Files
 */
function parallax_one_template_directory_uri( $template_dir_uri, $template, $theme_root_uri ) {
	return parallax_one_make_protocol_relative_url( $template_dir_uri );
}

add_filter( 'template_directory_uri', 'parallax_one_template_directory_uri', 10, 3 );

/**
 * Transform Enqueued Theme Files
 */
function parallax_one_stylesheet_directory_uri( $stylesheet_dir_uri, $stylesheet, $theme_root_uri ) {
	return parallax_one_make_protocol_relative_url( $stylesheet_dir_uri );
}

add_filter( 'stylesheet_directory_uri', 'parallax_one_stylesheet_directory_uri', 10, 3 );


/**
 * 404 page content.
 */
function parallax_output_404_content() {
	?>
	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'parallax-one' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'parallax-one' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php
}

add_action( 'parallax_404_content', 'parallax_output_404_content' ); // Outputs a helpful message on 404 pages


/**
 * Editor style
 */
function parallax_one_add_editor_styles() {
	add_editor_style( array( 'css/custom-editor-style.css', parallax_one_fonts_url() ) );
}

add_action( 'after_setup_theme', 'parallax_one_add_editor_styles' );

/**
 * Notice in Customize to announce the theme is not maintained anymore
 */
function parallax_one_customize_register_notification( $wp_customize ) {
	require_once( 'inc/class/class-ti-notify.php' );
	$wp_customize->register_section_type( 'Ti_Notify' );
	$wp_customize->add_section(
		new Ti_Notify(
			$wp_customize,
			'ti-notify',
			array(
				/* translators: Link to the recommended theme */
				'text'     => sprintf( __( 'This theme is not maintained anymore, check-out our latest free one-page theme: %1$s.', 'parallax-one' ), sprintf( '<a href="' . admin_url( 'theme-install.php?theme=hestia' ) . '">%s</a>', 'Hestia' ) ),
				'priority' => 0,
			)
		)
	);
	$wp_customize->add_setting(
		'parallax-one-notify', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'parallax-one-notify', array(
			'label'    => __( 'Notification', 'parallax-one' ),
			'section'  => 'ti-notify',
			'priority' => 1,
		)
	);
}
add_action( 'customize_register', 'parallax_one_customize_register_notification' );
/**
 * Notice in admin dashboard to announce the theme is not maintained anymore
 */
function parallax_one_admin_notice() {
	global $pagenow;
	if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
		echo '<div class="updated notice is-dismissible"><p>';
		printf( /* translators: link to the recommended theme */ __( 'This theme is not maintained anymore, check-out our latest free one-page theme: %1$s.', 'parallax-one' ), sprintf( '<a href="' . admin_url( 'theme-install.php?theme=hestia' ) . '">%s</a>', 'Hestia' ) );
		echo '</p></div>';
	}
}
add_action( 'admin_notices', 'parallax_one_admin_notice', 99 );
