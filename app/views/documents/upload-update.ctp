			<h1><?php echo $form_name; ?></h1>
			
			<?php echo $form->create('Document', array('type'=>'file')); ?>
			
			<?php echo $form->input('name', array(
				'size' => 40,
			)); ?>
			
			<?php echo $form->input('year', array(
				'label' => 'Calender Year',
				'options' => $school_years,
				'selected' => '2012-2013',
			)); ?>
			
			<?php echo $form->input('description'); ?>
			
		
			<?php #Enable once working on forms filter
				/* echo $form->input('tag', array(
				'label' => 'Department',
				'options' => array('Forms-Employee', 'Procedures', 'Policies', 'Emergency'),
				'selected' => 'Forms-Employee'
				)); */?>
			
			<?php echo $form->input('file', array(
				'type'=>'file'
			)); ?>
			
			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />

			<div class="submit">
				<?php echo $form->button($form_save, array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button($form_close, array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
			</div>