<div class="main-window">
	<div class="content">
<?php	foreach($registrar->pagination($announcements, $page, 5) as $announcement): ?>
		<div class="details">
			<p class="caption">
				<a href="/announcements/view/<?php echo $announcement['Announcement']['id']; ?>"><?php echo $announcement['Announcement']['title']; ?></a>
			</p>
			<p class="author">
				<strong><?php echo $registrar->pretty_datetime($announcement['Announcement']['created']); ?>, <a href=""><?php echo $announcement['Profile']['full_name']; ?></a> wrote:</strong>
			</p>
			<p class="description">
				<?php echo $announcement['Announcement']['content']; ?> 
			</p>
<?php		if ($announcement['Profile']['id'] == $session->read('Profile.id')): ?>
			<div class="link-controls">
				<a class="button" href="/announcements/edit/<?php echo $announcement['Announcement']['id']; ?>">edit</a>
				<a class="button" href="/announcements/delete/<?php echo $announcement['Announcement']['id']; ?>">delete</a>
<?php			if ($announcement['Announcement']['expiration'] > date("Y-m-d H:i:s")): ?>
				<a class="button" href="/announcements/archive/<?php echo $announcement['Announcement']['id']; ?>">archive</a>
<?php			endif; ?>
			</div>
<?php 		endif; ?>
		</div>
<?php	endforeach; ?>

<?php	if (count($announcements) == 0): ?>
<?php		if ($this->action == 'index'): ?>
<?php			$title = 'No New Announcements'; ?>
<?php			$message = 'There have been no new Announcements posted in the last five days.'; ?>
<?php			$link = 'Be sure to check the <a href="/announcements/active/">active announcements</a> or <a href="/announcements/archives/">archives</a> if you are looking for an old announcement.'; ?>
<?php		else: ?>
<?php			$title = 'No Active Announcements'; ?>
<?php			$message = 'There are no active Announcements at this time.'; ?>
<?php			$link = 'Be sure to check the <a href="/announcements/archives/">archives</a> if you are looking for an old announcement.'; ?>
<?php		endif; ?>
		<div class="details">
			<p class="caption">
				<?php echo $title; ?>
			</p>
			<p class="description">
				<?php echo $message; ?> 
			</p>
			<p>
				<?php echo $link; ?> 
			</p>
		</div>
<?php	endif; ?>

		<?php echo $registrar->pagination_links(
			$announcements,
			$page,
			5,
			10,
			"/announcements/{$this->action}/"); ?> 

	</div>
</div>