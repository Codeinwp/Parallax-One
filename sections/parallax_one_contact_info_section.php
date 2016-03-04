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
							if( !empty($parallax_one_contact_item->icon_value) || !empty($parallax_one_contact_item->text) ){
								parallax_hook_contact_entry_before(); ?>
								<div class="col-sm-4 contact-link-box col-xs-12">
									<?php
									parallax_hook_contact_entry_top();
									if(!empty($parallax_one_contact_item->icon_value)){ 
										if(function_exists('icl_t')){
											$parallax_one_contact_icon = icl_t('Contact field '.$parallax_one_contact_item->id,'Contact icon',$parallax_one_contact_item->icon_value);?>
											<div class="icon-container"><span class="<?php echo esc_attr($parallax_one_contact_icon)?> colored-text"></span></div>
										<?php
										} else { ?>
											<div class="icon-container"><span class="<?php echo esc_attr($parallax_one_contact_item->icon_value)?> colored-text"></span></div>
										<?php	
										}
									}
									
									if( !empty( $parallax_one_contact_item->text ) ){
										if( !empty( $parallax_one_contact_item->link ) ){
											if( function_exists( 'icl_t') ){
												$parallax_one_contact_text = icl_t('Contact field '.$parallax_one_contact_item->id,'Contact text',$parallax_one_contact_item->text);
												$parallax_one_contact_link = icl_t('Contact field '.$parallax_one_contact_item->id,'Contact link',$parallax_one_contact_item->link); ?>
												<a href="<?php echo esc_url( $parallax_one_contact_link ); ?>" class="strong"><?php echo html_entity_decode($parallax_one_contact_text); ?></a>
											<?php	
											} else { ?>
												<a href="<?php echo esc_url( $parallax_one_contact_item->link ); ?>" class="strong"><?php echo html_entity_decode( $parallax_one_contact_item->text ); ?></a>
											<?php
											}
										} else {
											if( function_exists( 'icl_t') ){
												$parallax_one_contact_text = icl_t('Contact field '.$parallax_one_contact_item->id,'Contact text',$parallax_one_contact_item->text);
												echo html_entity_decode($parallax_one_contact_text);
											} else {
												echo html_entity_decode( $parallax_one_contact_item->text );
											}
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