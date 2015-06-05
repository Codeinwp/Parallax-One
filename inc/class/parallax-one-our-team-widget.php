<?php
if ( ! class_exists( 'WP_Widget' ) )
	return NULL;

class parallax_one_our_team_widget extends WP_Widget {
    function parallax_one_our_team_widget() {
        $widget_ops = array('classname' => 'parallax_one_our_team_widget');
        $this->WP_Widget('parallax_one_our_team_widget', 'Parallax One - Our Team widget', $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
?>
	
                <!-- MEMBER -->
                <div class="col-md-3 team-member-box">
                    <div class="team-member border-bottom-hover">
                        <div class="member-pic">
							<?php
								if( !empty($instance['image_uri']) ):
									echo '<img src="'.esc_url($instance['image_uri']).'" alt="alt img">';
								endif;	
							?>
                        </div><!-- .member-pic -->

                        <div class="member-details">
                            <div class="member-details-inner">
                                <h5 class="colored-text"><?php if( !empty($instance['name']) ): echo apply_filters('widget_title', $instance['name'] ); endif; ?></h5>
                                <div class="small-text">
									<?php 
										if( !empty($instance['position']) ):
											echo apply_filters('widget_title', $instance['position'] ); 
										endif;	
									?>	
                                </div>

								<?php
									$values = $instance[ 'colector' ];
									$json = json_decode($values);
									if(!is_array($json)) $json = array($values);
									
									if(!empty($json)){
										echo '<ul class="social-icons">';
										foreach($json as $icon){
											if(!empty($icon->icon_link) && !empty($icon->icon_value)){
												echo '<li><a href="'.$icon->icon_link.'">';
													echo '<span class="'.$icon->icon_value.'"></span>';
												echo '</a></li>';
											}
										}
										echo '</ul>';
									}
								?>
                                


                            </div><!-- .member-details-inner -->

                        </div><!-- .member-details -->

                    </div><!-- .team-member -->
                </div><!-- .team-member -->         
                <!-- MEMBER -->

				
<?php

    }
    function update($new_instance, $old_instance) {
		$instance = array();
		$instance['colector'] = ( ! empty( $new_instance['colector'] ) ) ? strip_tags( $new_instance['colector'] ) : '';
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
		$instance['position'] = ( ! empty( $new_instance['position'] ) ) ? strip_tags( $new_instance['position'] ) : '';
		$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
		return $instance;
    }
    function form($instance) {
		
		global $wp_customize;

					  $icons_array = array( 
												'No Icon' => '',
												'Blogger-1' => 'icon-social-blogger',
												'Blogger-2' => 'icon-social-blogger-circle',
												'Blogger-3' => 'icon-social-blogger-square',
												'Delicious-1' => 'icon-social-delicious',
												'Delicious-2' => 'icon-social-delicious-circle',
												'Delicious-3' => 'icon-social-delicious-square',
												'DeviantArt-1' => 'icon-social-deviantart',
												'DeviantArt-2' => 'icon-social-deviantart-circle',
												'DeviantArt-3' => 'icon-social-deviantart-square',
												'Dribbble-1' => 'icon-social-dribbble',
												'Dribbble-2' => 'icon-social-dribbble-circle',
												'Dribbble-3' => 'icon-social-dribbble-square',
												'Facebook-1' => 'icon-social-facebook',
												'Facebook-2' => 'icon-social-facebook-circle',
												'Facebook-3' => 'icon-social-facebook-square',
												'Flickr-1' => 'icon-social-flickr',
												'Flickr-2' => 'icon-social-flickr-circle',
												'Flickr-3' => 'icon-social-flickr-square',
												'Google Drive-1' => 'icon-social-googledrive',
												'Google Drive-2' => 'icon-social-googledrive-alt2',
												'Google Drive-3' => 'icon-social-googledrive-square',
												'Google+-1' => 'icon-social-googleplus',
												'Google+-2' => 'icon-social-googleplus-circle',
												'Ggoogle+-3' => 'icon-social-googleplus-square',
												'Instagram-1' => 'icon-social-instagram',
												'Instagram-2' => 'icon-social-instagram-circle',
												'Instagram-3' => 'icon-social-instagram-square',
												'LinkedIn-1' => 'icon-social-linkedin',
												'LinkedIn-2' => 'icon-social-linkedin-circle',
												'LinkedIn-3' => 'icon-social-linkedin-square',
												'MySpace-1' => 'icon-social-myspace',
												'MySpace-2' => 'icon-social-myspace-circle',
												'MySpace-3' => 'icon-social-myspace-square',
												'Picassa-1' => 'icon-social-picassa',
												'Picassa-2' => 'icon-social-picassa-circle',
												'Picassa-3' => 'icon-social-picassa-square',
												'Pinterest-1' => 'icon-social-pinterest',
												'Pinterest-2' => 'icon-social-pinterest-circle',
												'Pinterest-3' => 'icon-social-pinterest-square',
												'RSS-1' => 'icon-social-rss',
												'RSS-2' => 'icon-social-rss-circle',
												'RSS-3' => 'icon-social-rss-square',
												'Skype-1' => 'icon-social-skype',
												'Skype-2' => 'icon-social-skype-circle',
												'Skype-3' => 'icon-social-skype-square',
												'Spotify-1' => 'icon-social-spotify',
												'Spotify-2' => 'icon-social-spotify-circle',
												'Spotify-3' => 'icon-social-spotify-square',
												'StumbleUpon-1' => 'icon-social-stumbleupon-circle',
												'StumbleUpon-2' => 'icon-social-stumbleupon-square',
												'StumbleUpon-3' => 'icon-social-tumbleupon',
												'Tumblr-1' => 'icon-social-tumblr',
												'Tumblr-2' => 'icon-social-tumblr-circle',
												'Tumblr-3' => 'icon-social-tumblr-square',
												'Twitter-1' => 'icon-social-twitter',
												'Twitter-2' => 'icon-social-twitter-circle',
												'Twitter-3' => 'icon-social-twitter-square',
												'Vimeo-1' => 'icon-social-vimeo',
												'Vimeo-2' => 'icon-social-vimeo-circle',
												'Vimeo-3' => 'icon-social-vimeo-square',
												'Wordpress-1' => 'icon-social-wordpress',
												'Wordpress-2' => 'icon-social-wordpress-circle',
												'Wordpress-3' => 'icon-social-wordpress-square',
												'YouTube-1' => 'icon-social-youtube',
												'YouTube-2' => 'icon-social-youtube-circle',
												'YouTube-3' => 'icon-social-youtube-square'
											);
			
		if(!empty($instance[ 'colector' ])){
			$values = $instance[ 'colector' ];
			$json = json_decode($values);
			if(!is_array($json)) $json = array($values);
		}
		$it = 0;

	?>
	
	<p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image','parallax-one'); ?></label><br />
        <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>">
        <input type="button" class="button button-primary custom_media_button_parallax_one_team" id="<?php echo $this->get_field_id('image_uri'); ?>_trgger" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','parallax-one'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name','parallax-one'); ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('name'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['name']) ): echo $instance['name']; endif; ?>" class="widefat" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position','parallax-one'); ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('position'); ?>" id="<?php echo $this->get_field_id('position'); ?>" value="<?php if( !empty($instance['position']) ): echo $instance['position']; endif; ?>" class="widefat" />
    </p>
	
	<div class="parallax_one_full_repeater_control">
		<div class="parallax_one_widget_repeater">
		<?php
			if(empty($json)) {
	?>
					<div class="parallax_one_widget_repeater_container">
						<p>
							<label><?php _e('Social icon','parallax-one'); ?></label><br />
							<select class="parallax_one_icons_widget">
								<?php
									foreach($icons_array as $key => $value) {
										printf('<option value="%s">%s</option>', $value, $key);
									}
								?>
							</select>
						</p>
						
						<p>
							<label><?php _e('Social icon link','parallax-one'); ?></label><br />
							<input type="text" class="parallax_one_icon_link_widget" >
						</p>
						
						<p>
							<button type="button" class="parallax_one_remove_field_widget " style="display:none;"><?php _e('Delete field','parallax-one'); ?></button>
						</p>
						
					</div>
	<?php
			} else {
				foreach($json as $icon){
		?>
					<div class="parallax_one_widget_repeater_container">
						<p>
							<label><?php _e('Social icon','parallax-one'); ?></label><br />
							<select class="parallax_one_icons_widget">
								<?php
									foreach($icons_array as $key => $value) {
										if($icon->icon_value == $value){
											printf('<option value="%s" selected="selected">%s</option>', $value, $key);
										} else {
											printf('<option value="%s">%s</option>', $value, $key);
										}
									}
								?>
							</select>
						</p>
						
						<p>
							<label><?php _e('Social icon link','parallax-one'); ?></label><br />
							<input type="text" class="parallax_one_icon_link_widget" value="<?php if(!empty($icon->icon_link)) echo $icon->icon_link; ?>" >
						</p>
						
						<p>
							<button type="button" class="parallax_one_remove_field_widget" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','parallax-one'); ?></button>
						</p>
						
					</div>
					
		<?php
					$it++;
				}
			}
		?>	
		</div>

		
		<input type="hidden"  name="<?php echo $this->get_field_name('colector'); ?>" id="<?php echo $this->get_field_id( 'colector' ); ?>" class="parallax_one_widget_repeater_colector"  value='<?php if(!empty($instance[ "colector" ])) echo $instance[ "colector" ]; ?>' >
		<button type="button" class="add_field_widget parallax_one_widget_new_field"><?php _e('Add new field','parallax-one'); ?></button>
	</div>
<?php
    }
}