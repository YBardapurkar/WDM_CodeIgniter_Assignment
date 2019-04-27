<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>

	<div class="banner-top">
		<p>Home <i class="fas fa-arrow-right"></i> Contact</p>
		<h1>Contact Us</h1>
	</div>
	<div id="wrapper">
		<h2 class="center-heading">Contact Us</h2>

		<?php
		echo form_open('contact/feedback', 'class="contact-us-form" name="contact_form"');
		?>

		<div class="row">
			<div class="column">

				<?php
				echo form_input(array('type' => 'text', 'name' => 'firstName', 'placeholder' => 'Enter First Name', 'value' => set_value('firstName') ));

				echo form_input(array('type' => 'text', 'name' => 'lastName', 'placeholder' => 'Enter Last Name', 'value' => set_value('lastName') ));

				echo form_input(array('type' => 'text', 'name' => 'email', 'placeholder' => 'Enter Email', 'value' => set_value('email') ));

				echo form_input(array('type' => 'text', 'name' => 'phone', 'placeholder' => 'Enter Phone', 'value' => set_value('phone') ));
				?>

			</div>
			<div class="column">

				<?php
				echo form_textarea(array('name' => 'message', 'placeholder' => 'Enter Message', 'rows' => 3, 'cols' => 50, 'value' => set_value('message') ));

				echo form_submit('contact_submit', 'Submit', 'class="button-color"');
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
