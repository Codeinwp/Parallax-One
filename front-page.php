<?php 

get_header(); 

?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->

<div class="content-wrap">

<?php
	$json_order = get_theme_mod('parallax_one_sections_control');
	
	$sections = json_decode($json_order);
	
	$sections_array = array('parallax_one_happy_customers_section');
	
	if(!empty($sections)){
		$files = array();
		foreach($sections as $section){
			if(in_array($section->section_id, $sections_array)){
				include get_template_directory() . "/sections/". $section->section_id.".php";
			}
		}
	} else {
		foreach($sections_array as $section){
			include_once get_template_directory() . "/sections/". $section.".php";
		}
	}
?>

</div><!-- .content-wrap -->

<?php 

get_footer();

?>