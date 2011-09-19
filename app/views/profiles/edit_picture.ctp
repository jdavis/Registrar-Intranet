
<?php	$photo_url = '/img/staff/profile' . $this->Session->read('Profile.id') . '.png'; ?>

<?php	if (!fileExistsInPath($photo_url)): ?>
<?php		$photo_url = '/img/staff/no_image.jpg'; ?>
<?php	endif; ?>
			<div id="photo-upload">
				<h1>Upload a Profile Photo</h1>
				
				<img src="<?php echo $photo_url; ?>" />

				<?php echo $this->Form->create('Profile', array(
					'type' => 'file',
					'url' => '/account/profile/picture/',
				));?>
			
				<?php echo $form->input('photo', array(
					'type'=>'file'
				)); ?>
				<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
				
				<div class="submit">
					<?php echo $form->button('Upload Photo', array(
						'type' => 'submit',
					)); ?>
						<?php echo $form->button('Cancel Upload', array(
						'type' => 'button',
						'class' => 'cancel-action enabled-javascript',
					)); ?>
				</div>
			</form>