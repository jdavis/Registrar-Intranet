<?php #debug($current_list); ?>
<div id="content">
	<h1>Edit Staff of the Day</h1>
	
	<?php echo $form->create('Event'); ?>
	
	<div class="input select date-picker">
		<?php echo $form->label('start_timeMonth', 'Date'); ?>
		<?php echo $form->month('start_time', $month); ?>
		<?php echo $form->day('start_time', $day); ?>
		<?php echo $form->year('start_time', 2000, 2020, $year); ?>

	</div>
	
<?php for($i = 0; $i < count($current_list); $i++): ?>
	<div class="input select multi-combobox">
	
		<?php if ($i == 0):
			echo $form->label('staff_list', 'Staff');
		else:
			echo $form->label('staff_list', '&nbsp;');
		endif; ?>
	
		<?php echo $form->select('staff_list', $staff_list, $current_list[$i]['Profile']['id'], array(
			'class' => 'combobox',
			'name' => "data[Event][staff_list][$i]",
		)); ?>
		
		<?php if ($i == 0):
			echo $form->button('+', array(
				'type' => 'button',
				'class' => 'add-button',
			)); 
		else:
			echo $form->button('-', array(
				'type' => 'button',
				'class' => 'remove-button',
			)); 
		endif; ?>
	</div>
<?php endfor; ?>

<?php if (count($current_list) == 0): ?>
	<div class="input select multi-combobox">
		<?php echo $form->label('staff_list', 'Staff'); ?>
		<?php echo $form->select('staff_list', $staff_list, null, array(
			'class' => 'combobox',
			'name' => 'data[Event][staff_list][0]',
		)); ?>
		<?php echo $form->button('+', array(
			'type' => 'button',
			'class' => 'add-button',
		)); ?>
	</div>
<?php endif; ?>
	
	<div id="hidden-staff" class="input select hidden multi-combobox">
		<?php echo $form->label('staff_list', '&nbsp;'); ?>
		<?php echo $form->select('staff_list', $staff_list, null, array(
			'name' => '',
		)); ?>
		<?php echo $form->button('-', array(
			'type' => 'button',
			'class' => 'remove-button',
		)); ?>
	</div>
	
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