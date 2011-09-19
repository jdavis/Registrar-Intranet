<?php
class QuotesController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		// Add a menu
		$this->add_menu('views', array(
			'Current' => '/quotes/',
			'Archives' => '/quotes/archives/',
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Quotes', '/quotes/');
	}

	function index($page = 1) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Current Quote');
		
		$this->sub_nav_title = 'Current Quote';
		
		$this->add_button('Change the Quote', '/quotes/change/');
		
		$this->select_menu('views', 'Current');
		
		// Filter the quotes so that we see the latest one.
		$options = array(
			'order' => array(
				'Quote.created DESC',
			),
			'limit' => 1,
		);
		
		// The Quote element also uses this action.
		if (isset($this->params['requested'])) {
			return $this->Quote->find('all', $options);
		} else {
			$this->set('quotes', $this->Quote->find('all', $options));
		}
		
		// For pagination.
		$this->set('page', $page);
		
		// The list view consolidates all of the Quote views.
		$this->render('list');
	}
	
	function archives($page = 1) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Archived Quotes');
		
		$this->sub_nav_title = 'Archived Quotes';
		
		$this->add_button('Change the Quote', '/quotes/change/');
		
		$this->select_menu('views', 'Archives');
		
		// Filter the quotes so that we see the latest one.
		$options = array(
			'order' => array(
				'Quote.created DESC',
			),
			'offset' => 1,
		);
		
		// The Quote element also uses this action.
		if (isset($this->params['requested'])) {
			return $this->Quote->find('all', $options);
		} else {
			$this->set('quotes', $this->Quote->find('all', $options));
		}
		
		// For pagination.
		$this->set('page', $page);
		
		// The list view consolidates all of the Quote views.
		$this->render('list');
	}
	
	function change() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Change the Quote');
		
		$this->back_link('Back to the Quotes', '/quotes');
		
		// Save the data if it was given to us.
		if (!empty($this->data)) {
			if ($this->Quote->save($this->data)) {
				$this->Session->setFlash('The Quote has been changed.', 'default', array('class' => 'success'));
				$this->swerve('/quotes');
			}
		}
    }
}