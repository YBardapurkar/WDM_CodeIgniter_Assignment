<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div id="wrapper" class="signup-div">
		<h2 class="center-heading">Edit Business</h2>

		<?php
		echo form_open('businesses/update_business', 'class="contact-us-form" name="business_add_form"');

		echo form_hidden('businessId', $row->id);
		?>
			
		<div class="row">
			<div class="column">

				<?php
				$data = array('type' => 'text', 'name' => 'businessName', 'placeholder' => 'Enter Business Name', 'value' => $row->name);
				echo form_input($data);
				?>

			</div>
			<div class="column">

				<?php
				$data = array('name' => 'businessDescription', 'placeholder' => 'Enter Description', 'rows' => 3, 'value' => $row->description);
				echo form_textarea($data);

				echo form_submit('business_update_submit', 'Submit', 'class="button-color"');
				?>

			</div>
		</div>
	</div>
</main>
	
<?php
$this->load->view('footer');
?>
