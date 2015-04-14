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
			<!-- COPYRIGHT -->
			<?php
			
				$paralax_one_copyright = get_theme_mod('zerif_copyright','&copy;Themeisle');
				if(!empty($paralax_one_copyright)){
					echo $paralax_one_copyright;
				}	
			?>
           
			
			<!-- OPTIONAL FOOTER LINKS -->		
			<?php 
			$var = get_theme_mod( 'menu_dropdown_setting' );			
			if(!empty($var)){
				wp_nav_menu( array( 'menu' => $var ,'container_class' => false, 'menu_class' => 'footer-links small-text' ) ); 
			}
			?>
			
			
            <!-- SOCIAL ICONS -->
			<ul class="social-icons">
			<?php
			$social_icons_array = get_theme_mod( 'parallax_one_social_icons' );

				if ( !empty( $social_icons_array ) ){
					$repeater_array = json_decode($social_icons_array);
					foreach($repeater_array as $icon_item)
					{
						echo '<li><a href="'.$icon_item->icon_link.'"><span class="'.$icon_item->icon_value.' transparent-text-dark"></span></a></li>';

					}
				}
			?>
            </ul>
        </div>

        <div class="powered-by">
            <a class="zerif-copyright" href="https://themeisle.com/themes/zerif-lite/" target="_blank" rel="nofollow">Parallax One</a> powered by <a class="zerif-copyright" href="http://wordpress.org/" target="_blank" rel="nofollow">WordPress</a>
        </div>

    </footer>


<?php wp_footer(); ?>

</body>
</html>
