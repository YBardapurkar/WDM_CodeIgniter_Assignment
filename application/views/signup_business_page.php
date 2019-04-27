<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>

	<div class="banner-top">
		<p>Home <i class="fas fa-arrow-right"></i> SIGN UP</p>
		<h1>SIGN UP</h1>
	</div>
	<div id="wrapper" class="signup-div">

		<?php
		echo form_open('auth/signup_business', 'class="signup-form" name="signup_business_form"');
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
		<p class="center-text">Welcome to the Business registration</p>

		<?php
		$data = array('name' => 'firstName', 'placeholder' => 'Enter Name', 'type' => 'text');
		echo form_input($data);

		$data = array( 'name' => 'businessType', 'value' => 'university');
		echo form_radio($data);
		echo form_label('University', 'businessType');
		$data = array( 'name' => 'businessType', 'value' => 'company', 'checked' => TRUE);
		echo form_radio($data);
		echo form_label('Company', 'businessType');

		$data = array('name' => 'email', 'placeholder' => 'Enter Email', 'type' => 'text');
		echo form_input($data);

		$data = array('name' => 'password', 'placeholder' => 'Enter Password', 'type' => 'password');
		echo form_input($data);

		echo form_submit('signup_business_submit', 'Sign Up', 'class="button-color"');

		echo form_close();
		?>

	</div>
</main>
	
<?php
$this->load->view('footer');
?>
