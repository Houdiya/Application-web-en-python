jQuery(function($) {
	
	"use strict";

	$('.shortcode_getbowtied_slider').each(function() {

		var mySwiper = new Swiper ($(this), {
			
			// Optional parameters
		    direction: 'horizontal',
		    grabCursor: true,
			preventClicks: true,
			preventClicksPropagation: true,

		    autoplay: $(this).find('.swiper-slide').length > 1 ? { delay: 4000 } : false,
			loop: $(this).find('.swiper-slide').length > 1 ? true : false,

		    speed: 600,
			effect: 'slide',
		    
		    // If we need pagination
		    pagination: $(this).find('.swiper-slide').length > 1 ? { el: '.shortcode-slider-pagination', clickable: true } : false,
		    parallax: true,
		});
	});
});