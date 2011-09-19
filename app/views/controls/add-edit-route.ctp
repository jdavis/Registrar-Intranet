			<h1><?php echo $form_name; ?></h1>
			<p>
				Any redirects added here will automatically
				take the person trying to access the Address
				to the Redirect page.
			</p>
			<?php echo $this->Form->create('Control', array(
				'url' => '/controls/routing/save',
			));?>
			
			<?php echo $this->Form->input('id', array(
				'type' => 'text',
				'label' => 'Address',
				'size' => 40,
			)); ?>
			
			<?php echo $this->Form->input('redirect', array(
				'size' => 40,
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
		</form>