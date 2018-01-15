/*
|--------------------------------------------------------------------------
	Dora - Coming Soon Template SCRIPT JS
|--------------------------------------------------------------------------
*/

//check whether submit button save is click, prevent double post save
var isEnableSave = 0;

//button save click
function setEnableSave() {
	isEnableSave = 1;
}

/**
 * form function
 */
//count total json (obj)
function countProperties(obj) {
	var prop;
	var propCount = 0;

	$.each(obj, function (index, value) {
		propCount++;
	});
	
	return propCount;
}

//find existed string
function strpos (haystack, needle) {
	var i = (haystack+'').indexOf(needle, 0);
	return i === -1 ? false : i;
}

//clear input
function clearInput(form) {
	$(form).find(':input').each(function() {
		switch(this.type) {
			case 'password':
			case 'select-multiple':
			case 'select-one':
			case 'text':
			case 'textarea':
				$(this).val('');
				break;
			case 'checkbox':
			case 'radio':
				this.checked = false;
		}
	});
}

$(document).ready(function() {

	"use strict";

	/*
	|--------------------------------------------------------------------------
		Full Page
	|--------------------------------------------------------------------------
	*/

	$('#wrapper').fullpage({
		//Navigation
		menu: '#menu',
		lockAnchors: false,
		anchors: ['Home', 'What We Do', 'About', 'Contact'],
		navigation: true,
		navigationPosition: 'right',
		/* navigationTooltips: ['Home', 'Portfolio', 'Contact'], */
		showActiveTooltip: false,
		slidesNavigation: false,
		slidesNavPosition: 'bottom',

		//Scrolling
		css3: true,
		scrollingSpeed: 700,
		autoScrolling: true,
		fitToSection: true,
		fitToSectionDelay: 1000,
		scrollBar: false,
		easing: 'easeInOutCubic',
		easingcss3: 'ease',
		loopBottom: false,
		loopTop: false,
		loopHorizontal: true,
		continuousVertical: false,
		continuousHorizontal: false,
		scrollHorizontally: false,
		interlockedSlides: false,
		dragAndMove: false,
		offsetSections: false,
		resetSliders: false,
		fadingEffect: false,
		normalScrollElements: '#element1, .element2',
		scrollOverflow: false,
		scrollOverflowReset: false,
		scrollOverflowOptions: null,
		touchSensitivity: 15,
		normalScrollElementTouchThreshold: 5,
		bigSectionsDestination: null,

		//Accessibility
		keyboardScrolling: true,
		animateAnchor: true,
		recordHistory: true,

		//Design
		controlArrows: true,
		verticalCentered: true,
		paddingTop: '3em',
		paddingBottom: '10px',
		fixedElements: '#header, .footer',
		responsiveWidth: 0,
		responsiveHeight: 0,
		responsiveSlides: false,
		parallax: false,
		parallaxOptions: {
			type: 'reveal',
			percentage: 62,
			property: 'translate'
		},

		//Custom selectors
		sectionSelector: '.section',
		slideSelector: '.slide',

		lazyLoading: true,

		//events
		onLeave: function(index, nextIndex, direction) {},
		afterLoad: function(anchorLink, index) {},
		afterRender: function() {},
		afterResize: function() {},
		afterResponsive: function(isResponsive) {},
		afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {},
		onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {}
	});


	/*
	|--------------------------------------------------------------------------
		Portfolio Carousel
	|--------------------------------------------------------------------------
	*/

	var owl = $("#portfolio");

	owl.owlCarousel({
		items: 3,
		itemsDesktop: [1000, 3], //5 items between 1000px and 901px
		itemsDesktopSmall: [900, 3], // betweem 900px and 601px
		itemsTablet: [600, 1], //2 items between 600 and 0
		itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
	});

	// Custom Navigation Events
	$(".next").on('click', function() {
		owl.trigger('owl.next');
	});
	$(".prev").on('click', function() {
		owl.trigger('owl.prev');
	});
	$(".play").on('click', function() {
		owl.trigger('owl.play', 1000);
	});
	$(".stop").on('click', function() {
		owl.trigger('owl.stop');
	});

	/*
	|--------------------------------------------------------------------------
		Page Navigation
	|--------------------------------------------------------------------------
	*/

	setInterval(function() {
		var rightSpan = $(".right span");
		if ($(".bg-page").hasClass("active")) {
			if (!rightSpan.hasClass("firstactive")) {
				rightSpan.addClass("firstactive");
			}
		} else {
			if (rightSpan.hasClass("firstactive")) {
				rightSpan.removeClass("firstactive");
			}
		}
	}, 100);

	/*
	|--------------------------------------------------------------------------
		Countdown
	|--------------------------------------------------------------------------
	*/

	var cdate = new Date($("#countDownDate").val()).getTime();

	function countDown() {
		var now = new Date().getTime();
		var distance = cdate - now;
		if (distance < 0) {
			clearInterval(cdown);
			document.getElementById("timer").innerHTML = ($("#countDownDate").attr("expireword"));
		} else {
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
			var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
			var seconds = Math.floor(distance % (1000 * 60) / 1000);
			if (days < 10) {
				days = "0" + days;
			}
			if (hours < 10) {
				hours = "0" + hours;
			}
			if (minutes < 10) {
				minutes = "0" + minutes;
			}
			if (seconds < 10) {
				seconds = "0" + seconds;
			}
			document.getElementById("timer").innerHTML = days + "<span>d</span>: " + hours + "<span>h</span>: " + minutes + "<span>m</span> <span>" + seconds + "</span>";
		}
	}
	countDown();
	var cdown = setInterval(function() {
		countDown();
	}, 1000);

	/*
	|--------------------------------------------------------------------------
		Ripple Effect
	|--------------------------------------------------------------------------
	*/

	$(function() {
		var ink, d, x, y;
		$(".ripplelink").mousedown(function(e) {
			if ($(this).find(".ink").length === 0) {
				$(this).prepend("<span class='ink'></span>");
			}

			ink = $(this).find(".ink");
			ink.removeClass("animate");

			if (!ink.height() && !ink.width()) {
				d = Math.max($(this).outerWidth(), $(this).outerHeight());
				ink.css({
					height: d,
					width: d
				});
			}

			x = e.pageX - $(this).offset().left - ink.width() / 2;
			y = e.pageY - $(this).offset().top - ink.height() / 2;

			ink.css({
				top: y + 'px',
				left: x + 'px'
			}).addClass("animate");
		});
	});

	/*
	|--------------------------------------------------------------------------
		Material Input
	|--------------------------------------------------------------------------
	*/

	$(".field input,textarea").focus(function() {
		$(this).parent().addClass("is-focused has-label");
	});
	$(".field input,textarea").blur(function() {
		var parent = $(this).parent();
		if ($(this).val() == '') {
			parent.removeClass("has-label");
		}
		$(this).parent().removeClass("is-focused");
	});

	/*
	|--------------------------------------------------------------------------
		Image Modal
	|--------------------------------------------------------------------------
	*/

	$('.galleryItem').magnificPopup({
		type: 'image',
		mainClass: 'mfp-with-zoom',
		zoom: {
			enabled: true,

			duration: 300,
			easing: 'ease-in-out',

			opener: function(openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});

	/*
	|--------------------------------------------------------------------------
		Contact Form
	|--------------------------------------------------------------------------
	*/

	// Dialog and General Function Form
	$('form').submit(function(event) {
		$(this).find('input[type="submit"]').addClass('active');
		var attrSave = '?&enablesave=' + isEnableSave;
		//var attrSave = '/enablesave/' + isEnableSave;
		var method  = $(this).attr('method');
		var url     = $(this).attr('action') + attrSave;
		var link     = $(this).attr('action');

		if(method != 'get') {
			var options = {
				type: 'GET',
				dataType: 'json',
				//data: { enablesave: isEnableSave },
				success: function(response) {
					var hasError = 0;
					if(countProperties(response) > 0) {
						$.each(response, function (index, value) {
							if(strpos(index,'_')) {
								hasError = 1;
							}
						});
						if(hasError == 1) {
							$('form[action="'+link+'"]').find('input[type="submit"]').removeClass('active');

							$('form[action="'+link+'"]').find('div.errorMessage').hide().html('');
							$('form[action="'+link+'"]').find('textarea').removeClass('error');
							$('form[action="'+link+'"]').find('input').removeClass('error');
							$.each(response, function (index, value) {
								$('form[action="'+link+'"]').find('div#ajax-message').html(response.msg);
								$('form[action="'+link+'"] #' + index ).addClass('error');
								$('form[action="'+link+'"] #' + index + '_em_').show().html(value);
							});

						} else {
							$('form[action="'+link+'"]').find('input[type="submit"]').removeClass('active');

							$('form[action="'+link+'"]').find('div.errorMessage').hide().html('');
							$('form[action="'+link+'"]').find('textarea').removeClass('error');
							$('form[action="'+link+'"]').find('input').removeClass('error');
							
							if(response.type == 'contact') {
								$("#success").fadeIn(300).html(response.msg);
								$("#success").delay(3000).fadeOut(300);
								clearInput('form[action="'+link+'"]');
							}
						}
					}
				}
			}
			
			if(method == 'post') {
				options.data = $(this).serialize();
				options.type = 'POST';
			}
			$.ajax(url, options);
			event.preventDefault();
		}
	});


});