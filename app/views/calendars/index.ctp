<?php
	
	if (date('n') == $month && date('Y') == $year) $today = date("j");
	else $today = 0;
	
	$previous_month_days = cal_days_in_month(CAL_GREGORIAN, $month == 1 ? 12 : $month - 1, $month == 1 ? $year - 1 : $year);
	
	$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

	$month_start = date("N", mktime(0, 0, 0, $month, 1, $year)) % 7;
	$month_end = ($days_in_month + $month_start) % 7;
	
	$user_id = $session->read('Profile.id');
	
	$i = 0;
?>
					<h1 class="center">
						<?php echo $this->Calendar->previous_month_link($month, $year, "/calendars/index/") ?>
						<?php echo $this->Calendar->nameForMonth($month); ?> <?php echo $year; ?> 
						<?php echo $this->Calendar->next_month_link($month, $year, "/calendars/index/") ?>
					</h1>
	
					<div id="calendar-buttons">
						<div id="calendar-selection" class="left">
<?php	 foreach (array() as $calendar): ?>
<?php		$i += 1;
			$name = "cal$i"; ?>
							<input title="<?php echo $calendar['Calendar']['background_color']; ?>" class="calendars" type="checkbox" id="<?php echo $name; ?>" checked="checked"/>
							<label for="<?php echo $name; ?>"><?php echo $calendar['Calendar']['name']; ?></label>
<?php 	endforeach; ?>
						</div>
		
						<div class="clear"></div>
					</div>
		
					<ol class="calendar"> 
						<li id="week-day">
							<ul>
								<li>Sunday</li>
								<li>Monday</li>
								<li>Tuesday</li>
								<li>Wednesday</li>
								<li>Thursday</li>
								<li>Friday</li>
								<li>Saturday</li>
							</ul>
						</li>
		
						<li id="previous-month">
							<ul>
<?php						for($i = $previous_month_days - $month_start + 1; $i <= $previous_month_days; $i++): ?>
								<?php echo "<li><strong>$i</strong></li>"; ?> 
<?php						endfor; ?>
							</ul>
						</li>
		
						<li id="current-month">
							<ul>
<?php						for($i = 1; $i <= $days_in_month; $i++): ?>
								<li<?php echo ($today == $i ? ' class="today"' : ''); ?>>
									<strong><?php echo $i; ?></strong><br/>
<?php							foreach($dates[$i - 1] as $date): ?>
<?php
									$rel = "cal" . $date['Event']['calendar_id'];
									$style = "background-color:" . $calendars[$date['Event']['calendar_id'] - 1]['Calendar']['background_color'] . ";";
									$style .= "color:" . $calendars[$date['Event']['calendar_id'] - 1]['Calendar']['text_color'] . ";";
									$style .= "text-decoration:none;";
									
									$href = "/events/view/" . $date['Event']['id'];
									$id = "event" . $date['Event']['id'];
									
									$class = ($date['Event']['calendar_id'] == 1) ? 'calendar-link' : 'calendar-event';?>	
									<?php echo "<a class=\"$class\" rel=\"$rel\" href=\"$href\" style=\"$style\" id=\"$id\">{$date['Event']['title']}</a>";?> 
<?php							endforeach; ?>
								</li>
<?php						endfor; ?>
							</ul>
						</li>
		
						<li id="next-month">
							<ul>
<?php						for($i = 1; $i <= (7 - $month_end) % 7; $i++): ?>
								<?php echo "<li><strong>$i</strong></li>"; ?> 
<?php						endfor; ?>
							</ul>
						</li>
					</ol>
<?php		foreach($dates as $day): ?>
<?php			foreach($day as $event): ?>
<?php				if ($event['Event']['calendar_id'] == 1) continue; ?>
					<div class="intra-dialog" id="event<?php echo $event['Event']['id']; ?>-dialog">
						<h1><?php echo $event['Event']['title']; ?></h1>
						<h3><?php echo $this->Util->date_duration($event['Event']['start_time'], $event['Event']['end_time']); ?></h3>
						<p>
							<strong>Posted by <?php echo $event['Profile']['full_name']; ?></strong>
						</p>
					
						<p>
							<?php echo $event['Event']['description']; ?> 
						</p>
						<br/>
<?php			if ($user_id == $event['Event']['profile_id']): ?>
					<?php echo $html->link(
						'Edit event details',
						'/events/edit/' . $event['Event']['id'],
						array(
							'class' => 'right'
						)
					); ?>
<?php			endif; ?>
					</div>
<?php			endforeach; ?>
<?php		endforeach; ?>
					<div class="clear"></div>