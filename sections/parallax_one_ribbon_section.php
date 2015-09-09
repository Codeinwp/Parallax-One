<!-- =========================
 SECTION: RIBBON   
============================== -->
<?php

	$ribbon_background = get_theme_mod('paralax_one_ribbon_background', parallax_get_file('/images/background-images/parallax-img/parallax-img1.jpg'));
	$parallax_one_ribbon_title = get_theme_mod('parallax_one_ribbon_title','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
	$parallax_one_button_text = get_theme_mod('parallax_one_button_text','GET STARTED');
	$parallax_one_button_link = get_theme_mod('parallax_one_button_link','#');

	if(!empty($parallax_one_ribbon_title) || !empty($parallax_one_button_text)){
		
		if(!empty($ribbon_background)){
			echo '<section class="call-to-action ribbon-wrap" id="ribbon" style="background-image:url('.$ribbon_background.');" role="region" aria-label="'.esc_html__('Ribbon','parallax-one').'">';
		} else {
			echo '<section class="call-to-action ribbon-wrap" id="ribbon" role="region" aria-label="'.esc_html__('Ribbon','parallax-one').'">';
		}
	
	
?>
		<div class="section-overlay-layer">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">

						<?php
							if( !empty($parallax_one_ribbon_title) ){
								echo '<h2 class="white-text strong">'.esc_attr($parallax_one_ribbon_title).'</h2>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<h2 class="white-text strong paralax_one_only_customizer"></h2>';
							}

							if( !empty($parallax_one_button_text) ){
								if( empty($parallax_one_button_link) ){
									echo '<button class="btn btn-primary standard-button paralax_one_only_customizer" type="button" data-toggle="modal" data-target="#stamp-modal"><span class="screen-reader-text">'.esc_html__('Ribbon button label:','parallax-one').$parallax_one_button_text.'</span>'.$parallax_one_button_text.'</button>';
								} else {
									echo '<button onclick="window.location=\''.esc_url($parallax_one_button_link).'\'" class="btn btn-primary standard-button" type="button" data-toggle="modal" data-target="#stamp-modal"><span class="screen-reader-text">'.esc_html__('Ribbon button label:','parallax-one').$parallax_one_button_text.'</span>'.esc_attr($parallax_one_button_text).'</button>';
								}
							} elseif ( isset( $wp_customize )   ) {
								echo '<button class="btn btn-primary standard-button paralax_one_only_customizer" type="button" data-toggle="modal" data-target="#stamp-modal"></button>';
							}
						?>

					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php
	}
?>