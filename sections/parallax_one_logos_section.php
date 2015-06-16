<!-- =========================
 SECTION: CLIENTS LOGOs
============================== -->
<?php 
$parallax_one_logos_show = get_theme_mod('parallax_one_logos_show');

if( isset($parallax_one_logos_show) && $parallax_one_logos_show != 1 ){
	if( is_active_sidebar( 'parallax-one-logos-sidebar' ) ){
	?>
		<div class="clients white-bg" id="clients">
			<ul class="client-logos">
				<?php
					dynamic_sidebar( 'parallax-one-logos-sidebar' );
				?>
			</ul>
		</div><!-- .clients white-bg -->
	<?php
	}
}
?>