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
		<div class="banner-home">
			<div class="right">
				<h1>For good communication <span class="red">Say It Right</span> is a tool that you should use.</h1>
				<p>You can see our video tutorial of use with just pressing this button</p>
			</div>
		</div>
		<div class="newsletter banner-bottom">
			<div class="left">
				<h1>Subscribe Our Newsletter</h1>
				<p>We won't send any kind of spam</p>
			</div>

			<?php
			echo form_open('home/mailList');

			echo form_input(array('name' => 'email', 'type' => 'email'));
			echo '<br>';

			echo form_submit('newsletter_submit', 'Subscribe');
			echo form_close();
			?>

		</div>
	</main>

	<?php
	$this->load->view('footer');
	?>

</body>
</html>
