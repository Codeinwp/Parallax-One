jQuery(document).ready(function() {
    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".parallax-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section parallax-upsells">');
    }

    if ( !jQuery( ".parallax-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});