			<h1><?php echo $form_name; ?></h1>
			
			<?php echo $this->Form->create('Control', array(
				'url' => '/controls/pages/preview',
			));?>
			
			<?php echo $this->Form->input('id', array(
				'type' => 'hidden',
			));?>
			
			<?php echo $this->Form->input('parent_id', array(
				'options' => $current_links,
			));?>
			
			<?php echo $this->Form->input('title', array(
			));?>
			
			<?php echo $this->Form->input('url', array(
				'type' => 'text',
			));?>
			
			<?php echo $this->Form->input('content', array(
				'type' => 'textarea',
			)); ?>
			
			<?php echo $this->Form->input('left_column', array(
				'type' => 'textarea',
			)); ?>
			
			<?php echo $this->Form->input('is_page', array(
				'type' => 'hidden',
				'value' => true,
			)); ?>
			
			<?php echo $this->Form->input('right_column', array(
				'type' => 'textarea',
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