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
				<?php echo anchor('events', 'List of Events'); ?>
			</li>
			<li>
				<?php echo anchor('events/my', 'List of My Events'); ?>
			</li>
			<li>
				<?php echo anchor('profile', 'Profile'); ?>
			</li>
			<li>

				<?php
				echo form_open('auth/logout');
				echo form_submit('logout_submit', 'Logout');
				echo form_close();
				?>

			</li>
		</ul>
	</nav>
</header>