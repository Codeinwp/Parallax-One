<?php
/**
 * Translation functions for testimonials section
 *
 * @package parallax-one
 */

/**
 * Get testimonials section default content.
 */
function parallax_one_testimonials_get_default_content() {
	return json_encode(
		array(
			array(
				'image_url' => parallax_get_file( '/images/clients/1.jpg' ),
				'title'     => esc_html__( 'Happy Customer', 'parallax-one' ),
				'subtitle'  => esc_html__( 'Lorem ipsum', 'parallax-one' ),
				'text'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.', 'parallax-one' ),
				'id'        => 'parallax_one_56fd526edcd4e',
			),
			array(
				'image_url' => parallax_get_file( '/images/clients/2.jpg' ),
				'title'     => esc_html__( 'Happy Customer', 'parallax-one' ),
				'subtitle'  => esc_html__( 'Lorem ipsum', 'parallax-one' ),
				'text'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.', 'parallax-one' ),
				'id'        => 'parallax_one_56fd526ddcd4d',
			),
			array(
				'image_url' => parallax_get_file( '/images/clients/3.jpg' ),
				'title'     => esc_html__( 'Happy Customer', 'parallax-one' ),
				'subtitle'  => esc_html__( 'Lorem ipsum', 'parallax-one' ),
				'text'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.', 'parallax-one' ),
				'id'        => 'parallax_one_56fd5259dcd4c',
			),
		)
	);
}


/**
 * Register strings for polylang.
 */
function parallax_one_testimonials_register_strings() {
	if ( ! defined( 'POLYLANG_VERSION' ) ) {
		return;
	}

	$default = parallax_one_testimonials_get_default_content();
	parallax_one_pll_string_register_helper( 'parallax_one_testimonials_content', $default, 'Testimonials section' );
}
add_action( 'after_setup_theme', 'parallax_one_testimonials_register_strings', 11 );
