jQuery(document).ready(function() {
    jQuery(".parallax-one-nav-tabs a").click(function(event) {
        event.preventDefault();
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().siblings().removeClass("active");
        var tab = jQuery(this).attr("href");
        jQuery(".parallax-one-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
    });
	
	/* If there are required actions, add an icon with the number of required actions in the About Parallax One page -> Actions required tab */
    var parallax_one_nr_actions_required = parallaxOneWelcomeScreenObject.nr_actions_required;

    if ( (typeof parallax_one_nr_actions_required !== 'undefined') && (parallax_one_nr_actions_required != '0') ) {
        jQuery('li.parallax-one-w-red-tab a').append('<span class="parallax-one-actions-count">' + parallax_one_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".parallax-one-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'parallax_one_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : parallaxOneWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.parallax-one-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + parallaxOneWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var parallax_one_actions_count = jQuery('.parallax-one-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof parallax_one_actions_count !== 'undefined' ) {
                    if( parallax_one_actions_count == '1' ) {
                        jQuery('.parallax-one-actions-count').remove();
                        jQuery('.parallax-one-tab-pane#actions_required').append('<p>' + parallaxOneWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.parallax-one-actions-count').text(parseInt(parallax_one_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
});