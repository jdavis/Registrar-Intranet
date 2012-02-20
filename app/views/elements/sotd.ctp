
<?php # Staff of the Day Element ?>
<?php $staff_of_the_day = $this->requestAction(array('controller' => 'events', 'action' => 'staff_of_the_day')); ?>

<?php if (0): ?>
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
<?php else: ?>
<div class="side">
		<ul>
			<li><strong>Monday</strong> - Judy and Diane</li>
			<li><strong>Tuesday</strong>  - Laura and Jonathon</li>
			<li><strong>Wednesday</strong>  - Deanna</li>
			<li><strong>Thursday</strong>  - Karen and Char</li>
			<li><strong>Friday</strong>  - Denise</li>
		</ul>
</div>
<?php endif; ?>