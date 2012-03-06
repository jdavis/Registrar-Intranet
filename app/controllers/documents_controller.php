<?php

class DocumentsController extends AppController {	
	function beforeFilter() {
		parent::beforeFilter();
		
		// Add menus
		//	$this->add_menu('years', array(
		//	'2008-2009' => array('start' => '/documents/', 'end' => '2008-2009'),
		//	'2009-2010' => array('start' => '/documents/', 'end' => '2009-2010'),
		//	'2010-2011' => array('start' => '/documents/', 'end' => '2010-2011'),
		//	'2011-2012' => array('start' => '/documents/', 'end' => '2011-2012'),
		//	'2012-2013' => array('start' => '/documents/', 'end' => '2012-2013'),
		//	'2013-2014' => array('start' => '/documents/', 'end' => '2013-2014'),
		//));
		
		$this->add_menu('tags', array(
			'All' => array('start' => '/documents/', 'end' => 'All'),
			'Forms-Employee' => array('start' => '/documents/', 'end' => 'Forms-Employee'),
			'Policy-Procedure' => array('start' => '/documents/', 'end' => 'Policy-Procedure'),
			//'Policies' => array('start' => '/documents/', 'end' => 'Policies'),
			'Emergency' => array('start' => '/documents/', 'end' => 'Emergency'),
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Documents', '/documents');
		
		// These are used during uploading
		$this->tmp_dir = '/afs/iastate.edu/virtual/intraregistrar/upload_tmp_dir/';
		$this->save_dir = '/afs/iastate.edu/virtual/intraregistrar/WWW/app/webroot/files/';
		
		// Add some Document specific JS
		$this->add_script('/js/documents.js');
		
		// A list of the years
		$this->school_years = array(
			'2008-2009' => '2008-2009',
			'2009-2010' => '2009-2010',
			'2010-2011' => '2010-2011',
			'2011-2012' => '2011-2012',
			'2012-2013' => '2012-2013',
			'2013-2014' => '2013-2014',
		);
		
		// Only allow certain file types.
		$this->allowed_types = array( 
			'image/jpeg' => 'image', 
			'image/gif', 
			'image/png', 
			'image/pjpeg', 
			'image/x-png',
			'application/vnd.ms-excel',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'application/vnd.ms-powerpoint',
			'application/vnd.openxmlformats-officedocument.presentationml.presentation',
			'application/msword',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'video/mp4',
			'text/csv',
			'application/pdf'
		); 
	}
	
	//function index($year = '2011-2012', $tag = 'All') {
	function index($tag = 'All') {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Documents');
		
		//$this->sub_nav_title = 'Documents for ' . $year . ' and ' . $tag;
		$this->sub_nav_title = 'Documents for ' . $tag;

		
		$this->add_button('Upload a Document', '/documents/upload/');
				
		$this->select_menu('tags', $tag);
		//$this->menu_params('tags', 'index/'.$year.'/');		
		
		$this->select_menu('tags', $tag);
		$this->menu_params('tags', 'index/');
		
		//define the tag specified by the user in terms of a number (since tags is saved as a number
		//in the database
		$tagNum = -1;
		if($tag == 'Forms-Employee'){
			$tagNum = 0;
		}else if($tag == 'Policy-Procedure'){
			$tagNum = 1;
		}else{
			$tagNum = 2;
		}
		
		// Filter the Documents so that we only see ones for the selected department tag.
		
		if($tag == 'All'){
		$options = array(
			'conditions' => array(
				//'Document.year' => $year,
				'Document.version' => 0,
					),
				);
		}else{
		$options = array(
			'conditions' => array(
				//'Document.year' => $year,
				'Document.tags' => $tagNum,
				'Document.version' => 0,
					),
				);
			}
	
		
		// Give them to the view.
		$this->set('documents', $this->Document->find('all', $options));
		
		//$this->set('year', $year);
		
		$this->set('tag', $tag);

		
		
	}
	
	function upload() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Upload a Document');
		
		$this->back_link('Back to the Documents', '/documents');
		
		// Helps in using the same view as edit
		$this->set('form_name', 'Upload a Document');
		$this->set('form_save', 'Upload Document');
		$this->set('form_close', 'Discard the Document');
		
		// Validate the data first
		$this->Document->set($this->data);
		
		if ($this->Document->validates() && !empty($this->data)) {
			// Copy over the file information to our model
			$this->data['Document']['file_name'] = $this->data['Document']['file']['name'];
			$this->data['Document']['file_type'] = $this->data['Document']['file']['type'];
			$this->data['Document']['file_size'] = $this->data['Document']['file']['size'];
			
			
			$tmp_path = $this->data['Document']['file']['tmp_name'];
			$tmp_name = substr($tmp_path, strlen($this->tmp_dir));
			
			$this->data['Document']['file_id'] = $tmp_name;
			
			if ($this->Document->save($this->data)) {
				if (!in_array($this->data['Document']['file_type'], $this->allowed_types)) {
					$this->Session->setFlash('This file type is not allowed.', array('class' => 'error'));
					#$this->swerve('/documents');
				}
			
				copy($tmp_path, $this->save_dir . $tmp_name);
				$this->Session->setFlash('The Document has been uploaded.', 'default', array('class' => 'success'));
				$this->swerve('/documents');
			}
		}
		
		#$this->set('school_years', $this->school_years);
		
		$this->render('upload-update');
	}
	
	function download($id = 0) {
		$document = $this->Document->read(null, $id);		

		if (empty($document)) {
			$this->Session->setFlash('This file does not exist.'); 
			$this->redirect(array('action'=>'index')); 
		}
		
		$unique_file_name = $document['Document']['file_id'];
        $file_name = $document['Document']['file_name'];
        $mimeType = $document['Document']['file_type'];
		
		# Extract the extension.
		$position = strrpos($file_name, '.');
		$file_basename = substr($file_name, 0, $position);
		$file_extension = substr($file_name, $position + 1, strlen($file_name) - 1);
		
		$options = array(
			'id' => $unique_file_name,
			'name' => $file_basename,
			'download' => true,              
			'extension' => $file_extension,
			'mimeType' => array($file_extension => $mimeType),
			'path' => 'files/',
		);
		
		$this->set($options);
		$this->view = 'Media';
	}
	
	function delete($id = 0){
		
		$document = $this->Document->read(null, $id);
		if (empty($document)){
			$this->Session->setFlash('This file does not exist.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Document->delete($id, false);
		
		$this->Session->setFlash('The file was deleted successfully');
		$this->swerve('/documents/');
		
		
		
	}
}