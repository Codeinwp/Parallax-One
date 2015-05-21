/* slider [begin] */
var slideWidth;
var slideCount;
var slideHeight = 0;
var sliderUlHeight = 0;
var marginTop = 0;

jQuery(window).resize(function() {

    /* maximum height for slides */
    slideHeight = 0;
    jQuery('#parallax_slider ul li').css('height','auto');
    jQuery('#parallax_slider ul li').each(function(){
        if ( slideHeight < jQuery(this).height() ){
            slideHeight = jQuery(this).height();
        }
    });

    /* calculate the new height for all slides */
    sliderUlHeight = slideCount * slideHeight;
    
    /* set new height */
    jQuery('#parallax_slider').css({ height: slideHeight });
    jQuery('#parallax_slider ul li ').css({ height: slideHeight}); 
    jQuery('#parallax_slider ul').css({ height: sliderUlHeight});

    /* reset slide position */
    marginTop = 0;
    jQuery('#parallax_slider ul').animate({ top: marginTop }, 400 );

    /* reset to initial state */
    if( !jQuery('.control_prev').hasClass('fade-btn') ){
        jQuery('.control_prev').addClass('fade-btn');
    }
    if( jQuery('.control_next').hasClass('fade-btn') ){
        jQuery('.control_next').removeClass('fade-btn');
    }

});


jQuery(document).ready(function () {

     /* maximum height for slides */
    jQuery('#parallax_slider li').each(function(){
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

    function moveTop() {
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

    function moveBottom() {
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

    jQuery('a.control_prev').click(function () {
        moveBottom();
    });

    jQuery('a.control_next').click(function () {
        moveTop();
    });

});    

/* slider [end] */


/* PRE LOADER */
jQuery(window).load(function () {
	"use strict";
	jQuery(".status").fadeOut();
	jQuery(".preloader").delay(1000).fadeOut("slow");
})
		
		
jQuery(window).load(function() {

    "use strict";

    /*---------------------------------------*/
    /*	NAVIGATION
	/*---------------------------------------*/
    jQuery('.main-navigation').onePageNav({
        changeHash: true,
        currentClass: 'not-active', /* CHANGE THE VALUE TO 'current' TO HIGHLIGHT CURRENT SECTION LINK IN NAV */
        scrollSpeed: 750,
        scrollThreshold: 0.5,
        filter: ':not(.external)'
    });

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

    /*---------------------------------------*/
    /*  SCROLL PANE
    /*---------------------------------------*/
	if (typeof jQuery('.scroll-pane').val() != 'undefined') {
		jQuery('.scroll-pane').jScrollPane({showArrows: true});
	}	

});


jQuery(document).ready(function() {

    "use strict";

    /*---------------------------------------*/
    /*  NAVIGATION AND NAVIGATION VISIBLE ON SCROLL
    /*---------------------------------------*/

    mainNav();
    jQuery(window).scroll(function() {
        mainNav();
    });

    function mainNav() {
        var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
        if (top > 40) jQuery('.appear-on-scroll').stop().animate({
            "opacity": '1',
            "top": '0'
        });
        else jQuery('.appear-on-scroll').stop().animate({
            "top": '-70',
            "opacity": '0'
        });

        if (top > 120) {
        jQuery('.js-login').fadeOut(20);
        }
        else {
        jQuery('.js-login').fadeIn(200);
            
        }
        
        if (top > 400) {
        jQuery('.js-register').fadeIn(200);
        }
        else {
        jQuery('.js-register').fadeOut(200);
            
        }
    }


    /*---------------------------------------*/
    /*  SCROLL PANE
    /*---------------------------------------*/
	if (typeof jQuery('.scroll-pane').val() != 'undefined') {
		jQuery('.scroll-pane').jScrollPane({showArrows: true});
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