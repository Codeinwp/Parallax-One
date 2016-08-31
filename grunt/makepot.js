/* jshint node:true */
// https://github.com/blazersix/grunt-wp-i18n
module.exports = {
    theme: {
        options: {
            domainPath: '<%= paths.languages %>',
            potFilename: '<%= pkg.theme.textdomain %>.pot',
            potHeaders: {
                poedit: true,
                'report-msgid-bugs-to': '<%= pkg.pot.reportmsgidbugsto %>',
                'language-team': '<%= pkg.pot.languageteam %>',
                'last-translator': '<%= pkg.pot.lasttranslator %>'
            },
            type: 'wp-theme'
        },
    },
};