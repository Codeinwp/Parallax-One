// jshint node:true

module.exports = function( grunt ) {
    'use strict';

    var loader = require( 'load-project-config' ),
        config = require( 'grunt-theme-fleet' );
    config = config();
    config.files.php.push( '!inc/admin/**/*.php' );
    config.files.js.push( '!inc/admin/**/*.js' );
    loader( grunt, config ).init();
};