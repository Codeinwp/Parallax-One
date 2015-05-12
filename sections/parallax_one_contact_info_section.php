<!-- =========================
 SECTION: CONTACT INFO  
============================== -->
<?php

	global $wp_customize;
	$parallax_one_contact_info_show = get_theme_mod('parallax_one_contact_info_show');
	
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
							
							
							if(!empty($parallax_one_contact_info_item)){
								$parallax_one_contact_info_item_decoded = json_decode($parallax_one_contact_info_item);
								
									
									foreach($parallax_one_contact_info_item_decoded as $parallax_one_contact_item){
										if(!empty($parallax_one_contact_item->icon_link)){
											echo '<div class="col-sm-4 contact-link-box"><div class="icon-container"><span class="'.$parallax_one_contact_item->icon_value.' colored-text"></span></div><a href="'.$parallax_one_contact_item->icon_link.'" class="strong">'.$parallax_one_contact_item->icon_text.'</a></div>';
										} else {
											echo '<div class="col-sm-4 contact-link-box"><div class="icon-container"><span class="'.$parallax_one_contact_item->icon_value.' colored-text"></span></div><a href="" class="strong">'.$parallax_one_contact_item->icon_text.'</a></div>';
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