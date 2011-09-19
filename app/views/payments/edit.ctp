<div id="content">
	<h1>Pay Info for <?php echo $this->Date->daysAgoInWords($month, $day); ?></h1>
	
	<?php /* Save this stuff for later, clock in and clock out can be added later
	<h2>Other Payments</h2>
	<table class="data" cellpadding="0" cellspacing="0">
		<tr class="head">
			<td>From</td>
			<td>To</td>
			<td>Entered Hours</td>
			<td>Hours</td>
		</tr>
		<?php foreach ($payments as $payment): ?>
		<tr>
			<td>
				<?php echo $payment['Payment']['start_time']; ?>
			</td>
			<td>
				<?php echo $payment['Payment']['end_time']; ?>
			</td>
			<td>
				<?php echo $payment['Payment']['entered_hours']; ?>
			</td>
			<td>
				<?php echo $payment['Payment']['hours']; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	*/
	?>
	
	<?php echo $this->Form->create('Payment', array('url' => "/payments/edit/$month/$day/$year"));?>
	
		
	<?php
	echo $this->Form->input('entered_hours', array(
		'label' => 'Hours worked',
	));
	?>
	
	<?php echo $this->Form->end('Add Your Time');?>
	
	<?php /* For later, still
	<h2>Enter your start and end time or just enter the hours</h2>
	<?php
	echo $this->Form->input('start_time');
	echo $this->Form->input('end_time');
	?>
	<h3>or</h3>
	<?php
	echo $this->Form->input('entered_hours', array(
		'label' => 'Hours',
	));
	*/
	?>
	</p>
</div>