/**
 * File gallery-slider.js.
 *
 * Slick slider for standard WordPress gallery block.
 */
( function() {

	jQuery(document).ready( function($) {
		var $galleries = $('.wp-block-gallery');

		if( $galleries.length > 0 ) {
			$galleries.find('img').addClass('wp-image');

			$galleries.each(function() {
				var $this = $(this);
				var $images = $this.find('img');
				var imageCount = $images.length;

				$images.each(function(index) {
					$(this).attr('data-count', index);
				});

				$this.find('.blocks-gallery-grid').remove();
				$this.attr('class', 'gallery-custom has-margin').append('<div class="gallery-container"></div>').append('<div class="gallery-counter"><span class="gallery-index">1</span>&nbsp;/&nbsp;<span class="gallery-count">' + imageCount + '</span></div>').append('<div class="gallery-square"><div class="aspect-content"></div></div>');
				$this.find('.gallery-container').append($images);

				var $gallery = $this.find('.gallery-container');
				var size = $gallery.height();

				$('.gallery-square').css({'height': size, 'width': size});

				setTimeout(function() {
					$gallery.slick({
						'slidesToShow': 1,
						'slidesToScroll': 1,
						'infinite': true,
						'dots': false,
						'arrows': true,
						'centerMode': true,
						'variableWidth': true,
						'autoplay': false
					});

					$gallery.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
						$gallery.parent('.gallery-custom').find('.gallery-index').text(nextSlide + 1);
					});
				}, 100);

			});
		}
	});
} )();
