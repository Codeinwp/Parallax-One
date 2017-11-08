<?php
/**
 * SECTION: CLIENTS LOGOs
 *
 * @package parallax-one
 */




/**
 * Display Logos section
 */
$parallax_one_default_content      = parallax_one_logos_get_default_content();
$parallax_one_logos                = get_theme_mod( 'parallax_one_logos_content', $parallax_one_default_content );
$parallax_one_frontpage_animations = get_theme_mod( 'parallax_one_enable_animations', false );

if ( ! empty( $parallax_one_logos ) ) {
	$parallax_one_logos_decoded = json_decode( $parallax_one_logos );
	parallax_hook_logos_before(); ?>

	<div class="clients white-bg" id="clients" role="region" aria-label="<?php esc_html_e( ' Affiliates Logos', 'parallax-one' ); ?>">
		<?php
		parallax_hook_logos_top();
		?>
		<div class="container">
			<ul class="client-logos"
			<?php
			if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
				echo 'data-scrollreveal="enter top over 1.5s after 1s"';
			}
?>
>
				<?php
				foreach ( $parallax_one_logos_decoded as $parallax_one_logo ) {

					$id    = ! empty( $parallax_one_logo->id ) ? $parallax_one_logo->id : '';
					$link  = ! empty( $parallax_one_logo->link ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_logo->link, 'Logos section' ) : '';
					$image = ! empty( $parallax_one_logo->image_url ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_logo->image_url, 'Logos section' ) : '';

					if ( ! empty( $image ) ) {
					?>
						<li>
							<?php
							if ( ! empty( $link ) ) {
							?>
									<a href="<?php echo esc_url( $link ); ?>" title="">
										<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $image ) ); ?>" alt="<?php esc_attr_e( 'Logo', 'parallax-one' ); ?>">
									</a>
							<?php
							} else {
							?>
								<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $image ) ); ?>" alt="<?php esc_attr_e( 'Logo', 'parallax-one' ); ?>">
							<?php
							}
							?>
						</li>
					<?php
					} // End if().
				} // End foreach().
				?>
			</ul>
		</div>
		<?php
		parallax_hook_logos_bottom();
		?>
	</div>
	<?php
	parallax_hook_logos_after();
} // End if(). ?>
