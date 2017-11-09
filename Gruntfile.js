// jshint node:true

module.exports = function( grunt ) {
	'use strict';

	var loader = require( 'load-project-config' ),
		config = require( 'grunt-theme-fleet' );
	config     = config();
	config.files.php.push( '!inc/admin/**/*.php' );
	config.files.php.push( '!class-tgm-plugin-activation.php' );
	config.files.js.push( '!inc/admin/**/*.js' );
	config.files.js.push( '!inc/icon-picker/js/*.js' );
	config.files.js.push( '!js/bootstrap.js' );
	config.files.js.push( '!js/bootstrap.min.js' );
	config.files.js.push( '!js/html5shiv.min.js' );
	config.files.js.push( '!js/html5shiv.js' );
	config.files.js.push( '!js/plugin.home.js' );
	config.files.js.push( '!js/scrollReveal.js' );
	config.files.js.push( '!js/skip-link-focus-fix.js' );
	loader( grunt, config ).init();
};
