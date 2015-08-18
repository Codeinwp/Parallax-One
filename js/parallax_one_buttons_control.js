jQuery(document).ready(function() {
	
	jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section parallax-upsells"></li>');
	
	jQuery('.parallax-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-parallax-one/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));
	
	jQuery('.parallax-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/forums/forum/parallax-one/" class="button" target="_blank">{support}</a>'.replace('{support}',objectL10n.support));
	
	jQuery('.parallax-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://github.com/Codeinwp/Parallax-One" class="button" target="_blank">{github}</a>'.replace('{github}',objectL10n.github));
});