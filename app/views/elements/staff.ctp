
<?php # Staff of the Day Element ?>
<?php $staff_of_the_day = $this->requestAction(array('controller' => 'events', 'action' => 'staff_of_the_day')); ?>

<div class="side">
	<p>
		<dl class="labelized">
		<?php foreach($this->Util->week_days() as $day): ?>
			<dt><?php echo $day; ?>:</dt>
			<?php if (isset($staff_of_the_day[$day])): ?>
				<dd>
				<?php foreach($staff_of_the_day[$day] as $staff): ?>
					<?php echo $staff; ?><br/>
				<?php endforeach; ?>
				</dd>
				<?php else: ?>
					<dd>None</dd>
				<?php endif; ?>
		<?php endforeach; ?>
		</dl>
	</p>
</div>