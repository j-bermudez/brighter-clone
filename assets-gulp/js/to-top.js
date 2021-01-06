/**
 * File to-top.js
 *
 * Button functionality to go back to the top a the page.
 */
( function() {

	jQuery(document).ready( function($) {

		$(document).on('click', '.to-top a', function(e) {
			e.preventDefault();

			if($(window).scrollTop() > 0) {
				$('html, body').animate({scrollTop: 0}, 600);
			}
			return false;
		});
	});
} )();
