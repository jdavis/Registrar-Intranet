<?php
class PaymentsController extends AppController {
	var $components = array('Session');

	function index() {
		$this->Payment->Profile->id = $this->Auth->user('id');
		$profile = $this->Payment->Profile->find('first');
		
		$this->set('isSupervisor', $profile['Profile']['supervisor']);
	}
	
	function control() {
		$user_id = $this->Auth->user('id');
		
		# Hard coded for right now...
		$ids = array(
			1, 2, 3, 6
		);
		
		if (!in_array($user_id, $ids)) {
			
		}
	}
	
	function report($month = 0, $day = 0, $year = 0, $profile_id = 0) {
		$user_id = $this->Auth->user('id');
		
		if ($profile_id) {
			$this->Payment->Profile->id = $profile_id;
			$profile = $this->Payment->Profile->read();
			
			if ($user_id != $profile['Supervisor']['user_id']) {
				$this->Session->setFlash('You are not a supervisor for this person!');
				$this->redirect('/');
			}
		} else {
			$this->Payment->Profile->id = $user_id;
			$profile = $this->Payment->Profile->read();
		}
		
		$month = (!$month) ? date('n') : $month;
		$day = (!$day) ? date('j') : $day;
		$year = (!$year) ? date('Y') : $year;
		
		$this->set('month', $month);
		$this->set('day', $day);
		$this->set('year', $year);
		
		$next_pay = $this->pay_period($month, $day, $year, 1);
		$this->set('next_pay_period', $next_pay);
		
		$previous_pay = $this->pay_period($month, $day, $year, -1);
		$this->set('previous_pay_period', $previous_pay);
		
		$current_pay = $this->pay_period($month, $day, $year);
		$this->set('current_pay_period', $current_pay);
		
		$payments = $this->pay_period_payments($previous_pay, $current_pay, $profile['Profile']['user_id']);
		$this->set('payments', $payments);
		
		$this->set('profile', $profile);
		$this->set('title_for_layout', 'Payroll Report');
	}
	
	function edit($month = 0, $day = 0, $year = 0) {
		$userID = $this->Auth->User('id');
		
		$month = (!$month) ? date('n') : $month;
		$day = (!$day) ? date('j') : $day;
		$year = (!$year) ? date('Y') : $year;
		
		$this->set('month', $month);
		$this->set('day', $day);
		$this->set('year', $year);
		
		$date = "$year-$month-$day";
		
		$options = array(
			'conditions' => array(
				'Payment.profile_id' => $userID,
				'Payment.date' => $date,
				'Payment.hours >' => 0,
			),
		);
		
		$payment = $this->Payment->find("first", $options);
		
		if (!empty($payment)) {
			$this->Payment->id = $payment['Payment']['id'];
		} else {
			$this->Payment->id = 0;
		}
		
		if (!empty($this->data)) {
			debug($this->data);
			$this->data['Payment']['profile_id'] = $userID;
			$this->data['Payment']['date'] = $date;
			
			$this->data['Payment']['hours'] = $this->data['Payment']['entered_hours'];
			
			$payment = $this->Payment->save($this->data);
			$this->redirect("/payments/report/$month/$day/$year");
		} else {
			$this->data = $payment;
		}
	}
	
	//function supervisor($view = "") {
	function supervisor($profile = 0, $year = 0) {
		$this->Payment->Profile->id = $this->Auth->user('id');
		#$this->Payment->Profile->id = 3;
		$supervisor = $this->Payment->Profile->read();
		
		if ($profile == 0) {
			$employees = array();
			foreach ($supervisor['Supervisor'] as $s):
				$this->Payment->Profile->id = $s['id'];
				array_push($employees, $this->Payment->Profile->read());
			endforeach;
			
			$this->set('overview', true);
			$this->set('employees', $employees);
		} else {
			$this->Payment->Profile->id = $profile;
			$employee = $this->Payment->Profile->read();
			
			$this->set("employee", $employee);
			$this->set('overview', false);
		}
	}
	
	private function pay_period_payments($previous_pay, $current_pay, $user_id) {		
		$month = date('n', $current_pay['begin']);
		$year = date('Y', $current_pay['begin']);
		// Profiles and Users are tied so we can use the $user_id as the $profile_id
		$options = array(
			'conditions' => array(
				'Payment.profile_id' => $user_id,
				'AND' => array(
					'Payment.date >=' => date("Y-m-d", $current_pay['begin']),
					'Payment.date <=' => date("Y-m-d", $current_pay['end']),
				),
			),
			'order' => 'Payment.date',
		);
		
		$payments = $this->Payment->find('all', $options);
		#debug($payments);
		# we create an array so our view can just loop through each day to see the info
		
		$days = array();
		$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$payment_index = 0;
		
		for($f = 1; $f <= $num_days; $f++):
			$day_payments = array();
			#debug("Payments date = " . $payments[$payment_index]['Payment']['date']);
			#debug("Sprintf = " . sprintf("%s-%s-%02d", $year, $month, $f));
			#debug("Index = $payment_index and count = " . count($payments));
			while($payment_index < count($payments) &&
					$payments[$payment_index]['Payment']['date'] == sprintf("%s-%02s-%02d", $year, $month, $f)) {
				#debug("pushing payment");
				array_push($day_payments, $payments[$payment_index]);
				$payment_index++;
			}

			array_push($days, $day_payments);
		endfor;
		
		return $days;
	}

	# the n is how many pay periods you want to move
	# direction is -1 if you want the previous pay period n times ago
	# direction is 1 if you want the next pay period n times ahead
	private function pay_period($month, $day, $year, $direction = 0) {
		#debug("$month - $day - $year and dir = $direction");
		if ($direction == 1) {
			$month += ($day >= 15);
		} else if ($direction == -1) {
			$month -= ($day <= 15);
		}
		
		if ($month > 12) {
			$year += round($month / 12, 0);
			$month %= 12;
		} if ($month < 1) {
			$year -= 1;
			$month = 12;
		}
		
		if ($direction != 0) {
			$day_start = ($day <= 15) ? 16 : 1;
			$day_end = ($day <= 15) ? cal_days_in_month(CAL_GREGORIAN, $month, $year) : 15;
		} else {
			$day_start = ($day <= 15) ? 1 : 16;
			$day_end = ($day <= 15) ? 15 : cal_days_in_month(CAL_GREGORIAN, $month, $year);
		}
		
		#debug("direction = $direction");
		
		$begin = mktime(0, 0, 0, $month, $day_start, $year);
		$end = mktime(0, 0, 0, $month, $day_end, $year);
		
		#debug("Begin: " . date("m-d-y", $begin));
		#debug("End: " . date("m-d-y", $end));
		
		return array(
			'begin' => $begin,
			'end' => $end,
		);
	}
	
	private function total_hours() {
		$user_id = $this->Auth->user('id');
		$payPeriod = $this->pay_period();
		
		// Profiles and Users are tied so we can use the $user_id as the $profile_id
		$options = array(
			'conditions' => array(
				'Payment.profile_id' => $user_id,
				'AND' => array(
					'Payment.date >=' => date("Y-m-d", $payPeriod['begin']),
					'Payment.date <=' => date("Y-m-d", $payPeriod['end']),
				),
			),
		);
		
		$sum = 0.0;
		$payments = $this->Payment->find('all', $options);
		
		foreach($payments as $payment):
			$sum += $payment['Payment']['hours'];
		endforeach;
		
		return $sum;
	}
}