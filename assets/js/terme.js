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

  });
  jQuery('.owl-carousel').owlCarousel({
    margin:10,
    stagePadding:10,
    navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>","<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],
    responsive:{
        0:{
            items:0
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
  jQuery('.related_product_loop').owlCarousel({
    margin:20,
    // nav: true,
    loop:true,
    navText: ["<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>","<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>"],
    responsive:{
        0:{
            items:0
        },
        600:{
            items:3
        },
        1000:{
            items:4

        }
    }
})
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
});
