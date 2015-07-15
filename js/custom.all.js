
jQuery(document).ready(function(){
    callback_mobile_dropdown();
});
jQuery(window).load(function(){ 
    fixFooterBottom();
    callback_menu_align();
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
            jQuery(this).parent('li').children('.icon-arrows-up').removeClass('icon-arrows-up').addClass('icon-arrows-down');
        }else{
            jQuery(this).parent('li').addClass('this-open');
            jQuery(this).parent('li').children('.icon-arrows-down').removeClass('icon-arrows-down').addClass('icon-arrows-up');
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
    if ( headerWrap.hasClass(classToAdd) ) {
        headerWrap.removeClass(classToAdd);
    }
    var logoWidth       = logoWrap.outerWidth();
    var menuWidth       = navWrap.outerWidth();
    var containerWidth  = containerWrap.width();
    if ( menuWidth + logoWidth > containerWidth ) {
        headerWrap.addClass(classToAdd);
    } else {
        if ( headerWrap.hasClass(classToAdd) ) {
            headerWrap.removeClass(classToAdd);
        }
    }
    jQuery('.sticky-navigation-open').css('min-height','70');
    var headerHeight = jQuery('.sticky-navigation').outerHeight();
    if ( headerHeight > 70 ) {
        jQuery('.sticky-navigation-open').css('min-height', headerHeight);
    } else {
        jQuery('.sticky-navigation-open').css('min-height', 70);
    }
}

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
    } else {
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


/*=================================
===  SMOOTH SCROLL NAVIGATION     ====
=================================== */
jQuery(document).ready(function(){
  jQuery('#stamp-navigation a[href*=#]:not([href=#]), a.woocommerce-review-link[href*=#]:not([href=#]), a.post-comments[href*=#]:not([href=#])').bind('click',function () {
    var headerHeight;
    var hash    = this.hash;
    var idName  = hash.substring(1);    // get id name
    var alink   = this;                 // this button pressed
    // check if there is a section that had same id as the button pressed
    if ( jQuery('section [id*=' + idName + ']').length > 0 && jQuery(window).innerWidth() >= 767 ){
      jQuery('.current').removeClass('current');
      jQuery(alink).parent('li').addClass('current');
    }else{
      jQuery('.current').removeClass('current');
    }
    if ( jQuery(window).innerWidth() >= 767 ) {
      headerHeight = jQuery('.sticky-navigation').outerHeight();
    } else {
      headerHeight = 0;
    }
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top - headerHeight + 10
        }, 1200);
        return false;
      }
    }
  });
});



/*---------------------------------------*/
/*  NAVIGATION AND NAVIGATION VISIBLE ON SCROLL
/*---------------------------------------*/
function mainNav() {
    if(jQuery('.overlay-layer-wrap').hasClass('sticky-navigation-open')){
        return false;
    }
    var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    var topMenuClose    = -70;
    var topMenuOpen     = 0;
    if ( jQuery('.admin-bar').length>0 ) {
        $parallax_one_header_height = jQuery('.navbar').height();
        topMenuClose    = $parallax_one_header_height * -1;
        topMenuOpen     = 32;
    }
    if ( top > 40 )
        jQuery('.appear-on-scroll').stop().animate({
            "opacity": '1',
            "top": topMenuOpen
        });
    else jQuery('.appear-on-scroll').stop().animate({
        "top": topMenuClose,
        "opacity": '0'
    });
}

/* TOP NAVIGATION MENU SELECTED ITEMS */
function scrolled() {

    if ( jQuery(window).width() >= 751 ) {
        var zerif_scrollTop = jQuery(window).scrollTop();       // cursor position
        var headerHeight = jQuery('.sticky-navigation').outerHeight();   // header height
        var isInOneSection = 'no';                              // used for checking if the cursor is in one section or not
        // for all sections check if the cursor is inside a section
        jQuery("section").each( function() {
            var thisID = '#' + jQuery(this).attr('id');           // section id
            var parallax_one_offset = jQuery(this).offset().top;         // distance between top and our section
            var thisHeight  = jQuery(this).outerHeight();         // section height
            var thisBegin   = parallax_one_offset - headerHeight;                      // where the section begins
            var thisEnd     = parallax_one_offset + thisHeight - headerHeight;         // where the section ends  
            // if position of the cursor is inside of the this section
            if ( zerif_scrollTop >= thisBegin && zerif_scrollTop <= thisEnd ) {
                isInOneSection = 'yes';
                jQuery('.current').removeClass('current');
                jQuery('#stamp-navigation a[href$="' + thisID + '"]').parent('li').addClass('current');    // find the menu button with the same ID section
                return false;
            }
            if (isInOneSection == 'no') {
                jQuery('.current').removeClass('current');
            }
        });
    }

}

var timer;
jQuery(window).scroll(function(){

    mainNav();

    if ( timer ) clearTimeout(timer);
    timer = setTimeout(function(){
        scrolled();
    }, 500);

});