			<h1><?php echo $form_name; ?></h1>
			
			<?php echo $form->create('Event'); ?>
			
			<?php echo $form->input('title'); ?>
			
			<?php echo $form->input('calendar_id', array(
				'options' => $calendar_options,
				'default' => 2,
				'after' => ' <b class="indent">All day</b> ' . $form->checkbox('all_day', array('value' => 1)),
			)); ?>
			
			<?php echo $form->input('start_time', array(
				'timeFormat' => 'none',
				'label' => 'From',
				'class' => 'datetime-picker',
				'after' => $form->input('start_selector', array(
								'label' => false,
								'div' => false,
								'before' => 'at ',
								'options' => $this->Util->time(),
								'default' => '08:00:00',
							)),
			)); ?>
			
			<?php echo $form->input('end_time', array(
				'timeFormat' => 'none',
				'label' => 'To',
				'class' => 'datetime-picker',
				'after' => $form->input('end_selector', array(
								'label' => false,
								'div' => false,
								'before' => 'at ',
								'options' => $this->Util->time(),
								'default' => '17:00:00',
							)),
			)); ?>
			
			<?php echo $form->input('description'); ?>
			
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