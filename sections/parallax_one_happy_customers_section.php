<!-- =========================
 SECTION: CUSTOMERS   
============================== -->
<?php
	global $wp_customize;
	
	$parallax_one_happy_customers_show = get_theme_mod('parallax_one_happy_customers_show');
	if( isset($parallax_one_happy_customers_show) && $parallax_one_happy_customers_show != 1 ){
		echo '<section class="testimonials white-bg" id="customers">';
	} elseif ( isset( $wp_customize )   ) {
		echo '<section class="testimonials white-bg paralax_one_only_customizer" id="customers">';
	}
	
	if( ( isset($parallax_one_happy_customers_show) && $parallax_one_happy_customers_show != 1 ) || isset( $wp_customize ) ){
?>
			<div class="container">

				<!-- SECTION HEADER -->
				<div class="section-header">
					<?php
						
						
						$parallax_one_happy_customers_title = get_theme_mod('parallax_one_happy_customers_title','Happy Customers');
						
						if( !empty($parallax_one_happy_customers_title) ){
							echo '<h2 class="dark-text">'.$parallax_one_happy_customers_title.'</h2><div class="colored-line"></div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
						}
					?>

					<?php
						$parallax_one_happy_customers_subtitle = get_theme_mod('parallax_one_happy_customers_subtitle','Cloud computing subscription model out of the box proactive solution.');

						if( !empty($parallax_one_happy_customers_subtitle) ){
							echo '<div class="sub-heading">'.$parallax_one_happy_customers_subtitle.'</div>';
						} elseif ( isset( $wp_customize )   ) {
							echo '<div class="sub-heading paralax_one_only_customizer"></div>';
						}
					?>
					
				</div>

				<div class="row no-gutters testimonials-wrap">
					<?php
					
						if( is_active_sidebar( 'parallax-one-customers-sidebar' ) ){
							dynamic_sidebar( 'parallax-one-customers-sidebar' );
						}
						
					?>
				</div>
				
			</div>
		</section><!-- customers -->
<?php
	}