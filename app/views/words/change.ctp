			<h1>Change the Word</h1>

			<?php echo $this->Form->create('Word'); ?>
			
			<?php echo $this->Form->input('word', array(
				'size' => 40,
			)); ?>
			
			<?php echo $this->Form->input('definition'); ?>	

			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
			
			<div class="submit">
				<?php echo $form->button('Save the Word', array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button('Discard Changes', array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
			</div>