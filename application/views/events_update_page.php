<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>
	
	<div id="wrapper" class="signup-div">
		<h2 class="center-heading">Edit Event</h2>

		<?php
		echo form_open('events/update_event', 'class="contact-us-form" name="event_add_form"');

		echo form_hidden('eventId', $row->id);
		?>
			
		<div class="row">
			<div class="column">

				<?php
				$data = array('type' => 'text', 'name' => 'eventName', 'placeholder' => 'Enter Event Name', 'value' => $row->name);
				echo form_input($data);

				$data = array('type' => 'text', 'name' => 'eventDate', 'placeholder' => 'Enter Event Date', 'value' => $row->eventDate);
				echo form_input($data);

				$data = array('type' => 'text', 'name' => 'eventVenue', 'placeholder' => 'Enter Event Venue', 'value' => $row->venue);
				echo form_input($data);
				?>

			</div>
			<div class="column">

				<?php
				$data = array('name' => 'eventDescription', 'placeholder' => 'Enter Description', 'rows' => 3, 'value' => $row->description);
				echo form_textarea($data);

				echo form_submit('event_update_submit', 'Submit', 'class="button-color"');
				?>

			</div>
		</div>
	</div>
</main>
	
<?php
$this->load->view('footer');
?>
