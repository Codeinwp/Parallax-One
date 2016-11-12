<?php
/**
 * General repeater class
 *
 * @package parallax-one
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class Parallax_One_General_Repeater
 */
class Parallax_One_General_Repeater extends WP_Customize_Control {

	/**
	 * Id
	 *
	 * @var integer $id id
	 */
	public $id;

	/**
	 * Control for image
	 *
	 * @var bool $parallax_one_image_control Control for image
	 */
	public $parallax_one_image_control = false;

	/**
	 * Control for icon
	 *
	 * @var bool $parallax_one_icon_control Control for icon
	 */
	public $parallax_one_icon_control = false;

	/**
	 * Control for title
	 *
	 * @var bool $parallax_one_title_control Control for title
	 */
	public $parallax_one_title_control = false;

	/**
	 * Control for subtitle
	 *
	 * @var bool $parallax_one_subtitle_control Control for subtitle
	 */
	public $parallax_one_subtitle_control = false;

	/**
	 * Control for text
	 *
	 * @var bool $parallax_one_text_control Control for text
	 */
	public $parallax_one_text_control = false;

	/**
	 * Control for link
	 *
	 * @var bool $parallax_one_link_control Control for link
	 */
	public $parallax_one_link_control = false;

	/**
	 * Control for shortcode
	 *
	 * @var bool $parallax_one_shortcode_control Control for shortcode
	 */
	public $parallax_one_shortcode_control = false;

	/**
	 * Control for repeater
	 *
	 * @var bool $parallax_one_socials_repeater_control Control for repeater
	 */
	public $parallax_one_socials_repeater_control = false;

	/**
	 * Class constructor
	 *
	 * @param string  $manager Manager.
	 * @param integer $id Id.
	 * @param array   $args Array of parameters.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );

		if ( ! empty( $args['parallax_image_control'] ) ) {
			$this->parallax_one_image_control = $args['parallax_image_control'];
		}
		if ( ! empty( $args['parallax_icon_control'] ) ) {
			$this->parallax_one_icon_control = $args['parallax_icon_control'];
		}
		if ( ! empty( $args['parallax_title_control'] ) ) {
			$this->parallax_one_title_control = $args['parallax_title_control'];
		}
		if ( ! empty( $args['parallax_subtitle_control'] ) ) {
			$this->parallax_one_subtitle_control = $args['parallax_subtitle_control'];
		}
		if ( ! empty( $args['parallax_text_control'] ) ) {
			$this->parallax_one_text_control = $args['parallax_text_control'];
		}
		if ( ! empty( $args['parallax_link_control'] ) ) {
			$this->parallax_one_link_control = $args['parallax_link_control'];
		}
		if ( ! empty( $args['parallax_shortcode_control'] ) ) {
			$this->parallax_one_shortcode_control = $args['parallax_shortcode_control'];
		}
		if ( ! empty( $args['parallax_socials_repeater_control'] ) ) {
			$this->parallax_one_socials_repeater_control = $args['parallax_socials_repeater_control'];
		}
		if ( ! empty( $args['section'] ) ) {
			$this->id = $args['section'];
		}
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {

		$this_default = json_decode( $this->setting->default );

		$values = $this->value();
		$json = json_decode( $values );
		if ( ! is_array( $json ) ) {
			$json = array( $values );
		} ?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<div class="parallax_one_general_control_repeater parallax_one_general_control_droppable">
			<?php
			if ( (count( $json ) == 1 && '' === $json[0] ) || empty( $json ) ) {
				if ( ! empty( $this_default ) ) {
					$this->iterate_array( $this_default ); ?>
					<input type="hidden" id="parallax_one_<?php echo $this->id; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" value="<?php  echo esc_textarea( json_encode( $this_default ) ); ?>" />
					<?php
				} else {
					$this->iterate_array(); ?>
					<input type="hidden" id="parallax_one_<?php echo $this->id; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" />
					<?php
				}
			} else {
				$this->iterate_array( $json ); ?>
				<input type="hidden" id="parallax_one_<?php echo $this->id; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" value="<?php echo esc_textarea( $this->value() ); ?>" />
				<?php
			} ?>
		</div>

		<button type="button"   class="button add_field parallax_one_general_control_new_field">
			<?php esc_html_e( 'Add new field','parallax-one' ); ?>
		</button>

		<?php
	}


	/**
	 * Enqueue required scripts and styles.
	 */
	public function enqueue() {
		wp_enqueue_style( 'parallax-one-font-awesome', parallax_get_file( '/css/font-awesome.min.css' ),'4.7' );
		wp_enqueue_script( 'parallax-one-iconpicker', parallax_get_file( '/inc/icon-picker/js/iconpicker-engine.min.js' ), array( 'jquery' ), '1.0.2', true );
		wp_enqueue_script( 'parallax-one-iconpicker-control', parallax_get_file( '/inc/icon-picker/js/iconpicker-control.js' ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_style( 'parallax-one-iconpicker', parallax_get_file( '/inc/icon-picker/css/iconpicker.min.css' ) );
		wp_enqueue_style( 'parallax-one-stamp-icons', parallax_get_file( '/inc/icon-picker/css/stamp-icons.min.css' ),array(), '4.5.0' );
	}


	/**
	 * Icon picker input
	 *
	 * @param string $value Value of this input.
	 * @param string $show Option to show or hide this.
	 */
	private function icon_picker_control( $value = '', $show = '' ) {
		?>
		<div class="parallax_one_general_control_icon" <?php if ( $show === 'parallax_image' ) { echo 'style="display:none;"'; } ?>>
			<span class="customize-control-title">
				<?php esc_html_e( 'Icon','parallax-one' ); ?>
			</span>
			<div class="input-group icp-container">
				<input data-placement="bottomRight" class="icp icp-auto" value="<?php echo esc_attr( $value ); ?>" type="text">
				<span class="input-group-addon"></span>
			</div>
		</div>
		<?php
	}

	/**
	 * Image input
	 *
	 * @param string $value Value of this input.
	 * @param string $show Option to show or hide this.
	 */
	private function image_control( $value = '', $show = '' ) {
		?>
		<p class="parallax_one_image_control" <?php if ( $show === 'parallax_icon' ) { echo 'style="display:none;"'; } ?>>
			<span class="customize-control-title">
				<?php esc_html_e( 'Image','parallax-one' )?>
			</span>
			<input type="text" class="widefat custom_media_url" value="<?php echo esc_attr( $value ); ?>">
			<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php esc_html_e( 'Upload Image','parallax-one' ); ?>" />
		</p>
		<?php
	}

	/**
	 * Switch between icon and image input
	 *
	 * @param string $value Value of this input.
	 */
	private function icon_type_choice( $value = 'parallax_icon' ) {
		?>
		<span class="customize-control-title">
			<?php esc_html_e( 'Image type','parallax-one' );?>
		</span>
		<select class="parallax_one_image_choice">
			<option value="parallax_icon" <?php selected( $value,'parallax_icon' );?>><?php esc_html_e( 'Icon','parallax-one' ); ?></option>
			<option value="parallax_image" <?php selected( $value,'parallax_image' );?>><?php esc_html_e( 'Image','parallax-one' ); ?></option>
			<option value="parallax_none" <?php selected( $value,'parallax_none' );?>><?php esc_html_e( 'None','parallax-one' ); ?></option>
		</select>
		<?php
	}

	/**
	 * Input control.
	 *
	 * @param array  $options Settings of this input.
	 * @param string $value Value of this input.
	 */
	private function input_control( $options, $value = '' ) {
		?>
		<span class="customize-control-title"><?php echo $options['label']; ?></span>
		<?php
		if ( ! empty( $options['type'] ) && $options['type'] === 'textarea' ) {  ?>
			<textarea class="<?php echo esc_attr( $options['class'] ); ?>" placeholder="<?php echo $options['label']; ?>"><?php echo ( ! empty( $options['sanitize_callback'] ) ?  apply_filters( $options['sanitize_callback'] , $value ) : esc_attr( $value ) ); ?></textarea>
			<?php
		} else { ?>
			<input type="text" value="<?php echo ( ! empty( $options['sanitize_callback'] ) ?  apply_filters( $options['sanitize_callback'] , $value ) : esc_attr( $value ) ); ?>" class="<?php echo esc_attr( $options['class'] ); ?>" placeholder="<?php echo $options['label']; ?>"/>
			<?php
		}
	}


	/**
	 * Repeater control.
	 *
	 * @param string $value Value of this input.
	 */
	private function repeater_control( $value = '' ) {
		$social_repeater = array();
		$show_del        = 0; ?>
		<span class="customize-control-title"><?php esc_html_e( 'Social icons', 'parallax-one' ); ?></span>
		<?php
		if ( ! empty( $value ) ) {
			$social_repeater = json_decode( html_entity_decode( $value ), true );
		}
		if ( ( count( $social_repeater ) == 1 && '' === $social_repeater[0] ) || empty( $social_repeater ) ) { ?>
			<div class="parallax-one-social-repeater">
				<div class="parallax-one-social-repeater-container">
					<div class="customizer-repeater-rc input-group icp-container">
						<input data-placement="bottomRight" class="icp icp-auto" value="<?php echo esc_attr( $value ); ?>" type="text">
						<span class="input-group-addon"></span>
					</div>

					<input type="text" class="parallax_one_social_repeater_link"
						   placeholder="<?php esc_html_e( 'Link', 'parallax-one' ); ?>">
					<input type="hidden" class="parallax_one_social_repeater_id" value="">
					<button class="parallax_one_remove_social_item" style="display:none">
						<?php esc_html_e( 'X', 'parallax-one' ); ?>
					</button>
				</div>
				<input type="hidden" id="parallax_one_socials_repeater_colector" class="parallax_one_socials_repeater_colector" value=""/>
			</div>
			<button class="parallax_one_add_social_item"><?php esc_html_e( 'Add icon', 'parallax-one' ); ?></button>
			<?php
		} else { ?>
			<div class="parallax-one-social-repeater">
				<?php
				foreach ( $social_repeater as $social_icon ) {
					$show_del ++; ?>
					<div class="parallax-one-social-repeater-container">
						<div class="customizer-repeater-rc input-group icp-container">
							<input data-placement="bottomRight" class="icp icp-auto" value="<?php echo esc_attr( $social_icon['icon'] ); ?>" type="text">
							<span class="input-group-addon"></span>
						</div>
						<input type="text" class="parallax_one_social_repeater_link"
							   placeholder="<?php esc_html_e( 'Link', 'parallax-one' ); ?>"
							   value="<?php if ( ! empty( $social_icon['link'] ) ) {
									echo esc_url( $social_icon['link'] );
} ?>">
						<input type="hidden" class="parallax_one_social_repeater_id"
							   value="<?php if ( ! empty( $social_icon['id'] ) ) {
									echo esc_attr( $social_icon['id'] );
} ?>">
						<button class="parallax_one_remove_social_item"
								style="<?php if ( $show_del == 1 ) {
									echo 'display:none';
} ?>"><?php esc_html_e( 'X', 'parallax-one' ); ?></button>
					</div>
					<?php
				} ?>
				<input type="hidden" id="parallax_one_socials_repeater_colector"
					   class="parallax_one_socials_repeater_colector"
					   value="<?php echo esc_textarea( html_entity_decode( $value ) ); ?>" />
			</div>
			<button class="parallax_one_add_social_item"><?php esc_html_e( 'Add icon', 'parallax-one' ); ?></button>
			<?php
		}// End if().
	}



	/**
	 * Iterate through repeater's content
	 *
	 * @param array $array Repeater's content.
	 */
	private function iterate_array( $array = array() ) {
		$it = 0;
		if ( ! empty( $array ) ) {
			foreach ( $array as $icon ) {  ?>
				<div class="parallax_one_general_control_repeater_container parallax_one_draggable">
					<div class="parallax-customize-control-title">
						<?php esc_html_e( 'Parallax One','parallax-one' )?>
					</div>
					<div class="parallax-box-content-hidden">
						<?php
						$choice = $image_url = $icon_value = $title = $subtitle = $text = $link = $shortcode = $repeater = '';

						if ( ! empty( $icon->choice ) ) {
							$choice = $icon->choice;
						}
						if ( ! empty( $icon->image_url ) ) {
							$image_url = $icon->image_url;
						}
						if ( ! empty( $icon->icon_value ) ) {
							$icon_value = $icon->icon_value;
						}
						if ( ! empty( $icon->title ) ) {
							$title = $icon->title;
						}
						if ( ! empty( $icon->subtitle ) ) {
							$subtitle = $icon->subtitle;
						}
						if ( ! empty( $icon->text ) ) {
							$text = $icon->text;
						}
						if ( ! empty( $icon->link ) ) {
							$link = $icon->link;
						}
						if ( ! empty( $icon->shortcode ) ) {
							$shortcode = $icon->shortcode;
						}
						if ( ! empty( $icon->social_repeater ) ) {
							$repeater = $icon->social_repeater;
						}

						if ( $this->parallax_one_image_control == true && $this->parallax_one_icon_control == true ) {

							$this->icon_type_choice( $choice );
						}

						if ( $this->parallax_one_image_control == true ) {
							$this->image_control( $image_url, $choice );
						}

						if ( $this->parallax_one_icon_control == true ) {
							$this->icon_picker_control( $icon_value, $choice );
						}

						if ( $this->parallax_one_title_control == true ) {
							$this->input_control(array(
								'label' => __( 'Title','parallax-one' ),
								'class' => 'parallax_one_title_control',
							), $title);
						}

						if ( $this->parallax_one_subtitle_control == true ) {
							$this->input_control(array(
								'label' => __( 'Subtitle','parallax-one' ),
								'class' => 'parallax_one_subtitle_control',
							), $subtitle);
						}

						if ( $this->parallax_one_text_control == true ) {
							$this->input_control(array(
								'label' => __( 'Text','parallax-one' ),
								'class' => 'parallax_one_text_control',
								'type'  => 'textarea',
							), $text);
						}

						if ( $this->parallax_one_link_control ) {
							$this->input_control(array(
								'label' => __( 'Link','parallax-one' ),
								'class' => 'parallax_one_link_control',
								'sanitize_callback' => 'esc_url',
							), $link);
						}

						if ( $this->parallax_one_shortcode_control == true ) {
							$this->input_control(array(
								'label' => __( 'Shortcode','parallax-one' ),
								'class' => 'parallax_one_shortcode_control',
							), $shortcode);
						}

						if ( $this->parallax_one_socials_repeater_control == true ) {
							$this->repeater_control( $repeater );
						} ?>
						<input type="hidden" class="parallax_one_box_id" value="<?php if ( ! empty( $icon->id ) ) { echo esc_attr( $icon->id );} ?>">
						<button type="button" class="parallax_one_general_control_remove_field button" <?php if ( $it == 0 ) { echo 'style="display:none;"';} ?>><?php esc_html_e( 'Delete field','parallax-one' ); ?></button>
					</div>
				</div>

				<?php
				$it++;
			}// End foreach().
		} else { ?>
			<div class="parallax_one_general_control_repeater_container">
				<div
					class="parallax-customize-control-title"><?php esc_html_e( 'Parallax One', 'parallax-one' ) ?></div>
				<div class="parallax-box-content-hidden">
					<?php
					if ( $this->parallax_one_image_control == true && $this->parallax_one_icon_control == true ) {
						$this->icon_type_choice();
					}

					if ( $this->parallax_one_image_control == true ) {
						$this->image_control( '','parallax_icon' );
					}

					if ( $this->parallax_one_icon_control == true ) {
						$this->icon_picker_control();
					}

					if ( $this->parallax_one_title_control == true ) {
						$this->input_control( array(
							'label' => __( 'Title', 'parallax-one' ),
							'class' => 'parallax_one_title_control',
						) );
					}

					if ( $this->parallax_one_subtitle_control == true ) {
						$this->input_control( array(
							'label' => __( 'Subtitle', 'parallax-one' ),
							'class' => 'parallax_one_subtitle_control',
						) );
					}

					if ( $this->parallax_one_text_control == true ) {
						$this->input_control( array(
							'label' => __( 'Text', 'parallax-one' ),
							'class' => 'parallax_one_text_control',
							'type'  => 'textarea',
						) );
					}

					if ( $this->parallax_one_link_control == true ) {
						$this->input_control( array(
							'label' => __( 'Link', 'parallax-one' ),
							'class' => 'parallax_one_link_control',
						) );
					}

					if ( $this->parallax_one_shortcode_control == true ) {
						$this->input_control( array(
							'label' => __( 'Shortcode', 'parallax-one' ),
							'class' => 'parallax_one_shortcode_control',
						) );
					}

					if ( $this->parallax_one_shortcode_control == true ) {
						$this->repeater_control();
					}
					?>
					<input type="hidden" class="parallax_one_box_id">
					<button type="button" class="parallax_one_general_control_remove_field button"
							style="display:none;"><?php esc_html_e( 'Delete field', 'parallax-one' ); ?></button>
				</div>
			</div>
			<?php
		}// End if().
	}
}
