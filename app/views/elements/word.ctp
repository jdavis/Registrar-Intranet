<?php $word = $this->requestAction(array('controller' => 'words', 'action' => 'index'));?>
<div class="word">
	<p><em><?php echo $word[0]['Word']['word']; ?></em> - <?php echo $word[0]['Word']['definition']; ?></p>
</div>