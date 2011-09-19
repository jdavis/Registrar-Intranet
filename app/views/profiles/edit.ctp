<div id="content">
	
	<?php echo $this->Form->create('Profile',
		array(
			'action' => 'edit',
			'inputDefaults' => array(
			),
	));?>
	
		<h1>Profile Information</h1>
		
		<?php echo $this->Form->input('first_name');?>
		
		<?php echo $this->Form->input('last_name');?>
		
		<?php echo $this->Form->input('area', array(
			'options' => array(
				'' => '',
				'Athletics' => 'Athletics',
				'Certifications' => 'Certifications',
				'Communications' => 'Communications',
				'Degree Audits' => 'Degree Audits',
				'Fees' => 'Fees',
				'Graduation' => 'Graduation',
				'IT Staff' => 'IT Staff',
				'Records' => 'Records',
				'Registrar' => 'Registrar',
				'Residency' => 'Residency',
				'Scheduling' => 'Scheduling',
				'Transcripts' => 'Transcripts',
			),
		));?>
		
		<?php echo $this->Form->input('title');?>
		
		<?/*php echo $this->Form->input('location', array(
			'options' => array(
				'' => '',
				'Room 10' => 'Room 10',
				'Room 10A/10B' => 'Room 10A/10B',
				'Room 10D' => 'Room 10D',
				'Room 210' => 'Room 210',
				'Room 214' => 'Room 214',
				'Room 0460 Beardshear' => 'Room 0460 Beardshear',
			),
		));*/?>
		
		<?php echo $this->Form->input('email');?>
		
		<?php echo $this->Form->input('phone', array(
			'label' => 'Office Phone',
		));?>
		
		<?php echo $this->Form->input('birthday', array(
			'type' => 'text',
			'class' => 'month-day-picker',
			'value' => $this->data['Profile']['birthday'],
		));?>
		
		<br/><br/>
		<h1>Emergency Contact Info</h1>
		<small>None of the emergency contact fields are required, enter as much information as you wish.</small>
		<br/><br/>
		<?php echo $this->Form->input('cell_phone', array(
			'label' => 'Cell Phone'
		));?>
		
		<?php echo $this->Form->input('home_phone', array(
			'label' => 'Home Phone'
		));?>
		
		<br/>
		<?php echo $this->Form->input('EmergencyContact.0.id', array(
			'type' => 'hidden',
		));?>
		<?php echo $this->Form->input('EmergencyContact.0.name', array(
			'label' => 'Contact 1'
		));?>
		
		<?php echo $this->Form->input('EmergencyContact.0.phone', array(
			'label' => 'Phone'
		));?>
		
		<br/>
		<?php echo $this->Form->input('EmergencyContact.1.id', array(
			'type' => 'hidden',
		));?>
		<?php echo $this->Form->input('EmergencyContact.1.name', array(
			'label' => 'Contact 2'
		));?>
		
		<?php echo $this->Form->input('EmergencyContact.1.phone', array(
			'label' => 'Phone'
		));?>

		<?php echo $this->Form->end('Save Settings');?>
</div>