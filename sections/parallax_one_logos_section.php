<!-- =========================
 SECTION: CLIENTS LOGOs
============================== -->
<?php 
global $wp_customize;

$parallax_one_logos_show = get_theme_mod('parallax_one_logos_show');
if( isset($parallax_one_logos_show) && $parallax_one_logos_show != 1 ){
		echo '<div class="clients white-bg" id="clients"><div class="container">';
	} elseif ( isset( $wp_customize )   ) {
		echo '<div class="clients white-bg paralax_one_only_customizer" id="clients"><div class="container">';
	}
	
if( isset($parallax_one_logos_show) && $parallax_one_logos_show != 1  || isset( $wp_customize ) ){
	$parallax_one_logos = get_theme_mod('parallax_one_logos_content',json_encode(array( array("image_url" => get_stylesheet_directory_uri().'/images/companies/1.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/2.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/3.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/4.png' ,"link" => "#" ),array("image_url" => get_stylesheet_directory_uri().'/images/companies/5.png' ,"link" => "#" ) )));
	$parallax_one_logos_decoded = json_decode($parallax_one_logos);
	if(!empty($parallax_one_logos_decoded)){
			echo '<ul class="client-logos">';					
			foreach($parallax_one_logos_decoded as $parallax_one_logo){
				if(!empty($parallax_one_logo->image_url)){
			
					echo '<li>';
					if(!empty($parallax_one_logo->link)){
						echo '<a href="'.$parallax_one_logo->link.'" title="">';
							echo '<img src="'.$parallax_one_logo->image_url.'" alt="">';
						echo '</a>';
					} else {
						echo '<img src="'.$parallax_one_logo->image_url.'" alt="">';
					}
					echo '</li>';

	
				}
			}
			echo '</ul>';
	}
	echo '</div></div>';
}

?>
	