<?php
/**
 * SECTION: RIBBON
 *
 * @package parallax-one
 */

$ribbon_background = get_theme_mod( 'paralax_one_ribbon_background', parallax_get_file( '/images/background-images/parallax-img/parallax-img1.jpg' ) );
$parallax_one_ribbon_title = get_theme_mod( 'parallax_one_ribbon_title',esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','parallax-one' ) );
$parallax_one_button_text = get_theme_mod( 'parallax_one_button_text',esc_html__( 'GET STARTED','parallax-one' ) );
$parallax_one_button_link = get_theme_mod( 'parallax_one_button_link','#' );
if ( ! empty( $parallax_one_button_link ) && strpos( $parallax_one_button_link, '#' ) === 0 ) {
	$parallax_one_go_to = 'onclick="return false;" data-anchor="' . esc_attr( $parallax_one_button_link ) . '"';
} else {
	$parallax_one_go_to = 'onclick="parent.location=\'' . esc_url( $parallax_one_button_link ) . '\'" data-anchor=""';
}
$parallax_one_frontpage_animations = get_theme_mod( 'parallax_one_enable_animations', false );


parallax_hook_ribbon_before();
if ( ! empty( $parallax_one_ribbon_title ) || ! empty( $parallax_one_button_text ) ) {

	echo '<section class="call-to-action ribbon-wrap" id="ribbon" ' . ( ! empty( $ribbon_background ) ? 'style="background-image:url(' . esc_url( $ribbon_background ) . ');"' : '' ) . ' role="region" aria-label="' . esc_html__( 'Ribbon', 'parallax-one' ) . '">';
	parallax_hook_ribbon_top();

} else {
	if ( is_customize_preview() ) {
		echo '<section class="call-to-action ribbon-wrap paralax_one_only_customizer" id="ribbon" ' . ( ! empty( $ribbon_background ) ? 'style="background-image:url(' . esc_url( $ribbon_background ) . ');"' : '' ) . ' role="region" aria-label="' . esc_html__( 'Ribbon', 'parallax-one' ) . '">';
		parallax_hook_ribbon_top();
	}
}

if ( ! empty( $parallax_one_ribbon_title ) || ! empty( $parallax_one_button_text ) || is_customize_preview() ) { ?>
	<div class="section-overlay-layer">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<?php
					if ( ! empty( $parallax_one_ribbon_title ) ) {  ?>
						<h2 class="white-text strong"
							<?php if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
								echo 'data-scrollreveal="enter top after 0.15s over 1s"';
}?>>
							<?php echo wp_kses_post( $parallax_one_ribbon_title ); ?>
						</h2>
					<?php } elseif ( is_customize_preview() ) { ?>
						<h2 class="white-text strong paralax_one_only_customizer"
							<?php if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
								echo 'data-scrollreveal="enter top after 0.15s over 1s"';
}?>>

						</h2>
					<?php }

if ( ! empty( $parallax_one_button_text ) ) {  ?>
						<button <?php if ( ! empty( $parallax_one_go_to ) ) {  echo $parallax_one_go_to; } ?> class="btn btn-primary standard-button inpage-scroll inpage_scroll_btn"
							<?php if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
								echo 'data-scrollreveal="enter bottom after 0.15s over 1s"';
}?>>
							<span class="screen-reader-text"><?php echo esc_html__( 'Header button label:','parallax-one' ) . strip_tags( trim( $parallax_one_button_text ) ); ?></span>
							<?php echo wp_kses_post( $parallax_one_button_text ); ?>
						</button>
						<?php
} elseif ( is_customize_preview() ) {  ?>
						<button class="btn btn-primary standard-button inpage-scroll inpage_scroll_btn paralax_one_only_customizer"  <?php if ( ! empty( $parallax_one_go_to ) ) {  echo $parallax_one_go_to; }
						if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
							echo 'data-scrollreveal="enter bottom after 0.15s over 1s"';
						}?>>

						</button>
						<?php
} ?>

				</div>
			</div>
		</div>
	</div>
	<?php parallax_hook_ribbon_bottom(); ?>
	</section>
	<?php parallax_hook_ribbon_after(); ?>
	<?php
} // End if().
?>
