/*
|--------------------------------------------------------------------------
	Dora - Coming Soon Template SCRIPT JS
|--------------------------------------------------------------------------
*/

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
		anchors:['Home', 'What We Do', 'About', 'Contact'],
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
		parallaxOptions: {type: 'reveal', percentage: 62, property: 'translate'},

		//Custom selectors
		sectionSelector: '.section',
		slideSelector: '.slide',

		lazyLoading: true,

		//events
		onLeave: function(index, nextIndex, direction){},
		afterLoad: function(anchorLink, index){},
		afterRender: function(){},
		afterResize: function(){},
		afterResponsive: function(isResponsive){},
		afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){},
		onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){}
	});


	/*
	|--------------------------------------------------------------------------
		Portfolio Carousel
	|--------------------------------------------------------------------------
	*/

  var owl = $("#portfolio");

  owl.owlCarousel({
      items : 3,
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });

  // Custom Navigation Events
  $(".next").on('click', function(){
    owl.trigger('owl.next');
  });
  $(".prev").on('click', function(){
    owl.trigger('owl.prev');
  });
  $(".play").on('click', function(){
    owl.trigger('owl.play',1000);
  });
  $(".stop").on('click', function(){
    owl.trigger('owl.stop');
  });

	/*
	|--------------------------------------------------------------------------
		Page Navigation
	|--------------------------------------------------------------------------
	*/

  setInterval(function(){
		var rightSpan = $(".right span");
    if($(".bg-page").hasClass("active")){
      if(!rightSpan.hasClass("firstactive")){
        rightSpan.addClass("firstactive");
      }
    }else{
      if(rightSpan.hasClass("firstactive")){
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
  function countDown(){
    var now = new Date().getTime();
    var distance = cdate - now;
    if(distance < 0){
      clearInterval(cdown);
      document.getElementById("timer").innerHTML = ($("#countDownDate").attr("expireword"));
    }else{
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor(distance % (1000 * 60 * 60 *24) / (1000 * 60 * 60));
      var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
      var seconds = Math.floor(distance % (1000 * 60) / 1000);
      if(days < 10){days = "0" + days;}
      if(hours < 10){hours = "0" + hours;}
      if(minutes < 10){minutes = "0" + minutes;}
      if(seconds < 10) {seconds = "0" + seconds;}
      document.getElementById("timer").innerHTML = days + "<span>d</span>: " + hours + "<span>h</span>: " + minutes + "<span>m</span> <span>" + seconds + "</span>";
    }
  }
  countDown();
  var cdown = setInterval(function(){
  countDown();
  }, 1000);

	/*
	|--------------------------------------------------------------------------
		Ripple Effect
	|--------------------------------------------------------------------------
	*/

  $(function(){
  	var ink, d, x, y;
  	$(".ripplelink").mousedown(function(e){
      if($(this).find(".ink").length === 0){
          $(this).prepend("<span class='ink'></span>");
      }

      ink = $(this).find(".ink");
      ink.removeClass("animate");

      if(!ink.height() && !ink.width()){
          d = Math.max($(this).outerWidth(), $(this).outerHeight());
          ink.css({height: d, width: d});
      }

      x = e.pageX - $(this).offset().left - ink.width()/2;
      y = e.pageY - $(this).offset().top - ink.height()/2;

      ink.css({top: y+'px', left: x+'px'}).addClass("animate");
  });
  });

	/*
	|--------------------------------------------------------------------------
		Material Input
	|--------------------------------------------------------------------------
	*/

  $(".field input,textarea").focus(function(){
    $(this).parent().addClass("is-focused has-label");
  });
  $(".field input,textarea").blur(function(){
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

  $("#contact-button").on('click', function(){
    $.post("contact.php", $("#contact-form").serialize(), function(response){
      $("#success").fadeIn(300).html(response);
      $("#success").delay(3000).fadeOut(300);
    });
  });


});
