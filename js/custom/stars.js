/*
|--------------------------------------------------------------------------
	Dora - Coming Soon Template SCRIPT JS
|--------------------------------------------------------------------------
*/

$(document).ready(function() {

	"use strict";

	/*
	|--------------------------------------------------------------------------
		Notify Me
	|--------------------------------------------------------------------------
	*/

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
  $($("#email")).keypress(function(e) {
    if(e.which == 13) {
        $(".notify").trigger('click');
    }
  });
  $(".notify").on('click', function(){
		var notify = $(".notify");
    if(notify.hasClass("active")){
      var email = $("#email");
      if(isEmail(email.val()) == 0){
        $(".notify-area").effect("shake");
      }else{
        //Type here when email is correct
				notify.html("<i class='ion-checkmark-round'></i>").css("background", "#7dc139");
        setTimeout(function(){
          notify.removeClass("active").text("Notify Me").css("background", "#E91E63");
          $(".notify-area input").removeClass("active");
          $("#email").val('');

        }, 1500);
      }
    }else{
      $(".notify-area input").addClass("active");
      notify.addClass("active").html("<i class='ion-android-send'></i>");
    }
  });
  $(".overlay").on('click', function(){
    $(".notify-area input").removeClass("active");
    $(".notify").removeClass("active").html($(".notify").attr('data-title'));
  });

	/*
	|--------------------------------------------------------------------------
		Particle Js
	|--------------------------------------------------------------------------
	*/

	particlesJS('particles-js',

  {
    "particles": {
      "number": {
        "value": 160,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 1,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 1,
          "opacity_min": 0,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 4,
          "size_min": 0.3,
          "sync": false
        }
      },
      "line_linked": {
        "enable": false,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1,
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 600
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "bubble"
        },
        "onclick": {
          "enable": true,
          "mode": "repulse"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 400,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 250,
          "size": 0,
          "duration": 2,
          "opacity": 0,
          "speed": 3
        },
        "repulse": {
          "distance": 400,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  }

  );


});
