<!-- =========================
INTERGEO MAPS 
============================== -->
<?php
    global $wp_customize;
    $parallax_one_cfrontpage_map_show = get_theme_mod('parallax_one_frontpage_map_show');
    $parallax_one_frontpage_map_shortcode = get_theme_mod('parallax_one_frontpage_map_shortcode');
    
    if( !empty($parallax_one_frontpage_map_shortcode) ){
        
		if( isset($parallax_one_cfrontpage_map_show) && $parallax_one_cfrontpage_map_show != 1 ){
			echo '<div id="container-fluid">';
		} elseif ( isset( $wp_customize )   ) {
			echo '<div id="container-fluid" class="paralax_one_only_customizer">';
		}
        
        if( ( isset($parallax_one_cfrontpage_map_show) && $parallax_one_cfrontpage_map_show != 1 ) || isset( $wp_customize ) ){
?>
            <div id="cd-google-map">
                <?php echo do_shortcode($parallax_one_frontpage_map_shortcode);?>
            </div>
        </div><!-- .container-fluid -->

<?php
        
        }
    }
?>
