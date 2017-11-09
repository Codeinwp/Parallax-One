<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package parallax-one
 */ ?>
<footer itemscope itemtype="http://schema.org/WPFooter" id="footer" role="contentinfo" class = "footer grey-bg">
	<div class="container">
		<div class="footer-widget-wrap">
			<?php
			if ( is_active_sidebar( 'footer-area' ) ) {
			?>
				<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-1" class="col-md-3 col-sm-6 col-xs-12 widget-box" aria-label="<?php esc_html_e( 'Widgets Area 1', 'parallax-one' ); ?>">
					<?php
					dynamic_sidebar( 'footer-area' );
					?>
				</div>
			<?php
			}

			if ( is_active_sidebar( 'footer-area-2' ) ) {
			?>
				<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-2" class="col-md-3 col-sm-6 col-xs-12 widget-box" aria-label="<?php esc_html_e( 'Widgets Area 2', 'parallax-one' ); ?>">
					<?php
					dynamic_sidebar( 'footer-area-2' );
					?>
				</div>
			<?php
			}

			if ( is_active_sidebar( 'footer-area-3' ) ) {
			?>
				<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-3" class="col-md-3 col-sm-6 col-xs-12 widget-box" aria-label="<?php esc_html_e( 'Widgets Area 3', 'parallax-one' ); ?>">
					<?php
					dynamic_sidebar( 'footer-area-3' );
					?>
				</div>
			<?php
			}

			if ( is_active_sidebar( 'footer-area-4' ) ) {
			?>
				<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-4" class="col-md-3 col-sm-6 col-xs-12 widget-box" aria-label="<?php esc_html_e( 'Widgets Area 4', 'parallax-one' ); ?>">
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
			$paralax_one_copyright = get_theme_mod( 'parallax_one_copyright', 'Themeisle' );
			$paralax_one_copyright = apply_filters( 'parallax_one_translate_single_string', $paralax_one_copyright, 'Footer - Credits' );

			if ( ! empty( $paralax_one_copyright ) ) {
			?>
				<span class="parallax_one_copyright_content"><?php echo esc_attr( $paralax_one_copyright ); ?></span>
			<?php
			} elseif ( is_customize_preview() ) {
			?>
				<span class="parallax_one_copyright_content paralax_one_only_customizer"></span>
			<?php
			}
			?>

			<div itemscope role="navigation" itemtype="http://schema.org/SiteNavigationElement" id="menu-secondary" aria-label="<?php esc_html_e( 'Secondary Menu', 'parallax-one' ); ?>">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Secondary Menu', 'parallax-one' ); ?></h2>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'parallax_footer_menu',
						'container'      => false,
						'menu_class'     => 'footer-links small-text',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</div>

			<?php
			$default                   = parallax_one_footer_socials_get_default_content();
			$parallax_one_social_icons = get_theme_mod( 'parallax_one_social_icons', $default );

			if ( ! empty( $parallax_one_social_icons ) ) {
				$parallax_one_social_icons_decoded = json_decode( $parallax_one_social_icons );
				if ( ! empty( $parallax_one_social_icons_decoded ) ) {
				?>
					<ul class="social-icons">
						<?php
						foreach ( $parallax_one_social_icons_decoded as $parallax_one_social_icon ) {

							$link = ! empty( $parallax_one_social_icon->link ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_social_icon->link, 'Footer socials' ) : '';
							$icon = ! empty( $parallax_one_social_icon->icon_value ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_social_icon->icon_value, 'Footer socials' ) : '';

							if ( ! empty( $icon ) ) {
							?>
								<li>
									<?php
									if ( ! empty( $link ) ) {
									?>
											<a target="_blank" href="<?php echo esc_url( $link ); ?>">
												<span class="fa parallax-one-footer-icons <?php echo esc_attr( $icon ); ?> transparent-text-dark"></span>
											</a>
									<?php
									} else {
									?>
											<span class="parallax-one-footer-icons <?php echo esc_attr( $icon ); ?> transparent-text-dark"></span>
									<?php
									}
									?>
								</li>
							<?php
							}
						}// End foreach().
	?>
					</ul>
				<?php
				}// End if().
			}// End if().
	?>
		</div><!-- .footer-bottom-wrap -->
		<?php echo apply_filters( 'parallax_one_plus_footer_text_filter', '<div class="powered-by"><a href="https://themeisle.com/themes/parallax-one/" target="_blank" rel="nofollow">Parallax One </a>' . esc_html__( 'powered by ', 'parallax-one' ) . '<a class="" href="http://wordpress.org/" target="_blank" rel="nofollow">' . esc_html__( 'WordPress', 'parallax-one' ) . '</a></div>' ); ?>
	</div><!-- container -->
</footer>

</div>
</div>

<?php parallax_hook_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
