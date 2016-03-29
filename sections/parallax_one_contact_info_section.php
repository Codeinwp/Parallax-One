<!-- =========================
 SECTION: CONTACT INFO
============================== -->
<?php
$parallax_one_contact_info_item = get_theme_mod('parallax_one_contact_info_content', json_encode( array(
	array("icon_value" => "icon-basic-mail" ,"text" => "contact@site.com", "link" => "#" ),
	array("icon_value" => "icon-basic-geolocalize-01" ,"text" => "Company address", "link" => "#" ),
	array("icon_value" => "icon-basic-tablet" ,"text" => "0 332 548 954", "link" => "#" )
) )	);

if( !parallax_one_general_repeater_is_empty($parallax_one_contact_info_item) ){
	$parallax_one_contact_info_item_decoded = json_decode($parallax_one_contact_info_item);
	parallax_hook_contact_before(); ?>
	<div class="contact-info" id="contactinfo" role="region" aria-label="<?php esc_html_e('Contact Info','parallax-one'); ?>">
		<?php parallax_hook_contact_top(); ?>
		<div class="section-overlay-layer">
			<div class="container">
				<div class="row contact-links">
					<?php
					if(!empty($parallax_one_contact_info_item_decoded)){
						foreach($parallax_one_contact_info_item_decoded as $parallax_one_contact_item){
							$id = esc_attr($parallax_one_contact_item->id);
							$icon = apply_filters( 'wpml_translate_single_string', $parallax_one_contact_item->icon_value, 'Parallax One -> Contact section', 'Contact box icon '.$id );
							$text = apply_filters( 'wpml_translate_single_string', $parallax_one_contact_item->text, 'Parallax One -> Contact section', 'Contact box text '.$id );
							$link = apply_filters( 'wpml_translate_single_string', $parallax_one_contact_item->link, 'Parallax One -> Contact section', 'Contact box link '.$id );


							if( !empty( $icon ) || !empty( $text ) ){
								parallax_hook_contact_entry_before(); ?>
								<div class="col-sm-4 contact-link-box col-xs-12">
									<?php
									parallax_hook_contact_entry_top();

									if( !empty( $icon ) ){ ?>
											<div class="icon-container"><span class="<?php echo esc_attr($icon)?> colored-text"></span></div>
									<?php
									}
									
									if( !empty( $text ) ){
										if( !empty( $link ) ){ ?>
											<a href="<?php echo esc_url( $link ); ?>" class="strong"><?php echo html_entity_decode($text); ?></a>
										<?php
										} else {
											echo html_entity_decode($text);
										}
									}
									parallax_hook_contact_entry_bottom(); ?>
								</div>
								<?php
								parallax_hook_contact_entry_after();
							}
						}
					} ?>
				</div><!-- .contact-links -->
			</div><!-- .container -->
		</div>
		<?php parallax_hook_contact_bottom(); ?>
	</div><!-- .contact-info -->
	<?php parallax_hook_contact_after(); ?>
<?php
} ?>