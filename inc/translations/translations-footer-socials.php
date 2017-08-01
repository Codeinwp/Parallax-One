<?php
/**
 * Translation functions for footer socials
 *
 * @package parallax-one
 */

/**
 * Get logos section default content.
 */
function parallax_one_footer_socials_get_default_content() {
	return json_encode(
		array(
			array(
				'icon_value' => 'icon-social-facebook',
				'link'       => '#',
			),
			array(
				'icon_value' => 'icon-social-twitter',
				'link'       => '#',
			),
			array(
				'icon_value' => 'icon-social-googleplus',
				'link'       => '#',
			),
		)
	);
}

/**
 * Register strings for polylang.
 */
function parallax_one_footer_socials_register_strings() {
	if ( ! defined( 'POLYLANG_VERSION' ) ) {
		return;
	}

	$default = parallax_one_footer_socials_get_default_content();
	parallax_one_pll_string_register_helper( 'parallax_one_social_icons', $default, 'Footer socials' );
}
add_action( 'after_setup_theme', 'parallax_one_footer_socials_register_strings', 11 );
