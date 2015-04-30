function parallax_one_refresh_icon_values(){
	var values = [];
	jQuery('.parallax_one_widget_repeater_container').each(function(){
		var icon_value = jQuery(this).find('select').val();
		var icon_link = jQuery(this).find(".parallax_one_icon_link_widget").val();
		if(icon_value != '' && icon_link !='' ){
			values.push({
				"icon_value" : icon_value,
				"icon_link" : icon_link
			});
		}
		jQuery(".parallax_one_widget_repeater_colector").val(JSON.stringify(values));
		jQuery(".parallax_one_widget_repeater_colector").trigger('change');
	})
}



jQuery(document).ready( function($) {


/*Image control*/	
    function media_upload(button_class) {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

        $('body').on('click', button_class, function(e) {
            var button_id ='#'+$(this).attr('id');
            var self = $(button_id);
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(button_id);
            var id = button.attr('id').replace('_button', '');

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media  ) {
                    $('.custom_media_id').val(attachment.id);
                    $('.custom_media_url_team').val(attachment.url);
                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }
            }

            wp.media.editor.open(button);

                return false;

        });

    }

    media_upload('.custom_media_button_team.button');
	
/*End image control*/	

/*Repeater Controls*/
	$(".parallax_one_widget_repeater").on('change', '.parallax_one_icons_widget',function(){
		parallax_one_refresh_icon_values();
		return false; 
	});
	
	$(".parallax_one_widget_repeater").on('keyup', '.parallax_one_icon_link_widget',function(){	 
		 parallax_one_refresh_icon_values();
	});
	
	$(".parallax_one_widget_repeater").on("click", ".parallax_one_remove_field_widget",function(){
		$(this).parent().parent().remove();
		parallax_one_refresh_icon_values();
		return false;
	});

	$('body').on("click",'#parallax_one_widget_new_field',function(){
		var field = $(".parallax_one_widget_repeater_container:first").clone();
		$(".parallax_one_widget_repeater").append(field);
		field.find(".parallax_one_remove_field_widget").show();
		field.find(".parallax_one_icon_link_widget").val('');
		parallax_one_refresh_icon_values();
	});
/*End Repeater Controls*/


});


jQuery(document).on('widget-updated', function(e, widget){
	jQuery(".parallax_one_widget_repeater").on('change', '.parallax_one_icons_widget',function(){
		parallax_one_refresh_icon_values();
		return false; 
	});
	
	jQuery(".parallax_one_widget_repeater").on('keyup', '.parallax_one_icon_link_widget',function(){	 
		 parallax_one_refresh_icon_values();
	});
	
	jQuery(".parallax_one_widget_repeater").on("click", ".parallax_one_remove_field_widget",function(){
		jQuery(this).parent().parent().remove();
		parallax_one_refresh_icon_values();
		return false;
	});
});