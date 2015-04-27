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
				$( '.navbar-brand  img' ).removeClass( 'paralax_one_only_customizer' );
				$( '.header-logo-wrap' ).addClass( 'paralax_one_only_customizer' );
			}
			else {
				$( '.navbar-brand  img' ).addClass( 'paralax_one_only_customizer' );
				$( '.header-logo-wrap' ).removeClass( 'paralax_one_only_customizer' );
			}
				
            $(".navbar-brand img").attr( "src", to );
			
        } );
    });
	
	
	/******************************************************
	******** HAPPY CUSTOMERS SECTION ***********
	*******************************************************/
	//Show Happy Customers
	wp.customize( 'parallax_one_happy_customers_show', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '#section10' ).css( {
					'display': 'block'
				} );
			} else {
				$( '#section10' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );
	
	
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
	************ LATEST NEWS SECTION ***************
	*******************************************************/
	//Show Latest News
	wp.customize( 'parallax_one_latest_news_show', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '#section8' ).css( {
					'display': 'block'
				} );
			} else {
				$( '#section8' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );
	
	
	//Title
	wp.customize("parallax_one_latest_news_title", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.timeline .timeline-text' ).removeClass( 'paralax_one_only_customizer' );
			} else {
				$( '.timeline .timeline-text' ).addClass( 'paralax_one_only_customizer' );
			}
			$( '#section8 .timeline-text h2' ).text( to );
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
