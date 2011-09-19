$(document).ready(
function() {
	// Only show the Emergency Contacts if the link is clicked
	$('#emergency-show').click(function() {
		$('#emergency-contacts').toggle();
		
		return false;
	});
});