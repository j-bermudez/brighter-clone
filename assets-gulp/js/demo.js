/**
 * File demo.js
 *
 * JavaScript functionality for the demo elements.
 */
( function() {

	jQuery(document).ready( function($) {

		// switch strings 'Deep Natural Anonymization' and 'Precision Blur' with appropriate image
		$('.wp-block-table td:contains("Deep Natural Anonymization"), .demo-select a:contains("Deep Natural Anonymization"), .demo-actions .active-method:contains("Deep Natural Anonymization")').each(function() {
			var html = $(this).text();
			$(this).html(html.replace('Deep Natural Anonymization', '<span class="logo-dnat">Deep Natural Anonymization</span>'));
		});

		$('.wp-block-table td:contains("Precision Blur"), .demo-select a:contains("Precision Blur"), .demo-actions .active-method:contains("Precision Blur")').each(function() {
			var html = $(this).text();
			$(this).html(html.replace('Precision Blur', '<span class="logo-pb">Precision Blur</span>'));
		});

		if( $('.demo-container').length > 0 ) {

			$(document).on('click', '.demo-select-button', function(e) {
				e.preventDefault();
				$(this).toggleClass('active').parents('.demo-container').addClass('is-clicked').find('.demo-select').toggleClass('active');
			});

			$(document).on('click', '.demo-item a', function(e) {
				e.preventDefault();
				var $this = $(this);
				var id = $this.data('id');
				var methodName = $this.html();
				var demoContainer = $this.parents('.demo-container');

				$this.parents('.demo-list').find('li').removeClass('active');
				$this.parent('li').addClass('active');

				demoContainer.find('.demo-methods .demo-image').removeClass('active');

				if($this.hasClass('loading')) {
					demoContainer.find('.demo-methods').addClass('loading');
					$this.removeClass('loading');

					setTimeout(function() {
						demoContainer.find('.demo-methods .demo-image[data-image-id="' + id + '"]').addClass('active');
						demoContainer.find('.demo-methods').removeClass('loading');
					}, 1000);
				} else {
					demoContainer.find('.demo-methods .demo-image[data-image-id="' + id + '"]').addClass('active');
				}
				demoContainer.find('.demo-select-button').trigger('click').find('.active-method').html(methodName);
				// console.log('METHOD: ' + methodName);
			});

			// autoplay on start page
			var autoplayDemos = $('.home .demo-container.is-autoplay');
			if(autoplayDemos.length > 0) {

				autoplayDemos.each(function() {
					var autoplayInterval;
					var $this = $(this);
					var speed = parseInt($this.data('speed'));
					var activeLink, nextLink;

					autoplayInterval = setInterval(function() {
						if($this.hasClass('is-clicked')) {
							clearInterval(autoplayInterval);
						} else {
							activeLink = $this.find('.demo-item.active a');
							var id = parseInt(activeLink.data('id'));
							id++;
							if(id > $this.find('.demo-item').length) { id = 1; }

							nextLink = $this.find('.demo-item a[data-id="' + id + '"]');
							var methodName = nextLink.html();

							activeLink.parent('li').removeClass('active');
							nextLink.parent('li').addClass('active');

							$this.find('.demo-methods .demo-image').removeClass('active');
							$this.find('.demo-methods .demo-image[data-image-id="' + id + '"]').addClass('active');
							$this.find('.demo-select-button').find('.active-method').html(methodName);
						}
					}, speed);
				});
			}
		}

		if($('.demo-menu').length > 0) {
			var demoMenu = $('.demo-menu');
			var demoArea = demoMenu.parents('.wp-block-group');

			if(demoArea.length <= 0) {
				demoArea = demoMenu.parents('.wp-block-columns');
			}

			// create demo wrapper
			demoArea.wrap('<div class="demo-area"></div>');
			demoArea = $('.demo-area').addClass('fullscreen bg-green-light no-margin');
			demoMenu.appendTo(demoArea);

			// init demo elements and menu
			var demoElements = demoArea.find('.demo-block');
			var i = 0;

			demoElements.find('.demo-item a').addClass('loading');
			demoElements.parent('div').addClass('demo-wrapper');

			demoElements.each(function() {
				thisElement = $(this);
				thisElement.attr('data-id', i);

				if(i == 0) {
					thisElement.find('.demo-item:first-child a').removeClass('loading');
				}

				var listItemImage = thisElement.find('.demo-original').clone().removeAttr('title');
				var listItem = $('<li class="demo-menu-list-item"><a class="aspect-content" href="#" data-demo-id="' + i + '"></a></li>');

				if(i == 0) {
					thisElement.addClass('active');
					listItem.addClass('active');
				}

				listItem.find('a').append(listItemImage);
				demoMenu.find('ul').append(listItem);

				i = i + 1;
			});

			demoMenu.find('ul').append(demoMenu.find('.custom-upload'));

			// actions
			$(document).on('click', '.demo-menu-list-item:not(.custom-upload) a', function(e) {
				e.preventDefault();

				var $this = $(this);
				var index = $this.data('demo-id');
				var oldDemo = $('.demo-block.active');
				// console.log(index);

				demoElements.parent('div').height($('.demo-block.active').height()).addClass('demo-loading');
				demoMenu.addClass('loading');
				$('.demo-menu-list-item').removeClass('active');
				demoMenu.find('a[data-demo-id="' + index + '"]').parent('li').addClass('active');

				oldDemo.fadeOut(500, function() {
					oldDemo.removeClass('active');
				});

				setTimeout(function() {
					var newDemo = $('.demo-block[data-id="' + index + '"]');

					// reset to first image
					newDemo.find('.demo-item:first-child a').trigger('click');
					$('.demo-select-button, .demo-select').removeClass('active');

					// fade in selected demo
					newDemo.fadeIn(500, function() {
						newDemo.addClass('active');
						demoElements.parent('div').removeClass('demo-loading').height('auto');
						demoMenu.removeClass('loading');
					});
				}, 500);
			});

			/*
			 * ask for Dropzone implementation by brighter AI
			 * Cross domain problems?
			 * https://www.dropzonejs.com/
			$(document).on('click', '.demo-menu-list-item.custom-upload a', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'https://backend.identity.ps:8787/blur/v3/images',
					data: {
						region: "european_union",
						face: "true",
						license_plate: "true",
						person: "false",
						metadata_visualization: "false",
						metadata_extraction: "false",
						concatenate_input: "false",
						vehicle_recorded_data: "false",
						speed_optimized: "false"
					},
					dataType: 'jsonp'
				}).done(function( msg ) {
					alert('Data Saved: ' + msg);
				});
			});
			*/
		}
	});
} )();
