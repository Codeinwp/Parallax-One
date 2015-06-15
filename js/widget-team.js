function parallax_one_refresh_icon_values_widget(){
	jQuery('.parallax_one_full_repeater_control').each(function(){
			var values = [];
			var th  = jQuery(this);
			if(typeof th != 'undefined'){
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
			}
	})	
}



jQuery(document).ready( function($) {



    media_upload('.custom_media_button_parallax_one_team');
	
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
		if(typeof $(this).parent().parent() != 'undefined'){
			$(this).parent().parent().remove();
			parallax_one_refresh_icon_values_widget();
		}
		return false;
	});

	$('body').on("click",'.parallax_one_widget_new_field',function(){
		
		var th = $(this).parent();
		if(typeof th != 'undefined'){
			limit = th.find(".parallax_one_widget_repeater_container").length;
			if ((limit < 42) && (typeof limit != 'undefined')) {
			
				var field = th.find(".parallax_one_widget_repeater_container:first").clone();	
				if(typeof field != 'undefined'){
					field.find(".parallax_one_icon_link_widget").val('');
					field.find("select").val('').find("option").removeAttr('selected'); 
					field.find(".parallax_one_remove_field_widget").show();	
					th.find(".parallax_one_widget_repeater").append(field);
					parallax_one_refresh_icon_values_widget();
				}
			} else {
				alert('Sorry, the limit number of social icons was reached!');
			}
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
		var parallax_one_remove = jQuery(this).parent().parent();
		if(typeof parallax_one_remove != 'undefined'){
			jQuery(this).parent().parent().remove();
			parallax_one_refresh_icon_values_widget();
		}
		return false;
	});
	
});