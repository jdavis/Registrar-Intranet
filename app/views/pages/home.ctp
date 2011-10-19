<div class="main-window">
	<div class="content">
		<h2><a href="/announcements/">Announcements</a></h2>
<?php		foreach($announcements as $announcement): ?>
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
<?php			if ($announcement['Announcement']['expiration'] > date("Y-m-d H:i:s")): ?>
				<a class="button" href="/announcements/archive/<?php echo $announcement['Announcement']['id']; ?>">archive</a>
<?php			endif; ?>
			</div>
<?php 		endif; ?>
		</div>
<?php	endforeach; ?>

<?php	if (count($announcements) == 0): ?>
		<div class="details">
			<p class="caption">
				No New Announcements
			</p>
			<p class="description">
				There have been no new Announcements posted recently.
			</p>
			<p>
				Be sure to check the <a href="/announcements/archives/">archives</a> if you are looking for an old announcement.
			</p>
		</div>
<?php	endif; ?>
	</div>
	<div class="sidebar">
		<h2>Weather</h2>
		<?php echo $this->element('weather', array('cache'=>'15 min'));?>
		<h2><a href="/quotes/">Quote of the Day</a></h2>
		<?php echo $this->element('quote');?>
		<h2><a href="/words/">Word of the Day</a></h2>
		<?php echo $this->element('word');?>
<?php // Don't show the Staff of the Day just yet
	if (0): ?>
		<h2>Staff of the Day</h2>
		<?php echo $this->element('staff'); ?>
<?php endif; ?>
	</div>
</div>