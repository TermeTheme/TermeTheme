jQuery(document).ready(function($) {
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
    jQuery(document).ready(function() {
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
    });
    jQuery(window).scroll(function() {
			if (jQuery(window).scrollTop() > 200) {
				jQuery("a.back_to_top").fadeIn('slow').addClass('show');
			} else {
				jQuery("a.back_to_top").fadeOut('slow').removeClass('show');
			}
    });
		jQuery("a[href='#top']").click(function() {
			jQuery("html, body").animate({ scrollTop: 0 }, "slow");
  		return false;
		});
});
