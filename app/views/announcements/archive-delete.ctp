<div class="main-window">
	<div class="content">
			<h1><?php echo $form_name; ?></h1>
			<div class="details">
				<p class="caption">
					<a href="/announcements/view/<?php echo $announcement['Announcement']['id']; ?>"><?php echo $announcement['Announcement']['title']; ?></a>
				</p>
				<p class="author">
					<strong>June 1st at 1:37, <a href=""><?php echo $announcement['Profile']['full_name']; ?></a> wrote:</strong>
				</p>
				<p class="description">
					<?php echo $announcement['Announcement']['content']; ?> 
				</p>
			</div>

			<?php echo $this->Form->create('Announcement'); ?>
			
			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
			
				<?php echo $form->button($form_save, array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button($form_close, array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
		</div>
	</div>