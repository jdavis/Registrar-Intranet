<?php

class Document extends AppModel {
	var $name = 'Document';
	
	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a name',
		),
		
		'description' => array(
			'rule' => array('minLength', '10'),
			'message' => 'Please make the description at least 10 characters long.',
		),
		
		'file' => array(
			'valid_upload' => array (
				'rule' => array('validateUploadedFile', true),
				'message' => 'Plese include a file to upload',
			)),
	);
	
	/**
	 * Custom validation rule for uploaded files.
	 * from http://www.jonnyreeves.co.uk/2008/06/cakephp-uploaded-file-validation-in-models/
	 *
	 *  @param Array $data CakePHP File info.
	 *  @param Boolean $required Is this field required?
	 *  @return Boolean
	*/
	function validateUploadedFile($data, $required = false) {
			// Remove first level of Array ($data['Artwork']['size'] becomes $data['size'])
			$upload_info = array_shift($data);

			// No file uploaded.
			if ($required && $upload_info['size'] == 0) {
					return false;
			}

			// Check for Basic PHP file errors.
			if ($upload_info['error'] !== 0) {
					return false;
			}

			// Finally, use PHP’s own file validation method.
			return is_uploaded_file($upload_info['tmp_name']);
	}
}