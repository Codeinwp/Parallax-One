
/********************************************
*** Footer Dropdown Custom Menu ***
*********************************************/

function parallax_one_refresh_values(){
	
	var element = document.getElementById("parallax_one_menu");
	var selectedValue = element.options[element.selectedIndex].value;
	jQuery("#menu_selector").val(selectedValue);
	jQuery("#menu_selector").trigger('change');
	
}

jQuery(document).ready(function(){

	jQuery("#parallax_one_menu").on("change",function(){
		parallax_one_refresh_values();
		return false; 
	});
	
});

/********************************************
*** Contact Info Repeater ***
*********************************************/
function parallax_one_refresh_contact_info_values(){
	var values = [];
	jQuery(".parallax_one_contact_info_repeater_container").each(function(){
		var icon_value = jQuery(this).find('select').val();
		var text = jQuery(this).find(".parallax_one_contact_text").val();
		var link = jQuery(this).find(".parallax_one_contact_link").val();
		if(icon_value != '' && text !='' ){
			values.push({
				"icon_value" : icon_value,
				"icon_text" : text,
				"icon_link" : link
			});
		}
	})
	jQuery("#parallax_one_contact_info_repeater_colector").val(JSON.stringify(values));
	jQuery("#parallax_one_contact_info_repeater_colector").trigger('change');
}


jQuery(document).ready(function(){

	jQuery("#parallax_one_contact_info_repeater").on('change', '.parallax_one_conatact_info_icons',function(){
		parallax_one_refresh_contact_info_values();
		return false; 
	});

	jQuery("#parallax_one_contact_info_new_field").on("click",function(){
		
		var th = jQuery(this).parent();
		
		limit = th.find(".parallax_one_contact_info_repeater_container").length;
		
		if(limit < 5) {
			var field = jQuery(".parallax_one_contact_info_repeater_container:first").clone();
			field.find(".parallax_one_contact_info_remove_field").show();
			field.find("select").val('');
			field.find(".parallax_one_contact_text").val('');
			field.find(".parallax_one_contact_link").val('');
			jQuery(".parallax_one_contact_info_repeater_container:first").parent().append(field);
			parallax_one_refresh_contact_info_values();
		} else {
			alert('Sorry, the limit number of contact fields was reached!');
		}
		return false;
	 });
	 
	jQuery("#parallax_one_contact_info_repeater").on("click", ".parallax_one_contact_info_remove_field",function(){
		jQuery(this).parent().remove();
		parallax_one_refresh_contact_info_values();
		return false;
	});

	jQuery("#parallax_one_contact_info_repeater").on('keyup', '.parallax_one_contact_text',function(){	 
		 parallax_one_refresh_contact_info_values();
	});
	
	jQuery("#parallax_one_contact_info_repeater").on('keyup', '.parallax_one_contact_link',function(){	 
		 parallax_one_refresh_contact_info_values();
	});
	
	/*Drag and drop to change icons order*/
	jQuery(".parallax_one_contact_info_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_refresh_contact_info_values();
		}
	});	

});

/********************************************
*** Footer Socials Repeater ***
*********************************************/


	
function parallax_one_refresh_icon_values(){
	var values = [];
	jQuery(".parallax_one_repeater_container").each(function(){
		var icon_value = jQuery(this).find('select').val();
		var icon_link = jQuery(this).find(".parallax_one_icon_link").val();
		if(icon_value != '' && icon_link !='' ){
			values.push({
				"icon_value" : icon_value,
				"icon_link" : icon_link
			});
		}
	})
	jQuery("#parallax_one_repeater_colector").val(JSON.stringify(values));
	jQuery("#parallax_one_repeater_colector").trigger('change');
}


jQuery(document).ready(function(){

	jQuery("#parallax_one_icons_repeater").on('change', '.parallax_one_icons',function(){
		parallax_one_refresh_icon_values();
		return false; 
	});

	jQuery("#parallax_one_new_field").on("click",function(){
		var field = jQuery(".parallax_one_repeater_container:first").clone();
		field.find(".parallax_one_remove_field").show();
		field.find("select").val('');
		field.find(".parallax_one_icon_link").val('');
		jQuery(".parallax_one_repeater_container:first").parent().append(field);
		parallax_one_refresh_icon_values();
		return false;
	 });
	 
	jQuery("#parallax_one_icons_repeater").on("click", ".parallax_one_remove_field",function(){
		jQuery(this).parent().remove();
		parallax_one_refresh_icon_values();
		return false;
	});

	jQuery("#parallax_one_icons_repeater").on('keyup', '.parallax_one_icon_link',function(){	 
		 parallax_one_refresh_icon_values();
	});
	
	/*Drag and drop to change icons order*/
	jQuery(".parallax_one_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_refresh_icon_values();
		}
	});	

});



/********************************************
*** Customizer order ***
*********************************************/


function parallax_one_order_refresh_values(){

	var values = [];
	jQuery("#parallax_order_droppable").find('li').each( function(){ 
		var section_id = jQuery(this).attr('id');
		var section_content = jQuery(this).html();
		
		if(section_id!='' && section_content!=''){
			values.push({
				'section_id' : section_id,
				'section_content' : section_content
			}); 
		}
	
	
	} );
	jQuery("#order_collector").val(JSON.stringify(values));
	jQuery("#order_collector").trigger('change');
	
}


jQuery( document ).ready(function() {
	
	jQuery("#parallax_order_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_order_refresh_values();
		}
	});
	
	
});