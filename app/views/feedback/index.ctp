			<?php echo $this->Form->create('Feedback', array(
				'url' => '/feedback/',
			));?>
		
			<h1>Your Feedback</h1>
			
			<p>
				Please feel free to send us any comments that you have while using the Intranet.				
			</p>
			
			<?php echo $this->Form->input('comments', array(
				'type' => 'textarea',
			));?>


			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
			
			<div class="submit">
				<?php echo $form->button('Send Feedback', array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button('Discard Feedback', array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
			</div>
		</form>