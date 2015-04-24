<?php
 if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

	class Parallax_One_Happy_Customers_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Happy Customers section.<br> There you must add the "Parallax One - Happy Customer widget"','parallax-one');
		}
	}
