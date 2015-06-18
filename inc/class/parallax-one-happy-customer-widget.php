<?php
if ( ! class_exists( 'WP_Widget' ) )
	return NULL;

class parallax_one_happy_customer_widget extends WP_Widget {
    function parallax_one_happy_customer_widget() {
        $widget_ops = array('classname' => 'parallax_one_happy_customer_widget');
        $this->WP_Widget('parallax_one_happy_customer_widget', 'Parallax One - Happy Customer widget', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        
		if( !empty($instance['image_uri']) || !empty($instance['title']) || !empty($instance['details']) || !empty($instance['text']) ){
			echo $before_widget;
?>
				<!-- SINGLE FEEDBACK -->
                <div class="testimonials-box">
                    <div class="feedback border-bottom-hover">
                        <div class="pic-container">
                            <div class="pic-container-inner">
								<?php
									
									if( !empty($instance['image_uri']) ):
										echo '<img src="'.esc_url($instance['image_uri']).'" alt="">';
									endif;	
								?>
                            </div>
                        </div>
                        <div class="feedback-text-wrap">
                            <h5 class="colored-text"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title'] ); endif; ?></h5>
                            <div class="small-text">
                                <?php 
									if( !empty($instance['details']) ):
										echo apply_filters('widget_title', $instance['details'] ); 
									endif;	
								?>	
                            </div>
                            <p>
                                <?php if( !empty($instance['text']) ): echo apply_filters('widget_title', $instance['text'] ); endif; ?>
                            </p>
                        </div>
                    </div>
                </div><!-- .testimonials-box -->
<?php
			echo $after_widget;
		}
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = strip_tags( $new_instance['text'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['details'] = strip_tags( $new_instance['details'] );
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }
    function form($instance) {
?>
	<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Customer name','parallax-one'); ?></label><br />
        <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat" />
    </p>
    
	<p>
        <label for="<?php echo esc_attr($this->get_field_id('details')); ?>"><?php _e('Customer details','parallax-one'); ?></label><br />
        <input type="text" name="<?php echo esc_attr($this->get_field_name('details')) ?>" id="<?php echo esc_attr($this->get_field_id('details')); ?>" value="<?php if( !empty($instance['details']) ): echo esc_attr($instance['details']); endif; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php _e('Text','parallax-one'); ?></label><br />
        <input type="text" name="<?php echo esc_attr($this->get_field_name('text')); ?>" id="<?php echo esc_attr($this->get_field_id('text')); ?>" value="<?php if( !empty($instance['text']) ): echo esc_attr($instance['text']); endif; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php _e('Image','parallax-one'); ?></label><br />
        <input type="text" class="widefat custom_media_url_testimonial" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php if( !empty($instance['image_uri']) ): echo esc_attr($instance['image_uri']); endif; ?>" >
		<input type="button" class="button button-primary custom_media_button_parallax_one_customers" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>_customers_trgger" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php _e('Upload Image','parallax-one'); ?>" />

  </p>
<?php
    }
}