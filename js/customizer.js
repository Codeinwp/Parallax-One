/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
	
	/***************************************
	******** HEADER SECTION *********
	****************************************/
	//Logo
	wp.customize("paralax_one_logo", function(value) {
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.navbar-brand' ).removeClass( 'paralax_one_only_customizer' );
				$( '.header-logo-wrap' ).addClass( 'paralax_one_only_customizer' );
			}
			else {
				$( '.navbar-brand' ).addClass( 'paralax_one_only_customizer' );
				$( '.header-logo-wrap' ).removeClass( 'paralax_one_only_customizer' );
			}
				
            $(".navbar-brand img").attr( "src", to );
			
        } );
    });


	//Show Header Logo
	wp.customize('paralax_one_header_logo', function( value ){
		value.bind(function( to ) {
			if( to != '' ) {
				$('#parallax_header .only-logo').removeClass( 'paralax_one_only_customizer' );
			} else {
				$('#parallax_header .only-logo').addClass( 'paralax_one_only_customizer' );
			}
			$( '#parallax_header .only-logo img' ).attr('src', to);
		});
		
	});
	
	//Title
	wp.customize("parallax_one_header_title", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '#parallax_header .intro-section h1' ).removeClass( 'paralax_one_only_customizer' );
			}
			else {
				$( '#parallax_header .intro-section h1' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#parallax_header .intro-section h1' ).text( to );
	    } );
		
    });
	
	//Subtitle
	wp.customize("parallax_one_header_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '#parallax_header .intro-section h5' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#parallax_header .intro-section h5' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#parallax_header .intro-section h5' ).text( to );
		} );
		
    });
	
	//Button text
	wp.customize("parallax_one_header_button_text", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '#parallax_header .button a' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#parallax_header .button a' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#parallax_header .button a' ).text( to );
		} );
		
    });


	//Button link
	wp.customize("parallax_one_header_button_link", function(value) {
		
        value.bind(function( to ) {
			$( '#parallax_header .button a' ).attr( 'href', to );
		} );
		
    });	
	

	/******************************************************
	************* OUR STORY SECTION ****************
	*******************************************************/
	//Title
	wp.customize("parallax_one_our_story_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '#story .brief-content-one h2' ).removeClass( 'paralax_one_only_customizer' );
				$( '#story .colored-line-left').removeClass(  'paralax_one_only_customizer' );
			}
			else {
				$( '#story .brief-content-one h2' ).addClass( 'paralax_one_only_customizer' );
				$( '#story .colored-line-left').addClass( 'paralax_one_only_customizer' );
			}
			$( '#story .brief-content-one h2' ).text( to );
	    } );
		
    });
	
	wp.customize("parallax_one_our_story_text",function(value) {
		
		value.bind(function( to ) {
			if( to != '' ) {
				$( '#story .brief-content-one .brief-content-text' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#story .brief-content-one .brief-content-text' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#story .brief-content-one .brief-content-text' ).html( to );
			
		});
		
	});
	
	wp.customize("paralax_one_our_story_image",function(value) {
		
		value.bind(function( to ) {
			if( to != '' ) {
				$('#story .brief-content-two ').removeClass( 'paralax_one_only_customizer' );
			} else {
				$('#story .brief-content-two ').addClass( 'paralax_one_only_customizer' );
			}
			$( '#story .brief-content-two .brief-image-right img' ).attr('src', to);
		});
		
	});

	/******************************************************
	*********** OUR SERVICES SECTION **************
	*******************************************************/
	
	
	//Title
	wp.customize("parallax_one_our_services_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '#services .section-header h2' ).removeClass( 'paralax_one_only_customizer' );
				$( '#services .colored-line').removeClass(  'paralax_one_only_customizer' );
			}
			else {
				$( '#services .section-header h2' ).addClass( 'paralax_one_only_customizer' );
				$( '#services .section-header .colored-line').addClass( 'paralax_one_only_customizer' );
			}
			$( '#services .section-header h2' ).text( to );
	    } );
		
    });
	
	//Subtitle
	wp.customize("parallax_one_our_services_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '#services .section-header .sub-heading' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#services .section-header .sub-heading' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#services .section-header .sub-heading' ).text( to );
		} );
		
    });

	
	/******************************************************
	*********** OUR TEAM SECTION **************
	*******************************************************/
	//Title
	wp.customize("parallax_one_our_team_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '#team .section-header h2' ).removeClass( 'paralax_one_only_customizer' );
				$( '#team .colored-line').removeClass(  'paralax_one_only_customizer' );
			}
			else {
				$( '#team .section-header h2' ).addClass( 'paralax_one_only_customizer' );
				$( '#team .section-header .colored-line').addClass( 'paralax_one_only_customizer' );
			}
			$( '#team .section-header h2' ).text( to );
	    } );
		
    });
	
	//Subtitle
	wp.customize("parallax_one_our_team_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '#team .section-header .sub-heading' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#team .section-header .sub-heading' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#team .section-header .sub-heading' ).text( to );
		} );
		
    });
	

	/******************************************************
	******** HAPPY CUSTOMERS SECTION ***********
	*******************************************************/
	//Title
	wp.customize("parallax_one_happy_customers_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '.testimonials .section-header h2' ).removeClass( 'paralax_one_only_customizer' );
				$( '.testimonials .colored-line').removeClass(  'paralax_one_only_customizer' );
			}
			else {
				$( '.testimonials .section-header h2' ).addClass( 'paralax_one_only_customizer' );
				$( '.testimonials .section-header .colored-line').addClass( 'paralax_one_only_customizer' );
			}
			$( '.testimonials .section-header h2' ).text( to );
	    } );
		
    });
	
	//Subtitle
	wp.customize("parallax_one_happy_customers_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.testimonials .section-header .sub-heading' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '.testimonials .section-header .sub-heading' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '.testimonials .section-header .sub-heading' ).text( to );
		} );
		
    });

	/******************************************************
	**************** RIBBON SECTION *****************
	*******************************************************/
	
	wp.customize( 'paralax_one_ribbon_background', function( value ) {
		value.bind( function( to ) {
			
			if ( '' != to ) {
				$( '#ribbon' ).attr( 'style','background-image:url('+to+')' );
			} else {
				$( '#ribbon' ).removeAttr('style');
			}
			
		} );
	} );	
	
	
	
	//Title
	wp.customize("parallax_one_ribbon_title", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '#ribbon h2' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#ribbon h2' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#ribbon h2' ).text( to );
		} );
		
    });
	
	
	//Button text
	wp.customize("parallax_one_button_text", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '#ribbon button' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '#ribbon button' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#ribbon button' ).text( to );
		} );
		
    });


	//Button link
	wp.customize("parallax_one_button_link", function(value) {
		
        value.bind(function( to ) {
			$( '#ribbon button' ).attr( 'onclick', to );
		} );
		
    });	
	
	
	/******************************************************
	************ LATEST NEWS SECTION ***************
	*******************************************************/
	
	//Title
	wp.customize("parallax_one_latest_news_title", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '.timeline .timeline-text' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '.timeline .timeline-text' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#latestnews .timeline-text h2' ).text( to );
		} );
		
    });
    
	
	/***************************************
	******** FOOTER SECTION *********
	****************************************/
	//Copyright
	wp.customize("parallax_one_copyright", function(value) {
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.parallax_one_copyright_content' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '.parallax_one_copyright_content' ).addClass( 'paralax_one_only_customizer' );
			}
			
			$( '.parallax_one_copyright_content' ).text( to );
	    } );
    });
	
} )( jQuery );
