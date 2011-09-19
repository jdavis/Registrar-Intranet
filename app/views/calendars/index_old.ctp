<?php
	# Get all of our variables in one go.
	
	if (date('n') == $month && date('Y') == $year) $today = date("j");
	else $today = 0;
	
	$previous_month_days = cal_days_in_month(CAL_GREGORIAN, $month == 1 ? 12 : $month - 1, $month == 1 ? $year - 1 : $year);
	
	$next_month_days = cal_days_in_month(CAL_GREGORIAN, $month == 12 ? 1 : $month, $month == 12 ? $year + 1 : $year);
	
	$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

	$month_start = date("N", mktime(0, 0, 0, $month, 1, $year)) % 7;
	$month_end = 7 - (($days_in_month % 7) + $month_start) % 7;
	
	$user_id = $session->read('Auth.User.id');
	
	list($previous_month, $previous_year) = ($month == 1) ? array(12, $year - 1) : array($month - 1, $year);
	list($next_month, $next_year) = ($month == 12) ? array(1, $year + 1) : array($month + 1, $year);
	
	$i = 0;
	
	#debug($calendars);
?>
<div id="content">
	<h1 class="center-text"><a href="<?php echo "/calendars/index/$previous_month/$previous_year"; ?>">&lt;&lt;&lt;</a>
		<?php echo $this->Date->nameForMonth($month); ?> <?php echo $year; ?>
		<a href="<?php echo "/calendars/index/$next_month/$next_year"; ?>">&gt;&gt;&gt;</a>
	</h1>
	<br/>
	
	<div id="calendar">
		<div id="calendar-buttons">
			<div id="calendar-selection" class="left">
			<?php foreach ($calendars as $calendar): ?>
				<?php
					$i += 1;
					$name = "cal$i";
				?>
				
				<input title="<?php echo $calendar['Calendar']['background_color']; ?>" class="calendars" type="checkbox" id="<?php echo $name; ?>" checked="checked"/>
				<label for="<?php echo $name; ?>"><?php echo $calendar['Calendar']['name']; ?></label>
			<?php endforeach; ?>
			</div>
		
			<div id="calendar-actions" class="right">
					
				<?php #<a href="/calendars/add">Add Calendar</a> ?>
				<a href="/events/staff">Add Staff of the Day</a>
				<a href="/events/add">Add Event</a>
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
				<?php for($i = $previous_month_days - $month_start + 1; $i <= $previous_month_days; $i++): ?>
					<?php echo "<li><strong>$i</strong></li>"; ?>
				<?php endfor; ?>
				</ul>
			</li>
			
			<li id="current-month">
				<ul>
				<?php for($i = 1; $i <= $days_in_month; $i++): ?>
					<li<?php echo ($today == $i ? ' class="today"' : ''); ?>>
						<strong><?php echo $i; ?></strong><br/>
					<?php foreach($dates[$i - 1] as $date): ?>
						<?php
							$rel = "cal" . $date['Event']['calendar_id'];
							$style = "background-color:" . $calendars[$date['Event']['calendar_id'] - 1]['Calendar']['background_color'] . ";";
							$style .= "color:" . $calendars[$date['Event']['calendar_id'] - 1]['Calendar']['text_color'] . ";";
							$style .= "text-decoration:none;";
							
							$href = "/events/view/" . $date['Event']['id'];
							$id = "event" . $date['Event']['id'];
							
							$class = ($date['Event']['calendar_id'] == 1) ? 'calendar-link' : 'calendar-event';
							
							echo "<a class=\"$class\" rel=\"$rel\" href=\"$href\" style=\"$style\" id=\"$id\">";
						?>
							<?php echo $date['Event']['title']; ?>
						</a>
					<?php endforeach; ?>
					</li>
				<?php endfor; ?>
				</ul>
			</li>
			
			<li id="next-month">
				<ul>
				<?php for($i = 1; $i <= $month_end; $i++): ?>
					<?php echo "<li><strong>$i</strong></li>"; ?>
				<?php endfor; ?>
				</ul>
			</li>
		</ol>
	<?php foreach($dates as $day): ?>
		<?php foreach($day as $event): ?>
		
		<?php if ($event['Event']['calendar_id'] == 1) continue; ?>
		
		<div class="event-dialog" id="event<?php echo $event['Event']['id']; ?>-dialog">
			<h1>
				<?php echo $event['Event']['title']; ?>
			</h1>
		
			<h3>
				<?php echo $this->Util->date_duration($event['Event']['start_time'], $event['Event']['end_time']); ?>
			</h3>
			<p>
				<strong>Posted by <?php echo $event['Profile']['full_name']; ?></strong>
			</p>
		
			<p>
				<?php echo $event['Event']['description']; ?>
			</p>
			
			<br/>
			
		<?php if ($user_id == $event['Event']['profile_id']): ?>
			<?php #echo $html->link(
					#'Delete',
					#'/events/delete/' . $event['Event']['id'],
					#array(),
					#'Are you sure you want to delete this event?'
				#); ?>
			<?php echo $html->link(
				'Edit event details',
				'/events/edit/' . $event['Event']['id'],
				array(
					'class' => 'right'
				)
			); ?>
		<?php endif; ?>
		
		</div>
		<?php endforeach; ?>
	<?php endforeach; ?>
	
		
		<div class="clear"></div>
	</div>
</div>