<div id="content">
		<h1>
			<?php echo $event['Event']['title']; ?>
			<?php if ($session->read('Auth.User.id') == $event['Profile']['id']): ?>
				<?php echo $html->image("/img/icon/edit-icon.png", array(
						"alt" => "Edit Event",
						'url' => array('controller' => 'events' , 'action' => 'edit' , $event['Event']['id']),
						'class' => 'right',
				)); ?>
				<?php echo $html->image("/img/icon/delete-icon.png", array(
					"alt" => "Delete Event",
					'url' => array('controller' => 'events' , 'action' => 'delete' , $event['Event']['id']),
					'class' => 'right',
				)); ?>
			<?php endif; ?>
		</h1>
		
		<h3>
			<?php echo $this->Util->date_duration($event['Event']['start_time'], $event['Event']['end_time']); ?>
			by <?php echo $event['Profile']['full_name']; ?>
		</h3>
		
		<br/>
		
		<p>
			<?php echo $event['Event']['description'];?>
		</p>
		
		<?php echo $this->Html->link('Back to the Calendar', '/calendars'); ?>
</div>