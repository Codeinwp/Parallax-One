jQuery(document).ready(function() {
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/forums/forum/parallax-one/" class="button" target="_blank">{support}</a>'.replace('{support}',objectL10n.support));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-parallax-one/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));
	
});