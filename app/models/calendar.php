<?php
class Calendar extends AppModel {
	var $name = "Calendar";
	#var $hasMany = array("Events", "CalendarMembers");
	var $hasMany = array("Events");
	# http://planetcakephp.org/aggregator/items/535-cakephp-calendar-helper
	#var $hasAndBelongsToMany = array("Event");
}
?>