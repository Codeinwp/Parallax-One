/* slider [begin] */
var slideWidth;
var slideCount;
var slideHeight = 0;
var sliderUlHeight = 0;
var marginTop = 0;

/* LATEST NEWS */
jQuery(document).ready(function () {
    parallax_one_latest_news();
    jQuery('a.control_prev').click(function () {
        parallax_one_moveBottom();
    });
    jQuery('a.control_next').click(function () {
         parallax_one_moveTop();
    });
});

jQuery(window).resize(function() {    
   
    /* maximum height for slides */
    slideWidth;
    slideCount;
    slideHeight = 0;
    sliderUlHeight = 0;
    marginTop = 0;

    jQuery('#parallax_slider li').css('height','auto').each(function(){
        if ( slideHeight < jQuery(this).height() ){
            slideHeight = jQuery(this).height();
        }
    });

    slideCount = jQuery('#parallax_slider ul li').length;
    sliderUlHeight = slideCount * slideHeight;
    
    /* set height */
    jQuery('#parallax_slider').css({ width: slideWidth, height: slideHeight });
    jQuery('#parallax_slider ul li ').css({ height: slideHeight}); 
    jQuery('#parallax_slider ul').css({ height: sliderUlHeight, top: marginTop });

    if( jQuery('.control_next').hasClass('fade-btn') ){
        jQuery('.control_next').removeClass('fade-btn');
    }
    if( !jQuery('.control_prev').hasClass('fade-btn') ){
        jQuery('.control_prev').addClass('fade-btn');
    }

});

/* latest news [start] */
function parallax_one_latest_news() {

     /* maximum height for slides */
    slideHeight = 0;

    jQuery('#parallax_slider li').css('height','auto').each(function(){
        if ( slideHeight < jQuery(this).height() ){
            slideHeight = jQuery(this).height();
        }
    });

    slideCount = jQuery('#parallax_slider ul li').length;
    sliderUlHeight = slideCount * slideHeight;
    
    /* set height */
    jQuery('#parallax_slider').css({ width: slideWidth, height: slideHeight });
    jQuery('#parallax_slider ul li ').css({ height: slideHeight}); 
    jQuery('#parallax_slider ul').css({ height: sliderUlHeight});

}

function parallax_one_moveTop() {
    if ( marginTop - slideHeight >= - sliderUlHeight + slideHeight ){
        marginTop = marginTop - slideHeight;
        jQuery('#parallax_slider ul').animate({
            top: marginTop
        }, 400 );
        if( marginTop == - slideHeight * (slideCount-1) ) {
            jQuery('.control_next').addClass('fade-btn');
        }
        if( jQuery('.control_prev').hasClass('fade-btn') ){
            jQuery('.control_prev').removeClass('fade-btn');
        }
    }
};    

function parallax_one_moveBottom() {
    if ( marginTop + slideHeight <= 0 ){
        marginTop = marginTop + slideHeight;
        jQuery('#parallax_slider ul').animate({
            top: marginTop
        }, 400 );
        if( marginTop == 0 ) {
            jQuery('.control_prev').addClass('fade-btn');
        }
        if( jQuery('.control_next').hasClass('fade-btn') ){
            jQuery('.control_next').removeClass('fade-btn');
        }
    }
}; 
/* latest news [end] */

/* PRE LOADER */
jQuery(window).load(function () {
    "use strict";
    jQuery(".status").fadeOut();
    jQuery(".preloader").delay(1000).fadeOut("slow");    
});

jQuery(window).resize(function() {
    "use strict";
    var ww = jQuery(window).width();
    /* COLLAPSE NAVIGATION ON MOBILE AFTER CLICKING ON LINK */
    if (ww < 480) {
        jQuery('.sticky-navigation a').on('click', function() {
            jQuery(".navbar-toggle").click();
        });
    }
});


jQuery(window).load(function() {
    "use strict";
    /* useful for Our team section */
    jQuery('.team-member-wrap .team-member-box').each(function(){
        var thisHeight = jQuery(this).find('.member-pic').height();
        jQuery(this).find('.member-details').height(thisHeight);
    });
});


var home_window_width_old;
jQuery(document).ready(function(){
    home_window_width_old = jQuery('.container').width();
    if( home_window_width_old < 750  ){
        jQuery('#our_services_wrap').parallaxonegridpinterest({columns: 1,selector: '.service-box'});
        jQuery('#happy_customers_wrap').parallaxonegridpinterest({columns: 1,selector: '.testimonials-box'});
    } else {
        jQuery('#our_services_wrap').parallaxonegridpinterest({columns: 3,selector: '.service-box'});
        jQuery('#happy_customers_wrap').parallaxonegridpinterest({columns: 3,selector: '.testimonials-box'});
    } 
});

jQuery(window).resize(function() {
    if( home_window_width_old != jQuery('.container').outerWidth() ){
        home_window_width_old = jQuery('.container').outerWidth();
        if( home_window_width_old < 750  ){
            jQuery('#our_services_wrap').parallaxonegridpinterest({columns: 1,selector: '.service-box'});
            jQuery('#happy_customers_wrap').parallaxonegridpinterest({columns: 1,selector: '.testimonials-box'});
        } else {
            jQuery('#our_services_wrap').parallaxonegridpinterest({columns: 3,selector: '.service-box'});
            jQuery('#happy_customers_wrap').parallaxonegridpinterest({columns: 3,selector: '.testimonials-box'});
        } 
    }
});


/*=============================
========= MAP OVERLAY =========
===============================*/
jQuery(document).ready(function(){
    jQuery('html').click(function(event) {
        jQuery('.parallax_one_map_overlay').show();
    });
    
    jQuery('#container-fluid').click(function(event){
        event.stopPropagation();
    });
    
    jQuery('.parallax_one_map_overlay').on('click',function(event){
        jQuery(this).hide();
    })
});


jQuery(document).ready(function() {
    "use strict";
    mainNav();
});

jQuery(document).ready(function(){
    if(jQuery('.overlay-layer-nav').hasClass('sticky-navigation-open')){
        $parallax_one_header_height = jQuery('.navbar').height();
        $parallax_one_header_height+=84;
        jQuery('.header .overlay-layer').css('padding-top',$parallax_one_header_height);
    }
});


// parallax effect
jQuery( document ).ready( function( $ ) {

if( !isMobile.any() && jQuery('#parallax_move').length>0 ){

    var parallax_one_navigation_height  = jQuery('#sticky-navigation').outerHeight();
    var parallax_one_bigTitle_height    = jQuery('#parallax_header').outerHeight();
    $parallax_one_bigTitle_logo = jQuery('.only-logo');
    var parallax_one_bigTitle_logo_height = $parallax_one_bigTitle_logo.height();
    $parallax_one_bigTitle_logo.css({
        'height':   parallax_one_bigTitle_logo_height,
    });
    $parallax_one_bigTitle_logo.find('.navbar').css({
        'position':'absolute',
        'left':    0,
        'right':   0,
        'z-index': 99,
    });
    jQuery(window).scroll(function () {
        var parallax_one_scrollTop   = document.body.scrollTop;
        var parallax_one_bigTitle_logo_position = $parallax_one_bigTitle_logo.offset().top + parallax_one_scrollTop - parallax_one_scrollTop/10;
        document.getElementById('intro_section_text_1').style.opacity = 1 - (  parallax_one_scrollTop * 3 / parallax_one_bigTitle_height );
        document.getElementById('intro_section_text_2').style.opacity = 1 - (  parallax_one_scrollTop * 2 / parallax_one_bigTitle_height );
        var parallax_one_headerButtonOffset   = $('#intro_section_text_3').offset().top,
            parallax_one_headerDistanceButton = (parallax_one_headerButtonOffset - parallax_one_scrollTop);
        var parallax_one_headerLogoOffset     = $('#only-logo-inner').offset().top,
            parallax_one_headerDistanceLogo   = (parallax_one_headerLogoOffset - parallax_one_scrollTop);
        if ( parallax_one_headerDistanceButton-50 <= parallax_one_headerDistanceLogo+parallax_one_bigTitle_logo_height ) {
            $('#intro_section_text_3').css({
                'height':   $('#intro_section_text_3').height(),
            });
            $('#inpage_scroll_btn').css({
                'position':'absolute',
                'left':    '0',
                'right':   '0',
            });
            $('.intro-section-text-wrap').css({
                'position': 'initial',
            });
            if ( parallax_one_bigTitle_height-parallax_one_scrollTop > parallax_one_navigation_height+parallax_one_bigTitle_logo_height+$('#intro_section_text_3').height()+250 ) {
                document.getElementById('inpage_scroll_btn').style.top = parallax_one_bigTitle_logo_position + 55 + parallax_one_bigTitle_logo_height + "px";
            }
        } else {
            $('#intro_section_text_3').css({
                'height':   'auto',
            });
            $('#inpage_scroll_btn').css({
                'position':'relative',
                'left':    'auto',
                'right':   'auto',
                'top': 'auto',
            });
        }
        if ( parallax_one_bigTitle_height-parallax_one_scrollTop > parallax_one_navigation_height+parallax_one_bigTitle_logo_height+$('#intro_section_text_3').height()+250 ) {
            document.getElementById('only-logo-inner').style.top  = parallax_one_bigTitle_logo_position + "px"            
        }
    });

}

});


/* Header section */
jQuery(document).ready(parallax_effect);
jQuery(window).resize(parallax_effect);

function parallax_effect(){

    if( jQuery('#parallax_move').length>0 ) {
        var scene = document.getElementById('parallax_move');
        var window_width = jQuery(window).outerWidth();
        jQuery('#parallax_move').css({
        'width':            window_width + 120,
        'margin-left':      -60,
        'margin-top':       -60,
        'position':         'absolute',
        });
        var h = jQuery('.overlay-layer-wrap').outerHeight();
        jQuery('#parallax_move').children().each(function(){
        jQuery(this).css({
            'height': h+100,
        });
        });
        var parallax = new Parallax(scene);
    }

}