

/*** DROPDOWN FOR MOBILE MENU */
/*
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
/*
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
*/

jQuery(document).ready(function(){
    callback_mobile_dropdown();
});
jQuery(window).load(function(){ 
    fixFooterBottom();
    callback_menu_align()
});
jQuery(window).resize(function(){
    fixFooterBottom();
    callback_menu_align();
});

/*** DROPDOWN FOR MOBILE MENU */
var callback_mobile_dropdown = function () {

    var navLi = jQuery('#stamp-navigation li');

    navLi.each(function(){
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

    navLi.find('a').click(function(){
        jQuery('.navbar-toggle').addClass('collapsed');
        jQuery('.collapse').removeClass('in'); 
    });

};


/*** CENTERED MENU */

var callback_menu_align = function () {

    var headerWrap      = jQuery('header.header');
    var navWrap         = jQuery('#stamp-navigation');
    var logoWrap        = jQuery('.navbar-header');
    var containerWrap   = jQuery('.container');
    var classToAdd      = 'menu-align-center';

    if ( headerWrap.hasClass(classToAdd) ) 
    {
        headerWrap.removeClass(classToAdd);
    }
    var logoWidth       = logoWrap.outerWidth();
    var menuWidth       = navWrap.outerWidth();
    var containerWidth  = containerWrap.width();
    if ( menuWidth + logoWidth > containerWidth ) {
        headerWrap.addClass(classToAdd);
    }
    else
    {
        if ( headerWrap.hasClass(classToAdd) )
        {
            headerWrap.removeClass(classToAdd);
        }
    }
}

/*
var callback_menu_align = function () {
    if ( jQuery('#stamp-navigation').hasClass('menu-align-center') )
    {
        jQuery('#stamp-navigation').removeClass('menu-align-center');
        jQuery('.navbar-header').removeClass('centered-logo');
    }
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
*/

/* STICKY FOOTER */
function fixFooterBottom(){

    var header      = jQuery('header.header');
    var footer      = jQuery('footer.footer');
    var content     = jQuery('.content-wrap');

    content.css('min-height', '1px');

    var headerHeight  = header.outerHeight();
    var footerHeight  = footer.outerHeight();
    var contentHeight = content.outerHeight();
    var windowHeight  = jQuery(window).height();

    var totalHeight = headerHeight + footerHeight + contentHeight;

    if (totalHeight<windowHeight){
      content.css('min-height', windowHeight - headerHeight - footerHeight );
    }else{
      content.css('min-height','1px');
    }
}


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


