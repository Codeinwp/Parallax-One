<?php
	if ( ! class_exists( 'WP_Widget' ) )
		return NULL;
	
	class parallax_one_our_services_widget extends WP_Widget {
		
		function parallax_one_our_services_widget() {
			$widget_ops = array('classname' => 'parallax_one_our_services_widget');
			$this->WP_Widget('parallax_one_our_services_widget', 'Parallax One - Our Services widget', $widget_ops);
		}
		
		function widget($args, $instance) {
			extract($args);
?>
		<div class="col-md-4 service-box">
			<div class="single-service border-bottom-hover">
				
					<?php 
					if( !empty($instance['parallax_one_icon_type_our_services']) ){
						if ( $instance['parallax_one_icon_type_our_services'] == 'parallax_icon' ){
							if( !empty($instance['services_icon']) ) {
								echo '<div class="service-icon colored-text"><span class="'.$instance['services_icon'].'"></span></div>';
							}
						}
						if( $instance['parallax_one_icon_type_our_services'] == 'parallax_image' ){
							if( !empty($instance['image_uri'])){
								echo '<img src="'.$instance['image_uri'].'"/>';
							}
						}
					}

					if(!empty($instance['service_title'])){
						echo '<h3 class="colored-text">'.$instance['service_title'].'</h3>';
					}
					
					if(!empty($instance['service_content'])){
						echo '<p>'. $instance['service_content'].'</p>';
					}
				?>

			</div>
		</div><!-- .service-box -->
<?php
		}
		
		function update($new_instance, $old_instance) {
			$instance = array();
			$instance['service_title'] = ( ! empty( $new_instance['service_title'] ) ) ? strip_tags( $new_instance['service_title'] ) : '';
			$instance['service_content'] = ( ! empty( $new_instance['service_content'] ) ) ? strip_tags( $new_instance['service_content'] ) : '';
			$instance['services_icon'] = ( ! empty( $new_instance['services_icon'] ) ) ? strip_tags( $new_instance['services_icon'] ) : '';
			$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
			$instance['parallax_one_icon_type_our_services'] = ( ! empty( $new_instance['parallax_one_icon_type_our_services'] ) ) ? strip_tags( $new_instance['parallax_one_icon_type_our_services'] ) : '';
			return $instance;
		}
		
		function form($instance) {
			$icons_array = array( 'No Icon','icon-weather-wind-e','icon-weather-wind-n','icon-weather-wind-ne','icon-weather-wind-nw','icon-weather-wind-s','icon-weather-wind-se','icon-weather-wind-sw','icon-weather-wind-w','icon-software-add-vectorpoint','icon-software-box-oval','icon-software-box-polygon','icon-software-crop','icon-software-eyedropper','icon-software-font-allcaps','icon-software-font-kerning','icon-software-horizontal-align-center','icon-software-layout','icon-software-layout-4boxes','icon-software-layout-header','icon-software-layout-header-2columns','icon-software-layout-header-3columns','icon-software-layout-header-4boxes','icon-software-layout-header-4columns','icon-software-layout-header-complex','icon-software-layout-header-complex2','icon-software-layout-header-complex3','icon-software-layout-header-complex4','icon-software-layout-header-sideleft','icon-software-layout-header-sideright','icon-software-layout-sidebar-left','icon-software-layout-sidebar-right','icon-software-paragraph-align-left','icon-software-paragraph-align-right','icon-software-paragraph-center','icon-software-paragraph-justify-all','icon-software-paragraph-justify-center','icon-software-paragraph-justify-left','icon-software-paragraph-justify-right','icon-software-pathfinder-exclude','icon-software-pathfinder-intersect','icon-software-pathfinder-subtract','icon-software-pathfinder-unite','icon-software-pen','icon-software-pencil','icon-software-scale-expand','icon-software-scale-reduce','icon-software-vector-box','icon-software-vertical-align-bottom','icon-software-vertical-distribute-bottom','icon-music-beginning-button','icon-music-bell','icon-music-eject-button','icon-music-end-button','icon-music-fastforward-button','icon-music-headphones','icon-music-microphone-old','icon-music-mixer','icon-music-pause-button','icon-music-play-button','icon-music-rewind-button','icon-music-shuffle-button','icon-music-stop-button','icon-ecommerce-bag','icon-ecommerce-bag-check','icon-ecommerce-bag-cloud','icon-ecommerce-bag-download','icon-ecommerce-bag-plus','icon-ecommerce-bag-upload','icon-ecommerce-basket-check','icon-ecommerce-basket-cloud','icon-ecommerce-basket-download','icon-ecommerce-basket-upload','icon-ecommerce-bath','icon-ecommerce-cart','icon-ecommerce-cart-check','icon-ecommerce-cart-cloud','icon-ecommerce-cart-content','icon-ecommerce-cart-download','icon-ecommerce-cart-plus','icon-ecommerce-cart-upload','icon-ecommerce-cent','icon-ecommerce-colon','icon-ecommerce-creditcard','icon-ecommerce-diamond','icon-ecommerce-dollar','icon-ecommerce-euro','icon-ecommerce-franc','icon-ecommerce-gift','icon-ecommerce-graph1','icon-ecommerce-graph2','icon-ecommerce-graph3','icon-ecommerce-graph-decrease','icon-ecommerce-graph-increase','icon-ecommerce-guarani','icon-ecommerce-kips','icon-ecommerce-lira','icon-ecommerce-money','icon-ecommerce-naira','icon-ecommerce-pesos','icon-ecommerce-pound','icon-ecommerce-receipt','icon-ecommerce-sale','icon-ecommerce-sales','icon-ecommerce-tugriks','icon-ecommerce-wallet','icon-ecommerce-won','icon-ecommerce-yen','icon-ecommerce-yen2','icon-basic-elaboration-briefcase-check','icon-basic-elaboration-briefcase-download','icon-basic-elaboration-browser-check','icon-basic-elaboration-browser-download','icon-basic-elaboration-browser-plus','icon-basic-elaboration-calendar-check','icon-basic-elaboration-calendar-cloud','icon-basic-elaboration-calendar-download','icon-basic-elaboration-calendar-empty','icon-basic-elaboration-calendar-heart','icon-basic-elaboration-cloud-download','icon-basic-elaboration-cloud-check','icon-basic-elaboration-cloud-search','icon-basic-elaboration-cloud-upload','icon-basic-elaboration-document-check','icon-basic-elaboration-document-graph','icon-basic-elaboration-folder-check','icon-basic-elaboration-folder-cloud','icon-basic-elaboration-mail-document','icon-basic-elaboration-mail-download','icon-basic-elaboration-message-check','icon-basic-elaboration-message-dots','icon-basic-elaboration-message-happy','icon-basic-elaboration-tablet-pencil','icon-basic-elaboration-todolist-2','icon-basic-elaboration-todolist-check','icon-basic-elaboration-todolist-cloud','icon-basic-elaboration-todolist-download','icon-basic-accelerator','icon-basic-anticlockwise','icon-basic-battery-half','icon-basic-bolt','icon-basic-book','icon-basic-book-pencil','icon-basic-bookmark','icon-basic-calendar','icon-basic-cards-hearts','icon-basic-case','icon-basic-clessidre','icon-basic-cloud','icon-basic-clubs','icon-basic-compass','icon-basic-cup','icon-basic-display','icon-basic-download','icon-basic-exclamation','icon-basic-eye','icon-basic-gear','icon-basic-geolocalize-01','icon-basic-geolocalize-05','icon-basic-headset','icon-basic-heart','icon-basic-home','icon-basic-laptop','icon-basic-lightbulb','icon-basic-link','icon-basic-lock','icon-basic-lock-open','icon-basic-magnifier','icon-basic-magnifier-minus','icon-basic-magnifier-plus','icon-basic-mail','icon-basic-mail-multiple','icon-basic-mail-open-text','icon-basic-male','icon-basic-map','icon-basic-message','icon-basic-message-multiple','icon-basic-message-txt','icon-basic-mixer2','icon-basic-notebook-pencil','icon-basic-paperplane','icon-basic-photo','icon-basic-picture','icon-basic-picture-multiple','icon-basic-rss','icon-basic-server2','icon-basic-settings','icon-basic-share','icon-basic-sheet-multiple','icon-basic-sheet-pencil','icon-basic-sheet-txt','icon-basic-tablet','icon-basic-todo','icon-basic-webpage','icon-basic-webpage-img-txt','icon-basic-webpage-multiple','icon-basic-webpage-txt','icon-basic-world','icon-arrows-check','icon-arrows-circle-check','icon-arrows-circle-down','icon-arrows-circle-downleft','icon-arrows-circle-downright','icon-arrows-circle-left','icon-arrows-circle-minus','icon-arrows-circle-plus','icon-arrows-circle-remove','icon-arrows-circle-right','icon-arrows-circle-up','icon-arrows-circle-upleft','icon-arrows-circle-upright','icon-arrows-clockwise','icon-arrows-clockwise-dashed','icon-arrows-down','icon-arrows-down-double-34','icon-arrows-downleft','icon-arrows-downright','icon-arrows-expand','icon-arrows-glide','icon-arrows-glide-horizontal','icon-arrows-glide-vertical','icon-arrows-keyboard-alt','icon-arrows-keyboard-cmd-29','icon-arrows-left','icon-arrows-left-double-32','icon-arrows-move2','icon-arrows-remove','icon-arrows-right','icon-arrows-right-double-31','icon-arrows-rotate','icon-arrows-plus','icon-arrows-shrink','icon-arrows-slim-left','icon-arrows-slim-left-dashed','icon-arrows-slim-right','icon-arrows-slim-right-dashed','icon-arrows-squares','icon-arrows-up','icon-arrows-up-double-33','icon-arrows-upleft','icon-arrows-upright','icon-browser-streamline-window','icon-bubble-comment-streamline-talk','icon-caddie-shopping-streamline','icon-computer-imac','icon-edit-modify-streamline','icon-home-house-streamline','icon-locker-streamline-unlock','icon-lock-locker-streamline','icon-link-streamline','icon-man-people-streamline-user','icon-speech-streamline-talk-user','icon-settings-streamline-2','icon-settings-streamline-1','icon-arrow-carrot-left','icon-arrow-carrot-right','icon-arrow-carrot-up','icon-arrow-carrot-right-alt2','icon-arrow-carrot-down-alt2','icon-arrow-carrot-left-alt2','icon-arrow-carrot-up-alt2','icon-arrow-carrot-2up','icon-arrow-carrot-2right-alt2','icon-arrow-carrot-2up-alt2','icon-arrow-carrot-2right','icon-arrow-carrot-2left-alt2','icon-arrow-carrot-2left','icon-arrow-carrot-2down-alt2','icon-arrow-carrot-2down','icon-arrow-carrot-down','icon-arrow-left','icon-arrow-right','icon-arrow-triangle-down','icon-arrow-triangle-left','icon-arrow-triangle-right','icon-arrow-triangle-up','icon-adjust-vert','icon-bag-alt','icon-box-checked','icon-camera-alt','icon-check','icon-chat-alt','icon-cart-alt','icon-check-alt2','icon-circle-empty','icon-circle-slelected','icon-clock-alt','icon-close-alt2','icon-cloud-download-alt','icon-cloud-upload-alt','icon-compass-alt','icon-creditcard','icon-datareport','icon-easel','icon-lightbulb-alt','icon-laptop','icon-lock-alt','icon-lock-open-alt','icon-link','icon-link-alt','icon-map-alt','icon-mail-alt','icon-piechart','icon-star-half','icon-star-half-alt','icon-star-alt','icon-ribbon-alt','icon-tools','icon-paperclip','icon-adjust-horiz','icon-social-blogger','icon-social-blogger-circle','icon-social-blogger-square','icon-social-delicious','icon-social-delicious-circle','icon-social-delicious-square','icon-social-deviantart','icon-social-deviantart-circle','icon-social-deviantart-square','icon-social-dribbble','icon-social-dribbble-circle','icon-social-dribbble-square','icon-social-facebook','icon-social-facebook-circle','icon-social-facebook-square','icon-social-flickr','icon-social-flickr-circle','icon-social-flickr-square','icon-social-googledrive','icon-social-googledrive-alt2','icon-social-googledrive-square','icon-social-googleplus','icon-social-googleplus-circle','icon-social-googleplus-square','icon-social-instagram','icon-social-instagram-circle','icon-social-instagram-square','icon-social-linkedin','icon-social-linkedin-circle','icon-social-linkedin-square','icon-social-myspace','icon-social-myspace-circle','icon-social-myspace-square','icon-social-picassa','icon-social-picassa-circle','icon-social-picassa-square','icon-social-pinterest','icon-social-pinterest-circle','icon-social-pinterest-square','icon-social-rss','icon-social-rss-circle','icon-social-rss-square','icon-social-share','icon-social-share-circle','icon-social-share-square','icon-social-skype','icon-social-skype-circle','icon-social-skype-square','icon-social-spotify','icon-social-spotify-circle','icon-social-spotify-square','icon-social-stumbleupon-circle','icon-social-stumbleupon-square','icon-social-tumbleupon','icon-social-tumblr','icon-social-tumblr-circle','icon-social-tumblr-square','icon-social-twitter','icon-social-twitter-circle','icon-social-twitter-square','icon-social-vimeo','icon-social-vimeo-circle','icon-social-vimeo-square','icon-social-wordpress','icon-social-wordpress-circle','icon-social-wordpress-square','icon-social-youtube','icon-social-youtube-circle','icon-social-youtube-square','icon-aim','icon-aim-alt','icon-amazon','icon-app-store','icon-apple','icon-behance','icon-creative-commons','icon-dropbox','icon-digg','icon-last','icon-paypal','icon-rss','icon-sharethis','icon-skype','icon-squarespace','icon-technorati','icon-whatsapp','icon-windows','icon-reddit','icon-foursquare','icon-soundcloud','icon-w3','icon-wikipedia','icon-grid-2x2','icon-grid-3x3','icon-menu-square-alt','icon-menu','icon-cloud-alt','icon-tags-alt','icon-tag-alt','icon-gift-alt','icon-comment-alt','icon-icon-phone','icon-icon-mobile','icon-icon-house-alt','icon-icon-house','icon-icon-desktop');			
			$default_icon = ( ! empty( $instance['parallax_one_icon_type_our_services'] ) ) ? $instance['parallax_one_icon_type_our_services'] : 'parallax_no_icon';
?>
			<p>
				<label><?php _e('Image type:','parallax-one'); ?></label>
				<br/>
				<input type="radio" class="parallax_one_icon_type_our_services" id="<?php echo ($this->get_field_id( 'parallax_one_icon_type_our_services' ) . '-parallax_image') ?>" name="<?php echo ($this->get_field_name( 'parallax_one_icon_type_our_services' )) ?>" value="parallax_image" <?php checked( $default_icon == 'parallax_image', true) ?>><?php _e('Image','parallax-one'); ?><br/>
				<input type="radio" class="parallax_one_icon_type_our_services" id="<?php echo ($this->get_field_id( 'parallax_one_icon_type_our_services' ) . '-parallax_icon') ?>" name="<?php echo ($this->get_field_name( 'parallax_one_icon_type_our_services' )) ?>" value="parallax_icon" <?php checked( $default_icon == 'parallax_icon', true) ?>><?php _e('Icon','parallax-one'); ?><br/>
				<input type="radio" class="parallax_one_icon_type_our_services" id="<?php echo ($this->get_field_id( 'parallax_one_icon_type_our_services' ) . '-parallax_no_icon') ?>" name="<?php echo ($this->get_field_name( 'parallax_one_icon_type_our_services' )) ?>" value="parallax_no_icon" <?php checked( $default_icon == 'parallax_no_icon', true) ?>><?php _e('Empty','parallax-one'); ?><br/>
			</p>
			
			<p class="parallax_one_our_services_image_control" <?php if( !empty($instance['parallax_one_icon_type_our_services'] ) && $instance['parallax_one_icon_type_our_services'] != 'parallax_image') echo 'style="display:none"'; ?>>
				<label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image','parallax-one'); ?></label><br />
				<input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>">
				<input type="button" class="button button-primary custom_media_button_parallax_one_services" id="<?php echo $this->get_field_id('image_uri'); ?>_services_trgger" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','parallax-one'); ?>" />
			</p>
			
			<p class="parallax_one_our_services_icon_control" <?php if( !empty($instance['parallax_one_icon_type_our_services']) && $instance['parallax_one_icon_type_our_services'] != 'parallax_icon') echo 'style="display:none"'; ?>>
				<label for="<?php echo $this->get_field_name('services_icon'); ?>"><?php _e('Icon','parallax-one'); ?></label><br />
				<select class="parallax_one_our_services_icons_widget" id="<?php echo $this->get_field_id('services_icon'); ?>" name="<?php echo $this->get_field_name('services_icon'); ?>">
					<?php
						foreach($icons_array as $icon) {
							if( !empty($instance['services_icon']) && $instance['services_icon'] == $icon) {
								echo '<option value="'.$icon.'" selected>'.$icon.'</option>';
							} else {
								echo '<option value="'.$icon.'">'.$icon.'</option>';
							}
						}
					?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_name('service_title'); ?>"><?php _e('Service title','parallax-one'); ?></label><br />
				<input type="text" name="<?php echo $this->get_field_name('service_title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['service_title']) ): echo $instance['service_title']; endif; ?>" class="widefat" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('service_content'); ?>"><?php _e('Service content','parallax-one'); ?></label><br />
				<textarea name="<?php echo $this->get_field_name('service_content'); ?>" style="width: 100%; height: 150px; resize: none;" ><?php if( !empty($instance['service_content']) ): echo $instance['service_content']; endif; ?></textarea>
			</p>

<?php
		}
	}

?>