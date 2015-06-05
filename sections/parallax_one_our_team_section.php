    <!-- =========================
     SECTION: TEAM   
    ============================== -->
	<?php
		global $wp_customize;
		
		$parallax_one_our_team_show = get_theme_mod('parallax_one_our_team_show');
		if( isset($parallax_one_our_team_show) && $parallax_one_our_team_show != 1 ){
			echo '<section class="team white-bg" id="team">';
		} elseif ( isset( $wp_customize )   ) {
			echo '<section class="team white-bg paralax_one_only_customizer" id="team">';
		}
		
		if( ( isset($parallax_one_our_team_show) && $parallax_one_our_team_show != 1 ) || isset( $wp_customize ) ){
	?>
    
			<div class="container">
				
				<!-- SECTION HEADER -->
				<div class="section-header">
				<?php
					$parallax_one_our_team_title = get_theme_mod('parallax_one_our_team_title','Our Team');
					
					if( !empty($parallax_one_our_team_title) ){
						echo '<h2 class="dark-text">'.$parallax_one_our_team_title.'</h2><div class="colored-line"></div>';
					} elseif ( isset( $wp_customize )   ) {
						echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
					}
				
				?>

				<?php
					$parallax_one_our_team_subtitle = get_theme_mod('parallax_one_our_team_subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

					if( !empty($parallax_one_our_team_subtitle) ){
						echo '<div class="sub-heading">'.$parallax_one_our_team_subtitle.'</div>';
					} elseif ( isset( $wp_customize )   ) {
						echo '<div class="sub-heading paralax_one_only_customizer"></div>';
					}
				?>
				</div>
				
				 <!-- MEMBERS -->
				<div class="row team-member-wrap">
					<?php
						if( is_active_sidebar( 'parallax-one-team-sidebar' ) ){
							dynamic_sidebar( 'parallax-one-team-sidebar' );
						}
					?>
				</div><!-- .row.wow -->
			
			</div><!-- container  -->
		</section><!-- #section9 -->
		
	<?php
		}
	?>