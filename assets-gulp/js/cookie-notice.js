/**
 * File cookie-notice.js.
 *
 * All JavaScript functionality necessary for the (no) cookie notice message
 */
( function() {
	'use strict';

	jQuery(document).ready(function($) {

		var showNotice = readCookie('show_notice');
		var cookieNotice = $('.cookie-notice');

		if(cookieNotice.length > 0) {

			if(!showNotice) {
				createCookie('show_notice', 1, 30);
				showNotice = 1;
			}

			// set timeout to wait until sliders and everything else is initialized... to avoid errors in the offset
			setTimeout(function() {

				if(!showNotice || showNotice == 1) {
					var offset = cookieNotice.next('.cookie-notice-offset').offset();
					var windowHeight = $(window).height();

					$(window).on('scroll.cookieScrollEvent', function(scrollEvent) {

						if($(window).scrollTop() > (offset.top - windowHeight)) {
							cookieNotice.addClass('active');

							setTimeout(function() {
								cookieNotice.addClass('animate');
								$(window).off('scroll.cookieScrollEvent');
							}, 50);
						}
					});

					$(document).on('click', '.cookie-notice-close', function(e) {
						e.preventDefault();
						hideNotice();
					});
				} else {
					$('.cookie-notice').remove();
				}
			}, 1000);
		}

		function hideNotice() {
			createCookie('show_notice', 0, 30);
			showNotice = 0;
			$('.cookie-notice').remove();
		}
	});

	/**
	 * Cookies (i.e. for locale data)
	 * Source: https://www.quirksmode.org/js/cookies.html
	 */
	function createCookie(name, value, days) {
		var expires = "";

		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}

		document.cookie = name + "=" + value + expires + "; path=/";
	}

	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');

		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];

			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}

		return null;
	}

	function eraseCookie(name) {
		createCookie(name, "", -1);
	}
} )();
