<?php

class EventsController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		// Even though this is the Event controller,
		// we use the same files as the Calendar.
		$this->add_style('/css/calendar.css');
		$this->add_script('/js/calendar.js');
		$this->add_script('/js/combobox.js');
	}
	
	function view($id = 0) {
		if ($id == 0) {
			$this->Session->setFlash("Invalid event.");
			return;
		}
		
		$event = $this->Event->read();
		
		preg_match('/(\d+)-(\d+)-(\d+)/', $event['Event']['start_time'], $matches);
		
		list($date, $year, $month, $day) = $matches;
		
		debug("Month = $month, day = $day, year = $year");
		
		# The staff view automatically handles Staff of the Day stuff
		if ($event['Event']['calendar_id'] == 1) {
			$this->redirect("/events/staff/$month/$day/$year");
		}
		
		$this->Event->id = $id;
		$this->set('event', $event);
	}
	
	function add($day = 0) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add an Event');
		
		$this->back_link('Back to the Calendar', '/calendars');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add an Event');
		$this->set('form_save', 'Create the Event');
		$this->set('form_close', 'Discard the Event');
		
		// We need the list of Calendars for the Add page.
		$calendars = $this->calendar_list();
		$this->set('calendar_options', $calendars);
		
		// Save the new event if one was submitted.
		if (!empty($this->data)) {
			// The id that created the event should be set to whomever is logged in.
			$this->data['Event']['profile_id'] = $this->Session->read('Profile.id');
			
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash('The Event has been saved.', 'default', array('class' => 'success'));
				#$this->set('newEvent', $this->data);
				$this->swerve('/calendars');
			}
		}
		
		// Utilize one view.
		$this->render('add-edit');
	}
	
	function edit($id = 0) {
		// Setup the view information for this action.		
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Edit the Event');
	
		$this->back_link('Back to the Calendar', '/calendars');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Edit the Event');
		$this->set('form_save', 'Save Event Changes');
		$this->set('form_close', 'Discard the Changes');
		
		// We need the list of Calendars for the Add page.
		$calendars = $this->calendar_list();
		$this->set('calendar_options', $calendars);
		
		// Read the event that wants to be edited.
		$this->Event->id = $id;
		$event = $this->Event->read();
		
		// Ensure that the user has the ability to edit the event.
		$this->view_only($event['Event'], 'You cannot edit that event. It isn\'t yours.');
		
		if (empty($this->data)) {
			// Just populate the data fields with the event that was read.
			$this->data = $event;
		} else {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash('The Event has been edited.', 'default', array('class' => 'success'));
				$this->swerve();
			} else {
				// If the save errored, we need to set the event_id or else
				// if the user posts again, it won't save the changes.
				$this->data['Event']['id'] = $id;
				
				// The edit failed.
				$this->Session->setFlash('There was an error with the event.', 'default', array('class' => 'error'));
			}
		}
		
		// Utilize one view.
		$this->render('add-edit');
	}
	
	function staff($month = 0, $day = 0, $year = 0) {
		// Setup our view elements
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Edit the Staff of the Day');
		
		$this->back_link('Back to the Calendar', '/calendars');
		
		// Init our parameters if they weren't given.
		$month = (!$month) ? date('n') : $month;
		$day = (!$day) ? date('j') : $day;
		$year = (!$year) ? date('Y') : $year;
		
		// The form only has the date and it only lasts for a day.
		// We need to take the date we were given and append the correct time stamp.
		if (isset($this->data['Event']['start_time'])) {
			$start_time = $this->data['Event']['start_time'] . ' 00:00:00';
			$end_time = $this->data['Event']['start_time'] . ' 23:59:59';
		} else {
			$start_time = date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year));
			$end_time = date('Y-m-d H:i:s', mktime(23, 59, 59, $month, $day, $year));
		}
		
		// These options will filter out the Events that are in the
		// Staff of the Day calendar and only on the given day.
		$options = array(
			'conditions' => array(
				'Event.start_time >=' => $start_time,
				'Event.end_time <=' => $end_time,
				'Event.calendar_id' => 1,
			),
		);
		
		// Use the options above in the find.
		$current_list = $this->Event->find('all', $options);
	
		# If people were submitted to the form, we need to process them.
		if (!empty($this->data)) {
			// Sanely check to see if the list is given.
			if (isset($this->data['Event']['staff_list'])) {
				$staff_array = array();
				
				// Iterate through each 
				foreach($this->data['Event']['staff_list'] as $index=>$staff) {
					# Retrieve the Profile.
					$profile = Classregistry::init('Profile')->findById($staff);
					
					if ($index < count($current_list)) {		
						# Just update the list we already have.
						$staff['Event']['profile_id'] = $this->data['Event']['staff_list'][$i];
						$staff['Event']['title'] = $profile['Profile']['full_name'];
						
						$this->Event->save($staff);
					} else if ($index >= count($current_list)) {
						$staff = array();
						
						$staff['Event']['calendar_id'] = 1;
						$staff['Event']['profile_id'] = $profile['Profile']['id'];
						$staff['Event']['start_time'] = $start_time;
						$staff['Event']['end_time'] = $end_time;
						$staff['Event']['title'] = $profile['Profile']['full_name'];
						
						$this->Event->create(false);
						$this->Event->save($staff);
					}
				}
				
				for($i = count($this->data['Event']['staff_list']); $i < count($current_list); $i++) {
					$this->Event->delete($current_list[$i]['Event']['id']);
				}
			}
			$this->Session->setFlash('Changes saved.');
		}
		
		# The list what will contain all of the people at the Registrar.
		$staff_list = array();
	
		# Order by their first names.
		$options = array(
			'order' => 'Profile.first_name ASC'
		);
		
		$all_staff = Classregistry::init('Profile')->find('all', $options);
		
		# We want their ID linked to their full name
		foreach($all_staff as $staff) {
			$name = $staff['Profile']['full_name'];
			if (!$name) $name = $staff['User']['username'];
			$staff_list[$staff['User']['id']] = $name;
		}
		
		$this->set('staff_list', $staff_list);
		$this->set('month', $month);
		$this->set('day', $day);
		$this->set('year', $year);
		$this->set('current_list', $current_list);
	}
	
	function calendar_list() {
		$options = array(
			'recursive' => 0,
		);
		
		$calendars = Classregistry::init('Calendar')->find('all', $options);
		
		$calendar_options = array();
		
		$i = 1;
		foreach($calendars as $calendar) {
			$calendar_options["$i"] = $calendar['Calendar']['name'];
			$i++;
		}
		
		return $calendar_options;
	}
	
	function more_nonsense() {
		foreach($this->data['Event']['staff_list'] as $staff) {
			$this->data['Event']['calendar_id'] = 1;
			$this->data['Event']['profile_id'] = $staff;
			$this->data['Event']['start_time'] = $start_time;
			$this->data['Event']['end_time'] = $end_time;
			$profile = Classregistry::init('Profile')->findById($staff);
			$this->data['Event']['title'] = $profile['Profile']['full_name'];
			array_push($staff_array, $this->data);
		}
										
		$this->Event->saveAll($staff_array);
	}
	
		function staff_of_the_day() {
		$day_in_week = date('N');
		$week_start = date('j') - $day_in_week + 1;
		
		$options = array(
			'conditions' => array(
				'Event.calendar_id' => 1,
				'AND' => array(
					'Event.start_time >=' => date('Y-m-d H:i:s', mktime(0, 0, 0, date('n'), $week_start, date('Y'))),
					'Event.start_time <=' => date('Y-m-d H:i:s', mktime(11, 59, 59, date('n'), $week_start + 4, date('Y'))),
				),
			),
			'order' => 'Event.start_time',
		);
		
		$staffs = $this->Event->find('all', $options);
		
		$staff_of_the_day = array();
		foreach($staffs as $staff) {
			$day = date('l', strtotime($staff['Event']['start_time']));
			if (isset($staff_of_the_day[$day])) {
				array_push($staff_of_the_day[$day], $staff['Event']['title']);
			} else {
				$staff_of_the_day[$day] = array($staff['Event']['title']);
			}
		}
		
		return $staff_of_the_day;
	}
}