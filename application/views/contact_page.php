<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
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
