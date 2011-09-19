		<header>
			<h1>Control Panel</h1>
		</header>
		
		<section class="grid-8">
			<h2>Profile</h2>
			<section class="gutter">
				<ul>
					<li><a href="/account/profile/">View your Profile</a></li>
					<li><a href="/account/profile/edit/">Edit your Profile</a></li>
				</ul>
			</section>
			
			<h2>Account</h2>
			<section class="gutter">
				<ul>
					<li><a href="/account/settings/">Edit your Settings</a></li>
					<li><a href="/account/logout/">Log Out</a></li>
				</ul>
			</section>
		</section>
		
		<section class="grid-8">
<?php	if ($session->read('Profile.auth_level') >= 3 && 0): ?>
			<h2>Admin</h2>
			<section class="gutter">
				<ul>
					<li><a href="/admin/">Go to the Admin Control Panel</a></li>
				</ul>
			</section>
<?php 	endif; ?>		
<?php	if ($session->read('Profile.auth_level') >= 1 && 0): ?>	
			<h2>Supervisor</h2>
			<section class="gutter">
				<ul>
					<li><a href="/supervisor/">Go to the Supervisor Control Panel</a></li>
				</ul>
			</section>
<?php	endif; ?>
		</section>