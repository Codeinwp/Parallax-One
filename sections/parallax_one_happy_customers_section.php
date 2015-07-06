<!-- =========================
 SECTION: CUSTOMERS   
============================== -->
<?php
	global $wp_customize;
	
	$parallax_one_happy_customers_show = get_theme_mod('parallax_one_happy_customers_show');
	if( isset($parallax_one_happy_customers_show) && $parallax_one_happy_customers_show != 1 ){
		echo '<section class="testimonials" id="customers">';
	} elseif ( isset( $wp_customize )   ) {
		echo '<section class="testimonials paralax_one_only_customizer" id="customers">';
	}
	
	if( ( isset($parallax_one_happy_customers_show) && $parallax_one_happy_customers_show != 1 ) || isset( $wp_customize ) ){
?>

		<div class="section-overlay-layer">
			<div class="container">

				<!-- SECTION HEADER -->
				<div class="section-header">
					<?php
						
						
						$parallax_one_happy_customers_title = get_theme_mod('parallax_one_happy_customers_title','Happy Customers');
						
						if( !empty($parallax_one_happy_customers_title) ){
							echo '<h2 class="dark-text">'.esc_attr($parallax_one_happy_customers_title).'</h2><div class="colored-line"></div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
						}
					?>

					<?php
						$parallax_one_happy_customers_subtitle = get_theme_mod('parallax_one_happy_customers_subtitle','Cloud computing subscription model out of the box proactive solution.');

						if( !empty($parallax_one_happy_customers_subtitle) ){
							echo '<div class="sub-heading">'.esc_attr($parallax_one_happy_customers_subtitle).'</div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<div class="sub-heading paralax_one_only_customizer"></div>';
						}
					?>
					
				</div>

				<div class="row no-gutters testimonials-wrap">
				<?php 
					$parallax_one_testimonials_content = get_theme_mod('parallax_one_testimonials_content',
						json_encode(
							array(
									array('image_url' => get_template_directory_uri().'/images/clients/1.jpg','title' => __('Happy Customer','parallax-one'),'subtitle' => __('Lorem ipsum','parallax-one'),'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
									array('image_url' => get_template_directory_uri().'/images/clients/2.jpg','title' => __('Happy Customer','parallax-one'),'subtitle' => __('Lorem ipsum','parallax-one'),'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one')),
									array('image_url' => get_template_directory_uri().'/images/clients/3.jpg','title' => __('Happy Customer','parallax-one'),'subtitle' => __('Lorem ipsum','parallax-one'),'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','parallax-one'))
							)
						)
					);
					if(!empty($parallax_one_testimonials_content)) {
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
														echo '<img src="'.esc_url($parallax_one_testimonial->image_url).'" alt="">';
													} else {
														$default_image = get_template_directory_uri().'/images/clients/client-no-image.jpg';
														echo '<img src="'.esc_url($default_image).'" alt="">';	
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
													<h5 class="colored-text"><?php echo esc_attr($parallax_one_testimonial->title); ?></h5>
											<?php
												}

												if(!empty($parallax_one_testimonial->subtitle)){
											?>
													<div class="small-text">
														<?php 
																echo esc_attr($parallax_one_testimonial->subtitle);
														?>	
													</div>
											<?php
												}

												if(!empty($parallax_one_testimonial->text)){
											?>
													<p>
														<?php echo esc_attr($parallax_one_testimonial->text); ?>
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
				}
					?>
				</div>
			</div>
		</div>
	</section><!-- customers -->
<?php
	}