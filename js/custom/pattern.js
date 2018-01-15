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
		if (e.which == 13) {
			$(".notify").trigger('click');
		}
	});
	
	$(".notify").on('click', function() {
		var notify = $(".notify");
		if (notify.hasClass("active")) {
			var email = $("#email");
			if (isEmail(email.val()) == 0) {
				$(".notify-area").effect("shake");
			}
		} else {
			$(".notify-area input").addClass("active");
			notify.addClass("active").html("<i class='ion-android-send'></i>");
		}
	});
	$(".overlay").on('click', function() {
		$(".notify-area input").removeClass("active");
		$(".notify").removeClass("active").html($(".notify").attr('data-title'));
	});


});