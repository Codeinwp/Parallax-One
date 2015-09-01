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

<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" aria-label="<?php esc_html_e('Main sidebar','parallax-one')?>" id="sidebar-secondary" class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #sidebar-secondary -->
