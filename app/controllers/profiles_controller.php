<?php
class ProfilesController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		// Add a menu
		$this->add_menu('views', array(
			'Current List' => '/profiles/',
			'By Area' => '/profiles/area/',
			'Past Employees' => '/profiles/past/',
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		
		// Some Profile specific CSS
		$this->add_style('/css/profiles.css');
		
		// Some Profile specific JS
		$this->add_script('/js/profiles.js');
		
		// Add the Profile Helper
		array_push($this->helpers, 'Profile');
		
		// Some global things we use
		$this->area_options = array(
			'Athletics' => 'Athletics',
			'Certifications' => 'Certifications',
			'Communications' => 'Communications',
			'Degree Audits' => 'Degree Audits',
			'Fees' => 'Fees',
			'Graduation' => 'Graduation',
			'IT Staff' => 'IT Staff',
			'Records' => 'Records',
			'Registrar' => 'Registrar',
			'Residency' => 'Residency',
			'Scheduling' => 'Scheduling',
			'Statistics' => 'Statistics',
			'Transcripts' => 'Transcripts',
		);
		
		// Some global things we use
		$this->status_options = array(
			'student' => 'Student',
			'part-time' => 'Part-Time',
			'full-time' => 'Full-Time',
		);
		
		// Some variables we use in the Controller.
		$this->upload_dir = '/afs/iastate.edu/virtual/intraregistrar/upload_tmp_dir/';
		$this->save_dir = '/afs/iastate.edu/virtual/intraregistrar/WWW/app/webroot/img/staff/';
		
		$this->valid_image_types = array(
			'image/gif',
			'image/jpeg',
			'image/pjpeg',
			'image/png',
			'image/tiff',
		);
	}

	function index() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Current Employees');
		
		$this->sub_nav_title = 'Current Employees';
		
		$this->add_sub_nav('Staff Directory', '/profiles/');
		
		$this->add_button('View Your Profile', '/account/profile/');
		$this->add_button('Edit Your Profile', '/account/profile/edit/');
		
		$this->select_menu('views', 'Current List');
		
				// Filter the announcements so that we only see ones created
		// in the last two days and haven't expired.
		$options = array(
			'conditions' => array(
				'Profile.inactive ' => 0,
			),
			'order' => array(
				'Profile.id ASC',
			),
			'recursive' => 0,
		);
		
		// Give them to the view.
		$this->set('profiles', $this->Profile->find('all', $options));
		
		$this->render('list');
	}
	
	function area() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Employees by Area');
		
		$this->sub_nav_title = 'Employees by Area';
		
		$this->add_sub_nav('Staff Directory', '/profiles/');
		
		$this->add_button('View Your Profile', '/account/profile/');
		$this->add_button('Edit Your Profile', '/account/profile/edit/');
		
		$this->select_menu('views', 'By Area');
		
		// Filter the announcements so that we only see ones created
		// in the last two days and haven't expired.
		$options = array(
			'conditions' => array(
				'Profile.inactive ' => 0,
			),
			'order' => array(
				'Profile.area ASC',
			),
			'recursive' => 0,
		);
		
		// Give them to the view.
		$this->set('profiles', $this->Profile->find('all', $options));
	}
	
	function past() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Past Employees');
		
		$this->sub_nav_title = 'Past Employees';
		
		$this->add_sub_nav('Staff Directory', '/profiles/');
		
		$this->add_button('View Your Profile', '/account/profile/');
		$this->add_button('Edit Your Profile', '/account/profile/edit/');
		
		$this->select_menu('views', 'Past Employees');
		
				// Filter the announcements so that we only see ones created
		// in the last two days and haven't expired.
		$options = array(
			'conditions' => array(
				'Profile.inactive ' => 1,
			),
			'order' => array(
				'Profile.id ASC',
			),
			'recursive' => 0,
		);
		
		// Give them to the view.
		$this->set('profiles', $this->Profile->find('all', $options));
		
		$this->render('list');
	}
	
	function panel() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Control Panel');
		
		$this->sub_nav_title = 'Control Panel';
		
		$this->add_sub_nav('Staff Directory', '/profiles/');
		
		// Read the user's profile and send it to the view
		$this->Profile->id = $this->Session->read('Profile.id');		
		$this->set('profile', $this->Profile->read());
	}
	
	function view($id = 0) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		
		$this->set('title_for_layout', 'Profile');
		
		$this->sub_nav_title = 'Profile';
		
		$this->add_sub_nav('Staff Directory', '/profiles/');
		
		$this->add_menu('newest', array(
			'Current List' => '/profiles/',
		));
		
		$this->add_menu('active', array(
			'By Area' => '/profiles/area/',
		));
		
		$this->add_menu('archives', array(
			'Past Employees' => '/profiles/past/',
		));
		
		// Read the user's profile and send it to the view
		$this->Profile->id = $id;		
		$this->set('profile', $this->Profile->read());
		
		$this->render('view');
	}
	
	function profile($action = '') {
		// Totally going against the CakeMVC guidelines.
		// I feel so exhilerated.
		if ($action == 'edit') {
			$this->edit_profile();
			$this->render('edit_profile');
			return;
		} elseif ($action == 'picture') {
			$this->edit_picture();
			$this->render('edit_picture');
			return;
		}
		
		// Setup the view information for this action.
		$this->layout = 'new_default';
		
		$this->set('title_for_layout', 'Your Profile');
		
		$this->sub_nav_title = 'Your Profile';
		
		$this->add_button('Edit your Profile', '/account/profile/edit/');
		#$this->add_button('Edit your Picture', '/account/profile/picture/');
		
		$this->add_sub_nav('Account', '/account/');
		$this->add_sub_nav('Profile', '/account/profile/');
		
		// Read the user's profile and send it to the view
		$this->Profile->id = $this->Session->read('Profile.id');		
		$this->set('profile', $this->Profile->read());
		
		$this->render('view');
	}
	
	function settings() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
	
		$this->back_link('Back to Your Profile', '/account/profile/');
	}
	
	function edit_profile() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
	
		$this->back_link('Back to Your Profile', '/account/profile/');
		
		if (empty($this->data)) {
			// Just populate the data fields with the profile
			$this->Profile->id = $this->Session->read('Profile.id');
			$profile = $this->Profile->read();
			
			// In order for the form to work nicely. We have to unset the id
			// Otherwise the redirect goes straight back to the same form.
			unset($profile['Profile']['id']);
			
			// Give it to the view.
			$this->data = $profile;
		} else {
			// Make sure we are only editing the profile that is theirs.
			$this->data['Profile']['id'] = $this->Session->read('Profile.id');
			
			if ($this->Profile->save($this->data)) {
				$this->Session->setFlash('Your Profile has been updated.', 'default', array('class' => 'success'));
				$this->swerve('/account');
			} else {
				// The edit failed.
				$this->Session->setFlash('There was an error saving your profile.', 'default', array('class' => 'error'));
			}
		}
		
		$this->set('areas', $this->area_options);
		$this->set('status', $this->status_options);
	}
	
	function edit_picture() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
	
		$this->back_link('Back to Your Profile', '/account/profile/');
		
		debug($this->data);
		
		if (empty($this->data)) {
			// Just populate the data fields with the profile
			$this->Profile->id = $this->Session->read('Profile.id');
			$profile = $this->Profile->read();
			
			// Give it to the view.
			$this->data = $profile;
			
			// In order for the form to work nicely. We have to unset the id
			// Otherwise the redirect goes straight back to the same form.
			unset($this->data['Profile']['id']);
		} else {
			debug('lets save the picture!');
			if (array_search($this->data['Profile']['photo']['type'], $this->valid_image_types) !== false
				&& isset($this->data['Profile']['photo']['tmp_name'])) {
				
				debug($this->data['Profile']['photo']['tmp_name']);
				$img_str = file_get_contents($this->data['Profile']['photo']['tmp_name']);
				
				$tmp_img = imagecreatefromstring($img_str);
				
				$this->Session->setFlash('Your Profile Picture has been updated.', 'default', array('class' => 'success'));
				#$this->swerve('/account');
			} else {
				// The edit failed.
				$this->Session->setFlash('There was an error saving your picture.', 'default', array('class' => 'error'));
			}
			

		}
	}
	
	function logout() {
		// We need to delete the login information.
		$this->Session->destroy();
		
		// The Pubcookie infomation has to be deleted as well.
		$this->redirect('/LOGOUT-CLEARLOGIN');
	}	
	
	function edit() {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Edit your Profile');
		
		$this->back_link('Back to your Settings', '/settings');
		
		if (empty($this->data)) {
			// Read the current profile data.
			$this->Profile->id = $this->Session->read('Profile.id');
			$this->data = $this->Profile->read();
		} else {
			$profile = $this->Profile->save($this->data);
			
			if (!empty($profile)) {
				foreach($this->data['EmergencyContact'] as $contact) {
					# Sanitize the input maybe?
					$contact['profile_id'] = $this->Profile->id;
					$this->Profile->EmergencyContact->save($contact);
				}
				
				$this->Session->setFlash('Your settings have been updated.', 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'settings' ,'action' => 'index'));
			}
		}
	}
	
	function supervisors_edit() {		
		$options = array(
			'conditions' => array(
				'Profile.is_supervisor' => 1,
			),
			'order' => 'Profile.id',
			'recursive' => 1,
		);
		
		$supervisors = $this->Profile->find('all', $options);
		
		if (!empty($this->data)) {
			foreach($supervisors as $supervisor) {
				# No need to save the whole record.
				# Just set all of the old supervisors to 0 before we resave
				# the ones from the form.
				$this->Profile->read(null, $supervisor['Profile']['id']);
				$this->Profile->set('is_supervisor', 0);
				$this->Profile->save();
			}
			
			if (isset($this->data['Profile']['supervisor_list'])) {
				foreach($this->data['Profile']['supervisor_list'] as $id) {
					# Read can handle null but oh well.
					if (!$id) continue;
					
					# Update the ones from the form.
					$this->Profile->read(null, $id);
					$this->Profile->set('is_supervisor', 1);
					
					$this->Profile->save();
				}
				
				# Redirect to clean up the post data.
				$this->Session->setFlash('Changes to the supervisors have been saved.');
				$this->redirect('/settings/supervisors');
			}
		}
		
		# The list what will contain all of the people at the Registrar.
		$staff_list = array();
	
		# Order by their first names.
		$options = array(
			'order' => 'Profile.first_name ASC'
		);
		
		$all_staff = Classregistry::init('Profile')->find('all', $options);
		
		# We want their ID linked to their full name
		foreach($all_staff as $staff) {
			$name = $staff['Profile']['full_name'];
			if (!$name) $name = $staff['User']['username'];
			$staff_list[$staff['User']['id']] = $name;
		}
		
		$this->set('staff_list', $staff_list);
		$this->set('current_list', $supervisors);
	}
	
	function supervisee_edit($id = 0) {
		
	}
	
	function supervisors() {
		$options = array(
			'conditions' => array(
				'Profile.is_supervisor' => 1
			),
		);
		
		$supervisors = $this->Profile->find('all', $options);
		
		$this->set('supervisors', $supervisors);
	}
	
	function payment($profile_id = 0) {
		$this->set('title_for_layout', 'Payment Settings');
		$user_id = $this->Auth->User('id');
		
		if ($profile_id != 0) {
			$this->Profile->id = $profile_id;
			$profile = $this->Profile->read();
			
			if ($user_id != $profile['Supervisor']['user_id']) {
				$this->Session->setFlash('You are not a supervisor!');
				$this->redirect('/');
			}
		} else {
			$this->Profile->id = $user_id;
			$profile = $this->Profile->read();
		}
		
		if (empty($this->data)) {
			$this->data = $profile;
		} else {
			// reformat the payment to just the float
			$payRate = $this->data['Profile']['pay_rate'];
			$this->data['Profile']['pay_rate'] = substr($payRate, 1);
			
			$profile = $this->Profile->save($this->data);
			
			if (!empty($profile)) {
				$this->Session->setFlash("Your settings have been saved");
				$this->redirect(array('controller' => 'profiles', 'action' => 'index'));
			}
		}
	}
}