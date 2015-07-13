<?php
/**
 * @package parallax-one
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-single-page'); ?>>
	<header class="entry-header single-header">
		<?php the_title( '<h1 class="entry-title single-title">', '</h1>' ); ?>
		<div class="colored-line-left"></div>
		<div class="clearfix"></div>

		<div class="entry-meta single-entry-meta">
			<span class="post-author">
				<i class="icon-man-people-streamline-user"></i><?php the_author_posts_link(); ?>
			</span>
			<span class="post-time">
				<i class="icon-clock-alt"></i><?php the_time('F j, Y'); ?>
			</span>
			<a href="<?php comments_link(); ?>" class="post-comments">
				<i class="icon-comment-alt"></i><?php comments_number( esc_html__('No comments','parallax-one'), esc_html__('One comment','parallax-one'), esc_html__('% comments','parallax-one') ); ?>
			</a>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'parallax-one' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php parallax_one_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
