			<?php echo $this->Form->create('Control', array(
				'url' => '/controls/terms/save/',
				'inputDefaults' => array(
					'date' => array(
						'dateFormat' => 'MD',
					),
				),
			));?>
		
			<h1><?php echo $form_name; ?></h1>
			
			<?php echo $this->Form->input('year', array(
				'options' => $years,
			));?>
			
			<h1>General Term Dates</h1>
			
			<?php echo $this->Form->input('start_date', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<?php echo $this->Form->input('end_date', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<?php echo $this->Form->input('midterm', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<?php echo $this->Form->input('commencement', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<h1>University Holidays</h1>
		
			<?php echo $this->Form->input('labor_day', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<?php echo $this->Form->input('thanksgiving', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<h1>Student Dates</h1>
		
			<?php echo $this->Form->input('labor_day', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>
			
			<?php echo $this->Form->input('thanksgiving', array(
				'dateFormat' => 'MD',
				'type' => 'date',
			));?>

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
		</form>