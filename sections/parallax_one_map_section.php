<?php
/**
 * INTERGEO MAPS
 *
 * @package parallax-one
 */

$parallax_one_frontpage_map_shortcode = get_theme_mod( 'parallax_one_frontpage_map_shortcode' );
$parallax_one_frontpage_map_shortcode = apply_filters( 'parallax_one_translate_single_string', $parallax_one_frontpage_map_shortcode, 'Map Shortcode' );
if ( ! empty( $parallax_one_frontpage_map_shortcode ) ) {
	$pos = strlen( strstr( $parallax_one_frontpage_map_shortcode, 'pirate_forms' ) );
}


if ( ! empty( $parallax_one_frontpage_map_shortcode ) ) {
	if ( ( $pos == 0 ) || empty( $pos ) ) {
?>
		<?php parallax_hook_map_before(); ?>
		<div id="container-fluid">
			<?php parallax_hook_map_entry_top(); ?>
			<div class="parallax_one_map_overlay"></div>
			<div id="cd-google-map">
				<?php echo do_shortcode( $parallax_one_frontpage_map_shortcode ); ?>
			</div>
			<?php parallax_hook_map_entry_bottom(); ?>
		</div><!-- .container-fluid -->
		<?php parallax_hook_map_after(); ?>
<?php
	} else {
	?>
			<?php parallax_hook_map_before(); ?>
			<div class="pirate-forms-section" id="contact">
				<?php parallax_hook_map_entry_top(); ?>
				<div class="container">
				<?php echo do_shortcode( $parallax_one_frontpage_map_shortcode ); ?>
				</div>
				<?php parallax_hook_map_entry_bottom(); ?>
			</div>
			<?php parallax_hook_map_after(); ?>
		<?php
	}
}
?>
