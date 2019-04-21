<header>
	<nav id="nav">
		<div class="nav-logo">
			<img src=<?php echo base_url()."imgsay/favicon.png" ?> alt="logo" />
		</div>
		<ul>
			<li>
				<?php echo anchor('home', 'Home'); ?>
			</li>
			<li>
				<?php echo anchor('about', 'About Us'); ?>
			</li>
			<li>
				<?php echo anchor('blog/', 'Blog'); ?>
			</li>
			<li>
				<?php echo anchor('store', 'Buy from us'); ?>
			</li>
			<li>
				<?php echo anchor('contact', 'Contact'); ?>
			</li>
			<li>
				<?php echo anchor('signup', 'Sign Up'); ?>
			</li>
			<li>
				<?php echo anchor('login', 'Login'); ?>
			</li>
		</ul>
	</nav>
</header>