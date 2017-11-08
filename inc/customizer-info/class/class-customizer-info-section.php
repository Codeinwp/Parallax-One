<?php
/**
 * Customizer info main class.
 *
 * @package parallax-one
 */

/**
 * Pro customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Customizer_Info extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'customizer-info';


	/**
	 * Label title to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $section_title = '';


	/**
	 * Label text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $section_text = '';

	/**
	 * Button url.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $section_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function json() {
		$json                  = parent::json();
		$json['section_text']  = $this->section_text;
		$json['section_title'] = $this->section_title;
		$json['section_url']   = $this->section_url;
		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() {
	?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				<# if ( data.section_url){ #>
					<# if ( data.section_title ) { #>
						{{{data.section_title}}}
					<# } #>
					<# if ( data.section_text && data.section_url ) { #>
						<a class="button button-secondary alignright" href="{{data.section_url}}" target="_blank">
							{{data.section_text}}
						</a>
					<# } #>
				<# } #>
			</h3>
		</li>
		<?php
	}
}
