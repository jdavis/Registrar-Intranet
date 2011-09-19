<div id="content">
	<h1>Brag Points for <?php echo $this->Calendar->nameForMonth($month); ?> <?php echo $year; ?></h1>
	<p>
		The Outreach List is for tracking activities, and meetings that relate to outreach and professional development.
		Every employee is responsible for adding their own activities for each month.
	</p>
	
	<table class="cream grid-20">
		<thead>
			<tr>
				<th class="normal">Date</th>
				<th class="normal center">Name</th>
				<th class="normal">Activity</th>
			</tr>
		</thead>
		<?php foreach($activities as $activity): ?>
		<tr>
			<td class="no-wrap"><?php echo $this->Util->simplifiedDateRange($activity['Outreach']['start_date'], $activity['Outreach']['end_date']); ?></td>
			<td class="center no-wrap"><?php echo $activity['Profile']['full_name']; ?></td>
			<td><?php echo $activity['Outreach']['activity']; ?></td>
		</tr>
		<?php endforeach; ?>
		
	<?php if (!count($activities)): ?>
		<tr>
			<td colspan="3" class="center-text med"><em>No activities for this month</em></td>
		</tr>
	<?php endif; ?>
	</table>
</div>