<div class="main-window">
	<div class="content">
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