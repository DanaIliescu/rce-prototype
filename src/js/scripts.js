jQuery(document).ready(function($) {
	$('.AddTag-form').hide();
	$('.Tag:not(.Tag--chosen, .Tag--added)').click(function(event) {
		var tag = $(this).attr('data-filter');
		if (window.location.origin.includes('localhost')) {
			location.assign(window.location.origin + '/rce/discover/?tag=' + tag);
		} else {
			location.assign(window.location.origin + '/discover/?tag=' + tag);
		}
	});

	$('.AddTag-infoBtn').hover(
		function() {
			$('.AddTag-infoBox').fadeIn();
		},
		function() {
			$('.AddTag-infoBox').fadeOut();
		},
	);
	if($('.AddTag-form form').hasClass('show')) {
		$('.AddTag-btn').hide();
		$('.AddTag-infoBtn ').hide();
		$('.AddTag-form').show();
	} else {
		$('.AddTag-btn').click(function(event) {
			$(this).hide();
			$('.AddTag-infoBtn ').hide();
			$('.AddTag-form').fadeIn();
		});
	}
})