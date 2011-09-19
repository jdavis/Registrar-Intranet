<?php

class AppModel extends Model {
	var $actsAs = array('Containable');
	
	// The Intranet never deletes anything from the database.
	// If a model can be deleted, it has a deleted column in the schema.
	// The default should be set to 0 so that when it is set to 1, it will be
	// 'seen' as deleted.
	// Currently there is no way to see the deleted ones other than
	// using a MySQL client xD
	public function beforeFind($queryData) {
		// See if your databse has a deleted column.
		if (isset($this->_schema['deleted'])) {
			// Make sure we have conditions
			if (isset($queryData['conditions'])) {
				// Append a condition for the deleted column.
				$conditions = $queryData['conditions'];
				$conditions[$this->name . '.deleted'] = 0;
				
				$queryData['conditions'] = $conditions;
			}
		}
		
		// Set it free!
		return $queryData;
	}
}