jQuery(function($) {

	"use strict";

	$('.shortcode_getbowtied_slider').each(function() {

		var data_id = $(this).attr('data-id');

		var autoplay = $(this).find('.swiper-slide').length > 1 ? { delay: 4000 } : false;
		var loop = $(this).find('.swiper-slide').length > 1 ? true : false;
		var pagination = $(this).find('.swiper-slide').length > 1 ? { el: '.swiper-' + data_id + ' .shortcode-slider-pagination', clickable: true } : false;

		var mySwiper = new Swiper( '.swiper-' + data_id, {

			// Optional parameters
		    direction: 'horizontal',
		    grabCursor: true,
			preventClicks: true,
			preventClicksPropagation: true,

		    autoplay: autoplay,
			loop: loop,

		    speed: 600,
			effect: 'slide',

		    // If we need pagination
		    pagination: pagination,
		    parallax: true,
		});
	});
});
