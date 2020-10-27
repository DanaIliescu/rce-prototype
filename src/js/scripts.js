jQuery(document).ready(function($) {
	$('.Tag').click(function(event) {
		var tag = $(this).attr('data-filter');
		location.assign(window.location.origin + '/rce/discover/?tag=' + tag);
	});
})