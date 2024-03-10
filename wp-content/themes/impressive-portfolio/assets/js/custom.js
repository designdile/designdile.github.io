jQuery(function ($) {
	
 /* -----------------------------------------
    Gallery slider
    ----------------------------------------- */
	$('.gallery-style-1 .pure-portfolio-gallery-slider').slick({
		nextArrow: '<button class="fas fa-angle-right magic-hover magic-hover__square slick-next"></button>',
		prevArrow: '<button class="fas fa-angle-left magic-hover magic-hover__square slick-prev"></button>',
		adaptiveHeight: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [{
			breakpoint: 1025,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				arrows: false,
				dots: true,
			}
		}
		]
	});

});