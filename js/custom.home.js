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
    if(jQuery('.overlay-layer-nav').hasClass('sticky-navigation-open')){
        $parallax_one_header_height = jQuery('.navbar').height();
        $parallax_one_header_height+=84;
        jQuery('.header .overlay-layer').css('padding-top',$parallax_one_header_height);
    }
});

jQuery(document).ready(function(){
    jQuery('#header_layer_one').parallaxOneEffectBackground({speed:15});
    jQuery('#header_layer_two').parallaxOneEffectBackground({speed:30});
});

;(function ($, window, document, undefined) {
    var defaults = {
            speed:  30,
        };
    function parallaxOneEffectBackground(element, options) {
        this.element    = element;
        this.options    = $.extend({}, defaults, options);
        this.defaults   = defaults;
        var speed = this.options.speed;
        $(this.element).mousemove(function(e){
            var epageX = e.pageX;
            var epageY = e.pageY;
            var halfWidth   = jQuery('.header').outerWidth() / 2;
            var halfHeight  = jQuery('.header').outerHeight() / 2;
            var amountMovedX = (epageX - halfWidth) / speed ;
            var amountMovedY = (epageY - halfHeight) / speed ;
            $(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
        });
    }
    $.fn.parallaxOneEffectBackground = function (options) {
        return this.each(function () {
            var value = '';
            if (!$.data(this, value)) {
                $.data(this, value, new parallaxOneEffectBackground(this, options) );
            }
        });
    }
})(jQuery);


// parallax effect
jQuery( document ).ready( function( $ ) {
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
            if ( parallax_one_bigTitle_height-parallax_one_scrollTop > parallax_one_navigation_height+parallax_one_bigTitle_logo_height+$('#intro_section_text_3').height()+150 ) {
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
        if ( parallax_one_bigTitle_height-parallax_one_scrollTop > parallax_one_navigation_height+parallax_one_bigTitle_logo_height+$('#intro_section_text_3').height()+150 ) {
            document.getElementById('only-logo-inner').style.top  = parallax_one_bigTitle_logo_position + "px"            
        }
    });
});
