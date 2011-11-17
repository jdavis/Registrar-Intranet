<?php
class Profile extends AppModel {
	var $name = "Profile";
	
	var $belongsTo = array(
		'User',
		'Supervisor' => array(
			'className' => 'Profile',
			'foreignKey' => 'supervisor_id',
		),
	);
	
	var $hasMany = array(
		'Announcement',
		'Payment',
		'Outreach',
		'Supervisee' => array(
			'className' => 'Profile',
			'foreignKey' => 'supervisor_id',
		),
	);
	
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		
		# From, http://book.cakephp.org/view/1608/Virtual-fields
		# A normal virtual field is hardcoded to the model name
		# Therefore it won't work with our model association above in our belongsTo and hasMany.
		$this->virtualFields['full_name'] = sprintf('CONCAT(%s.first_name, " ", %s.last_name)', $this->alias, $this->alias);
	}
	

	// Finds all profiles that are on the mailing list
	// and that have given an email
	function findAllOnEmailList(){
	 $emailNotProvided = $this->findAllByEmail('null');
	 
	 $onListWithEmail = $this->find('all', array('conditions' => array('Profile.email !=' => $emailNotProvided, 'Profile.mail_list' => '1' )));

	 return $onListWithEmail;
	}

}