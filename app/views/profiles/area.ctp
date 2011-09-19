<?php	$last_area = ''; ?>
<?php	foreach($profiles as $index=>$profile): ?>
<?php		if ($last_area != $profile['Profile']['area']): ?>
<?php			$last_area = $profile['Profile']['area']; ?>

<?php			if ($index != 0): ?>
				</tbody> 
			</table>
<?php			endif; ?>
			
			<section class="grid-20">
				<h3>
					<?php echo $last_area; ?>
				</h3>
			<table class="gray grid-20"> 
				<tbody>
					<tr><th>Name</th><th>Email</th><th>Area</th></tr>
<?php		endif; ?>
					<tr>
						<td><a href="/profiles/view/<?php echo $profile['Profile']['id']; ?>"><?php echo $profile['Profile']['full_name']; ?></a></td>
						<td><?php echo $profile['Profile']['email']; ?></td>
						<td><?php echo $profile['Profile']['area']; ?></td>
					</tr>
			
<?php			if ($index == count($profiles) - 1): ?>
					</tbody> 
				</table>
<?php			endif; ?>
<?php	endforeach; ?>