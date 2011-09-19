<?php
// Load ArkNavigation
App::import('Lib', 'ArkNavigation');

class ControlsController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		$start_year = 1982;
		$end_year = date('Y') + 5;
		$this->years = array();
		for($year = $start_year; $year < $end_year; $year++)
			$this->years[$year] = $year;
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Webpage Controls', '/controls/');
		
		// Autoreize text area if we have some
		$this->add_script('/js/autoresize.jquery.min.js');
		
		// Add the Calendar helper
		array_push($this->helpers, 'Calendar');
		
		$this->add_menu('routing', array(
			'Overview' => '/controls/routing/',
			'Redirects' => '/controls/routing/redirects/',
		));
	}
	
	function index() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Registrar Web Page');
		
		$this->sub_nav_title = 'Control Panel';
	}
	
	function routing($action = '') {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Registrar Web Page');
		
		$this->add_sub_nav('Routing', '/controls/routing/');
		
		if ($action == '') {
			$this->select_menu('routing', 'Overview');
			$this->sub_nav_title = 'Routing Overview';
			
			$this->add_button('Add a Redirect', '/controls/routing/add/');
			
			// I like this code, therefore I am keeping it here. =D
			#$results = $this->Control->query('SELECT url, COUNT(url) AS freq FROM registrar_404 GROUP BY url HAVING freq > 0 ORDER BY freq DESC');

			// Retrieve the Routing information
			$this->Control->setSource('registrar_router');
			$this->Control->table = 'registrar_router';
			
			$options = array(
				'order' => 'Control.count DESC',
			);
			
			$results = $this->Control->find('all', $options);
			
			$this->set('results', $results);
		} elseif ($action == 'redirects') {
			$this->select_menu('routing', 'Redirects');
			$this->sub_nav_title = 'Current Redirects';
			
			$this->add_button('Add a Redirect', '/controls/routing/add/');
			
			$this->Control->setSource('registrar_router');
			$this->Control->table = 'registrar_router';
			
			$options = array(
				'order' => 'Control.id ASC',
			);
			
			$results = $this->Control->find('all', $options);
			
			$this->set('results', $results);
		} elseif ($action == 'view') {
			$this->sub_nav_title = 'Detailed View';
			
			$this->add_button('Add a Redirect', '/controls/routing/add/');
			
			$id = '/' . implode(array_splice(func_get_args(), 1), '/');
			$this->set('id', $id);
			
			$this->Control->setSource('registrar_404');
			$this->Control->table = 'registrar_404';
			
			$options = array(
				'conditions' => array('Control.url' => $id),
				'order' => array('Control.created DESC'),
			);
			
			$results = $this->Control->find('all', $options);
			
			$this->set('results', $results);
		} elseif ($action == 'add') {
			$this->back_link('Back to the Routing', '/controls/routing/');
			
			$this->set('form_name', 'Add a Redirect Route');
			$this->set('form_save', 'Save the Route');
			$this->set('form_close', 'Discard the Route');
			
			$this->render('add-edit-route');
		} elseif ($action == 'edit') {
			$this->back_link('Back to the Routing', '/controls/routing/');
			
			$this->set('form_name', 'Edit a Redirect Route');
			$this->set('form_save', 'Save the Changes');
			$this->set('form_close', 'Discard Changes');
			
			$this->Control->setSource('registrar_router');
			$this->Control->table = 'registrar_router';
			
			$id = '/' . implode(array_splice(func_get_args(), 1), '/');
			
			$this->Control->id = $id;
			$this->data = $this->Control->read();
			
			$this->render('add-edit-route');
		} elseif ($action == 'save') {
			$this->Control->setSource('registrar_router');
			$this->Control->table = 'registrar_router';
			
			if (empty($this->data) || !($this->Control->save($this->data))) {
				$this->Session->setFlash('There was an error saving the data.', 'default', array('class' => 'error'));
				$this->swerve('/controls/routing/');
			} else {
				$this->Session->setFlash('The Route has been saved.', 'default', array('class' => 'success'));
				$this->swerve('/controls/routing/');
			}
		} else {
			
		}
		
		$this->set('action', $action);
	}
	
	function pages($action = '') {
		$this->layout = 'new_default';
		
		$this->set('action', $action);
		
		$args = func_get_args();

		if ($action == 'add') {
			$this->add_page($args);
		} elseif ($action == 'preview') {
			$this->preview_page($args);
		} elseif ($action == 'edit') {
			$this->edit_page_new($args);
		} elseif ($action == 'delete') {
			$this->delete_page($args);
		} elseif ($action == 'save') {
			$this->back_link('Back to the Control Panel', '/controls/');
			
			if ($this->Control->save($this->data)) {
				// Save the pages into the archived table.
				$this->loadModel('RegistrarArchivedPage');
				
				// We need to move the id to the url and then unset the id
				// If we don't, then it will overwrite any previous entry
				$archived = $this->data['Control'];
				$archived['url'] = $archived['id'];
				unset($archived['id']);
				
				$this->RegistrarArchivedPage->save(array('RegistrarArchivedPage' => $archived));
				
				$this->Session->setFlash('The Page has been added.', 'default', array('class' => 'success'));
				$this->swerve('/controls/');
			} else {
				$this->Session->setFlash('There was an error saving the page.', 'default', array('class' => 'error'));
				$this->set('action', 'add');
				$this->add_page();
				$action = 'add';
			}
		} else {
			// The default view info
			$this->set('title_for_layout', 'Viewing all Pages');
		
			$this->sub_nav_title = 'Viewing all Pages';
			
			$this->add_sub_nav('Pages', '/controls/pages/');
			
			$this->add_button('Add a new Page', '/controls/pages/add/');
			
			$options = array(
				'conditions' => array(
					'Control.user_editable ' => 1,
				),
			);
			
			$pages = $this->Control->find('all', $options);
			$ark_nav = new Ark_Navigation(null, null, $pages);
			
			// Give the view the current links		
			$this->set('current_links', $ark_nav->html_options());
		}
	}
	
	function add_page() {
		// Setup the view information for this action.
		$this->layout = 'edit';
		$this->set('title_for_layout', 'Add a Page');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a Page to the Registrar');
		$this->set('form_save', 'Save the Page');
		$this->set('form_close', 'Discard the Page');
		
		$options = array(
			'conditions' => array(
				'Control.user_editable ' => 1,
			),
		);
		
		$pages = $this->Control->find('all', $options);
		$ark_nav = new Ark_Navigation(null, null, $pages);
		
		// Give the view the current links		
		$this->set('current_navigation', $ark_nav);
		
		$this->render('add-edit-page');
	}
	
	function preview_page() {
		// Setup the view information for this action.
		$this->layout = 'registrar';
		$this->set('title_for_layout', 'Add a Page');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		#debug($this->data);
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a Page to the Registrar');
		$this->set('form_save', 'Preview the Page');
		$this->set('form_close', 'Discard the Page');
		
		$options = array(
			'conditions' => array(
				'Control.user_editable ' => 1,
			),
		);
		
		$pages = $this->Control->find('all', $options);
		$ark_nav = new Ark_Navigation(null, null, $pages);
		
		// Give the view the current links		
		$this->set('current_navigation', $ark_nav);
		
		$this->render('add-edit-page');
	}
	
	function edit_page($args = array()) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add a Page');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a Page to the Registrar');
		$this->set('form_save', 'Save the Page');
		$this->set('form_close', 'Discard the Page');
		
		$options = array(
			'conditions' => array(
				'Control.user_editable ' => 1,
			),
		);
		
		$pages = $this->Control->find('all', $options);
		$ark_nav = new Ark_Navigation(null, null, $pages);
		// Give the view the current links		
		$this->set('current_links', $ark_nav->html_options());
		
		// Read the page we want to edit from the database
		$id = '/' . implode(array_splice($args, 1), '/');
		$this->Control->id = $id;
		$page = $this->Control->read();
		$this->data = $this->Control->read();
		
		$this->render('add-edit-page');
	}
	
	function edit_page_new($args = array()) {
		// Setup the view information for this action.
		$this->layout = 'edit';
		$this->set('title_for_layout', 'Add a Page');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a Page to the Registrar');
		$this->set('form_save', 'Save Changes');
		$this->set('form_close', 'Discard Changes');
		
		$options = array(
			'conditions' => array(
				'Control.user_editable ' => 1,
			),
		);
		
		$pages = $this->Control->find('all', $options);
		$ark_nav = new Ark_Navigation(null, null, $pages);
		
		// Give the view the current links		
		$this->set('current_navigation', $ark_nav);
		
		// Read the page we want to edit from the database
		$id = '/' . implode(array_splice($args, 1), '/');
		$this->Control->id = $id;
		$page = $this->Control->read();
		$this->data = $this->Control->read();
		
		$this->render('aloha-edit');
	}
	
	function delete_page($args = array()) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add a Page');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		$id = '/' . implode(array_splice($args, 1), '/');
		$this->Control->id = $id;
		$control = $this->Control->read();
		
		if (empty($this->data)) {
			$this->data = $control;
		} else {
			if ($this->Control->delete($control['Control']['id'])) {
				// Save to our deleted table
				$this->loadModel('RegistrarArchivedPage');
				
				$this->RegistrarArchivedPage->save(array('RegistrarArchivedPage' => $control['Control']));
				
				$this->Session->setFlash('The Page has been deleted.', 'default', array('class' => 'success'));
				$this->swerve();
			} else {
				// If the save errored, we need to set the event_id or else
				// if the user posts again, it won't save the changes.
				$this->data['Control']['id'] = $id;
				
				// The edit failed.
				$this->Session->setFlash('There was an error with the announcement.', 'default', array('class' => 'error'));
			}
		}
		
		$this->render('delete-page');
	}
	
	function news($action = '') {
		$this->layout = 'new_default';
		
		$this->set('action', $action);
		
		$args = func_get_args();
		
		if ($action == 'add') {
			$this->add_news($args);
		} elseif ($action == 'save') {
			$this->back_link('Back to the Control Panel', '/controls/');
			
			if ($this->Control->save($this->data)) {
				$this->Session->setFlash('The Page has been added.', 'default', array('class' => 'success'));
				$this->swerve('/controls/');
			} else {
				$this->Session->setFlash('There was an error saving the page.', 'default', array('class' => 'error'));
				$this->set('action', 'add');
				$this->add_page();
				$action = 'add';
			}
		} else {
			// The default view info
			$this->set('title_for_layout', 'Viewing all News');
		
			$this->sub_nav_title = 'Viewing all News';
			
			$this->add_sub_nav('News', '/controls/news/');
			
			$this->add_button('Add a News Item', '/controls/news/add/');
			
			$this->Control->setSource('registrar_news');
			
			$this->set('news', $this->Control->find('all'));
		}
	}
	
	function add_news() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add a Page');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a News Item');
		$this->set('form_save', 'Save the News');
		$this->set('form_close', 'Discard the News');
		
		$this->render('add-edit-news');
	}
	
	function terms($action = '') {
		$this->layout = 'new_default';
		
		$this->set('action', $action);
		
		$args = func_get_args();
		debug('terms' . $action);
		if ($action == 'add') {
			call_user_func_array(array($this, "{$action}_terms"), array_splice($args, 1));
		} elseif ($action == 'add_fall') {
			$this->add_fall($args);
		} elseif ($action == 'add_spring') {
			$this->add_fall($args);
		} elseif ($action == 'add_summer') {
			$this->add_fall($args);
		} elseif ($action == 'edit') {
			$this->edit_page_new($args);
		} elseif ($action == 'delete') {
			$this->delete_page($args);
		} elseif ($action == 'save') {
			$this->back_link('Back to the Control Panel', '/controls/');
			
			if ($this->Control->save($this->data)) {
				$this->Session->setFlash('The Page has been added.', 'default', array('class' => 'success'));
				$this->swerve('/controls/');
			} else {
				$this->Session->setFlash('There was an error saving the page.', 'default', array('class' => 'error'));
				$this->set('action', 'add');
				$this->add_page();
				$action = 'add';
			}
		} else {
			// The default view info
			$this->set('title_for_layout', 'Viewing all Pages');
		
			$this->sub_nav_title = 'Viewing all Pages';
			
			$this->add_sub_nav('Pages', '/controls/pages/');
			
			$this->add_button('Add a new Page', '/controls/pages/add/');
			
			$options = array(
				'conditions' => array(
					'Control.user_editable ' => 1,
				),
			);
			
			$pages = $this->Control->find('all', $options);
			$ark_nav = new Ark_Navigation(null, null, $pages);
			
			// Give the view the current links		
			$this->set('current_links', $ark_nav->html_options());
		}
	}
	
	function add_fall() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add a Fall Term');
		
		$this->back_link('Back to the Control Panel', '/controls/');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a Fall Term');
		$this->set('form_save', 'Save the Term');
		$this->set('form_close', 'Discard the Term');
		
		
		$this->set('years', $this->years);
		
		$this->render('add-fall-term');
	}
}