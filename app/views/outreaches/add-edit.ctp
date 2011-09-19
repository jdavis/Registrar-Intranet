			<h1><?php echo $form_name; ?></h1>
			
			<?php echo $form->create('Outreach'); ?>
				
				<?php echo $form->input('start_date', array(
					'timeFormat' => 'none',
					'label' => 'From',
				)); ?>
				
				<?php echo $form->input('end_date', array(
					'timeFormat' => 'none',
					'label' => 'To',
				)); ?>
				
				<?php echo $form->input('activity'); ?>
				
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