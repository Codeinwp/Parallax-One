<?php
	class Parallax_One_Logos_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Logos section.<br> There you must add the "Parallax One - Logos widget"','parallax-one');
		}
	}
