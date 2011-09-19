<div id="content">
	<?php echo $this->Form->create('Control');?>
	
	<?php echo $this->Form->input('navigation_id', array(
		'options' => $options
	));?>

	<?php echo $this->Form->end('Delete Navigation');?>
</div>