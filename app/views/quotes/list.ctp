<div class="main-window">
	<div class="content">
<?php	foreach($registrar->pagination($quotes, $page, 10) as $quote): ?>
		<div class="details">
			<p class="caption">
				<?php echo $quote['Quote']['author']; ?></a>
			</p>
			<p class="author">
				<strong>added <?php echo $registrar->pretty_datetime($quote['Quote']['created']); ?></strong>
			</p>
			<p class="description">
				<?php echo $quote['Quote']['content']; ?> 
			</p>
		</div>
<?php	endforeach; ?>

		<?php echo $registrar->pagination_links(
			$quotes,
			$page,
			10,
			10,
			"/quotes/{$this->action}/"); ?> 

	</div>
</div>