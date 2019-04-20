<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div class="banner-top">
		<p>Home <i class="fas fa-arrow-right"></i> SIGN UP</p>
		<h1>SIGN UP</h1>
	</div>
	<div id="wrapper" class="signup-div">

		<?php
		echo form_open('auth/signup_event', 'class="signup-form" name="signup_event_form"');
		?>

		<h2 class="center-heading">Select the type of user</h2>
		<ul class="user-type">
			<li>
				
				<?php
				echo anchor('signup/individual', 'Individual', 'class="button-color"');
				?>

			</li>
			<li>
				
				<?php
				echo anchor('signup/event', 'Event', 'class="button-color"');
				?>

			</li>
			<li>
				
				<?php
				echo anchor('signup/business', 'Business', 'class="button-color"');
				?>

			</li>
		</ul>
		<p class="center-text">Welcome to the Event registration</p>

		<?php
		$data = array('name' => 'firstName', 'placeholder' => 'Enter First Name', 'type' => 'text');
		echo form_input($data);

		$data = array('name' => 'lastName', 'placeholder' => 'Enter Last Name', 'type' => 'text');
		echo form_input($data);

		$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'email');
		echo form_input($data);

		$data = array('name' => 'password', 'placeholder' => 'Enter Password', 'type' => 'password');
		echo form_input($data);

		echo form_submit('signup_event_submit', 'Sign Up', 'class="button-color"');

		echo form_close();
		?>

	</div>
</main>
	
<?php
$this->load->view('footer');
?>
