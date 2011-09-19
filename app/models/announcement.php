<?php
class Announcement extends AppModel {
	var $name = "Announcement";
	var $belongsTo = array('Profile');
	
	var $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a title',
		),
		
		'content' => array(
			'rule' => array('minLength', '10'),
			'message' => 'Please make the content at least 10 characters.',
		),
	);
	
	function afterFind($data) {
		// The replacement data array
		$altered_data = array();
		
		// Add some time stuff.
		foreach($data as $announcement) {

			// Strip out the time from the expiration column in the database.
			$announcement['Announcement']['expiration_time'] = substr($announcement['Announcement']['expiration'], -8);
			
			// Add our newly altered announcement.
			array_push($altered_data, $announcement);
		}
		
		return $altered_data;
	}
	
	function beforeSave() {
		// Similar to above except with the end_time
		if (isset($this->data['Announcement']['expiration_time'])) {
			$this->data['Announcement']['expiration'] = substr($this->data['Announcement']['expiration'], 0, 10) . ' ' . $this->data['Announcement']['expiration_time'];
		}

		// No errrors, go ahead and save it.
		return true;
	}
}

?>