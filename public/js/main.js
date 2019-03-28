(function($) {
    "use strict";

    /*------------------------------------
        01. Menu
    ------------------------------------- */
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $(".header-sticky").removeClass("sticky");
        } else {
            $(".header-sticky").addClass("sticky");
        }
    });

    $('.main-menu nav').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: '.mobile-menu'
    });

    /*------------------------------------
        Menu-toggle
    ------------------------------------- */
    $('.menu-toggle').on('click', function() {
        if ($('.menu-toggle').hasClass('is-active')) {
            $('.main-menu nav').removeClass('menu-open');
        } else {
            $('.main-menu nav').addClass('menu-open');
        }
    });

    /*------------------------------------
        02. Owl Carousel
    ------------------------------------- */
    $(".video-owl-slider").owlCarousel({
        autoPlay: 8000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        slideSpeed: 500,
        pagination: true,
        navigation: false,
        loop: true,
        mouseDrag: true,
        singleItem: true,
        transitionStyle: "fade",
        addClassActive: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });


    /*------------------------------------
        Latest Carousel
    ------------------------------------- */
    $('.latest-owl').owlCarousel({
        loop: true,
        autoPlay: false,
        smartSpeed: 2000,
        fluidSpeed: true,
        items: 4,
        responsiveClass: true,
        pagination: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });

    /*------------------------------------
        Popular Carousel
    ------------------------------------- */
    $('.popular-owl').owlCarousel({
        loop: true,
        autoPlay: false,
        smartSpeed: 2000,
        fluidSpeed: true,
        items: 3,
        responsiveClass: true,
        pagination: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

    /*--------------------------
        03. Portfolio Isotope
    ---------------------------- */
    $('.grid').imagesLoaded(function() {

        // filter items on button click
        $('.portfolio-menu').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item',
            }
        });

    });
    /* portfolio menu active  */
    $('.portfolio-menu button').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

    /*--------------------------
        04. Magnific Popup
    ---------------------------- */
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        zoom: {
            enabled: true,
        }
    });
    
    
    $('.youtube-bg').YTPlayer({
        containment: '.youtube-bg',
        autoPlay: true,
        loop: true,
    });
    
    
    
    /* testimonial active  */ 
$('.testimonial-active').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
    /*--
	Counter Up
------------------------*/
$('.counter').counterUp({
	delay: 50,
	time: 2000
});
    
    
    
    /*-------------------------------------------
        05. ScrollUp jquery
    --------------------------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    
    /*------------------------------------
        06. Mail Chimp
    --------------------------------------*/
    $('#mc-form').ajaxChimp({
        language: 'en',
        callback: mailChimpResponse,
        // ADD YOUR MAILCHIMP URL BELOW HERE!
        url: 'http://themeshaven.us8.list-manage.com/subscribe/post?u=759ce8a8f4f1037e021ba2922&amp;id=a2452237f8'
    });
    
    function mailChimpResponse(resp) {
        if (resp.result === 'success') {
            $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
            $('.mailchimp-error').fadeOut(400);
        } else if (resp.result === 'error') {
            $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
        }
    }

})(jQuery);