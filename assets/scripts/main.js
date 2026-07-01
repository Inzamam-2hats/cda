/* eslint-disable */
;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);
	var $sliderTestimonials = $('.slider-testimonials .slider__slides');
	var $sliderHistory = $('.slider-history .slider__slides');
	var $sliderSteps = $('.slider-steps .slider__slides');
	var $formBtn = $('.form-modal .gform_button');
	var $animate = $('.animate');
	var animatedClass = 'animated';
	var group = 1;
	var index = 0;
	var counterPrimary = 0;
	var counterIndex = 0;
	var isLoading = false;
	var scrolledTo = 0;

	function headerScroll() {
		var winScroll = $win.scrollTop();
		var $header = $('.header');
		var $wrapper = $('.wrapper');
		var isHeaderFixed = winScroll > 0;

		$header.toggleClass('scroll', isHeaderFixed);
		$wrapper.toggleClass('scroll', isHeaderFixed);
	}

	$doc
    .on('focus', 'input', function(){
      var $error = $(this).parent().siblings('.validation_message');

      if ($error.length) {
        $error.css({
          'display': 'none'
        });
      }
    })
    .on('blur', 'input', function(){
      var $error = $(this).parent().siblings('.validation_message');

      if ($error.length) {
        $error.css({
          'display': 'block'
        });
      }
    });

	$win.on('load', function() {
		$sliderTestimonials.slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 8000,
			arrows: true,
			appendArrows: $('.slider-testimonials .slider__actions'),
		});

		$sliderHistory.slick({
			infinite: true,
			slidesToShow: 3,
			arrows: true,
			appendArrows: $('.slider-history .slider__actions'),
			responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1
				}
			}
			]
		});

		if ($sliderSteps.length) {
			$sliderSteps
			.addClass('owl-carousel')
			.owlCarousel({
				nav: true,
				navContainer: $('.slider-steps .slider__actions'),
				loop: true,
				items: 1,
				mouseDrag: false,
				startPosition: 0
			});
		}
	}).on('load scroll', function() {
		headerScroll();

		var $wrapper = $('.wrapper');
		var winST = $win.scrollTop();
		var winH  = $win.outerHeight();
		var wrapperH = $wrapper.outerHeight()

		$animate.each(function() {
			var $this = $(this);

			if((winST + (winH / 1.1) >= $this.offset().top) || (winST + winH > wrapperH - 10)) {
				$this.addClass(animatedClass);
			}
		});

		// Numbers Count Up
		if( $('.js-count').length ) {
			var offTop = $('.numbers').offset().top - window.innerHeight;

			$('.js-count').each(function(i) {
				var countNumber = $(this).data('count');
				var decimal = 0;
				var prefix = $(this).data('prefix') || '';
				var suffix = $(this).data('suffix') || '';

				if ( counterIndex == 0 && $win.scrollTop() > offTop ) {
					var options = {
						useEasing: true,
						useGrouping: true,
						separator: ',',
						decimal: '.',
						prefix: prefix,
						suffix: suffix
					};

					setTimeout(function() {
						var numCount = new CountUp(this, 0, countNumber, decimal, 5, options);

						if (!numCount.error) {
							numCount.start();
						} else {
							console.error(numCount.error);
						}
					}.bind(this), i * 500);

					if( counterPrimary > 3 ) {
						counterIndex = 1;
					}

					counterPrimary++
				}
			});
		}
	});

	$win.on('load resize', function() {
		if ( $win.innerWidth() > 767) {
			$('.sub-menu').each(function() {
				$('.sub-menu').removeClass('dd-show');
			});
		}
	});

	$doc.ready(function() {
		$doc.on( 'click', '.btn-updates', function(e){
			e.preventDefault();

			var updateUrl = $(this).attr('href');

			if (isLoading) {
				return;
			}

			isLoading = true;

			$.ajax({
				type: 'GET',
				url: updateUrl,
				success: function (response) {
					var postUrl = $(response).find('.profile a').attr('href');

					if ( postUrl ) {
						window.location.href = postUrl;
					} else {
						window.location.href = updateUrl;
					}
				},
				complete: function () {
					isLoading = false;
				}
			});
		});

		$('.js-btn-scroll').on( 'click', function(e) {
			var href    = $(this).attr('href');
			var $header = $('.header .header__content').height();

			$('html, body').animate({
				scrollTop: $(href).offset().top - $header
			}, 900);

			return false;
		});

		$('.form-payment select').selectric();

		$('.scene').on('click', function(е){
			е.preventDefault();

			var container = 'tour__inner';
			var panorama = $(this).data('panorama');

			$('#' + container).empty();

			var PSV = new PhotoSphereViewer({
				panorama: panorama,
				container: container,
				navbar: 'autorotate zoom download fullscreen',
				default_fov: 65,
				mousewheel: false,
				size: {
					height: 650
				}
  			});
		});

		$doc.on( 'submit', '.form-eligibility', function(e){
			e.preventDefault();

			scrolledTo = $win.scrollTop();

			var programName  = $(this).data('program');
			var familyIncome = $('.size-select').find(':selected').data('income');
			var monthlyGross = $('.js-money-field').val().replace(/\D/g, '');
			var selectedNeed = $('.need-select').val();

			if ( selectedNeed === 'Other' ) {
				$('.modal--other-eligible')
					.modal('toggle');

				$('.modal--other-eligible')
					.find('.program-title')
					.html(programName);
			} else if ( familyIncome >= monthlyGross ) {
				$('.modal--eligible')
					.find('.program-title')
					.html(programName);

				$('.gfield-need')
					.find('input')
					.val(selectedNeed);

				$('.gfield-program')
					.find('input')
					.val(programName);

				$('.modal--eligible')
					.modal('toggle');
			} else {
				$('.modal--not-eligible')
					.modal('toggle');

				$('.modal--not-eligible')
					.find('.program-title')
					.html(programName);
			}

			$('.js-money-field').val('');

			$('.form-payment select').each(function(){
				$(this).prop('selectedIndex', 0).selectric('refresh');
			});
		});

		$('.map').each(function(){
			var $map   = $(this).find('.map__media');

			var center = {
				lat: $map.data('lat'),
				lng: $map.data('lng')
			}

			var map;

			map = new google.maps.Map($map[0], {
				center: center,
				zoom  : 16,
				disableDefaultUI: true,
			});

			new google.maps.Marker({
				map     : map,
				position: center,
			});

		});

		$('.map').each(function() {
			$(this)
				.find('.map__link')
					.on('click', function() {
						var $this = $(this);
						var $mapUrl = $this.parent().find('[data-directions]');
						var mapLocation = $mapUrl.data('directions');

						window.open(mapLocation,'_blank');
					});
		});

		$doc.on('click', '.slider-steps .owl-item', function() {
			var $clickedSlide = $(this);
			var clonedLength = $clickedSlide.parent().find('.cloned').length / 2;

			$sliderSteps.trigger('to.owl.carousel', $clickedSlide.index() - clonedLength);
		});

		$('.btn-play').magnificPopup({
			type: 'iframe',
			iframe: {
				patterns: {
					youtube: {
						index: 'youtube.com/',
						id: function(url) {
							var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
							if ( !m || !m[1] ) return null;
							return m[1];
						},
						src: '//www.youtube.com/embed/%id%?autoplay=1'
					},
					vimeo: {
						index: 'vimeo.com/',
						id: function(url) {
							var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
							if ( !m || !m[5] ) return null;
							return m[5];
						},
						src: '//player.vimeo.com/video/%id%?autoplay=1'
					}
				}
			}
		});

		$('.btn-modal').on('click', function(e){
			e.preventDefault();

			scrolledTo = $win.scrollTop();
			
			$('.modal--form').modal('toggle');
		});

		$('.btn-form-modal').on('click', function(e){
			e.preventDefault();

			scrolledTo = $win.scrollTop();

			$(this)
				.closest('.callout')
				.next('.modal')
				.modal('toggle');
		});

		$('.js-btn-info').on('click', function(e){
			e.preventDefault();

			scrolledTo = $win.scrollTop();

			$('.modal--info').modal('toggle');
		});

		$('.js-btn-eligibility-requirement').on('click', function(e){
			e.preventDefault();

			scrolledTo = $win.scrollTop();

			$('.modal--eligibility-requirement').modal('toggle');
		});

		$('.js-btn-need-requirement').on('click', function(e){
			e.preventDefault();

			scrolledTo = $win.scrollTop();

			$('.modal--need-requirement').modal('toggle');
		});

		$('.btn-close-modal').on('click', function(e){
			e.preventDefault();

			$('.modal--form').modal('hide');
			$('.modal--form-secondary').modal('hide');
			$('.modal--tour').modal('hide');
			$('.modal--info').modal('hide');
			$('.modal--eligibility-requirement').modal('hide');
			$('.modal--need-requirement').modal('hide');
			$('.modal--eligible').modal('hide');
			$('.modal--not-eligible').modal('hide');
			$('.modal--other-eligible').modal('hide');
		});

		$('.modal--form-secondary').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--form').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--tour').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--info').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--eligibility-requirement').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--need-requirement').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--eligible').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--other-eligible').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.modal--not-eligible').on('hidden.bs.modal', function() {
			$('html, body').animate({
				scrollTop: scrolledTo
			}, 700);
		});
		$('.btn-tour--1').on('click', function(e){
			e.preventDefault();

			var $this = $(this);
			var $items = $('#sceneList li');

			scrolledTo = $win.scrollTop();

			$('.tour--1').modal('toggle');

			$items.addClass('hidden');

			$this
			.data('navitems')
			.split(',')
			.forEach(function(number) {
				$('[data-id="' + number + '"]').removeClass('hidden');
			});

			var Event = document.createEvent('Event');

			Event.initEvent('click', true, true);

			$items
			.not('.hidden')
			.filter(':first')
			.find('a')
			.get(0)
			.dispatchEvent(Event);
		});

		$('.btn-menu').on('click', function (e) {
			e.preventDefault();

			$('.nav').toggleClass('nav--visible');
			$('.btn-menu').toggleClass('btn-menu--close');
			$('.header').toggleClass('bar-visible');
		});

		$('.menu-item-has-children > a').on('click', function (e) {
			var $menu = $(this).siblings('ul');

			if ( $win.innerWidth() < 768 ) {
				e.preventDefault();

				$menu.toggleClass('dd-show');
			}
		});

		$doc.on('touchstart', function(e){
			var $target = $(e.target);

			if (!$target.closest('.dd-visible, .nav li').length) {
				$('.dd-visible').removeClass('dd-visible');
			}

			if (!$target.closest('.nav, .btn-menu, .nav-lang').length) {
				$('.nav').removeClass('nav--visible');
				$('.btn-menu').removeClass('btn-menu--close');
				$('.header').removeClass('bar-visible');
			}
		});

		$('[data-group]').each(function() {
			var $this = $(this);
			var elemGroup = $this.data('group');

			if (elemGroup !== group) {
				index = 0;
				group = elemGroup;
			}

			$this
			.css({
				'transitionDelay': '' + .2 * index++ + 's'
			});
		});

		$('.form__hint a').on('click', function(e) {
			e.preventDefault();
		});

		$('.accordion__head a').on('click', function(e) {
			e.preventDefault();

			$(this)
			.closest('.accordion__head')
			.siblings('.accordion__body')
			.slideToggle()
			.closest('.accordion__section')
			.toggleClass('accordion__section--opened')
		});

		var $form = $( ".form-payment" );
		var $input = $form.find( "input" );

		$input.on( "keyup", function( event ) {

			// When user select text in the document, also abort.
			var selection = window.getSelection().toString();
			if ( selection !== '' ) {
				return;
			}

			// When the arrow keys are pressed, abort.
			if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
				return;
			}


			var $this = $( this );

			// Get the value.
			var input = $this.val();

			var input = input.replace(/[\D\s\._\-]+/g, "");
			input = input ? parseInt( input, 10 ) : 0;

			$this.val( function() {
				return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
			});
		});
		// Jan 08 2019
		$('.inline-search').on('click' , function(){
			$(this).toggleClass('activate');
		});
	});
})(jQuery, window, document);
