		<header>
			<h1>Web Controls</h1>
		</header>
		
		<section class="grid-10">
			<section class="gutter">
				<h2>Pages</h2>
				<p>
					<a href="/controls/pages/add/">Add a Page</a><br />
					Create a new page to place on the Registrar webpage.
				</p>

				<p>
					<a href="/controls/pages/">View/Edit the Pages</a><br />
					Change the content, title, or URL of the existing pages or delete it.
				</p>
				<br/>
				<h2>News</h2>
				<p>
					<a href="/controls/news/add/">Add a News Item</a><br />
					Create a news page to be automatically added to the homepage as well as the News link.
				</p>
				
				<p>
					<a href="/controls/news/">View/Edit the News Items</a><br />
					Change the content, title, or URL of the existing pages or delete it.
				</p>
			</section>
		</section>
		
		<section class="grid-10">
			<section class="gutter">
				<h2>Term Info</h2>
				<p>
					<a href="/controls/terms/add_fall/">Add a Fall Term</a><br />
					Create a new page to place on the Registrar webpage.
				</p>
				
				<p>
					<a href="/controls/terms/add_spring/">Add a Spring Term</a><br />
					Create a new page to place on the Registrar webpage.
				</p>
				
				<p>
					<a href="/controls/terms/add_summer/">Add a Summer Term</a><br />
					Create a new page to place on the Registrar webpage.
				</p>
				
				<p>
					<a href="/controls/pages/">View/Edit the Existing Terms</a><br />
					Change the content, title, or URL of the existing pages or delete it.
				</p>
				<br/>
				<h2>Routing</h2>			
				<p>
					<a href="/controls/routing/">View/Edit Routing</a><br />
					View the pages that are returning 404 errors and redirect them if necessary.
				</p>
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