/* jshint node:true */
// https://github.com/nDmitry/grunt-postcss
var autoprefixer = require( 'autoprefixer' );

module.exports = {
    options: {
        processors: [
            autoprefixer( { browsers: 'last 10 versions, IE >= 9' } ),
        ],
        failOnError:true
    },
    build: {
        src: '<%= files.css %>',
    },
};