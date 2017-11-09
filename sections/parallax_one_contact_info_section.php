<?php
/**
 * SECTION: CONTACT INFO
 *
 * @package parallax-one
 */
$default                           = parallax_one_contact_get_default_content();
$parallax_one_contact_info_item    = get_theme_mod( 'parallax_one_contact_info_content', $default );
$parallax_one_frontpage_animations = get_theme_mod( 'parallax_one_enable_animations', false );

$allowed_protocols = wp_allowed_protocols();
array_push( $allowed_protocols, 'callto' );

if ( ! parallax_one_general_repeater_is_empty( $parallax_one_contact_info_item ) ) {
	$parallax_one_contact_info_item_decoded = json_decode( $parallax_one_contact_info_item );
	parallax_hook_contact_before(); ?>
	<div class="contact-info" id="contactinfo" role="region" aria-label="<?php esc_attr_e( 'Contact Info', 'parallax-one' ); ?>">
		<?php parallax_hook_contact_top(); ?>
		<div class="section-overlay-layer">
			<div class="container">
				<div class="row contact-links">
					<?php
					if ( ! empty( $parallax_one_contact_info_item_decoded ) ) {
						foreach ( $parallax_one_contact_info_item_decoded as $parallax_one_contact_item ) {
							$icon             = ! empty( $parallax_one_contact_item->icon_value ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_contact_item->icon_value, 'Contact section' ) : '';
							$text             = ! empty( $parallax_one_contact_item->text ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_contact_item->text, 'Contact section' ) : '';
							$link             = ! empty( $parallax_one_contact_item->link ) ? apply_filters( 'parallax_one_translate_single_string', $parallax_one_contact_item->link, 'Contact section' ) : '';
							$section_is_empty = empty( $icon ) && empty( $text );

							if ( ! $section_is_empty ) {
								parallax_hook_contact_entry_before();
								?>
								<div class="col-sm-4 contact-link-box col-xs-12" 
								<?php
								if ( ! empty( $parallax_one_frontpage_animations ) && ( (bool) $parallax_one_frontpage_animations === true ) ) {
									echo 'data-scrollreveal="enter top after 0.15s over 1s"';
								}
?>
>
									<?php
									parallax_hook_contact_entry_top();

									if ( ! empty( $icon ) ) {
									?>
											<div class="icon-container"><span class="fa <?php echo esc_attr( $icon ); ?> colored-text"></span></div>
									<?php
									}

									if ( ! empty( $text ) ) {
										if ( ! empty( $link ) ) {
										?>
											<a href="<?php echo esc_url( $link, $allowed_protocols ); ?>" class="strong"><?php echo html_entity_decode( $text ); ?></a>
										<?php
										} else {
											echo html_entity_decode( $text );
										}
									}
									parallax_hook_contact_entry_bottom();
									?>
								</div>
								<?php
								parallax_hook_contact_entry_after();
							}
						}// End foreach().
					}// End if().
	?>
				</div><!-- .contact-links -->
			</div><!-- .container -->
		</div>
		<?php parallax_hook_contact_bottom(); ?>
	</div><!-- .contact-info -->
	<?php parallax_hook_contact_after(); ?>
<?php
}// End if().
	?>
