/**
 * File testimonials-slider.js
 *
 * Init the slider for the testimonials block.
 */
( function() {

	jQuery(document).ready( function($) {

		var $testimonialsSlider = $('.testimonials-slider');

		if($testimonialsSlider.length > 0) {

			$testimonialsSlider.each(function() {
				var cols = $(this).parent('.testimonials').data('columns');

				if( cols == '3') {

					$(this).slick({
						'slidesToShow': cols,
						'slidesToScroll': 1,
						'infinite': true,
						'dots': false,
						'arrows': true,
						'autoplay': false,
						'adaptiveHeight': false,
						'responsive': [{
							'breakpoint': 991,
							'settings': {
								'slidesToShow': 2
							}
						}, {
							'breakpoint': 480,
							'settings': {
								'slidesToShow': 1
							}
						}]
					});
				} else {

					$(this).slick({
						'slidesToShow': cols,
						'slidesToScroll': 1,
						'infinite': true,
						'dots': false,
						'arrows': true,
						'autoplay': false,
						'adaptiveHeight': false
					});
				}
			});

			$(document).on('click', '.testimonials-slide.js-open-url', function(e) {
				e.preventDefault();
				window.open( $(this).data('url'), '_blank' );
			});
		}
	});
} )();
