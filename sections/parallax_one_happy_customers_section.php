<!-- =========================
 SECTION: CUSTOMERS   
============================== -->
<?php
	$parallax_one_happy_customers_title = get_theme_mod('parallax_one_happy_customers_title','Happy Customers');
	$parallax_one_happy_customers_subtitle = get_theme_mod('parallax_one_happy_customers_subtitle','Cloud computing subscription model out of the box proactive solution.');
	$parallax_one_testimonials_content = get_theme_mod('parallax_one_testimonials_content',
		json_encode(
			array(
					array('image_url' => parallax_get_file('/images/clients/1.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
					array('image_url' => parallax_get_file('/images/clients/2.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
					array('image_url' => parallax_get_file('/images/clients/3.jpg'),'title' => esc_html__('Happy Customer','parallax-one'),'subtitle' => esc_html__('Lorem ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one'))
			)
		)
	);

	if( !empty($parallax_one_happy_customers_title) || !empty($parallax_one_happy_customers_subtitle) || !empty($parallax_one_testimonials_content) ){
?>
	<section class="testimonials" id="customers" role="region" aria-label="<?php esc_html_e('Testimonials','parallax-one') ?>">
		<div class="section-overlay-layer">
			<div class="container">

				<!-- SECTION HEADER -->
				<?php
				if(!empty($parallax_one_happy_customers_title) || !empty($parallax_one_happy_customers_subtitle)){
				?>
					<div class="section-header">
						<?php
							if( !empty($parallax_one_happy_customers_title) ){
								echo '<h2 class="dark-text">'.esc_attr($parallax_one_happy_customers_title).'</h2><div class="colored-line"></div>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
							}

							if( !empty($parallax_one_happy_customers_subtitle) ){
								echo '<div class="sub-heading">'.esc_attr($parallax_one_happy_customers_subtitle).'</div>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<div class="sub-heading paralax_one_only_customizer"></div>';
							}
						?>
					</div>
				<?php
				}


				if(!empty($parallax_one_testimonials_content)) {
					echo '<div id="happy_customers_wrap" class="testimonials-wrap">';
					$parallax_one_testimonials_content_decoded = json_decode($parallax_one_testimonials_content);
					foreach($parallax_one_testimonials_content_decoded as $parallax_one_testimonial){
						if( !empty($parallax_one_testimonial->image_url) || !empty($parallax_one_testimonial->title) || !empty($parallax_one_testimonial->subtitle) || !empty($parallax_one_testimonial->text) ){
			?>
							<!-- SINGLE FEEDBACK -->
							<div class="testimonials-box">
								<div class="feedback border-bottom-hover">
									<div class="pic-container">
										<div class="pic-container-inner">
											<?php

												if( !empty($parallax_one_testimonial->image_url) ){
													if(!empty($parallax_one_testimonial->title)){
														echo '<img src="'.esc_url($parallax_one_testimonial->image_url).'" alt="'.$parallax_one_testimonial->title.'">';
													} else {
														echo '<img src="'.esc_url($parallax_one_testimonial->image_url).'" alt="'.esc_html('Avatar','parallax-one').'">';
													}
												} else {
													$default_image = parallax_get_file('/images/clients/client-no-image.jpg');
													echo '<img src="'.esc_url($default_image).'" alt="'.esc_html('Avatar','parallax-one').'">';	
												}	
											?>
										</div>
									</div>
									<?php
									if(!empty($parallax_one_testimonial->title) || !empty($parallax_one_testimonial->subtitle) || !empty($parallax_one_testimonial->text)) {
									?>
										<div class="feedback-text-wrap">
										<?php
											if(!empty($parallax_one_testimonial->title)){
										?>
												<h5 class="colored-text">
													<?php
														if(function_exists('icl_translate')){
															echo icl_translate('Testimonials',$parallax_one_testimonial->id.'_testimonials_title',esc_attr($parallax_one_testimonial->title));
														} else {
															echo esc_attr($parallax_one_testimonial->title);
														}
													?>
												</h5>
										<?php
											}

											if(!empty($parallax_one_testimonial->subtitle)){
										?>
												<div class="small-text">
													<?php 
														if(function_exists('icl_translate')){
															echo icl_translate('Testimonials',$parallax_one_testimonial->id.'_testimonials_subtitle',esc_attr($parallax_one_testimonial->subtitle));
														} else {
															echo esc_attr($parallax_one_testimonial->subtitle);
														}
													?>	
												</div>
										<?php
											}

											if(!empty($parallax_one_testimonial->text)){
										?>
												<p>
													<?php 
														if(function_exists('icl_translate')){
															echo icl_translate('Testimonials',$parallax_one_testimonial->id.'_testimonials_text',esc_attr($parallax_one_testimonial->text));
														} else {
															echo esc_attr($parallax_one_testimonial->text); 
														}
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
							</div><!-- .testimonials-box -->
				<?php
					}
				}
				echo '</div>';
			}
				?>
			</div>
		</div>
	</section><!-- customers -->
<?php
	}