/********************************************
 * ** Parallax effect
 *********************************************/

jQuery( document ).ready(
	function(){

		'use strict';
		var sh = jQuery( '#customize-control-paralax_one_enable_move' ).find( 'input:checkbox' );
		if ( ! sh.is( ':checked' )) {
			jQuery( '#customize-control-paralax_one_first_layer' ).hide();
			jQuery( '#customize-control-paralax_one_second_layer' ).hide();
			jQuery( '#customize-control-header_image' ).show();
		} else {
			jQuery( '#customize-control-paralax_one_first_layer' ).show();
			jQuery( '#customize-control-paralax_one_second_layer' ).show();
			jQuery( '#customize-control-header_image' ).hide();
		}

		sh.on(
			'change',function(){
				if (jQuery( this ).is( ':checked' )) {
					jQuery( '#customize-control-paralax_one_first_layer' ).fadeIn();
					jQuery( '#customize-control-paralax_one_second_layer' ).fadeIn();
					jQuery( '#customize-control-header_image' ).fadeOut();
				} else {
					jQuery( '#customize-control-paralax_one_first_layer' ).fadeOut();
					jQuery( '#customize-control-paralax_one_second_layer' ).fadeOut();
					jQuery( '#customize-control-header_image' ).fadeIn();
				}
			}
		);
	}
);
