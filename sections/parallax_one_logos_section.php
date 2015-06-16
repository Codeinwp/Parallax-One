<!-- =========================
 SECTION: CLIENTS LOGOs
============================== -->
<?php 
global $wp_customize;

$parallax_one_logos_show = get_theme_mod('parallax_one_logos_show');
if( isset($parallax_one_logos_show) && $parallax_one_logos_show != 1 ){
		echo '<div class="clients white-bg" id="clients">';
	} elseif ( isset( $wp_customize )   ) {
		echo '<div class="clients white-bg paralax_one_only_customizer" id="clients">';
	}
	
	
	if( isset($parallax_one_logos_show) && $parallax_one_logos_show != 1 ){
		if( is_active_sidebar( 'parallax-one-logos-sidebar' ) ){
		?>
			
				<ul class="client-logos">
					<?php
						dynamic_sidebar( 'parallax-one-logos-sidebar' );
					?>
				</ul>
			
		<?php
		}
	}
	?>
	</div><!-- .clients white-bg -->