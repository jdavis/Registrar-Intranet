<?php
class Event extends AppModel {
	var $name = "Event";
	var $belongsTo = array("Profile");
	
	var $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a title',
		),
		
		'calendar_id' => array(
			'rule' => '/^\d+$/i',
			'message' => 'Select a calendar',
		),
	);
	
	function afterFind($data) {
		// The replacement data array
		$altered_data = array();
		
		// Since our Add/Edit views use some extra variables
		// we want to add them to the data array
		foreach($data as $event) {
			// Look at the last part of the datetime entry in the database
			// And set the all_day variable accordingly.
			$event['Event']['all_day'] = substr($event['Event']['end_time'], -8) == '23:59:59';
			
			// Strip out the time from the start_time column in the database.
			$event['Event']['start_selector'] = substr($event['Event']['start_time'], -8);
			
			// Strip out the time from the end_time column in the database.
			$event['Event']['end_selector'] = substr($event['Event']['end_time'], -8);
			
			// Add our newly altered event.
			array_push($altered_data, $event);
		}
		
		return $altered_data;
	}
	
	function beforeSave() {		
		// Sanity check
		if (isset($this->data['Event']['start_selector']) &&
			isset($this->data['Event']['start_time'])) {
			// Concat the date with the complete time selector value.
			$this->data['Event']['start_time'] = substr($this->data['Event']['start_time'], 0, 10). ' ' . $this->data['Event']['start_selector'];
		}
		
		// Similar to above except with the end_time
		if (isset($this->data['Event']['end_selector']) &&
			isset($this->data['Event']['end_time'])) {
			$this->data['Event']['end_time'] = substr($this->data['Event']['end_time'], 0, 10) . ' ' . $this->data['Event']['end_selector'];
		}
		
		// If All-Day was selected, automatically end the event at midnight.
		if (isset($this->data['Event']['all_day']) && $this->data['Event']['all_day']) {
			$this->data['Event']['end_time'] = substr($this->data['Event']['end_time'], 0, 10) . ' 23:59:59';
		}
		
		// No errrors, go ahead and save it.
		return true;
	}
}