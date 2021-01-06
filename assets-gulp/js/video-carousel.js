/**
 * File video-carousel.js.
 *
 * Slick slider for video carousel in header.
 */
( function() {

	jQuery(document).ready( function($) {
		var $videoCarousel = $('.video-header-slider');
		var activeVideo, videoEndedEvent;

		function changeSlide() {

			setTimeout(function() {
				activeVideo = $videoCarousel.find('.slick-active .video-intro:visible video');
				// console.log('Video Count: ' + activeVideo.length);

				videoEndedEvent = activeVideo.on('ended', function() {
					// console.log('Next');
					$videoCarousel.slick('slickNext');
				});
			}, 500);
		}

		if($videoCarousel.length > 0) {

			$videoCarousel.on('init', function(slick) {
				changeSlide();
			});

			$videoCarousel.on('reInit', function(slick) {
				changeSlide();
			});

			$videoCarousel.on('beforeChange', function(slick, currentSlide, nextSlide) {
				activeVideo.off('ended');
				$('.slick-slider .video-intro video').each(function() {
					this.pause();
					this.currentTime = 0;
				});
				// activeVideo[0].pause();
				// activeVideo[0].currentTime = 0;
			});

			$videoCarousel.on('afterChange', function(slick, currentSlide) {
				activeVideo = $videoCarousel.find('.slick-active .video-intro:visible video');
				activeVideo[0].currentTime = 0;
				activeVideo[0].play();
				changeSlide();
			});

			$videoCarousel.slick({
				'slidesToShow': 1,
				'slidesToScroll': 1,
				'infinite': true,
				'dots': false,
				'arrows': true,
				'autoplay': false,
				'fade': true,
				'pauseOnHover': false,
				'speed': 400,
				'adaptiveHeight': true,
				'pauseOnFocus': false
			});
		}
	});
} )();
