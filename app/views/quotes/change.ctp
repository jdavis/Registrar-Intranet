			<h1>Change the Quote</h1>

			<?php echo $this->Form->create('Quote'); ?>
			
			<?php echo $this->Form->input('author', array(
				'size' => 40,
			)); ?>
			
			<?php echo $this->Form->input('content'); ?>	

			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
			
			<div class="submit">
				<?php echo $form->button('Save the Quote', array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button('Discard Changes', array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
			</div>