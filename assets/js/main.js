$(document).ready(function() {
	var left_placement = (window.innerWidth/2) - 150;
	//handels registration click event
	$('.reg').click(function(e) {
		console.log(e);
		// box placed based on click x, y coords

		//cues background shadow div
		$('.shadow').transition('fade', '2000ms');
		//sets position of form window
		$('.register_window').css({top:  "20px", left: left_placement + "px"});
		//cues transition animation fo reg form
		$('.register_window').transition('fly up');

	});
	//handles closing form upon click of x inside of form window
	$('.close_reg').click(function() {
		//dismisses form window with animation
		$('.register_window').transition('fly down');
		//dimisses backdrop shadow
		$('.shadow').transition('fade', '800ms');
	})

	//same method for click of learn button
	$('.lrn').click(function(e) {
		$('.shadow').transition('fade', '2000ms');
		$('.learn_more_window').css({top: "20px", left: left_placement + "px"});
		$('.learn_more_window').transition('fly up');
	})

	$('.close_lrn').click(function() {
		$('.learn_more_window').transition('fly down');
		$('.shadow').transition('fade', '800ms');
	})

	//same method for click of login button
	$('.log').click(function(e) {
		$('.shadow').transition('fade', '2000ms');
		$('.login_window').css({top: "20px", left: left_placement + "px"});
		$('.login_window').transition('fly up');
	})
	$('.close_log').click(function() {
		$('.login_window').transition('fly down');
		$('.shadow').transition('fade', '800ms');
	});
	$('.error_close').click(function() {
		location.reload();
	});

	//handles dismissing any of the windows if they are open upon click of the shadow background
	$('.shadow').click(function() {
		if ($('.register_window').transition('is visible')) {
			$('.register_window').transition('fly down');
		}
		if ($('.learn_more_window').transition('is visible')) {
			$('.learn_more_window').transition('fly down');
		}
		if ($('.login_window').transition('is visible')) {
			$('.login_window').transition('fly down');
		}
		$('.shadow').transition('fade', '800ms');
	})

	$('.woof').transition({
		animation: 'fade in',
		duration: 1000
		// onComplete: function() {
		// 	$(this).transition('tada');
		// }
	})

	$('.nav, .park_finder').transition({
		animation: 'fade in',
		duration: 1000
	})

});
