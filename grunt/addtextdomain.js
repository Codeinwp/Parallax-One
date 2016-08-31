/* jshint node:true */
// https://github.com/blazersix/grunt-wp-i18n
module.exports = {
    options: {
        textdomain: '<%= pkg.theme.textdomain %>',
    },
    theme: {
        files: {
            src: [
                '<%= files.php %>'
            ],
        },
    },
};