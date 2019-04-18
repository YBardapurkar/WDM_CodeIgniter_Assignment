<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SayItRight</title>
	<link rel="stylesheet" href=<?php echo base_url()."css/sayitright.css" ?> />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" href="imgsay/favicon.png"/>
</head>

<body>

	<?php
	if ($this->session->has_userdata('id')) {
		if ($this->session->userdata('role') == 'business') {
			$this->load->view('header_business.php');
		} else {
			$this->load->view('header_auth.php');
		}
	} else {
		$this->load->view('header.php');
	}
	?>

	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> SIGN UP</p>
			<h1>SIGN UP</h1>
		</div>
		<div id="wrapper" class="signup-div">

			<?php
			echo form_open('signup/signup_event');
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
			echo '<br>';

			$data = array('name' => 'lastName', 'placeholder' => 'Enter Last Name', 'type' => 'text');
			echo form_input($data);
			echo '<br>';

			$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'email');
			echo form_input($data);
			echo '<br>';

			$data = array('name' => 'password', 'placeholder' => 'Enter Password', 'type' => 'password');
			echo form_input($data);
			echo '<br>';

			echo form_submit('signup_event_submit', 'Sign Up');

			echo form_close();
			?>

		</div>
	</main>
	
	<?php
	$this->load->view('footer');
	?>

</body>
</html>