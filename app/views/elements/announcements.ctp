<div id="announcements">
	<h1>Announcements
	<?php echo $html->image("/img/icon/add-icon.png", array(
							"alt" => "Add Announcement",
							'url' => array('controller' => 'announcements' , 'action' => 'add' ,)
						)); ?>
	</h1>
	<?php $announcements = $this->requestAction(array('controller' => 'announcements', 'action' => 'active')); ?>

	<?php foreach($announcements as $ann): ?>
	
	<div class="announcement">
		<div class="title">
			<h2><?php echo $ann['Announcement']['title']; ?>
			<?php if ($session->read('Profile.id') == $ann['Announcement']['profile_id']): ?>
						<?php echo $html->image("/img/icon/delete-icon.png", array(
							"alt" => "Delete Announcement",
							'url' => array('controller' => 'announcements' , 'action' => 'delete' , $ann['Announcement']['id'])
						)); ?>
				<?php endif; ?>
				<?php if ($session->read('Profile.id') == $ann['Announcement']['profile_id']): ?>
						<?php echo $html->image("/img/icon/edit-icon.png", array(
							"alt" => "Edit Announcement",
							'url' => array('controller' => 'announcements' , 'action' => 'edit' , $ann['Announcement']['id'])
						)); ?>
				<?php endif; ?>
			</h2>
			<span>
				<?php echo $this->Time->niceShort($ann['Announcement']['created']);?> <?php echo $ann['Profile']['full_name'];?> wrote:
			</span>
		</div>
		<p>
			<?php if (strlen($ann['Announcement']['content']) < 1000): ?>
				<?php echo $ann['Announcement']['content'];?>
			<?php else: ?>
				<?php $table = strpos($ann['Announcement']['content'], "<table>"); ?>
				<?php if ($table > 0): ?>
					<?php echo substr($ann['Announcement']['content'], 0, $table);?>
					<?php echo $html->link("more", array('controller' => 'announcements', "action" => "view", $ann['Announcement']['id'])); ?>
				
				<?php else: ?>
					<?php echo $ann['Announcement']['content']; ?>
				<?php endif; ?>
			<?php endif; ?>
		</p>
	</div>
	<?php endforeach;?>
	
	<?php if (!count($announcements)): ?>
		<p class="indent"><em>There are no new announcements for today</em></p>
	<?php endif; ?>
</div>