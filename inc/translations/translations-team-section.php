<?php
/**
 * Translation functions for team section
 *
 * @package parallax-one
 */

/**
 * Get logos section default content.
 */
function parallax_one_team_get_default_content() {
	return json_encode(
		array(
			array(
				'image_url' => parallax_get_file( '/images/team/1.jpg' ),
				'title'     => esc_html__( 'Albert Jacobs', 'parallax-one' ),
				'subtitle'  => esc_html__( 'Founder & CEO', 'parallax-one' ),
				'id'        => 'parallax_one_56fe9796baca4',
			),
			array(
				'image_url' => parallax_get_file( '/images/team/2.jpg' ),
				'title'     => esc_html__( 'Tonya Garcia', 'parallax-one' ),
				'subtitle'  => esc_html__( 'Account Manager', 'parallax-one' ),
				'id'        => 'parallax_one_56fe9798baca5',
			),
			array(
				'image_url' => parallax_get_file( '/images/team/3.jpg' ),
				'title'     => esc_html__( 'Linda Guthrie', 'parallax-one' ),
				'subtitle'  => esc_html__( 'Business Development', 'parallax-one' ),
				'id'        => 'parallax_one_56fe9799baca6',
			),
		)
	);
}


/**
 * Register strings for polylang.
 */
function parallax_one_team_register_strings() {
	if ( ! defined( 'POLYLANG_VERSION' ) ) {
		return;
	}

	$default = parallax_one_team_get_default_content();
	parallax_one_pll_string_register_helper( 'parallax_one_team_content', $default, 'Team section' );
}
add_action( 'after_setup_theme', 'parallax_one_team_register_strings', 11 );
