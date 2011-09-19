<div id="content">
	<h1>Add a New Calendar</h1>
	<?php echo $form->create('Calendar', array('action' => 'add')); ?>
	
	<?php echo $form->input('name', array(
		'type' => 'text',
	)); ?>

	<?php echo $form->input('color'); ?>
	
	<?php echo $form->end('Add a new Calendar'); ?>
</div>