/* global jQuery */
/* global wp */
function media_upload(button_class) {
	'use strict';
	jQuery( 'body' ).on(
		'click', button_class, function () {
			var button_id     = '#' + jQuery( this ).attr( 'id' );
			var display_field = jQuery( this ).parent().children( 'input:text' );
			var _custom_media = true;

			wp.media.editor.send.attachment = function (props, attachment) {

				if (_custom_media) {
					if (typeof display_field !== 'undefined') {
						switch (props.size) {
							case 'full':
								display_field.val( attachment.sizes.full.url );
								display_field.trigger( 'change' );
								break;
							case 'medium':
								display_field.val( attachment.sizes.medium.url );
								display_field.trigger( 'change' );
								break;
							case 'thumbnail':
								display_field.val( attachment.sizes.thumbnail.url );
								display_field.trigger( 'change' );
								break;
							default:
								display_field.val( attachment.url );
								display_field.trigger( 'change' );
						}
					}
					_custom_media = false;
				} else {
					return wp.media.editor.send.attachment( button_id, [props, attachment] );
				}
			};
			wp.media.editor.open( button_class );
			window.send_to_editor = function () {

			};
			return false;
		}
	);
}

/********************************************
 * ** Generate unique id ***
 *********************************************/
function customizer_repeater_uniqid(prefix, more_entropy) {
	'use strict';
	if (typeof prefix === 'undefined') {
		prefix = '';
	}

	var retId;
	var php_js;
	var formatSeed = function (seed, reqWidth) {
		seed = parseInt( seed, 10 )
			.toString( 16 ); // to hex str
		if (reqWidth < seed.length) { // so long we split
			return seed.slice( seed.length - reqWidth );
		}
		if (reqWidth > seed.length) { // so short we pad
			return new Array( 1 + (reqWidth - seed.length) )
					.join( '0' ) + seed;
		}
		return seed;
	};

	// BEGIN REDUNDANT
	if ( ! php_js) {
		php_js = {};
	}
	// END REDUNDANT
	if ( ! php_js.uniqidSeed) { // init seed with big random int
		php_js.uniqidSeed = Math.floor( Math.random() * 0x75bcd15 );
	}
	php_js.uniqidSeed++;

	retId  = prefix; // start with prefix, add current milliseconds hex string
	retId += formatSeed(
		parseInt(
			new Date()
			.getTime() / 1000, 10
		), 8
	);
	retId += formatSeed( php_js.uniqidSeed, 5 ); // add seed hex string
	if (more_entropy) {
		// for more entropy we add a float lower to 10
		retId += (Math.random() * 10)
			.toFixed( 8 )
			.toString();
	}

	return retId;
}


/********************************************
 * ** General Repeater ***
 *********************************************/
function customizer_repeater_refresh_social_icons(th) {
	'use strict';
	var icons_repeater_values = [];
	th.find( '.customizer-repeater-social-repeater-container' ).each(
		function () {
			var icon = jQuery( this ).find( '.icp' ).val();
			var link = jQuery( this ).find( '.customizer-repeater-social-repeater-link' ).val();
			var id   = jQuery( this ).find( '.customizer-repeater-social-repeater-id' ).val();

			if ( ! id) {
				id = 'customizer-repeater-social-repeater-' + customizer_repeater_uniqid();
				jQuery( this ).find( '.customizer-repeater-social-repeater-id' ).val( id );
			}

			if (icon !== '' && link !== '') {
				icons_repeater_values.push(
					{
						'icon': icon,
						'link': link,
						'id': id
					}
				);
			}
		}
	);

	th.find( '.social-repeater-socials-repeater-colector' ).val( JSON.stringify( icons_repeater_values ) );
	customizer_repeater_refresh_general_control_values();
}

function customizer_repeater_item_is_empty( $value ){
	return typeof $value === 'undefined' || $value === '';
}

function customizer_repeater_get_html_val( $input ){
	if ($input.length !== 0) {
		return $input.val();
	}
	return '';
}


function customizer_repeater_refresh_general_control_values() {
	'use strict';
	jQuery( '.customizer-repeater-general-control-repeater' ).each(
		function () {
			var values = [];
			var th     = jQuery( this );
			th.find( '.customizer-repeater-general-control-repeater-container' ).each(
				function () {

					var icon_value = customizer_repeater_get_html_val( jQuery( this ).find( '.icp' ) );
					var text       = customizer_repeater_get_html_val( jQuery( this ).find( '.customizer-repeater-text-control' ) );
					var link       = customizer_repeater_get_html_val( jQuery( this ).find( '.customizer-repeater-link-control' ) );
					var image_url  = customizer_repeater_get_html_val( jQuery( this ).find( '.custom-media-url' ) );
					var choice     = customizer_repeater_get_html_val( jQuery( this ).find( '.customizer-repeater-image-choice' ) );
					var title      = customizer_repeater_get_html_val( jQuery( this ).find( '.customizer-repeater-title-control' ) );
					var subtitle   = customizer_repeater_get_html_val( jQuery( this ).find( '.customizer-repeater-subtitle-control' ) );
					var id         = customizer_repeater_get_html_val( jQuery( this ).find( '.social-repeater-box-id' ) );
					if ( ! id) {
						id = 'social-repeater-' + customizer_repeater_uniqid();
						jQuery( this ).find( '.social-repeater-box-id' ).val( id );
					}
					var social_repeater = customizer_repeater_get_html_val( jQuery( this ).find( '.social-repeater-socials-repeater-colector' ) );
					var shortcode       = customizer_repeater_get_html_val( jQuery( this ).find( '.customizer-repeater-shortcode-control' ) );

					var response = {};
					if ( ! customizer_repeater_item_is_empty( text ) ) {
						response.text = escapeHtml( text );
					}
					if ( ! customizer_repeater_item_is_empty( image_url ) ) {
						if (choice !== 'azera_shop_none') {
							response.image_url = image_url;
						}
					}
					if ( ! customizer_repeater_item_is_empty( title ) ) {
						response.title = escapeHtml( title );
					}
					if ( ! customizer_repeater_item_is_empty( subtitle ) ) {
						response.subtitle = escapeHtml( subtitle );
					}
					if ( ! customizer_repeater_item_is_empty( icon_value ) ) {
						if (choice !== 'azera_shop_none') {
							response.icon_value = icon_value;
						}
					}
					if ( ! customizer_repeater_item_is_empty( link ) ) {
						response.link = link;
					}
					if ( ! customizer_repeater_item_is_empty( choice ) ) {
						response.choice = choice;
					}
					if ( ! customizer_repeater_item_is_empty( social_repeater ) ) {
						response.social_repeater = escapeHtml( social_repeater );
					}
					if ( ! customizer_repeater_item_is_empty( shortcode ) ) {
						response.shortcode = escapeHtml( shortcode );
					}

					if ( ! jQuery.isEmptyObject( response )) {
						values.push( response );
					}
				}
			);
			th.find( '.customizer-repeater-colector' ).val( JSON.stringify( values ) );
			th.find( '.customizer-repeater-colector' ).trigger( 'change' );
		}
	);
}


jQuery( document ).ready(
	function () {
		'use strict';
		var theme_conrols = jQuery( '#customize-theme-controls' );
		theme_conrols.on(
			'click', '.customizer-repeater-customize-control-title', function () {
				jQuery( this ).next().slideToggle(
					'medium', function () {
						if (jQuery( this ).is( ':visible' )) {
							jQuery( this ).prev().addClass( 'repeater-expanded' );
							jQuery( this ).css( 'display', 'block' );
						} else {
							jQuery( this ).prev().removeClass( 'repeater-expanded' );
						}
					}
				);
			}
		);

		theme_conrols.on(
			'change', '.icp',function(){
				customizer_repeater_refresh_general_control_values();
				return false;
			}
		);

		theme_conrols.on(
			'change', '.customizer-repeater-image-choice', function () {
				if (jQuery( this ).val() === 'parallax_image') {
					jQuery( this ).parent().parent().find( '.social-repeater-general-control-icon' ).hide();
					jQuery( this ).parent().parent().find( '.customizer-repeater-image-control' ).show();
				}
				if (jQuery( this ).val() === 'parallax_icon') {
					jQuery( this ).parent().parent().find( '.social-repeater-general-control-icon' ).show();
					jQuery( this ).parent().parent().find( '.customizer-repeater-image-control' ).hide();
				}
				if (jQuery( this ).val() === 'parallax_none') {
					jQuery( this ).parent().parent().find( '.social-repeater-general-control-icon' ).hide();
					jQuery( this ).parent().parent().find( '.customizer-repeater-image-control' ).hide();
				}

				customizer_repeater_refresh_general_control_values();
				return false;
			}
		);
		media_upload( '.customizer-repeater-custom-media-button' );
		jQuery( '.custom-media-url' ).live(
			'change', function () {
				customizer_repeater_refresh_general_control_values();
				return false;
			}
		);

		/**
	 * This adds a new box to repeater
	 */
		theme_conrols.on(
			'click', '.customizer-repeater-new-field', function () {
				var th = jQuery( this ).parent();
				var id = 'customizer-repeater-' + customizer_repeater_uniqid();
				if (typeof th !== 'undefined') {
					/* Clone the first box*/
					var field = th.find( '.customizer-repeater-general-control-repeater-container:first' ).clone( true, true );

					if (typeof field !== 'undefined') {
						/*Set the default value for choice between image and icon to icon*/
						field.find( '.customizer-repeater-image-choice' ).val( 'parallax_icon' );

						/*Show icon selector*/
						field.find( '.social-repeater-general-control-icon' ).show();

						/*Hide image selector*/
						if (field.find( '.social-repeater-general-control-icon' ).length > 0) {
							field.find( '.customizer-repeater-image-control' ).hide();
						}

						/*Show delete box button because it's not the first box*/
						field.find( '.social-repeater-general-control-remove-field' ).show();

						/* Empty control for icon */
						field.find( '.input-group-addon' ).find( '.fa' ).attr( 'class', 'fa' );

						/*Remove all repeater fields except first one*/

						field.find( '.customizer-repeater-social-repeater' ).find( '.customizer-repeater-social-repeater-container' ).not( ':first' ).remove();
						field.find( '.customizer-repeater-social-repeater-link' ).val( '' );
						field.find( '.social-repeater-socials-repeater-colector' ).val( '' );

						/*Remove value from icon field*/
						field.find( '.icp' ).val( '' );

						/*Remove value from text field*/
						field.find( '.customizer-repeater-text-control' ).val( '' );

						/*Remove value from link field*/
						field.find( '.customizer-repeater-link-control' ).val( '' );

						/*Set box id*/
						field.find( '.social-repeater-box-id' ).val( id );

						/*Remove value from media field*/
						field.find( '.custom-media-url' ).val( '' );

						/*Remove value from title field*/
						field.find( '.customizer-repeater-title-control' ).val( '' );

						/*Remove value from subtitle field*/
						field.find( '.customizer-repeater-subtitle-control' ).val( '' );

						/*Remove value from shortcode field*/
						field.find( '.customizer-repeater-shortcode-control' ).val( '' );

						/*Append new box*/
						th.find( '.customizer-repeater-general-control-repeater-container:first' ).parent().append( field );

						/*Refresh values*/
						customizer_repeater_refresh_general_control_values();
					}

				}
				return false;
			}
		);

		theme_conrols.on(
			'click', '.social-repeater-general-control-remove-field', function () {
				if (typeof    jQuery( this ).parent() !== 'undefined') {
					jQuery( this ).parent().hide(
						500, function(){
							jQuery( this ).parent().remove();
							customizer_repeater_refresh_general_control_values();

						}
					);
				}
				return false;
			}
		);

		theme_conrols.on(
			'keyup', '.customizer-repeater-title-control', function () {
				customizer_repeater_refresh_general_control_values();
			}
		);

		theme_conrols.on(
			'keyup', '.customizer-repeater-subtitle-control', function () {
				customizer_repeater_refresh_general_control_values();
			}
		);

		theme_conrols.on(
			'keyup', '.customizer-repeater-shortcode-control', function () {
				customizer_repeater_refresh_general_control_values();
			}
		);

		theme_conrols.on(
			'keyup', '.customizer-repeater-text-control', function () {
				customizer_repeater_refresh_general_control_values();
			}
		);

		theme_conrols.on(
			'keyup', '.customizer-repeater-link-control', function () {
				customizer_repeater_refresh_general_control_values();
			}
		);

		/*Drag and drop to change icons order*/

		jQuery( '.customizer-repeater-general-control-droppable' ).sortable(
			{
				axis: 'y',
				update: function () {
					customizer_repeater_refresh_general_control_values();
				}
			}
		);

		/*----------------- Socials Repeater ---------------------*/
		theme_conrols.on(
			'click', '.social-repeater-add-social-item', function (event) {
				event.preventDefault();
				var th = jQuery( this ).parent();
				var id = 'customizer-repeater-social-repeater-' + customizer_repeater_uniqid();
				if (typeof th !== 'undefined') {
					var field = th.find( '.customizer-repeater-social-repeater-container:first' ).clone( true, true );
					if (typeof field !== 'undefined') {
						field.find( '.icp' ).val( '' );
						field.find( '.input-group-addon' ).find( '.fa' ).attr( 'class','fa' );
						field.find( '.social-repeater-remove-social-item' ).show();
						field.find( '.customizer-repeater-social-repeater-link' ).val( '' );
						field.find( '.customizer-repeater-social-repeater-id' ).val( id );
						th.find( '.customizer-repeater-social-repeater-container:first' ).parent().append( field );
					}
				}
				return false;
			}
		);

		theme_conrols.on(
			'click', '.social-repeater-remove-social-item', function (event) {
				event.preventDefault();
				var th       = jQuery( this ).parent();
				var repeater = jQuery( this ).parent().parent();
				th.remove();
				customizer_repeater_refresh_social_icons( repeater );
				return false;
			}
		);

		theme_conrols.on(
			'keyup', '.customizer-repeater-social-repeater-link', function (event) {
				event.preventDefault();
				var repeater = jQuery( this ).parent().parent();
				customizer_repeater_refresh_social_icons( repeater );
				return false;
			}
		);

		theme_conrols.on(
			'change', '.customizer-repeater-social-repeater-container .icp', function (event) {
				event.preventDefault();
				var repeater = jQuery( this ).parent().parent().parent();
				customizer_repeater_refresh_social_icons( repeater );
				return false;
			}
		);

	}
);

var entityMap = {
	'&': '&amp;',
	'<': '&lt;',
	'>': '&gt;',
	'"': '&quot;',
	'\'': '&#39;',
	'/': '&#x2F;'
};

function escapeHtml(string) {
	'use strict';
	// noinspection JSUnresolvedFunction
	string = String( string ).replace( new RegExp( '\r?\n', 'g' ), '<br />' );
	string = String( string ).replace( /\\/g, '&#92;' );
	return String( string ).replace(
		/[&<>"'\/]/g, function (s) {
			return entityMap[s];
		}
	);

}
