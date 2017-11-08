<?php
/**
 * Include repeater files
 *
 * @package parallax-one
 */

// Require customizer functions and dependencies
require get_template_directory() . '/inc/customizer-repeater/inc/customizer.php';

/**
 * Check if Repeater is empty
 *
 * @param string $parallax_one_arr Repeater json array.
 *
 * @return bool
 */
function parallax_one_general_repeater_is_empty( $parallax_one_arr ) {
	if ( empty( $parallax_one_arr ) ) {
		return true;
	}
	$parallax_one_arr_decoded = json_decode( $parallax_one_arr, true );
	$not_check_keys           = array( 'choice', 'id' );
	foreach ( $parallax_one_arr_decoded as $item ) {
		foreach ( $item as $key => $value ) {
			if ( $key === 'icon_value' && ( ! empty( $value ) && $value !== 'No icon' ) ) {
				return false;
			}
			if ( ! in_array( $key, $not_check_keys ) ) {
				if ( ! empty( $value ) ) {
					return false;
				}
			}
		}
	}
	return true;
}
