<?php
/**
 * Translation functions for services section
 *
 * @package parallax-one
 */

/**
 * Get logos section default content.
 */
function parallax_one_services_get_default_content() {
	return json_encode(
		array(
			array(
				'choice'     => 'parallax_icon',
				'icon_value' => 'icon-basic-webpage-multiple',
				'title'      => esc_html__( 'Lorem Ipsum', 'parallax-one' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.', 'parallax-one' ),
				'id'         => 'parallax_one_56fd4d93f3013',
			),
			array(
				'choice'     => 'parallax_icon',
				'icon_value' => 'icon-ecommerce-graph3',
				'title'      => esc_html__( 'Lorem Ipsum', 'parallax-one' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.', 'parallax-one' ),
				'id'         => 'parallax_one_56fd4d94f3014',
			),
			array(
				'choice'     => 'parallax_icon',
				'icon_value' => 'icon-basic-geolocalize-05',
				'title'      => esc_html__( 'Lorem Ipsum', 'parallax-one' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.', 'parallax-one' ),
				'id'         => 'parallax_one_56fd4d95f3015',
			),
		)
	);
}


/**
 * Register strings for polylang.
 */
function parallax_one_services_register_strings() {
	if ( ! defined( 'POLYLANG_VERSION' ) ) {
		return;
	}

	$default = parallax_one_services_get_default_content();
	parallax_one_pll_string_register_helper( 'parallax_one_services_content', $default, 'Services section' );
}
add_action( 'after_setup_theme', 'parallax_one_services_register_strings', 11 );
