<div class="main-window">
	<div class="content">
			<h1>Are you sure you would like to delete the page?</h1>

			<?php echo $this->Form->create('Control', array(
				'url' => '/controls/pages/delete' . $this->data['Control']['id'],
			)); ?>
			
			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
			
				<?php echo $form->button('Yes, Delete it', array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button('Cancel the Deletion', array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
		</div>
	</div>