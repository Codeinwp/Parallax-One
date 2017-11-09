<?php
/**
 * SECTION: CUSTOMERS
 *
 * @package parallax-one
 */

$parallax_one_happy_customers_title = get_theme_mod( 'parallax_one_happy_customers_title', esc_html__( 'Happy Customers', 'parallax-one' ) );
$parallax_one_happy_customers_title = apply_filters( 'parallax_one_translate_single_string', $parallax_one_happy_customers_title, 'Testimonials Section' );

$parallax_one_happy_customers_subtitle = get_theme_mod( 'parallax_one_happy_customers_subtitle', esc_html__( 'Cloud computing subscription model out of the box proactive solution.', 'parallax-one' ) );
$parallax_one_happy_customers_subtitle = apply_filters( 'parallax_one_translate_single_string', $parallax_one_happy_customers_subtitle, 'Testimonials Section' );

$default                           = parallax_one_testimonials_get_default_content();
$parallax_one_testimonials_content = get_theme_mod( 'parallax_one_testimonials_content', $default );
$happy_customers_wrap_piterest     = get_theme_mod( 'paralax_one_testimonials_pinterest_style', '5' );
$parallax_one_frontpage_animations = get_theme_mod( 'parallax_one_enable_animations', false );


if ( ! empty( $parallax_one_happy_customers_title ) || ! empty( $parallax_one_happy_customers_subtitle ) || ! parallax_one_general_repeater_is_empty( $parallax_one_testimonials_content ) ) { ?>
	<?php parallax_hook_tetimonials_before(); ?>
	<section class="testimonials" id="customers" role="region" aria-label="<?php esc_html_e( 'Testimonials', 'parallax-one' ); ?>">
		<?php parallax_hook_tetimonials_top(); ?>
		<div class="section-overlay-layer">
			<div class="container">
				<?php
				if ( ! empty( $parallax_one_happy_customers_title ) || ! empty( $parallax_one_happy_customers_subtitle ) ) {
				?>
					<div class="section-header">
						<?php
						if ( ! empty( $parallax_one_happy_customers_title ) ) {
						?>
							<h2 class="dark-text"><?php echo esc_attr( $parallax_one_happy_customers_title ); ?></h2><div class="colored-line"></div>
							<?php
						} elseif ( is_customize_preview() ) {
						?>
							<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
							<?php
						}

						if ( ! empty( $parallax_one_happy_customers_subtitle ) ) {
						?>
							<div class="sub-heading"><?php echo esc_attr( $parallax_one_happy_customers_subtitle ); ?></div>
							<?php
						} elseif ( is_customize_preview() ) {
						?>
							<div class="sub-heading paralax_one_only_customizer"></div>
							<?php
						}
						?>
					</div>
				<?php
				}

				if ( ! empty( $parallax_one_testimonials_content ) ) {
				?>
					<div id="happy_customers_wrap" class="testimonials-wrap 
					<?php
					if ( ! empty( $happy_customers_wrap_piterest ) ) {
						echo 'happy_customers_wrap_piterest';
					} else {
						echo ''; }
?>
">
						<?php
						$parallax_one_testimonials_content_decoded = json_decode( $parallax_one_testimonials_content );
						foreach ( $parallax_one_testimonials_content_decoded as $parallax_one_testimonial ) {
							$image            = ! empty( $parallax_one_testimonial->image_url ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_testimonial->image_url, 'Testimonials section' ) : '';
							$title            = ! empty( $parallax_one_testimonial->title ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_testimonial->title, 'Testimonials section' ) : '';
							$subtitle         = ! empty( $parallax_one_testimonial->subtitle ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_testimonial->subtitle, 'Testimonials section' ) : '';
							$text             = ! empty( $parallax_one_testimonial->text ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_testimonial->text, 'Testimonials section' ) : '';
							$section_is_empty = empty( $image ) && empty( $title ) && empty( $subtitle ) && empty( $text );

							if ( ! $section_is_empty ) {
								parallax_hook_testimonials_entry_before();
								?>
								<div class="testimonials-box"
								<?php
								if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
									echo 'data-scrollreveal="enter right after 0.15s over 1s"'; }
									?>
									>
									<?php parallax_hook_testimonials_entry_top(); ?>
									<div class="feedback border-bottom-hover">
										<div class="pic-container">
											<div class="pic-container-inner">
												<?php
												if ( ! empty( $image ) ) {
												?>
													<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $image ) ); ?>" alt="<?php echo ( ! empty( $title ) ? esc_attr( $title ) : esc_attr( 'Avatar', 'parallax-one' ) ); ?>">
												<?php
												} else {
													$default_image = parallax_get_file( '/images/clients/client-no-image.jpg' );
													?>
													<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $default_image ) ); ?>" alt="<?php esc_attr_e( 'Avatar', 'parallax-one' ); ?>">
													<?php
												}
												?>
											</div>
										</div>
										<?php
										if ( ! empty( $title ) || ! empty( $subtitle ) || ! empty( $text ) ) {
										?>
											<div class="feedback-text-wrap">
												<?php
												if ( ! empty( $title ) ) {
												?>
													<h5 class="colored-text">
														<?php
														echo wp_kses_post( $title );
														?>
													</h5>
												<?php
												}

												if ( ! empty( $subtitle ) ) {
												?>
													<div class="small-text">
														<?php
														echo wp_kses_post( $subtitle );
														?>
													</div>
												<?php
												}

												if ( ! empty( $text ) ) {
												?>
													<p>
														<?php
														echo html_entity_decode( $text );
														?>
													</p>
												<?php
												}
												?>
											</div>
										<?php
										}
										?>
									</div>
									<?php parallax_hook_testimonials_entry_bottom(); ?>
								</div><!-- .testimonials-box -->
								<?php parallax_hook_testimonials_entry_after(); ?>
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
		<?php parallax_hook_tetimonials_bottom(); ?>
	</section><!-- customers -->
	<?php parallax_hook_tetimonials_after(); ?>
<?php
} else {
	if ( is_customize_preview() ) {
	?>
		<?php parallax_hook_tetimonials_before(); ?>
		<section class="testimonials paralax_one_only_customizer" id="customers" role="region" aria-label="<?php esc_html_e( 'Testimonials', 'parallax-one' ); ?>">
			<?php parallax_hook_tetimonials_top(); ?>
			<div class="section-overlay-layer">
				<div class="container">
					<div class="section-header">
						<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
						<div class="sub-heading paralax_one_only_customizer"></div>
					</div>
				</div>
			</div>
			<?php parallax_hook_tetimonials_bottom(); ?>
		</section><!-- customers -->
		<?php parallax_hook_tetimonials_after(); ?>
<?php
	}
} // End if().
