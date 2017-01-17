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

    // Photo
    $('.p-photo__link').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });

    // Audio
    // audiojs.events.ready(function() {
    //     var as = audiojs.createAll();
    // });

    // $(function() {
    //     var audio = audiojs.createAll()[0];
    //     $('.p-songs__link').click(function(e) {
    //         e.preventDefault();
    //         $(this).addClass('playing').siblings().removeClass('playing');
    //         audio.load($('a', this).attr('data-src'));
    //         audio.play();
    //     });
    // });

    // Mobile menu
    $(".m-nav__icon").on("click", function () {
        $(".m-nav ul.menu").toggleClass("show");
    })

});