<!-- CONTAINER -->
<?php
	$paralax_one_header_logo = get_theme_mod('paralax_one_header_logo', parallax_get_file('/images/logo-2.png'));
	$parallax_one_header_title = get_theme_mod('parallax_one_header_title','Simple, Reliable and Awesome.');
	$parallax_one_header_subtitle = get_theme_mod('parallax_one_header_subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
	$parallax_one_header_button_text = get_theme_mod('parallax_one_header_button_text','GET STARTED');
	$parallax_one_header_button_link = get_theme_mod('parallax_one_header_button_link','#');
	if(!empty($paralax_one_header_logo) || !empty($parallax_one_header_title) || !empty($parallax_one_header_subtitle) || !empty($parallax_one_header_button_text)){
?>


<div class="header-layer-one" id="header_layer_one">
	<div class="header-layer-two" id="header_layer_two">

		<div class="overlay-layer-wrap">
			<div class="container overlay-layer" id="parallax_header">

			<!-- ONLY LOGO ON HEADER -->
			<?php
				if( !empty($paralax_one_header_logo) ){
					echo '<div class="only-logo"><div id="only-logo-inner" class="navbar"><div id="parallax_only_logo" class="navbar-header"><img src="'.esc_url($paralax_one_header_logo).'"   alt=""></div></div></div>';
				} elseif ( isset( $wp_customize )   ) {
					echo '<div class="only-logo"><div id="only-logo-inner" class="navbar"><div id="parallax_only_logo" class="navbar-header"><img src="" alt=""></div></div></div>';
				}
			?>
			<!-- /END ONLY LOGO ON HEADER -->

			<div class="row">
				<div class="col-md-12 intro-section-text-wrap">

					<!-- HEADING AND BUTTONS -->
					<?php 
					if(!empty($paralax_one_header_logo) || !empty($parallax_one_header_title) || !empty($parallax_one_header_subtitle) || !empty($parallax_one_header_button_text)){?>
						<div id="intro-section" class="intro-section">

							<!-- WELCOM MESSAGE -->
							<?php
								if( !empty($parallax_one_header_title) ){
									echo '<h1 id="intro_section_text_1" class="intro white-text">'.esc_attr($parallax_one_header_title).'</h1>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h1 id="intro_section_text_1" class="intro white-text paralax_one_only_customizer"></h1>';
								}
							?>


							<?php
								if( !empty($parallax_one_header_subtitle) ){
									echo '<h5 id="intro_section_text_2" class="white-text">'.esc_attr($parallax_one_header_subtitle).'</h5>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h5 id="intro_section_text_2" class="white-text paralax_one_only_customizer"></h5>';
								}
							?>

							<!-- BUTTON -->
							<?php
								if( !empty($parallax_one_header_button_text) ){
									if( empty($parallax_one_header_button_link) ){
										echo '<div id="intro_section_text_3" class="button"><div id="inpage_scroll_btn"><a href="" class="btn btn-primary standard-button inpage-scroll">'.esc_attr($parallax_one_header_button_text).'</a></div></div>';
									} else {
										echo '<div id="intro_section_text_3" class="button"><div id="inpage_scroll_btn"><a href="'.esc_url($parallax_one_header_button_link).'" class="btn btn-primary standard-button inpage-scroll">'.$parallax_one_header_button_text.'</a></div></div>';
									}
								} elseif ( isset( $wp_customize )   ) {
									echo '<div id="intro_section_text_3" class="button"><div id="inpage_scroll_btn"><a href="" class="btn btn-primary standard-button inpage-scroll paralax_one_only_customizer"></a></div></div>';
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
		</div>

	</div><!-- #header_layer_two -->
</div><!-- #header_layer_one -->

<?php
	}
?>
