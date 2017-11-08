<?php
/**
 * Contact template content.
 *
 * @package parallax-one
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'contact-page' ); ?>>

	<div class="container">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title single-title">', '</h1>' ); ?>
			<div class="colored-line-left"></div>
			<div class="clearfix"></div>
		</header><!-- .entry-header -->

		<div class="entry-content content-page parallax_one_contact_form">

			<?php
				$parallax_one_contact_form_shortcode = get_theme_mod( 'parallax_one_contact_form_shortcode' );

				$contact_column = empty( $parallax_one_contact_form_shortcode ) || $post->post_content === '' ? 'col-md-12' : 'col-md-6';

			if ( $post->post_content !== '' ) :
				echo '<div class="' . $contact_column . '">';
				the_content();
				echo '</div>';
				endif;

			if ( ! empty( $parallax_one_contact_form_shortcode ) ) {
				echo '<div class="' . $contact_column . '">';
				echo do_shortcode( $parallax_one_contact_form_shortcode );
				echo '</div>';
			}
			?>

			<footer class="entry-footer">
				<?php edit_post_link( esc_html__( 'Edit', 'parallax-one' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .fentry-footer -->

		</div><!-- .entry-content -->

	</div>
		<?php
		$parallax_one_contact_map_shortcode = get_theme_mod( 'parallax_one_contact_map_shortcode' );
		if ( ! empty( $parallax_one_contact_map_shortcode ) ) {
			echo '<div class="contact-page-map-wrap">';
			echo do_shortcode( $parallax_one_contact_map_shortcode );
			echo '</div>';
		}
		?>

</article><!-- #post-## -->
