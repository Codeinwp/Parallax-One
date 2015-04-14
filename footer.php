<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package parallax-one
 */
?>

    <footer class="footer grey-bg">


        <div class="container">
            <div class="footer-widget-wrap">

                <div class="col-sm-3 widget-box">
                    <div class="widget widget_recent_entries">        
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                            <li><a href="#">Solace of a lonely&nbsp;highway</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/25/hello-world-2/">Write with purpose</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/24/day-at-the-beach/">Tree on a&nbsp;lake</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/23/dont-stop-questioning/">Don’t stop questioning</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/15/overheard-this-morning/">Overheard this morning</a></li>
                        </ul>
                    </div><!-- .widget -->
                </div>

                <div class="col-sm-3 widget-box">
                    <div class="widget widget_recent_entries">        
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                            <li><a href="#">Solace of a lonely&nbsp;highway</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/25/hello-world-2/">Write with purpose</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/24/day-at-the-beach/">Tree on a&nbsp;lake</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/23/dont-stop-questioning/">Don’t stop questioning</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/15/overheard-this-morning/">Overheard this morning</a></li>
                        </ul>
                    </div><!-- .widget -->
                </div>

                <div class="col-sm-3 widget-box">
                    <div class="widget widget_recent_entries">        
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                            <li><a href="#">Solace of a lonely&nbsp;highway</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/25/hello-world-2/">Write with purpose</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/24/day-at-the-beach/">Tree on a&nbsp;lake</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/23/dont-stop-questioning/">Don’t stop questioning</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/15/overheard-this-morning/">Overheard this morning</a></li>
                        </ul>
                    </div><!-- .widget -->
                </div>

                <div class="col-sm-3 widget-box">
                    <div class="widget widget_recent_entries">        
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                            <li><a href="#">Solace of a lonely&nbsp;highway</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/25/hello-world-2/">Write with purpose</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/24/day-at-the-beach/">Tree on a&nbsp;lake</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/23/dont-stop-questioning/">Don’t stop questioning</a></li>
                            <li><a href="https://twentytwelvedemo.wordpress.com/2012/03/15/overheard-this-morning/">Overheard this morning</a></li>
                        </ul>
                    </div><!-- .widget -->
                </div>

            </div><!-- .footer-widget-wrap -->
        </div><!-- .footer-widget-wrap -->


        <div class="footer-bottom-wrap">
			<?php
			
				/* COPYRIGHT */
				$paralax_one_copyright = get_theme_mod('parallax_one_copyright','&copy;Themeisle');
				
				if( !empty($paralax_one_copyright) ){
					echo $paralax_one_copyright;
				}	
			
				/* OPTIONAL FOOTER LINKS */
			
				$parallax_one_menu_dropdown_setting = get_theme_mod( 'parallax_one_menu_dropdown_setting' );
				
				if( !empty($parallax_one_menu_dropdown_setting) ){
					wp_nav_menu( array( 'menu' => $parallax_one_menu_dropdown_setting ,'container_class' => false, 'menu_class' => 'footer-links small-text', 'depth' => '-1' ) ); 
				}
			
				/* SOCIAL ICONS */
			
				$parallax_one_social_icons = get_theme_mod( 'parallax_one_social_icons' );

				if( !empty( $parallax_one_social_icons ) ){
					
					$parallax_one_social_icons_decoded = json_decode($parallax_one_social_icons);
					
					if( !empty($parallax_one_social_icons_decoded) ){
					
						echo '<ul class="social-icons">';
						
							foreach($parallax_one_social_icons_decoded as $parallax_one_social_icon){
								
								echo '<li><a href="'.$parallax_one_social_icon->icon_link.'"><span class="'.$parallax_one_social_icon->icon_value.' transparent-text-dark"></span></a></li>';

							}
					
						echo '</ul>';
					
					}
				}
			?>
            
        </div>

        <div class="powered-by">
            <a class="" href="https://themeisle.com/themes/parallax-one/" target="_blank" rel="nofollow">Parallax One </a> <?php _e('powered by','parallax-one'); ?> <a class="" href="http://wordpress.org/" target="_blank" rel="nofollow"><?php _e('WordPress','parallax-one'); ?></a>
        </div>

    </footer>


<?php wp_footer(); ?>

</body>
</html>
