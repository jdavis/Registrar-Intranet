$(document).ready(
function() {
	// When adding an announcement, it changes the Custom... to dates
	$('#AnnouncementExpiration').change(function () {
				$('#AnnouncementExpiration option:selected').each(function () {
					if ($(this).text() == 'Custom...') {
						$('.expiration-custom').each(function(index, ele) {
							$(ele).attr('disabled', '');
						});
					} else {
						$('.expiration-custom').each(function(index, ele) {
							$(ele).attr('disabled', 'disabled');
						});
					}
				})
		}).trigger('change');
});