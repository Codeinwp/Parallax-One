<!-- =========================
 SECTION: TEAM   
============================== -->
<?php
	$parallax_one_our_team_title = get_theme_mod('parallax_one_our_team_title','Our Team');
	$parallax_one_our_team_subtitle = get_theme_mod('parallax_one_our_team_subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
	$parallax_one_team_content = get_theme_mod('parallax_one_team_content',
		json_encode(
			array(
					array('image_url' => parallax_get_file('/images/team/1.jpg'),'title' => esc_html__('Albert Jacobs','parallax-one'),'subtitle' => esc_html__('Founder & CEO','parallax-one')),
					array('image_url' => parallax_get_file('/images/team/2.jpg'),'title' => esc_html__('Tonya Garcia','parallax-one'),'subtitle' => esc_html__('Account Manager','parallax-one')),
					array('image_url' => parallax_get_file('/images/team/3.jpg'),'title' => esc_html__('Linda Guthrie','parallax-one'),'subtitle' => esc_html__('Business Development','parallax-one'))
			)
		)
	);

	if(!empty($parallax_one_our_team_title) || !empty($parallax_one_our_team_subtitle) || !empty($parallax_one_team_content)){
?>
		<section class="team" id="team">
			<div class="section-overlay-layer">
				<div class="container">

					<!-- SECTION HEADER -->
					<?php 
						if( !empty($parallax_one_our_team_title) || !empty($parallax_one_our_team_subtitle)){ ?>
							<div class="section-header">
							<?php
								if( !empty($parallax_one_our_team_title) ){
									echo '<h2 class="dark-text">'.esc_attr($parallax_one_our_team_title).'</h2><div class="colored-line"></div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
								}

							?>

							<?php
								if( !empty($parallax_one_our_team_subtitle) ){
									echo '<div class="sub-heading">'.esc_attr($parallax_one_our_team_subtitle).'</div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<div class="sub-heading paralax_one_only_customizer"></div>';
								}
							?>
							</div>
					<?php 
						}
			

						if(!empty($parallax_one_team_content)){
							echo '<div class="row team-member-wrap">';
							$parallax_one_team_decoded = json_decode($parallax_one_team_content);
							foreach($parallax_one_team_decoded as $parallax_one_team_member){
								if( !empty($parallax_one_team_member->image_url) ||  !empty($parallax_one_team_member->title) || !empty($parallax_one_team_member->subtitle)){?>
									<div class="col-md-3 team-member-box">
										<div class="team-member border-bottom-hover">
											<div class="member-pic">
												<?php
													if( !empty($parallax_one_team_member->image_url)){
														echo '<img src="'.esc_url($parallax_one_team_member->image_url).'" alt="">';
													} else {
														$default_url = parallax_get_file('/images/team/default.png');
														echo '<img src="'.$default_url.'" alt="">';
													}
												?>
											</div><!-- .member-pic -->

											<?php if(!empty($parallax_one_team_member->title) || !empty($parallax_one_team_member->subtitle)){?>
											<div class="member-details">
												<div class="member-details-inner">
													<?php 
													if( !empty($parallax_one_team_member->title) ){?>
														<h5 class="colored-text"><?php echo esc_attr($parallax_one_team_member->title);?></h5>
													<?php 
													}
													if( !empty($parallax_one_team_member->subtitle) ){ ?>
														<div class="small-text">
															<?php 
															   echo esc_attr($parallax_one_team_member->subtitle);
															?>	
														</div>

													<?php
													}
													?>
												</div><!-- .member-details-inner -->
											</div><!-- .member-details -->
											<?php } ?>
										</div><!-- .team-member -->
									</div><!-- .team-member -->         
									<!-- MEMBER -->
						<?php
								}
							}
							echo '</div>';
						}?>
				</div>
			</div><!-- container  -->
		</section><!-- #section9 -->
		
<?php
	}
?>