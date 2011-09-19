<?php
class User extends AppModel {
	#var $helpers = array('User');
	var $name = "User";
	var $hasMany = array(
		'Announcement' => array(
			'className' => 'Announcement',
		),
	);
	
	var $hasOne = array('Profile');
}
?>