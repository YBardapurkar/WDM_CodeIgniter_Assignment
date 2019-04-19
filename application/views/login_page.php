<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div class="banner-top">
		<p>Home <i class="fas fa-arrow-right"></i> LOGIN</p>
		<h1>Login</h1>
	</div>
	<div id="wrapper" class="login">

		<?php
		echo form_open('auth/login');

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
