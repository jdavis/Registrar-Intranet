<?php $word = $this->requestAction(array('controller' => 'words', 'action' => 'index'));?>
<div class="side">
	<h1>
		Word of the Day
		<?php echo $html->image("/img/icon/add-icon.png", array(
							"alt" => "Edit word",
							'url' => array('controller' => 'words' , 'action' => 'change' ,)
						)); ?>
		<span class="updated"><? echo $this->Time->format("M d", $word[0]['Word']['created']); ?></span>
	</h1>
	<p><em><?php echo $word[0]['Word']['word']; ?></em> - <?php echo $word[0]['Word']['definition']; ?></p>
</div>