<!-- =========================
 SECTION: LATEST NEWS   
============================== -->
<?php
	global $wp_customize;
	$parallax_number_of_posts = get_option('posts_per_page');
	if( $parallax_number_of_posts > 0 ) {
	
		$parallax_one_latest_news_show = get_theme_mod('parallax_one_latest_news_show');
		
		if( isset($parallax_one_latest_news_show) && $parallax_one_latest_news_show != 1 ){
			echo '<section class="brief timeline grey-bg" id="section8">';
		} elseif ( isset( $wp_customize )   ) {
			echo '<section class="brief timeline grey-bg paralax_one_only_customizer" id="section8">';
		}	
		
		if( ( isset($parallax_one_latest_news_show) && $parallax_one_latest_news_show != 1 ) || isset( $wp_customize ) ) {	

	?>

					<div class="container">
						
						<div class="row">
							
							<!-- TIMELINE HEADING / TEXT  -->
							<?php
									
								$parallax_one_latest_news_title = get_theme_mod('parallax_one_latest_news_title','Latest news');
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
											
											$args = array( 'post_type' => 'post', 'posts_per_page' => $parallax_number_of_posts, 'order' => 'DESC','ignore_sticky_posts' => true );
											query_posts( $args );
											$i_latest_posts= 0;
											
											while ( have_posts() ) : the_post();
										
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
																the_post_thumbnail();
															else: ?>
																<img src="http://demo.themeisle.com/zerif-pro/wp-content/uploads/2014/07/Thank-you1-e1405429544670-250x250.jpg" width="150" height="150" alt="trakaka">
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
																<a href="#" rel="bookmark">
																	<time class="entry-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
																</a>
															</span>
															<span> by </span>
															<span class="byline">
																<span class="author vcard">
																	<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" rel="author"><?php the_author(); ?> </a>
																</span>
															</span>
														</div><!-- .entry-meta -->
													</header>
													<div class="entry-content">
														<?php the_excerpt(); ?>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">Read more</a>
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
				</section>
	<?php
		} 
	}