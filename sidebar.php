<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package parallax-one
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div <?php hybrid_attr('sidebar','secondary',array('aria-label' => esc_html__('Main sidebar','parallax-one'), 'class' => 'col-md-4 widget-area') ); ?>>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #sidebar-secondary -->
