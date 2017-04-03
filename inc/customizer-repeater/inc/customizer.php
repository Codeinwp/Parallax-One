<?php
function parallax_one_repeater_register( $wp_customize ) {
	require_once( get_template_directory().'/inc/customizer-repeater/class/customizer-repeater-control.php' );

}
add_action( 'customize_register', 'parallax_one_repeater_register');

function parallax_one_repeater_sanitize($input){
	$input_decoded = json_decode($input,true);

	if(!empty($input_decoded)) {
		foreach ($input_decoded as $boxk => $box ){
			foreach ($box as $key => $value){

					$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );

			}
		}
		return json_encode($input_decoded);
	}
	return $input;
}
