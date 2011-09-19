<?php				if ($action == ''): ?>
						<table class="gray grid-20"> 
							<thead>
								<tr>
									<th>URL Accessed</th>
									<th>Redirect URL</th>
									<th>Times Accessed</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
<?php						foreach($results as $result): ?>
								<tr>
									<td><a href="/controls/routing/view<?php echo $result['Control']['id']; ?>"><?php echo $result['Control']['id']; ?></a></td>
									<td><?php echo ($result['Control']['redirect'] != '') ? $result['Control']['redirect'] : '<em>None</em>'; ?></td>
									<td><?php echo $result['Control']['count']; ?></td>
									<td><a href="/controls/routing/edit<?php echo $result['Control']['id']; ?>">edit</a></td>
								</tr>
<?php						endforeach; ?>
<?php				elseif ($action == 'view'): ?>
						<h2>Detailed Referrer Info for <?php echo $id; ?></h2>
						<table class="gray grid-20"> 
							<thead>
								<tr><th>Referrer</th><th>Date Accessed</th></tr>
							</thead>
							<tbody>
<?php						foreach($results as $result): ?>
								<tr>
									<td><?php echo $result['Control']['referrer']; ?></td>
									<td><?php echo $result['Control']['created']; ?></td>
								</tr>
<?php						endforeach; ?>
<?php				elseif ($action == 'redirects'): ?>
						<table class="gray grid-20"> 
							<thead>
								<tr><th>From</th><th>To</th></tr>
							</thead>
							<tbody>
<?php						foreach($results as $result): ?>
								<tr>
									<td><?php echo $result['Control']['id']; ?></td>
									<td><?php echo $result['Control']['redirect']; ?></td>
								</tr>
<?php						endforeach; ?>
<?php				endif; ?>
							</tbody> 
						</table>