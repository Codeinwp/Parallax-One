<?php
 if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

	class Parallax_One_Display_Message extends WP_Customize_Control
	{
		   private $text = "";

		public function __construct($manager, $id, $args = array(), $text = "")
		{
			$this->text = $text;

			parent::__construct( $manager, $id, $args );
		}
		public function render_content()
		{
			echo '<label>';
			if(!empty( $this->label )) {
				echo '<span class="customize-control-title">'.esc_html( $this->label ).'</span>';
			}
			echo esc_attr($this->text);
			echo '</label>';
		}
	}
