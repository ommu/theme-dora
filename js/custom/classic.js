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
	
	$(".notify").on('click', function() {
		var notify = $(".notify");
		if (notify.hasClass("active")) {
			var email = $("#email");
			if (isEmail(email.val()) == 0) {
				$(".notify-area").effect("shake");
			} else {
				//Type here when email is correct
				notify.html("<i class='ion-checkmark-round'></i>").css("background", "#F26101");
				setTimeout(function() {
					notify.removeClass("active").text("Notify Me").css("background", "#F26101");
					$(".notify-area input").removeClass("active");
					$("#email").val('');

				}, 1500);
			}
		} else {
			$(".notify-area input").addClass("active");
			notify.addClass("active").html("<i class='ion-android-send'></i>");
		}
	});
	$(".cloud").on('click', function() {
		$(".notify-area input").removeClass("active");
		$(".notify").removeClass("active").html($(".notify").attr('data-title'));
	});


});