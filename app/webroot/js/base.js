$(document).ready(
function() {
	// First hide all of the flash messages
	$('#flashMessage').hide();

	// Easily hide and show things depending on the availability of Javascript.
	$('.no-javascript').hide();
	$('.enabled-javascript').show();
	
	// A standard cancel action for whenever it is needed.
	$('.cancel-action').bind('click', function(e) {
		referrer = $('#referrer_link');
		if ($(referrer).length) {
			document.location = $(referrer).attr('value');
		} else {
			if (document.referrer)
				document.location = document.referrer;
			else
				history.go(-1);
		}
		
		return false;
	});
	
	// An Ajax Feedback Form
	/*
	$( "#feedback-dialog" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"Send Feedback": function() {
					alert($('#feedback-comments').val());
					$.ajax({
					   type: "POST",
					   url: "/feedback/index/ajax/",
					   data: { 'data[Feedback][comments]' : $('#feedback-comments').val() },
					   success: function(msg){
						for(var i = 0; i < msg.length; i += 300)
							alert( "Data Saved: " + msg.substr(i, 300) );
					   }
					 });
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
	*/
	/*$('#feedback-link')
		.click(function() {
			$('#feedback-dialog').dialog('open');
			
			return false;
		});
	*/
	
	// A few things to enhance our flash message for the Intranet.
	$('#flashMessage').each(function(index, ele) {
		// The welcome message needs to be turned into a dialog instead.
		if ($(ele).attr('class') == 'welcome') {
			$(ele).dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				},
				title : 'Introduction',
			});
			
			return;
		}
		// First hide it, then slide it down and append a little link to close it.
		$(ele).delay(1000)
			.slideDown('slow')
			.append($('<a>')
					.addClass('close')
					.text('[ x ]')
					.bind('click', function(event) {
						$(this).parent().slideUp('slow');
					})
				);
	});
});