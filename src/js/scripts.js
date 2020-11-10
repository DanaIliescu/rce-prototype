jQuery(document).ready(function($) {
	$('.Letter').click(function(event) {
		var letter = $(this).attr('data-filter');
		if (window.location.origin.includes('localhost')) {
			location.assign(window.location.origin + '/rce/discover/?tagStartsWith=' + letter);
		} else {
			location.assign(window.location.origin + '/discover/?tagStartsWith=' + letter);
		}
	});
	
	$('.Tag:not(.Tag--chosen, .Tag--added, .Tag--example)').click(function(event) {
		var tag = $(this).attr('data-filter');
		if (window.location.origin.includes('localhost')) {
			location.assign(window.location.origin + '/rce/discover/?tag=' + tag);
		} else {
			location.assign(window.location.origin + '/discover/?tag=' + tag);
		}
	});


	$('#Discover-btn').click(function(event) {
		console.log('test');
		if (window.location.origin.includes('localhost')) {
			location.assign(window.location.origin + '/rce/discover/');
		} else {
			location.assign(window.location.origin + '/discover/');
		}
	});

	$('.AddTag-form').hide();

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