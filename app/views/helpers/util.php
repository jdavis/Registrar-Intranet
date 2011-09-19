<?php

class UtilHelper extends AppHelper {
	function time() {
		#
		$times = array(
			'07:00:00' => '7:00 am',
			'07:15:00' => '7:15 am',
			'07:30:00' => '7:30 am',
			'07:45:00' => '7:45 am',
			'08:00:00' => '8:00 am',
			'08:15:00' => '8:15 am',
			'08:30:00' => '8:30 am',
			'08:45:00' => '8:45 am',
			'09:00:00' => '9:00 am',
			'09:15:00' => '9:15 am',
			'09:30:00' => '9:30 am',
			'09:45:00' => '9:45 am',
			'10:00:00' => '10:00 am',
			'10:15:00' => '10:15 am',
			'10:30:00' => '10:30 am',
			'10:45:00' => '10:45 am',
			'11:00:00' => '11:00 am',
			'11:15:00' => '11:15 am',
			'11:30:00' => '11:30 am',
			'11:45:00' => '11:45 am',
			'12:00:00' => '12:00 pm',
			'12:15:00' => '12:15 pm',
			'12:30:00' => '12:30 pm',
			'12:45:00' => '12:45 pm',
			'13:00:00' => '1:00 pm',
			'13:15:00' => '1:15 pm',
			'13:30:00' => '1:30 pm',
			'13:45:00' => '1:45 pm',
			'14:00:00' => '2:00 pm',
			'14:15:00' => '2:15 pm',
			'14:30:00' => '2:30 pm',
			'14:45:00' => '2:45 pm',
			'15:00:00' => '3:00 pm',
			'15:15:00' => '3:15 pm',
			'15:30:00' => '3:30 pm',
			'15:45:00' => '3:45 pm',
			'16:00:00' => '4:00 pm',
			'16:15:00' => '4:15 pm',
			'16:30:00' => '4:30 pm',
			'16:45:00' => '4:45 pm',
			'17:00:00' => '5:00 pm',
			'17:15:00' => '5:15 pm',
			'17:30:00' => '5:30 pm',
			'17:45:00' => '5:45 pm',
			'18:00:00' => '6:00 pm',
			'18:15:00' => '6:15 pm',
			'18:30:00' => '6:30 pm',
			'18:45:00' => '6:45 pm',
			'19:00:00' => '7:00 pm',
		);
		return $times;
	}
	
	function daysAgoInWords($month, $day, $year = 0) {
		// year is optional
		$deltaMonth = date('n') - $month;
		$deltaDay = date('j') - $day;
		$deltaYear = date('Y') - ($year == 0 ? date('Y') : $year);
		
		if (!$deltaMonth && !$deltaYear) {
			switch($deltaDay) {
				case -1:
					return $this->output("Tomorrow");
				case 0:
					return $this->output("Today");
				case 1:
					return $this->output("Yesterday");
				default:
					return $this->output("$month/$day" . (($year) ? "/$year" : ""));
			}
		}
	}
	
	private function nice_date($date) {
		$deltaMonth = date('n') - date('n', $date);
		$deltaDay = date('j') - date('j', $date);
		$deltaYear = date('Y') - date('Y', $date);
		
		$date_start = '';
		
		if ($deltaMonth == 0 && $deltaYear == 0) {
			switch($deltaDay) {
				case -1:
					$date_start = "Tomorrow";
					break;
				case 0:
					$date_start = "Today";
					break;
				case 1:
					$date_start = "Yesterday";
					break;
				default:
					$date_start = '';
			}
		}
		
		if ($date_start) {
			return $date_start . ' at ' . date('g:i A', $date);
		} else {
			return date('D, M j, Y', $date) . ' at ' . date('g:i A', $date);
		}
	}
	
	function simplifiedDateRange($first_date, $second_date) {
		return date("m/d", strtotime($first_date)) . " - " . date("m/d", strtotime($second_date));
	}
	
	function date_duration($from, $until) {
		$from = strtotime($from);
		$until = strtotime($until);
		
		$date_string = $this->nice_date($from);
		if (date('Y-m-d', $from) != date('Y-m-d', $from)) {
			$date_string .= ' - ' . $this->nice_date($until);
		} else {
			$date_string .= ' - ' . date('g:i A', $until);
		}
		
		return $this->output($date_string);
	}
	
	function nameForMonth($month) {
		$names = array(
			'January', 'February',
			'March', 'April',
			'May', 'June',
			'July', 'August',
			'September', 'October',
			'November', 'December',
		);
		
		if ($month < 1 || $month > 12) return '';
		else return $names[$month - 1];
	}
	
	function days_of_the_week() {
		return array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	}
	
	function week_days() {
		return array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
	}
}
?>