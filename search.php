<?php
/**
 * The template for displaying search results pages.
 *
 * @package parallax-one
 */

	get_header(); 
?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->

<div itemscope itemtype="http://schema.org/SearchResultsPage" role="main" id="content" class="content-warp">
	<div class="container">

		<div id="primary" class="content-area col-md-8 post-list">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'parallax-one' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'search' );
						?>

					<?php endwhile; ?>

					<?php the_posts_navigation(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>
