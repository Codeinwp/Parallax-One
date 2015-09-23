jQuery(document).ready(function() {
    jQuery(".parallax-one-nav-tabs a").click(function(event) {
        event.preventDefault();
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().siblings().removeClass("active");
        var tab = jQuery(this).attr("href");
        jQuery(".parallax-one-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
    });
});