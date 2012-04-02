<?php
class CalendarsController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		
		// All the Calendars have their CSS in this file.
		$this->add_style('/css/calendar.css');
		$this->add_script('/js/calendar.js');
		
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
		
		// Add some menus
		$this->add_menu('views', array(
			#'List All' => '/calendars/events/',
			'Monthly' => '/calendars/index/',
			'Yearly' => '/calendars/year/',
		));
		
		$this->add_menu('months', array(
			'January' => '/calendars/index/1/',
			'February' => '/calendars/index/2/',
			'March' => '/calendars/index/3/',
			'April' => '/calendars/index/4/',
			'May' => '/calendars/index/5/',
			'June' => '/calendars/index/6/',
			'July' => '/calendars/index/7/',
			'August' => '/calendars/index/8/',
			'September' => '/calendars/index/9/',
			'October' => '/calendars/index/10/',
			'November' => '/calendars/index/11/',
			'December' => '/calendars/index/12/',
		));
		
		$this->add_menu('years', array(
			'2009' => array('start' => '/calendars/', 'end' => '2009'),
			'2010' => array('start' => '/calendars/', 'end' => '2010'),
			'2011' => array('start' => '/calendars/', 'end' => '2011'),
			'2012' => array('start' => '/calendars/', 'end' => '2012'),
		));
		
		// Set up our default breadcrumbs for the Controller
		$this->add_sub_nav('Home', '/');
		$this->add_sub_nav('Calendars', '/calendars/');
		
		// Add the Calendar helper
		array_push($this->helpers, 'Calendar');
	}
	
	function index($month = 0, $year = 0) {
		// Resolve our parameters
		if (!$month) $month = date('n');
		if (!$year) $year = date('Y');
		
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', $this->month_names[$month - 1] . ' ' . $year . ' Calendar');
		
		$this->sub_nav_title = 'Monthly View for ' . $this->month_names[$month - 1];
		
		#$this->add_button('Add New Calendar', '/calendars/add');
		$this->add_button('Add Staff of the Day', '/events/staff/');
		$this->add_button('Add an Event', '/events/add/');
		
		$this->select_menu('views', 'Monthly');
		$this->menu_params('views', "$month/$year");
		
		$this->select_menu('months', $this->month_names[$month - 1]);
		$this->menu_params('months', "$year");
		
		$this->select_menu('years', $year);
		$this->menu_params('years', "index/$month/");
		
		$options = array(
			'recursive' => '0',
		);
		
		$calendars = $this->Calendar->find('all', $options);
		$this->set('calendars', $calendars);
		
		$this->set('month', $month);
		$this->set('year', $year);
		
		$calendar_dates = $this->retrieve_events($month, $year);
		$this->set('dates', $calendar_dates);
		
	}
	
	function year($month = 0, $year = 0) {
		// Resolve our parametersss
		if (!$month) $month = date('n');
		if (!$year) $year = date('Y');
		
		// Setup the view information for this action.
		$this->layout = 'new_default';
		$this->set('title_for_layout', $year . ' Calendar');
		
		$this->sub_nav_title = 'Yearly View for ' . $year;
		
		$this->add_button('Add Staff of the Day', '/events/staff/');
		$this->add_button('Add an Event', '/events/add/');
		
		$this->select_menu('views', 'Yearly');
		$this->menu_params('views', "$month/$year");
		
		$this->select_menu('years', $year);
		$this->menu_params('years', "year/$month/");
		
		$this->set('month', $month);
		$this->set('year', $year);

	}
	
	function edit() {
		$this->layout = 'new_default';
		$options = array(
			'recursive' => '0',
		);
		
		$calendars = $this->Calendar->find('all', $options);
		$this->set('calendars', $calendars);
	}
	
	function add() {
		$this->layout = 'new_default';
		
		if (!empty($this->data)) {
			$this->Calendar->save($this->data);
		}
		
	}
	
	private function calendar_info($month, $year) {
		$info = array();
		$info['events'] = retrieve_events($month, $year);
		$info['month'] = $month;
		$info['year'] = $year;
		$info['month_start'] = 
		$info['days_in_month'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		
	}
	
	private function retrieve_events($month, $year) {
		$month_start = mktime(0, 0, 0, $month, 1, $year);
		$month_end = mktime(11, 59, 59, $month, cal_days_in_month(CAL_GREGORIAN, $month, $year), $year);
		
		$options = array(
			'order' => array(
				'Event.start_time ASC',
			),
			'conditions' => array(
				'Event.start_time >=' => date('Y-m-d H:i:s', $month_start),
				'Event.end_time <=' => date('Y-m-d H:i:s', $month_end),
			),
		);
		$events = Classregistry::init('Event')->find('all', $options);
		
		#debug($events);
		
		#debug("Retrieving Calendars for $month/$year");
		
		$total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		
		# The variable we'll use to put our events.
		$days = array();
		
		#Array to hold dates that span multiple days
		$extra_days = array();
		
		# Go through all of the events and associate them with
		# their respective days for the view.
		for($f = 0, $e = 0; $f < $total_days; $f++) {
			$days[$f] = array();
			# Only loop through if we have some events left.
			while($e < count($events)) {
				$day_start = date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $f + 1, $year));
				$day_end = date("Y-m-d H:i:s", mktime(-1, -1, -1, $month, $f + 2, $year));
				
				$event = $events[$e]['Event'];
				
				// if($e != 0){
					// if ($events[$e-1]['end_time'] >= $day_start):	
						// array_push($days[$f], $events[$e-1]);
						
					// endif;					
				// }
				# See if the next event on the array starts during this day.
				if ($event['start_time'] >= $day_start && $event['start_time'] <= $day_end) {
					# It was a match, add it to the array for the day.
					array_push($days[$f], $events[$e]);
				
					# Increase the event index.
					$e += 1;
				} else {
					break;
				}
			}
		}
		
		return $days;
	}
}