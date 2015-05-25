<!-- =========================
 SECTION: CONTACT INFO  
============================== -->
<?php

	global $wp_customize;
	$parallax_one_contact_info_show = get_theme_mod('parallax_one_contact_info_show');
	
	
	$parallax_one_contact_info_item = get_theme_mod('parallax_one_contact_info_content',json_encode(array( array("icon_value" => "icon-basic-mail" ,"icon_text" => "hey@designlab.co", "icon_link" => "#" ), array("icon_value" => "icon-basic-geolocalize-01" ,"icon_text" => "Glen Road, E13 8 London, UK", "icon_link" => "#" ), array("icon_value" => "icon-basic-tablet" ,"icon_text" => "+44-12-3456-7890", "icon_link" => "#" ) )));
	$parallax_one_contact_info_item_decoded = json_decode($parallax_one_contact_info_item);
	
	if( !empty($parallax_one_contact_info_item_decoded) ){
	
		if( isset($parallax_one_contact_info_show) && $parallax_one_contact_info_show != 1 ){
			echo '<div class="contact-info white-bg" id="parallax_one_contact_info_section">';
		} elseif ( isset( $wp_customize )   ) {
			echo '<div class="contact-info white-bg paralax_one_only_customizer" id="parallax_one_contact_info_section">';
		}
		
		if( ( isset($parallax_one_contact_info_show) && $parallax_one_contact_info_show != 1 ) || isset( $wp_customize ) ){
	?>
			
				<div class="container">
					
					<!-- CONTACT INFO -->
					<div class="row contact-links">
						
						<?php
							
							
							if(!empty($parallax_one_contact_info_item_decoded)){

								
									
									foreach($parallax_one_contact_info_item_decoded as $parallax_one_contact_item){
										if(!empty($parallax_one_contact_item->icon_link)){
											echo '<div class="col-sm-4 contact-link-box"><div class="icon-container"><span class="'.$parallax_one_contact_item->icon_value.' colored-text"></span></div><a href="'.esc_url($parallax_one_contact_item->icon_link).'" class="strong">'.esc_attr($parallax_one_contact_item->icon_text).'</a></div>';
										} else {
											echo '<div class="col-sm-4 contact-link-box"><div class="icon-container"><span class="'.$parallax_one_contact_item->icon_value.' colored-text"></span></div><a href="" class="strong">'.esc_attr($parallax_one_contact_item->icon_text).'</a></div>';
										}
									}
								
							}
						
						?>         
				</div>
			</div><!-- .contact-info -->

<?php
		}
	}
?>