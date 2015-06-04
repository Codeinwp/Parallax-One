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


jQuery(document).ready(function() {
    "use strict";
    mainNav();
});

jQuery(window).load(function() {
    "use strict";
    /* useful for Our team section */
    jQuery('.team-member-wrap .team-member-box').each(function(){
        var thisHeight = jQuery(this).find('.member-pic').height();
        jQuery(this).find('.member-details').height(thisHeight);
    });
});

/*---------------------------------------*/
/*  NAVIGATION AND NAVIGATION VISIBLE ON SCROLL
/*---------------------------------------*/
function mainNav() {
    var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    var topMenuClose    = -70;
    var topMenuOpen     = 0;
    if ( jQuery('.admin-bar').length>0 ) {
        topMenuClose    = -38;
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


/*=================================
===  SMOOTH SCROLL NAVIGATION     ====
=================================== */
jQuery(document).ready(function(){
  jQuery('#stamp-navigation a[href*=#]:not([href=#])').bind('click',function () {
    var headerHeight;
    var hash    = this.hash;
    var idName  = hash.substring(1);    // get id name
    var alink   = this;                 // this button pressed
    // check if there is a section that had same id as the button pressed
    if ( jQuery('section [id*=' + idName + ']').length > 0 && jQuery(window).width() >= 751 ){
      jQuery('.current').removeClass('current');
      jQuery(alink).parent('li').addClass('current');
    }else{
      jQuery('.current').removeClass('current');
    }
    if ( jQuery(window).width() >= 751 ) {
      headerHeight = jQuery('.sticky-navigation').height();
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

jQuery(document).ready(function(){
    var headerHeight;
    jQuery('.current').removeClass('current');
    jQuery('#stamp-navigation  a[href$="' + window.location.hash + '"]').parent('li').addClass('current');
    if ( jQuery(window).width() >= 751 ) {
      headerHeight = jQuery('.sticky-navigation').height();
    } else {
      headerHeight = 0;
    }
    if (location.pathname.replace(/^\//,'') == window.location.pathname.replace(/^\//,'') && location.hostname == window.location.hostname) {
      var target = jQuery(window.location.hash);
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top - headerHeight + 10
        }, 1200);
        return false;
      }
    }
});

/* TOP NAVIGATION MENU SELECTED ITEMS */
function scrolled() {
    jQuery(this).off('scroll')[0].setTimeout(function(){
        if ( jQuery(window).width() >= 751 ) {
            var zerif_scrollTop = jQuery(window).scrollTop();       // cursor position
            var headerHeight = jQuery('.sticky-navigation').outerHeight();   // header height
            var isInOneSection = 'no';                              // used for checking if the cursor is in one section or not
            // for all sections check if the cursor is inside a section
            jQuery("section").each( function() {
                var thisID = '#' + jQuery(this).attr('id');           // section id
                var zerif_offset = jQuery(this).offset().top;         // distance between top and our section
                var thisHeight  = jQuery(this).outerHeight();         // section height
                var thisBegin   = zerif_offset - headerHeight;                      // where the section begins
                var thisEnd     = zerif_offset + thisHeight - headerHeight;         // where the section ends  
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
        mainNav();
    jQuery(this).on('scroll', scrolled );
    }, 500)
}
jQuery(window).on('scroll', scrolled );
