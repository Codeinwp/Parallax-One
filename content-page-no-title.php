<?php
/**
 * The template used for displaying page content in template-fullwidth-no-title.php
 *
 * @package parallax-one
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php parallax_hook_page_top(); ?>

	<div class="entry-content content-page 
	<?php
	if ( empty( $page_title ) ) {
		echo 'parallax-one-top-margin-5px'; }
?>
" itemprop="text">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( esc_html__( 'Edit', 'parallax-one' ), '<span class="edit-link">', '</span>' ); ?>

	<?php parallax_hook_page_bottom(); ?>
</article><!-- #post-## -->
