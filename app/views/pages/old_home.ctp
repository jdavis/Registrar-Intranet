
<div id="content-left-wrapper">
	<div id="content-left">
		<?php echo $this->element('announcements');?>
		
	</div>
</div>
<div id="content-right">
	<div id="sidebar">
		<?php #echo $this->element('staff');?>
		
		<h1>Weather</h1>
		<?php echo $this->element('weather', array('cache' => '+15 min',));?>
	
		<?php echo $this->element('quotes_old');?>
		
		<?php echo $this->element('words_old');?>
		
		<?php echo $this->element('birthdays');?>
		
		<?php echo $this->element('sotd');?>

	</div>
</div>