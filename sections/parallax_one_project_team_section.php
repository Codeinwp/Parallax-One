    <!-- =========================
     SECTION: TEAM   
    ============================== -->
    <section class="team white-bg" id="section9">
		<div class="container">
			
			<!-- SECTION HEADER -->
            <div class="section-header">
                <h2 class="dark-text"><strong>Project</strong> Team</h2>
                <div class="colored-line">
                </div>
                <div class="sub-heading">
                    Cloud computing subscription model out of the box proactive solution.
                </div>
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