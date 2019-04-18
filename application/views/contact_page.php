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
			<p>Home <i class="fas fa-arrow-right"></i> Contact</p>
			<h1>Contact Us</h1>
		</div>
		<div id="wrapper">
			<h2 class="center-heading">Contact Us</h2>

			<?php
			echo form_open('contact/feedback');
			?>

			<div class="row">
				<div class="column">

					<?php
					$data = array('type' => 'text', 'name' => 'firstName', 'placeholder' => 'Enter First Name');
					echo form_input($data);
					echo '<br>';

					$data = array('type' => 'text', 'name' => 'lastName', 'placeholder' => 'Enter Last Name');
					echo form_input($data);
					echo '<br>';

					$data = array('type' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email');
					echo form_input($data);
					echo '<br>';

					$data = array('type' => 'text', 'name' => 'phone', 'placeholder' => 'Enter Phone');
					echo form_input($data);
					echo '<br>';
					?>

				</div>
				<div class="column">

					<?php
					$data = array('name' => 'message', 'placeholder' => 'Enter Message', 'rows' => 3, 'cols' => 50 );
					echo form_textarea($data);
					echo '<br>';

					echo form_submit('contact_submit', 'Submit');
					?>

				</div>
			</div>

			<?php
			echo form_close();
			?>

		</div>
	</main>
	
	<?php
	$this->load->view('footer');
	?>
	
</body>
</html>