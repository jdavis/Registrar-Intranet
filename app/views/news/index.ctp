<div id="content">
<h1>News</h1>
<?php
	foreach ($feed['Rss']['Channel']['Item'] as $item):
		echo $item['description'];
	endforeach;
?>
</div>