<div class="main-window">
	<div class="content">
	<h4>Documents loaded/deleted from this page are copies of the original. Documents must be reloaded if updated.</h4>
<?php	foreach($documents as $document): ?>
		<div class="details">
			<p class="caption">
				<?php echo $document['Document']['name']; ?></a>
			</p>
			<p class="author">
				<strong>Last updated <?php echo $registrar->pretty_datetime($document['Document']['modified']); ?></strong>
			</p>
			<p class="description">
				<?php echo $document['Document']['description']; ?> 
			</p>
			<div class="link-controls">
				<strong><?php if($document['Document']['tags'] == 0){
						echo "Forms-Employees";
						}else if($document['Document']['tags'] == 1){
						echo "Policy-Procedure";
						}else if($document['Document']['tags'] == 2){
						echo "Emergency";
						};?></strong>
				<a class="button" href="/documents/download/<?php echo $document['Document']['id']; ?>">download</a>
				<a class="button" href="/documents/delete/<?php echo $document['Document']['id']; ?>">delete</a>				
				<?php /*<a class="button" href="/documents/update/<?php echo $document['Document']['id']; ?>">update</a> */ ?>
			</div>
		</div>
<?php	endforeach; ?>
<?php	if (count($documents) == 0): ?>
		<div class="details">
			<p class="caption">
				No Documents Found
			</p>
			<p class="description">
				There are no Documents labeled under <?php echo $tag; ?> Department(s).
			</p>
		</div>
<?php	endif; ?>
	</div>
</div>