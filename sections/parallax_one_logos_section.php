<!-- =========================
 SECTION: CLIENTS LOGOs
============================== -->
<?php 
if( is_active_sidebar( 'parallax-one-logos' ) ){
?>
	<div class="clients white-bg">
		<ul class="client-logos">
			<?php
				dynamic_sidebar( 'parallax-one-logos' );
			?>
		</ul>
	</div><!-- .clients white-bg -->
<?php
}
?>