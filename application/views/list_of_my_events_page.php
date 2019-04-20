<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div id="wrapper">
		<h2>List of My Events</h2>

		<?php
		$numEvents = count($rows, COUNT_NORMAL);
		if ($numEvents > 0) {
		?>

		<table class="list-of-events">
			<thead>
				<tr>
					<th>Events</th>
					<th class="column-description">Description</th>
					<th>Date</th>
					<th>City</th>
					<th>Confirmation</th>
				</tr>
			</thead>
			<tfoot></tfoot>
			<tbody>

			<?php
			foreach ($rows as $row) {
			?>
				<tr>
					<td>
						<?php echo $row->name ?>
					</td>
					<td>
						<?php echo $row->description ?>
					</td>
					<td>
						<?php 
						$date = date_create($row->eventDate); 
						echo date_format($date,"d M, Y");
						?>
					</td>
					<td>
						<?php echo $row->venue ?>
					</td>
					<td>

						<?php

						if ($this->session->userdata('role') == 'individual') {
							echo form_open('events/remove_event');
							echo form_hidden('eventId', $row->eventId);
							echo form_submit('event_remove_submit', 'Remove', 'class="button-color"');
							echo form_close();
						} else if ($this->session->userdata('role') == 'event') {
							echo '<a class="button-color edit-event" href="event_edit.php?eventId='.$row->id.'">Edit</a>
								<form action="php/events.controller.php" method="post">
									<input type="hidden" name="eventId" value="'.$row['id'].'" />
									<button class="button-color" type="submit" name="delete_event_submit">Delete</button>
								</form>';
						}
						?>

					</td>
				</tr>

			<?php
			}
			?>

			</tbody>
		</table>
			
		<?php
		} else {
			echo "No events found";
		}
		?>

	</div>
</main>
	
<?php
$this->load->view('footer');
?>
