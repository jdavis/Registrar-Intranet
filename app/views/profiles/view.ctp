
		<header class="gutter">
			<h1><?php echo $profile['Profile']['full_name']; ?></h1>
		</header>
		<section class="grid-6">
			<section class="gutter">
				<figure>
					<?php echo $this->Profile->image($profile); ?>
				</figure>
			</section>
		</section>
		
		<section class="grid-10">
			<h2>Registrar Info</h2>
			<section class="gutter">
				<dl>
					<dt><strong>Title:</strong></dt>
						<dd><?php echo $profile['Profile']['title']; ?></dd>
					<dt><strong>Area:</strong></dt>
						<dd><?php echo $profile['Profile']['area']; ?></dd>
					<dt><strong>Employee Status:</strong></dt>
						<dd><?php echo $this->Profile->status($profile); ?></dd>
					<dt><strong>Email:</strong></dt>
						<dd><a href="mailto:<?php echo $profile['Profile']['email']; ?>"><?php echo $profile['Profile']['email']; ?></a></dd>
				</dl>
			</section>
			
			<h2>Departmental Duties</h2>
			<section class="gutter">
				<ul>
<?php			foreach($this->Profile->duties($profile) as $duty): ?>
					<li><?php echo $duty; ?></li>
<?php			endforeach; ?>
				</ul>
			</section>
		</section>
		
		<section class="grid-7">
			<h2>Personal Info</h2>
			<section class="gutter">
				<dl>
					<dt><strong>Birthday:</strong></dt>
						<dd><?php echo $profile['Profile']['birthday']; ?></dd>
					<dt><strong>Cell Phone:</strong></dt>
						<dd><?php echo $profile['Profile']['cell_phone']; ?></dd>
					<dt><strong>Home Phone:</strong></dt>
						<dd><?php echo $profile['Profile']['home_phone']; ?></dd>
				</dl>
			</section>
		</section>
		
		<section class="grid-7">
			<h2><a href="" id="emergency-show">Emergency Contacts</a></h2>
			<section id="emergency-contacts" class="gutter">
				<dl>
					<dt><strong>Contact Name 1:</strong></dt>
						<dd><?php echo $profile['Profile']['emergency_name1']; ?></dd>
					<dt><strong>Contact Phone 1:</strong></dt>
						<dd><?php echo $profile['Profile']['emergency_phone1']; ?></dd>
					<br/>
					<dt><strong>Contact Name 2:</strong></dt>
						<dd><?php echo $profile['Profile']['emergency_name2']; ?></dd>
					<dt><strong>Contact Phone 2:</strong></dt>
						<dd><?php echo $profile['Profile']['emergency_phone2']; ?></dd>
				</dl>
			</section>
		</section>
