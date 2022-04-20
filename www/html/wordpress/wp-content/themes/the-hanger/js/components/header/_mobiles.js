jQuery(function($) {

	"use strict";

	$('.header-mobiles-menu').on('click', function() {
	    $(this).toggleClass('active');
	    $('.header-mobiles-content').toggleClass('visible');
	});

	$('.header-mobiles-wrapper.header-sticky .header-mobiles-menu').on('click', function() {
		$('html').toggleClass('mobile-menu-open');
	});

	$('.header-mobiles-mega-dropdown-button').on('click', function() {
	    $(this).toggleClass('active');
	    $('.header-mobiles-wrapper .gbt-mega-dropdown-content').toggleClass('visible');
	    $('.header-mobiles-wrapper .header-mobiles-large-categories').toggleClass('visible');
	});

	$('.header-mobiles-search').on('click', function() {
	    $(this).toggleClass('active');
	    $('.header-mobiles-search-content').slideToggle(300);
	});

	function gbt_open_submenu(selector, theclass, callback) {
		if ("MutationObserver" in window) {
			var onMutationsObserved = function (mutations) {
				mutations.forEach(function (mutation) {
					if ((!mutation.oldValue || !mutation.oldValue.match(theclass) && mutation.oldValue.match('invisible'))
						&& mutation.target.classList && mutation.target.classList.contains(theclass)) {
							callback($(this));
					}
			    });
			};

			var target = selector[0];
			var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
			var observer = new MutationObserver(onMutationsObserved);
			var config = {attributes: true, attributeOldValue: true, attributeFilter: ['class']};
			observer.observe(target, config);
		}
	}

	// scroll to top when open submenu
	$('.header-mobiles-primary-menu ul.mobile-menu li .is-drilldown-submenu').each( function() {
		gbt_open_submenu( $(this), 'is-active', function() {
			$('html, body').animate({
			    scrollTop: ($('.header-mobiles-primary-menu').offset().top)
			},500);
		});
	});

	var content_top = $('.header-mobiles-wrapper.header-sticky').height();
	$('.header-mobiles-wrapper.header-sticky + .site-content-wrapper').css( 'margin-top', content_top + 'px' );

	// mobile header position when logged in
	if( $(window).width() <= 782 ) {
		$('body.admin-bar .header-mobiles-wrapper.header-sticky').css('top', '46px');
		$('body.admin-bar .sticky_header_placeholder').css('top', '46px');
	} else {
		$('body.admin-bar .header-mobiles-wrapper.header-sticky').css('top', '32px');
		$('body.admin-bar .sticky_header_placeholder').css('top', '32px');
	}

	$(window).on( 'scroll', function() {
		if( $(window).width() <= 600 ) {
			if ($(document).scrollTop() > 0) {
				$('body.admin-bar .header-mobiles-wrapper.header-sticky').css('top', '0');
				$('body.admin-bar .sticky_header_placeholder').css('top', '0');
			} else {
				$('body.admin-bar .header-mobiles-wrapper.header-sticky').css('top', '46px');
				$('body.admin-bar .sticky_header_placeholder').css('top', '46px');
			}
		}
	});

	$( '.header-mobiles-wrapper.header-sticky .header-mobiles .header-mobiles-menu a' ).on( 'click', function() {
		var menu_height = $(window).height() + $('.header-mobiles').height() - 40;
		if( $(window).width() > 600 ) {
			menu_height -= $('#wpadminbar').height();
		}
		$('.header-mobiles-content').css( { 'max-height': menu_height + 'px', 'bottom': menu_height + 'px' } );
	});
});
