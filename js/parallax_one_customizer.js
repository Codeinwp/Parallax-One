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