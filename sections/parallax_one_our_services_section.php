<!-- =========================
 SECTION: SERVICES
============================== -->
<?php
global $wp_customize;
$parallax_one_our_services_title = get_theme_mod( 'parallax_one_our_services_title', esc_html__( 'Our Services', 'parallax-one' ) );
$parallax_one_our_services_subtitle = get_theme_mod( 'parallax_one_our_services_subtitle', esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'parallax-one' ) );
$parallax_one_services = get_theme_mod('parallax_one_services_content', json_encode( array(
	array('choice'=>'parallax_icon','icon_value' => 'icon-basic-webpage-multiple','title' => esc_html__('Lorem Ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one')),
	array('choice'=>'parallax_icon','icon_value' => 'icon-ecommerce-graph3','title' => esc_html__('Lorem Ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one')),
	array('choice'=>'parallax_icon','icon_value' => 'icon-basic-geolocalize-05','title' => esc_html__('Lorem Ipsum','parallax-one'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','parallax-one'))
) )	);
$parallax_one_services_pinterest = get_theme_mod('paralax_one_services_pinterest_style','5');

if(!empty($parallax_one_our_services_title) || !empty($parallax_one_our_services_subtitle) || !parallax_one_general_repeater_is_empty($parallax_one_services)){ 
	parallax_hook_services_before(); ?>
	
	<section class="services" id="services" role="region" aria-label="<?php esc_html_e('Services','parallax-one') ?>">
		<?php 
		parallax_hook_services_top(); ?>
		<div class="section-overlay-layer">
			<div class="container">

				<div class="section-header">
					<?php
					if( !empty( $parallax_one_our_services_title ) ){ ?>
						<h2 class="dark-text"><?php echo esc_attr($parallax_one_our_services_title); ?></h2><div class="colored-line"></div>
					<?php
					} elseif ( isset( $wp_customize ) ) { ?>
						<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
					<?php
					} 
					
					if( !empty( $parallax_one_our_services_subtitle ) ){ ?>
						<div class="sub-heading"><?php echo esc_attr($parallax_one_our_services_subtitle); ?></div>
					<?php
					} elseif ( isset( $wp_customize ) ) { ?>
						<div class="sub-heading paralax_one_only_customizer"></div>
					<?php
					}?>
				</div>

				<?php
				if( !empty( $parallax_one_services ) ){
					$parallax_one_services_decoded = json_decode( $parallax_one_services );?>
					<div id="our_services_wrap" class="services-wrap <?php if( !empty($parallax_one_services_pinterest) ) echo 'our_services_wrap_piterest'; ?>">
						<?php
						foreach( $parallax_one_services_decoded as $parallax_one_service_box ){
							if( ( !empty( $parallax_one_service_box->icon_value ) && $parallax_one_service_box->icon_value != 'No Icon' && $parallax_one_service_box->choice == 'parallax_icon' )  || ( !empty( $parallax_one_service_box->image_url )  && $parallax_one_service_box->choice == 'parallax_image' ) || !empty( $parallax_one_service_box->title ) || !empty( $parallax_one_service_box->text ) ){ ?>
								<div class="service-box">
									<?php
									parallax_hook_services_entry_before(); ?>
									<div class="single-service border-bottom-hover">
										<?php
										parallax_hook_services_entry_top();
										if( !empty( $parallax_one_service_box->choice ) && $parallax_one_service_box->choice !== 'parallax_none' ){

											if( $parallax_one_service_box->choice == 'parallax_icon' ){
												if( !empty($parallax_one_service_box->icon_value) ) {
													if( !empty($parallax_one_service_box->link) ){
														if( function_exists ( 'icl_t' ) && !empty( $parallax_one_service_box->id ) ){
															$parallax_one_link_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area link', $parallax_one_service_box->link );
															$parallax_one_icon_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area icon', $parallax_one_service_box->icon_value ); ?>
															<div class="service-icon colored-text">
																<a href="<?php echo esc_url( $parallax_one_link_services ); ?>">
																	<span class="<?php echo esc_attr( $parallax_one_icon_services ); ?>"></span>
																</a>
															</div>
														<?php
														} else { ?>
															<div class="service-icon colored-text">
																<a href="<?php echo esc_url( $parallax_one_service_box->link ); ?>">
																	<span class="<?php echo esc_attr( $parallax_one_service_box->icon_value ); ?>"></span>
																</a>
															</div>
														<?php
														}
													} else { 
														if ( function_exists ( 'icl_t' ) && !empty( $parallax_one_service_box->id ) ){ 
															$parallax_one_icon_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area icon', $parallax_one_service_box->icon_value ); ?>
															<div class="service-icon colored-text">
																<span class="<?php echo esc_attr( $parallax_one_icon_services ) ?>"></span>
															</div>
														<?php
														} else { ?>
															<div class="service-icon colored-text">
																<span class="<?php echo esc_attr( $parallax_one_service_box->icon_value ) ?>"></span>
															</div>
														<?php
														}
													}
												}
											}

											if( $parallax_one_service_box->choice == 'parallax_image' ){
												if( !empty($parallax_one_service_box->image_url)){
													if( !empty($parallax_one_service_box->link) ){
														if(!empty($parallax_one_service_box->title)){
															if( function_exists ( 'icl_t' ) && !empty( $parallax_one_service_box->id ) ){
																$parallax_one_title_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area title',$parallax_one_service_box->title);
																$parallax_one_link_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area link', $parallax_one_service_box->link);
																$parallax_one_image_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area image', $parallax_one_service_box->image_url ); ?>
																<a href="<?php echo esc_url( $parallax_one_link_services ); ?>">
																	<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_image_services ) ); ?>" alt="<?php echo esc_html( $parallax_one_title_services ); ?>"/>
																</a>
															<?php
															} else {?>
																<a href="<?php echo esc_url( $parallax_one_service_box->link ); ?>">
																	<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_service_box->image_url ) ); ?>" alt="<?php echo esc_html( $parallax_one_service_box->title ); ?>"/>
																</a>
															<?php	
															}
														} else {
															if (function_exists ( 'icl_t' ) && !empty($parallax_one_service_box->id)){
																$parallax_one_link_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area link', $parallax_one_service_box->link);
																$parallax_one_image_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area image', $parallax_one_service_box->image_url ); ?>
																<a href="<?php echo esc_url( $parallax_one_link_services ); ?>">
																	<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_image_services ) ); ?>" alt="<?php esc_html_e('Featured Image','parallax-one'); ?>"/>
																</a>
															<?php
															} else { ?>
																<a href="<?php echo esc_url($parallax_one_service_box->link); ?>">
																	<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_service_box->image_url ) ) ?>" alt="<?php esc_html_e('Featured Image','parallax-one'); ?>"/>
																</a>
															<?php
															}
														}
													} else {
														if(!empty($parallax_one_service_box->title)){
															if (function_exists ( 'icl_t' ) && !empty($parallax_one_service_box->id)){
																$parallax_one_image_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area image', $parallax_one_service_box->image_url );
																$parallax_one_title_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area title', $parallax_one_service_box->title); ?>
																<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_image_services ) ); ?>" alt="<?php echo esc_html( $parallax_one_title_services ); ?>"/>
															<?php
															} else { ?>
																<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_service_box->image_url ) ); ?>" alt="<?php echo esc_html( $parallax_one_service_box->title ); ?>"/>	
															<?php
															}
														} else { ?>
															<img src="<?php echo parallax_one_make_protocol_relative_url( esc_url( $parallax_one_service_box->image_url ) ); ?>" alt="<?php esc_html_e('Featured Image','parallax-one');?>"/>
														<?php
														}
													}
												}
											}
										}
											
										if( !empty( $parallax_one_service_box->title ) ){
											if( !empty( $parallax_one_service_box->link ) ){
												if (function_exists ( 'icl_t' ) && !empty($parallax_one_service_box->id)){
														$parallax_one_title_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area title',$parallax_one_service_box->title);
														$parallax_one_link_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area link', $parallax_one_service_box->link); ?>
														<h3 class="colored-text">
															<a href="<?php echo esc_url($parallax_one_link_services); ?>"><?php echo esc_attr($parallax_one_title_services); ?></a>
														</h3>
												<?php
												} else { ?>
													<h3 class="colored-text">
														<a href="<?php echo esc_url($parallax_one_service_box->link) ?>"><?php echo esc_attr( $parallax_one_service_box->title ); ?></a>
													</h3>
												<?php
												}
											} else {
												if (function_exists ( 'icl_t' ) && !empty($parallax_one_service_box->id)){
													$parallax_one_title_services = icl_t('Featured Area '.$parallax_one_service_box->id, 'Featured area title',$parallax_one_service_box->title ); ?>
													<h3 class="colored-text"><?php echo esc_attr( $parallax_one_title_services ); ?></h3>
												<?php
												} else { ?>
													<h3 class="colored-text"><?php echo esc_attr($parallax_one_service_box->title); ?></h3>
												<?php
												}
											}
										}
											
										if( !empty( $parallax_one_service_box->text ) ){
											if( function_exists ( 'icl_t' ) && !empty( $parallax_one_service_box->id ) ){ 
												$parallax_one_text_services = icl_t( 'Featured Area '.$parallax_one_service_box->id, 'Featured area text', html_entity_decode( $parallax_one_service_box->text ) ); ?>
												<p><?php echo $parallax_one_text_services; ?></p>
											<?php
											} else { ?>
												<p><?php echo html_entity_decode( $parallax_one_service_box->text ); ?></p>
											<?php
											}
										}
										
										parallax_hook_services_entry_bottom(); ?>
									</div>
									<?php
									parallax_hook_services_entry_after(); ?>
								</div>
							<?php
							}
						} ?>
					</div>
				<?php
				} ?>
			</div>
		</div>
		<?php parallax_hook_services_bottom(); ?>
	</section>
	<?php parallax_hook_services_after(); ?>
<?php
} else {
	if( isset( $wp_customize ) ) { 
		parallax_hook_services_before(); ?>
		<section class="services paralax_one_only_customizer" id="services" role="region" aria-label="<?php esc_html_e('Services','parallax-one') ?>">
			<?php parallax_hook_services_top(); ?>
			<div class="section-overlay-layer">
				<div class="container">
					<div class="section-header">
						<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>
						<div class="sub-heading paralax_one_only_customizer"></div>
					</div>
				</div>
			</div>
			<?php parallax_hook_services_bottom(); ?>
		</section>
		<?php parallax_hook_services_after();
	}
} ?>