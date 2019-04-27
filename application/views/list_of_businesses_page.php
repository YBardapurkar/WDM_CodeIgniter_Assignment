<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>
	
	<div id="wrapper">
		<h2>List of Businesses</h2>

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
		?>

	</div>
</main>
	
<?php
$this->load->view('footer');
?>
