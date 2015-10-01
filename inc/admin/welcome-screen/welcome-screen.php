<?php
/**
 * Welcome Screen Class
 */
class Parallax_One_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'parallax_one_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'parallax_one_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'parallax_one_welcome_style_and_scripts' ) );

		/* load welcome screen */

		add_action( 'parallax_one_welcome', array( $this, 'parallax_one_welcome_getting_started' ), 	    10 );
		/* Actions required appears only if there is a news */
		if ( !class_exists( 'WPCF7_ContactForm' ) ) {
			add_action('parallax_one_welcome', array($this, 'parallax_one_welcome_actions_required'), 20);
		}

		add_action( 'parallax_one_welcome', array( $this, 'parallax_one_welcome_github' ), 		            30 );
		add_action( 'parallax_one_welcome', array( $this, 'parallax_one_welcome_changelog' ), 				40 );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_register_menu() {
		add_theme_page( 'About Parallax One', 'About Parallax One', 'activate_plugins', 'parallax-one-welcome', array( $this, 'parallax_one_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function parallax_one_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'parallax_one_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Parallax One! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'parallax-one' ), '<a href="' . esc_url( admin_url( 'themes.php?page=parallax-one-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=parallax-one-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Parallax One', 'parallax-one' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function parallax_one_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_parallax-one-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'parallax-one-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'parallax-one-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );
		}
	}

	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="parallax-one-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','parallax-one'); ?></a></li>

			<!-- Actions required appears only if there is a news -->
			<?php $parallax_one_actions_required = 2; 
				if(is_plugin_active( 'pirate-forms/pirate-forms.php' )){
					$parallax_one_actions_required--;
				}
		
				if(is_plugin_active( 'intergeo-maps/index.php' )){
					$parallax_one_actions_required--;
				}
			?>
			<?php if ( $parallax_one_actions_required != 0 ) { ?>
				<li role="presentation" class="parallax-one-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions required','parallax-one'); ?><?php if( !empty($parallax_one_actions_required) ): echo '<span class="parallax-one-actions-count">'.$parallax_one_actions_required.'</span>'; endif; ?></a></li>
			<?php } ?>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','parallax-one'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','parallax-one'); ?></a></li>
		</ul>

		<div class="parallax-one-tab-content">

			<?php
			/**
			 * @hooked parallax_one_welcome_getting_started - 10
			 * @hooked parallax_one_welcome_actions_required - 20
			 * @hooked parallax_one_welcome_child_themes - 30
			 * @hooked parallax_one_welcome_github - 40
			 * @hooked parallax_one_welcome_changelog - 50
			 * @hooked parallax_one_welcome_free_pro - 60
			 */
			do_action( 'parallax_one_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}


	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function parallax_one_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}


}

$GLOBALS['Parallax_One_Welcome'] = new Parallax_One_Welcome();