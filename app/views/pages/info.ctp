<?php
	$names = "";
?>
<div id="content">
	<div class="first-main">
		<h1>Outreach List <?php echo $html->image("/img/icon/add-icon.png", array(
							"alt" => "Add an Outreach Activity",
							'url' => array('controller' => 'outreaches' , 'action' => 'add' ,)
						)); ?></h1>

		<p>
			The Outreach List is for tracking activities, and meetings that relate to outreach and professional development.
			Every employee is responsible for adding their own activities for each month.
		</p>
		<table class="max-width pretty">
			<tr>
				<th colspan="3" class="caption">Activities for This Month</th>
			</tr>
			<tr>
				<th class="normal">Date</th>
				<th class="normal center">Name</th>
				<th class="normal">Activity</th>
			</tr>
			<?php foreach($activities as $activity): ?>
			<tr>
				<td class="no-wrap"><?php echo $this->Util->simplifiedDateRange($activity['Outreach']['start_date'], $activity['Outreach']['end_date']); ?></td>
				<td class="center no-wrap"><?php echo $activity['Profile']['full_name']; ?></td>
				<td><?php echo $activity['Outreach']['activity']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<a href="/outreaches/" class="right">more</a>
	</div>
	
	<?php echo $this->element('sotd');?>
</div>