<header>
	<nav id="nav">
		<div class="nav-logo">
			<img src="imgsay/favicon.png" alt="logo" />
		</div>
		<ul>
			<li><a href="dashboard">Dashboard</a></li>
			<li><a href="about">About Us</a></li>
			<li><a href="list_of_businesses">Businesses</a></li>
			<li><a href="list_of_my_businesses">My Businesses</a></li>
			<li><a href="profile">Profile</a></li>
			<li>
				
				<?php
				echo form_open('logout/logout');
				echo form_submit('logout_submit', 'Logout');
				echo form_close();
				?>

			</li>
		</ul>
	</nav>
</header>