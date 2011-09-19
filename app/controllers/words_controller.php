<?php
class WordsController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		// Add a menu
		$this->add_menu('views', array(
			'Current' => '/words/',
			'Archives' => '/words/archives/',
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Words', '/words/');
	}

	function index($page = 1) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Current Word');
		
		$this->sub_nav_title = 'Current Word of the Day';
		
		$this->add_button('Change the Word', '/words/change/');
		
		$this->select_menu('views', 'Current');
		
		// Filter the Words so that we see the latest one.
		$options = array(
			'order' => array(
				'Word.created DESC',
			),
			'limit' => 1,
		);
		
		// The Word element also uses this action.
		if (isset($this->params['requested'])) {
			return $this->Word->find('all', $options);
		} else {
			$this->set('words', $this->Word->find('all', $options));
		}
		
		// For pagination.
		$this->set('page', $page);
		
		// The list view consolidates all of the Word views.
		$this->render('list');
	}
	
	function archives($page = 1) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Archived Words');
		
		$this->sub_nav_title = 'Archived Words';
		
		$this->add_button('Change the Word', '/words/change/');
		
		$this->select_menu('views', 'Archives');
		
		// Filter the Words so that we see the latest one.
		$options = array(
			'order' => array(
				'Word.created DESC',
			),
			'offset' => 2,
		);
		
		// The Word element also uses this action.
		if (isset($this->params['requested'])) {
			return $this->Word->find('all', $options);
		} else {
			$this->set('words', $this->Word->find('all', $options));
		}
		
		// For pagination.
		$this->set('page', $page);
		
		// The list view consolidates all of the Word views.
		$this->render('list');
	}
	
	function change() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Change the Word');
		
		$this->back_link('Back to the Words', '/words');
		
		// Save the data if it was given to us.
		if (!empty($this->data)) {
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash('The Word has been changed.', 'default', array('class' => 'success'));
				$this->swerve('/words');
			}
		}
    }
}