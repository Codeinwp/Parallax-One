

/*** DROPDOWN FOR MOBILE MENU */
var callback_mobile_dropdown = function () {
    jQuery('#stamp-navigation li').each(function(){
        if ( jQuery(this).find('ul').length > 0 && !jQuery(this).hasClass('has_children') ){
            jQuery(this).addClass('has_children');
            jQuery(this).find('a').first().after('<p class="dropdownmenu icon icon-arrows-down"></p>');
        }
    });
    jQuery('.dropdownmenu').click(function(){
        if( jQuery(this).parent('li').hasClass('this-open') ){
            jQuery(this).parent('li').removeClass('this-open');
        }else{
            jQuery(this).parent('li').addClass('this-open');
        }
    });
};
jQuery(document).ready(callback_mobile_dropdown);



/*** CENTERED MENU IF IS TOO BIG */
var callback_menu_button_align = function () {
    if ( jQuery('#stamp-navigation').hasClass('menu-align-center') )
    {
        jQuery('#stamp-navigation').removeClass('menu-align-center');
        jQuery('.navbar-header').removeClass('centered-logo');
    }
    if ( jQuery(window).width() > 768 ) 
    {
        var logoWidth = jQuery(".navbar-brand").width();
        var menuWidth = jQuery("#stamp-navigation").width();
        var containerWidth = jQuery('.container').width();

        if ( menuWidth + logoWidth + 10 > containerWidth )
        {
            jQuery('#stamp-navigation').addClass('menu-align-center');
            jQuery('.navbar-header').addClass('centered-logo');
        }
        else
        {
            if ( jQuery('#stamp-navigation').hasClass('menu-align-center') )
            {
                jQuery('#stamp-navigation').removeClass('menu-align-center');
                jQuery('.navbar-header').removeClass('centered-logo');
            }
        }
    }
}
jQuery(document).ready(callback_menu_button_align);
jQuery(window).resize(callback_menu_button_align);



jQuery(document).ready(function($) {

    "use strict";

    /*---------------------------------------*/
    /*	BOOTSTRAP FIXES
	/*---------------------------------------*/

    var oldSSB = jQuery.fn.modal.Constructor.prototype.setScrollbar;
    $.fn.modal.Constructor.prototype.setScrollbar = function() {
        oldSSB.apply(this);
        if (this.scrollbarWidth) jQuery('.navbar-fixed-top').css('padding-right', this.scrollbarWidth);
    }

    var oldRSB = $.fn.modal.Constructor.prototype.resetScrollbar;
    $.fn.modal.Constructor.prototype.resetScrollbar = function() {
        oldRSB.apply(this);
        jQuery('.navbar-fixed-top').css('padding-right', '');
    }

    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
            document.createTextNode(
                '@-ms-viewport{width:auto!important}'
            )
        )
        document.querySelector('head').appendChild(msViewportStyle)
    }

});


