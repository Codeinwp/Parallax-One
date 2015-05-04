function parallax_one_refresh_icon_values_widget(){


	jQuery('.parallax_one_full_repeater_control').each(function(){
			var values = [];
			var th  = jQuery(this);
			th.find('.parallax_one_widget_repeater_container').each(function(){
				
				var icon_value = jQuery(this).find('select').val();
				var icon_link = jQuery(this).find(".parallax_one_icon_link_widget").val();
				if(icon_value != '' && icon_link !='' ){
					values.push({
						"icon_value" : icon_value,
						"icon_link" : icon_link
					});
				}
				
				
			})	;
			
			th.find(".parallax_one_widget_repeater_colector").val(JSON.stringify(values)).trigger('change');
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
                    self.prev().val(attachment.url);
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

	
	$("body").on('change', '.parallax_one_icons_widget',function(){
		parallax_one_refresh_icon_values_widget();
		return false; 
	});
	

	
	$("body").on('keyup', '.parallax_one_icon_link_widget',function(){	 
		parallax_one_refresh_icon_values_widget();
	});
	
	$("body").on("click", ".parallax_one_remove_field_widget",function(){
		$(this).parent().parent().remove();
		parallax_one_refresh_icon_values_widget();
		return false;
	});

	$('body').on("click",'.parallax_one_widget_new_field',function(){
		
		var th = $(this).parent();
		
		limit = th.find(".parallax_one_widget_repeater_container").length;
		
		if(limit < 42) {
		
			var field = th.find(".parallax_one_widget_repeater_container:first").clone();	
			field.find(".parallax_one_icon_link_widget").val('');
			field.find("select").val('').find("option").removeAttr('selected'); 
			field.find(".parallax_one_remove_field_widget").show();		
			th.find(".parallax_one_widget_repeater").append(field);
			parallax_one_refresh_icon_values_widget();
		
		} else {
			alert('Sorry, the limit number of social icons was reached!');
		}
		
	});
/*End Repeater Controls*/


});


jQuery(document).on('widget-updated', function(e, widget){
	
	jQuery("body").on('change', '.parallax_one_icons_widget',function(){
		parallax_one_refresh_icon_values_widget();
		return false; 
	});
	
	jQuery("body").on('keyup', '.parallax_one_icon_link_widget',function(){	 
		parallax_one_refresh_icon_values_widget();
	});
	
	jQuery("body").on("click", ".parallax_one_remove_field_widget",function(){
		jQuery(this).parent().parent().remove();
		parallax_one_refresh_icon_values_widget();
		return false;
	});
	
});