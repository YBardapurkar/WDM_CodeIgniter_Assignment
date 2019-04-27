<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header.php');
?>

<main>

	<?php
	$this->load->view('load_modals');
	?>
	
	<div id="wrapper" class="place-order">
		<h2 class="center-heading">Place Order</h2>

		<?php
		echo form_open('store/place_order', 'class="place-order-form" name="place_order_form"');
		?>

		<div class="row">
			<div class="column">
				<h3>Contact Information</h3>
				
				<?php
				echo form_input(array('type' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email'));
				?>

				<h3>Shipping Address</h3>

				<?php
				echo form_input(array('type' => 'text', 'name' => 'firstName', 'placeholder' => 'Enter First Name', 'class' => 'half'));

				echo form_input(array('type' => 'text', 'name' => 'lastName', 'placeholder' => 'Enter Last Name', 'class' => 'half'));

				echo form_input(array('type' => 'text', 'name' => 'address', 'placeholder' => 'Enter Address'));

				echo form_input(array('type' => 'text', 'name' => 'apartment', 'placeholder' => 'Enter Apartment, Suite etc'));

				echo form_input(array('type' => 'text', 'name' => 'city', 'placeholder' => 'Enter City', 'class' => 'half'));

				echo form_input(array('type' => 'text', 'name' => 'state', 'placeholder' => 'Enter State', 'class' => 'half'));

				$data_language = array('english' => 'English', 'spanish' => 'Spanish' ); 
				echo form_dropdown('language', $data_language, 'english', 'class="half"'); 

				echo form_input(array('type' => 'text', 'name' => 'zip', 'placeholder' => 'Enter Postal Code', 'class' => 'half'));

				echo form_submit('place_order_submit', 'Place Order', 'class="button-color"');
				?>

			</div>
			<div class="column">
				<table class="cart-table">
					<thead>
						<tr>
							<th> </th>
							<th>Name</th>
							<th>Units</th>
							<th>Price</th>
						</tr>
					</thead>
					<tfoot>
						<td colspan="3">Total</td>
						<td>$<?php echo $totalPrice ?></td>
					</tfoot>
					<tbody>

					<?php
					foreach ($cart as $row) {
					?>
						<tr>
							<td>
								<figure>
									<img src=<?php echo base_url().$row['product']['imageUrl'] ?> >
									<figcaption></figcaption>
								</figure>
							</td>
							<td><?php echo $row['product']['name'] ?></td>
							<td><?php echo $row['quantity'] ?></td>
							<td><?php echo $row['product']['price']*$row['quantity'] ?></td>
						</tr>
					<?php
					}
					?>

					</tbody>
				</table>
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
