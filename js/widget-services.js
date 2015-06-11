function media_upload(button_class) {
	
	jQuery('body').on('click', button_class, function(e) {
		
		var button_id ='#'+jQuery(this).attr('id');
		var display_field = jQuery(this).parent().children('input:text');

		var _custom_media = true;

		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media  ) {
				switch(props.size){
					case 'full':
						display_field.val(attachment.sizes.full.url);
						break;
					case 'medium':
						display_field.val(attachment.sizes.medium.url);
						break;
					case 'thumbnail':
						display_field.val(attachment.sizes.thumbnail.url);
						break;
					case 'team':
						display_field.val(attachment.sizes.team.url);
						break
					default:
						display_field.val(attachment.url);
				}
				_custom_media = false;
			} else {
				return wp.media.editor.send.attachment( button_id, [props, attachment] );
			}
		}

		wp.media.editor.open(button_class);

		return false;

	});
}





jQuery(document).ready( function($) {


	$('.widget-content .parallax_one_icon_type_our_services').live("change",function() {
		var value = $(this).val();
		  
		if( this.value == 'parallax_image'){
			$(this).parent().parent().find('.parallax_one_our_services_icon_control').hide();
			$(this).parent().parent().find('.parallax_one_our_services_image_control').show();
		} 
		
		if (this.value == 'parallax_icon') {
			$(this).parent().parent().find('.parallax_one_our_services_image_control').hide();
			$(this).parent().parent().find('.parallax_one_our_services_icon_control').show();
		}
		
		if (this.value == 'parallax_no_icon') {
			$(this).parent().parent().find('.parallax_one_our_services_image_control').hide();
			$(this).parent().parent().find('.parallax_one_our_services_icon_control').hide();			
		}
	});
	
	/*Image control*/	
    media_upload('.custom_media_button_parallax_one_services');	
});