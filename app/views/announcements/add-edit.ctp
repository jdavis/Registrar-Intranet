			<h1><?php echo $form_name; ?></h1>

			<?php echo $this->Form->create('Announcement'); ?>
			
			<?php echo $this->Form->input('title', array(
				'size' => 40,
			)); ?>
			
			<?php echo $this->Form->input('content', array(
				'class' => 'wysiwyg',
			)); ?>	

<?php	if ($this->action == 'add'): ?>
			<?php echo $this->Form->input('expiration', array(
				'label' => 'Keep Active for',
				'options' => $options,
			)); ?>

			<?php echo $form->input('expiration', array(
				'timeFormat' => 'none',
				'label' => '&nbsp;',
				'class' => 'datetime-picker expiration-custom',
				'after' => $form->input('expiration_time', array(
								'label' => false,
								'div' => false,
								'class' => 'expiration-custom',
								'before' => 'at ',
								'options' => $this->Util->time(),
								'default' => '08:00:00',
							)),
			)); ?>
<?php	else: ?>
			<?php echo $form->input('expiration', array(
				'timeFormat' => 'none',
				'label' => 'Keep until',
				'class' => 'datetime-picker',
				'after' => $form->input('expiration_time', array(
								'label' => false,
								'div' => false,
								'class' => 'expiration-custom',
								'before' => 'at ',
								'options' => $this->Util->time(),
								'default' => '08:00:00',
							)),
			)); ?>
<?php	endif; ?>

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