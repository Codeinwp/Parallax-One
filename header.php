<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package parallax-one
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- =========================
     PRE LOADER       
    ============================== -->
    <div class="preloader">
        <div class="status">
            &nbsp;
        </div>
    </div>
	

	<!-- =========================
     SECTION: HOME / HEADER  
    ============================== -->
	<header class="header header-style-one" data-stellar-background-ratio="0.5" id="home" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/background-images/2.jpg);">

        <!-- COLOR OVER IMAGE -->
        <div class="overlay-layer">	

            <!-- STICKY NAVIGATION -->
            <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation appear-on-scroll" role="navigation">
				<!-- CONTAINER -->
                <div class="container">
				
                    <div class="navbar-header">
                        
                        <!-- LOGO ON STICKY NAV BAR -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#stamp-navigation">
                            <span class="sr-only"><?php _e('Toggle navigation','parallax-one'); ?></span>
                            <span class="icon-grid-2x2"></span>
                        </button>
                        
                        <!-- LOGO -->
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo get_template_directory_uri();?>/images/logo-nav.png" alt="">
                        </a>
                        
                    </div>
                    
                    <!-- MENU -->			
					<?php 
						wp_nav_menu( array( 'theme_location' => 'primary',	'container_class' => 'navbar-collapse collapse', 'container_id'    => 'stamp-navigation', 'menu_class' => 'nav navbar-nav navbar-right main-navigation small-text', 'fallback_cb' => 'parallax_one_wp_page_menu' ) ); 
					?>
					<!-- /END MENU -->
                </div>
                <!-- /END CONTAINER -->
            </div>
            <!-- /END STICKY NAVIGATION -->