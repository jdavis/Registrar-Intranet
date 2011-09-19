<?php $quote = $this->requestAction(array('controller' => 'quotes', 'action' => 'index'));?>
<div class="quote">
	<p><?php echo $quote[0]['Quote']['content']; ?></p>
	<span>- <?php echo $quote[0]['Quote']['author']; ?></span>
</div>