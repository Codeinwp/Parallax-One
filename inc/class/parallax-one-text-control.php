<?php
/**
 * Class for messages controls in customizer
 *
 * @package parallax-one
 */

/**
 * Class Parallax_One_Message
 */
class Parallax_One_Message extends WP_Customize_Control {

	/**
	 * The message to display in the controler
	 *
	 * @var string $message The message to display in the controler
	 */
	private $message = '';

	/**
	 * Parallax_One_Message constructor.
	 *
	 * @param string  $manager Manager.
	 * @param integer $id Id.
	 * @param array   $args Array of arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['parallax_message'] ) ) {
			$this->message = $args['parallax_message'];
		}
	}

	/**
	 * The render function for the controler
	 */
	public function render_content() {
		echo '<span class="customize-control-title">' . $this->label . '</span>';
		echo $this->message;
	}
}

