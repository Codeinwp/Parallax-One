<!-- =========================
 SECTION: CUSTOMERS
============================== -->
<?php
global $wp_customize;
$parallax_one_happy_customers_title = get_theme_mod('parallax_one_happy_customers_title',esc_html__('Happy Customers','parallax-one'));
$parallax_one_happy_customers_subtitle = get_theme_mod('parallax_one_happy_customers_subtitle',esc_html__('Cloud computing subscription model out of the box proactive solution.','parallax-one'));
$parallax_one_testimonials_content = get_theme_mod('parallax_one_testimonials_content',
json_encode( array(
	array('image_url' => parallax_get_file('/images/clients/1.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
	array('image_url' => parallax_get_file('/images/clients/2.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
	array('image_url' => parallax_get_file('/images/clients/3.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one'))
) ) );
$happy_customers_wrap_piterest = get_theme_mod('paralax_one_testimonials_pinterest_style','5');


if( !empty($parallax_one_happy_customers_title) || !empty($parallax_one_happy_customers_subtitle) || !parallax_one_general_repeater_is_empty($parallax_one_testimonials_content) ){ ?>
	<?php parallax_hook_tetimonials_before(); ?>
	<section class="testimonials" id="customers" role="region" aria-label="<?php esc_html_e('Testimonials','parallax-one') ?>">
		<?php parallax_hook_tetimonials_top(); ?>
		<div class="section-overlay-layer">
			<div class="container">
				<?php
				if(!empty($parallax_one_happy_customers_title) || !empty($parallax_one_happy_customers_subtitle)){ ?>
					<div class="section-header">
						<?php
						if( !empty($parallax_one_happy_customers_title) ){ ?>
							<h2 class="dark-text"><?php echo esc_attr($parallax_one_happy_customers_title); ?></h2><div class="colored-line"></div>
						<?php
						} elseif ( isset( $wp_customize ) ){ ?>
							<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
						<?php
						}

						if( !empty( $parallax_one_happy_customers_subtitle ) ){ ?>
							<div class="sub-heading"><?php echo esc_attr( $parallax_one_happy_customers_subtitle ); ?></div>
						<?php
						} elseif ( isset( $wp_customize ) ) { ?>
							<div class="sub-heading paralax_one_only_customizer"></div>
						<?php
						} ?>
					</div>
				<?php
				}

				if(!empty($parallax_one_testimonials_content)) { ?>
					<div id="happy_customers_wrap" class="testimonials-wrap <?php if( !empty($happy_customers_wrap_piterest) ) { echo 'happy_customers_wrap_piterest'; } else { echo ''; } ?>">
						<?php
						$parallax_one_testimonials_content_decoded = json_decode($parallax_one_testimonials_content);
						foreach($parallax_one_testimonials_content_decoded as $parallax_one_testimonial){
							if( !empty($parallax_one_testimonial->image_url) || !empty($parallax_one_testimonial->title) || !empty($parallax_one_testimonial->subtitle) || !empty($parallax_one_testimonial->text) ){
								parallax_hook_testimonials_entry_before(); ?>
								<div class="testimonials-box">
									<?php parallax_hook_testimonials_entry_top(); ?>
									<div class="feedback border-bottom-hover">
										<div class="pic-container">
											<div class="pic-container-inner">
												<?php
												if( !empty($parallax_one_testimonial->image_url) ){
													if(!empty($parallax_one_testimonial->title)){ 
														if( function_exists('icl_t') ){
															$parallax_one_testimonial_image = icl_t( 'Testimonial '.$parallax_one_testimonial->id, 'Testimonial image',$parallax_one_testimonial->image_url); 
															$parallax_one_testimonial_title = icl_t( 'Testimonial '.$parallax_one_testimonial->id, 'Testimomial title', $parallax_one_testimonial->title); ?>
															<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_testimonial_image ) ); ?>" alt="<?php echo esc_attr( $parallax_one_testimonial_title ); ?>">
													<?php
														} else { ?>
															<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_testimonial->image_url ) ); ?>" alt="<?php echo esc_attr( $$parallax_one_testimonial->title ); ?>">
														<?php
														}
													} else { 
														if( function_exists('icl_t') ){
															$parallax_one_testimonial_image = icl_t( 'Testimonial '.$parallax_one_testimonial->id, 'Testimonial image',$parallax_one_testimonial->image_url);  ?>
															<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_testimonial_image ) ); ?>" alt="<?php esc_html_e( 'Avatar','parallax-one' ); ?>">
														<?php
														} else { ?>
															<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_testimonial->image_url ) ); ?>" alt="<?php esc_html_e( 'Avatar','parallax-one' ); ?>">
														<?php
														}
													}
												} else {
													$default_image = parallax_get_file('/images/clients/client-no-image.jpg');
													echo '<img src="'.parallax_one_make_protocol_relative_url(esc_url($default_image)).'" alt="'.esc_html('Avatar','parallax-one').'">';
												} ?>
											</div>
										</div>
									
										<?php
										if(!empty($parallax_one_testimonial->title) || !empty($parallax_one_testimonial->subtitle) || !empty($parallax_one_testimonial->text)) { ?>
										
											<div class="feedback-text-wrap">
												<?php
												if(!empty($parallax_one_testimonial->title)){ ?>
													<h5 class="colored-text">
														<?php
														if( function_exists( 'icl_t' ) ){
																$parallax_one_testimonial_title = icl_t( 'Testimonial '.$parallax_one_testimonial->id, 'Testimomial title', $parallax_one_testimonial->title);
																echo $parallax_one_testimonial_title;
															} else {
																echo esc_attr($parallax_one_testimonial->title);
															}?>
													</h5>
												<?php
												}

												if(!empty($parallax_one_testimonial->subtitle)){ ?>
													<div class="small-text">
														<?php
														if(function_exists('icl_t')){
															$parallax_one_testimonial_subtitle = icl_t( 'Testimonial '.$parallax_one_testimonial->id, 'Testimomial subtitle', $parallax_one_testimonial->subtitle);
															echo $parallax_one_testimonial_subtitle;
														} else {
															echo esc_attr($parallax_one_testimonial->subtitle);
														} ?>
													</div>
												<?php
												}

												if(!empty($parallax_one_testimonial->text)){ ?>
													<p>
														<?php
														if(function_exists('icl_t')){
															$parallax_one_testimonial_text = icl_t( 'Testimonial '.$parallax_one_testimonial->id, 'Testimomial text', $parallax_one_testimonial->text);
															echo $parallax_one_testimonial_text;
														} else {
															echo html_entity_decode($parallax_one_testimonial->text);
														} ?>
													</p>
												<?php
												} ?>
											</div>
										<?php
										} ?>
									</div>
									<?php parallax_hook_testimonials_entry_bottom(); ?>
								</div><!-- .testimonials-box -->
								<?php parallax_hook_testimonials_entry_after(); ?>
							<?php
							}
						} ?>
					</div>
				<?php	
				} ?>
			</div>
		</div>
		<?php parallax_hook_tetimonials_bottom(); ?>
	</section><!-- customers -->
	<?php parallax_hook_tetimonials_after(); ?>
<?php
} else {
	if( isset( $wp_customize ) ) { ?>
		<?php parallax_hook_tetimonials_before(); ?>
		<section class="testimonials paralax_one_only_customizer" id="customers" role="region" aria-label="<?php esc_html_e('Testimonials','parallax-one') ?>">
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
}