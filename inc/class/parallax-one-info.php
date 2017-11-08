<?php
/**
 * Class to display upsells.
 *
 * @package WordPress
 * @subpackage parallax-one
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class Parallax_One_Info
 */
class Parallax_One_Info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';

	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'Documentation', 'parallax-one' ),
				'link' => esc_url( 'http://themeisle.com/documentation-parallax-one/' ),
			),
			array(
				'name' => __( 'Support', 'parallax-one' ),
				'link' => esc_url( 'http://themeisle.com/contact/' ),
			),
			array(
				'name' => __( 'View Theme Info', 'parallax-one' ),
				'link' => admin_url( 'themes.php?page=parallax-one-welcome#getting_started' ),
			),
		); ?>


		<div class="parallax-one-theme-info">
			<?php
			foreach ( $links as $item ) {
			?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<hr/>
				<?php
			}
			?>
		</div>
		<?php
	}
}
