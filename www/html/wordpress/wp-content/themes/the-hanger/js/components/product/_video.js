(function($) {

	"use strict";

	$('.single_product_video_trigger').on('click', function() {
		
		$('.single_video_container').removeClass('stuck').addClass('active');
		$('.single_video_overlay').addClass('active');

		setTimeout(function() {				
			$('.single_video_container iframe')[0].contentWindow.postMessage('{"event":"command","func":"","args":""}', '*');
		}, 500);

	});

	$('.close_video_btn').on('click', function() {
		
		$('.single_video_container').removeClass('active');
		$('.single_video_overlay').removeClass('active');			
		
		setTimeout(function() {				
			$('.single_video_container iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
		}, 500);

	});

	$('.single_video_overlay').on('click', function() {
		$('.close_video_btn').trigger('click');
	});

	var video_debounce = function() {
		
		if ($('.single_video_container').hasClass('active')) {

			if (window.scroll_position > 0) {

				$('.single_video_container').addClass('stuck');
				$('.single_video_overlay').removeClass('active');

			} else {

				$('.single_video_container').removeClass('stuck');
				$('.single_video_overlay').addClass('active');
				
			}

		}

	}

	$(window).on( 'scroll', function() {

		video_debounce();

	});

})(jQuery);