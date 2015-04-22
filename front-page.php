<?php 

get_header(); 

?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->


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


<!-- =========================
 SECTION: CUSTOMERS   
============================== -->
<?php

?>
	<section class="testimonials white-bg" id="section10">
		<div class="container">

			<!-- SECTION HEADER -->
			<div class="section-header">
				<h2 class="dark-text"><strong>Happy</strong> Customers</h2>
				<div class="colored-line">
				</div>
				<div class="sub-heading">
					Cloud computing subscription model out of the box proactive solution.
				</div>
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

get_footer();

?>