<?php
/**
 * Translation functions for logos section
 *
 * @package parallax-one
 */

/**
 * Get logos section default content.
 */
function parallax_one_logos_get_default_content() {
	return json_encode(
		array(
			array(
				'image_url' => parallax_get_file( '/images/companies/1.png' ),
				'link'      => '#',
				'id'        => 'parallax_one_56d7ea7f40f56',
			),
			array(
				'image_url' => parallax_get_file( '/images/companies/2.png' ),
				'link'      => '#',
				'id'        => 'parallax_one_56d7f2cb8a158',
			),
			array(
				'image_url' => parallax_get_file( '/images/companies/3.png' ),
				'link'      => '#',
				'id'        => 'parallax_one_56d7f2cc8a159',
			),
			array(
				'image_url' => parallax_get_file( '/images/companies/4.png' ),
				'link'      => '#',
				'id'        => 'parallax_one_56d7f2ce8a15a',
			),
			array(
				'image_url' => parallax_get_file( '/images/companies/5.png' ),
				'link'      => '#',
				'id'        => 'parallax_one_56d7f2cf8a15b',
			),
		)
	);
}


/**
 * Register strings for polylang.
 */
function parallax_one_logos_register_strings() {
	if ( ! defined( 'POLYLANG_VERSION' ) ) {
		return;
	}

	$default = parallax_one_logos_get_default_content();
	parallax_one_pll_string_register_helper( 'parallax_one_logos_content', $default, 'Logos section' );
}
add_action( 'after_setup_theme', 'parallax_one_logos_register_strings', 11 );
