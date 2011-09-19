<?php #debug($payments);?>
<?php #debug($profile);?>
<?php
	$start_day = date('j', $current_pay_period['begin']);
	$end_day = date('j', $current_pay_period['end']);
	$total_hours = 0.0;
?>

<div id="content">
	<h2 class="top">
		<?php echo $html->link('<<<', "/payments/report/" . date("m/j/Y", $previous_pay_period['begin']),
			array(
				'class' => 'left nonprint',
		)); ?>
		<?php echo date('M jS, Y', $current_pay_period['begin']); ?> to <?php echo date('M jS, Y', $current_pay_period['end']); ?>
		
		<?php echo $html->link('>>>', "/payments/report/" . date("m/j/Y", $next_pay_period['begin']),
		array(
			'style' => 'float:right',
			'class' => 'nonprint',
		)); ?> 
	</h2>
	<div class="first">
	
		<h1>Hourly Payroll</h1>		
		<table class="payPeriod">
			<tr>
				<th>Day</th>
				<th>Date</th>
				<th>Hours</th>
			</tr>
			
			<?php for($f = $start_day; $f <= $end_day; $f++): ?>			
			<tr>
				<?php
					$day_hours = 0.0;
					
					foreach($payments[$f - 1] as $payment):
						$day_hours += $payment['Payment']['hours'];
					endforeach;
					
					$total_hours += $day_hours;
				?>
				
				<td><?php echo date("l", mktime(0, 0, 0, $month, $f)); ?></td>
				<td>
					<strong><?php echo date("F j", mktime(0, 0, 0, $month, $f)); ?></strong>
				</td>
				<td><?php echo ($day_hours - round($day_hours, 0) != 0) ? sprintf("%.1f", round($day_hours, 1)) : $day_hours; ?></td>
				<td class="nonprint"><a href="<?php echo "/payments/edit/$month/$f/$year"?>">edit</a></td>
			</tr>
			<?php endfor; ?>
			<tr>
				<td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</div>
	
	<div class="last">
		<div class="side">
			<h1 class="nonprint">
				<?php echo ucwords($profile['Profile']['status']); ?> Employee
				<?php echo $this->Html->link(
					'edit',
					'/settings/payment/' . $profile['Profile']['id'],
					array(
						'class' => 'small right',
					)
				); ?>
			</h1>
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