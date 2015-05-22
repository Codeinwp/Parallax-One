<?php 
/*
Template Name: Blog
*/

	get_header(); 
?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->

<div class="content-wrap">
	<div class="container">

		<div id="primary" class="content-area col-md-8 post-list">
			<main id="main" class="site-main" role="main">

			<?php

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				$wp_query = new WP_Query( array('post_type' => 'post', 'showposts' => '8', 'paged' => $paged) );
					if( $wp_query->have_posts() ):					 
						while ($wp_query->have_posts()) : 
							
							$wp_query->the_post();
								get_template_part( 'content', get_post_format() );
						endwhile;
					endif;

					wp_reset_postdata();
					
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>