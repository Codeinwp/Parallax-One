<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package parallax-one
 */
?>

    <footer class="footer grey-bg">

        <div class="container">
            <div class="footer-widget-wrap">
			
				<?php
					if( is_active_sidebar( 'footer-area' ) ){
				?>
						<div class="col-md-3 col-sm-6 col-xs-12 widget-box">
							<?php
								dynamic_sidebar( 'footer-area' );
							?>
						</div>
				
				<?php
					}
					if( is_active_sidebar( 'footer-area-2' ) ){
				?>
						<div class="col-md-3 col-sm-6 col-xs-12 widget-box">
							<?php
								dynamic_sidebar( 'footer-area-2' );
							?>
						</div>
				<?php
					}
					if( is_active_sidebar( 'footer-area-3' ) ){
				?>
						<div class="col-md-3 col-sm-6 col-xs-12 widget-box">
						   <?php
								dynamic_sidebar( 'footer-area-3' );
							?>
						</div>
				<?php
					}
					if( is_active_sidebar( 'footer-area-4' ) ){
				?>
						<div class="col-md-3 col-sm-6 col-xs-12 widget-box">
							<?php
								dynamic_sidebar( 'footer-area-4' );
							?>
						</div>
				<?php
					}
				?>

            </div><!-- .footer-widget-wrap -->

	        <div class="footer-bottom-wrap">
				<?php
					global $wp_customize;
				
					/* COPYRIGHT */
					$paralax_one_copyright = get_theme_mod('parallax_one_copyright','Themeisle');
					
					if( !empty($paralax_one_copyright) ){
						echo '<span class="parallax_one_copyright_content">'.esc_attr($paralax_one_copyright).'</span>';
					} elseif ( isset( $wp_customize )   ) {
						echo '<span class="parallax_one_copyright_content paralax_one_only_customizer"></span>';
					}
				
					/* OPTIONAL FOOTER LINKS */
					wp_nav_menu( 
						array( 
							'theme_location'    => 'parallax_footer_menu',
							'container'         => false,
							'menu_class'        => 'footer-links small-text',
							'depth' 			=> 1,
							'fallback_cb'       => false ) );
				
					/* SOCIAL ICONS */
				
					$parallax_one_social_icons = get_theme_mod('parallax_one_social_icons',json_encode(array(array('icon_value' =>'icon-social-facebook' , 'link' => '#'),array('icon_value' =>'icon-social-twitter' , 'link' => '#'),array('icon_value' =>'icon-social-googleplus' , 'link' => '#'))));

					if( !empty( $parallax_one_social_icons ) ){
						
						$parallax_one_social_icons_decoded = json_decode($parallax_one_social_icons);
						
						if( !empty($parallax_one_social_icons_decoded) ){
						
							echo '<ul class="social-icons">';
							
								foreach($parallax_one_social_icons_decoded as $parallax_one_social_icon){
									
									echo '<li><a href="'.esc_url($parallax_one_social_icon->link).'"><span class="'.esc_attr($parallax_one_social_icon->icon_value).' transparent-text-dark"></span></a></li>';

								}
						
							echo '</ul>';
						
						}
					}
				?>
	            
	        </div><!-- .footer-bottom-wrap -->

	        <div class="powered-by">
	            <a class="" href="https://themeisle.com/themes/parallax-one/" target="_blank" rel="nofollow">Parallax One </a> <?php esc_html_e('powered by','parallax-one'); ?> <a class="" href="http://wordpress.org/" target="_blank" rel="nofollow"><?php esc_html_e('WordPress','parallax-one'); ?></a>
	        </div>

	    </div><!-- container -->

    </footer>

	<?php wp_footer(); ?>

</body>
</html>
