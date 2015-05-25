<!-- =========================
 SECTION: RIBBON   
============================== -->
<?php
	global $wp_customize;
	
	$parallax_one_ribbon_show = get_theme_mod('parallax_one_ribbon_show');
	if( isset($parallax_one_ribbon_show) && $parallax_one_ribbon_show != 1 ){
		echo '<section class="call-to-action ribbon-wrap" id="section11">';
	} elseif ( isset( $wp_customize )   ) {
		echo '<section class="call-to-action ribbon-wrap paralax_one_only_customizer" id="section11">';
	}
	
	if( ( isset($parallax_one_ribbon_show) && $parallax_one_ribbon_show != 1 ) || isset( $wp_customize ) ){
?>


		<div class="overlay-layer-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
					
						<?php
							$parallax_one_ribbon_title = get_theme_mod('parallax_one_ribbon_title','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
							
							if( !empty($parallax_one_ribbon_title) ){
								echo '<h2 class="white-text strong">'.esc_attr($parallax_one_ribbon_title).'</h2>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<h2 class="white-text strong paralax_one_only_customizer"></h2>';
							}
						
						?>
						
						<?php
							$parallax_one_button_text = get_theme_mod('parallax_one_button_text','GET STARTED');
							$parallax_one_button_link = get_theme_mod('parallax_one_button_link','#');
							if( !empty($parallax_one_button_text) ){
								if( empty($parallax_one_button_link) ){
									echo '<button onclick="" class="btn btn-primary standard-button paralax_one_only_customizer" type="button" data-toggle="modal" data-target="#stamp-modal">'.esc_attr($parallax_one_button_text).'</button>';
								} else {
									echo '<button onclick="window.location=\''.esc_url($parallax_one_button_link).'\'" class="btn btn-primary standard-button" type="button" data-toggle="modal" data-target="#stamp-modal">'.esc_attr($parallax_one_button_text).'</button>';
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