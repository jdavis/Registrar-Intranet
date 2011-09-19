<div id="content">
	<h2 class="top">Supervisors Control Panel</h2>
	<div class="first">
	
		<h1>Current Supervisors</h1>
	<?php foreach($supervisors as $supervisor): ?>
		<h1 class="med">
			<?php echo $supervisor['Profile']['full_name'] ?>
			<a href="" class="right">edit</a>
		</h1>
		<p>	
		<?php foreach($supervisor['Supervisee'] as $supervisee): ?>
			<?php echo $this->Html->link(
				$supervisee['full_name'],
				'/payments/report/' . date('n/j/Y') . '/' . $supervisee['id'],
				array(
					'class' => 'indent med',
				)
			); ?>
		<?php endforeach; ?>
		
		<?php if (count($supervisor['Supervisee']) == 0): ?>
			<span class="indent med"><em>None</em></span>
		<?php endif; ?>
		</p>
		
	<?php endforeach; ?>
	</div>
	
	<div class="last">
		<div class="side">
			<h1 class="nonprint"><?php echo ucwords($profile['Profile']['status']); ?> Employee</h1>
			<h1 class="print"><?php echo $profile['Profile']['full_name']; ?></h1>
			<dl class="labelized med">
				<dt class="nonprint">Name:</dt>
					<dd class="nonprint"><?php echo $profile['Profile']['full_name']; ?></dd>
				<dt>University ID:</dt>
					<dd><?php echo $profile['Profile']['university_id']; ?></dd>
				<dt>Account #:</dt>
					<dd>701-14-03</dd>
				<dt>Area:</dt>
					<dd><?php echo $profile['Profile']['area']; ?></dd>
				<dt>Hourly Rate:</dt>
					<dd><?php echo ($profile['Profile']['pay_rate'] ? sprintf("$%.2f", $profile['Profile']['pay_rate']) : '$0'); ?></dd>
				<dt>Work Study:</dt>
					<dd><?php echo ($profile['Profile']['workstudy']) ? 'Yes' : 'No'; ?></dd>
				<dt>Total Hours:</dt>
					<dd><?php echo $total_hours; ?></dd>

			</dl>
		</div>
		
		<div class="side right">
			<?php echo $html->image('/img/print.png', array(
					'alt' => 'Print icon',
					'url' => 'javascript:window.print()',
				)
			);
			?>
		</div>
	</div>
	
	<br/>
	
	<table class="payPeriod print">
		<tr>
			<td>
				<strong>Employee Signature</strong>
			</td>
			<td>
				<strong>Date</strong>
			</td>
		</tr>
	</table>
	
	<table class="payPeriod print">
		<tr>
			<td>
				<strong>Supervisor Signature</strong>
			</td>
			<td>
				<strong>Date</strong>
			</td>
		</tr>
	</table>
</div>