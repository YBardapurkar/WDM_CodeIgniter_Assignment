<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>
	
	<div id="wrapper">
		<h2>List of Events</h2>

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
							echo form_open('events/confirm_event');
							echo form_hidden('eventId', $row->id);
							echo form_submit('event_confirm_submit', 'Confirm', 'class="button-color"');
							echo form_close();
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
