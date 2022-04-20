jQuery(function($) {
	
	"use strict";

	$('.reveal').on('click', '.next', function(){
		var next = $(this).parent('.reveal').next('.reveal').attr('id');
		if (next) {
			next = '#' + next;
			$(next).foundation('open');
		}
	});

	$('.reveal').on('click', '.prev', function(){
		var prev = $(this).parent('.reveal').prev('.reveal').attr('id');
		if (prev) {
			prev = '#' + prev;
			$(prev).foundation('open');
		}
	});

	if ($('.reveal.gb-gallery').length) {
		$('.reveal.gb-gallery:first').find('.gb-gallery-btn.prev').hide();
		$('.reveal.gb-gallery:last').find('.gb-gallery-btn.next').hide();
	}
})