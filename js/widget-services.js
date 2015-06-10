 function media_upload(button_class) {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

        jQuery('body').on('click', button_class, function(e) {
            var button_id ='#'+jQuery(this).attr('id');
            var self = jQuery(button_id);
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = jQuery(button_id);
            var id = button.attr('id').replace('_button', '');

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media  ) { 
                    self.prev().val(attachment.url);
                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }
            }

            wp.media.editor.open(button);

                return false;

        });

    }
jQuery(document).ready( function($) {

/*Image control*/	
   


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
    media_upload('.custom_media_button_parallax_one_services');	
});