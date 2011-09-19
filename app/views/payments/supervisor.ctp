<div id="content">	
	<? if ($overview): ?>
	<div class="first">		
		<h1>Supervisees</h1>
		
		<table class="payPeriod">
			<tr>
				<th>Name</th>
				<th>Area</th>
			</tr>
			
			<?php foreach($employees as $employee): ?>			
			<tr>
				<td>
					<strong><?php echo $employee['Profile']['full_name']; ?></strong>
				</td>
				<td>
					<?php echo $employee['Profile']['area']; ?>
				</td>
				<td class="nonprint">
					<a href="/payments/supervisor/<?php echo $employee['Profile']['id']; ?>">view</a>
				</td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</div>
	
	<div class="last">
		<h1>Add Employee</h1>
		<p>there'll be some stuff here, I promise</p>
	</div>
	<? else: ?>
	<div class="first">		
		<h1>Employee Summary</h1>
		
			<dl class="med">
				<dt>Name:</dt>
					<dd><?php echo $employee['Profile']['full_name']; ?></dd>
				<dt>University ID:</dt>
					<dd><?php echo $employee['Profile']['university_id']; ?></dd>
				<dt>Area:</dt>
					<dd><?php echo $employee['Profile']['area']; ?></dd>
				<dt>Hourly Rate:</dt>
					<dd><?php echo ($employee['Profile']['pay_rate'] ? sprintf("$%.2f", $employee['Profile']['pay_rate']) : '$0'); ?></dd>
				<dt>Work Study:</dt>
					<dd><?php echo ($employee['Profile']['workstudy']) ? 'Yes' : 'No'; ?></dd>
			</dl>
		
		<br/>
		<h1>Work Summary</h1>
		
			<dl class="med">
				<dt>:</dt>
					<dd><?php echo $employee['Profile']['full_name']; ?></dd>
				<dt>University ID:</dt>
					<dd><?php echo $employee['Profile']['university_id']; ?></dd>
				<dt>Area:</dt>
					<dd><?php echo $employee['Profile']['area']; ?></dd>
				<dt>Hourly Rate:</dt>
					<dd><?php echo ($employee['Profile']['pay_rate'] ? sprintf("$%.2f", $employee['Profile']['pay_rate']) : '$0'); ?></dd>
				<dt>Work Study:</dt>
					<dd><?php echo ($employee['Profile']['workstudy']) ? 'Yes' : 'No'; ?></dd>
			</dl>
	</div>
	
	<div class="last">
		<h1>Recent Pay Periods</h1>
		<table class="payPeriod">
			<tr>
				<th colspan="3" class="left-align">Last Month</th>
			</tr>
			<tr>
				<td class="blank"></td>
				<td>Nov 1st - Nov 15th</td>
				<td>view</td>
			</tr>
			<tr>
				<td class="blank"></td>
				<td>Nov 16th - Nov 30th</td>
				<td>view</td>
			</tr>
		</table>
		
		<table class="payPeriod">
			<tr>
				<th colspan="3" class="left-align">This Month</th>
			</tr>
			<tr>
				<td class="blank"></td>
				<td>Dec 1st - Dec 15th</td>
				<td>view</td>
			</tr>
			<tr>
				<td class="blank"></td>
				<td>Dec 16th - Dec 31st</td>
				<td>view</td>
			</tr>
		</table>
		
		<table class="payPeriod">
			<tr>
				<th colspan="3" class="left-align">Next Month</th>
			</tr>
			<tr>
				<td class="blank"></td>
				<td>Jan 1st - Jan 15th</td>
				<td>view</td>
			</tr>
			<tr>
				<td class="blank"></td>
				<td>Jan 16th - Jan 31st</td>
				<td>view</td>
			</tr>
		</table>
		<a href="" class="right">this year</a>
	</div>
	<? endif; ?>
</div>