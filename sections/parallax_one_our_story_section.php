<!-- =========================
 SECTION: BRIEF LEFT
============================== -->
<?php
	global $wp_customize;
	
	$parallax_one_our_story_show = get_theme_mod('parallax_one_our_story_show');
	if( isset($parallax_one_our_story_show) && $parallax_one_our_story_show != 1 ){
		echo ' <section class="brief white-bg-border text-left brief-design-one brief-left" id="section2">';
	} elseif ( isset( $wp_customize )   ) {
		echo ' <section class="brief white-bg-border text-left brief-design-one brief-left paralax_one_only_customizer" id="section2">';
	}
	
	if( ( isset($parallax_one_our_story_show) && $parallax_one_our_story_show != 1 ) || isset( $wp_customize ) ){
		
?>
	<div class="container">
		<div class="row">
			
			<!-- BRIEF IMAGE -->
			<?php
				$paralax_one_our_story_image = get_theme_mod('paralax_one_our_story_image', get_stylesheet_directory_uri().'/images/about-us.png');
				
				if( !empty($paralax_one_our_story_image) ){
					echo '<div class="col-md-6 brief-content-two"><div class="brief-image-right"><img src="'.$paralax_one_our_story_image.'" alt=""></div></div>';
				} elseif ( isset( $wp_customize )   ) {
					echo '<div class="col-md-6 brief-content-two paralax_one_only_customizer"><img src="" alt=""><div class="brief-image-right"></div></div>';
				}
			?>

			<!-- BRIEF HEADING -->
			<div class="col-md-6 content-section brief-content-one">
			
				<?php
						$parallax_one_our_story_title = get_theme_mod('parallax_one_our_story_title','Our Services');
						
						if( !empty($parallax_one_our_story_title) ){
							echo '<h2 class="text-left dark-text">'.$parallax_one_our_story_title.'</h2><div class="colored-line-left"></div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<h2 class="text-left dark-text paralax_one_only_customizer"></h2><div class="colored-line-left paralax_one_only_customizer"></div>';
						}
					
					?>
					
					<?php
						$parallax_one_our_story_content = get_theme_mod('parallax_one_our_story_content','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

						if( !empty($parallax_one_our_story_content) ){
							echo '<p class="text-left">'.$parallax_one_our_story_content.'</p>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<p class=" text-left paralax_one_only_customizer"></p>';
						}
					?>
			
				<!-- FEATURE LIST -->
				<!--div class="row brief-content">
					<div class="col-md-6 col-sm-6">
						<ul class="feature-list text-left">
							<li>We care your businnes</li>
							<li>Skilled professionals</li>
							<li>Lorem ipsum dolor</li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6">
						<ul class="feature-list text-left">
							<li>Startup ipsum does</li>
							<li>Flexible schedule</li>
							<li>Certified company</li>
						</ul>
					</div>
				</div--><!-- .brief-content -->
			</div><!-- .brief-content-one-->
			
		</div>
	</div>
</section><!-- .brief-design-one -->
<?php
	}
?>