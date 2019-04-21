<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>
	<div id="wrapper">
		<h2>List of My Businesses</h2>

		<?php
		$numBusinesses = count($rows, COUNT_NORMAL);
		if ($numBusinesses > 0) {
		?>

		<table class="list-of-events">
			<thead>
				<tr>
					<th>Businesses</th>
					<th class="column-description">Description</th>
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
						echo anchor('businesses/update/'.$row->id, 'Edit', 'class="button-color edit-event"');

						echo form_open('businesses/delete_business');
						echo form_hidden('eventId', $row->id);
						echo form_submit('event_delete_submit', 'Delete', 'class="button-color"');
						echo form_close();
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
			echo "No Businesses found";
		}
		echo anchor('businesses/new', 'Add New Business', 'class="button-color add-new-event"');
		?>

	</div>
</main>
	
<?php
$this->load->view('footer');
?>
