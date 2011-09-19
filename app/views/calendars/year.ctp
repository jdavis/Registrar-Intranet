<?php
	// Get the previous, next numbers for the month and year
	list($previous_month, $previous_year) = ($month == 1) ? array(12, $year - 1) : array($month - 1, $year);
	list($next_month, $next_year) = ($month == 12) ? array(1, $year + 1) : array($month + 1, $year);

?>
					<article id="calendars">
						<h1 class="center">
							<?php echo $this->Calendar->previous_year_link($month, $year, "/calendars/year/") ?> 
							<?php echo $year; ?>  
							<?php echo $this->Calendar->next_year_link($month, $year, "/calendars/year/") ?> 
						</h1>
<?php				for($i = 1; $i <= 12; $i++ ): ?>
<?php
						$days_in_month = cal_days_in_month(CAL_GREGORIAN, $i, $year);
						$month_start = date("N", mktime(0, 0, 0, $i, 1, $year)) % 7;
						$month_end = ($days_in_month + $month_start) % 7
?>
						<table class="mini-calendar gray"> 
							<thead> 
								<tr><th colspan="7"><?php echo $this->Calendar->month_link($i, $year); ?></th></tr> 
							</thead> 
							<tbody>
								<tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>
								<tr>
<?php					for($day = 1; $day <= $month_start; $day++): ?>
									<td></td>
<?php					endfor; ?>
<?php					for($day = $month_start + 1; $day <= $days_in_month + $month_start; $day++): ?>
									<td><?php echo $day - $month_start; ?></td>
<?php						if ($day % 7 == 0): ?>
								</tr>
								<tr>
<?php						endif; ?>
<?php					endfor; ?>
<?php					for($day = 0; $day < (7 - $month_end) % 7; $day++): ?>
									<td></td>
<?php					endfor; ?>
								</tr>
							</tbody> 
						</table>
<?php				endfor; ?>
					</article>