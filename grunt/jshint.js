/* jshint node:true */
// https://github.com/gruntjs/grunt-contrib-jshint

module.exports = {
        options:{
            jshintrc:true,
            reporterOutput:'<%= paths.logs %>jslogs.log',
        },
        all: ['<%= files.js %>']

};