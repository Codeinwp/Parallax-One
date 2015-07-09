<?php

if ( 'posts' == get_option( 'show_on_front' ) ) {
	
	get_header(); 


		include_once get_template_directory() . "/sections/parallax_one_header_section.php";
	?>
		</div>
		<!-- /END COLOR OVER IMAGE -->
	</header>
	<!-- /END HOME / HEADER  -->

	<div class="content-wrap">

	<?php

		$sections_array = apply_filters("parallax_one_pro_sections_filter",array('sections/parallax_one_logos_section','sections/parallax_one_our_services_section','sections/parallax_one_our_story_section','sections/parallax_one_our_team_section','sections/parallax_one_happy_customers_section','sections/parallax_one_ribbon_section','sections/parallax_one_latest_news_section','sections/parallax_one_contact_info_section','sections/parallax_one_map_section'));

		if(!empty($sections_array)){
			foreach($sections_array as $section){
				include_once get_template_directory() . "/". $section.".php";
			}
		}
	?>

	</div><!-- .content-wrap -->

	<?php 

	get_footer();
} else {

	include( get_page_template() );
}
?>