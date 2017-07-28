( function( api ) {
	'use strict';
	// Extends our custom "customizer-info" section.
	api.sectionConstructor['customizer-info'] = api.Section.extend(
		{

				// No events for this type of section.
			attachEvents: function () {},

				// Always make the section active.
			isContextuallyActive: function () {
				return true;
			}
		}
	);

	api.sectionConstructor.parallax_one_view_pro = api.Section.extend(
		{

				// No events for this type of section.
			attachEvents: function () {},

				// Always make the section active.
			isContextuallyActive: function () {
				return true;
			}
		}
	);

} )( wp.customize );
