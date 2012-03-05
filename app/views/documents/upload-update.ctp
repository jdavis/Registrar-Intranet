			<h1><?php echo $form_name; ?></h1>
			
			<?php echo $form->create('Document', array('type'=>'file')); ?>
			
			<?php echo $form->input('name', array(
				'size' => 40,
			)); ?>
			
			
			<?php echo $form->input('description'); ?>
			
		
			<?php echo $form->input('tags', array(
				'label' => 'Department',
				'options' => array('Forms-Employee', 'Policy-Procedures', 'Emergency'),
				'selected' => 'Forms-Employee'
				)); ?>
			
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