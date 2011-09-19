<?php 
$javascript->link('sorttable.js', false);
$html->css('sorttable.css', 'stylesheet', array('media'=>'all' ), false);
?>

<div id="content">
	<div class="right">
			View by: 
			<?php foreach ($views as $view):
				if ($view == $current_view)
					echo "<strong>" . $view ."</strong>\n";
				else
					echo $html->link($view, '/staff/' . strtolower($view));
			endforeach; ?>
	</div>
		
	<h1>Staff Directory</h1>

	<table class="sortable" cellpadding="0" cellspacing="0">
		<tr class="head">
			<td>
				Profile
			</td>
			<td>
				First Name
			</td>
			<td>
				Last Name
			</td>
			<td>
				Username
			</td>
			<td>
				Phone
			</td>
			<td>
				Email
			</td>
			<td>
				Area
			</td>
		</tr>
		<?php foreach ($users as $user): ?>
		<tr>
			<td>
				<? echo $html->link($user['Profile']['id'], '/staff/profile/' . $user['User']['id']) ?></b>
			</td>
			<td>
				<? echo $user['Profile']['first_name']; ?></b>
			</td>
			<td>
				<? echo $user['Profile']['last_name']; ?></b>
			</td>
			<td>
				<? echo $user['User']['username']; ?>
			</td>
			<td>
				<? echo $user['Profile']['phone']; ?>
			</td>
			<td>
				<?php echo $html->link($user['Profile']['email'], 'mailto:' . $user['Profile']['email'])?>
			</td>
			<td>
				<? echo $user['Profile']['area']; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>