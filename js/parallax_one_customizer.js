function media_upload(button_class) {

	jQuery('body').on('click', button_class, function(e) {
		var button_id ='#'+jQuery(this).attr('id');
		var display_field = jQuery(this).parent().children('input:text');
		var _custom_media = true;

		wp.media.editor.send.attachment = function(props, attachment){

			if ( _custom_media  ) {
				if(typeof display_field != 'undefined'){
					switch(props.size){
						case 'full':
							display_field.val(attachment.sizes.full.url);
                            display_field.trigger('change');
							break;
						case 'medium':
							display_field.val(attachment.sizes.medium.url);
                            display_field.trigger('change');
							break;
						case 'thumbnail':
							display_field.val(attachment.sizes.thumbnail.url);
                            display_field.trigger('change');
							break;
						case 'parallax_one_team':
							console.log(attachment.sizes);
							display_field.val(attachment.sizes.parallax_one_team.url);
                            display_field.trigger('change');
							break
						case 'parallax_one_services':
							display_field.val(attachment.sizes.parallax_one_services.url);
                            display_field.trigger('change');
							break
						case 'parallax_one_customers':
							display_field.val(attachment.sizes.parallax_one_customers.url);
                            display_field.trigger('change');
							break;
						default:
							display_field.val(attachment.url);
                            display_field.trigger('change');
					}
				}
				_custom_media = false;
			} else {
				return wp.media.editor.send.attachment( button_id, [props, attachment] );
			}
		}
		wp.media.editor.open(button_class);
		window.send_to_editor = function(html) {

		}
		return false;
	});
}


/********************************************
*** General Repeater ***
*********************************************/
function parallax_one_refresh_general_control_values(){
	jQuery(".parallax_one_general_control_repeater").each(function(){
        var values = [];
        var th = jQuery(this);
        th.find(".parallax_one_general_control_repeater_container").each(function(){
            var icon_value = jQuery(this).find('.parallax_one_icon_control').val();
            var text = jQuery(this).find(".parallax_one_text_control").val();
            var link = jQuery(this).find(".parallax_one_link_control").val();
            var image_url = jQuery(this).find(".custom_media_url").val();
            var choice = jQuery(this).find(".parallax_one_image_choice").val();
            var title = jQuery(this).find(".parallax_one_title_control").val();
            var subtitle = jQuery(this).find(".parallax_one_subtitle_control").val();
            if( text !='' || image_url!='' || title!='' || subtitle!='' ){
                values.push({
                    "icon_value" : icon_value,
                    "text" : text,
                    "link" : link,
                    "image_url" : image_url,
                    "choice" : choice,
                    "title" : title,
                    "subtitle" : subtitle
                });
            }

        });

        th.find('.parallax_one_repeater_colector').val(JSON.stringify(values));
        th.find('.parallax_one_repeater_colector').trigger('change');
    });
}


jQuery(document).ready(function(){
    
    jQuery('#customize-theme-controls').on('click','.parallax-customize-control-title',function(){
        jQuery(this).next().slideToggle('medium', function() {
            if (jQuery(this).is(':visible'))
                jQuery(this).css('display','block');
        });
    });
    
    jQuery('#customize-theme-controls').on('change','.parallax_one_image_choice',function() {
        if(jQuery(this).val() == 'parallax_image'){
            jQuery(this).parent().parent().find('.parallax_one_general_control_icon').hide();
            jQuery(this).parent().parent().find('.parallax_one_image_control').show();
        }
        if(jQuery(this).val() == 'parallax_icon'){
            jQuery(this).parent().parent().find('.parallax_one_general_control_icon').show();
            jQuery(this).parent().parent().find('.parallax_one_image_control').hide();
        }
        if(jQuery(this).val() == 'parallax_none'){
            jQuery(this).parent().parent().find('.parallax_one_general_control_icon').hide();
            jQuery(this).parent().parent().find('.parallax_one_image_control').hide();
        }
        
        parallax_one_refresh_general_control_values();
        return false;        
    });
    media_upload('.custom_media_button_parallax_one');
    jQuery(".custom_media_url").live('change',function(){
        parallax_one_refresh_general_control_values();
        return false;
    });
    

	jQuery("#customize-theme-controls").on('change', '.parallax_one_icon_control',function(){
		parallax_one_refresh_general_control_values();
		return false; 
	});

	jQuery(".parallax_one_general_control_new_field").on("click",function(){
	 
		var th = jQuery(this).parent();
		if(typeof th != 'undefined') {
			
            var field = th.find(".parallax_one_general_control_repeater_container:first").clone();
            if(typeof field != 'undefined'){
                field.find(".parallax_one_image_choice").val('parallax_icon');
                field.find('.parallax_one_general_control_icon').show();
				if(field.find('.parallax_one_general_control_icon').length > 0){
                	field.find('.parallax_one_image_control').hide();
				}
                field.find(".parallax_one_general_control_remove_field").show();
                field.find(".parallax_one_icon_control").val('');
                field.find(".parallax_one_text_control").val('');
                field.find(".parallax_one_link_control").val('');
                field.find(".custom_media_url").val('');
                field.find(".parallax_one_title_control").val('');
                field.find(".parallax_one_subtitle_control").val('');
                th.find(".parallax_one_general_control_repeater_container:first").parent().append(field);
                parallax_one_refresh_general_control_values();
            }
			
		}
		return false;
	 });
	 
	jQuery("#customize-theme-controls").on("click", ".parallax_one_general_control_remove_field",function(){
		if( typeof	jQuery(this).parent() != 'undefined'){
			jQuery(this).parent().parent().remove();
			parallax_one_refresh_general_control_values();
		}
		return false;
	});


	jQuery("#customize-theme-controls").on('keyup', '.parallax_one_title_control',function(){
		 parallax_one_refresh_general_control_values();
	});

	jQuery("#customize-theme-controls").on('keyup', '.parallax_one_subtitle_control',function(){
		 parallax_one_refresh_general_control_values();
	});
    
	jQuery("#customize-theme-controls").on('keyup', '.parallax_one_text_control',function(){
		 parallax_one_refresh_general_control_values();
	});
	
	jQuery("#customize-theme-controls").on('keyup', '.parallax_one_link_control',function(){
		parallax_one_refresh_general_control_values();
	});
	
	/*Drag and drop to change icons order*/
	jQuery(".parallax_one_general_control_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_refresh_general_control_values();
		}
	});	

});


/********************************************
*** Contact page
*********************************************/

jQuery(document).ready(function(){
 jQuery('#customize-control-parallax_one_default_contact_form_show').find('input:checkbox').on('change',function(){
  if(jQuery(this).is(':checked')){
     jQuery('#customize-control-parallax_one_default_contact_form_email').fadeOut();
     jQuery('#customize-control-parallax_one_name_placeholder').fadeOut();
     jQuery('#customize-control-parallax_one_email_placeholder').fadeOut();
     jQuery('#customize-control-parallax_one_subject_placeholder').fadeOut();
     jQuery('#customize-control-parallax_one_message_placeholder').fadeOut();
     jQuery('#customize-control-parallax_one_button_label').fadeOut();
     jQuery('#customize-control-parallax_one_default_contact_form_show_recaptcha').fadeOut();
     jQuery('#customize-control-parallax_one_recaptcha_sitekey').fadeOut();
     jQuery('#customize-control-parallax_one_recaptacha_secretkey').fadeOut();
     jQuery('#customize-control-parallax_one_contact_form_shortcode').fadeIn();
  } else {
     jQuery('#customize-control-parallax_one_default_contact_form_email').fadeIn();
     jQuery('#customize-control-parallax_one_name_placeholder').fadeIn();
     jQuery('#customize-control-parallax_one_email_placeholder').fadeIn();
     jQuery('#customize-control-parallax_one_subject_placeholder').fadeIn();
     jQuery('#customize-control-parallax_one_message_placeholder').fadeIn();
     jQuery('#customize-control-parallax_one_button_label').fadeIn();
     jQuery('#customize-control-parallax_one_default_contact_form_show_recaptcha').fadeIn();
     if( jQuery('#customize-control-parallax_one_default_contact_form_show_recaptcha').find('input:checkbox').is(':checked')){
     } else {
      jQuery('#customize-control-parallax_one_recaptcha_sitekey').fadeIn();
      jQuery('#customize-control-parallax_one_recaptacha_secretkey').fadeIn();
     }
     jQuery('#customize-control-parallax_one_contact_form_shortcode').fadeOut();

     }
  
 
 });
  
	var sh = jQuery('#customize-control-paralax_one_enable_move').find('input:checkbox');
	if(!sh.is(':checked')){
		jQuery('#customize-control-paralax_one_first_layer').hide();
		jQuery('#customize-control-paralax_one_second_layer').hide();
		jQuery('#customize-control-header_image').show();
	} else {
		jQuery('#customize-control-paralax_one_first_layer').show();
		jQuery('#customize-control-paralax_one_second_layer').show();
		jQuery('#customize-control-header_image').hide();
	}
	
	sh.on('change',function(){
		if(jQuery(this).is(':checked')){
			jQuery('#customize-control-paralax_one_first_layer').fadeIn();
			jQuery('#customize-control-paralax_one_second_layer').fadeIn();
			jQuery('#customize-control-header_image').fadeOut();
		} else {
			jQuery('#customize-control-paralax_one_first_layer').fadeOut();
			jQuery('#customize-control-paralax_one_second_layer').fadeOut();
			jQuery('#customize-control-header_image').fadeIn();
		} 
	});
});