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

				query_posts( array( 'post_type' => 'post', 'posts_per_page' => 6, 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) );
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					
						get_template_part( 'content', get_post_format() );
					
					endwhile; 
					
					parallax_posts_navigation();
				
				else : 
				
					get_template_part( 'content', 'none' );
					
				endif;
				
				wp_reset_postdata(); 
					
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>