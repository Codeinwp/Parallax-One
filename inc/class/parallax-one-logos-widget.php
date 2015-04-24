<?php

if ( ! class_exists( 'WP_Widget' ) )
	return NULL;

class parallax_one_logos_widget extends WP_Widget {



    function parallax_one_logos_widget() {

        $widget_ops = array('classname' => 'parallax_one_logos');

        $this->WP_Widget('parallax_one_logos-widget', 'Parallax One - Logos widget', $widget_ops);

    }



    function widget($args, $instance) {

        extract($args);
		
        echo $before_widget;
		
		if( !empty($instance['image_uri']) && !empty($instance['link']) ):
			if( isset($instance['new_tab']) && ($instance['new_tab'] == 'on') ):
				echo '<a href="'.apply_filters('widget_title', $instance['link'] ).'" target="_blank"><img src="'.esc_url($instance['image_uri']).'" alt="Logo"></a>';
			else:
				echo '<a href="'.apply_filters('widget_title', $instance['link'] ).'"><img src="'.esc_url($instance['image_uri']).'" alt="Logo"></a>';
			endif;
		elseif( !empty($instance['image_uri'])):
			echo '<a href=""><img src="'.esc_url($instance['image_uri']).'" alt="Logo"></a>';
		endif;
		
        echo $after_widget;

    }



    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        $instance['link'] = strip_tags( $new_instance['link'] );

        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
		
		$instance['new_tab'] = strip_tags( $new_instance['new_tab'] );

        return $instance;

    }



    function form($instance) {

?>



	<p>

        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','parallax-one'); ?></label><br />

        <input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat" />

    </p>

	<p>
		<input type="checkbox" <?php if( !empty($instance['new_tab']) ): checked($instance['new_tab'], 'on'); endif; ?> id="<?php echo $this->get_field_id('new_tab'); ?>" name="<?php echo $this->get_field_name('new_tab'); ?>" /> 
		<label for="<?php echo $this->get_field_id('new_tab'); ?>"><?php _e('Open in new tab','parallax-one'); ?></label>
	</p>

    <p>

        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image','parallax-one'); ?></label><br />

        <input type="text" class="widefat custom_media_url_clients" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>">



        <input type="button" class="button button-primary custom_media_button_clients" id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image"/>

    </p>

	

<?php

    }

}