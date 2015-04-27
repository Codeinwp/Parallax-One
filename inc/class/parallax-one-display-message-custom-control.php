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
			echo $this->text;
		}
	}
