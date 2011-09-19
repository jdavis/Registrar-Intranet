<?php
class AppController extends Controller {
	var $components = array('Session', 'Email');
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Session', 'Form', 'Time', 'Paginator', 'Date', 'Util', 'Registrar');
	var $sub_nav_breadcrumbs = array();
	var $sub_nav_buttons = array();
	var $sub_nav_title = '';
	var $back_link = array();
	var $controller_styles = array();
	var $controller_scripts = array();
	var $sub_nav_menus = array();
	var $auth_levels = array('Normal', 'Supervisors', 'Judy', 'Admin', 'God');
	
	function beforeFilter() {
		// Check to see if our Profile has been created.
		if (!$this->Session->read('Profile')) {
			$options = array(
				'conditions' => array(
					'Profile.username' => $_SERVER['REMOTE_USER'],
				),
				'recursive' => 0,
			);
			
			$ProfileController = Classregistry::init('Profile');
			$profile = $ProfileController->find('first', $options);
			
			if (empty($profile)) {
				// We only want to save the username into the database.
				$profile_data = array(
					'Profile' => array(
						'username' => $_SERVER['REMOTE_USER'],
					),
				);
				
				// Save the newly created profile.
				$ProfileController->save($profile_data);
				
				// Reread the Profile so we have all the fields.
				$profile = $ProfileController->find('first', $options);
				
				// Show a welcome flash to any new users.
				$this->Session->setFlash(<<<EOHTML
						<h3>Welcome to the Intranet</h3>
						<p>
							This is the place where all of the Employees here
							at The Office of the Registrar can share information.
						</p>
						<p>
							To get started, go ahead and fill out your
							<a href="/settings">Profile</a>	and then have a look
							around
						</p>
						<p>
							If you need any assistance, feel free email
							<a href="mailto:cchulse@iastate.edu">Char</a> or
							<a href="mailto:joshuad@iastate.edu">Josh</a>.
							Or you can to use the <a href="/feedback">Feedback</a>
							link in the top right.
						</p>
						<p>
							Thanks!
							<br>
							The Developers
						</p>
EOHTML
					, 'default', array('class' => 'welcome'));
			}
			
			// We are now authenticated, save the Profile into the Session!
			$this->Session->write('Profile', $profile['Profile']);
		}
	}
	
	function beforeRender() {
		parent::beforeRender();
		
		// If a subtitle for the layout isn't defined, add one.
		if (!isset($this->viewVars['sub_nav_title'])) {
			$this->set('sub_nav_title', $this->sub_nav_title);
		}
		
		// If a subtitle for the layout isn't defined, add one.
		if (!isset($this->viewVars['back_link'])) {
			$this->set('back_link', $this->back_link);
		}
		
		// The layout expects an array for the breadcrumb array.
		if (!isset($this->viewVars['sub_nav_breadcrumbs'])) {
			$this->set('sub_nav_breadcrumbs', $this->sub_nav_breadcrumbs);
		}
		
		// The layout expects an array for the sub navigation array.
		if (!isset($this->viewVars['sub_nav_buttons'])) {
			$this->set('sub_nav_buttons', $this->sub_nav_buttons);
		}
		
		// The layout expects an array for the controller specific styles.
		if (!isset($this->viewVars['controller_styles'])) {
			$this->set('controller_styles', $this->controller_styles);
		}
		
		// The layout expects an array for the controller specific scripts.
		if (!isset($this->viewVars['controller_scripts'])) {
			$this->set('controller_scripts', $this->controller_scripts);
		}
		
		// The layout expects for the menus that can be defined for each controller.
		if (!isset($this->viewVars['sub_nav_menus'])) {
			$this->set('sub_nav_menus', $this->sub_nav_menus);
		}
	}
	
	protected function singular_name() {
		return Inflector::singularize($this->name);
	}
	
	protected function controller_base_url() {
		return '/' . strtolower($this->name) . '/';
	}
	
	private function normalize_link($link) {
		if (substr($link, -1) == '/') return $link;
		else return $link . '/';
	}
	
	protected function swerve($link = '') {
		if ($this->back_link) {
			$this->redirect($this->back_link['link']);
		} else {
			$this->redirect($link);
		}
	}
	
	protected function set_auth_level($auth_level) {
		$index = array_search($auth_level, $this->auth_levels);
		
		if ($this->Session->read('Profile.auth_level') >= $index) {
			// We should be good to go, I probably shoulnd't have this here xD
		} else {
			$this->Session->setFlash('You do not have access to that page.', 'default', array('class' => 'error'));
			$this->swerve('/');
		}
	}
	
	protected function view_only($obj, $error_message) {
		if ($obj['profile_id'] != $this->Session->read('Profile.id')) {
			$this->Session->setFlash($error_message, 'default', array('class' => 'error'));
			$this->swerve('/');
		}
	}
	
	protected function add_sub_nav($title, $link) {
		$this->sub_nav_breadcrumbs[] = array(
			'title' => $title,
			'link' => $link,
		);
	}
	
	protected function back_link($title, $link = '') {
		// The link is optional. If it isn't given, just set it to the controller root.
		if (!$link) {
			$link = $this->controller_base_url();
		}
		
		// Normalize the link real quickly.
		$link = $this->normalize_link($link);
		
		if (isset($this->data['referrer'])) {
			$back_link = $this->data['referrer'];
		} else {
			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']) {
				// If they aren't normalized, then they might return false positives.
				$referrer = $this->normalize_link($_SERVER['HTTP_REFERER']);
				$script_uri = $this->normalize_link($_SERVER['SCRIPT_URI']);
				
				// We were linked from somewhere.
				$back_link = $referrer;
			} else {
				// There was no referrer, use the link we were given.
				$back_link = $link;
			}
		}
		
		// This probably isn't a good idea...
		$host = 'https://intra.registrar.iastate.edu';
		
		// We want to alter the title if the link we have to go back to isn't
		// within the same controller.
		if (strrpos($back_link, $host . $link) !== 0 && strrpos($back_link, $link) !== 0)
			$title = 'Back to the Previous Page';
		
		$this->back_link = array(
			'title' => $title,
			'link' => $back_link,
		);
	}
	
	protected function back_link_old($title, $link = '') {
		// The link is optional. If it isn't given, just set it to the controller root.
		if (!$link) {
			$link = $this->controller_base_url();
		}
		
		// Normalize the link real quickly.
		$link = $this->normalize_link($link);
		
		if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']) {
			// If they aren't normalized, then they might return false positives.
			$referrer = $this->normalize_link($_SERVER['HTTP_REFERER']);
			$script_uri = $this->normalize_link($_SERVER['SCRIPT_URI']);
			
			// If the HTTP_REFERER exists and is the same as the current
			// SCRIPT_URI, that means we are more than likely on a form.
			// Instead of using that, we want to see if there is a referrer in the form.
			if (strrpos($script_uri, $referrer) === 0) {
				// Use the referrer if the form has one. By default,
				// use the link we were given.
				if (isset($this->data['referrer'])) $back_link = $this->data['referrer'];
				else $back_link = $link;
			} else {
				// We were linked from somewhere.
				$back_link = $referrer;
			}
		} else {
			// There was no referrer, use the link we were given.
			$back_link = $link;
		}
		
		// This probably isn't a good idea...
		$host = 'https://intra.registrar.iastate.edu';
		
		// We want to alter the title if the link we have to go back to isn't
		// within the same controller.
		if (strrpos($back_link, $host . $link) !== 0 && strrpos($back_link, $link) !== 0)
			$title = 'Back to the Previous Page';
		
		$this->back_link = array(
			'title' => $title,
			'link' => $back_link,
		);
	}
	
	protected function add_button($title, $link, $first = false) {
		if ($first) {
			array_unshift($this->sub_nav_buttons, array(
				'title' => $title,
				'link' => $link,
			));
		} else {
			$this->sub_nav_buttons[] = array(
				'title' => $title,
				'link' => $link,
			);
		}
	}
	
	protected function add_style($link) {
		$this->controller_styles[] = $link;
	}
	
	protected function add_script($link) {
		$this->controller_scripts[] = $link;
	}
	
	protected function add_menu($name, $menu) {
		$this->sub_nav_menus[$name] = array(
			'menu' => $menu,
			'params' => '',
			'title_params' => '',
			'selected' => '',
		);
	}
	
	protected function select_menu($name, $selected) {
		$this->sub_nav_menus[$name]['selected'] = $selected;
	}
	
	protected function menu_params($name, $params) {
		$this->sub_nav_menus[$name]['params'] = $params;
	}
	
	protected function menu_title_params($name, $params) {
		$this->sub_nav_menus[$name]['title_params'] = $params;
	}
}
?>