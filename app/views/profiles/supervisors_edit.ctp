<div id="content">
	<h1>Edit the list of Supervisors</h1>
	
	<?php echo $form->create('Profile'); ?>
	<?php for($i = 0; $i < count($current_list); $i++): ?>
	<div class="input select multi-combobox">
	
		<?php if ($i == 0):
			echo $form->label('supervisor_list', 'Supervisor');
		else:
			echo $form->label('supervisor_list', '&nbsp;');
		endif; ?>
	
		<?php echo $form->select('remove_supervisor_list', $staff_list, $current_list[$i]['Profile']['id'], array(
			'class' => 'combobox',
			'name' => "data[Profile][supervisor_list][$i]",
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
	
	<div id="hidden-combobox" class="input select hidden multi-combobox">
		<?php echo $form->label('supervisor_list', '&nbsp;'); ?>
		<?php echo $form->select('supervisor_list', $staff_list, null, array(
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
			'class' => 'cancel-button enabled-javascript',
		)); ?>
	</div>
</div>