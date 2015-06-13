<?php 
/*
Template Name: Contact
*/

	get_header(); 
?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->

<div class="content-wrap">
	<div class="container">

		<div id="primary" class="content-area col-md-12">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'contact' ); ?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>
