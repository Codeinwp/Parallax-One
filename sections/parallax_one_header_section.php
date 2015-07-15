<!-- CONTAINER -->
<?php
	$paralax_one_header_logo = get_theme_mod('paralax_one_header_logo', parallax_get_file('/images/logo-2.png'));
	$parallax_one_header_title = get_theme_mod('parallax_one_header_title','Simple, Reliable and Awesome.');
	$parallax_one_header_subtitle = get_theme_mod('parallax_one_header_subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
	$parallax_one_header_button_text = get_theme_mod('parallax_one_header_button_text','GET STARTED');
	$parallax_one_header_button_link = get_theme_mod('parallax_one_header_button_link','#');
	if(!empty($paralax_one_header_logo) || !empty($parallax_one_header_title) || !empty($parallax_one_header_subtitle) || !empty($parallax_one_header_button_text)){
?>
		<div class="container overlay-layer" id="parallax_header">
			<!-- ONLY LOGO ON HEADER -->
			<?php


				if( !empty($paralax_one_header_logo) ){
					echo '<div class="only-logo"><div class="navbar"><div class="navbar-header"><img src="'.esc_url($paralax_one_header_logo).'"   alt=""></div></div></div>';
				} elseif ( isset( $wp_customize )   ) {
					echo '<div class="only-logo"><div class="navbar"><div class="navbar-header"><img src="" alt=""></div></div></div>';
				}
			?>
			<!-- /END ONLY LOGO ON HEADER -->

			<div class="row">
				<div class="col-md-12">

					<!-- HEADING AND BUTTONS -->
					<?php 
					if(!empty($paralax_one_header_logo) || !empty($parallax_one_header_title) || !empty($parallax_one_header_subtitle) || !empty($parallax_one_header_button_text)){?>
						<div class="intro-section">

							<!-- WELCOM MESSAGE -->
							<?php
								if( !empty($parallax_one_header_title) ){
									echo '<h1 class="intro white-text">'.esc_attr($parallax_one_header_title).'</h1>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h1 class="intro white-text paralax_one_only_customizer"></h1>';
								}
							?>


							<?php
								if( !empty($parallax_one_header_subtitle) ){
									echo '<h5 class="white-text">'.esc_attr($parallax_one_header_subtitle).'</h5>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h5 class="white-text paralax_one_only_customizer"></h5>';
								}
							?>

							<!-- BUTTON -->
							<?php
								if( !empty($parallax_one_header_button_text) ){
									if( empty($parallax_one_header_button_link) ){
										echo '<div class="button"><a href="" class="btn btn-primary standard-button inpage-scroll">'.esc_attr($parallax_one_header_button_text).'</a></div>';
									} else {
										echo '<div class="button"><a href="'.esc_url($parallax_one_header_button_link).'" class="btn btn-primary standard-button inpage-scroll">'.$parallax_one_header_button_text.'</a></div>';
									}
								} elseif ( isset( $wp_customize )   ) {
									echo '<div class="button"><a href="" class="btn btn-primary standard-button inpage-scroll paralax_one_only_customizer"></a></div>';
								}
							?>
							<!-- /END BUTTON -->

						</div>
						<!-- /END HEADNING AND BUTTONS -->
					<?php
					}
					?>
				</div>
			</div>
		</div>
<?php
	}
?>
