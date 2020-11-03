jQuery(document).ready(function($) {
	$('.AddTag-form').hide();
	$('.Tag:not(.Tag--chosen, .Tag--added, .Tag--example)').click(function(event) {
		var tag = $(this).attr('data-filter');
		if (window.location.origin.includes('localhost')) {
			location.assign(window.location.origin + '/rce/discover/?tag=' + tag);
		} else {
			location.assign(window.location.origin + '/discover/?tag=' + tag);
		}
	});

	if($('.AddTag-form form').hasClass('show')) {
		$('.AddTag-btn').hide();
		$('.AddTag-form').show();
	} else {
		$('.AddTag-btn:not(.disabled)').click(function(event) {
			$(this).hide();
			$('.AddTag-form').fadeIn();
		});
	}
})