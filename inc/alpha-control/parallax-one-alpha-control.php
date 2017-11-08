<?php
/**
 * Alpha control class
 *
 * @package parallax-one
 */

/**
 * Class Parallax_One_Customize_Alpha_Color_Control
 *
 * @param string $type type of color.
 * @param string $palette palette.
 * @param string $default default value.
 */
class Parallax_One_Customize_Alpha_Color_Control extends WP_Customize_Control {

	/**
	 * Type
	 *
	 * @var string $type type
	 */
	public $type = 'alphacolor';
	/**
	 * Palette of colors
	 *
	 * @var string $palette palette
	 */
	public $palette = true;
	/**
	 * Default value
	 *
	 * @var string $default default value
	 */
	public $default = '';

	/**
	 * Parallax_One_Customize_Alpha_Color_Control constructor.
	 *
	 * @param string $manager manager.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		$this->default = $this->setting->default;
	}

	/**
	 * Enqueue scripts and style.
	 */
	public function enqueue() {
		wp_enqueue_script( 'parallax-one-alpha-control', parallax_get_file( '/inc/alpha-control/js/script.js' ), array( 'jquery', 'jquery-ui-draggable' ), '1.0', true );
		wp_enqueue_style( 'parallax-one-alpha-style', parallax_get_file( '/inc/alpha-control/css/style.css' ), '1.0' );
	}

	/**
	 * The function to render the controler
	 */
	protected function render() {
		$id    = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
		$class = 'customize-control customize-control-' . $this->type; ?>
		<li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
		</li>
	<?php
	}

	/**
	 * The function to render the controler content
	 */
	public function render_content() {
	?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value() ); ?>" class="parallax-one-color-control" <?php $this->link(); ?>  />
		</label>
	<?php
	}
}

?>
