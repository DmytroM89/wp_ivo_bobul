jQuery(document).ready(function($) {
    
    "use strict";

    // Loader
    $('#page-preloader').fadeOut('slow');
    $('#page-preloader .spinner').fadeOut('slow');

    // Video
    $('.p-video__link').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });

});