/**
 * File loop-slider.js.
 *
 * Slick slider for custom ACF Images Loop.
 */
( function() {

	jQuery(document).ready( function($) {
		var $loopGalleries = $('.images-loop-slider');

		$loopGalleries.each(function() {
			$(this).slick({
				'slidesToShow': 1,
				'slidesToScroll': 1,
				'infinite': true,
				'dots': false,
				'arrows': false,
				'autoplay': true,
				'autoplaySpeed': 3800,
				'fade': true,
				'pauseOnHover': false,
				'speed': 800
			});
		});
	});
} )();
