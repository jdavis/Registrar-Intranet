<?php
class Quote extends AppModel {
	var $name = 'Quote';
	
	var $validate = array(
		'author' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a title.',
		),
		
		'content' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a definition.',
		),
	);
}
?>