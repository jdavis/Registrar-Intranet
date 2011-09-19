						<h2>Registrar Web Pages</h2>
						<table class="gray grid-16"> 
							<tbody>
<?php						foreach($current_links as $value=>$key): ?>
								<tr>
									<td><?php echo $key; ?></td>
									<td><a href="/controls/pages/edit<?php echo $value; ?>">edit</a></td>
									<td><a href="/controls/pages/delete<?php echo $value; ?>">delete</a></td>
								</tr>
<?php						endforeach; ?>
							</tbody> 
						</table>