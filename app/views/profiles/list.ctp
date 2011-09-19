						<table class="gray grid-20"> 
							<tbody>
								<tr><th>Name</th><th>Email</th><th>Area</th></tr>
<?php						foreach($profiles as $profile): ?>
								<tr>
									<td><a href="/profiles/view/<?php echo $profile['Profile']['id']; ?>"><?php echo $profile['Profile']['full_name']; ?></a></td>
									<td><?php echo $profile['Profile']['email']; ?></td>
									<td><?php echo $profile['Profile']['area']; ?></td>
								</tr>
<?php						endforeach; ?>
							</tbody> 
						</table>