<?php
	$area = "";
?>
<div id="content">
	<div class="right">
			View by:
			<?php foreach ($views as $view):
				if ($view == $current_view)
					echo "<strong>" . $view ."</strong>\n";
				else
					echo $html->link($view, '/staff/' . strtolower($view)) . "\n";
			endforeach; ?>
	</div>
		
	<h1>Staff Directory</h1>

		
	<p>
		To change the view of the listing, choose an option at the right.
	</p>
	<ul>
	<?php foreach ($users as $user): ?>
		<?php $photo_path = '/img/staff/profile' . $user['User']['id'] . '.png'; ?>
		<?php if ($user['Profile']['area'] != $area): ?>
			<?php $area = $user['Profile']['area']; ?>
			<?php echo "</ul>"; ?>
			<?php echo "<h1>$area</h1>"; ?>
			<?php echo "<ul>"; ?>
		<?php endif; ?>
		<li class="left indent">
			<a href="/staff/profile/<? echo $user['User']['id']; ?>">
			<?php if (fileExistsInPath($photo_path)) {
				echo $html->image($photo_path, array('alt' => $user['User']['id']));
				}
			else {
				echo $html->image('/img/staff/no_image.jpg', array(
				'alt' => 'no profile image',
			));
			} ?>
			<br />
			<?php echo $user['Profile']['first_name']. ' ' . $user['Profile']['last_name'];?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>