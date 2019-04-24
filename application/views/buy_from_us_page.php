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
	
	<div class="banner-top">
		<p>Home <i class="fas fa-arrow-right"></i> Buy From Us</p>
		<h1>Buy From Us</h1>
	</div>
	<div id="wrapper">
		<h2 class="center-heading">Buy From Us</h2>

		<?php
		$numProducts = count($rows, COUNT_NORMAL);
		if ($numProducts > 0) {
			foreach ($rows as $row) {
		?>

		<div class="shop-item-div">
			<div>
				<figure>
					<img src=<?php echo base_url().$row->imageUrl ?> >
					<figcaption><?php echo $row->name ?></figcaption>
				</figure>
				<p><?php echo $row->price ?></p>
				<p><?php echo $row->description ?></p>

				<button onclick="openModal(<?php echo '\'modal-product-photo-'.$row->id.'\'' ?>)" >Add To Cart</button>
			</div>

			<?php
			$this->load->view('product_modal', array('row' => $row));
			?>

		</div>

		<?php
			}
		} else {
		?>

			<div>No products found</div>

		<?php
		}
		?>
		</div>
		<script type="text/javascript" src=<?php echo base_url().'js/buy_from_us.js' ?> ></script>
	</div>

	<div class="banner-bottom">
		<div class="left">
			<h2>View Shopping Cart</h2>
			<p>You can see the products that you added to your cart</p>
		</div>
		<div class="view-cart-div">

			<?php
			echo anchor('store/order', 'Submit', 'class="button-color view-cart"');
			?>
			
		</div>
	</div>
</main>

<?php
$this->load->view('footer');
?>
