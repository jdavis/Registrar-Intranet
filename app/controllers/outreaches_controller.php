<?php

class OutreachesController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		
		$this->month_names = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December',
		);
		
		$this->add_menu('months', array(
			'January' => '/outreaches/index/1/',
			'February' => '/outreaches/index/2/',
			'March' => '/outreaches/index/3/',
			'April' => '/outreaches/index/4/',
			'May' => '/outreaches/index/5/',
			'June' => '/outreaches/index/6/',
			'July' => '/outreaches/index/7/',
			'August' => '/outreaches/index/8/',
			'September' => '/outreaches/index/9/',
			'October' => '/outreaches/index/10/',
			'November' => '/outreaches/index/11/',
			'December' => '/outreaches/index/12/',
		));
		
		$this->add_menu('years', array(
			'2009' => array('start' => '/outreaches/', 'end' => '2009'),
			'2010' => array('start' => '/outreaches/', 'end' => '2010'),
			'2011' => array('start' => '/outreaches/', 'end' => '2011'),
			'2012' => array('start' => '/outreaches/', 'end' => '2012'),
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Brag Points', '/outreaches/');
		
		// Add the Calendar helper
		array_push($this->helpers, 'Calendar');
	}
	
	function index($month = 0, $year = 0) {
		// Resolve our parameters
		if (!$month) $month = date('n');
		if (!$year) $year = date('Y');
		
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Brag Points for ' . $this->month_names[$month - 1]);
		
		$this->sub_nav_title = 'Brag Points for ' . $this->month_names[$month - 1];
		
		#$this->add_button('Add New Calendar', '/calendars/add');
		$this->add_button('Add Brag Points', '/outreaches/add/');
		
		$this->select_menu('months', $this->month_names[$month - 1]);
		$this->menu_params('months', "$year");
		
		$this->select_menu('years', $year);
		$this->menu_params('years', "index/$month/");
		
		$days_of_month = date('t');
		
		$options = array(
			'conditions' => array(
				'AND' => array(
					'Outreach.start_date >=' => "$year-$month-1",
					'Outreach.end_date <=' => "$year-$month-$days_of_month",
				),
			),
		);
		
		$activities = $this->Outreach->find('all', $options);
		$this->set('activities', $activities);
		
		$this->set('month', $month);
		$this->set('year', $year);
	}
	
	function index_old($month = 0, $year = 0) {
		if (array_key_exists('date', $this->params['url'])) {
			$pattern = '/^(\d+)\/(\d+)$/';
			preg_match($pattern, $this->params['url']['date'], $matches);
			#print_r($matches);
			
			if (count($matches) == 3) {
				$month = $matches[1];
				$year = $matches[2];
			}
		}
		
		if (!$month) $month = date("n");
		if (!$year) $year = date("Y");
		
		$days_of_month = date("t");
		
		$options = array(
			'conditions' => array(
				'AND' => array(
					'Outreach.start_date >=' => "$year-$month-1",
					'Outreach.end_date <=' => "$year-$month-$days_of_month",
				),
			),
		);
		
		$days_of_week = array(
			'Sunday',
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
		);
		
		$month_names = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December',
		);
		
		$start_year = 2011;
		$end_year = date("Y");
		$months = array();
		
		for($y = $start_year; $y <= $end_year; $y++) {
			for($m = 1; $m < 13; $m++) {
				array_push($months, array(
					'value' => "$m/$y",
					'title' => $month_names[$m - 1] . " $y",
					'selected' => ($y == $year && $month == $m),
				));
			}
		}
		
		$this->set("year", $year);
		$this->set("month_name", $month_names[$month - 1]);
		$this->set("activities", $this->Outreach->find("all", $options));
		$this->set("months", $months);
		$this->set("days_of_week", $days_of_week);
	}
	
	function add($day = 0) {
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Add a Brag Point');
		
		$this->back_link('Back to the Brag Points', '/outreaches/');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Add a Brag Point');
		$this->set('form_save', 'Create the Brag Point');
		$this->set('form_close', 'Discard the Brag Point');
		
		// Save the new event if one was submitted.
		if (!empty($this->data)) {
			// The id that created the event should be set to whomever is logged in.
			$this->data['Outreach']['profile_id'] = $this->Session->read('Profile.id');
			
			if ($this->Outreach->save($this->data)) {
				$this->Session->setFlash('The Brag Point has been saved.', 'default', array('class' => 'success'));
				$this->swerve('/outreaches/');
			}
		}
		
		// Utilize one view.
		$this->render('add-edit');
	}
	
	function edit($id = 0) {
		// Setup the view information for this action.		
		$this->layout = 'new_default';
		$this->set('title_for_layout', 'Edit the Event');
	
		$this->back_link('Back to the Calendar', '/calendars');
		
		// We use the same view for add/edit
		$this->set('form_name', 'Edit the Event');
		$this->set('form_save', 'Save Event Changes');
		$this->set('form_close', 'Discard the Changes');
		
		// Read the event that wants to be edited.
		$this->Event->id = $id;
		$event = $this->Event->read();
		
		// Ensure that the user has the ability to edit the event.
		$this->view_only($event['Event'], 'You cannot edit that event. It isn\'t yours.');
		
		if (empty($this->data)) {
			// Just populate the data fields with the event that was read.
			$this->data = $event;
		} else {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash('The Event has been edited.', 'default', array('class' => 'success'));
				$this->swerve();
			} else {
				// If the save errored, we need to set the event_id or else
				// if the user posts again, it won't save the changes.
				$this->data['Event']['id'] = $id;
				
				// The edit failed.
				$this->Session->setFlash('There was an error with the event.', 'default', array('class' => 'error'));
			}
		}
		
		// Utilize one view.
		$this->render('add-edit');
	}
}