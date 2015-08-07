<!-- =========================
 SECTION: LATEST NEWS   
============================== -->
<?php

	$parallax_number_of_posts = get_option('posts_per_page');
	$args = array( 'post_type' => 'post', 'posts_per_page' => $parallax_number_of_posts, 'order' => 'DESC','ignore_sticky_posts' => true );
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		$parallax_one_latest_news_title = get_theme_mod('parallax_one_latest_news_title',esc_html__('Latest news','parallax-one'));
		if($parallax_number_of_posts > 0) {
		?>
			<section class="brief timeline" id="latestnews">
				<div class="section-overlay-layer">
					<div class="container">
						<div class="row">

							<!-- TIMELINE HEADING / TEXT  -->
							<?php
								if(!empty($parallax_one_latest_news_title)){
									echo '<div class="col-md-12 timeline-text text-left"><h2 class="text-left dark-text">'.esc_attr($parallax_one_latest_news_title).'</h2><div class="colored-line-left"></div></div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<div class="col-md-12 timeline-text text-left paralax_one_only_customizer"><h2 class="text-left dark-text "></h2><div class="colored-line-left "></div></div>';
								}
							?>

							<div class="parallax-slider-whole-wrap">
								<div class="controls-wrap">
									<a class="control_next"><div class="icon icon-arrow-carrot-down"></div></a>
									<a class="control_prev fade-btn"><div class="icon icon-arrow-carrot-up"></div></a>
								</div>
								<!-- TIMLEINE SCROLLER -->
								<div id="parallax_slider" class="col-md-12 timeline-section">
									<ul class="vertical-timeline" id="timeline-scroll">

										<?php

											$i_latest_posts= 0;

											while (  $the_query->have_posts() ) :  $the_query->the_post();

												$i_latest_posts++;


												if ( !wp_is_mobile() ){
													if($i_latest_posts % 2 == 1){
														echo '<li>';
													}
												} else  {
													echo '<li>';
												}
										?>

												<div class="timeline-box-wrap">
													<div class="date small-text strong">
													<?php echo get_the_date('M, j'); ?>
													</div>
													<div class="icon-container white-text">
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php 

																if ( has_post_thumbnail() ) :
																	the_post_thumbnail('parallax-one-post-thumbnail-latest-news');
																else: ?>
																	<img src="<?php echo parallax_get_file('/images/no-thumbnail-latest-news.jpg'); ?>" width="150" height="150" alt="<?php the_title(); ?>">
															<?php 
																endif; 
															?>
														</a>
													</div>
													<div class="info">
														<header class="entry-header">
															<h1 class="entry-title">
																<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
															</h1>
															<div class="entry-meta">
																<span class="entry-date">
																	<a href="<?php echo esc_url( get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')) ) ?>" rel="bookmark">
																		<time class="entry-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
																	</a>
																</span>
																<span> <?php esc_html_e('by','parallax-one');?> </span>
																<span class="byline">
																	<span class="author vcard">
																		<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" rel="author"><?php the_author(); ?> </a>
																	</span>
																</span>
															</div><!-- .entry-meta -->
														</header>
														<div class="entry-content">
															<?php the_excerpt(); ?>
															<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more"><?php esc_html_e('Read more','parallax-one'); ?></a>
														</div>
													</div>
												</div>

											<?php
											if ( !wp_is_mobile() ){
												if($i_latest_posts % 4 == 0){
													echo '</li>';
												}
											} else {
												echo '</li>';
											}

										endwhile;
										wp_reset_postdata(); 
										?>
									</ul>
								</div>
							</div><!-- .parallax-slider-whole-wrap -->
						</div>
					</div>
				</div>
			</section>
	<?php
		}
	} ?>