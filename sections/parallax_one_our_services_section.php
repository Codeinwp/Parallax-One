<?php
/**
 * SECTION: SERVICES
 *
 * @package parallax-one
 */

$parallax_one_our_services_title = get_theme_mod( 'parallax_one_our_services_title', esc_html__( 'Our Services', 'parallax-one' ) );
$parallax_one_our_services_title = apply_filters( 'parallax_one_translate_single_string', $parallax_one_our_services_title, 'Our Services Section' );

$parallax_one_our_services_subtitle = get_theme_mod( 'parallax_one_our_services_subtitle', esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'parallax-one' ) );
$parallax_one_our_services_subtitle = apply_filters( 'parallax_one_translate_single_string', $parallax_one_our_services_subtitle, 'Our Services Section' );

$default                           = parallax_one_services_get_default_content();
$parallax_one_services             = get_theme_mod( 'parallax_one_services_content', $default );
$parallax_one_services_pinterest   = get_theme_mod( 'paralax_one_services_pinterest_style', '5' );
$parallax_one_frontpage_animations = get_theme_mod( 'parallax_one_enable_animations', false );

if ( ! empty( $parallax_one_our_services_title ) || ! empty( $parallax_one_our_services_subtitle ) || ! parallax_one_general_repeater_is_empty( $parallax_one_services ) ) {
	parallax_hook_services_before(); ?>

	<section class="services" id="services" role="region" aria-label="<?php esc_attr_e( 'Services', 'parallax-one' ); ?>">
		<?php
		parallax_hook_services_top();
		?>
		<div class="section-overlay-layer">
			<div class="container">
				<div class="section-header">
					<?php
					if ( ! empty( $parallax_one_our_services_title ) ) {
					?>
						<h2 class="dark-text"><?php echo wp_kses_post( $parallax_one_our_services_title ); ?></h2>
						<div class="colored-line"></div>
						<?php
					} elseif ( is_customize_preview() ) {
					?>
						<h2 class="dark-text paralax_one_only_customizer"></h2>
						<div class="colored-line paralax_one_only_customizer"></div>
						<?php
					}

					if ( ! empty( $parallax_one_our_services_subtitle ) ) {
					?>
						<div class="sub-heading"><?php echo wp_kses_post( $parallax_one_our_services_subtitle ); ?></div>
						<?php
					} elseif ( is_customize_preview() ) {
					?>
						<div class="sub-heading paralax_one_only_customizer"></div>
						<?php
					}
					?>
				</div>

				<?php
				if ( ! empty( $parallax_one_services ) ) {
					$parallax_one_services_decoded = json_decode( $parallax_one_services );
					?>
					<div id="our_services_wrap" class="services-wrap 
					<?php
					if ( ! empty( $parallax_one_services_pinterest ) ) {
						echo 'our_services_wrap_piterest';
					}
?>
">
						<?php
						foreach ( $parallax_one_services_decoded as $parallax_one_service_box ) {
							$choice           = ! empty( $parallax_one_service_box->choice ) ? $parallax_one_service_box->choice : '';
							$icon             = ! empty( $parallax_one_service_box->icon_value ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_service_box->icon_value, 'Services section' ) : '';
							$image            = ! empty( $parallax_one_service_box->image_url ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_service_box->image_url, 'Services section' ) : '';
							$title            = ! empty( $parallax_one_service_box->title ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_service_box->title, 'Services section' ) : '';
							$text             = ! empty( $parallax_one_service_box->text ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_service_box->text, 'Services section' ) : '';
							$link             = ! empty( $parallax_one_service_box->link ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_service_box->link, 'Services section' ) : '';
							$section_is_empty = ( empty( $icon ) || $icon === 'No Icon' && $choice === 'parallax_icon' ) && ( empty( $image ) && $choice === 'parallax_image' ) && empty( $title ) && empty( $text );

							if ( ! $section_is_empty ) {
							?>
								<div class="service-box"
									<?php
									if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
										echo 'data-scrollreveal="enter left after 0.15s over 1s"';
									}
?>
>
									<?php
									parallax_hook_services_entry_before();
									?>
									<div class="single-service border-bottom-hover">
										<?php
										parallax_hook_services_entry_top();
										if ( ! empty( $choice ) && $choice !== 'parallax_none' ) {

											if ( $choice === 'parallax_icon' ) {
												if ( ! empty( $icon ) ) {
													if ( ! empty( $link ) ) {
													?>
														<div class="service-icon colored-text">
															<a href="<?php echo esc_url( $link ); ?>">
																<span class="fa <?php echo esc_attr( $icon ); ?>"></span>
															</a>
														</div>
														<?php
													} else {
													?>
														<div class="service-icon colored-text">
															<span class="fa <?php echo esc_attr( $icon ); ?>"></span>
														</div>
														<?php
													}
												}
											}

											if ( $choice === 'parallax_image' ) {
												if ( ! empty( $image ) ) {
													if ( ! empty( $link ) ) {
													?>
														<a href="<?php echo parallax_one_make_protocol_relative_url( esc_url( $link ) ); ?>">
															<img src="<?php echo esc_url( $image ); ?>" <?php echo( ! empty( $title ) ? 'alt="' . esc_attr( $title ) . '"' : '' ); ?> />
														</a>
														<?php
													} else {
													?>
														<img src="<?php echo esc_url( $image ); ?>" <?php echo( ! empty( $title ) ? 'alt="' . esc_attr( $title ) . '"' : '' ); ?> />
														<?php
													}
												}
											}
										}

										if ( ! empty( $title ) ) {
											if ( ! empty( $link ) ) {
											?>
												<h3 class="colored-text">
													<a href="<?php echo esc_url( $link ); ?>"><?php echo wp_kses_post( $title ); ?></a>
												</h3>
												<?php
											} else {
											?>
												<h3 class="colored-text"><?php echo wp_kses_post( $title ); ?></h3>
												<?php
											}
										}

										if ( ! empty( $text ) ) {
										?>
											<p><?php echo html_entity_decode( $text ); ?></p>
											<?php
										}
										parallax_hook_services_entry_bottom();
										?>
									</div>
									<?php
									parallax_hook_services_entry_after();
									?>
								</div>
								<?php
							} // End if().
						} // End foreach().
						?>
					</div>
					<?php
				} // End if().
				?>
			</div>
		</div>
		<?php parallax_hook_services_bottom(); ?>
	</section>
	<?php parallax_hook_services_after(); ?>
	<?php
} else {
	if ( is_customize_preview() ) {
		parallax_hook_services_before();
		?>
		<section class="services paralax_one_only_customizer" id="services" role="region" aria-label="<?php esc_html_e( 'Services', 'parallax-one' ); ?>">
			<?php parallax_hook_services_top(); ?>
			<div class="section-overlay-layer">
				<div class="container">
					<div class="section-header">
						<h2 class="dark-text paralax_one_only_customizer"></h2>
						<div class="colored-line paralax_one_only_customizer"></div>
						<div class="sub-heading paralax_one_only_customizer"></div>
					</div>
				</div>
			</div>
			<?php parallax_hook_services_bottom(); ?>
		</section>
		<?php parallax_hook_services_after();
	} // End if().
}  // End if(). ?>
