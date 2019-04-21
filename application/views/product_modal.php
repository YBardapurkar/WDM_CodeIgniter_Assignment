<div id=<?php echo 'modal-product-photo-'.$row->id ?> class="modal">
	<div class="modal-content">
		<span id=<?php echo 'close-modal-'.$row->id ?> class="close_modal">&times;</span>

		<?php
		echo form_open('store/add_to_cart', 'id="add-to-cart-form-'.$row->id.'" class="profile-photo-form"');
		?>

		<div class="column">
			<figure>

				<?php
				if (file_exists($row->imageUrl)) {
					echo '<img src="'.$row->imageUrl.'">'; 
				} else {
					echo '<img src="imgsay/user.jpg">';
				}
				?>

				<figcaption></figcaption>
			</figure>
		</div>
		<div class="column">

			<?php
			echo form_hidden('productId', $row->id);

			echo form_label('Quantity', 'quantity');
			echo form_input(array('type' => 'number', 'name' => 'quantity', 'placeholder' => 'Quantity', 'value' => 1));
			?>
			
			<p class="filler-red">Note: some quick example text to build on the card title and make up the bulk of the card's content!</p>

			<?php
			echo form_submit('add_to_cart_submit', 'Add to Cart', 'class="button-color"');
			?>

		</div>

		<?php
		echo form_close();
		?>

	</div>
</div>