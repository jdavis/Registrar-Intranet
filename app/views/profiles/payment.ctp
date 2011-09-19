	<div id="content">
		
		<?php echo $this->Form->create("Profile", array(
			'action' => 'payment',
		)); ?>
		<h1>Payment Information</h1>
		
		<?php echo $this->Form->input('university_id', array(
			'type' => 'text',
			'size' => '9',
			'label' => 'University ID',
		)); ?>
		
		<?php echo $this->Form->input('status', array(
			'type' => 'select',
			'options' => array(
				'-' => '-',
				'student' => 'Student',
				'full-time' => 'Full Time',
				'part-time' => 'Part-time'
			),
		)); ?>
		
		<?php echo $this->Form->input('workstudy', array(
			'label' => 'Are you Workstudy?',
			'options' => array(
				0 => 'No',
				1 => 'Yes',
			),
		)); ?>
				
		<?php echo $this->Form->input('pay_rate', array(
			'size' => '3',
			'value' => ($this->data['Profile']['pay_rate'] ? sprintf("$%.2f", $this->data['Profile']['pay_rate']) : '$0'),
		)); ?>
		
		<?php echo $this->Form->end('Save Information'); ?>
	</div>