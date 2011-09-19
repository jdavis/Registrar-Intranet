<?php
	$start_selector = isset($this->data['Event']['start_selector']) ? $this->data['Event']['start_selector'] : '08:00:00';
	$end_selector = isset($this->data['Event']['end_selector']) ? $this->data['Event']['end_selector'] : '17:00:00';
?>
<div id="content">
	<h1>Edit the Event</h1>
	<?php echo $form->create('Event'); ?>
	
	<?php echo $form->input('title'); ?>
	
	
	<div class="input select">
		<?php echo $form->label('calendar_id', 'Calendar'); ?>
		<?php echo $form->select('calendar_id', $calendar_options); ?>
		<b class="indent">All day</b>
		<?php echo $form->checkbox('all_day', array('value' => 1)); ?>
		<?php echo $form->error('calendar_id'); ?>
	</div>
	
	<?php 
		# Not used at the moment, events can only belong to one Calendar for now.
		/*
		echo $form->input('Calendar.Calendar', array(
		'options' => $calendar_options,
		'label' => 'Calendars',
		'class' => 'multi-select',
		'multiple' => 'multiple',
	)); */
	?>
	
	<div class="input select datetime-picker">
		<?php echo $form->label('start_timeMonth', 'From'); ?>
		<?php echo $form->month('start_time'); ?>
		<?php echo $form->day('start_time'); ?>
		<?php echo $form->year('start_time', 2000, 2020); ?>
		at
		<?php echo $form->select('start_selector', $this->Util->time(), $start_selector); ?>
	</div>
	
	<div class="input select datetime-picker">
		<?php echo $form->label('end_timeMonth', 'To'); ?>
		<?php echo $form->month('end_time'); ?>
		<?php echo $form->day('end_time'); ?>
		<?php echo $form->year('end_time', 2000, 2020); ?>
		at
		<?php echo $form->select('end_selector', $this->Util->time(), $end_selector); ?>
	</div>
	
	<?php echo $form->input('description'); ?>
	
	<div class="submit">
		<?php echo $form->button('Save Changes', array(
			'type' => 'submit',
		)); ?>
			<?php echo $form->button('Discard Changes', array(
			'type' => 'button',
			'class' => 'cancel-action enabled-javascript',
		)); ?>
	</div>
</div>