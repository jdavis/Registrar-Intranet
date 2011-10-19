<?php
class AnnouncementsController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		// Add a menu
		$this->add_menu('views', array(
			'Newest' => '/announcements/',
			'Archived' => '/announcements/archives/',
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Announcements', '/announcements/');
		
		// Our controller uses some specific Javascript functionality.
		// Haha, that's such a funny word - functionality.
		$this->add_script('/js/autoresize.jquery.min.js');
		$this->add_script('/js/announcements.js');
		
		$this->common_options = array(
			date('Y-m-d H:00:00', strtotime('today 11:59pm')) =>'Just today',
			date('Y-m-d H:00:00', strtotime('+2 day')) => 'Two days',
			date('Y-m-d H:00:00', strtotime('+3 day')) => 'Three days',
			date('Y-m-d H:00:00', strtotime('this Sunday')) => 'Just this week',
			date('Y-m-d H:00:00', strtotime('+1 month')) => 'One month',
			'Custom' => 'Custom...',
		);
	}
	
	function index($page = 1) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Newest Announcements');
		
		$this->sub_nav_title = 'Newest Announcements';
		
		$this->add_button('Add an Announcement', '/announcements/add/');
		
		$this->select_menu('views', 'Newest');
		
		// Filter the announcements so that we only see ones created
		// in the last five days and haven't expired.
		$options = array(
			'conditions' => array(
				//'Announcement.created >' => date('Y-m-d H:i:s', strtotime('-5 day')),
				'Announcement.expiration >' => date('Y-m-d H:i:s'),
			),
			'order' => array(
				'Announcement.created DESC',
			),
		);
		
		// Give them to the view.
		$this->set('announcements', $this->Announcement->find('all', $options));
		
		// For pagination.
		$this->set('page', $page);
		
		// The list view consolidates all of the Announcement views into one.
		// It works quite well if I do say so myself.
		$this->render('list');
	}
	
	
	function archives($page = 1) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Archived Announcements');
		
		$this->sub_nav_title = 'Archived Announcements';
		
		$this->add_button('Add an Announcement', '/announcements/add/');
		
		$this->select_menu('views', 'Archived');
		
		// Retrieve all of the announcements.
		$options = array(
			'conditions' => array(
				'Announcement.expiration <' => date('Y-m-d H:i:s'),
			),
			'order' => array(
				'Announcement.created' => 'DESC',
			),
		);
		
		$this->set('announcements', $this->Announcement->find('all', $options));
		
		// For the pagination.
		$this->set('page', $page);
		
		// Use the list view as well.
		$this->render('list');
	}
	
	function view($id = null) {
		// Setup the view information for this action.
		$this->layout = 'new_default';

		$this->set('title_for_layout', 'Viewing Announcement');
		
		$this->sub_nav_title = 'Viewing Announcement';
		
		$this->add_menu('newest', array(
			'Newest' => '/announcements/',
		));
		
		$this->add_menu('archives', array(
			'Archived' => '/announcements/archived/',
		));
		
		$this->add_button('Add an Announcement', '/announcements/add/');
		
		// Read the announcement
		$this->Announcement->id = $id;
		$announcement = $this->Announcement->read();
		
		// The Announcement is shown in the view.
		$this->set('announcements', array($announcement));
		$this->set('page', 1);
		
		// Use view that are similar.
		$this->render('list');
	}
	
	function add() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add an Announcement');
		
		$this->back_link('Back to the Announcements', '/announcements/');
		
		// Helps in using the same view as edit
		$this->set('form_name', 'Add an Announcement');
		$this->set('form_save', 'Create the Announcement');
		$this->set('form_close', 'Discard the Announcement');
		
		if (!empty($this->data)) {
			// Tie the Profile and Announcement
			$this->data['Announcement']['profile_id'] = $this->Session->read('Profile.id');
			
			if ($this->Announcement->save($this->data)) {
				$this->Session->setFlash('The Event has been saved.', 'default', array('class' => 'success'));
				$this->swerve('/calendars');
			}
		}
		
		// Add the options
		$this->set('options', $this->common_options);
		
		// Utilize the same view as the edit action
		$this->render('add-edit');
    }
	
	function edit($id = null) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Edit the Announcement');
		
		$this->back_link('Back to the Announcements', '/announcements/');
		
		// Helps in using the same view as add
		$this->set('form_name', 'Edit the Announcement');
		$this->set('form_save', 'Save Changes');
		$this->set('form_close', 'Discard Changes');
	
		// Read the announcement
		$this->Announcement->id = $id;
		$announcement = $this->Announcement->read();
		
		// Only the creator of each announcement can edit it
		$this->view_only($announcement['Announcement'], 'You cannot edit that Announcement.');
		
		if (empty($this->data)) {
			// Just populate the data fields with the event that was read.
			$this->data = $announcement;			
		} else {
			if ($this->Announcement->save($this->data)) {
				$this->Session->setFlash('The Announcement has been edited.', 'default', array('class' => 'success'));
				$this->swerve();
			} else {
				// If the save errored, we need to set the event_id or else
				// if the user posts again, it won't save the changes.
				$this->data['Announcement']['id'] = $id;
				
				// The edit failed.
				$this->Session->setFlash('There was an error with the announcement.', 'default', array('class' => 'error'));
			}
		}
		
		// Add the options
		$this->set('options', $this->common_options);
		
		// Use the same view as add.
		$this->render('add-edit');
    }
	
	function archive($id = null) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Archive the Announcement');
		
		$this->back_link('Back to the Announcements', '/announcements/');
		
		$this->set('form_name', 'Archive the Announcement');
		$this->set('form_save', 'Archive the Announcement');
		$this->set('form_close', 'Cancel the Archive');
	
		// Read the announcement
		$this->Announcement->id = $id;
		$announcement = $this->Announcement->read();
		
		// Only let the user edit their own Announcements.
		$this->view_only($announcement['Announcement'], 'You cannot archive that Announcement.');
		
		if (empty($this->data)) {
			$this->data = $announcement;
		} else {
			// Archive the Announcement by setting the expiration to now.
			$announcement['Announcement']['expiration'] = date("Y-m-d H:00:00");
			
			// Save and handle any errors.
			if ($this->Announcement->save($announcement)) {
				$this->Session->setFlash('The Announcement has been archived.', 'default', array('class' => 'success'));
				$this->swerve();
			} else {
				// If the save errored, we need to set the event_id or else
				// if the user posts again, it won't save the changes.
				$this->data['Announcement']['id'] = $id;
				
				// The edit failed.
				$this->Session->setFlash('There was an error with the announcement.', 'default', array('class' => 'error'));
			}
		}
		
		// The Announcement is shown in the view.
		$this->set('announcement', $announcement);
		
		// Use view that are similar.
		$this->render('archive-delete');
	}
	
	function delete($id = null) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Delete the Announcement');
		
		$this->back_link('Back to the Announcements', '/announcements/');
		
		$this->set('form_name', 'Delete the Announcement');
		$this->set('form_save', 'Delete the Announcement');
		$this->set('form_close', 'Cancel the Deletion');
	
		// Read the announcement
		$this->Announcement->id = $id;
		$announcement = $this->Announcement->read();
		
		// Only let the user edit their own Announcements.
		$this->view_only($announcement['Announcement'], 'You cannot delete that Announcement.');
		
		if (empty($this->data)) {
			$this->data = $announcement;
		} else {
			// Archive the Announcement by setting the expiration to now.
			$announcement['Announcement']['deleted'] = 1;
			
			// Save and handle any errors.
			if ($this->Announcement->save($announcement)) {
				$this->Session->setFlash('The Announcement has been deleted.', 'default', array('class' => 'success'));
				$this->swerve();
			} else {
				// If the save errored, we need to set the event_id or else
				// if the user posts again, it won't save the changes.
				$this->data['Announcement']['id'] = $id;
				
				// The edit failed.
				$this->Session->setFlash('There was an error with the announcement.', 'default', array('class' => 'error'));
			}
		}
		
		// The Announcement is shown in the view.
		$this->set('announcement', $announcement);
		
		// Use view that are similar.
		$this->render('archive-delete');
	}
}