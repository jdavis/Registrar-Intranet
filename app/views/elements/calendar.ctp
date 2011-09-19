<?php
	# Jeff Linse's Calendar Element for CakePHP
	# Lots of edits by Josh, though xD
	
	$first_of_month = mktime(0, 0, 0, $month, 1, $year);
	$num_days = cal_days_in_month(0, $month, $year);
	$offset = date('w', $first_of_month);
	$rows = 1;
	
	if ($month == 12) {
		$nextMonth = 1;
		$nextYear = $year + 1;
	} else {
		$nextMonth = $month + 1;
		$nextYear = $year;
	}
	
	if ($month == 1) {
		$previousMonth = 12;
		$previousYear = $year - 1;
	} else {
		$previousMonth = $month - 1;
		$previousYear = $year;
	}
?>

	<table id="calendar">
		<caption>
			<?php echo $html->link('<<<', "/payments/index/$previousMonth/$previousYear/"); ?> 
			<?php echo date('F Y', $first_of_month); ?> 
			<?php echo $html->link('>>>', "/payments/index/$nextMonth/$nextYear/"); ?> 
		</caption>
		<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
		<tr>
		
		<?php for( $i = 1; $i < $offset + 1; ++$i ): ?>
			<td></td>
		<?php endfor; ?>
		
		<?php for($f = 1; $f <= count($payments); $f++): ?>
			<?php if( ($f + $offset - 1) % 7 == 0 && $f != 1 ): ?>
				</tr><tr>
				<?php ++$rows; ?>
			<?php endif; ?>
			<td><strong><?php echo $html->link($f, "/payments/edit/$month/$f/$year/"); ?></strong>
			</td>
		<?php endfor; ?>
		
		<?php for( $f; ($f + $offset) <= $rows * 7; ++$f ): ?>
			<td></td>
		<?php endfor; ?>
		</tr>
	</table>

<table id="calendar">
<caption>
<?php echo $html->link('<<<', "$month_link/$previousMonth/$previousYear/"); ?> 
<?php echo date('F Y', $first_of_month); ?> 
<?php echo $html->link('>>>', "$month_link/$nextMonth/$nextYear/"); ?> 
</caption>
	<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
	<tr>
	
	<?php for( $i = 1; $i < $offset + 1; ++$i ): ?>
		<td></td>
	<?php endfor; ?>
	
	<?php for( $day = 1; $day <= $num_days; ++$day ): ?>
		<?php if( ($day + $offset - 1) % 7 == 0 && $day != 1 ): ?>
			</tr><tr>
			<?php ++$rows; ?>
		<?php endif; ?>
		<td><?php echo $html->link($day, $day_link.$year.'/'.$month.'/'.$day.'/'); ?></td>
	<?php endfor; ?>
	
	<?php for( $day; ($day + $offset) <= $rows * 7; ++$day ): ?>
		<td></td>
	<?php endfor; ?>
	
	</tr>
</table>

Old stuff

	<table id="calendar">
		<caption>
			<?php echo $html->link('<<<', "/payments/index/$previousMonth/$previousYear/"); ?> 
			<?php echo date('F Y', $first_of_month); ?> 
			<?php echo $html->link('>>>', "/payments/index/$nextMonth/$nextYear/"); ?> 
		</caption>
		<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
		<tr>
		
		<?php for( $i = 1; $i < $offset + 1; ++$i ): ?>
			<td></td>
		<?php endfor; ?>
		
		<?php for($f = 1; $f <= count($payments); $f++): ?>
			<?php
				$pay_day = $payments[$f - 1];
				$day_total = 0.0;
				foreach($pay_day as $payment):
					$day_total += $payment['Payment']['hours'];
				endforeach;
				
				$total_hours += $day_total;
			?>
			<?php if( ($f + $offset - 1) % 7 == 0 && $f != 1 ): ?>
				</tr><tr>
				<?php ++$rows; ?>
			<?php endif; ?>
			<td><strong><?php echo $html->link($f, "/payments/edit/$month/$f/$year/"); ?></strong>
				<?php echo $day_total; ?>
			</td>
		<?php endfor; ?>
		
		<?php for( $f; ($f + $offset) <= $rows * 7; ++$f ): ?>
			<td></td>
		<?php endfor; ?>
		
		</tr>
	</table>

