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
	<script src="js/login.js"></script>
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
			<p>Home <i class="fas fa-arrow-right"></i> LOGIN</p>
			<h1>Login</h1>
		</div>
		<div id="wrapper" class="login">

			<?php
			echo form_open('login/login');

			echo form_input(array('name' => 'email', 'type' => 'email', 'placeholder' => 'Enter Email', 'required' => true));
			echo '<br>';

			echo form_input(array('name' => 'password', 'type' => 'password', 'placeholder' => 'Enter Password', 'required' => true));
			echo '<br>';

			echo form_submit('login_submit', 'Login');

			echo form_close();
			?>

		</div>
	</main>

	<?php
	$this->load->view('footer');
	?>
	
</body>
</html>