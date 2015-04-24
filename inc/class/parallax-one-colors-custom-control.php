<?php
 if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

	class Parallax_One_Colors extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the PRO version for full control over the color scheme !','parallax-one');
		}
	}
