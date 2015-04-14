
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

});