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

    jQuery(".services-wrap").gridalicious({selector: '.service-box', width: 300, gutter: 30});

    jQuery(".testimonials-wrap").gridalicious({selector: '.testimonials-box', width: 360});
    
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
    if(jQuery('.overlay-layer-wrap ').hasClass('sticky-navigation-open')){
        $parallax_one_header_height = jQuery('.navbar').height();
        $parallax_one_header_height+=84;
        jQuery('.header .overlay-layer').css('padding-top',$parallax_one_header_height);
    }
});