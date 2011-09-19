<?php
class CalendarHelper extends AppHelper {
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
	
	function month_link($month, $year) {
		$month_name = $this->nameForMonth($month);
		return "<a href=\"/calendars/index/$month/$year\">$month_name</a>";
	}
	
	function next_month_link($month, $year, $base) {
		// Set the month to January if it is December
		$next_month = ($month == 12) ? 1 : $month + 1;
		
		// Increment the year if it was December
		$next_year = ($month == 12) ? $year + 1 : $year;
		
		return "<a href=\"$base$next_month/$next_year\">&gt;&gt;&gt;</a>";
	}
	
	function previous_month_link($month, $year, $base) {
		// Set the month to January if it is December
		$prev_month = ($month == 1) ? 12 : $month - 1;
		
		// Increment the year if it was December
		$prev_year = ($month == 1) ? $year - 1 : $year;
		
		return "<a href=\"$base$prev_month/$prev_year\">&lt;&lt;&lt;</a>";
	}
	
	function next_year_link($month, $year, $base) {
		$next_year = $year + 1;
		return "<a href=\"$base$month/$next_year\">&gt;&gt;&gt;</a>";
	}
	
	function previous_year_link($month, $year, $base) {
		$prev_year = $year - 1;
		return "<a href=\"$base$month/$prev_year\">&lt;&lt;&lt;</a>";
	}
}
