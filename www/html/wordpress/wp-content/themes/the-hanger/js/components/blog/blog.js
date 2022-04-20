jQuery(function($) {
	
	"use strict";

	window.blog_post_animation = function(action, delay) {

		if (typeof action === "undefined" || action === null) action = '';
		if (typeof delay === "undefined" || delay === null) delay = 150;

		$('div.animated-blog-articles').addClass('js_animated');

		if (action == 'reset') $('div.animated-blog-articles.js_animated article').removeClass('visible animation_ready animated');

		$('div.animated-blog-articles.js_animated article:not(.visible)').each(function() {
	    	if ( $(this).visible("partial") ) {                
                $(this).addClass('visible');
			}
		});

		$('div.animated-blog-articles.js_animated article.visible:not(.animation_ready)').each(function(i) {
	    	$(this).addClass('animation_ready');
	    	$(this).delay(i*delay).queue(function(next) {
                $(this).addClass('animated');
                next();
            });
		});

		$('div.animated-blog-articles.js_animated article.visible:first').prevAll().addClass('visible').addClass('animation_ready').addClass('animated');

	}

	$('div.animated-blog-articles.js_animated').imagesLoaded( function() {
		blog_post_animation();
	});

	$(window).on( 'resize', function() {
		gb_throttle(blog_post_animation(), 300);
	});
	
    $(window).on( 'scroll', function() {
    	gb_throttle(blog_post_animation(), 300);
    });

	$(document).ajaxComplete(function() {
		$('div.animated-blog-articles.js_animated').imagesLoaded( function() {
			blog_post_animation();
		});
	});

	$(document).on('click', '.archive-header ul.archive-mobile-list li:first-child', function(){
		$('.archive-header ul.archive-mobile-list').find('li:first-child').toggleClass('open');
		$('.archive-header ul.archive-mobile-list').find('li:not(:first-child)').toggleClass('show');
	});

});
