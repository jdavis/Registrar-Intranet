<?php
class DateHelper extends AppHelper {
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
	
	function simplifiedDateRange($first_date, $second_date) {
		return date("m/d", strtotime($first_date)) . " - " . date("m/d", strtotime($second_date));
	}
}
?>