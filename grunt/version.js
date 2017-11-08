/* jshint node:true */
// https://github.com/kswedberg/grunt-version
module.exports = {
	package: {
		options: {
			prefix: '"version"\\:\\s+"'
		},
		src: 'package.json'
	},
	style_ti: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'style.css'
	},
};
