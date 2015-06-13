<?php
/**
 * @package parallax-one
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('contact-page'); ?>>

	<div class="container">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title single-title">', '</h1>' ); ?>
			<div class="colored-line-left"></div>
			<div class="clearfix"></div>
		</header><!-- .entry-header -->

		<div class="entry-content content-page">

			<div class="col-md-6">
				<?php the_content(); ?>
			</div>
			<div class="col-md-6">
				<?php echo do_shortcode( '[contact-form-7 id="1746" title="Contact form 1"]' ); ?>
			</div>

			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', 'parallax-one' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .fentry-footer -->

		</div><!-- .entry-content -->

	</div>

	<div class="contact-page-map-wrap">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5698.579553671497!2d26.100440153437006!3d44.427217785675964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff143f35292d%3A0x37827a337d7be687!2sPia%C8%9Ba+Unirii!5e0!3m2!1sen!2sro!4v1434183268216" width="100%" height="400" frameborder="0" style="border:0"></iframe>
	</div>

</article><!-- #post-## -->