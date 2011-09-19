<?php $quote = $this->requestAction(array('controller' => 'quotes', 'action' => 'index'));?>
<div class="side">
	<h1>
		Quote of the Day
		<?php echo $html->image("/img/icon/add-icon.png", array(
							"alt" => "Edit quote",
							'url' => array('controller' => 'quotes' , 'action' => 'change' ,)
						)); ?>
		
		<span class="updated"><? echo $this->Time->format("M d", $quote[0]['Quote']['created']); ?></span>
	</h1>
	<p><?php echo $quote[0]['Quote']['content']; ?></p>
	<h3>- <?php echo $quote[0]['Quote']['author']; ?></h3>
</div>