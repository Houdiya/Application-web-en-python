jQuery(function($) {
	
	"use strict";

	function createEffect(element) {

		var tween1 = new mojs.Burst({
			parent: 	element,
			count: 		15,
			radius: 	{10:30},
			//angle: 		{0:130, easing: mojs.easing.bezier(0.1, 1, 0.3, 1) },
			children: {
				fill: 		wp_js_var.accent_color,
				radius: 	10,
				opacity: 	0.5,
				duration: 	1300,
				easing: 	mojs.easing.bezier(0.1, 1, 0.3, 1)
			}
		});

		var tween2 = new mojs.Burst({
			parent: 	element,
			radius:   	{ 20:25 },
			angle:    	45,
			count: 		15,
			children: {
				shape:        'line',
				radius:       3,
				scale:        1,
				stroke:       wp_js_var.accent_color,
				strokeDasharray: '100%',
				strokeDashoffset: { '-100%' : '100%' },
				duration:     700,
				easing:       'quad.out',
			}
		});

		var tween3 = new mojs.Burst({
			parent: 	element,
			radius:   	{ 5:30 },
			angle:    	45,
			count:    	14,
			children: {
				radius:       1.5,
				fill:         wp_js_var.accent_color,
				scale:        { 1: 0, easing: 'quad.in' },
				pathScale:    [ .8, null ],
				degreeShift:  [ 13, null ],
				duration:     [ 500, 700 ],
				easing:       'quint.out'
			}
		});

		var tween4 = new mojs.Burst({
			parent: 	element,
			degree:   	0,
			count:    	3,
			radius:   { 0: 60 },
			children: {
				fill:       wp_js_var.accent_color,
				pathScale:  'rand(0.5, 1)',
				radius:     'rand(10, 20)',
				swirlSize:  'rand(10, 15)',
				swirlFrequency: 'rand(2, 4)',
				direction:  [ 1, -1 ],
				duration:   'rand(400, 800)',
				delay:      'rand(0, 75)',
				easing:     'quad.out',
				isSwirl:    true,
				isForce3d:  true
			}
		});

		tween4.replay();

	}





	function special_effect_add_to_wishlist_ajax(element) {

		var tween = new mojs.Burst({
			parent: 	element,
			radius:   	{ 5:30 },
			angle:    	45,
			count:    	14,
			children: {
				radius:       1.5,
				fill:         wp_js_var.accent_color,
				scale:        { 1: 0, easing: 'quad.in' },
				pathScale:    [ .8, null ],
				degreeShift:  [ 13, null ],
				duration:     [ 500, 700 ],
				easing:       'quint.out'
			}
		});

		tween.replay();

	}

	function special_effect_quick_view_button(element) {

		var tween = new mojs.Burst({
			parent: 	element,
			count: 		15,
			radius: 	{10:30},
			//angle: 		{0:130, easing: mojs.easing.bezier(0.1, 1, 0.3, 1) },
			children: {
				fill: 		wp_js_var.accent_color,
				radius: 	10,
				opacity: 	0.5,
				duration: 	1300,
				easing: 	mojs.easing.bezier(0.1, 1, 0.3, 1)
			}
		});

		tween.replay();

	}

	function special_effect_add_to_card_ajax(element) {

		var tween = new mojs.Burst({
			parent: 	element,
			degree:   	0,
			count:    	3,
			radius:   { 0: 80 },
			children: {
				fill:       wp_js_var.accent_color,
				pathScale:  'rand(0.5, 1)',
				radius:     'rand(10, 20)',
				swirlSize:  'rand(10, 15)',
				swirlFrequency: 'rand(2, 4)',
				direction:  [ 1, -1 ],
				duration:   'rand(600, 1000)',
				delay:      'rand(0, 75)',
				easing:     'quad.out',
				isSwirl:    true,
				isForce3d:  true
			}
		});

		tween.replay();

	}


	// Product Card

	/*$(document).on('click', 'ul.products .product .buttons > a',  function() {
		createEffect(this);
	});*/

	$(document).on('click', 'ul.products .product .buttons > .getbowtied_product_wishlist_button',  function() {
		special_effect_add_to_wishlist_ajax(this);
	});

	$(document).on('click', 'ul.products .product .buttons > .getbowtied_product_quick_view_button',  function() {
		special_effect_quick_view_button(this);
	});

	$(document).on('click', 'ul.products .product .buttons > .button',  function() {
		special_effect_add_to_card_ajax(this);
	});

	// Single Product

	$(document).on('click', '.single-product .product .product_tool_buttons_placeholder.loaded .single_product_gallery_trigger',  function() {
		special_effect_add_to_wishlist_ajax(this);
	});

	$(document).on('click', '.single-product .product .product_tool_buttons_placeholder.loaded .single_product_video_trigger',  function() {
		special_effect_add_to_wishlist_ajax(this);
	});

	
	// Header

	$(document).on('click', '.header-tools li a',  function() {
		//special_effect_quick_view_button(this);
	});



});