jQuery(document).ready(function($) {

    /*-----------------------------------------------------------------------------------*/
    // News Ticker
    /*-----------------------------------------------------------------------------------*/


    jQuery("#typed").typed({
        stringsElement: jQuery('#typed-strings'),
        typeSpeed: 30,
        backDelay: 3000,
        loop: true,
        contentType: 'html',
        loopCount: false,
        showCursor: true,
        cursorChar: "|",
    });
    /*-----------------------------------------------------------------------------------*/
    // News Ticker
    /*-----------------------------------------------------------------------------------*/

    jQuery(".shop-carousel").owlCarousel({
        margin: 15,
        items: 3,
        loop: true,
        dots: false,
        freeDrag: false,
        nav: true,
        navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            768: {
                items: 2
            },
            979: {
                items: 3
            },
            1199: {
                items: 3,
            },
            1400: {
                items: 3,
            }
        }
    });
    /*-----------------------------------------------------------------------------------*/
    // Back To Top Button
    /*-----------------------------------------------------------------------------------*/

    jQuery('[canvas="container"]').scroll(function() {
        if (jQuery('[canvas="container"]').scrollTop() > 200) {
            jQuery("a.back_to_top").fadeIn('slow').addClass('show');
        } else {
            jQuery("a.back_to_top").fadeOut('slow').removeClass('show');
        }
    });
    jQuery("a[href='#top']").click(function() {
        jQuery('[canvas="container"]').animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

    /*-----------------------------------------------------------------------------------*/
    // Woocommerce Product Number Button
    /*-----------------------------------------------------------------------------------*/

    jQuery(document).on('click', '.number_button', function(event) {

        var jQuerybutton = jQuery(this);
        var oldValue = jQuerybutton.parent().find("input").val();

        if (jQuerybutton.html() == '<i class="fa fa-plus"></i>') {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        jQuerybutton.parent().find("input").val(newVal);
        jQuery('div.woocommerce > form input[name="update_cart"]').prop('disabled', false);

    });
    /*-----------------------------------------------------------------------------------*/
    // News Ticker
    /*-----------------------------------------------------------------------------------*/

    if (jQuery('body').hasClass('rtl')) {
        jQuery('.owl-carousel').owlCarousel({
            margin: 10,
            rtl: true,
            stagePadding: 10,
            loop: true,
            navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],
            responsive: {
                450: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    } else {
        jQuery('.owl-carousel').owlCarousel({
            margin: 10,
            stagePadding: 10,
            loop: true,
            navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],
            responsive: {
                450: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    }

    /*-----------------------------------------------------------------------------------*/
    // Add RTL Property To Carousel
    /*-----------------------------------------------------------------------------------*/

    if (jQuery('body').hasClass('rtl')) {
        jQuery('.MainSlider').owlCarousel({
            rtl: true,
            items: 1,
            margin: 10,
            loop: true,
            nav: true,
            autoplay: true,
            navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],

        });
    } else {
        jQuery('.MainSlider').owlCarousel({
            items: 1,
            margin: 10,
            loop: true,
            nav: true,
            autoplay: true,
            navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],

        })
    }

    /*-----------------------------------------------------------------------------------*/
    // News Ticker
    /*-----------------------------------------------------------------------------------*/
    if (jQuery('body').hasClass('rtl')) {

    jQuery('.related_product_loop').owlCarousel({
        margin: 20,
        rtl: true,
        loop: true,
        navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1000: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
  } else {

        jQuery('.related_product_loop').owlCarousel({
            margin: 20,
            loop: true,
            navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                800: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        })
  }
    var owl = $('.related_product_loop');
    owl.owlCarousel();
    // Go to the next item
    $('.customNextBtn').click(function() {
            owl.trigger('next.owl.carousel');
        })
        // Go to the previous item
    $('.customPrevBtn').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [300]);
    })


    /*-----------------------------------------------------------------------------------*/
    // Sidebar Accordion Menu
    /*-----------------------------------------------------------------------------------*/

    jQuery('.accordion').dcAccordion({
        eventType: 'click',
        hoverDelay: 600,
        menuClose: false,
        autoClose: true,
        autoExpand: true,
        classExpand: 'parent-item',
        speed: 'slow',
        cookie: 'my-cookie'
    });

    /*-----------------------------------------------------------------------------------*/
    // Sliderbar
    /*-----------------------------------------------------------------------------------*/

    var controller = new slidebars();
    controller.init();
    jQuery( '.js-toggle-left-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.toggle( 'slidebar-1' );
    });
    // Close any
    jQuery( controller.events ).on( 'opened', function () {
        jQuery( '[canvas="container"]' ).addClass( 'js-close-any-slidebar' );
    });

    jQuery( controller.events ).on( 'closed', function () {
        jQuery( '[canvas="container"]' ).removeClass( 'js-close-any-slidebar' );
    });

    jQuery( 'body' ).on( 'click', '.js-close-any-slidebar', function ( event ) {
        event.stopPropagation();
        controller.close();
    });

});
