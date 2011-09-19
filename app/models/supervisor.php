<?php
class Supervisor extends AppModel {
	var $name = "Supervisor";
	
	var $hasOne = array('Profile');
	var $belongsTo = array('Profile');
}