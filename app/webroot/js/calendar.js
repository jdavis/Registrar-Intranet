$(document).ready(
function() {
	function removeParent(event) {
		$(this).parent().remove();
	}

	/*
	// Used on the Add Event page. It just disables the 'To' field when the
	// All Day Button is selected. It's just a minor feature for the users.
	*/
	if ($('#EventAddForm').length || $('#EventEditForm').length) {
		$('#EventAllDay').bind('click', function(event) {
			if ($(this).attr('checked')) {
				$('.datetime-picker:last input').attr('disabled', 'disabled');
				$('.datetime-picker:last select').attr('disabled', 'disabled');
			} else {
				$('.datetime-picker:last input').attr('disabled', '');
				$('.datetime-picker:last select').attr('disabled', '');
			}
		});
		
		if ($('#EventAllDay').attr('checked')) {
			$('.datetime-picker:last input').attr('disabled', 'disabled');
			$('.datetime-picker:last select').attr('disabled', 'disabled');
		} 
	}
	
	/*
	** Create a dialog when a Event on the Calendar is clicked.
	*/
	$('.calendar-event').bind('click', function(event) {
		// Select the corresponding event dialog for the one that was clicked.
		var id = '#' + $(this).attr('id') + '-dialog';
		
		$(id).dialog({
			'title' : 'Event Details',
		});
		
		return false;
	});
	
	if ($('.multi-combobox').length) {
		alert('multis found');
		$('body').data('combos', $('.multi-combobox').length - 1);
		
		$('.remove-button').button({
			icons : {
				primary : 'ui-icon-minus',
			},
			text : false,
		}).bind('click', removeParent);
		
		$('.add-button').button({
			icons : {
				primary : 'ui-icon-plus',
			},
			text : false,
		}).bind('click', function(event) {
			alert('add called');
			var count = $('body').data('combos');
			
			var name = $(this).parent()
						.children('select')
						.attr('name').replace(/\[\d+\]$/, '[' + count + ']');
			
			var clone = $('#hidden-combobox')
				.clone()
				.css('display', 'block')
				.attr('id', '');
				alert('comboboxing');
			$(clone).children('select')
				.attr('name', name)
				.combobox();
			$(clone).children('.remove-button')
				.bind('click', removeParent);
				
			$(this)
				.parent()
				.after(clone);
				
			$('body').data('combos', count + 1);
		});
	}
});