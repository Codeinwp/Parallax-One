/* jshint node:true */
// https://github.com/SaschaGalley/grunt-phpcs
module.exports = {
    options: {
        ignoreExitCode: true,
    },
    theme: {
        options: {
            standard: 'phpcs.xml',
            reportFile: '<%= paths.logs %>phpcs.log',
            extensions: 'php',
        },
        src: [
            '<%= files.php %>'
        ],
    },
};