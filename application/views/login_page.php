<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>

	<div class="banner-top">
		<p>Home <i class="fas fa-arrow-right"></i> LOGIN</p>
		<h1>Login</h1>
	</div>
	<div id="wrapper" class="login">

		<?php
		echo form_open('auth/login', 'class="login-form" name="login_form"');

		echo form_input(array('name' => 'email', 'type' => 'text', 'placeholder' => 'Enter Email'));

		echo form_input(array('name' => 'password', 'type' => 'password', 'placeholder' => 'Enter Password'));

		echo form_submit('login_submit', 'Login', 'class="button-color"');

		echo form_close();
		?>

	</div>
</main>

<?php
$this->load->view('footer');
?>
