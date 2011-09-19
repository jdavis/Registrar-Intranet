<div class="main-window">
	<div class="content">
<?php	foreach($registrar->pagination($words, $page, 10) as $word): ?>
		<div class="details">
			<p class="caption">
				<?php echo $word['Word']['word']; ?></a>
			</p>
			<p class="author">
				<strong>added <?php echo $registrar->pretty_datetime($word['Word']['created']); ?></strong>
			</p>
			<p class="description">
				<?php echo $word['Word']['definition']; ?> 
			</p>
		</div>
<?php	endforeach; ?>

		<?php echo $registrar->pagination_links(
			$words,
			$page,
			10,
			10,
			"/words/{$this->action}/"); ?> 

	</div>
</div>