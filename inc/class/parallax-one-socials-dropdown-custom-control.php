<?php
if( class_exists( 'WP_Customize_Control' ) ):
 
class Parallax_One_Social_Icons_Repeater extends WP_Customize_Control {
	
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}

		public function render_content() {
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
											
			$values = $this->value();
			$json = json_decode($values);
			if(!is_array($json)) $json = array($values);
			$it = 0;
 ?>
			<div id="parallax_one_icons_repeater">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php 
					if(empty($json[0]->icon_value)) {
				?>
			
						<div class="parallax_one_repeater_container">
							<label>
								<select name="<?php echo $this->id; ?>" class="parallax_one_icons">
									<?php
										foreach($icons_array as $key => $value) {
											printf('<option value="%s">%s</option>', $value, $key);
										}
									?>
								</select>
								<input type="text" class="parallax_one_icon_link" placeholder="<?php _e('Link','parallax-one'); ?>"/>
							</label>
							<button type="button" class="parallax_one_remove_field button" style="display:none;">Delete field</button>
						</div>
				<?php
					} else {
						foreach($json as $icon){
				?>
							<div class="parallax_one_repeater_container">
								<label>
									<select name="<?php echo $this->id; ?>" class="parallax_one_icons">
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
									<input type="text" value="<?php echo $icon->icon_link; ?>" class="parallax_one_icon_link" placeholder="<?php _e('Link','parallax-one'); ?>"/>
								</label>								
								<button type="button" class="parallax_one_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>>Delete field</button>

							</div>
				<?php
							$it++;
						}
					}
				?>
			</div>
			
			<input type="hidden" id="parallax_one_repeater_colector" <?php $this->link(); ?>value="<?php echo esc_textarea( $this->value() ); ?>" />
			<button type="button"   id="parallax_one_new_field" class="button add_field">Add new field</button>

			<?php
		}
}
endif;