<?php
class Word extends AppModel {
	var $name = 'Word';
	
	var $validate = array(
		'word' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a title.',
		),
		
		'definition' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a definition.',
		),
	);
}
?>