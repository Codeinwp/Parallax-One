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

