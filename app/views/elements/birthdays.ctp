<?php $birthdays = $this->requestAction(array('controller' => 'users', 'action' => 'birthdaysThisMonth'));?>
<div id="birthdays" class="side">
	<h1>Birthdays</h1>
	<?php if (count($birthdays)): ?>
		<ul>
		<?php foreach ($birthdays as $person): ?>
			<li><strong><?php echo $person['Profile']['full_name']; ?></strong> -
			<?php echo date("M dS",strtotime($person['Profile']['birthday'])) ;?></li>
		<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<em>No birthdays this month!</em>
	<?php endif; ?>
</div>