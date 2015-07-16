jQuery(window).load(function () {
    jQuery(".post-type-archive-product .products").gridalicious({selector: 'li', width: 250, gutter: 30});
    jQuery(".post-type-archive-product .products").show();
    
    jQuery(".single-product .upsells .products").gridalicious({selector: '.product', width: 250, gutter: 30,});
    jQuery(".single-product .upsells .products").show();
    
    jQuery(".single-product .related .products").gridalicious({selector: '.product', width: 200, gutter: 30,});
    jQuery(".single-product .related .products").show();
    
    jQuery(".archive .products").gridalicious({selector: '.product', width: 250, gutter: 30,});
    jQuery(".archive .products").show();
    
    jQuery("#reviews").show();
});