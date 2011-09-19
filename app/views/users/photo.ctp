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
		<?php debug($area['Profile']); ?>
		<?php if ($user['Profile']['area'] != $area): ?>
			<?php debug("area != area"); ?>
			<?php $user['Profile']['area'] = $area; ?>
			<?php echo "</ul>"; ?>
			<?php echo "<h1>$area</h1>"; ?>
			<?php echo "<ul>"; ?>
		<?php endforeach; ?>
		<li style="list-style-type: none; float: left; margin: 10px;">
			<a href="/staff/profile/<? echo $user['User']['id']; ?>">
				<?php echo $html->image($user['User']['image'], array('alt' => $user['User']['username'] . ' profile image', 'width' => '100'))?>
				<br/>
				<?php echo $user['User']['first_name'] . ' ' . $user['User']['last_name'] ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>