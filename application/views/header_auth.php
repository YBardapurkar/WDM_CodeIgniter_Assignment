<header>
	<nav id="nav">
		<div class="nav-logo">
			<img src="imgsay/favicon.png" alt="logo" />
		</div>
		<ul>
			<li>
				<?php echo anchor('dashboard', 'Dashboard'); ?>
			</li>
			<li>
				<?php echo anchor('about', 'About Us'); ?>
			</li>
			<li>
				<?php echo anchor('list_of_events', 'List of Events'); ?>
			</li>
			<li>
				<?php echo anchor('list_of_my_events', 'List of My Events'); ?>
			</li>
			<li>
				<?php echo anchor('profile', 'Profile'); ?>
			</li>
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