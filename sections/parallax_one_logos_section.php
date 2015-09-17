<!-- =========================
 SECTION: CLIENTS LOGOs
============================== -->
<?php 
	$parallax_one_logos = get_theme_mod('parallax_one_logos_content',
		json_encode(
			array( 
				array("image_url" => parallax_get_file('/images/companies/1.png') ,"link" => "#" ),
				array("image_url" => parallax_get_file('/images/companies/2.png') ,"link" => "#" ),
				array("image_url" => parallax_get_file('/images/companies/3.png') ,"link" => "#" ),
				array("image_url" => parallax_get_file('/images/companies/4.png') ,"link" => "#" ),
				array("image_url" => parallax_get_file('/images/companies/5.png') ,"link" => "#" ) 
			)
		)
	);
	if(!empty($parallax_one_logos)){
		$parallax_one_logos_decoded = json_decode($parallax_one_logos);
		echo '<div class="clients white-bg" id="clients" role="region" aria-label="'.__('Affiliates Logos','parallax-one').'"><div class="container">';
			echo '<ul class="client-logos">';					
			foreach($parallax_one_logos_decoded as $parallax_one_logo){
				if(!empty($parallax_one_logo->image_url)){
			
					echo '<li>';
					if(!empty($parallax_one_logo->link)){
						echo '<a href="'.$parallax_one_logo->link.'" title="">';
							echo '<img src="'.$parallax_one_logo->image_url.'" alt="'. esc_html__('Logo','parallax-one') .'">';
						echo '</a>';
					} else {
						echo '<img src="'.esc_url($parallax_one_logo->image_url).'" alt="'.esc_html__('Logo','parallax-one').'">';
					}
					echo '</li>';

	
				}
			}
			echo '</ul>';
		echo '</div></div>';
	}
?>
	