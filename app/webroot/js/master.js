$(document).ready(
function() {
	// jQuery snow effect for those nice, winter days
	/*$('#header').snowfall({flakeCount : 38, maxSpeed : 5, maxSize : 3});*/
	
	function removeParent(event) {
		$(this).parent().remove();
	}
	
	(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = this.input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				this.button = $( "<button type='button'>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},

			destroy: function() {
				this.input.remove();
				this.button.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );

	
	if ($('input.datetime').length) {
		$('input.datetime').datetime({
						userLang	: 'en',
						americanMode: true,
					});
		$('#AnnouncementExpiration').change(function () {
				$('#AnnouncementExpiration option:selected').each(function () {
					if ($(this).text() == 'Custom...') {
						$('.expiration-picker').show();
					} else {
						$('.expiration-picker').hide();
					}
				})
		}).trigger('change');
	}
	
	// An enhanced text editor using jQuery
    $('.wysiwyg').wysiwyg({
		controls: {
			subscript    : { visible : false },
			superscript  : { visible : false },
			insertOrderedList    : { visible : false },
			insertUnorderedList  : { visible : false },
			undo         : { visible : true },
			redo         : { visible : true },
		}
	});
	
	$('select.combobox').combobox();
	
	$('select.form').change(function() {
		document.location = '/outreaches/index/' + $(this).attr('value');
	});
	
	// Take all of the default datetime inputs and change them (if JS is enabled),
	// to use a nicer way to input the date and time individually.
	if ($('div.datetime-picker').length) {
		$('div.datetime-picker').each(function(index, ele) {
			// The default CakePHP datetime input
			var selects = $(ele).children('select:lt(3)');
			var label = $(ele).children('label');
			
			// Format the date from the selectors
			var date = $(selects[2]).val() + '-';
			date += $(selects[0]).val() + '-'
			date += $(selects[1]).val();
			
			// Add a new input after the label for our jQuery date-picker
			$(ele).children('label').after($('<input/>', {
				'name' : $(selects[0]).attr('name').match(/(.+)\[.+\]$/)[1],
				'id' : $(label).attr('for'),
				'value' : date,
				'class' : 'date-picker',
			}));
			
			// Remove the CakePHP supplied Month - Date - Year selects
			$(selects).remove();
		});
		/*
		// The two last fields need to be enabled in order for them to
		// post their data.
		*/
		$('form').submit(function(eo) {
			$('.datetime-picker:last input').attr('disabled', '');
			$('.datetime-picker:last select').attr('disabled', '');
			return true;
		});
	}
	
	if ($('div.date-picker').length) {
		$('div.date-picker').each(function(index, ele) {
			// The default CakePHP datetime input
			var selects = $(ele).children('select:lt(3)');
			var label = $(ele).children('label');
			
			// Format the date from the selectors
			var date = $(selects[2]).val() + '-';
			date += $(selects[0]).val() + '-'
			date += $(selects[1]).val();
			
			// Add a new input after the label for our jQuery date-picker
			$(ele).children('label').after($('<input/>', {
				'name' : $(selects[0]).attr('name').match(/(.+)\[.+\]$/)[1],
				'id' : $(label).attr('for'),
				'value' : date,
				'class' : 'date-picker',
			}));
			
			// Remove the CakePHP supplied Month - Date - Year selects
			$(selects).remove();
		});
		/*
		// The two last fields need to be enabled in order for them to
		// post their data.
		*/
		$('form').submit(function(eo) {
			$('.datetime-picker:last input').attr('disabled', '');
			$('.datetime-picker:last select').attr('disabled', '');
			return true;
		});
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
	
	if ($('.multi-combobox').length) {
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
			var count = $('body').data('combos');
			
			var name = $(this).parent()
						.children('select')
						.attr('name').replace(/\[\d+\]$/, '[' + count + ']');
			
			var clone = $('#hidden-combobox')
				.clone()
				.css('display', 'block')
				.attr('id', '');
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
	
	if ($('#calendar').length) {
		// Add the buttons to select which calendar to view.
		$('#calendar-selection').buttonset();
		// Show the buttons for the calendar actions.
		$('#calendar-actions').buttonset();
		
		// Give the buttons a + icon
		$('#calendar-actions a').button({ icons: {
			secondary: 'ui-icon-plus'
		}});
		
		// This will toggle all the elements belonging to a certain calendar
		// when it is clicked.
		$('input.calendars').each(function(index, ele) {
			$(ele).bind('click', function(event) {
				$('.calendar-event[rel*="' + $(this).attr('id') + '"]').toggle();
				$('.calendar-link[rel*="' + $(this).attr('id') + '"]').toggle();
			}).button({ icons: {
				primary: 'ui-custom-icon',
			}});
			
			$(ele).next('label').children('span:first').css('background-color', $(ele).attr('title'));
		});
		
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
	}
	
	// These are used through out the Intranet to keep things uniform
	$('.no-javascript').hide();
	$('.enabled-javascript').show();
	
	// Used on forms and such.
	$('.cancel-button').bind('click', function(e) {
		if (document.referrer)
			document.location = document.referrer;
		else
			history.go(-1);
	});
	
	// A basic hover over
	$('.hover-over').each(function(i, e) {
		$(e).hover(function() {
				$(e).find('.hover-element').show();
			}, function() {
				$(e).find('.hover-element').hide();
			}).mouseleave();
		
	});
	
	
	$('input.month-day-picker').datepicker({ dateFormat: 'MM dd' });
	$('input.date-picker').datepicker({ dateFormat: 'yy-mm-dd'});
	$('input.time-picker').timepicker({
		showSecond: true,
		timeFormat: 'hh:mm:ss'
	});
});