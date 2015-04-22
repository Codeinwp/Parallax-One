<!-- =========================
 SECTION: CUSTOMERS   
============================== -->

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