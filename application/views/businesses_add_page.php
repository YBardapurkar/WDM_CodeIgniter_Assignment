<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$data = $this->session->flashdata('error');
	$this->load->view('error_modal', array('error' => $data));
	if ($data != null) {
		echo '<script type="text/javascript"> document.getElementById("error-modal").style.display = "block"; </script>';
	}
	?>
	
	<div id="wrapper" class="signup-div">
		<h2 class="center-heading">Add New Business</h2>

		<?php
		echo form_open('businesses/add_business', 'class="contact-us-form" name="business_add_form"');
		?>
			
		<div class="row">
			<div class="column">

				<?php
				$data = array('type' => 'text', 'name' => 'businessName', 'placeholder' => 'Enter Business Name');
				echo form_input($data);
				?>

			</div>
			<div class="column">

				<?php
				$data = array('name' => 'businessDescription', 'placeholder' => 'Enter Description', 'rows' => 3 );
				echo form_textarea($data);

				echo form_submit('business_new_submit', 'Submit', 'class="button-color"');
				?>

			</div>
		</div>
	</div>
</main>
	
<?php
$this->load->view('footer');
?>
