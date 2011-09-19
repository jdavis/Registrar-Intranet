<?php

class PagesController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		
		// The homepage and other pages have some specific styles
		$this->add_style('/css/pages.css');
		
		// Auto-expanding textareas
		$this->add_script('/js/autoresize.jquery.min.js');
	}
	
    function home() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Homepage');
		
		$this->sub_nav_title = 'Homepage';
		
		$this->add_button('Change the Quote', '/quotes/change/');
		$this->add_button('Change the Word', '/words/change/');
		$this->add_button('Add an Announcement', '/announcements/add/');
		//$this->add_button('Edit Staff of the Day', '/announcements/add');
		
		$options = array(
			'conditions' => array(
				'Announcement.created >' => date('Y-m-d H:i:s', strtotime('-2 day')),
				'Announcement.expiration >' => date('Y-m-d H:i:s'),
			),
			'order' => array(
				'Announcement.created DESC',
			),
		);
		
		// Give them to the view.
		$this->set('announcements', Classregistry::init('Announcement')->find('all', $options));
    }
	
	function help() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Intranet Help');
		
		$this->sub_nav_title = 'Help Information';
    }
	
	function info() {		
		$this->set('activities', Classregistry::init('Outreach')->find('all'));
		
		$this->set('title_for_layout', 'General Office Info');
	}
	
	function favicon() {
		$this->redirect('/');
	}
	
	function admin() {
		$this->set_auth_level('Admin');
	}
	
	function god() {
		$this->set_auth_level('God');
	}
	
	function rss() {
	
	}
	
	function pretty() {
	
	}
}