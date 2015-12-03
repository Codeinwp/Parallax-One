<!-- =========================
INTERGEO MAPS 
============================== -->
<?php
$parallax_one_frontpage_map_shortcode = get_theme_mod('parallax_one_frontpage_map_shortcode');
	if(!empty($parallax_one_frontpage_map_shortcode)){
    	$pos = strlen(strstr($parallax_one_frontpage_map_shortcode,"pirate_forms"));
	}

   
    if( !empty($parallax_one_frontpage_map_shortcode) ){
		if( ($pos == 0) || empty($pos) ) {
?>
			<div id="container-fluid">
				<div class="parallax_one_map_overlay"></div>
				<div id="cd-google-map">
					<?php echo do_shortcode($parallax_one_frontpage_map_shortcode);?>
				</div>
			</div>
			<!-- .container-fluid -->
    <?php
		} else { ?>
			<div class="pirate-forms-section" id="contact">
				<div class="container">
					<?php echo do_shortcode($parallax_one_frontpage_map_shortcode);?>
				</div>
			</div>
	<?php
		}
	}
?>
