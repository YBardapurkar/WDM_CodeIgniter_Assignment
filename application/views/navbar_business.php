<header>
	<nav id="nav">
		<div class="nav-logo">
			<img src=<?php echo base_url()."imgsay/favicon.png" ?> alt="logo" />
		</div>
		<ul>
			<li>
				<?php echo anchor('dashboard', 'Dashboard'); ?>
			</li>
			<li>
				<?php echo anchor('about', 'About Us'); ?>
			</li>
			<li>
				<?php echo anchor('businesses', 'List of Businesses'); ?>
			</li>
			<li>
				<?php echo anchor('businesses/my', 'List of My Businesses'); ?>
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