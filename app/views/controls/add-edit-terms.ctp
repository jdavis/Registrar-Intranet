			<h1><?php echo $form_name; ?></h1>
			<p>
				Any news added here will show up on the
				<a href="http://www.registrar.iastate.edu">Registrar</a>
				homepage. The description field is just a short summary of
				the information that will show up on the
				<a href="http://www.registrar.iastate.edu/news">News</a> page.
			</p>
			<?php echo $this->Form->create('Control', array(
				'url' => '/controls/terms/save',
			));?>
			
			<?php echo $this->Form->input('title', array(
				'size' => 40,
			)); ?>
			
			<?php echo $this->Form->input('caption', array(
				'label' => 'Description',
				'size' => 40,
				'type' => 'textarea',
				'rows' => 2,
			)); ?>
			
			<?php echo $this->Form->input('content'); ?>	
			
			<?php echo $this->Form->input('is_news', array(
				'type' => 'hidden',
				'value' => true,
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