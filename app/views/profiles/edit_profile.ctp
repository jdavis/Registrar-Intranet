			<?php echo $this->Form->create('Profile', array(
				'url' => '/account/profile/edit/'
			));?>
		
			<h1>About You</h1>
			
			<?php echo $this->Form->input('first_name');?>
			
			<?php echo $this->Form->input('last_name');?>
			
			<?php echo $this->Form->input('email');?>
			
			<?php echo $this->Form->input('birthday');?>
			
			<h1>Work Info</h1>
		
			<?php echo $this->Form->input('status', array(
				'options' => $status
			));?>
			
			<?php echo $this->Form->input('title');?>
			
			<?php echo $this->Form->input('phone', array(
				'label' => 'Office Phone',
			));?>
			
			<?php echo $this->Form->input('area', array(
				'options' => $areas
			));?>
			
			
			<small>For consistency reasons, please place each duty on a separate line.</small><br/>
			<?php echo $this->Form->input('duties');?>
			
			<?/*php echo $this->Form->input('location', array(
				'options' => array(
					'' => '',
					'Room 10' => 'Room 10',
					'Room 10A/10B' => 'Room 10A/10B',
					'Room 10D' => 'Room 10D',
					'Room 210' => 'Room 210',
					'Room 214' => 'Room 214',
					'Room 0460 Beardshear' => 'Room 0460 Beardshear',
				),
			));*/?>
			
			<h1>Emergency Contact Info</h1>
			<small>None of the emergency contact fields are required, enter as much information as you wish.</small><br/><br/>
			
			<?php echo $this->Form->input('cell_phone', array(
				'label' => 'Cell Phone'
			));?>
			
			<?php echo $this->Form->input('home_phone', array(
				'label' => 'Home Phone'
			));?>
			
			<br/>
			<?php echo $this->Form->input('emergency_name1', array(
				'label' => 'Contact 1',
			));?>
			<?php echo $this->Form->input('emergency_phone1', array(
				'label' => 'Phone'
			));?>
			
			<br/>
			
			<?php echo $this->Form->input('emergency_name2', array(
				'label' => 'Contact 2'
			));?>
			
			<?php echo $this->Form->input('emergency_phone2', array(
				'label' => 'Phone',
			));?>

			<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
			
			<div class="submit">
				<?php echo $form->button('Save Changes', array(
					'type' => 'submit',
				)); ?>
					<?php echo $form->button('Discard Changes', array(
					'type' => 'button',
					'class' => 'cancel-action enabled-javascript',
				)); ?>
			</div>
		</form>