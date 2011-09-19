<div id="content">
	<div class="first">
		<h1>Employee Payments</h1>

		<p>
			<a href="/payments/report">View your pay period</a><br />
			To edit or view your current pay period information.
		</p>
		
		<p>
			<a href="/settings/payment">Edit Payment Information</a><br />
			Edit your payment information so you can get your paychecks!
		</p>
	</div>
	
<?php if ($isSupervisor): ?>
	<div class="last">
		<h1>Supervisor Controls</h1>
		<p>
			<a href="/payments/supervisor">View and edit your supervisee list</a><br />
			View and edit your supervisee payrole
		</p>
	</div>
<?php endif; ?>
</div>