<?php
class Supervisee extends AppModel {
	var $name = 'Supervisee';
	
	var $hasOne = array('Profile');
	var $belongsTo = array('Supervisor');
}