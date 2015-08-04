
/* Parallax effect */
jQuery(document).ready(function(){
    if( !isMobile.any() ){
        jQuery('#header_layer_one').parallaxOneEffectBackground({speed:15});
        jQuery('#header_layer_two').parallaxOneEffectBackground({speed:30});
    } else {
        jQuery('#header_layer_one, #header_layer_two').addClass('header-parallax-effect-mobil');
    }
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

if( !isMobile.any() ){

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

}

});
