<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package parallax-one
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php parallax_hook_page_top(); ?>

	<div class="entry-content content-page <?php if ( empty( $page_title ) ) {  echo 'parallax-one-top-margin-5px'; } ?>" itemprop="text">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'parallax-one' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php parallax_hook_page_bottom(); ?>
</article><!-- #post-## -->
