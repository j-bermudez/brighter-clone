/**
 * File chart.js
 *
 * Trigger animation.
 * Source: https://codepen.io/jr-cologne/pen/zdYdmx
 */
( function() {

	jQuery(document).ready( function($) {

		if( $('#chart').length > 0 ) {
			var element = document.getElementById('chart');
			var elementHeight = element.clientHeight;

			document.addEventListener('scroll', animate);
		}

		function inView() {
			var windowHeight = window.innerHeight;
			var scrollY = window.scrollY || window.pageYOffset;

			var scrollPosition = scrollY + windowHeight;
			var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

			if (scrollPosition > elementPosition) {
				return true;
			}

			return false;
		}

		function animate() {
			if (inView()) {
				element.classList.add('animate');
			}
		}
	});
} )();
