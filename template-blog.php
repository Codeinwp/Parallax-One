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

<?php get_sidebar(); ?>

<?php 

get_footer();

?>