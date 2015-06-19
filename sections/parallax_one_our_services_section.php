<!-- =========================
 SECTION: SERVICES
============================== -->
<?php
	global $wp_customize;
	
	$parallax_one_our_services_show = get_theme_mod('parallax_one_our_services_show');
	if( isset($parallax_one_our_services_show) && $parallax_one_our_services_show != 1 ){
		echo '<section class="services grey-bg" id="services">';
	} elseif ( isset( $wp_customize )   ) {
		echo '<section class="services grey-bg paralax_one_only_customizer" id="services">';
	}
	
	if( ( isset($parallax_one_our_services_show) && $parallax_one_our_services_show != 1 ) || isset( $wp_customize ) ){
?>
			<div class="container">
				
				<!-- SECTION HEADER -->
				<div class="section-header">
					<?php
						$parallax_one_our_services_title = get_theme_mod('parallax_one_our_services_title','Our Services');
						
						if( !empty($parallax_one_our_services_title) ){
							echo '<h2 class="dark-text">'.esc_attr($parallax_one_our_services_title).'</h2><div class="colored-line"></div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
						}
					
					?>
					
					<?php
						$parallax_one_our_services_subtitle = get_theme_mod('parallax_one_our_services_subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

						if( !empty($parallax_one_our_services_subtitle) ){
							echo '<div class="sub-heading">'.esc_attr($parallax_one_our_services_subtitle).'</div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<div class="sub-heading paralax_one_only_customizer"></div>';
						}
					?>
				</div>
				
				
                <?php
                    if( is_active_sidebar( 'parallax-one-services-sidebar' ) ){
                        echo '<div class="row services-wrap">';
                        dynamic_sidebar( 'parallax-one-services-sidebar' );
                        echo '</div>';
                    }
                ?>
				
			</div>
		</section>
<?php
	}
?>