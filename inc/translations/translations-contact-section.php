<?php
/**
 * Translation functions for contact section
 *
 * @package parallax-one
 */

/**
 * Get testimonials section default content.
 */
function parallax_one_contact_get_default_content() {
	return json_encode(
		array(
			array(
				'icon_value' => 'icon-basic-mail',
				'text'       => 'contact@site.com',
				'link'       => '#',
				'id'         => 'parallax_one_56d450a72cb3a',
			),
			array(
				'icon_value' => 'icon-basic-geolocalize-01',
				'text'       => 'Company address',
				'link'       => '#',
				'id'         => 'parallax_one_56d069b88cb6f',
			),
			array(
				'icon_value' => 'icon-basic-tablet',
				'text'       => '0 332 548 954',
				'link'       => '#',
				'id'         => 'parallax_one_56d069b98cb70',
			),
		)
	);
}


/**
 * Register strings for polylang.
 */
function parallax_one_contact_register_strings() {
	if ( ! defined( 'POLYLANG_VERSION' ) ) {
		return;
	}

	$default = parallax_one_contact_get_default_content();
	parallax_one_pll_string_register_helper( 'parallax_one_contact_info_content', $default, 'Contact section' );
}
add_action( 'after_setup_theme', 'parallax_one_contact_register_strings', 11 );
