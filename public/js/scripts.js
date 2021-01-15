/**
 * File chart.js
 *
 * Trigger animation.
 * Source: https://codepen.io/jr-cologne/pen/zdYdmx
 */
(function () {
  jQuery(document).ready(function ($) {
    if ($('#chart').length > 0) {
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
})();
/**
 * File cookie-notice.js.
 *
 * All JavaScript functionality necessary for the (no) cookie notice message
 */
(function () {
  'use strict';

  jQuery(document).ready(function ($) {
    var showNotice = readCookie('show_notice');
    var cookieNotice = $('.cookie-notice');

    if (cookieNotice.length > 0) {
      if (!showNotice) {
        createCookie('show_notice', 1, 30);
        showNotice = 1;
      } // set timeout to wait until sliders and everything else is initialized... to avoid errors in the offset


      setTimeout(function () {
        if (!showNotice || showNotice == 1) {
          var offset = cookieNotice.next('.cookie-notice-offset').offset();
          var windowHeight = $(window).height();
          $(window).on('scroll.cookieScrollEvent', function (scrollEvent) {
            if ($(window).scrollTop() > offset.top - windowHeight) {
              cookieNotice.addClass('active');
              setTimeout(function () {
                cookieNotice.addClass('animate');
                $(window).off('scroll.cookieScrollEvent');
              }, 50);
            }
          });
          $(document).on('click', '.cookie-notice-close', function (e) {
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
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }

    document.cookie = name + "=" + value + expires + "; path=/";
  }

  function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');

    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];

      while (c.charAt(0) == ' ') {
        c = c.substring(1, c.length);
      }

      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }

    return null;
  }

  function eraseCookie(name) {
    createCookie(name, "", -1);
  }
})();
/**
 * File demo.js
 *
 * JavaScript functionality for the demo elements.
 */
(function () {
  jQuery(document).ready(function ($) {
    // switch strings 'Deep Natural Anonymization' and 'Precision Blur' with appropriate image
    $('.wp-block-table td:contains("Deep Natural Anonymization"), .demo-select a:contains("Deep Natural Anonymization"), .demo-actions .active-method:contains("Deep Natural Anonymization")').each(function () {
      var html = $(this).text();
      $(this).html(html.replace('Deep Natural Anonymization', '<span class="logo-dnat">Deep Natural Anonymization</span>'));
    });
    $('.wp-block-table td:contains("Precision Blur"), .demo-select a:contains("Precision Blur"), .demo-actions .active-method:contains("Precision Blur")').each(function () {
      var html = $(this).text();
      $(this).html(html.replace('Precision Blur', '<span class="logo-pb">Precision Blur</span>'));
    });

    if ($('.demo-container').length > 0) {
      $(document).on('click', '.demo-select-button', function (e) {
        e.preventDefault();
        $(this).toggleClass('active').parents('.demo-container').addClass('is-clicked').find('.demo-select').toggleClass('active');
      });
      $(document).on('click', '.demo-item a', function (e) {
        e.preventDefault();
        var $this = $(this);
        var id = $this.data('id');
        var methodName = $this.html();
        var demoContainer = $this.parents('.demo-container');
        $this.parents('.demo-list').find('li').removeClass('active');
        $this.parent('li').addClass('active');
        demoContainer.find('.demo-methods .demo-image').removeClass('active');

        if ($this.hasClass('loading')) {
          demoContainer.find('.demo-methods').addClass('loading');
          $this.removeClass('loading');
          setTimeout(function () {
            demoContainer.find('.demo-methods .demo-image[data-image-id="' + id + '"]').addClass('active');
            demoContainer.find('.demo-methods').removeClass('loading');
          }, 1000);
        } else {
          demoContainer.find('.demo-methods .demo-image[data-image-id="' + id + '"]').addClass('active');
        }

        demoContainer.find('.demo-select-button').trigger('click').find('.active-method').html(methodName); // console.log('METHOD: ' + methodName);
      }); // autoplay on start page

      var autoplayDemos = $('.home .demo-container.is-autoplay');

      if (autoplayDemos.length > 0) {
        autoplayDemos.each(function () {
          var autoplayInterval;
          var $this = $(this);
          var speed = parseInt($this.data('speed'));
          var activeLink, nextLink;
          autoplayInterval = setInterval(function () {
            if ($this.hasClass('is-clicked')) {
              clearInterval(autoplayInterval);
            } else {
              activeLink = $this.find('.demo-item.active a');
              var id = parseInt(activeLink.data('id'));
              id++;

              if (id > $this.find('.demo-item').length) {
                id = 1;
              }

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

    if ($('.demo-menu').length > 0) {
      var demoMenu = $('.demo-menu');
      var demoArea = demoMenu.parents('.wp-block-group');

      if (demoArea.length <= 0) {
        demoArea = demoMenu.parents('.wp-block-columns');
      } // create demo wrapper


      demoArea.wrap('<div class="demo-area"></div>');
      demoArea = $('.demo-area').addClass('fullscreen bg-green-light no-margin');
      demoMenu.appendTo(demoArea); // init demo elements and menu

      var demoElements = demoArea.find('.demo-block');
      var i = 0;
      demoElements.find('.demo-item a').addClass('loading');
      demoElements.parent('div').addClass('demo-wrapper');
      demoElements.each(function () {
        thisElement = $(this);
        thisElement.attr('data-id', i);

        if (i == 0) {
          thisElement.find('.demo-item:first-child a').removeClass('loading');
        }

        var listItemImage = thisElement.find('.demo-original').clone().removeAttr('title');
        var listItem = $('<li class="demo-menu-list-item"><a class="aspect-content" href="#" data-demo-id="' + i + '"></a></li>');

        if (i == 0) {
          thisElement.addClass('active');
          listItem.addClass('active');
        }

        listItem.find('a').append(listItemImage);
        demoMenu.find('ul').append(listItem);
        i = i + 1;
      });
      demoMenu.find('ul').append(demoMenu.find('.custom-upload')); // actions

      $(document).on('click', '.demo-menu-list-item:not(.custom-upload) a', function (e) {
        e.preventDefault();
        var $this = $(this);
        var index = $this.data('demo-id');
        var oldDemo = $('.demo-block.active'); // console.log(index);

        demoElements.parent('div').height($('.demo-block.active').height()).addClass('demo-loading');
        demoMenu.addClass('loading');
        $('.demo-menu-list-item').removeClass('active');
        demoMenu.find('a[data-demo-id="' + index + '"]').parent('li').addClass('active');
        oldDemo.fadeOut(500, function () {
          oldDemo.removeClass('active');
        });
        setTimeout(function () {
          var newDemo = $('.demo-block[data-id="' + index + '"]'); // reset to first image

          newDemo.find('.demo-item:first-child a').trigger('click');
          $('.demo-select-button, .demo-select').removeClass('active'); // fade in selected demo

          newDemo.fadeIn(500, function () {
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
})();
/**
 * File gallery-slider.js.
 *
 * Slick slider for standard WordPress gallery block.
 */
(function () {
  jQuery(document).ready(function ($) {
    var $galleries = $('.wp-block-gallery');

    if ($galleries.length > 0) {
      $galleries.find('img').addClass('wp-image');
      $galleries.each(function () {
        var $this = $(this);
        var $images = $this.find('img');
        var imageCount = $images.length;
        $images.each(function (index) {
          $(this).attr('data-count', index);
        });
        $this.find('.blocks-gallery-grid').remove();
        $this.attr('class', 'gallery-custom has-margin').append('<div class="gallery-container"></div>').append('<div class="gallery-counter"><span class="gallery-index">1</span>&nbsp;/&nbsp;<span class="gallery-count">' + imageCount + '</span></div>').append('<div class="gallery-square"><div class="aspect-content"></div></div>');
        $this.find('.gallery-container').append($images);
        var $gallery = $this.find('.gallery-container');
        var size = $gallery.height();
        $('.gallery-square').css({
          'height': size,
          'width': size
        });
        setTimeout(function () {
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
          $gallery.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            $gallery.parent('.gallery-custom').find('.gallery-index').text(nextSlide + 1);
          });
        }, 100);
      });
    }
  });
})();
/**
 * File loop-slider.js.
 *
 * Slick slider for custom ACF Images Loop.
 */
(function () {
  jQuery(document).ready(function ($) {
    var $loopGalleries = $('.images-loop-slider');
    $loopGalleries.each(function () {
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
})();
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  var container, button, menu, links, i, len;
  container = document.getElementById('site-navigation');

  if (!container) {
    return;
  }

  button = container.getElementsByTagName('button')[0];

  if ('undefined' === typeof button) {
    return;
  }

  menu = container.getElementsByTagName('ul')[0]; // Hide menu toggle button if menu is empty and return early.

  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }

  menu.setAttribute('aria-expanded', 'false');

  if (-1 === menu.className.indexOf('nav-menu')) {
    menu.className += ' nav-menu';
  }

  button.onclick = function () {
    if (-1 !== container.className.indexOf('toggled')) {
      container.className = container.className.replace(' toggled', '');
      button.setAttribute('aria-expanded', 'false');
      menu.setAttribute('aria-expanded', 'false');
    } else {
      container.className += ' toggled';
      button.setAttribute('aria-expanded', 'true');
      menu.setAttribute('aria-expanded', 'true');
    }
  }; // Get all the link elements within the menu.


  links = menu.getElementsByTagName('a'); // Each time a menu link is focused or blurred, toggle focus.

  for (i = 0, len = links.length; i < len; i++) {
    links[i].addEventListener('focus', toggleFocus, true);
    links[i].addEventListener('blur', toggleFocus, true);
  }
  /**
   * Sets or removes .focus class on an element.
   */


  function toggleFocus() {
    var self = this; // Move up through the ancestors of the current link until we hit .nav-menu.

    while (-1 === self.className.indexOf('nav-menu')) {
      // On li elements toggle the class .focus.
      if ('li' === self.tagName.toLowerCase()) {
        if (-1 !== self.className.indexOf('focus')) {
          self.className = self.className.replace(' focus', '');
        } else {
          self.className += ' focus';
        }
      }

      self = self.parentElement;
    }
  }
  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */


  (function (container) {
    var touchStartFn,
        i,
        parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    if ('ontouchstart' in window) {
      touchStartFn = function touchStartFn(e) {
        var menuItem = this.parentNode,
            i;

        if (window.innerWidth > 991) {
          if (!menuItem.classList.contains('focus')) {
            e.preventDefault();

            for (i = 0; i < menuItem.parentNode.children.length; ++i) {
              if (menuItem === menuItem.parentNode.children[i]) {
                continue;
              }

              menuItem.parentNode.children[i].classList.remove('focus');
            }

            menuItem.classList.add('focus');
          } else {
            menuItem.classList.remove('focus');
          }
        }
      };

      for (i = 0; i < parentLink.length; ++i) {
        parentLink[i].addEventListener('touchstart', touchStartFn, false);
      }
    }
  })(container);

  jQuery(document).ready(function ($) {
    $(document).on('click', '.main-navigation .no-click > a', function (e) {
      e.preventDefault();
      return false;
    });
  }); // main menu: scroll to anchor points (outside document.ready because it was trouble sometimes)

  jQuery(document).on('click', '#site-navigation .sub-menu a[href*="/#"]', function (e) {
    e.preventDefault();
    var url = jQuery(this).attr('href');
    var dest = '#' + jQuery(this).attr('href').split('#').pop();

    if (jQuery(dest).length > 0) {
      var scrollTo = Math.round(jQuery(dest).offset().top - 72, 0);
      jQuery('html, body').animate({
        scrollTop: scrollTo
      }, 800);

      if (jQuery('.menu-toggle').is(':visible')) {
        jQuery('.menu-toggle').trigger('click');
      }
    } else {
      window.location = url;
    }

    return false;
  });
})();
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Personio block functionalitu
 *
 * This shows the job positions from personio
 */
(function () {
  //link to request open positions 
  var xmlBase = "https://brighter-ai-jobs.personio.de/xml?language=en"; //base for career page; just add job id after for direct link

  var jobBase = "https://brighter-ai-jobs.personio.de/job/"; //https://brighter-ai-jobs.personio.de/
  //global arrays for position information 
  //vice president of sales and business 

  var posAry = []; //class for positions 

  var openPosition = /*#__PURE__*/function () {
    function openPosition(name, dep, loc, type, id) {
      _classCallCheck(this, openPosition);

      this.name = name;
      this.dep = dep;
      this.loc = loc;
      this.type = type;
      this.id = id;
    }

    _createClass(openPosition, [{
      key: "getLink",
      value: function getLink() {
        var link = jobBase.concat(this.id);
        return link;
      }
    }]);

    return openPosition;
  }(); //create an instance for xml requests 


  var xdata = new XMLHttpRequest(); //function when state is changed 

  xdata.onreadystatechange = function () {
    //xml status codes, dont worry 
    if (this.readyState == 4 && this.status == 200) {
      //check response data 
      var inst = this.responseXML; //get number of returned positions 

      var posNum = inst.getElementsByTagName("position").length; //loop positions to init each 

      for (i = 0; i < posNum; i++) {
        thisPos = inst.getElementsByTagName("position")[i];
        var temp = new openPosition(thisPos.getElementsByTagName("name")[0].textContent, thisPos.getElementsByTagName("recruitingCategory")[0].textContent, thisPos.getElementsByTagName("office")[0].textContent, thisPos.getElementsByTagName("employmentType")[0].textContent, thisPos.getElementsByTagName("id")[0].textContent);
        posAry.push(temp);
      }

      putContent();
    }
  }; //add get request 


  xdata.open("GET", xmlBase, true); //only send request on company page load 

  if (window.location.pathname.includes('company') || window.location.pathname.includes('unternehmen')) {
    xdata.send();
  } //build a post for every xml post


  function putContent() {
    //for every job opening
    for (i = 0; i < posAry.length; i++) {
      //create text nodes for text 
      var name, dep, loc, type, id;
      name = document.createTextNode(posAry[i].name);
      dep = document.createTextNode(posAry[i].dep);
      loc = document.createTextNode(posAry[i].loc);
      type = document.createTextNode(posAry[i].type);
      var position = document.createElement("div");
      var poslink = document.createElement("a");
      poslink.href = posAry[i].getLink();
      poslink.target = "_blank";
      position.appendChild(poslink);
      position.classList.add("j-bai-position");
      var namediv = document.createElement("div");
      namediv.classList.add("j-bai-name");
      namediv.appendChild(name);
      var depdiv = document.createElement("div");
      depdiv.classList.add("j-bai-dep");
      depdiv.appendChild(dep);
      var locdiv = document.createElement("div");
      locdiv.classList.add("j-bai-loc");
      locdiv.appendChild(loc);
      var typediv = document.createElement("div");
      typediv.classList.add("j-bai-type");
      typediv.appendChild(type);
      poslink.appendChild(namediv);
      poslink.appendChild(depdiv);
      poslink.appendChild(locdiv);
      poslink.appendChild(typediv);
      document.getElementById("positions").appendChild(position);
    }
  }
})();
/**
 * Personio block functionalitu
 *
 * This shows the job positions from personio
//  */
(function () {
  jQuery(document).ready(function ($) {
    $('.cat-list_item').on('click', function () {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');
      $.ajax({
        type: 'POST',
        url: 'http://localhost/brighter-clone/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'filter_projects',
          category: $(this).data('slug')
        },
        success: function success(res) {
          $('.project-tiles').html(res);
        }
      });
    });
  });
})();
/**
 * File site-header.js
 *
 * Hide fixed header when scrolling down, show when scrolling up.
 */
(function () {
  jQuery(document).ready(function ($) {
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.site-header').outerHeight();
    $(window).on('scroll.headerScrollEvent', function (event) {
      didScroll = true;
    });
    setInterval(function () {
      if (didScroll) {
        hasScrolled();
        didScroll = false;
      }
    }, 250);

    function hasScrolled() {
      var st = $(this).scrollTop(); // Make sure they scroll more than delta

      if (Math.abs(lastScrollTop - st) <= delta) return; // If they scrolled down and are past the navbar, add class .nav-up.
      // This is necessary so you never see what is "behind" the navbar.

      if (st > lastScrollTop && st > navbarHeight) {
        // Scroll Down
        $('.site-header').removeClass('nav-down').addClass('nav-up');
      } else {
        // Scroll Up
        if (st + $(window).height() < $(document).height()) {
          $('.site-header').removeClass('nav-up').addClass('nav-down');
        }
      }

      lastScrollTop = st;
    }
  });
})();
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
  var isIe = /(trident|msie)/i.test(navigator.userAgent);

  if (isIe && document.getElementById && window.addEventListener) {
    window.addEventListener('hashchange', function () {
      var id = location.hash.substring(1),
          element;

      if (!/^[A-z0-9_-]+$/.test(id)) {
        return;
      }

      element = document.getElementById(id);

      if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false);
  }
})();
/**
 * File testimonials-slider.js
 *
 * Init the slider for the testimonials block.
 */
(function () {
  jQuery(document).ready(function ($) {
    var $testimonialsSlider = $('.testimonials-slider');

    if ($testimonialsSlider.length > 0) {
      $testimonialsSlider.each(function () {
        var cols = $(this).parent('.testimonials').data('columns');

        if (cols == '3') {
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
      $(document).on('click', '.testimonials-slide.js-open-url', function (e) {
        e.preventDefault();
        window.open($(this).data('url'), '_blank');
      });
    }
  });
})();
/**
 * File to-top.js
 *
 * Button functionality to go back to the top a the page.
 */
(function () {
  jQuery(document).ready(function ($) {
    $(document).on('click', '.to-top a', function (e) {
      e.preventDefault();

      if ($(window).scrollTop() > 0) {
        $('html, body').animate({
          scrollTop: 0
        }, 600);
      }

      return false;
    });
  });
})();
/**
 * File video-carousel.js.
 *
 * Slick slider for video carousel in header.
 */
(function () {
  jQuery(document).ready(function ($) {
    var $videoCarousel = $('.video-header-slider');
    var activeVideo, videoEndedEvent;

    function changeSlide() {
      setTimeout(function () {
        activeVideo = $videoCarousel.find('.slick-active .video-intro:visible video'); // console.log('Video Count: ' + activeVideo.length);

        videoEndedEvent = activeVideo.on('ended', function () {
          // console.log('Next');
          $videoCarousel.slick('slickNext');
        });
      }, 500);
    }

    if ($videoCarousel.length > 0) {
      $videoCarousel.on('init', function (slick) {
        changeSlide();
      });
      $videoCarousel.on('reInit', function (slick) {
        changeSlide();
      });
      $videoCarousel.on('beforeChange', function (slick, currentSlide, nextSlide) {
        activeVideo.off('ended');
        $('.slick-slider .video-intro video').each(function () {
          this.pause();
          this.currentTime = 0;
        }); // activeVideo[0].pause();
        // activeVideo[0].currentTime = 0;
      });
      $videoCarousel.on('afterChange', function (slick, currentSlide) {
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
})();